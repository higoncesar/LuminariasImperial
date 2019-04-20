@extends('site.layout.site-template')

@section('title', 'Home')

@section('title-single','Mais Vendidos')

@section('content')
<!--/ Property Grid Star /-->
<section class="property-grid grid">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card-box-a card-shadow">
                        @foreach ($product->images as $image)
                            @if ($image->main)
                                <div class="img-box-a">
                                    <img src="{{asset('storage/products/'.$product->slug.'/'.$image->name.'.'.$image->format)}}" alt="{{$image->name}}" class="img-a img-fluid">
                                </div>    
                            @endif
                        @endforeach
                        
                        <div class="card-overlay">
                            <div class="card-overlay-a-content">
                                <div class="card-header-a">
                                    <h2 class="card-title-a">
                                        <a href="{{route('product.detail.page',['slug'=>$product->slug])}}">{{$product->name}}</a>
                                    </h2>
                                </div>

                                <div class="card-body-a">
                                    
                                    <a href="{{route('product.detail.page',['slug'=>$product->slug])}}" class="link-a">Clique para ver
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                </div>

                                <div class="card-footer-a">
                                    <ul class="card-info d-flex justify-content-around">
                                        <li>
                                            <h4 class="card-info-title">Tipo</h4>
                                            <span>{{$product->type->name}}</span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Tamanhos</h4>
                                            @foreach ($product->sizes as $key=>$size)
                                                @if($product->sizes->count()== $key+1)
                                                    <span>{{$size->name}}</span>    
                                                @else
                                                    <span>{{$size->name}} | </span>
                                                @endif
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            @endforeach
        </div>
    </div>
</section>
<!--/ Property Grid End /-->

@stop