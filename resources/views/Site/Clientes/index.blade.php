@extends('Layout.site')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Clientes | <button class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modalNewProduct">
                        <i class="fas fa-plus"></i>
                        Novo</button>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard v1 | Clientes</li>
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
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Data Nascimento</th>
                                    <th>Cidade</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $clients)
                                <tr class="text-center">
                                    <td class='idClient'>{{$clients->client_id }}</td>
                                    <td class='nameClient'>{{$clients->name}}</td>
                                    <td class='phoneClient'>{{$clients->phone}}</td>
                                    <td class='birthdateClient'>{{$clients->birth_date}}</td>
                                    <td class='cityCity'>{{$clients->city}}</td>
                                    <td class="project-actions text-right text-center edit">
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                            data-target="#modalEditClient" data-whatever='{
                                                "idClient":"{{$clients->client_id}}",
                                                "nameClient":"{{$clients->name}}",
                                                "cpfClient":"{{$clients->cpf}}",
                                                "phoneClient":"{{$clients->phone}}",
                                                "emailClient":"{{$clients->email}}",
                                                "birthdateClient":"{{$clients->birth_date}}",
                                                "cityCity":"{{$clients->city}}",
                                                "sexClient":"{{$clients->sex}}",
                                                "balance_due":"{{$clients->balance_due}}",
                                                "createdAtClient":"{{$clients->created_at}}",
                                                "updatedAtClient":"{{$clients->updated_at}}"
                                                }'>
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </button>
                                        <button class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modalDeleteClient" data-whatever='{
                                                "idClient":"{{$clients->client_id }}",
                                                "nameClient":"{{$clients->name}}"
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

@include('Site.Clientes.Modais.new')
@include('Site.Clientes.Modais.delete')
@include('Site.Clientes.Modais.edit')

@endsection('content')