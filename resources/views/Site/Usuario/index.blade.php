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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="IDUser">ID</label>
                                <input type="text" class="form-control" id="IDUser" Readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="nomeUser">Nome</label>
                                <input type="text" class="form-control" id="nomeUser">
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
                                <label for="cpfUser">Email</label>
                                <input type="text" class="form-control" id="cpfUser">
                            </div>
                            <div class="col-md-3">
                                <label for="rgUser">Endereço</label>
                                <input type="text" class="form-control" id="rgUser">
                            </div>
                            <div class="col-md-1">
                                <label for="rgUser">Número</label>
                                <input type="text" class="form-control" id="rgUser">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="cpfUser">Senha</label>
                                <input type="text" class="form-control" id="cpfUser">
                            </div>
                            <div class="col-md-3">
                                <label for="rgUser">Bairro</label>
                                <input type="text" class="form-control" id="rgUser">
                            </div>
                            <div class="col-md-3">
                                <label for="rgUser">Cidade</label>
                                <input type="text" class="form-control" id="rgUser">
                            </div>
                            <div class="col-md-1">
                                <label for="rgUser">Estado</label>
                                <input type="text" class="form-control" id="rgUser">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="cpfUser">Confirmar Senha</label>
                                <input type="text" class="form-control" id="cpfUser">
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <br>
                                    <br>
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Administrador</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection('content')