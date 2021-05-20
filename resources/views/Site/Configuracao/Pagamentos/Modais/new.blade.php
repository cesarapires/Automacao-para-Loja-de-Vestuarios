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
                <form method="post" enctype="multipart/form-data" id="FormNewPayment" name="FormNewPayment"
                    action="{{route('Site.PaymentStore')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNamePayment">Descrição</label>
                            <input type="text" class="form-control" name="namePayment" id="namePayment"
                                placeholder="Sumup - Crédito">
                        </div>
                        <div class="form-group">
                            <label for="inputNamePayment">Taxa Fixa</label>
                            <input type="text" class="form-control" name="fixratePayment" id="fixratePayment"
                                placeholder="3.4">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputNamePayment">Taxa Variável</label>
                                <input type="text" class="form-control" name="ratePayment" id="ratePayment"
                                    placeholder="3.4">
                            </div>
                            <div class="col-md-6">
                                <label for="inputNamePayment">Taxa ao mês</label>
                                <input type="text" class="form-control" name="ratemonthPayment" id="ratemonthPayment"
                                    placeholder="3.4">
                            </div>

                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="credit" name="credit" value="false">
                            <label class="form-check-label" for="exampleCheck1">Pagamento gerará crédito</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="ratetype" name="ratetype" value="true"
                                checked>
                            <label class="form-check-label" for="exampleCheck1">Taxa única</label>
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
$("#ratetype").change(function() {
    if ($("#ratetype").prop("checked") == "checked") {
        $("#ratemonthPayment").prop('readonly', true);
    } else {
        $("#ratemonthPayment").prop('readonly', false);
    }
});
</script>