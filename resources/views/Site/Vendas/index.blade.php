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
                    </div>
                    <div class="card-body">
                        @include('Site.DataFilter.date')
                        <table id="vendas" class="table table-bordered table-striped">
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
                                    <td class='sale_data'>{{date('d/m/Y', strtotime($sales->date_sale))}}</td>
                                    <td class='sale_amount'>R$ {!!number_format($sales->amount,2, ',', ' ')!!}</td>
                                    <td>
                                        @if($sales->status == "A")
                                        <a class="btnEdit btn btn-outline-info btn-sm" data-toggle="modal"
                                            data-target="#modalclosesale" data-whatever='{
                                                "saleId":"{{$sales->sale_id}}"
                                                }'>
                                            <i class="fas fa-lock-open"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="Vendas/Editar/{{$sales->sale_id}}"
                                            class="btnEdit btn btn-outline-warning btn-sm">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </a>
                                        <a class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modaldeletesale" data-whatever='{{$sales->sale_id}}'>
                                            <i class="fas fa-trash">
                                            </i>
                                            Apagar
                                        </a>
                                    </td>
                                    @else
                                    <a class="btnEdit btn btn-outline-info btn-sm" data-toggle="modal"
                                        data-target="#modalopensale" data-whatever='{
                                                "saleId":"{{$sales->sale_id}}"
                                                }'>
                                        <i class="fas fa-lock"></i>
                                    </a>
                                    </td>
                                    <td>
                                        <a class="btnEdit btn btn-outline-success btn-sm" data-toggle="modal"
                                            data-target="#modalviewsale" data-whatever='{{$sales->sale_id}}'>
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

@include('Site.DataFilter.filteringdate')

@include('Site.Vendas.Modais.view')
@include('Site.Vendas.Modais.deletesale')
@include('Site.Vendas.Modais.opensale')
@include('Site.Vendas.Modais.closesale')


@endsection('content')
