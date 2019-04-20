@extends('adminlte::page')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
        <div class="inner">
        <h3>{{$amountBudgetRegistration}}</h3>
        <p>Orçamentos Efetuados</p>
        </div>
        <div class="icon">
        <i class="fa fa-shopping-cart"></i>
        </div>
        <a href="{{route('painel.budget.index')}}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3>{{$amountProductRegistration}}</h3>
            <p>Produtos Cadastrados</p>
        </div>
        <div class="icon">
            <i class="fa fa-fw fa-cubes"></i>
        </div>
        <a href="{{route('painel.product.index')}}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
        <h3>{{$amountUserRegistration}}</h3>

        <p>Usuarios Cadastrados</p>
        </div>
        <div class="icon">
        <i class="ion ion-person-add"></i>
        </div>
        <a href="{{route('painel.user.index')}}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
@stop