<?php

namespace IluminariasImperial\Http\Controllers\Painel;

use IluminariasImperial\Http\Controllers\Controller;
use Illuminate\Http\Request;
use IluminariasImperial\Models\Budget;
use IluminariasImperial\Http\Requests\BudgetFormRequest;
use TJGazel\Toastr\Facades\Toastr;

class BudgetController extends Controller
{
    protected $budget;

    public function __construct(Budget $budget)
    {
        $this->budget = $budget;
    }

    public function index(){
        $budgets = $this->budget->all();
        return view('painel.budget.index')->with(compact('budgets'));
    }

    public function store(BudgetFormRequest $request){
        $dataForm = $request->except('_token');
        $this->budget->create($dataForm);
        toastr()->success('Orçamento Feito com Sucesso');
        return redirect()->back();
    }   

    public function show($id){
        $budget=$this->budget->find($id);
        return view ('painel.budget.show')->with(compact('budget'));
    }
}
