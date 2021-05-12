@extends('Layout.site')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Nova venda</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Usuário</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                        action="{{route('Site.ProductsStore')}}">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="IDUser">Número da venda</label>
                                    <input type="text" class="form-control" id="IDUser" Readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="cpfUser">ID Cliente</label>
                                    <input type="text" class="form-control" id="cpfUser" Readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Cliente</label>
                                    <select class="form-control select2bs4" style="width: 100%;">
                                        <option>Selecione o cliente</option>
                                        @foreach($clients as $clients)
                                        <option value="{{$clients->client_id}}">{{$clients->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="rgUser">Plataforma</label>
                                    <select class="form-control select2bs4" style="width: 100%;">
                                        <option>Selecione a plataforma</option>
                                        @foreach($platforms as $platforms)
                                        <option value="{{$platforms->platform_id}}">{{$platforms->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Taxa Plataforma</label>
                                    <input type="text" class="form-control" id="IDUser" Readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="cpfUser">Pagamento</label>
                                    <select class="form-control select2bs4" style="width: 100%;">
                                        <option>Selecione a forma de pagamento</option>
                                        @foreach($payments as $payments)
                                        <option value="{{$payments->payment_id}}">{{$payments->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="rgUser">Parcelas</label>
                                    <select class="form-control select2bs4" style="width: 100%;">
                                        <option>Selecione a parcela</option>
                                        @foreach($plots as $plots)
                                        <option value="{{$plots->plot_id}}">{{$plots->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="rgUser">Desconto</label>
                                    <input type="text" class="form-control" id="IDUser">
                                </div>
                                <div class="col-md-2">
                                    <label for="cpfUser">Valor da Venda</label>
                                    <input type="text" class="form-control" id="IDUser" Readonly>
                                </div>

                                <div class="col-md-2">
                                    <label for="rgUser">Taxa</label>
                                    <input type="text" class="form-control" id="IDUser" Readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="rgUser">Valor Final</label>
                                    <input type="text" class="form-control" id="IDUser" Readonly>
                                </div>
                            </div>
                            <br>
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaladdproduct">
                                <i class="fas fa-plus"></i>
                                Adicionar produto</a>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Código</th>
                                            <th>Descrição</th>
                                            <th>Tamanho</th>
                                            <th>Quantidade</th>
                                            <th>Valor</th>
                                            <th>Valor total</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('Site.Vendas.Modais.addproduct')

@endsection('content')