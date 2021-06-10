<div class="modal fade" id="modalnewreceiable">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Contas a Receber</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.ReceivableStore')}}">
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
                                    <select class="form-control select2bs4" id="client" style="width: 100%;">
                                        <option value="NULL">Selecione o cliente</option>
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
                                    <input type="date" class="form-control" name="datesalereceiable"
                                        id="datesalereceiable" placeholder="01/05/2021">
                                </div>
                                <div class='col-6'>
                                    <label for="inputPrice_BuyProduct">Vencimento</label>
                                    <input type="date" class="form-control" name="dateduereceiable"
                                        id="dateduereceiable" placeholder="04/05/2021">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Valor</label>
                                    <input type="text" class="form-control" name="valuereceiable"
                                        id="valuereceiable" placeholder="R$ 127.00">
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

<script>
$("#client").change(function() {
    var idClient = ($(this).find(':selected').val());
    document.getElementById('idclient').value = idClient;
});

var receiablestatus = $('#statusreceiable');

$('#statusreceiable').on('click', function() {
    if (receiablestatus.is(':checked')) {
        $("#datepayablereceible").prop('disabled', false);
        $('#statusreceiable').val(1);
    } else {
        $("#datepayablereceible").prop('disabled', true);
        $('#statusreceiable').val(0);
        $("#datepayablereceible").val(null);
    }
});

</script>