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
                        action="{{route('Site.ProductsStore')}}">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="IDUser">Número da venda</label>
                                    <input type="text" class="form-control" id="idSale" name="idSale"
                                        value="{{$sales->sale_id}}" Readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="cpfUser">ID Cliente</label>
                                    <input type="text" class="form-control" id="idClient" name="idClient"
                                        value="{{$sales->client_id}}" Readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Cliente</label>
                                    <select class="form-control select2bs4" id="client" style="width: 100%;">
                                        <option value="NULL">Selecione o cliente</option>
                                        @foreach($clients as $clients)
                                        <option value="{{$clients->client_id}}">{{$clients->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="rgUser">Plataforma</label>
                                    <select class="form-control select2bs4" id="platforms" style="width: 100%;">
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
                                    <input type="text" class="form-control" id="ratePlatform" name="ratePlatform"
                                        value="{{$sales->platform_rate}}" Readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="cpfUser">Pagamento</label>
                                    <select class="form-control select2bs4" id="payment" style="width: 100%;">
                                        <option data-ratePayment="100">Selecione a forma de pagamento
                                        </option>
                                        @foreach($payments as $payments)
                                        <option value="{{$payments->payment_id}}"
                                            data-ratePayment="{{$payments->payment_rate}}" data-ratefixPayment="{{$payments->payment_fixrate}}">{{$payments->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Taxa Fixa</label>
                                    <input type="text" class="form-control" name="ratefixPayment" id="ratefixPayment" value="{{$sales->fixrate_payment}}" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Taxa Variável</label>
                                    <input type="text" class="form-control" name="ratePayment" id="ratePayment" value="{{$sales->rate_payment}}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="rgUser">Parcelas</label>
                                    <select class="form-control select2bs4" style="width: 100%;">
                                        <option>Selecione as parcelas</option>
                                        @foreach($plots as $plots)
                                        <option value="{{$plots->plot_id}}">{{$plots->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="rgUser">Frete</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="shipping" id="shipping">
                                        <option>Selecione o frete</option>
                                        <option value="0">Por conta da empresa</option>
                                        <option value="1">Por conta do cliente</option>
                                        <option value="9">Sem frete</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Valor Frete</label>
                                    <input type="text" class="form-control" name="shippingValue" id="shippingValue" value="{{$sales->shipping}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="rgUser">Desconto</label>
                                    <input type="text" class="form-control" id="discountSale" name="discountSale" value="{{$sales->discount}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="cpfUser">Valor da Venda</label>
                                    <input type="text" class="form-control" id="priceSale" name="priceSale" value="{{$sales->sale_price}}" Readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Taxa</label>
                                    <input type="text" class="form-control" id="ratePaymentValue"
                                        name="ratePaymentValue" value="{{$sales->plot_rate}}" Readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Valor Final</label>
                                    <input type="text" class="form-control" id="amountSale" name="amountSale"
                                        value="{{$sales->amount}}" Readonly>
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

<script>
function calcular() {

    var sumItens = 0;

    $('#saleitens > tbody tr .subtotal').each(function(i) {
        sumItens += parseFloat($(this).text());
    });

    $("#priceSale").val(sumItens);

    var priceSale =  parseFloat($("#priceSale").val());
    var discount =  parseFloat($("#discountSale").val());
    var ratefixPayment = parseFloat($("#ratefixPayment").val());
    var ratePayment =  parseFloat($("#ratePayment").val());
    var ratePlatform =  parseFloat($("#ratePlatform").val());
    var idShipping = ($("#shipping").find(':selected').val());
    var shippingValue =  parseFloat($("#shippingValue").val());
    rateValue = ((ratePayment/100) * (priceSale - discount + shippingValue) + ratefixPayment);

    if(idShipping == 0){
        amountSale = (priceSale - discount - rateValue - ratePlatform - shippingValue);
    }
    else{
        amountSale = (priceSale - discount - rateValue - ratePlatform);
    }
    
    $("#ratePaymentValue").val((rateValue).toFixed(2));
    $("#amountSale").val((amountSale).toFixed(2));
}

$(document).ready(function() {

    calcular();

    if ("{{$sales->payment_id}}" == "") {
        documento.getElementById("payment").selectedIndex = "0";
    } else {
        document.getElementById("payment").value = "{{$sales->payment_id}}";
    }
    if ("{{$sales->client_id}}" == "") {
        documento.getElementById("client").selectedIndex = "0";
    } else {
        document.getElementById("client").value = "{{$sales->client_id}}";
    }
    if ("{{$sales->platform_id}}" == "") {
        document.getElementById("platforms").selectedIndex = "0";
    } else {
        document.getElementById("platforms").value = "{{$sales->payment_id}}";
    }
    alert("Esta sim");

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
    $('#ratePayment').val(ratePlatform);
    $('#ratefixPayment').val(ratefixPayment);
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

$("#shipping").change(function(){
    var idShipping = ($(this).find(':selected').val());
    if(idShipping == 9){
        $("#shippingValue").prop('readonly', true);
        $("#shippingValue").val(0);
    }
    else{
        $("#shippingValue").prop('readonly', false);
    }
    calcular();
});
</script>

@include('Site.Vendas.Modais.new')
@include('Site.Vendas.Modais.edit')
@include('Site.Vendas.Modais.delete')

@endsection('content')