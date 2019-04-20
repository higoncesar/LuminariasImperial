<?php

namespace IluminariasImperial\Http\Controllers\Painel;

use IluminariasImperial\Http\Controllers\Controller;
use Illuminate\Support\Str;
use IluminariasImperial\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\Storage;

use IluminariasImperial\Models\Product;
use IluminariasImperial\Models\Type;
use IluminariasImperial\Models\Color;
use IluminariasImperial\Models\Size;


class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product){
         $this->product = $product;
    }

    public function index(){
        $products = $this->product->all();
        return view('painel.product.index')->with(compact('products'));
    }

    public function create(){
        $types = Type::orderBy('name','asc')->pluck('name','id');
        $colors = Color::all();
        $sizes = Size::all();
        return view('painel.product.form')->with(compact('types','colors','sizes'));
    }

    public function store(ProductFormRequest $request){
        $dataForm = $request->except('_token');
        $dataForm['slug'] = Str::slug($request['name'], '-');
        
        if(isset($dataForm['active']))
            $dataForm['active'] = true;
        else
            $dataForm['active'] = false;

        $sizes =array();
        foreach($dataForm['size_id'] as $size){
            $sizes[$size] = $dataForm["size_$size"];
        }

        $insert = $this->product->create($dataForm);
        $insert->colors()->sync($dataForm['color_id']);
        $insert->sizes()->sync($sizes);
        
        if(isset($dataForm['image'])){
            if($insert){
                $img = [
                    'name' => $dataForm['slug'].'-'.uniqid(),
                    'format' => $request->image->extension(),
                    'product_id'=> $insert->id,
                    'main'=>true
                ];
                $insert->images()->create($img);
                $request->image->storeAs('products/'.$dataForm['slug'].'/',"{$img['name']}.{$img['format']}"); 

                return redirect()->route('painel.product.index');
            }
        }else
            return redirect()->route('painel.product.index');
    }

    public function edit($id){
        $product = $this->product->find($id);
        $types = Type::orderBy('name','asc')->pluck('name','id');
        $colors = Color::all();
        $sizes = Size::all();
       
        return view('painel.product.form')->with(compact('product','types','colors','sizes'));
    }

    public function update(ProductFormRequest $request, $id){
        $product = $this->product->find($id); 
        $dataForm = $request->except('_token');
        $dataForm['slug'] = Str::slug($request['name'], '-');

        if(isset($dataForm['active']))
            $dataForm['active'] = true;
        else
            $dataForm['active'] = false;
        
        if($product->name != $dataForm['name']){
            if($product->images->count()>0){
                foreach($product->images as $image){
                    Storage::move('products/'.$product->slug.'/'.$image->name.'.'.$image->format, 
                    'products/'.$dataForm['slug'].'/'.$image->name.'.'.$image->format);
                }
                Storage::deleteDirectory('products/'.$product->slug);
            }
        }

        $sizes =array();
        foreach($dataForm['size_id'] as $size){
            $sizes[$size] = $dataForm["size_$size"];
        }

        $update = $product->update($dataForm);
        $product->colors()->sync($dataForm['color_id']);
        $product->sizes()->sync($sizes);

        if(isset($dataForm['image'])){
            if($update){
                $img = [
                    'name' => $dataForm['slug'].'-'.uniqid(),
                    'format' => $request->image->extension(),
                    'product_id'=> $product->id
                ];
                $product->images()->create($img);
                $request->image->storeAs('products/'.$dataForm['slug'],"{$img['name']}.{$img['format']}"); 

                return redirect()->back();
            }
        }else
            return redirect()->route('painel.product.index');
                    
    }


    public function show($id){
        $product = $this->product->find($id);
        
        if($product === null)
            return redirect()->route('painel.home');
        else
            return view('painel.product.show')->with(compact('product'));
    }

    public function destroy($id){
        $product = $this->product->find($id);
        Storage::deleteDirectory('products/'.$product->slug);
        $product->destroy($id);
        return redirect()->route('painel.product.index');
    }

    public function imageDestroy($id,$id_image){
        $product = $this->product->find($id);
        $image = $product->images()->find($id_image);
        Storage::delete("products/$product->slug/$image->name.$image->format");
        $image->delete();
        return redirect()->back();
    }

    public function imageMain($id,$id_image){
        $product = $this->product->find($id);
        $images = $product->images;
        foreach($images as $image){
            if($image->main)
            $image->update(['main'=>0]);
        }
        $image = $product->images()->find($id_image)->update(['main'=>1]);
        return redirect()->back();
    }
}
