<div class="modal fade" id="modaledtreceivable">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Contas a Receber</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.ReceivableUpdate')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-5'>
                                    <label for="inputNameProduct">Nº Título</label>
                                    <input type="text" class="form-control" name="edtidreceivable" id="edtidreceivable" placeholder=""
                                        readonly>
                                </div>
                                <div class='col-5'>
                                    <label for="inputNameProduct">Nº Venda</label>
                                    <input type="text" class="form-control" name="edtidsale" id="edtidsale" placeholder=""
                                        readonly>
                                </div>
                                <div class='col-2'>
                                    <label for="inputNameProduct">Parcela</label>
                                    <input type="text" class="form-control" name="edtnumberplot" id="edtnumberplot" placeholder=""
                                        readonly>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-2'>
                                    <label for="inputNameProduct">ID</label>
                                    <input type="text" class="form-control" name="edtidclient" id="edtidclient" placeholder=""
                                        readonly>
                                </div>
                                <div class="col-md-10">
                                    <label>Cliente</label>
                                    <select class="form-control select2bs4" id="edtclient" style="width: 100%;">
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
                                    <input type="date" class="form-control" name="edtdatesalereceivable"
                                        id="edtdatesalereceivable" placeholder="01/05/2021">
                                </div>
                                <div class='col-6'>
                                    <label for="inputPrice_BuyProduct">Vencimento</label>
                                    <input type="date" class="form-control" name="edtdateduereceivable"
                                        id="edtdateduereceivable" placeholder="04/05/2021">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Valor</label>
                                    <input type="text" class="form-control" name="edtvaluereceivable" id="edtvaluereceivable"
                                        placeholder="R$ 127.00">
                                </div>
                                <div class='col-5'>
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
                                <div class='col-5'>
                                    <label>Data Pagamento</label>
                                    <input type="date" class="form-control" name="edtdatepayablereceivable"
                                        id="edtdatepayablereceivable" placeholder="R$ 127.00" disabled>
                                </div>
                                <div class='col-7'>
                                    <label>Última Modificação</label>
                                    <input type="datetime-local" class="form-control" name="lastupdatedReceivable"
                                        id="lastupdatedReceivable" placeholder="04/06/2021" step="1" disabled>
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
$('#modaledtreceivable').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var modal = $(this);

    var idReceivable = button.data('whatever');
    modal.find('#edtidreceivable').val(idReceivable);
    var receivableRequest = "http://127.0.0.1:8000/ContasReceber/Buscar/"+idReceivable;
    searchreceivable(receivableRequest);
});

function searchreceivable(receivableURL) {
    var request = new XMLHttpRequest();
    request.open('GET', receivableURL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var receivable = request.response;
        $('#edtidsale').val(receivable[0].sale_id);
        $('#edtnumberplot').val(receivable[0].numberplot);
        $('#edtidclient').val(receivable[0].client_id);
        $('#edtclient').val(receivable[0].client_id);
        $('#edtdatesalereceivable').val(receivable[0].date_sale);
        $('#edtdateduereceivable').val(receivable[0].date_duereceivable);
        $('#edtvaluereceivable').val(receivable[0].value);
        if(receivable[0].status == 1){
            $('#edtstatusreceivable').val(receivable[0].status);
            $('#edtstatusreceivable').prop('checked', true);
            $("#edtdatepayablereceivable").prop('disabled', false);
        }
        else{
            $('#edtstatusreceivable').val(0);
            $("#edtdatepayablereceivable").prop('disabled', true);
            $('#edtstatusreceivable').prop('checked', false)
            $("#edtdatepayablereceivable").val(null);
        }
        $('#edtdatepayablereceivable').val(receivable[0].date_paymentreceivable);
        var modified_value = (receivable[0].updated_at).replace(' ', 'T');
        $('#lastupdatedReceivable').val(modified_value);
    }
}

var edtreceiablestatus = $('#edtstatusreceivable');

$('#edtstatusreceivable').on('click', function() {
    if (edtreceiablestatus.is(':checked')) {
        $("#edtdatepayablereceivable").prop('disabled', false);
        $('#edtstatusreceivable').val(1);
    } else {
        $("#edtdatepayablereceivable").prop('disabled', true);
        $('#edtstatusreceivable').val(0);
        $("#edtdatepayablereceivable").val(null);
    }
});

$("#edtclient").change(function() {
    var edtidClient = ($(this).find(':selected').val());
    document.getElementById('edtidclient').value = edtidClient;
});
</script>