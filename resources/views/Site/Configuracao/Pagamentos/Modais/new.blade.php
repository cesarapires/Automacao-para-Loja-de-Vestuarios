<div class="modal fade" id="modalNewPayment">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pagamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormNewType" name="FormNewType"
                    action="{{route('Site.PaymentStore')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNameType">Descrição</label>
                            <input type="text" class="form-control" name="nameType" id="nameType"
                                placeholder="Sumup - Crédito">
                        </div>
                        <div class="form-group">
                            <label for="inputNameType">Taxa</label>
                            <input type="text" class="form-control" name="nameType" id="nameType" placeholder="3.4">
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