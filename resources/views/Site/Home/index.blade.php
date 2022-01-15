@extends('Layout.site')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard v1 | Home</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>R$ {!!number_format($cashier,2, ',', ' ')!!}</h3>

                        <p>Caixa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cash-register"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>R$ {!!number_format($stockPrice,2, ',', ' ')!!}</h3>

                        <p>Valor do estoque</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-check"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>R$ {!!number_format($receivable,2, ',', ' ')!!}</h3>

                        <p>Contas a receber</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>R$ {!!number_format($payable,2, ',', ' ')!!}</sup></h3>

                        <p>Contas a pagar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class='row'>
            <div class='col-md-6'>
                <!-- BAR CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Balanço Mensal</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class='col-md-6'>
                <!-- BAR CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Buscar Contas</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body"
                        style="min-height: 290px; height: 290px; max-height: 290px; max-width: 100%;">
                        <div class='row'>
                            <div class='col-12'>
                                <label for="inputNameProduct">Cliente</label>
                                <select class="form-control select2bs4" id="client" style="width: 100%;">
                                    <option value="NULL">Selecione o cliente</option>
                                    @foreach($clients as $clients)
                                    <option value="{{$clients->client_id}}">{{$clients->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-6'>
                                <label for="inputNameProduct">Valor Aberto</label>
                                <input type="number" class="form-control" name="valueOpen" id="valueOpen"
                                    placeholder="" readonly step='0.01'>
                            </div>
                            <div class='col-6'>
                                <label for="inputNameProduct">Valor Vencido</label>
                                <input type="number" class="form-control" name="valueDue" id="valueDue"
                                    placeholder="" readonly step='0.01'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-6'>
                                <label for="inputNameProduct">Data da última venda</label>
                                <input type="date" class="form-control" name="date_lastsale" id="date_lastsale"
                                    placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<script src="{{asset('js/scripts/home.js')}}"></script>
@endsection('content')
