<?php

namespace IluminariasImperial\Http\Controllers\Site;

use Illuminate\Http\Request;
use IluminariasImperial\Http\Controllers\Controller;
use IluminariasImperial\Models\Product;
use IluminariasImperial\Models\Type;
use IluminariasImperial\Models\Color;
use IluminariasImperial\Models\Size;

class SiteController extends Controller
{
    protected $product;
    protected $searchFormTypes;
    protected $searchFormColors;
    protected $searchFormSizes;

    public function __construct(Product $product, Type $types, Color $colors, Size $sizes)
    {
        $this->product = $product;
        $this->searchFormTypes = $types;
        $this->searchFormColors = $colors;
        $this->searchFormSizes = $sizes;
    }
    
    public function index(){
        $products = $this->productsBestSellers();
        $searchFormTypes = $this->searchFormTypes;
        $searchFormColors = $this->searchFormColors;
        $searchFormSizes = $this->searchFormSizes;
        return view('site.pages.home')->with(compact('products','searchFormTypes','searchFormColors','searchFormSizes'));
    }

    public function productDetail($slug){
        $product = $this->product->where('slug',$slug)->get();
        $searchFormTypes = $this->searchFormTypes;
        $searchFormColors = $this->searchFormColors;
        $searchFormSizes = $this->searchFormSizes;
        
        if($product->count()>0){            
            $product = $product[0];
            $oneMoreView = $product->viewer_amount;
            $oneMoreView = ++$oneMoreView;
            $product->update(['viewer_amount'=>$oneMoreView]);
            return view('site.pages.product-detail')->with(compact('product','searchFormTypes','searchFormColors','searchFormSizes'));
        }else
            return abort(404);
    }

    public function productsPage(){
        $products = $this->product->where('active',true)->get();
        $searchFormTypes = $this->searchFormTypes;
        $searchFormColors = $this->searchFormColors;
        $searchFormSizes = $this->searchFormSizes;
        return view('site.pages.products')->with(compact('products','searchFormTypes','searchFormColors','searchFormSizes'));
    }

    public function searchProducts(Request $request){
        $lastFormSeacrhProduct = $request->except('_token');
        $products = $this->product;
        $searchFormTypes = $this->searchFormTypes;
        $searchFormColors = $this->searchFormColors;
        $searchFormSizes = $this->searchFormSizes;

        if(!empty($request->type)){
            $type_id = $request->type;
            $products = $products->where('type_id','=',$type_id);
        }
        if(!empty($request->color)){
            $color_id = $request->color;
            $products = $products->join('color_product',function($join) use ($color_id){
                $join->on('color_product.product_id','=','products.id')->where('color_product.color_id','=',$color_id);
            });
        }

        if(!empty($request->size)){
            $size_id = $request->size;
            $products = $products->join('product_size',function($join) use ($size_id){
                $join->on('product_size.product_id','=','products.id')->where('product_size.size_id','=',$size_id);
            });
        }
        $products = $products->get(['products.*']); 
        return view('site.pages.products-search')->with(compact
            ('products','searchFormTypes','searchFormColors','searchFormSizes','lastFormSeacrhProduct')
        );
    }

    public function productsBestSellers(){
        $productsBestSellers = $this->product->where('active',true)
        ->orderBy('viewer_amount','desc')->take(6)->get();
        return $productsBestSellers; 
    }
}
