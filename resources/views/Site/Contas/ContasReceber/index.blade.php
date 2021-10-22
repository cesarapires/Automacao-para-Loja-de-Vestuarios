@extends('Layout.site')

@section('content')

<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

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

                    </div>
                    <div class="card-body">
                        @include('Site.DataFilter.date')
                        <table id="vendas" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>ID Venda</th>
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
                                    <td>{{$receivables->receivable_id}}</td>
                                    <td>{{$receivables->nameClient}}</td>
                                    <td>{{$receivables->sale_id}}</td>
                                    <td>{{date('d/m/Y', strtotime($receivables->date_sale))}}</td>
                                    <td>{{$receivables->numberplot }}</td>
                                    <td>{{date('d/m/Y', strtotime($receivables->date_duereceivable))}}</td>
                                    <td>R$ {!!number_format($receivables->value,2, ',', ' ')!!}</td>
                                    <td>
                                        @if($receivables->status == 1)
                                        <i class="far fa-check-square"></i>
                                        @else
                                        <i class="far fa-square"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                            data-target="#modaledtreceivable"
                                            data-whatever='{{$receivables->receivable_id}}'>
                                            <i class="fas fa-pencil-alt"></i>
                                            Editar
                                        </button>
                                        <button class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modaldelreceivable"
                                            data-whatever='{{$receivables->receivable_id}}'>
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

@include('Site.Contas.ContasReceber.Modal.new')
@include('Site.Contas.ContasReceber.Modal.edit')
@include('Site.Contas.ContasReceber.Modal.delete')


@endsection('content')