<div class="modal fade" id="modaledtpayable">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Contas a Pagar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.PayableUpdate')}}" novalidate class="needs-validation">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-2'>
                                    <label for="inputNameProduct">ID</label>
                                    <input type="text" class="form-control" name="edtidPayable" id="edtidPayable"
                                        readonly>
                                </div>
                                <div class='col-10'>
                                    <label for="inputNameProduct">Credor</label>
                                    <input type="text" class="form-control" required name="edtnamePayable" id="edtnamePayable"
                                        placeholder="Núcleo Sistemas Digitais">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label for="inputPrice_SellProduct">Data da Compra</label>
                                    <input type="date" class="form-control" required name="edtbuyPayable" id="edtbuyPayable"
                                        placeholder="01/05/2021">
                                </div>
                                <div class='col-6'>
                                    <label for="inputPrice_BuyProduct">Vencimento</label>
                                    <input type="date" class="form-control" required name="edtduePayable" id="edtduePayable"
                                        placeholder="04/05/2021" step=".01">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Valor</label>
                                    <input type="text" class="form-control" required name="edtpricePayable" id="edtpricePayable"
                                        placeholder="R$ 127.00">
                                </div>
                                <div class='col-5'>
                                    <label>Status</label>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="edtstatusPayable"
                                            id="edtstatusPayable">
                                        <label class="form-check-label">Efetivação</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-5'>
                                    <label>Data Pagamento</label>
                                    <input type="date" class="form-control" required name="edtdatePayable" id="edtdatePayable"
                                        placeholder="04/06/2021" disabled>
                                </div>
                                <div class='col-7'>
                                    <label>Última Modificação</label>
                                    <input type="datetime-local" class="form-control" name="lastupdatedPayable"
                                        id="lastupdatedPayable" placeholder="04/06/2021" step="1" disabled>
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
/* When click edit user */
$('#modaledtpayable').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var modal = $(this);

    var idPayable = button.data('whatever');
    modal.find('#edtidPayable').val(idPayable);
    var payableRequest = "http://127.0.0.1:8000/ContasPagar/Buscar/"+idPayable;
    searchpayable(payableRequest);

});

function searchpayable(payableURL) {
    var request = new XMLHttpRequest();
    request.open('GET', payableURL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var payable = request.response;
        $('#edtnamePayable').val(payable[0].name);
        $('#edtbuyPayable').val(payable[0].date_buypayable);
        $('#edtduePayable').val(payable[0].date_duepayable);
        if(payable[0].status == 1){
            $('#edtstatusPayable').val(payable[0].status);
            $('#edtstatusPayable').prop('checked', true);
            $("#edtdatePayable").prop('disabled', false);
        }
        else{
            $('#edtstatusPayable').val(0);
            $("#edtdatePayable").prop('disabled', true);
            $('#edtstatusPayable').prop('checked', false)
            $("#edtdatePayable").val(null);
        }
        $('#edtstatusPayable').val(payable[0].status);
        $('#edtdatePayable').val(payable[0].date_payable);
        $('#edtpricePayable').val(payable[0].value);
        var modified_value = (payable[0].updated_at).replace(' ', 'T');
        $('#lastupdatedPayable').val(modified_value);
    }
}

var edtpayablestatus = $('#edtstatusPayable');

$('#edtstatusPayable').on('click', function() {
    if (edtpayablestatus.is(':checked')) {
        $("#edtdatePayable").prop('required', true);
        $("#edtdatePayable").prop('disabled', false);
        $('#edtstatusPayable').val(1);
    } else {
        $("#edtdatePayable").prop('required', false);
        $("#edtdatePayable").prop('disabled', true);
        $('#edtstatusPayable').val(0);
        $("#edtdatePayable").val(null);
    }
});
</script>
<script>

(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()
</script>
