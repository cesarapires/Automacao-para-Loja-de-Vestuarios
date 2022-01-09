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
                                        value="<?= $sales->date_sale ?? date('Y-m-d')?>">
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
                                    <select class="form-control select2bs4" id="client" style="width: 100%;" value="{{$sales->client_id}}">
                                        <option value="NULL">Selecione o cliente</option>
                                        @foreach($clients as $clients)
                                        <option value="{{$clients->client_id}}" <?= $sales->client_id == $clients->client_id ? "selected" : null?>>
                                            {{$clients->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="rgUser">Plataforma</label>
                                    <select class="form-control" id="platforms" name="platforms" style="width: 100%;" value="{{$sales->platform_id}}">
                                        <option data-ratePlatform="0">Selecione a plataforma</option>
                                        @foreach($platforms as $platforms)
                                        <option value="{{$platforms->platform_id}}" data-ratePlatform="{{$platforms->platform_rate}}" <?= $sales->platform_id == $platforms->platform_id ? "selected" : null?>>
                                            {{$platforms->name}}
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
                                    <select class="form-control" id="payment" name="payment" style="width: 100%;">
                                        <option data-ratePayment="100">Selecione a forma de pagamento
                                        </option>
                                        @foreach($payments as $payments)
                                        <option value="{{$payments->payment_id}}"
                                            data-ratePayment="{{$payments->payment_rate}}"
                                            data-ratefixPayment="{{$payments->payment_fixrate}}"
                                            data-ratevariablePayment="{{$payments->payment_ratevariable}}"
                                            data-exemption="{{$payments->plot_id}}"
                                            data-pagseguro='{{$payments->exemption}}'
                                            data-payment_ratetype="{{$payments->payment_ratetype}}"
                                            <?= $sales->payment_id == $payments->payment_id ? "selected" : null?>>
                                            {{$payments->name}}
                                        </option>
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
                                    <select class="form-control" id="plots" name="plots" style="width: 100%;">
                                        <option>Selecione as parcelas</option>
                                        @foreach($plots as $plots)
                                        <option value="{{$plots->plot_id}}" data-numPlot="{{$plots->number}}" data-namePlot="{{$plots->name}}" <?= $sales->plot_id == $plots->plot_id ? "selected" : null?>>
                                            {{$plots->name}}
                                        </option>
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
                                    <select class="form-control" style="width: 100%;" name="shipping" id="shipping">
                                        <option>Selecione o frete</option>
                                        <option value="0" <?= $sales->shipping_id == 0 ? "selected" : null?>>Por conta da empresa</option>
                                        <option value="1" <?= $sales->shipping_id == 1 ? "selected" : null?>>Por conta do cliente</option>
                                        <option value="9" <?= $sales->shipping_id == 9 ? "selected" : null?>>Sem frete</option>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_item"
                                        style="paddin: 0px 0px 20px 0px">
                                        <i class="fas fa-plus"></i>
                                        Adicionar produto
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body table-responsive p-0">
                                        <table id="itens" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Descrição</th>
                                                    <th>Quantidade</th>
                                                    <th>Valor</th>
                                                    <th class="subtotal">Valor total</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
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

<script src="{{asset('js/scripts/sale.js')}}"></script>

@include('Site.Vendas.modal_item')

@endsection('content')
