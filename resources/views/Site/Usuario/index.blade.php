@extends('Layout.site')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Usuário</h1>
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

<section class="content d-flex justify-content-xl-center">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                    </div>
                    <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.ProductsStore')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNameProduct">Nome</label>
                            <input type="text" class="form-control" name="nameProduct" id="nameProduct"
                                value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group">
                            <label for="inputStockProduct">Email</label>
                            <input type="email" class="form-control" name="stockProduct" id="stockProduct"
                                value=''>
                        </div>
                        <div class="form-group">
                            <label for="inputPrice_BuyProduct">Custo</label>
                            <input type="text" class="form-control" name="price_BuyProduct" id="price_BuyProduct"
                                placeholder="17.99">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice_SellProduct">Venda</label>
                            <input type="text" class="form-control" name="price_SellProduct" id="price_SellProduct"
                                placeholder="54.99">
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
        </div>
    </div>
</section>

@endsection('content')