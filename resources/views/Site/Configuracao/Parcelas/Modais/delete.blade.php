<div class="modal fade" id="modalDeletePlot">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Apagar Parcelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormDelPlot" name="FormDelPlot"
                    action="{{route('Site.PlotDelete')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputIdPlot">ID</label>
                            <input type="text" class="form-control" name="delidPlot" id="delidPlot" value="" Readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputNamePlot">Descrição</label>
                            <input type="text" class="form-control" name="delnamePlot" id="delnamePlot" value=""
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
$('#modalDeletePlot').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)

    var idPlot = button.data('whatever').idPlot
    var namePlot = button.data('whatever').namePlot

    modal.find('#delidPlot').val(idPlot)
    modal.find('#delnamePlot').val(namePlot)
})
</script>