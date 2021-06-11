@extends('Layout.site')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Contas a Receber | <a class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modalnewreceiable">
                        <i class="fas fa-plus"></i>
                        Nova</a>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard v1 | Contas a Receber</li>
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
                                    <th>Cliente</th>
                                    <th>ID Venda</th>
                                    <th>Data da Venda</th>
                                    <th>Parcela</th>
                                    <th>Vencimento</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($receivables as $receivables)
                                <tr  class="text-center">
                                    <td>{{$receivables->receivable_id}}</td>
                                    <td>{{$receivables->nameClient}}</td>
                                    <td>{{$receivables->sale_id}}</td>
                                    <td>{{date('d/m/Y', strtotime($receivables->date_sale))}}</td>
                                    <td>{{$receivables->numberplot }}</td>
                                    <td>{{date('d/m/Y', strtotime($receivables->date_duereceivable))}}</td>
                                    <td>R$ {{$receivables->value}}</td>
                                    <td>
                                        @if($receivables->status == 1)
                                        <i class="far fa-check-square"></i>
                                        @else
                                        <i class="far fa-square"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                            data-target="#modaledtreceivable" data-whatever='{{$receivables->receivable_id}}'>
                                            <i class="fas fa-pencil-alt"></i>
                                            Editar
                                        </button>
                                        <button class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modaldelreceivable" data-whatever='{{$receivables->receivable_id}}'>
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

@include('Site.Contas.ContasReceber.Modal.new')
@include('Site.Contas.ContasReceber.Modal.edit')
@include('Site.Contas.ContasReceber.Modal.delete')


@endsection('content')