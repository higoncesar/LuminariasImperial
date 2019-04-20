<?php

namespace IluminariasImperial\Http\Controllers\Painel;

use IluminariasImperial\Http\Controllers\Controller;
use IluminariasImperial\Models\Color;
use Illuminate\Support\Str;
use IluminariasImperial\Http\Requests\ColorFormRequest;


class ColorController extends Controller
{
    protected $color;
    public function __construct(Color $color)
    {   
        $this->color = $color;
    }

    public function index(){
        $colors = $this->color->all();
        return view('painel.color.index')->with(compact('colors'));
    }

    public function create(){
        return view('painel.color.form');
    }

    public function store(ColorFormRequest $request){
        $dataForm = $request->except('_token');
        $dataForm['slug'] = Str::slug($request['name'], '-');
        $insert = $this->color->create($dataForm);
        if($insert)
            return redirect()->route('painel.color.index');
        else
            return redirect()->back();
    }

    public function edit($id){
        $color = $this->color->find($id);
        return view('painel.color.form')->with(compact('color'));
    }

    public function update(ColorFormRequest $request, $id){
        $color = $this->color->find($id);
        $dataForm = $request->except('_token');
        $dataForm['slug'] = Str::slug($request['name'], '-');

        $update = $color->update($dataForm);

        if($update)
            return redirect()->route('painel.color.index');
        else
            return 'Erro ao fazer Update';
    }

    public function show($id){
        $color = $this->color->find($id);
        
        if($color === null)
            return redirect()->route('painel.home');
        else
            return view('painel.color.show')->with(compact('color'));
    }

    public function destroy($id){
        $this->color->destroy($id);
        return redirect()->route('painel.color.index');
    }
}
