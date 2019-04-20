@extends('site.layout.site-template')

@section('title',$product->name)

@section('title-single',$product->name.' - '.$product->type->name)

@section('content')
<section class="property-single nav-arrow-b">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                    @foreach ($product->images as $image)
                        @if($image->main)
                            <div class="carousel-item-b">
                                <img class="img-fluid" src="{{asset('storage/products/'.$product->slug.'/'.$image->name.'.'.$image->format)}}" alt="">
                            </div>    
                            @break
                        @endif
                    @endforeach
                    
                    @foreach ($product->images as $image)
                        @if(!$image->main)
                        <div class="carousel-item-b">
                            <img class="img-fluid" src="{{asset('storage/products/'.$product->slug.'/'.$image->name.'.'.$image->format)}}" alt="">
                        </div>    
                        @endif
                    @endforeach
                </div>
                <div class="property-summary">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="title-box-d section-t4">
                                <h3 class="title-d">Informações</h3>
                            </div>
                        </div>
                    </div>
                    <div class="summary-list">
                        <ul class="list">
                            <li class="d-flex justify-content-between">
                                <strong>Tipo:</strong>
                                <span>{{$product->type->name}}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <strong>Tamanhos:</strong>
                            </li>
                            @foreach ($product->sizes as $size)
                                <li class="d-flex justify-content-between">
                                    <span>{{$size->name}}:</span>
                                    <span>
                                        {{$size->pivot->width}} {{$size->pivot->width_unit}} 
                                        X 
                                        {{$size->pivot->height}} {{$size->pivot->height_unit}} 
                                    </span>         
                                </li>
                            @endforeach
                            <li class="d-flex justify-content-between">
                                <strong>Cores:</strong>
                            </li>
                            @foreach ($product->colors as $color)
                                <li class="d-flex justify-content-between">
                                    <span>
                                        {{$color->name}}
                                    </span> 
                                    <span>
                                        <div class="circle-color" style="background-color:{{$color->code}};"></div>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box-d">
                            <h3 class="title-d">Descrição {{$product->name}}</h3>
                        </div>
                    </div>
                </div>
                <div class="property-description">
                    {!!$product->description!!}
                </div>
                <div class="row section-t3">
                    <div class="col-sm-12">
                        <div class="title-box-d">
                        <h3 class="title-d">Faça um Orçamento</h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="property-contact">
                            {!! Form::open(['route'=>'painel.budget.store','class'=>'form']) !!}
                            <div class="row">
                                <div class="col-md-12 mb-1">
                                    <div class="form-group">
                                        {!! Form::text('client_name', null, 
                                        ['class'=>$errors->has('client_name')?
                                        'form-control form-control-lg form-control-a is-invalid':
                                        'form-control form-control-lg form-control-a','placeholder'=>'Nome *']) !!}
                                    </div>
                                    @if ($errors->has('client_name'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('client_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-12 mb-1">
                                    <div class="form-group">
                                            {!! Form::text('client_phone', null, 
                                            ['class'=>$errors->has('client_phone')?
                                            'form-control form-control-lg form-control-a is-invalid':
                                            'form-control form-control-lg form-control-a','placeholder'=>'Fone *']) !!}
                                    </div>
                                    @if ($errors->has('client_phone'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('client_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-12 mb-1">
                                    <div class="form-group">
                                            {!! Form::text('client_email', null, 
                                            ['class'=>$errors->has('client_email')?
                                            'form-control form-control-lg form-control-a is-invalid':
                                            'form-control form-control-lg form-control-a','placeholder'=>'E-Mail *']) !!}
                                    </div>
                                    @if ($errors->has('client_email'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('client_email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-12 mb-1">
                                    <div class="form-group">
                                            {!! Form::textarea('description', null, 
                                            ['class'=>$errors->has('description')?
                                            'form-control form-control-lg form-control-a is-invalid':
                                            'form-control form-control-lg form-control-a','placeholder'=>'Descrição *', 'cols'=>'45', 'rows'=>'8']) !!}
                                    </div>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    {!! Form::submit('Enviar', ['class'=>'btn btn-a']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--/ Property Single End /-->
@stop

@section('css')
    <style>
        .circle-color{
            height: 25px; 
            width:25px; 
            border-radius:100%; 
            border:1px solid grey;
        }
    </style>    
@stop
