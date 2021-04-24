@extends('Layout.site')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Produtos |
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalNewProduct">
                                <i class="fas fa-plus"></i>
                                Novo</button>
                        </h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
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
                                        <button type="button" class="btn btn-outline-warning btn-sm"  
                                            data-toggle="modal"
                                            data-target="#modalEditProduct" 
                                            data-whatever='{"idProducts":{{$products->product_id}}'>
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </button>
                                        <button class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modalDeleteProduct" data-id="product_id">
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@includeif('Site.Produtos.ProdutosModais.new')
@includeif('Site.Produtos.ProdutosModais.delete')
@includeif('Site.Produtos.ProdutosModais.edit')

@endsection('content')