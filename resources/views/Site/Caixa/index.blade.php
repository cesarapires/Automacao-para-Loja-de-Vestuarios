@extends('Layout.site')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Caixa | <button class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modalnewcashier">
                        <i class="fas fa-plus"></i>
                        Novo</button>
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

                                                <td><span style="color: green">R$ {{$cashiers->value}}</span></td>

                                                @else
                                                Débito
                                                </td>
                                                <td><span style="color: red">R$ {{$cashiers->value}}</span></td>
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

@include('Site.Caixa.Modal.new')
@include('Site.Caixa.Modal.edit')
@include('Site.Caixa.Modal.delete')

@endsection('content')