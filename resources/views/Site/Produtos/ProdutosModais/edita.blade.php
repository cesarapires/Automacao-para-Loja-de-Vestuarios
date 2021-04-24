<div class="modal fade" id="modalEditProduct">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Produtos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormEdtProducts" name="FormEdtProducts"
                    action="{{route('Site.ProductsStore')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNameProduct">Descrição</label>
                            <input type="text" class="form-control" name="edtnameProduct" id="edtnameProduct" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputStockProduct">Estoque</label>
                            <input type="text" class="form-control" name="edtstockProduct" id="edtstockProduct" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice_BuyProduct">Custo</label>
                            <input type="text" class="form-control" name="edtprice_BuyProduct" id="edtprice_BuyProduct"
                                value="">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice_SellProduct">Venda</label>
                            <input type="text" class="form-control" name="edtprice_SellProduct" id="edtprice_SellProduct"
                                value="">
                        </div>
                        <div class="form-group">
                            <label>Tamanho</label>
                            <select class="form-control select2bs4" name="edtsize_IdProduct" style="width: 100%;">
                                <option value="">Selecione um tamanho:</option>
                                @foreach($sizes as $sizes)
                                <option value="{{$sizes->size_id}}">{{$sizes->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tipo</label>
                            <select class="form-control select2bs4" name="edttype_IdProduct" style="width: 100%;">
                                <option value="">Selecione um tipo:</option>
                                @foreach($types as $types)
                                <option value="{{$types->type_id}}">{{$types->name}}</option>
                                @endforeach
                            </select>
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
</div>

<script>
/* When click edit user */

</script>