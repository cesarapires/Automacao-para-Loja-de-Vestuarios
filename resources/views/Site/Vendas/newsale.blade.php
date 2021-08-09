@extends('Layout.site')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Nova venda</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Usuário</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                        action="{{route('Site.SaveSales')}}">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="IDUser">Número da venda</label>
                                    <input type="text" class="form-control" id="idSale" name="idSale"
                                        value="{{$sales->sale_id}}" Readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="IDUser">Data da venda</label>
                                    <input type="date" class="form-control" id="dateSale" name="dateSale"
                                        value="{{date('Y-m-d')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="cpfUser">ID Cliente</label>
                                    <input type="text" class="form-control" id="idClient" name="idClient"
                                        value="{{$sales->client_id}}" Readonly>
                                </div>
                                <div class="col-md-3">
                                    <label>Cliente</label>
                                    <select class="form-control select2 select2-hidden-accessible" id="client" style="width: 100%;">
                                        <option value="NULL">Selecione o cliente</option>
                                        @foreach($clients as $clients)
                                        <option value="{{$clients->client_id}}">{{$clients->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="rgUser">Plataforma</label>
                                    <select class="form-control" id="platforms" name="platforms"
                                        style="width: 100%;">
                                        <option data-ratePlatform="0">Selecione a plataforma</option>
                                        @foreach($platforms as $platforms)
                                        <option value="{{$platforms->platform_id}}"
                                            data-ratePlatform="{{$platforms->platform_rate}}">{{$platforms->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Taxa Plataforma</label>
                                    <input type="number" class="form-control" id="ratePlatform" name="ratePlatform"
                                        value="{{$sales->platform_rate}}" Readonly step='0.01'>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="cpfUser">Pagamento</label>
                                    <select class="form-control" id="payment" name="payment"
                                        style="width: 100%;">
                                        <option data-ratePayment="100">Selecione a forma de pagamento
                                        </option>
                                        @foreach($payments as $payments)
                                        <option value="{{$payments->payment_id}}"
                                            data-ratePayment="{{$payments->payment_rate}}"
                                            data-ratefixPayment="{{$payments->payment_fixrate}}"
                                            data-ratevariablePayment="{{$payments->payment_ratevariable}}"
                                            data-exemption="{{$payments->plot_id}}"
                                            data-pagseguro='{{$payments->exemption}}'
                                            data-payment_ratetype="{{$payments->payment_ratetype}}">
                                            {{$payments->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Taxa Fixa</label>
                                    <input type="number" class="form-control" name="ratefixPayment" id="ratefixPayment"
                                        value="0" readonly step='0.01'>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Taxa Variável</label>
                                    <input type="number" class="form-control" name="ratePayment" id="ratePayment"
                                        value="0" readonly step='0.01'>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Taxa Mensal</label>
                                    <input type="number" class="form-control" id="ratevariablePayment"
                                        name="ratevariablePayment" value="0" Readonly step='0.01'>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="rgUser">Parcelas</label>
                                    <select class="form-control" id="plots" name="plots"
                                        style="width: 100%;">
                                        <option>Selecione as parcelas</option>
                                        @foreach($plots as $plots)
                                        <option value="{{$plots->plot_id}}" data-numPlot="{{$plots->number}}"
                                            data-namePlot="{{$plots->name}}">
                                            {{$plots->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Taxa Cliente</label>
                                    <input type="number" class="form-control" id="rateClient" name="rateClient"
                                        value="0" Readonly step='0.01'>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Taxa Vendedor</label>
                                    <input type="number" class="form-control" id="rateCompany" name="rateCompany"
                                        value="0" Readonly step='0.01'>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="rgUser">Frete</label>
                                    <select class="form-control" style="width: 100%;" name="shipping"
                                        id="shipping">
                                        <option>Selecione o frete</option>
                                        <option value="0">Por conta da empresa</option>
                                        <option value="1">Por conta do cliente</option>
                                        <option value="9">Sem frete</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Valor Frete</label>
                                    <input type="number" class="form-control" name="shippingValue" id="shippingValue"
                                        value="0" step='0.01'>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Desconto</label>
                                    <input type="number" class="form-control" id="discountSale" name="discountSale"
                                        value="0" step='0.01'>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="rgUser">Total Itens</label>
                                    <input type="number" class="form-control" id="itensTotal" name="itensTotal"
                                        value="0" readonly step='0.01'>
                                </div>
                                <div class="col-md-2">
                                    <label for="cpfUser">Valor da Venda</label>
                                    <input type="number" class="form-control" id="priceSale" name="priceSale" value="0"
                                        readonly step='0.01'>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Taxa</label>
                                    <input type="number" class="form-control" id="ratePaymentValue"
                                        name="ratePaymentValue" value="0" readonly step='0.01'>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Valor Final</label>
                                    <input type="number" class="form-control" id="amountSale" name="amountSale"
                                        value="0" readonly step='0.01'>
                                </div>
                            </div>
                            <br>
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaladdproduct">
                                <i class="fas fa-plus"></i>
                                Adicionar produto</a>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap" id="saleitens">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Código</th>
                                            <th>Descrição</th>
                                            <th>Tamanho</th>
                                            <th>Quantidade</th>
                                            <th>Valor</th>
                                            <th>Valor total</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($saleitens as $saleitens)
                                        <tr class="text-center">
                                            <td class='product_id'>{{$saleitens->product_id}}</td>
                                            <td class='product_name'>{{$saleitens->name}}</td>
                                            <td class='product_size'>{{$saleitens->size}}</td>
                                            <td class='quantityProduct'>{{$saleitens->quantity}}</td>
                                            <td class='priceProduct'>{{$saleitens->price}}</td>
                                            <td class='subtotal'>{{$saleitens->subtotal}}</td>
                                            <td class="project-actions text-right text-center edit">
                                                <button type="button" class="btn btn-outline-warning btn-sm"
                                                    data-toggle="modal" data-target="#modalEditIten" data-whatever='{
                                                "idSaleIten":"{{$saleitens->saleitens_id}}",
                                                "idProduct":"{{$saleitens->product_id}}",
                                                "quantityProduct":"{{$saleitens->quantity}}",
                                                "priceProduct":"{{$saleitens->price}}",
                                                "updatedAtItenSale":"{{$saleitens->updated_at}}"
                                                }'>
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Editar
                                                </button>
                                                <a class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                                    data-target="#modalDeleteIten" data-whatever='{
                                                "idSaleIten":"{{$saleitens->saleitens_id}}",
                                                "idProduct":"{{$saleitens->product_id}}",
                                                "nameProduct":"{{$saleitens->name}}"
                                                }'>
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Apagar
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
function calcular() {

    var sumItens = 0;

    $('#saleitens > tbody tr .subtotal').each(function(i) {
        sumItens += parseFloat($(this).text());
    });

    $("#itensTotal").val(sumItens);

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
        var rateValue = ((ratePayment / 100) * (priceSale) + ratefixPayment);
        var amountSale = (priceSale - rateValue - ratePlatform - shippingValue);
    }
    /*
    Frete por conta de qualquer pessoa, não incluido a empresa

    Porém, caso o frete esteja sendo pago por qualquer pessoa não incluido a empresa ele terá implicancia de
    taxa, sendo assim o valor do frete terá que ser somado no valor da venda, todavia no valor a ser recebido
    pela empresa não estará o valor referente a esse frete, pois ele terá que ser usado para pagar esse frete.
    */
    else {
        var priceSale = (sumItens + shippingValue - discount);
        var rateValue = ((ratePayment / 100) * (priceSale) + ratefixPayment);
        var amountSale = (priceSale - rateValue - ratePlatform)
    }



    /* ----- Cálculo do PagSeguro ----------*/
    ratevariablePayment = parseFloat((ratevariablePayment / 100)).toFixed(4);
    var valorParcela = parseFloat((priceSale) / numberPlot).toFixed(4);
    var rateVariableCompany = parseFloat(0);
    var rateVariableClient = parseFloat(0);
    var mult = 1;
    var priceRate = priceSale; 

    if (pagseguro == 1) {
        if (numberPlot > 1) {
            for (plot = 1; plot <= numberPlot; plot++) {
                rateVariableCompany = rateVariableCompany + valorParcela / (Math.pow(1 + parseFloat(
                    ratevariablePayment), plot));
            }
            rateVariableCompany = priceSale - rateVariableCompany;
            if (parseInt(numberPlot) > parseInt(plotExemption)) {

                mult = numberPlot - plotExemption;
                var p1 = priceSale * parseFloat(ratevariablePayment);
                var p2 = (Math.pow(1 + parseFloat(ratevariablePayment), mult));
                var p3 = (Math.pow(1 + parseFloat(ratevariablePayment), mult) - 1);

                valorParcela = (p1 * (p2 / p3));

                rateVariableClient = (valorParcela * mult) - priceSale;
                priceRate = valorParcela * mult;
            }

            rateVariableCompany = rateVariableCompany - rateVariableClient;
            priceSale = priceRate;

        }
    }

    amountSale = amountSale - rateVariableCompany;
    rateValue = rateValue + rateVariableCompany;

    $("#rateClient").val((rateVariableClient).toFixed(2));
    $("#rateCompany").val((rateVariableCompany).toFixed(2));

    $("#priceSale").val((priceSale).toFixed(2));
    $("#ratePaymentValue").val((rateValue).toFixed(2));
    $("#amountSale").val((amountSale).toFixed(2));
}

$(document).ready(function() {
    $(".select2").select2(
        
    );
    calcular();
});

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
</script>

@include('Site.Vendas.Modais.new')
@include('Site.Vendas.Modais.edit')
@include('Site.Vendas.Modais.delete')

@endsection('content')