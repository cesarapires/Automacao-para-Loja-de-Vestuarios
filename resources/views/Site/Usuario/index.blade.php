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

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
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
                                    <label for="IDUser">ID</label>
                                    <input type="text" class="form-control" id="IDUser" Readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="nameUser">Nome</label>
                                    <input type="text" class="form-control" id="nameUser">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="cpfUser">CPF</label>
                                    <input type="text" class="form-control" id="cpfUser">
                                </div>
                                <div class="col-md-3">
                                    <label for="rgUser">RG</label>
                                    <input type="text" class="form-control" id="rgUser">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="emailUser">Email</label>
                                    <input type="text" class="form-control" id="emailUser" Readonly>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="addresUser">Endereço</label>
                                    <input type="text" class="form-control" id="addresUser">
                                </div>
                                <div class="col-md-1">
                                    <label for="numberUser">Número</label>
                                    <input type="text" class="form-control" id="numberUser">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="passwordUser">Senha</label>
                                    <input type="text" class="form-control" id="passwordUser">
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="districtUser">Bairro</label>
                                    <input type="text" class="form-control" id="districtUser">
                                </div>
                                <div class="col-md-3">
                                    <label for="cityUser">Cidade</label>
                                    <input type="text" class="form-control" id="cityUser">
                                </div>
                                <div class="col-md-1">
                                    <label for="stateUser">Estado</label>
                                    <input type="text" class="form-control" id="stateUser">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="confirmpasswordUser">Confirmar Senha</label>
                                    <input type="text" class="form-control" id="confirmpasswordUser">
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <br>
                                        <br>
                                        <input type="checkbox" class="form-check-input" id="administratorUser">
                                        <label class="form-check-label" for="administratorUser">Administrador</label>
                                    </div>
                                </div>
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

@endsection('content')