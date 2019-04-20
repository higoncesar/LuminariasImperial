<?php

namespace IluminariasImperial\Http\Controllers\Painel;

use Illuminate\Http\Request;
use IluminariasImperial\Http\Controllers\Controller;

use IluminariasImperial\User;
use IluminariasImperial\Http\Requests\UserFormRequest;

class UserController extends Controller
{
    protected $user;

    function __construct(User $user)
    {
        $this->user=$user;    
    }

    function index(){
        $users = $this->user->all();
        return view('painel.user.index')->with(compact('users'));
    }

    function create(){
        return view('painel.user.form');
    }

    function store(UserFormRequest $request){
        $dataForm = $request->except('_token');
        $dataForm['password'] = bcrypt($request->password);
        $insert = $this->user->create($dataForm);
        if($insert)
            return redirect()->route('painel.user.index');
        else
            return redirect()->back();
    }

    function edit($id){
        $user = $this->user->find($id);
        return view('painel.user.form')->with(compact('user'));
    }

    function update(UserFormRequest $request, $id){
        $user = $this->user->find($id);
        $dataForm = $request->except('_token');

        if(empty($request->password)){
            unset($dataForm['password']);
            unset($dataForm['password_confirmation']);
        }else{
            $dataForm['password'] = bcrypt($request->password);
        }
        
        $update = $user->update($dataForm);

        if($update)
            return redirect()->route('painel.user.index');
        else
            return redirect()->back();
    }

    function show($id){
        $user = $this->user->find($id);
        return view('painel.user.show')->with(compact('user'));
    }

    function destroy($id){
        $this->user->destroy($id);
        return redirect()->route('painel.user.index');
    }
}
