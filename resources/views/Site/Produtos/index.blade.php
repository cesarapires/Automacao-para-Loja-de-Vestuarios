@extends('Layout.site')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Produtos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard</li>
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
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalNewProduct">
                        <i class="fas fa-plus"></i> Novo</button>
                        <a class="btn btn-info btn-sm" href="{{route('Site.Products.GerarExcelNuvemShop')}}">
                        <i class="fas fa-file-excel"></i> Excel Nuvem Shop</a>
                    </div>
                    <div class="card-body">
                        <table id="produtos" class="table table-bordered table-striped">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="filterStock" checked>
                                            <label class="form-check-label">Mostrar apenas produtos em estoque</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Seleção de tamanho</label>
                                        <div class="input-group date" data-target-input="nearest">
                                            <div class="btn-group">
                                                <button type="button" id="sizeUn" class="btn btn-default">Un</button>
                                                <button type="button" id="sizeP" class="btn btn-default">P</button>
                                                <button type="button" id="sizeM" class="btn btn-default">M</button>
                                                <button type="button" id="sizeG" class="btn btn-default">G</button>
                                                <button type="button" id="sizeGG" class="btn btn-default">GG</button>
                                                <button type="button" id="exitFilter" class="btn btn-default"><i
                                                        class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Seleção de tipo</label>
                                            <select class="form-control" id="filterType">
                                                <option>Todos</option>
                                                @foreach($types as $filterType)
                                                    <option value="{{$filterType->name}}">{{$filterType->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>URL</th>
                                    <th>Descrição</th>
                                    <th>Tamanho</th>
                                    <th>Cor</th>
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
                                    <td class='url'>{{$products->url}}</td>
                                    <td class='name'>{{$products->name}}</td>
                                    <td class='size_name'>{{$products->size_name}}</td>
                                    <td class='color_name'>{{$products->color}}</td>
                                    <td class='stock'>{{$products->stock}}</td>
                                    <td class='price_buy'>R$ {!!number_format($products->price_buy,2, ',', ' ')!!}</td>
                                    <td class='price_sell'>R$ {!!number_format($products->price_sell,2, ',', ' ')!!}
                                    </td>
                                    <td class='type_name'>{{$products->type_name}}</td>
                                    <td class="project-actions text-right text-center edit">
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                            data-target="#modaleditproduct" data-whatever='{{$products->product_id}}'>
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

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<script>


$(document).ready(function() {

});

var tablaTransacciones = $('#produtos');

var tablaTransacciones_dt = null

// The plugin function for adding a new filtering routine
$.fn.dataTableExt.afnFiltering.push(
    function(oSettings, aDate, iDataIndex) {
        var filterPayment = true;
        var filterSize = true;
        var filterType = true;
        if ($('#filterStock').is(':checked')) {
            if (aDate[5] > 0) {
                filterStock = true;
            } else {
                filterStock = false;
            }
        } else {
            filterStock = true;
        }
        if ($("#sizeUn").hasClass("active")) {
        if (aDate[3] == 'Un') {
            filterSize = true;
        } else {
            filterSize = false;
        }
    } else if ($("#sizeP").hasClass("active")) {
        if (aDate[3] == 'P') {
            filterSize = true;
        } else {
            filterSize = false;
        }
    } else if ($("#sizeM").hasClass("active")) {
        if (aDate[3] == 'M') {
            filterSize = true;
        } else {
            filterSize = false;
        }
    } else if ($("#sizeG").hasClass("active")) {
        if (aDate[3] == 'G') {
            filterSize = true;
        } else {
            filterSize = false;
        }
    } else if ($("#sizeGG").hasClass("active")) {
        if (aDate[3] == "GG") {
            filterSize = true;
        } else {
            filterSize = false;
        }
    } else {
        filterSize = true;
    }

    if($('#filterType').find(':selected').val() == 'Todos'){
        filterType = true;
    }
    else{
        if(aDate[8] == $('#filterType').find(':selected').val()){
            filterType = true;
        }
        else{
            filterType = false;
        }
    }

    if(filterStock && filterSize && filterType){
        return true;
    }
    else{
        return false;
    }

    });

$(function() {
    tablaTransacciones_dt = tablaTransacciones.DataTable({
        "columnDefs": [{
            "targets": [1],
            "visible": false,
            "searchable": false
        }],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#produtos_wrapper .col-md-6:eq(0)');
    // Create event listeners that will filter the table whenever the user types in either date range box or
    // changes the value of either box using the Datepicker pop-up calendar
});
</script>

<script src="https://momentjs.com/downloads/moment.min.js"></script>

<script>

function removerClasse(){
    $("#sizeUn").removeClass('active');
    $("#sizeP").removeClass('active');
    $("#sizeM").removeClass('active');
    $("#sizeG").removeClass('active');
    $("#sizeGG").removeClass('active');
};

$('#filterStock').on('click', function() {
    $('#produtos').DataTable().draw();
});

$('#sizeUn').on('click', function() {
    removerClasse();
    $("#sizeUn").addClass('active');
    $('#produtos').DataTable().draw();
});

$('#sizeP').on('click', function() {
    removerClasse();
    $("#sizeP").addClass('active');
    $('#produtos').DataTable().draw();
});

$('#sizeM').on('click', function() {
    removerClasse();
    $("#sizeM").addClass('active');
    $('#produtos').DataTable().draw();
});

$('#sizeG').on('click', function() {
    removerClasse();
    $("#sizeG").addClass('active');
    $('#produtos').DataTable().draw();
});

$('#sizeGG').on('click', function() {
    removerClasse();
    $("#sizeGG").addClass('active');
    $('#produtos').DataTable().draw();
});

$('#exitFilter').on('click', function() {
    removerClasse();
    $('#produtos').DataTable().draw();
});

$("#filterType").change(function() {
    $('#produtos').DataTable().draw();
});
</script>


@include('Site.Produtos.Modais.new')
@include('Site.Produtos.Modais.delete')
@include('Site.Produtos.Modais.edit')

@endsection('content')
