<div class="modal fade" id="modalDeletePayment">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Apagar Pagamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormDelType" name="FormDelType"
                    action="{{route('Site.PaymentDelete')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputIdPayment">ID</label>
                            <input type="text" class="form-control" name="delidPayment" id="delidPayment" value="" Readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputNamePayment">Descrição</label>
                            <input type="text" class="form-control" name="delnamePayment" id="delnamePayment" value=""
                                Readonly>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-danger">Sim</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
/* When click edit user */
$('#modalDeletePayment').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)

    var idPayment = button.data('whatever').idPayment
    var namePayment = button.data('whatever').namePayment

    modal.find('#delidPayment').val(idPayment)
    modal.find('#delnamePayment').val(namePayment)
})
</script>