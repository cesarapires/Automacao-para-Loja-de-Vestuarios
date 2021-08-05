@extends('Layout.site')

@section('content')

<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Caixa | <button class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modalnewcashier">
                        <i class="fas fa-plus"></i>
                        Nova</button>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard v1 | Caixa</li>
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
                        <h3 class="card-title">

                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
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
                                @include('Site.DataFilter.date')
                            </div>
                        </div>
                        <table id="vendas" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Data</th>
                                    <th>Descrição</th>
                                    <th>Origem</th>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cashiers as $cashiers)
                                <tr class="text-center">
                                    <td>{{$cashiers->cashier_id}}</td>
                                    <td>{{date('d/m/Y', strtotime($cashiers->date_receivable))}}</td>
                                    <td>{{$cashiers->description}}</td>
                                    @if($cashiers->payable_id <> null)
                                        <td>Contas a Pagar</td>
                                        @elseif($cashiers->receivable_id <> null)
                                            <td>Contas a Receber</td>
                                            @elseif($cashiers->sale_id<> null)
                                                <td>Vendas</td>
                                                @else
                                                <td>Outros</td>
                                                @endif
                                                <td>
                                                    @if($cashiers->type == 'C')
                                                    Crédito
                                                </td>

                                                <td><span style="color: green">R$
                                                        {!!number_format($cashiers->value,2, ',', ' ')!!}</span></td>

                                                @else
                                                Débito
                                                </td>
                                                <td><span style="color: red">R$
                                                        {!!number_format($cashiers->value,2, ',', ' ')!!}</span></td>
                                                @endif

                                                <td>
                                                    <button class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                                        data-target="#modaledtcashier"
                                                        data-whatever='{{$cashiers->cashier_id}}'>
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Editar
                                                    </button>
                                                    <button class="btnEdit btn btn-outline-danger btn-sm"
                                                        data-toggle="modal" data-target="#modaldelcashier"
                                                        data-whatever='{{$cashiers->cashier_id}}'>
                                                        <i class="fas fa-trash"></i>
                                                        Apagar
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

@include('Site.DataFilter.filteringdate')

@include('Site.Caixa.Modal.new')
@include('Site.Caixa.Modal.edit')
@include('Site.Caixa.Modal.delete')

@endsection('content')