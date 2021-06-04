<div class="modal fade" id="modalNewPlot">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Parcelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormNewPlot" name="FormNewPlot"
                    action="{{route('Site.PlotStore')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNamePlot">Descrição</label>
                            <input type="text" class="form-control" name="namePlot" id="namePlot"
                                placeholder="30 dias">
                        </div>
                        <div class="form-group">
                            <label for="inputNumberPlot">Parcelas</label>
                            <input type="text" class="form-control" name="numberPlot" id="numberPlot"
                                placeholder="30">
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