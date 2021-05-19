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
                                <div class="col-md-3">
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
                                            data-ratePayment="{{$payments->payment_rate}}">{{$payments->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="rgUser">Parcelas</label>
                                    <select class="form-control select2bs4" style="width: 100%;"
                                        placeholder="Selecione a parcela">
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
                                    <select class="form-control select2bs4" style="width: 100%;" id="shipping"
                                        name="shipping">
                                        <option>Selecione o frete</option>
                                        <option value="1">Por conta do cliente</option>
                                        <option value="2">Por conta da empresa</option>

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Valor do frete</label>
                                    <input type="text" class="form-control" id="shippingValue" name="shippingValue"
                                        value="{{$sales->platform_rate}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="rgUser">Desconto</label>
                                    <input type="text" class="form-control" id="discountSale" name="discountSale"
                                        value="{{$sales->discount}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="cpfUser">Valor da Venda</label>
                                    <input type="text" class="form-control" id="priceSale" name="priceSale"
                                        value="{{$sales->sale_price}}" Readonly>
                                </div>

                                <div class="col-md-2">
                                    <label for="rgUser">Taxa</label>
                                    <input type="hidden" id="ratePayment" name="ratePayment" value="0">
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
    var ratePayment = parseFloat(document.getElementById('ratePayment').value, 10);
    var priceSale = parseFloat(document.getElementById('priceSale').value, 10);
    var discount = parseFloat(document.getElementById('discountSale').value, 10);
    var ratePlatform = parseFloat(document.getElementById('ratePlatform').value, 10);

    rateValue = ((ratePayment / 100) * (priceSale - discount)).toFixed(2);
    if ()
        amountSale = (priceSale - discount - rateValue - ratePlatform).toFixed(2);

    document.getElementById('ratePaymentValue').value = rateValue;
    document.getElementById('amountSale').value = amountSale;
}

$(document).ready(function() {

    var soma = 0;
    $('#saleitens > tbody tr .subtotal').each(function(i) {
        soma += parseFloat($(this).text());
    });

    $("#priceSale").val(soma.toFixed(2));
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
        document.getElementById("platforms").value = "{{$sales->platform_id}}";
    }
    alert("Esta sim");

});

$("#discountSale").blur(function() {
    calcular();
});

$("#payment").change(function() {
    var ratePlatform = ($(this).find(':selected').attr('data-ratePayment'));
    document.getElementById('ratePayment').value = ratePlatform;
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
</script>

@include('Site.Vendas.Modais.new')
@include('Site.Vendas.Modais.edit')
@include('Site.Vendas.Modais.delete')

@endsection('content')