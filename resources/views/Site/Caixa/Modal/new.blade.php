<div class="modal fade" id="modalnewcashier">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Contas a Pagar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.CashierStore')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-12'>
                                    <label for="inputNameProduct">Descrição</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                        placeholder="Núcleo Sistemas Digitais">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label for="inputPrice_SellProduct">Data</label>
                                    <input type="date" class="form-control" name="dateCashier" id="dateCashier"
                                        placeholder="01/05/2021">
                                </div>
                                <div class="col-md-6">
                                    <label for="rgUser">Tipo da transação</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="typeCashier"
                                        id="typeCashier">
                                        <option>Selecione o tipo</option>
                                        <option value="C">Crédito</option>
                                        <option value="D">Débito</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Valor</label>
                                    <input type="text" class="form-control" name="valueCashier" id="valueCashier"
                                        placeholder="R$ 127.00">
                                </div>
                            </div>
                        </div>
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