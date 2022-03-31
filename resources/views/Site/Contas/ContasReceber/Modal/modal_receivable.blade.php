<div class="modal fade" id="modal_receivables">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" id="modalClass">
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

                <form method="post" enctype="multipart/form-data" id="form-receber-parcial">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class='row'>
                            <div class='col-12'>
                                <label for="inputNameProduct">Cliente</label>
                                <select class="form-control select2bs4" id="client" style="width: 100%;">
                                    <option value="NULL">Selecione o cliente</option>
                                    @foreach($clientsReceivables as $clientReceivable)
                                    <option value="{{$clientReceivable->client_id}}">{{$clientReceivable->name}}</option>
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

                <form method="post" enctype="multipart/form-data" id="form-editar-titulo" novalidate class="needs-validation">
                @csrf
                @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <div class='row'>
                                <input type="hidden" class="form-control" name="edtidreceivable" id="edtidreceivable" placeholder="" readonly>
                                <div class='col-3'>
                                    <label for="inputNameProduct">Nº Venda</label>
                                    <input type="text" class="form-control" name="edtidsale" id="edtidsale" placeholder="" readonly>
                                </div>
                                <div class='col-3'>
                                    <label for="inputNameProduct">Parcela</label>
                                    <input type="text" class="form-control" name="edtnumberplot" id="edtnumberplot" placeholder="" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Cliente</label>
                                    <select class="form-control select2bs4" id="edtclient" required>
                                        <option>Selecione o cliente</option>
                                        @foreach($clients as $client)
                                        <option value="{{$client->client_id}}">{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-3'>
                                    <label for="inputPrice_SellProduct">Data da Venda</label>
                                    <input type="date" required class="form-control" name="edtdatesalereceivable"
                                        id="edtdatesalereceivable" placeholder="01/05/2021" readonly>
                                </div>
                                <div class='col-3'>
                                    <label for="inputPrice_BuyProduct">Vencimento</label>
                                    <input type="date" required class="form-control" name="edtdateduereceivable"
                                        id="edtdateduereceivable" placeholder="04/05/2021">
                                </div>
                                <div class='col-3'>
                                    <label>Data Pagamento</label>
                                    <input type="date" class="form-control" required name="edtdatepayablereceivable"
                                        id="edtdatepayablereceivable" placeholder="R$ 127.00" disabled>
                                </div>
                                <div class='col-3'>
                                    <label>Valor Original</label>
                                    <input type="number" required class="form-control" name="edtvaluereceivable" id="edtvaluereceivable"
                                        placeholder="R$ 127.00" step=".01" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-3'>
                                    <label>Valor</label>
                                    <input type="number" required class="form-control" name="edtvaluereceivable" id="edtvaluereceivable"
                                        placeholder="R$ 127.00" step=".01">
                                </div>
                                <div class='col-3'>
                                    <label>Pago</label>
                                    <input type="number" required class="form-control" name="amountpaidvalue" id="amountpaidvalue"
                                        placeholder="R$ 127.00" step=".01">
                                </div>
                                <div class='col-3'>
                                    <label>Restante</label>
                                    <input type="number" required class="form-control" id="remainingvalue"
                                        placeholder="R$ 127.00" step=".01" readonly>
                                </div>
                                <div class='col-3'>
                                    <label>Status</label>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="edtstatusreceivable"
                                            id="edtstatusreceivable">
                                        <label class="form-check-label">Efetivação</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-4'>
                                    <label>Última Modificação</label>
                                    <input type="datetime-local" class="form-control" name="lastupdatedReceivable"
                                        id="lastupdatedReceivable" placeholder="04/06/2021" step="1" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form method="post" enctype="multipart/form-data" id="form-novo-titulo" novalidate class="needs-validation">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-2'>
                                    <label for="inputNameProduct">ID</label>
                                    <input type="text" class="form-control" name="idclient" id="idclient"
                                        placeholder="" readonly>
                                </div>
                                <div class="col-md-10">
                                    <label>Cliente</label>
                                    <select class="form-control select2bs4" required id="client" style="width: 100%;">
                                        <option value="">Selecione o cliente</option>
                                        @foreach($clients as $clients)
                                        <option value="{{$clients->client_id}}">{{$clients->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label for="inputPrice_SellProduct">Data da Venda</label>
                                    <input type="date" required class="form-control" name="datesalereceiable"
                                        id="datesalereceiable" placeholder="01/05/2021">
                                </div>
                                <div class='col-6'>
                                    <label for="inputPrice_BuyProduct">Vencimento</label>
                                    <input type="date" required class="form-control" name="dateduereceiable"
                                        id="dateduereceiable" placeholder="04/05/2021">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Valor</label>
                                    <input type="number" required class="form-control" name="valuereceiable"
                                        id="valuereceiable" placeholder="R$ 127.00" step=".01">
                                </div>
                                <div class='col-5'>
                                    <label>Status</label>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="statusreceiable" id="statusreceiable">
                                        <label class="form-check-label">Efetivação</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Data Pagamento</label>
                                    <input type="date" class="form-control" name="datepayablereceible"
                                        id="datepayablereceible" placeholder="R$ 127.00" disabled>
                                </div>
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
<script src="{{asset('js/scripts/modal_receivable.js')}}"></script>
