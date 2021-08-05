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

        if (evalDate >= dateStart && evalDate <= dateEnd) {
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
</script>