@extends('Layout.site')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Contas a Pagar | <a class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modalnewpayable">
                        <i class="fas fa-plus"></i>
                        Novo</a>
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
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Pesquisar">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
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
                                    <td>{{$payables->date_buypayable}}</td>
                                    <td>{{$payables->date_duepayable}}</td>
                                    <td>R$ {{$payables->value}}</td>
                                    <td>{{$payables->status}}</td>
                                    <td>
                                        <button class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                            data-target="#modaledtpayable" data-whatever='{{$payables->payable_id}}'>
                                            <i class="fas fa-pencil-alt"></i>
                                            Editar
                                        </button>
                                        <button class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="" data-whatever='{{$payables->payable_id}}'>
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


@include('Site.Contas.ContasPagar.Modal.new')
@include('Site.Contas.ContasPagar.Modal.edit')

@endsection('content')