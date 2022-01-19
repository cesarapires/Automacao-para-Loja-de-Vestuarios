<div class="card-header">
    <h3 class="card-title">Buscar Contas</h3>

    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
<div class="card-body"
    style="min-height: 290px; height: 290px; max-height: 290px; max-width: 100%;">

</div>

<div class="modal fade" id="modal_receivables">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Adicionar Produto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <div id="text-remove">
                    <p>Tem certeza que deseja <b>remover</b> essa promissória?
                    </p>
                </div>
                <form method="post" enctype="multipart/form-data" id="form-item" name="form-item"
                    action="{{route('saleitens.store')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class='row'>
                            <div class='col-12'>
                                <label for="inputNameProduct">Cliente</label>
                                <select class="form-control select2bs4" id="client" style="width: 100%;">
                                    <option value="NULL">Selecione o cliente</option>
                                    @foreach($clientsReceivables as $clients)
                                    <option value="{{$clients->client_id}}">{{$clients->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-6'>
                                <label for="inputNameProduct">Valor Aberto</label>
                                <input type="number" class="form-control" name="valueOpen" id="valueOpen"
                                    placeholder="" readonly step='0.01'>
                            </div>
                            <div class='col-6'>
                                <label for="inputNameProduct">Valor Vencido</label>
                                <input type="number" class="form-control" name="valueDue" id="valueDue"
                                    placeholder="" readonly step='0.01'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-6'>
                                <label for="inputNameProduct">Data da última venda</label>
                                <input type="date" class="form-control" name="date_lastsale" id="date_lastsale"
                                    placeholder="" readonly>
                            </div>
                            <div class='col-6'>
                                <label for="inputNameProduct">Valor Recebido</label>
                                <input type="number" class="form-control" name="date_lastsale" id="date_lastsale"
                                    placeholder="" step='0.01'>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="button_send_modal" data-funcao="add" class="btn btn-success">Adicionar</button>
            </div>
        </div>
    </div>
</div>

<!-- Adição do JS da página -->
<script src="{{asset('js/scripts/receivable_modal.js')}}"></script>
