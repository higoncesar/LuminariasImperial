@extends('adminlte::page')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h1>Deletar Produto</h1>
    </div>
    <div class="panel-body">
        <div class="callout callout-danger">
            <h2>{{$product->name}}</h2>
            <div class="panel panel-default text-black">
                <br>
                <p> Realmente deseja deletar <b>{{$product->name}}</b>?</p>
                <br>
            </div>
        </div>
                
        </div>
        
        {!! Form::open(['route'=>['painel.product.destroy', $product->id], 'method'=>'delete']) !!}
            
            {!! Form::submit('Deletar', ['class'=>'btn btn-danger']) !!}
            <a href="{{route('painel.product.index')}}" class="btn btn-primary">Cancelar</a>
            
        {!! Form::close() !!}
        
        
    </div>
</div>
    
@stop