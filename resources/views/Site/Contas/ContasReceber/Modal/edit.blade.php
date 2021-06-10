<div class="modal fade" id="modaledtreceiable">
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
                    action="{{route('Site.ReceiableUpdate')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-5'>
                                    <label for="inputNameProduct">Nº Título</label>
                                    <input type="text" class="form-control" name="edtidreceiable" id="edtidreceiable" placeholder=""
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
                                    <input type="date" class="form-control" name="edtdatesalereceiable"
                                        id="edtdatesalereceiable" placeholder="01/05/2021">
                                </div>
                                <div class='col-6'>
                                    <label for="inputPrice_BuyProduct">Vencimento</label>
                                    <input type="date" class="form-control" name="edtdateduereceiable"
                                        id="edtdateduereceiable" placeholder="04/05/2021">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Valor</label>
                                    <input type="text" class="form-control" name="edtvaluereceiable" id="edtvaluereceiable"
                                        placeholder="R$ 127.00">
                                </div>
                                <div class='col-5'>
                                    <label>Status</label>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="edtstatusreceiable"
                                            id="edtstatusreceiable">
                                        <label class="form-check-label">Efetivação</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-5'>
                                    <label>Data Pagamento</label>
                                    <input type="date" class="form-control" name="edtdatepayablereceible"
                                        id="edtdatepayablereceible" placeholder="R$ 127.00" disabled>
                                </div>
                                <div class='col-7'>
                                    <label>Última Modificação</label>
                                    <input type="datetime-local" class="form-control" name="lastupdatedReceiable"
                                        id="lastupdatedReceiable" placeholder="04/06/2021" step="1" disabled>
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
$('#modaledtreceiable').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var modal = $(this);

    var idReceiable = button.data('whatever');
    modal.find('#edtidreceiable').val(idReceiable);
    //var receiableRequest = "http://127.0.0.1:8000/ContasPagar/Buscar/"+idReceiable;
    //searchreceiable(receiableRequest);
});

function searchreceiable(receiableURL) {
    var request = new XMLHttpRequest();
    request.open('GET', receiableURL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var receiable = request.response;
        $('#edtidsale').val(receiable[0].name);
        $('#edtnumberplot').val(receiable[0].date_buypayable);
        $('#edtidclient').val(receiable[0].date_duepayable);
        $('#edtclient').val(receiable[0].date_duepayable);
        $('#edtdatesalereceiable').val(receiable[0].date_duepayable);
        $('#edtdateduereceiable').val(receiable[0].date_duepayable);
        $('#edtvaluereceiable').val(receiable[0].date_duepayable);
        if(receiable[0].status == 1){
            $('#edtstatusreceiable').val(receiable[0].status);
            $('#edtstatusreceiable').prop('checked', true);
            $("#edtdatepayablereceible").prop('disabled', false);
        }
        else{
            $('#edtstatusreceiable').val(0);
            $("#edtdatepayablereceible").prop('disabled', true);
            $('#edtstatusreceiable').prop('checked', false)
            $("#edtdatepayablereceible").val(null);
        }
        $('#edtdatepayablereceible').val(receiable[0].date_payable);
        var modified_value = (receiable[0].updated_at).replace(' ', 'T');
        $('#lastupdatedReceiable').val(modified_value);
    }
}

var edtreceiablestatus = $('#edtstatusreceiable');

$('#edtstatusreceiable').on('click', function() {
    if (edtreceiablestatus.is(':checked')) {
        $("#edtdatepayablereceible").prop('disabled', false);
        $('#edtstatusreceiable').val(1);
    } else {
        $("#edtdatepayablereceible").prop('disabled', true);
        $('#edtstatusreceiable').val(0);
        $("#edtdatepayablereceible").val(null);
    }
});

$("#edtclient").change(function() {
    var edtidClient = ($(this).find(':selected').val());
    document.getElementById('edtidclient').value = edtidClient;
});
</script>