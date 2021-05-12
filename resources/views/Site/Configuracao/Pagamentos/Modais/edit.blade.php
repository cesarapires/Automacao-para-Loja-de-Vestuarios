<div class="modal fade" id="modalEditPayment">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Pagamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormEdtProducts" name="FormEdtProducts"
                    action="{{route('Site.PaymentUpdate')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputIdSize">ID</label>
                            <input type="text" class="form-control" name="edtidPayment" id="edtidPayment" value=""
                                Readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputNameType">Descrição</label>
                            <input type="text" class="form-control" name="edtnamePayment" id="edtnamePayment"
                                placeholder="Sumup - Crédito">
                        </div>
                        <div class="form-group">
                            <label for="inputNameType">Taxa</label>
                            <input type="text" class="form-control" name="edtratePayment" id="edtratePayment"
                                placeholder="3.4">
                        </div>
                        <div class="form-group">
                            <label for="inputUpdateSize">Data da última atualização</label>
                            <input type="text" class="form-control" name="edtupdatedAtPayment" id="edtupdatedAtPayment"
                                value="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputCreateSize">Data de criação</label>
                            <input type="text" class="form-control" name="edtcreatedAtPayment" id="edtcreatedAtPayment"
                                value="" disabled>
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
$('#modalEditPayment').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)

    var idPayment = button.data('whatever').idPayment
    var namePayment = button.data('whatever').namePayment
    var ratePayment = button.data('whatever').ratePayment
    var updatedAtPayment = button.data('whatever').updatedAtPayment
    var createdAtPayment = button.data('whatever').createdAtPayment

    modal.find('#edtidPayment').val(idPayment)
    modal.find('#edtnamePayment').val(namePayment)
    modal.find('#edtratePayment').val(ratePayment)
    modal.find('#edtupdatedAtPayment').val(updatedAtPayment)
    modal.find('#edtcreatedAtPayment').val(createdAtPayment)
})
</script>