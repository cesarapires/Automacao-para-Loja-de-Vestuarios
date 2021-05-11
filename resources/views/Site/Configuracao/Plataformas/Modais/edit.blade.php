<div class="modal fade" id="modalEditType">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar tipos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormEdtProducts" name="FormEdtProducts"
                    action="{{route('Site.TypesUpdate')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputIdSize">ID</label>
                            <input type="text" class="form-control" name="edtidType" id="edtidType" value="" Readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputNameSize">Tamanho</label>
                            <input type="text" class="form-control" name="edtnameType" id="edtnameType" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputUpdateSize">Data da última atualização</label>
                            <input type="text" class="form-control" name="edtupdateType" id="edtupdateType" value=""
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputCreateSize">Data de criação</label>
                            <input type="text" class="form-control" name="edtcreateType" id="edtcreateType" value=""
                                disabled>
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
$('#modalEditType').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)

    var idType = button.data('whatever').idType
    var nameType = button.data('whatever').nameType
    var updatedAtType = button.data('whatever').updatedAtType
    var createdAtType = button.data('whatever').createdAtType

    modal.find('#edtidType').val(idType)
    modal.find('#edtnameType').val(nameType)
    modal.find('#edtupdateType').val(updatedAtType)
    modal.find('#edtcreateType').val(createdAtType)
})
</script>