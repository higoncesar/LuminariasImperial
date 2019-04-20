<?php

namespace IluminariasImperial\Http\Controllers\Painel;

use IluminariasImperial\Http\Controllers\Controller;

use IluminariasImperial\Models\Size;
use IluminariasImperial\Http\Requests\SizeFromRequest;

use Illuminate\Support\Str;


class SizeController extends Controller
{
   
    protected $size;
    
    public function __construct(Size $size)
    {
        $this->size=$size;
    }

    public function index(){
        $sizes = $this->size->all();
        return view('painel.size.index')->with(compact('sizes'));
    }

    public function create(){
        return view('painel.size.form');
    }

    public function store(SizeFromRequest $request){
        $dataForm = $request->except('_token');
        $dataForm['slug'] = Str::slug($request->name,'-');
        $insert = $this->size->create($dataForm);
        if($insert)
            return redirect()->route('painel.size.index');
        else
            return back();
    }

    public function edit($id){
        $size= $this->size->find($id);
        return view('painel.size.form')->with(compact('size'));
    }

    public function update(SizeFromRequest $request, $id){
        $size = $this->size->find($id);
        $dataForm = $request->except('_token');
        $dataForm['slug'] = Str::slug($request['name'], '-');

        $update = $size->update($dataForm);

        if($update)
            return redirect()->route('painel.size.index');
        else
            return 'Erro ao fazer Update';
    }

    public function show($id){
        $size = $this->size->find($id);
        return view('painel.size.show')->with(compact('size'));
    }

    public function destroy($id){
        $this->size->destroy($id);
        return redirect()->route('painel.size.index');
    }


}
