@extends('adminlte::page')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        @if( isset($color))
            <h1>
                Editar Cor Produto
            </h1>
        @else
            <h1>Adicionar Cor de Produto</h1>
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
        
        @if( isset($color))
            {!! Form::model($color,['route'=>['painel.color.update',$color->id],'class'=>'form','method'=>'put']) !!}
        @else
            {!! Form::open(['route'=>'painel.color.store','class'=>'form']) !!}
        @endif
        
        
        <div class="form-group col-md-6">
            {!!Form::label('name', 'Nome:')!!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nome', 'autofocus'=>'autofocus']) !!}
        </div>

        <div class="form-group col-md-6">
                {!!Form::label('code', 'Cor:')!!}
            {!! Form::color('code', null, ['class'=>'form-control','placeholder'=>'Defina a Cor']) !!}
        </div>

        {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
    
        <a href="{{route('painel.color.index')}}" class="btn btn-primary">Cancelar</a>

        {!! Form::close() !!}
    </div>
</div>
    
@stop