var base_url = window.location.origin;

$(document).ready(function() {
    $("#day").removeClass('active');
    $("#month").addClass('active');
    $("#year").removeClass('active');
    var primeiraData = moment().startOf('month').format('YYYY-MM-DD');
    var segundaData = moment().endOf('month').format('YYYY-MM-DD');
    $('#dateStart').val(primeiraData);
    $('#dateEnd').val(segundaData);
    // $('.sidebar-mini').addClass(''sidebar-collapse');
    loadtable();
});

function removerClasse() {
    $("#receivableopen").removeClass('active');
    $("#receivabledue").removeClass('active');
    $("#receivableclose").removeClass('active');
};

$('#datetype').on('click', function(){
    $('#vendas').DataTable().draw();
});

$('#receivableopen').on('click', function() {
    removerClasse();
    $("#receivableopen").addClass('active');
    $('#vendas').DataTable().draw();
});

$('#receivabledue').on('click', function() {
    removerClasse();
    $("#receivabledue").addClass('active');
    $('#vendas').DataTable().draw();
});

$('#receivableclose').on('click', function() {
    removerClasse();
    $("#receivableclose").addClass('active');
    $('#vendas').DataTable().draw();
});

$('#exitFilter').on('click', function() {
    removerClasse();
    $('#vendas').DataTable().draw();
});



function loadtable() {

    var tablaTransacciones_dt = null

    // The plugin function for adding a new filtering routine
    $.fn.dataTableExt.afnFiltering.push(
        function(oSettings, aData, iDataIndex) {
            var filterPayment = true;
            var filterStatus = true;
            var filterdateDue = true;

            //Filtrar por data de vencimento index = 5, filtro por data da compra index = 2
            $('#datetype').val() == 0 ? index = 3 : index = 5;

            var dateStart = removefeature($("#dateStart").val());
            var dateEnd = removefeature($("#dateEnd").val());

            var evalDate = removebar(aData[index]);
            var dueDate = removebar(aData[5]);
            var data = moment().format('YYYYMMDD')

            //Filtro por forma de pagamento
            if ($('#filterPayment').find(':selected').val() == 'Todos') {
                filterPayment = true;
            } else {
                if (aData[2] == $('#filterPayment').find(':selected').val()) {
                    filterPayment = true;
                } else {
                    filterPayment = false;
                }
            }

            //Filtro por Status - Filtrar as contas abertas
            if ($("#receivableopen").hasClass("active")) {
                if (aData[7] == "Aberto") {
                    filterStatus = true;
                }
                else {
                    filterStatus = false;
                }
            }
            //Filtrar as fechadas
            else if ($("#receivableclose").hasClass("active")) {
                if (aData[7] == "Pago") {
                    filterStatus = true;
                }
                else {
                    filterStatus = false;
                }
            }
            //Filtrar as contas vencidas
            else if ($("#receivabledue").hasClass("active")) {
                if (aData[7] == "Vencido") {
                    filterStatus = true;
                }
                else {
                    filterStatus = false;
                }
            }
            else{
                filterStatus = true;
            }
            //Filtro de datas
            if (evalDate >= dateStart && evalDate <= dateEnd) {
                filterdateSale = true;
            } else {
                filterdateSale = false;
            }

            if (filterdateSale && filterPayment && filterStatus) {
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
        tablaTransacciones_dt = $('#vendas').DataTable({
            "columnDefs": [{
                "targets": [8],
                "visible": false,
                "searchable": false
            }],
            "language": {
                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
        }).buttons().container().appendTo('#vendas_wrapper .col-md-6:eq(0)');
        // Create event listeners that will filter the table whenever the user types in either date range box or
        // changes the value of either box using the Datepicker pop-up calendar
    });

}

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
