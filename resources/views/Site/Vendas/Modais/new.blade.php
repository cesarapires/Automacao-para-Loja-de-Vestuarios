<div class="modal fade" id="modaladdproduct">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Adicionar Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.AddIten')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputnameClient">ID Produto</label>
                            <input type="text" class="form-control" name="idProduct" id="idProduct"
                                Readonly>
                            <input type="hidden" class="form-control" name="idSale" id="idSale"
                                value="{{$sales->sale_id}}">
                        </div>
                        <div class="form-group">
                            <label>Produto</label>
                            <select class="form-control select2bs4" id="selectProduct" style="width: 100%;">
                                <option>Selecione o produto</option>
                                @foreach($products as $products)
                                <option value="{{$products->product_id}}" data-idProduct="{{$products->product_id}}" data-priceSell="{{$products->price_sell}}">{{$products->name}} - {{$products->size_name}} - {{$products->price_sell}} ({{$products->color}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputcpfClient">Quantidade</label>
                            <input type="text" class="form-control" name="quantityProduct" id="quantityProduct"
                                value="1">
                        </div>
                        <div class="form-group">
                            <label for="inputemailClient">Valor</label>
                            <input type="text" class="form-control" name="priceProduct" id="priceProduct"
                                value="0">
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
$("#selectProduct").change(function() {
    var priceProduct = ($(this).find(':selected').attr('data-priceSell'));
    var idProduct = ($(this).find(':selected').attr('data-idProduct'));
    document.getElementById('idProduct').value = idProduct;
    document.getElementById('priceProduct').value = priceProduct;
});
</script>