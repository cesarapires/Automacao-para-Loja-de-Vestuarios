<div class="modal fade" id="modalEditProduct">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar produtos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormEdtProducts" name="FormEdtProducts"
                    action="{{route('Site.ProductsUpdate')}}">
                    @csrf
                    @method('post')

                    <div class="form-group">
                        <div class='row'>
                            <div class='col-12'>
                                <input type="hidden" id="edtidProduct" name="edtidProduct">
                                <label for="inputNameProduct">Descrição</label>
                                <input type="text" class="form-control" name="edtnameProduct" id="edtnameProduct"
                                    placeholder="Conjunto Alice Ruby">
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class='row'>
                            <div class='col-9'>
                                <label for="inputStockProduct">Cor</label>
                                <input type="text" class="form-control" name="edtcolorProduct" id="edtcolorProduct"
                                    placeholder="Verde Militar/Nude">
                            </div>
                            <div class='col-3'>
                                <label for="inputStockProduct">Estoque</label>
                                <input type="text" class="form-control" name="edtstockProduct" id="edtstockProduct"
                                    placeholder="1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class='col-6'>
                                <label for="inputPrice_BuyProduct">Custo</label>
                                <input type="text" class="form-control" name="edtpriceBuyProduct"
                                    id="edtpriceBuyProduct" placeholder="17.99">
                            </div>
                            <div class='col-6'>
                                <label for="inputPrice_SellProduct">Venda</label>
                                <input type="text" class="form-control" name="edtpriceSellProduct"
                                    id="edtpriceSellProduct" placeholder="54.99">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class='col-6'>
                                <label>Tamanho</label>
                                <select class="form-control select2bs4" name="edtsizeIdProduct" id="edtsizeIdProduct"
                                    style="width: 100%;">
                                    <option value="">Selecione um tamanho:</option>
                                    @foreach($sizes as $sizes)
                                    <option value="{{$sizes->size_id}}">{{$sizes->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='col-6'>
                                <label>Tipo</label>
                                <select class="form-control select2bs4" name="edttypeIdProduct" id="edttypeIdProduct"
                                    style="width: 100%;">
                                    <option value="">Selecione um tipo:</option>
                                    @foreach($types as $types)
                                    <option value="{{$types->type_id}}">{{$types->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPrice_SellProduct">Data da última atualização</label>
                        <input type="text" class="form-control" name="edtupdateProduct" id="edtupdateProduct" value=""
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputPrice_SellProduct">Data de criação</label>
                        <input type="text" class="form-control" name="edtcreateProduct" id="edtcreateProduct" value=""
                            disabled>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
/* When click edit user */
$('#modalEditProduct').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)

    var idProduct = button.data('whatever').product_id
    var nameProduct = button.data('whatever').name
    var colorProduct = button.data('whatever').color
    var stockProduct = button.data('whatever').stock
    var priceBuyProduct = button.data('whatever').price_buy
    var priceSellProduct = button.data('whatever').price_sell
    var updateAtProduct = button.data('whatever').update_at
    var createAtProduct = button.data('whatever').create_at
    var typeIdProduct = button.data('whatever').type_id
    var sizeIdProduct = button.data('whatever').size_id

    modal.find('#edtidProduct').val(idProduct)
    modal.find('#edtnameProduct').val(nameProduct)
    modal.find('#edtcolorProduct').val(colorProduct)
    modal.find('#edtstockProduct').val(stockProduct)
    modal.find('#edtpriceBuyProduct').val(priceBuyProduct)
    modal.find('#edtpriceSellProduct').val(priceSellProduct)
    modal.find("#edtsizeIdProduct").val(sizeIdProduct)
    modal.find('#edttypeIdProduct').val(typeIdProduct)
    modal.find('#edtupdateProduct').val(updateAtProduct)
    modal.find('#edtcreateProduct').val(createAtProduct)
})
</script>