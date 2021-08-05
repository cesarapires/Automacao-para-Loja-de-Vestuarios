@extends('Layout.site')

@section('content')

<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Contas a Pagar | <a class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modalnewpayable">
                        <i class="fas fa-plus"></i>
                        Nova</a>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard v1 | Contas a Pagar</li>
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
                                    <th>Credor</th>
                                    <th>Data</th>
                                    <th>Vencimento</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payables as $payables)
                                <tr class="text-center">
                                    <td>{{$payables->payable_id}}</td>
                                    <td>{{$payables->name}}</td>
                                    <td>{{date('d/m/Y', strtotime($payables->date_buypayable))}}</td>
                                    <td>{{date('d/m/Y', strtotime($payables->date_duepayable))}}</td>
                                    <td>R$ {!!number_format($payables->value,2, ',', ' ')!!}</td>
                                    <td>
                                        @if($payables->status == 1)
                                        <i class="far fa-check-square"></i>
                                        @else
                                        <i class="far fa-square"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                            data-target="#modaledtpayable" data-whatever='{{$payables->payable_id}}'>
                                            <i class="fas fa-pencil-alt"></i>
                                            Editar
                                        </button>
                                        <button class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modaldelpayable" data-whatever='{{$payables->payable_id}}'>
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

@include('Site.Contas.ContasPagar.Modal.new')
@include('Site.Contas.ContasPagar.Modal.edit')
@include('Site.Contas.ContasPagar.Modal.delete')

@endsection('content')