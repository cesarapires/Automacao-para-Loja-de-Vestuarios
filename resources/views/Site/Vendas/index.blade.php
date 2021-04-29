@extends('Layout.site')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Vendas | <button class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modalNewProduct">
                        <i class="fas fa-plus"></i>
                        Novo</button>
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
                                    <th>Descrição</th>
                                    <th>Tamanho</th>
                                    <th>Estoque</th>
                                    <th>Custo</th>
                                    <th>Venda</th>
                                    <th>Tipo</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $products)
                                <tr class="text-center">
                                    <td class='product_id'>{{$products->product_id}}</td>
                                    <td class='name'>{{$products->name}}</td>
                                    <td class='size_name'>{{$products->size_name}}</td>
                                    <td class='stock'>{{$products->stock}}</td>
                                    <td class='price_buy'>R$ {{$products->price_buy}}</td>
                                    <td class='price_sell'>R$ {{$products->price_sell}}</td>
                                    <td class='type_name'>{{$products->type_name}}</td>
                                    <td class="project-actions text-right text-center edit">
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                            data-target="#modalEditProduct" data-whatever='{
                                                "product_id":"{{$products->product_id}}",
                                                "name":"{{$products->name}}",
                                                "size_id":"{{$products->size_id}}",
                                                "stock":"{{$products->stock}}",
                                                "price_buy":"{{$products->price_buy}}",
                                                "price_sell":"{{$products->price_sell}}",
                                                "type_id":"{{$products->type_id}}",
                                                "update_at":"{{$products->updated_at}}",
                                                "create_at":"{{$products->created_at}}"
                                                }'>
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </button>
                                        <button class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modalDeleteProduct" data-whatever='{
                                                "idProduct":"{{$products->product_id}}",
                                                "nameProduct":"{{$products->name}}"
                                                }'>
                                            <i class="fas fa-trash">
                                            </i>
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

@include('Site.Produtos.ProdutosModais.new')
@include('Site.Produtos.ProdutosModais.delete')
@include('Site.Produtos.ProdutosModais.edit')

@endsection('content')