@extends('adminlte::page')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
            @if( isset($size))
                <h1>
                    Editar Tamanho Produto
                </h1>
            @else
                <h1>Adicionar Tamanho de Produto</h1>
            @endif
    </div>
    <div class="panel-body">  
        @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach   
            </div>
        @endif
        
        @if( isset($size))
            {!! Form::model($size,['route'=>['painel.size.update',$size->id],'class'=>'form','method'=>'put']) !!}
        @else
            {!! Form::open(['route'=>'painel.size.store','class'=>'form']) !!}
        @endif
        
        
        <div class="form-group">
            {!!Form::label('name', 'Nome:')!!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nome','autofocus'=>'autofocus']) !!}
        </div>

        {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
    
        <a href="{{route('painel.size.index')}}" class="btn btn-primary">Cancelar</a>

        {!! Form::close() !!}        
    </div>
</div>
    
@stop