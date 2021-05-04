<div class="modal fade" id="modalNewProduct">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cadastrar cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.ProductsStore')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNameProduct">Nome</label>
                            <input type="text" class="form-control" name="nameProduct" id="nameProduct"
                                placeholder="Rebeca Alana Débora Barbosa">
                        </div>
                        <div class="form-group">
                            <label for="inputStockProduct">CPF</label>
                            <input type="text" class="form-control" name="stockProduct" id="stockProduct"
                            placeholder="165.641.476-78">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice_BuyProduct">Data de Nascimento</label>
                            <input type="text" class="form-control" name="price_BuyProduct" id="price_BuyProduct"
                                placeholder="17/09/1967">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice_BuyProduct">Cidade</label>
                            <input type="text" class="form-control" name="price_BuyProduct" id="price_BuyProduct"
                                placeholder="Congonhal">
                        </div>
                        <div class="form-group">
                            <label>Sexo</label>
                            <select class="form-control select2bs4" name="type_IdProduct" style="width: 100%;">
                                <option value="">Selecione um sexo:</option>
                                <option value="1">Masculino</option>
                                <option value="2">Feminimo</option>
                                <option value="3">Outro</option>
                            </select>
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