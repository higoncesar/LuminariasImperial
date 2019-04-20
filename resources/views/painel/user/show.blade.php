@extends('adminlte::page')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h1>Deletar Usuário</h1>
    </div>
    <div class="panel-body">
        <div class="callout callout-danger">
            <h2>{{$user->name}}</h2>
            <div class="panel panel-default text-black">
                <br>
                <p>
                    Realmente deseja deletar <b>{{$user->name}}</b>?
                </p>
                <br>
            </div>
        </div>
        
        {!! Form::open(['route'=>['painel.user.destroy', $user->id], 'method'=>'delete']) !!}
            {!! Form::submit('Deletar', ['class'=>'btn btn-danger']) !!}
            <a href="{{route('painel.user.index')}}" class="btn btn-primary">Cancelar</a>
        {!! Form::close() !!}
    </div>
</div>
    
@stop