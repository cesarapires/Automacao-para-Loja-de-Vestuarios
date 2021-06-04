<div class="modal fade" id="modalEditPlatform">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Plataforma</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormEdtProducts" name="FormEdtProducts"
                    action="{{route('Site.PlatformUpdate')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputIdSize">ID</label>
                            <input type="text" class="form-control" name="edtidPlatform" id="edtidPlatform" value="" Readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputNamePlatform">Descrição</label>
                            <input type="text" class="form-control" name="edtnamePlatform" id="edtnamePlatform" placeholder="Nuvem Shop">
                        </div>
                        <div class="form-group">
                            <label for="inputRatePlatform">Taxa</label>
                            <input type="text" class="form-control" name="edtratePlatform" id="edtratePlatform" placeholder="1.99">
                        </div>
                        <div class="form-group">
                            <label for="inputUpdatePlatform">Data da última atualização</label>
                            <input type="text" class="form-control" name="edtupdatePlatform" id="edtupdatePlatform" value=""
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputCreatePlatform">Data de criação</label>
                            <input type="text" class="form-control" name="edtcreatePlatform" id="edtcreatePlatform" value=""
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
$('#modalEditPlatform').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)

    var idPlatform = button.data('whatever').idPlatform
    var namePlatform = button.data('whatever').namePlatform
    var ratePlatform = button.data('whatever').ratePlatform
    var updatedAtPlatform = button.data('whatever').updatedAtPlatform
    var createdAtPlatform = button.data('whatever').createdAtPlatform

    modal.find('#edtidPlatform').val(idPlatform)
    modal.find('#edtnamePlatform').val(namePlatform)
    modal.find('#edtratePlatform').val(ratePlatform)
    modal.find('#edtupdatePlatform').val(updatedAtPlatform)
    modal.find('#edtcreatePlatform').val(createdAtPlatform)
})
</script>