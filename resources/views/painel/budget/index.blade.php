@extends('adminlte::page')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
            <h1>Orçamentos</h1>
    </div>
    <div class="panel-body">
        <table id="data-table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Fone</th>
                    <th>E-Mail</th>
                    <th>Data</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($budgets as $budget)
                    <tr>
                        <td>{{$budget->client_name}}</td>
                        <td>{{$budget->client_phone}}</td>
                        <td>{{$budget->client_email}}</td>
                        <td>{{date('d/m/Y H:i:s', strtotime($budget->created_at))}}</td>
                        <td>
                            <a href="{{route('painel.budget.show',['id'=>$budget->id])}}" class="btn btn-primary">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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