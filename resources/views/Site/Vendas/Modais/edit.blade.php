<div class="modal fade" id="modalEditIten">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.EdtIten')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputnameClient">ID Produto</label>
                            <input type="text" class="form-control" name="edtidProduct" id="edtidProduct"
                                placeholder="Rebeca Alana Débora Barbosa">
                            <input type="hidden" class="form-control" name="edtidItenSale" id="edtidItenSale"
                                value="{{$sales->sale_id}}">
                        </div>
                        <div class="form-group">
                            <label>Produto</label>
                            <select class="form-control select2bs4" id="edtselectProduct" style="width: 100%;">
                                <option>Selecione o produto</option>
                                @foreach($products as $products)
                                <option value="{{$products->product_id}}" data-idProduct="{{$products->product_id}}" data-priceSell="{{$products->price_sell}}">{{$products->name}} - {{$products->size_name}} - {{$products->price_sell}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputcpfClient">Quantidade</label>
                            <input type="text" class="form-control" name="edtquantityProduct" id="edtquantityProduct"
                                value="1">
                        </div>
                        <div class="form-group">
                            <label for="inputemailClient">Valor</label>
                            <input type="text" class="form-control" name="edtpriceProduct" id="edtpriceProduct"
                                value="0">
                        </div>
                        <div class="form-group">
                            <label for="inputemailClient">Última alteração</label>
                            <input type="text" class="form-control" name="edtupdatedAtItenSale" id="edtupdatedAtItenSale"
                                value="0" Readonly>
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

<script>
$("#edtselectProduct").change(function() {
    var priceProduct = ($(this).find(':selected').attr('data-priceSell'));
    var idProduct = ($(this).find(':selected').attr('data-idProduct'));
    document.getElementById('edtidProduct').value = idProduct;
    document.getElementById('priceProduct').value = priceProduct;

});

$('#modalEditIten').on('show.bs.modal', function(event) {

var button = $(event.relatedTarget) // Button that triggered the modal
var modal = $(this)

var idSaleIten = button.data('whatever').idSaleIten
var idProduct = button.data('whatever').idProduct
var quantityProduct = button.data('whatever').quantityProduct
var priceProduct = button.data('whatever').priceProduct
var updatedAtItenSale = button.data('whatever').updatedAtItenSale

document.getElementById('edtidProduct').value = idProduct
document.getElementById('edtselectProduct').value = idProduct
document.getElementById('edtidItenSale').value = idSaleIten
document.getElementById('edtquantityProduct').value = quantityProduct
document.getElementById('edtpriceProduct').value = priceProduct
document.getElementById('edtupdatedAtItenSale').value = updatedAtItenSale

})

$("#edtselectProduct").change(function() {
    var priceProduct = ($(this).find(':selected').attr('data-priceSell'));
    var idProduct = ($(this).find(':selected').attr('data-idProduct'));
    document.getElementById('edtidProduct').value = idProduct;
    document.getElementById('edtpriceProduct').value = priceProduct;
});
</script>