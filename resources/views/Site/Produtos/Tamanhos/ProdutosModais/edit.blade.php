<div class="modal fade" id="modalEditSize">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar tamanhos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormEdtProducts" name="FormEdtSize"
                    action="{{route('Site.SizeUpdate')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputIdType">ID</label>
                            <input type="text" class="form-control" name="edtidSize" id="edtidSize" value="" Readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputNameType">Descrição</label>
                            <input type="text" class="form-control" name="edtnameSize" id="edtnameSize" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputUpdateType">Data da última atualização</label>
                            <input type="text" class="form-control" name="edtupdateSize" id="edtupdateSize" value=""
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputCreateType">Data de criação</label>
                            <input type="text" class="form-control" name="edtcreateSize" id="edtcreateSize" value=""
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
$('#modalEditSize').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)

    var idSize = button.data('whatever').idSize
    var nameSize = button.data('whatever').nameSize
    var updatedAtSize = button.data('whatever').updatedAtSize
    var createdAtSize = button.data('whatever').createdAtSize

    modal.find('#edtidSize').val(idSize)
    modal.find('#edtnameSize').val(nameSize)
    modal.find('#edtupdateSize').val(updatedAtSize)
    modal.find('#edtcreateSize').val(createdAtSize)
})
</script>