@extends('Layout.site')

@section('content')

<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Vendas | <a class="btn btn-success btn-sm" href="{{route('Site.NewSales')}}">
                        <i class="fas fa-plus"></i>
                        Nova</a>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard v1 | Vendas</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">

                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="IDUser">Data inicial</label>

                                    <input type="date" class="form-control" data-target="#dateStart" value="2021-01-01"
                                        id="dateStart" name="dateStart">

                                </div>
                                <div class="col-md-3">
                                    <label for="IDUser">Data final</label>

                                    <input type="date" class="form-control" data-target="#dateEnd" value="2021-12-31"
                                        id="dateEnd" name="dateEnd">

                                </div>
                                <div class="col-md-3">
                                    <label>ㅤ</label>
                                    <div class="input-group date" data-target-input="nearest">
                                        <div class="btn-group">
                                            <button type="button" id="left" class="btn btn-default">
                                                <i class="fas fa-arrow-left"></i>
                                            </button>
                                            <button type="button" id="year" class="btn btn-default active">Ano</button>
                                            <button type="button" id="month" class="btn btn-default">Mês</button>
                                            <button type="button" id="day" class="btn btn-default">Dia</button>
                                            <button type="button" id="right" class="btn btn-default">
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="vendas" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Forma de Pagamento</th>
                                    <th>Itens</th>
                                    <th>Data</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sales)
                                <tr class="text-center">
                                    <td class='sale_id'>{{$sales->sale_id}}</td>
                                    <td class='nameClient'>{{$sales->nameClient}}</td>
                                    <td class='namePayment'>{{$sales->namePayment}}</td>
                                    <td class='quantityItens'>{{$sales->quantityitens}}</td>
                                    <td class='sale_data'>{{date('d/m/Y', strtotime($sales->date_sale))}}</td>
                                    <td class='sale_amount'>R$ {!!number_format($sales->amount,2)!!}</td>
                                    <td>
                                        @if($sales->status == "A")
                                        <a class="btnEdit btn btn-outline-info btn-sm" data-toggle="modal"
                                            data-target="#modalclosesale" data-whatever='{
                                                "saleId":"{{$sales->sale_id}}"
                                                }'>
                                            <i class="fas fa-lock-open"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="Vendas/Editar/{{$sales->sale_id}}"
                                            class="btnEdit btn btn-outline-warning btn-sm">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </a>
                                        <a class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modaldeletesale" data-whatever='{
                                                "saleId":"{{$sales->sale_id}}"'>
                                            <i class="fas fa-trash">
                                            </i>
                                            Apagar
                                        </a>
                                    </td>
                                    @else
                                    <a class="btnEdit btn btn-outline-info btn-sm" data-toggle="modal"
                                        data-target="#modalopensale" data-whatever='{
                                                "saleId":"{{$sales->sale_id}}"
                                                }'>
                                        <i class="fas fa-lock"></i>
                                    </a>
                                    </td>
                                    <td>
                                        <a class="btnEdit btn btn-outline-success btn-sm" data-toggle="modal"
                                            data-target="#modalviewsale" data-whatever='{{$sales->sale_id}}'>
                                            <i class="fas fa-eye">
                                            </i>
                                            Visualizar
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!-- DataTables  & Plugins -->
<script type="text/javascript" src="{{asset('assets/jquery-ui-1.8.4.custom/js/jquery-ui-1.8.4.custom.min.js')}}">
</script>
<!---Load the dataTables jQuery plugin--->
<script type="text/javascript" src="{{asset('assets/DataTables-1.7.4/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>

<script type="text/javascript">
var tablaTransacciones = $('#vendas');

var tablaTransacciones_dt = null

// The plugin function for adding a new filtering routine
$.fn.dataTableExt.afnFiltering.push(
    function(oSettings, aData, iDataIndex) {
        var dateStart = parseDateValue($("#dateStart").val());
        var dateEnd = parseDateValue($("#dateEnd").val());
        // aData represents the table structure as an array of columns, so the script access the date value
        // in the first column of the table via aData[0]
        var evalDate = parseDateValue(aData[4]);

        if (evalDate >= dateStart && evalDate <= dateEnd) {
            return true;
        } else {
            return false;
        }

    });

// Function for converting a mm/dd/yyyy date value into a numeric string for comparison yyyymmdd(example 08/12/2010 becomes 20100812
function parseDateValue(rawDate) {
    var dateArray = rawDate.split("/");
    var parsedDate = dateArray[2] + dateArray[1] + dateArray[0];
    return parsedDate;
}

$(function() {
    tablaTransacciones_dt = tablaTransacciones.DataTable({
        language: {
            "emptyTable": "Nenhum registro encontrado",
            "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 até 0 de 0 registros",
            "infoFiltered": "(Filtrados de _MAX_ registros)",
            "infoThousands": ".",
            "loadingRecords": "Carregando...",
            "processing": "Processando...",
            "zeroRecords": "Nenhum registro encontrado",
            "search": "Pesquisar",
            "paginate": {
                "next": "Próximo",
                "previous": "Anterior",
                "first": "Primeiro",
                "last": "Último"
            },
            "aria": {
                "sortAscending": ": Ordenar colunas de forma ascendente",
                "sortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                },
                "1": "%d linha selecionada",
                "_": "%d linhas selecionadas",
                "cells": {
                    "1": "1 célula selecionada",
                    "_": "%d células selecionadas"
                },
                "columns": {
                    "1": "1 coluna selecionada",
                    "_": "%d colunas selecionadas"
                }
            },
            "buttons": {
                "copySuccess": {
                    "1": "Uma linha copiada com sucesso",
                    "_": "%d linhas copiadas com sucesso"
                },
                "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                "colvis": "Visibilidade da Coluna",
                "colvisRestore": "Restaurar Visibilidade",
                "copy": "Copiar",
                "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                "copyTitle": "Copiar para a Área de Transferência",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todos os registros",
                    "1": "Mostrar 1 registro",
                    "_": "Mostrar %d registros"
                },
                "pdf": "PDF",
                "print": "Imprimir"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Preencher todas as células com",
                "fillHorizontal": "Preencher células horizontalmente",
                "fillVertical": "Preencher células verticalmente"
            },
            "lengthMenu": "Exibir _MENU_ resultados por página",
            "searchBuilder": {
                "add": "Adicionar Condição",
                "button": {
                    "0": "Construtor de Pesquisa",
                    "_": "Construtor de Pesquisa (%d)"
                },
                "clearAll": "Limpar Tudo",
                "condition": "Condição",
                "conditions": {
                    "date": {
                        "after": "Depois",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vazio",
                        "equals": "Igual",
                        "not": "Não",
                        "notBetween": "Não Entre",
                        "notEmpty": "Não Vazio"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vazio",
                        "equals": "Igual",
                        "gt": "Maior Que",
                        "gte": "Maior ou Igual a",
                        "lt": "Menor Que",
                        "lte": "Menor ou Igual a",
                        "not": "Não",
                        "notBetween": "Não Entre",
                        "notEmpty": "Não Vazio"
                    },
                    "string": {
                        "contains": "Contém",
                        "empty": "Vazio",
                        "endsWith": "Termina Com",
                        "equals": "Igual",
                        "not": "Não",
                        "notEmpty": "Não Vazio",
                        "startsWith": "Começa Com"
                    },
                    "array": {
                        "contains": "Contém",
                        "empty": "Vazio",
                        "equals": "Igual à",
                        "not": "Não",
                        "notEmpty": "Não vazio",
                        "without": "Não possui"
                    }
                },
                "data": "Data",
                "deleteTitle": "Excluir regra de filtragem",
                "logicAnd": "E",
                "logicOr": "Ou",
                "title": {
                    "0": "Construtor de Pesquisa",
                    "_": "Construtor de Pesquisa (%d)"
                },
                "value": "Valor"
            },
            "searchPanes": {
                "clearMessage": "Limpar Tudo",
                "collapse": {
                    "0": "Painéis de Pesquisa",
                    "_": "Painéis de Pesquisa (%d)"
                },
                "count": "{total}",
                "countFiltered": "{shown} ({total})",
                "emptyPanes": "Nenhum Painel de Pesquisa",
                "loadMessage": "Carregando Painéis de Pesquisa...",
                "title": "Filtros Ativos"
            },
            "searchPlaceholder": "",
            "thousands": ".",
            "datetime": {
                "previous": "Anterior",
                "next": "Próximo",
                "hours": "Hora",
                "minutes": "Minuto",
                "seconds": "Segundo",
                "amPm": [
                    "am",
                    "pm"
                ],
                "unknown": "-"
            },
            "editor": {
                "close": "Fechar",
                "create": {
                    "button": "Novo",
                    "submit": "Criar",
                    "title": "Criar novo registro"
                },
                "edit": {
                    "button": "Editar",
                    "submit": "Atualizar",
                    "title": "Editar registro"
                },
                "error": {
                    "system": "Ocorreu um erro no sistema (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Mais informações<\/a>)."
                },
                "multi": {
                    "noMulti": "Essa entrada pode ser editada individualmente, mas não como parte do grupo",
                    "restore": "Desfazer alterações",
                    "title": "Multiplos valores",
                    "info": "Os itens selecionados contêm valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contrário, eles manterão seus valores individuais."
                },
                "remove": {
                    "button": "Remover",
                    "confirm": {
                        "_": "Tem certeza que quer deletar %d linhas?",
                        "1": "Tem certeza que quer deletar 1 linha?"
                    },
                    "submit": "Remover",
                    "title": "Remover registro"
                }
            },
            "decimal": ","
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
    }).buttons().container().appendTo('#vendas_wrapper .col-md-6:eq(0)');
    // Create event listeners that will filter the table whenever the user types in either date range box or
    // changes the value of either box using the Datepicker pop-up calendar
    $('#dateStart').change(function() {
        $('#vendas').DataTable().draw();
    });
    $('#dateEnd').change(function() {
        $('#vendas').DataTable().draw();
    });
});
</script>
<script>
$("#left").click(function() {
    alert("Data anterior");
});
$("#right").click(function() {
    alert("Próxima data");
});

$("#day").click(function() {
    var data = new Date();
    var dia = String(data.getDate()).padStart(2, '0');
    var mes = String(data.getMonth() + 1).padStart(2, '0');
    var ano = data.getFullYear();
    dataAtual = ano + '-' + mes + '-' + dia;
    $('#dateStart').val(dataAtual);
    $('#dateEnd').val(dataAtual);
});

$("#month").click(function() {
    var data = new Date();
    var dia = String(data.getDate()).padStart(2, '0');
    var mes = String(data.getMonth() + 1).padStart(2, '0');
    var ano = data.getFullYear();
    dataAtual = ano + '-' + mes + '-' + dia;
    $('#dateStart').val(dataAtual);
    $('#dateEnd').val(dataAtual);
});
$("#year").click(function() {
    alert("Filtro por ano");
});
</script>


@include('Site.Vendas.Modais.view')
@include('Site.Vendas.Modais.deletesale')
@include('Site.Vendas.Modais.opensale')
@include('Site.Vendas.Modais.closesale')


@endsection('content')