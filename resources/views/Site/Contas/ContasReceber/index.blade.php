@extends('Layout.site')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Contas a Receber</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard</li>
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
                        <a class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modal_receivables" data-funcao="new">
                        <i class="fas fa-plus"></i> Nova</a>
                        <a class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#modal_receivables">
                        <i class="fas fa-hand-holding-usd" data-funcao=""></i> Receber</a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="IDUser">Filtrar data por</label>
                                    <select type="date" class="form-control" data-target="#dateStart" value=""
                                        id="datetype" name="datetype">
                                        <option value="0">Data da compra</option>
                                        <option value="1" selected>Data de vencimento</option>
                                    </select>
                                </div>
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
                                        <label>Forma de pagamento</label>
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
                                            <button type="button" id="receivableclose" class="btn btn-default">Fechados</button>
                                            <button type="button" id="receivableopen" class="btn btn-default">Abertos</button>
                                            <button type="button" id="receivabledue" class="btn btn-default">Vencidos</button>
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
                                        <button type="button" class="btn btn-block btn-success btn-sm">Pago</button>
                                        @else
                                            @if($receivables->date_duereceivable > date("Y-m-d", strtotime('now')))
                                                <button type="button" class="btn btn-block btn-warning btn-sm">Aberto</button>
                                            @else
                                                <button type="button" class="btn btn-block btn-danger btn-sm">Vencido</button>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                        data-target="#modal_receivables" data-funcao="edit"
                                            data-value='{{$receivables->receivable_id}}'>
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                        data-target="#modal_receivables" data-funcao="delete"
                                            data-value='{{$receivables->receivable_id}}'>
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

<script src="{{asset('js/scripts/receivable.js')}}"></script>

@include('Site.Contas.ContasReceber.Modal.modal_receivable')


@endsection('content')
