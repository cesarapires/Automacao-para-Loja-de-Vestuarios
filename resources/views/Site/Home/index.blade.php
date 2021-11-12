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
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
});

$("#client").change(function() {
    var idClient = ($(this).find(':selected').val());
    var request = new XMLHttpRequest();
    request.open('GET', "{{url('ContasReceber/SomarTotaisCliente')}}/"+idClient);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var receivable = request.response;
        $('#valueDue').val(receivable.due);
        $('#valueOpen').val(receivable.open);
        $('#date_lastsale').val(receivable.date_receivable.date_sale);
    }
});

$(function() {
    var request = new XMLHttpRequest();
    request.open('GET', "{{url('Caixa/Grafico')}}");
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        
        const ctx = document.getElementById('barChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(request.response.credit),
                datasets: [{
                        label: 'Receita',
                        backgroundColor: 'rgba(31,163,53,1)',
                        borderColor: 'rgba(31,163,53,1)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(31,163,53,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(31,163,53,1)',
                        data: Object.values(request.response.credit)
                    },
                    {
                        label: 'Despesa',
                        backgroundColor: 'rgba(227, 41, 41, 1)',
                        borderColor: 'rgba(227, 41, 41, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(227, 41, 41, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(227, 41, 41, 1)',
                        data: Object.values(request.response.debit)
                    },
                ]
            },

            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
})
</script>
@endsection('content')