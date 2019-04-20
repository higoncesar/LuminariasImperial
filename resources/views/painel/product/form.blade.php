@extends('adminlte::page')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
            @if( isset($product))
                <h1>
                    Editar Produto
                </h1>
            @else
                <h1>Adicionar Produto</h1>
            @endif
    </div>
    <div class="panel-body">  
        @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger alert-dismissible">
                <button product="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach   
            </div>
        @endif
        
        @if( isset($product))
            {!! Form::model($product,['route'=>['painel.product.update',$product->id],'class'=>'form','method'=>'put','files' => true]) !!}
        @else
            {!! Form::open(['route'=>'painel.product.store','class'=>'form','files' => true]) !!}
        @endif

        <div class="form-group col-md-11">
            {!!Form::label('name', 'Nome:',['class'=>'form-check-label'])!!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nome','autofocus'=>'autofocus']) !!}
        </div>

        <div class="form-group col-sm-1">
            <div class="form-check">
                {!!Form::label('active', 'Ativo',['class'=>'form-check-label'])!!}
                @if(isset($product))
                    {!! Form::checkbox('active','active',$product->active,['class'=>'form-check-input']) !!}
                @else
                    {!! Form::checkbox('active',true, ['class'=>'form-check-input']) !!}
                @endif
            </div>
        </div>
        
        <div class="form-group col-md-6">
            {!!Form::label('type_id', 'Tipo:')!!}
            {!! Form::select('type_id', $types, null , ['placeholder'=>'Selecione um Tipo','class'=>'form-control']) !!}
        </div>

        <div class="form-group col-md-6">
            {!!Form::label('color_id', 'Cores:')!!}
            
            <div class="painel-form-item">
                @if(isset($product))
                    @foreach($colors as $color)
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('color_id[]', $color->id,$product->colors->contains($color->id)?true:false,
                                ['class'=>'form-check-input']) !!}{{$color->name}}
                            </label>
                        </div>
                    @endforeach
                @else
                    @foreach($colors as $color)
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('color_id[]', $color->id, false,[]) !!}{{$color->name}}
                            </label>
                        </div>
                    @endforeach
                @endif    
            </div>
        </div>

        <div class="form-group col-md-12">
            {!! Form::label('size_id', 'Tamanhos:') !!}
            <div class="painel-form-item">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <tr>
                            <th>Tamanho</th>
                            <th>Largura</th>
                            <th>Altura</th>
                        </tr>
                        @if (isset($product))
                            @foreach ($sizes as $size)
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('size_id[]',$size->id,$product->sizes->contains($size)?true:false,[]) !!}{{$size->name}}
                                            </label>
                                        </div>
                                    </td>
                                    @if($product->sizes->contains($size))
                                        @foreach ($product->sizes as $product_size)
                                            @if ($product_size->id==$size->id)
                                                <td>
                                                    <div class="radio-inline">
                                                        {!! Form::radio('size_'.$size->id.'[width_unit]','cm',$product_size->pivot->width_unit=='cm'?true:false,[]) !!}
                                                        cm
                                                    </div>
                                                    <div class="radio-inline">
                                                        {!! Form::radio('size_'.$size->id.'[width_unit]', 'mt',$product_size->pivot->width_unit=='mt'?true:false, []) !!}
                                                        mt 
                                                    </div>
                                                    {!! Form::number('size_'.$size->id.'[width]',$product_size->pivot->width, ['placeholder'=>'Largura','step'=>'0.01','min'=>'0']) !!}
                                                </td>
                                                <td>
                                                    <div class="radio-inline">
                                                        {!! Form::radio('size_'.$size->id.'[height_unit]', 'cm',$product_size->pivot->height_unit=='cm'?true:false, []) !!}
                                                        cm   
                                                    </div>
                                                    <div class="radio-inline">
                                                        {!! Form::radio('size_'.$size->id.'[height_unit]', 'mt',$product_size->pivot->height_unit=='mt'?true:false, []) !!}
                                                        mt 
                                                    </div>
                                                    {!! Form::number('size_'.$size->id.'[height]',$product_size->pivot->height, ['placeholder'=>'Altura','step'=>'0.01','min'=>'0']) !!}
                                                </td>
                                            @endif
                                        @endforeach
                                    @else
                                        <td>
                                            <div class="radio-inline">
                                                {!! Form::radio('size_'.$size->id.'[width_unit]','cm', true ,[]) !!}
                                                cm
                                            </div>
                                            <div class="radio-inline">
                                                {!! Form::radio('size_'.$size->id.'[width_unit]','mt', false, []) !!}
                                                mt 
                                            </div>
                                            {!! Form::number('size_'.$size->id.'[width]',null, ['placeholder'=>'Largura','step'=>'0.01','min'=>'0']) !!}
                                        </td>
                                        <td>
                                            <div class="radio-inline">
                                                {!! Form::radio('size_'.$size->id.'[height_unit]', 'cm', true, []) !!}
                                                cm   
                                            </div>
                                            <div class="radio-inline">
                                                {!! Form::radio('size_'.$size->id.'[height_unit]', 'mt', false, []) !!}
                                                mt 
                                            </div>
                                            {!! Form::number('size_'.$size->id.'[height]', null, ['placeholder'=>'Altura','step'=>'0.01','min'=>'0']) !!}
                                        </td>
                                    @endif                                 
                                </tr>
                            @endforeach
                        @else
                            @foreach($sizes as $size)
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('size_id[]',$size->id,false,[]) !!}{{$size->name}}
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio-inline">
                                            {!! Form::radio('size_'.$size->id.'[width_unit]', 'cm', true, []) !!}
                                            cm   
                                        </div>
                                        <div class="radio-inline">
                                            {!! Form::radio('size_'.$size->id.'[width_unit]', 'mt', false, []) !!}
                                            mt 
                                        </div>
                                        {!! Form::number('size_'.$size->id.'[width]',null, ['placeholder'=>'Largura','step'=>'0.01','min'=>'0']) !!}
                                    </td>
                                    <td>
                                        <div class="radio-inline">
                                            {!! Form::radio('size_'.$size->id.'[height_unit]', 'cm', true, []) !!}
                                            cm   
                                        </div>
                                        <div class="radio-inline">
                                            {!! Form::radio('size_'.$size->id.'[height_unit]', 'mt', false, []) !!}
                                            mt 
                                        </div>
                                        {!! Form::number('size_'.$size->id.'[height]', null, ['placeholder'=>'Altura','step'=>'0.01','min'=>'0']) !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>

        <div class="form-group col-md-12">
            {!!Form::label('description', 'Descrição:')!!}
            {!! Form::textarea('description', null, ['class'=>'form-control','placeholder'=>'Descrição','id'=>'editor']) !!}
        </div>

        @if(isset($product))
            <div class="form-group col-sm-12">
                <div class="col-sm-12 painel-img ">
                    @if($product->images->isEmpty())
                        <div class="text-center">
                            <h4>Não existe imagem para este produto, faça Upload.</h4>
                        </div>
                    @else
                    <br>
                        @foreach($product->images as $image)
                            <div class="col-sm-3 text-center">
                                @if($image->main)
                                    <div class="thumbnail main-img">
                                @else
                                    <div class="thumbnail">
                                @endif
                                    <img src="{{asset('storage/products/'.$product->slug.'/'.$image->name.'.'.$image->format)}}" 
                                    class="img-responsive">
                                    <div class="caption">
                                        <p>
                                            @if(!$image->main)
                                                <a href="{{route('painel.product.image.main',['id'=>$product->id,'id_image'=>$image->id])}}" 
                                                class="btn btn-primary" role="button">
                                                    Principal
                                                </a>
                                                <a href="{{route('painel.product.image.destory',['id'=>$product->id,'id_image'=>$image->id])}}"
                                                 class="btn btn-danger" role="button">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a> 
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endif

        <div class="form-group col-sm-12">
            {!!Form::label('image', 'Imagens de no mínimo 500px por 500px:')!!}
            {!! Form::file('image', ['class' => 'form-control']) !!}
        </div>
        
        <div class="col-sm-12">
            {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
            <a href="{{route('painel.product.index')}}" class="btn btn-primary">Cancelar</a>
        </div>

        {!! Form::close() !!}        
    </div>
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.css">
    <style>
        .painel-img{
            background-color: #333333;
            color: white;
            min-height: 60px;
            max-height: 500px;
            margin-bottom: 15px;
            overflow: auto;
        }

        .main-img{
            background-color: #ffcc00;
        }

        .painel-form-item{
            border: lightgray solid 1px;
            padding: 10px;
            max-height: 400px;
            overflow: auto;
        }
    </style>
@stop

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.js"></script>
    <script>
        var editor = new Jodit('#editor',{
            height: 350,
            showWordsCounter: false
        });
    </script>
@stop