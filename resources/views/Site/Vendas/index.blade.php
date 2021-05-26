@extends('Layout.site')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Vendas | <a class="btn btn-success btn-sm" href="{{route('Site.NewSales')}}">
                        <i class="fas fa-plus"></i>
                        Nova</a>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard v1 | Vendas</li>
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
                                    <th>Forma de Pagamento</th>
                                    <th>Itens</th>
                                    <th>Data</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sales)
                                <tr class="text-center">
                                    <td class='sale_id'>{{$sales->sale_id}}</td>
                                    <td class='nameClient'>{{$sales->nameClient}}</td>
                                    <td class='namePayment'>{{$sales->namePayment}}</td>
                                    <td class='quantityItens'>{{$sales->quantityitens}}</td>
                                    <td class='sale_data'>{{$sales->updated_at}}</td>
                                    <td class='sale_amount'>R$ {{$sales->amount}}</td>
                                    <td>
                                    @if($sales->status == "A")
                                        <a class="btnEdit btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalclosesale">
                                            <i class="fas fa-lock-open"></i>
                                        </a>
                                        </td>
                                        <td>
                                        <a class="btnEdit btn btn-outline-warning btn-sm" data-toggle="modal"
                                                    data-whatever='{
                                                "saleId":"{{$sales->sale_id}}",
                                                }'>
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Editar
                                            </a>
                                        <a class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                                    data-target="#modaldeletesale" data-whatever='{
                                                "saleId":"{{$sales->sale_id}}",
                                                }'>
                                                <i class="fas fa-trash">
                                                </i>
                                                Apagar
                                            </a>
                                        </td>
                                    @else
                                        <a class="btnEdit btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalopensale">
                                            <i class="fas fa-lock"></i>
                                        </a>
                                        </td>
                                        <td>
                                            <a class="btnEdit btn btn-outline-success btn-sm" data-toggle="modal"
                                                    data-target="#modaldeletesale" data-whatever='{
                                                "saleId":"{{$sales->sale_id}}",
                                                }'>
                                                <i class="fas fa-eye">
                                                </i>
                                                Visualizar
                                            </a>
                                        </td>
                                        @endif
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

@include('Site.Vendas.Modais.opensale')
@include('Site.Vendas.Modais.closesale')


@endsection('content')