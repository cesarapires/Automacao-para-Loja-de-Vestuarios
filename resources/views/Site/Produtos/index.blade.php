@extends('Layout.site')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Produtos</h3>
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
                                    <td>{{$products->product_id}}</td>
                                    <td>{{$products->name}}</td>
                                    <td>{{$products->size_name}}</td>
                                    <td>{{$products->stock}}</td>
                                    <td>R$ {{$products->price_buy}}</td>
                                    <td>R$ {{$products->price_sell}}</td>
                                    <td>{{$products->type_name}}</td>
                                    <td class="project-actions text-right text-center">
                                        <a class="btn btn-outline-success btn-sm" data-toggle="modal"
                                            data-target="#ProdutosModal">
                                            <i class="fas fa-folder">
                                            </i>
                                            Ver
                                        </a>
                                        <a class="btn btn-outline-warning btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modalDeletarProduct">
                                            <i class="fas fa-trash">
                                            </i>
                                            Apagar
                                        </a>
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
<!-- Modal -->
<!-- Button trigger modal -->
<div class="modal fade" id="ProdutosModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Produtos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNameProduct">Descrição</label>
                            <input type="text" class="form-control" id="nameProduct" placeholder="Conjunto Alice Ruby">
                        </div>
                        <div class="form-group">
                            <label for="inputStockProduct">Estoque</label>
                            <input type="text" class="form-control" id="stockProduct" placeholder="1">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice_BuyProduct">Custo</label>
                            <input type="text" class="form-control" id="price_BuyProduct" placeholder="17.99">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice_SellProduct">Venda</label>
                            <input type="text" class="form-control" id="price_SellProduct" placeholder="54.99">
                        </div>
                        <div class="form-group">
                            <label>Tamanho</label>
                            <select class="form-control select2bs4" style="width: 100%;">
                                <option>Selecione um tamanho:</option>
                                @foreach($sizes as $sizes)
                                <option id={{$sizes->size_id}}>{{$sizes->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tipo</label>
                            <select class="form-control select2bs4" style="width: 100%;">
                                <option>Selecione um tipo:</option>
                                @foreach($types as $types)
                                <option id={{$types->type_id}}>{{$types->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- modal -->
<div class="modal fade" id="modalDeletarProduct">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Apagar Produto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Ao deletar esse produto você também apagará os registros de vendas&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                <button type="button" class="btn btn-danger">Sim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection('content')