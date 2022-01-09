$(document).ready(function() {
    loadtable();
});

function loadtable() {
    let sale_id = $('#idSale').val();

    $('#itens').DataTable({
        "language": {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        },
        "destroy": true,
        "processing": true,
        "deferRender": true,
        "datatype": 'json',
        "ajax": {
            "url": `http://127.0.0.1:8000/api/saleitens/listsaleitens/${sale_id}`,
            "type": "POST",
        },
        "columns": [
            { "data": "product_id" },
            { "data": "name" },
            { "data": 'quantity' },
            { "data": 'price', render: $.fn.dataTable.render.number(' ', ',', 2, 'R$ ')},
            { "data": 'subtotal', render: $.fn.dataTable.render.number(' ', ',', 2, 'R$ ')},
        ],
        columnDefs: [{
            "className": "project-actions text-right text-center edit",
            "defaultContent": "-",
            "targets": [5],
            "render": function (data, type, row, meta) {
                {
                    return '<a class="btn btn-outline-warning btn-sm" data-toggle="modal" data-funcao="edit" data-target="#modal_item" data-value="'+row.saleitens_id+'"><i class="fas fa-pencil-alt"></i> Editar</a>  <a class="btnEdit btn btn-outline-danger btn-sm" data-target="#modal_item" data-toggle="modal" data-funcao="delete" data-value="'+row.saleitens_id+'"><i class="fas fa-trash"></i> Remover</a>'
                }
            }
        }],
        "fnDrawCallback": function() {
            calcular();
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
    });
    calcular();
}

function calcular() {

    let sumItens = 0;

    let table = ($('#itens'));
    table.find('tbody > tr').each(function() {
        sumItens += parseFloat($(this).find('td').eq(4).text().substr(2).replace(',','.')) || 0;
    });

    $("#itensTotal").val(sumItens.toFixed(2));

    var discount = parseFloat($("#discountSale").val());
    var ratefixPayment = parseFloat($("#ratefixPayment").val());
    var ratevariablePayment = parseFloat($('#ratevariablePayment').val());
    var ratePayment = parseFloat($("#ratePayment").val());
    var ratePlatform = parseFloat($("#ratePlatform").val());
    var idShipping = ($("#shipping").find(':selected').val());
    var shippingValue = parseFloat($("#shippingValue").val());

    var plotExemption = ($("#payment").find(':selected').attr('data-exemption'));
    var pagseguro = ($("#payment").find(':selected').attr('data-pagseguro'));
    var plotID = ($("#plots").find(':selected').val());
    var numberPlot = ($("#plots").find(':selected').attr('data-numPlot'));

    /*
    Frete por conta da empresa:

    Caso o frete esteja sendo feito por conta da empresa, ele não irá somar no valor da venda para o cliente,
    ou seja não terá implicancia de taxa sobre esse frete, mas no valor recebido referente a venda ele terá o
    desconto, já que ele será pago pela empresa.
    */
    if (idShipping == 0) {
        var priceSale = (sumItens - discount);
    }
    /*
    Frete por conta de qualquer pessoa, não incluido a empresa

    Porém, caso o frete esteja sendo pago por qualquer pessoa não incluido a empresa ele terá implicancia de
    taxa, sendo assim o valor do frete terá que ser somado no valor da venda, todavia no valor a ser recebido
    pela empresa não estará o valor referente a esse frete, pois ele terá que ser usado para pagar esse frete.
    */
    else {
        var priceSale = (sumItens + shippingValue - discount);
    }
    var rateValue = ((ratePayment / 100) * (priceSale) + ratefixPayment);
    var amountSale = (priceSale - rateValue - ratePlatform);

    /* ----- Cálculo do PagSeguro ----------*/
    ratevariablePayment = parseFloat((ratevariablePayment / 100)).toFixed(4);
    var rateVariableCompany = parseFloat(0);
    var rateVariableClient = parseFloat(0);
    var priceRate = priceSale;

    if (pagseguro == 1) {

        if (numberPlot > 1) {
            var fator = parseFloat(ratevariablePayment)/(1-1/(Math.pow(1 + parseFloat(ratevariablePayment), numberPlot)));
            valorParcela  = priceSale*fator
            priceRate = numberPlot*valorParcela;
        }
        rateVariableCompany = priceSale*ratevariablePayment;
        rateVariableClient = priceRate - priceSale;
        priceSale = priceRate;
    }
    else {
        rateVariableCompany = priceSale*parseFloat(ratePayment/100).toFixed(4);
    }

    amountSale = amountSale - rateVariableCompany - ratefixPayment;
    rateValue = rateVariableClient + rateVariableCompany + ratefixPayment;

    $("#rateClient").val(rateVariableClient.toFixed(2));
    $("#rateCompany").val(rateVariableCompany.toFixed(2));

    $("#priceSale").val(priceSale.toFixed(2));
    $("#ratePaymentValue").val(rateValue.toFixed(2));
    $("#amountSale").val(amountSale.toFixed(2));
}



$("#discountSale").blur(function() {
    calcular();
});

$("#shippingValue").blur(function() {
    calcular();
});

$("#payment").change(function() {
    var ratePlatform = ($(this).find(':selected').attr('data-ratePayment'));
    var ratefixPayment = ($(this).find(':selected').attr('data-ratefixPayment'));
    var ratevariablePayment = ($(this).find(':selected').attr('data-ratevariablePayment'));
    var plotexemption = ($(this).find(':selected').attr('data-plotid'));
    $('#ratePayment').val(ratePlatform);
    $('#ratefixPayment').val(ratefixPayment);
    $('#ratevariablePayment').val(ratevariablePayment);
    calcular();
});

$("#platforms").change(function() {
    var ratePlatform = ($(this).find(':selected').attr('data-ratePlatform'));
    document.getElementById('ratePlatform').value = ratePlatform;
    calcular();
});

$("#client").change(function() {
    var idClient = ($(this).find(':selected').val());
    document.getElementById('idClient').value = idClient;
});

$("#plots").change(function() {
    calcular();
});

$("#shipping").change(function() {
    var idShipping = ($(this).find(':selected').val());
    if (idShipping == 9) {
        $("#shippingValue").prop('readonly', true);
        $("#shippingValue").val(0);
    } else {
        $("#shippingValue").prop('readonly', false);
    }
    calcular();
});
