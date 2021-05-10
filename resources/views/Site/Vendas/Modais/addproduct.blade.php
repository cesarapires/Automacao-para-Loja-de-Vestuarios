<div class="modal fade" id="modaladdproduct">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Adicionar Produto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts" action="#">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputnameClient">ID Produto</label>
                            <input type="text" class="form-control" name="nameClient" id="nameClient"
                                placeholder="Rebeca Alana Débora Barbosa">
                        </div>
                        <div class="form-group">
                            <label>Produto</label>
                            <select class="form-control select2bs4" style="width: 100%;">
                                <option>Selecione o produto</option>
                                @foreach($products as $products)
                                <option value="{{$products->product_id}}">{{$products->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputcpfClient">Quantidade</label>
                            <input type="text" class="form-control" name="cpfClient" id="cpfClient"
                                placeholder="4">
                        </div>
                        <div class="form-group">
                            <label for="inputemailClient">Valor</label>
                            <input type="text" class="form-control" name="emailClient" id="emailClient"
                                placeholder="79.44">
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