<div class="modal fade" id="modalEditPlot">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Parcelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormEdtProducts" name="FormEdtProducts"
                    action="{{route('Site.PlotUpdate')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputIdPlot">ID</label>
                            <input type="text" class="form-control" name="edtidPlot" id="edtidPlot" value="" Readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputNamePlot">Descrição</label>
                            <input type="text" class="form-control" name="edtnamePlot" id="edtnamePlot"
                                placeholder="30 dias">
                        </div>
                        <div class="form-group">
                            <label for="inputNumberPlot">Parcelas</label>
                            <input type="text" class="form-control" name="edtnumberPlot" id="edtnumberPlot"
                                placeholder="30">
                        </div>
                        <div class="form-group">
                            <label for="inputUpdatePlot">Data da última atualização</label>
                            <input type="text" class="form-control" name="edtupdatedAtPlot" id="edtupdatedAtPlot" value=""
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputCreatePlot">Data de criação</label>
                            <input type="text" class="form-control" name="edtcreatedAtPlot" id="edtcreatedAtPlot" value=""
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
$('#modalEditPlot').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)

    var idPlot = button.data('whatever').idPlot
    var namePlot = button.data('whatever').namePlot
    var numberPlot = button.data('whatever').numberPlot
    var updatedAtPlot = button.data('whatever').updatedAtPlot
    var createdAtPlot = button.data('whatever').createdAtPlot

    modal.find('#edtidPlot').val(idPlot)
    modal.find('#edtnamePlot').val(namePlot)
    modal.find('#edtnumberPlot').val(numberPlot)
    modal.find('#edtupdatedAtPlot').val(updatedAtPlot)
    modal.find('#edtcreatedAtPlot').val(createdAtPlot)
})
</script>