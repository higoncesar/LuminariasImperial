@extends('adminlte::page')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
            <h1>Orçamento</h1>
    </div>
    <div class="panel-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                    <h3>{{$budget->client_name}}</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <strong>Fone:</strong>     
                    <p class="lead">{{$budget->client_phone}}</p>
                </div>
                <div class="col-md-6">
                    <strong>E-mail:</strong>
                    <p class="lead">{{$budget->client_email}}</p>
                </div>
                <hr>
                <div class="col-sm-12">
                    <strong>Descrição:</strong>  
                    <blockquote>   
                        <p class="lead text-uppercase">{{$budget->description}}</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
    