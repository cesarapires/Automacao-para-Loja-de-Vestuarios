@extends('Layout.site')

@section('content')

<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Contas a Receber | <a class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modalnewreceiable">
                        <i class="fas fa-plus"></i>
                        Nova</a>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard v1 | Contas a Receber</li>
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
                                    <input type="date" class="form-control" data-target="#dateStart" value=""
                                        id="dateStart" name="dateStart">
                                </div>
                                <div class="col-md-3">
                                    <label for="IDUser">Data final</label>
                                    <input type="date" class="form-control" data-target="#dateEnd" value="" id="dateEnd"
                                        name="dateEnd">
                                </div>

                                <div class="col-md-3">
                                    <label>ㅤ</label>
                                    <div class="input-group date" data-target-input="nearest">
                                        <div class="btn-group">
                                            <button type="button" id="left" class="btn btn-block btn-default">
                                                <i class="fas fa-arrow-left"></i>
                                            </button>
                                            <button type="button" id="year" class="btn btn-default">Ano</button>
                                            <button type="button" id="month" class="btn btn-default">Mês</button>
                                            <button type="button" id="day" class="btn btn-default">Dia</button>
                                            <button type="button" id="right" class="btn btn-block btn-default">
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Filtrar por tipo</label>
                                        <select class="form-control" id="filterPayment">
                                            <option>Todos</option>
                                            @foreach($payments as $payments)
                                            <option value="{{$payments->name}}">{{$payments->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>ㅤ</label>
                                    <div class="input-group date" data-target-input="nearest">
                                        <div class="btn-group">
                                            <button type="button" id="year" class="btn btn-default">Abertos</button>
                                            <button type="button" id="month" class="btn btn-default">Vencidos</button>
                                            <button type="button" id="exitFilter" class="btn btn-default"><i
                                                    class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="vendas" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Cliente</th>
                                    <th>ID Venda</th>
                                    <th>Forma</th>
                                    <th>Data</th>
                                    <th>Parcela</th>
                                    <th>Vencimento</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($receivables as $receivables)
                                <tr class="text-center">
                                    <td>{{$receivables->nameClient}}</td>
                                    <td>{{$receivables->sale_id}}</td>
                                    <td>{{$receivables->namePayment}}</td>
                                    <td>{{date('d/m/Y', strtotime($receivables->date_sale))}}</td>
                                    <td>{{$receivables->numberplot }}</td>
                                    <td>{{date('d/m/Y', strtotime($receivables->date_duereceivable))}}</td>
                                    <td>R$ {!!number_format($receivables->value,2, ',', ' ')!!}</td>
                                    <td>
                                        @if($receivables->status == 1)
                                        <i class="far fa-check-square"></i>
                                        @else
                                        <i class="far fa-square"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                            data-target="#modaledtreceivable"
                                            data-whatever='{{$receivables->receivable_id}}'>
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modaldelreceivable"
                                            data-whatever='{{$receivables->receivable_id}}'>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
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


<script>
$(document).ready(function() {
    $("#day").removeClass('active');
    $("#month").addClass('active');
    $("#year").removeClass('active');
    var primeiraData = moment().startOf('month').format('YYYY-MM-DD');
    var segundaData = moment().endOf('month').format('YYYY-MM-DD');
    $('#dateStart').val(primeiraData);
    $('#dateEnd').val(segundaData);


});

var tablaTransacciones = $('#vendas');

var tablaTransacciones_dt = null

// The plugin function for adding a new filtering routine
$.fn.dataTableExt.afnFiltering.push(
    function(oSettings, aData, iDataIndex) {
        var filterPayment = true;
        var filterdateSale = true;
        var filterdateDue = true;
        var index;
        $('#vendas thead tr').each((tr_idx, tr) => {
            $(tr).children('th').each((th_idx, th) => {
                if ($(th).text() == 'Data') {
                    index = th_idx;
                }
            });
        });
        var dateStart = removefeature($("#dateStart").val());
        var dateEnd = removefeature($("#dateEnd").val());
        // aData represents the table structure as an array of columns, so the script access the date value
        // in the first column of the table via aData[0]

        var evalDate = removebar(aData[index]);

        if ($('#filterPayment').find(':selected').val() == 'Todos') {
            filterPayment = true;
        } else {
            if (aData[2] == $('#filterPayment').find(':selected').val()) {
                filterPayment = true;
            } else {
                filterPayment = false;
            }
        }

        if (evalDate >= dateStart && evalDate <= dateEnd) {
            filterdateSale = true;
        } else {
            filterdateSale = false;
        }

        if (filterdateSale && filterPayment) {
            return true;
        } else {
            return false;
        }


    });

function removefeature(rawDate) {
    var dateArray = rawDate.split("-");
    var parsedDate = dateArray[0] + dateArray[1] + dateArray[2];
    return parsedDate;
}


// Function for converting a mm/dd/yyyy date value into a numeric string for comparison yyyymmdd(example 08/12/2010 becomes 20100812
function removebar(rawDate) {
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
});
</script>

<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script>
$('#dateStart').change(function() {
    $('#vendas').DataTable().draw();
});
$('#dateEnd').change(function() {
    $('#vendas').DataTable().draw();
});

$("#left").click(function() {
    $("#left").removeClass('active');
    var primeiraData = $('#dateStart').val();
    var segundaData = $('#dateEnd').val();
    if ($("#day").hasClass("active")) {
        primeiraData = moment(primeiraData).subtract(1, 'days').format('YYYY-MM-DD');
        segundaData = moment(segundaData).subtract(1, 'days').format('YYYY-MM-DD');
    } else if ($("#month").hasClass("active")) {
        primeiraData = moment(primeiraData).subtract(1, 'month').format('YYYY-MM-DD');
        segundaData = moment(segundaData).subtract(1, 'month').format('YYYY-MM-DD');
    } else if ($("#year").hasClass("active")) {
        primeiraData = moment(primeiraData).subtract(1, 'year').format('YYYY-MM-DD');
        segundaData = moment(segundaData).subtract(1, 'year').format('YYYY-MM-DD');
    }
    $('#dateStart').val(primeiraData);
    $('#dateEnd').val(segundaData);
    $('#vendas').DataTable().draw();
});
$("#right").click(function() {
    var primeiraData = $('#dateStart').val();
    var segundaData = $('#dateEnd').val();
    if ($("#day").hasClass("active")) {
        primeiraData = moment(primeiraData).add(1, 'days').format('YYYY-MM-DD');
        segundaData = moment(segundaData).add(1, 'days').format('YYYY-MM-DD');
    } else if ($("#month").hasClass("active")) {
        primeiraData = moment(primeiraData).add(1, 'month').format('YYYY-MM-DD');
        segundaData = moment(segundaData).add(1, 'month').format('YYYY-MM-DD');
    } else if ($("#year").hasClass("active")) {
        primeiraData = moment(primeiraData).add(1, 'year').format('YYYY-MM-DD');
        segundaData = moment(segundaData).add(1, 'year').format('YYYY-MM-DD');
    }
    $('#dateStart').val(primeiraData);
    $('#dateEnd').val(segundaData);
    $('#vendas').DataTable().draw();
});

$("#day").click(function() {
    $("#day").addClass('active');
    $("#month").removeClass('active');
    $("#year").removeClass('active');
    var primeiraData = moment().format('YYYY-MM-DD');
    var segundaData = moment().format('YYYY-MM-DD');
    $('#dateStart').val(primeiraData);
    $('#dateEnd').val(segundaData);
    $('#vendas').DataTable().draw();
});

$("#month").click(function() {
    $("#day").removeClass('active');
    $("#month").addClass('active');
    $("#year").removeClass('active');
    var primeiraData = moment().startOf('month').format('YYYY-MM-DD');
    var segundaData = moment().endOf('month').format('YYYY-MM-DD');
    $('#dateStart').val(primeiraData);
    $('#dateEnd').val(segundaData);
    $('#vendas').DataTable().draw();
});
$("#year").click(function() {
    $("#day").removeClass('active');
    $("#month").removeClass('active');
    $("#year").addClass('active');
    var primeiraData = moment().startOf('year').format('YYYY-MM-DD');
    var segundaData = moment().endOf('year').format('YYYY-MM-DD');
    $('#dateStart').val(primeiraData);
    $('#dateEnd').val(segundaData);
    $('#vendas').DataTable().draw();
});

$("#filterPayment").change(function() {
    $('#vendas').DataTable().draw();
});
</script>

@include('Site.Contas.ContasReceber.Modal.new')
@include('Site.Contas.ContasReceber.Modal.edit')
@include('Site.Contas.ContasReceber.Modal.delete')


@endsection('content')