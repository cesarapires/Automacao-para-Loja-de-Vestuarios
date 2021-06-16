<div class="modal fade" id="modaldelreceivable">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Apagar Contas a Receber</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormDelType" name="FormDelType"
                    action="{{route('Site.ReceivableDelete')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <p>Tem certeza que deseja excluir essa conta a receber?</p>
                            <input type="hidden" class="form-control" name="delidreceivable" id="delidreceivable" value=""
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
    </div>
</div>

<script>
/* When click edit user */
$('#modaldelreceivable').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget); // Button that triggered the modal

    var delidReceivable = button.data('whatever');

    $('#delidreceivable').val(delidReceivable);
})
</script>