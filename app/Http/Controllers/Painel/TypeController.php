<?php

namespace IluminariasImperial\Http\Controllers\Painel;

use IluminariasImperial\Http\Controllers\Controller;
use IluminariasImperial\Models\Type;
use Illuminate\Support\Str;
use IluminariasImperial\Http\Requests\TypeFormRequest;

class TypeController extends Controller
{
    protected $type;

    public function __construct(Type $type)
    {   
        $this->type=$type;
    }

    
    public function index()
    {
        $types = $this->type->all();
        return view('painel.type.index')->with(compact('types'));
    }

    public function create(){
        return view ('painel.type.form');
    }

    public function store(TypeFormRequest $request){
        $dataForm = $request->except('_token');
        $dataForm['slug'] = Str::slug($request['name'], '-');
        $insert = $this->type->create($dataForm);
        if($insert)
            return redirect()->route('painel.type.index');
        else
            return redirect()->back();

    }


    public function edit($id){
        $type = $this->type->find($id);
        return view('painel.type.form')->with(compact('type'));
    }

    public function update(TypeFormRequest $request, $id){
        $type = $this->type->find($id);
        $dataForm = $request->except('_token');
        $dataForm['slug'] = Str::slug($request['name'], '-');

        $update = $type->update($dataForm);

        if($update)
            return redirect()->route('painel.type.index');
        else
            return 'Erro ao fazer Update';
    }

    public function show($id){
        $type = $this->type->find($id);
        
        if($type === null)
            return redirect()->route('painel.home');
        else
            return view('painel.type.show')->with(compact('type'));
    }

    public function destroy($id){
        $this->type->destroy($id);
        return redirect()->route('painel.type.index');
    }

}
