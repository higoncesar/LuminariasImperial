@extends('adminlte::page')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
            @if( isset($user))
                <h1>Editar Usuário</h1>
            @else
                <h1>Adicionar Usuário</h1>
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
        
        @if( isset($user))
            {!! Form::model($user,['route'=>['painel.user.update',$user->id],'class'=>'form','method'=>'put']) !!}
        @else
            {!! Form::open(['route'=>'painel.user.store','class'=>'form']) !!}
        @endif
        
        
        <div class="form-group">
            {!!Form::label('name', 'Nome:')!!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nome','autofocus'=>'autofocus']) !!}
        </div>

        <div class="form-group">
            {!!Form::label('email', 'E-mail:')!!}
            {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'E-mail']) !!}
        </div>

        
        <div class="form-group">
            {!!Form::label('password', 'Senha:')!!}
            {!! Form::password('password',['class'=>'form-control','placeholder'=>'Senha']) !!}
        </div>

        <div class="form-group">
            password
            {!!Form::label('password_confirmation', 'Repita a senha:')!!}
            {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Repita a senha']) !!}
        </div>

        {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}
    
        <a href="{{route('painel.user.index')}}" class="btn btn-primary">Cancelar</a>

        {!! Form::close() !!}        
    </div>
</div>
    
@stop