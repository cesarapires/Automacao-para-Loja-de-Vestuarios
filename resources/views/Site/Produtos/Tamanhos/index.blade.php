@extends('Layout.site')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tamanhos | <button class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modalNewType">
                        <i class="fas fa-plus"></i>
                        Novo</button>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard v1 | Tamanhos</li>
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
                                    placeholder="Search">
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
                                    <th>Tamanho</th>
                                    <th>Data da última modificação</th>
                                    <th>Data da criação</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($sizes as $sizes)
                                <tr class="text-center">
                                    <td class='idSize'>{{$sizes->size_id }}</td>
                                    <td class='nameSize'>{{$sizes->name}}</td>
                                    <td class='createdAtSize'>{{$sizes->created_at}}</td>
                                    <td class='updatedAtSize'>{{$sizes->updated_at}}</td>
                                    <td class="project-actions text-right text-center edit">
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                            data-target="#modalEditSize" data-whatever='{
                                                "idSize":"{{$sizes->size_id }}",
                                                "nameSize":"{{$sizes->name}}",
                                                "createdAtSize":"{{$sizes->created_at}}",
                                                "updatedAtSize":"{{$sizes->updated_at}}"
                                                }'>
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </button>
                                        <button class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modalDeleteSize" data-whatever='{
                                                "idSize":"{{$sizes->size_id }}",
                                                "nameSize":"{{$sizes->name}}"
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

@include('Site.Produtos.Tamanhos.ProdutosModais.new')
@include('Site.Produtos.Tamanhos.ProdutosModais.delete')
@include('Site.Produtos.Tamanhos.ProdutosModais.edit')

@endsection('content')