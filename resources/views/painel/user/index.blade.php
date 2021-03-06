@extends('adminlte::page')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
            <h1>Usuários</h1>
            <a href="{{route('painel.user.create')}}" class="btn btn-success">Adicionar</a>
    </div>
    <div class="panel-body">
        <table id="data-table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('painel.user.edit',['id'=>$user->id])}}" class="btn btn-primary">
                                <i class="fa fa-fw fa-edit "></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('painel.user.show',['id'=>$user->id])}}" class="btn btn-danger">
                                <i class="fa fa-fw fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <a href="{{route('painel.user.create')}}" class="btn btn-success">Adicionar</a>
    </div>
</div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#data-table').dataTable({
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });
        });
    </script>
@stop