<?php

namespace IluminariasImperial\Http\Controllers\Painel;


use IluminariasImperial\Http\Controllers\Controller;
use IluminariasImperial\User;
use IluminariasImperial\Models\Product;
use IluminariasImperial\Models\Budget;

class HomeController extends Controller
{
    protected $user;
    protected $product;
    protected $budget;

    public function __construct(User $user, Product $product, Budget $budget)
    {
        $this->user = $user;
        $this->product = $product;
        $this->budget = $budget;
    }

    
    public function index()
    {   $amountUserRegistration = $this->amountUserRegistration();
        $amountProductRegistration = $this->amountProductRegistration();
        $amountBudgetRegistration= $this->amountBudgetRegistration();
        return view('painel.home.index')->with(compact(['amountUserRegistration','amountProductRegistration','amountBudgetRegistration']));
    }

    public function amountUserRegistration(){
        $amountUserRegistration = $this->user->all()->count();
        return $amountUserRegistration;
    }

    public function amountProductRegistration(){
        $amountProductRegistration = $this->product->all()->count();
        return $amountProductRegistration;
    }

    public function amountBudgetRegistration(){
        $amountBudgetRegistration = $this->budget->all()->count();
        return $amountBudgetRegistration;
    }
}
