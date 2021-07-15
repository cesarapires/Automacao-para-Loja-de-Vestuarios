<div class="modal fade" id="modaledtpayment">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Pagamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormEdtProducts" name="FormEdtProducts"
                    action="{{route('Site.PaymentUpdate')}}" novalidate class="needs-validation">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNamePayment">Descrição</label>
                            <input type="hidden" class="form-control" required name="edtidPayment" id="edtidPayment"
                                placeholder="Sumup - Crédito">
                            <input type="text" class="form-control" required name="edtnamePayment" id="edtnamePayment"
                                placeholder="Sumup - Crédito">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputNamePayment">Taxa Fixa</label>
                                <input type="number" class="form-control" name="edtfixratePayment" id="edtfixratePayment"
                                    placeholder="3.4" required step="0.01">
                            </div>
                            <div class="col-md-6">
                                <label for="inputNamePayment">Taxa variável</label>
                                <input type="number" class="form-control" required name="edtratePayment" id="edtratePayment"
                                    placeholder="3.4" step="0.01">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputNamePayment">Taxa ao mês</label>
                                <input type="number" class="form-control" name="edtratemonthPayment" id="edtratemonthPayment"
                                    value="0" readonly step="0.01">
                            </div>
                            <div class="col-md-6">
                                <label for="rgUser">Parcelas</label>
                                <select class="form-control select2bs4" id="edtidplots" name="edtidplots" style="width: 100%;"
                                    disabled>
                                    <option value="-1">Selecione as parcelas</option>
                                    @foreach($plots as $plots)
                                    <option value="{{$plots->number}}">
                                        {{$plots->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="edtcredit" name="edtcredit" value="0">
                            <label class="form-check-label" for="exampleCheck1">Pagamento gerará crédito</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="edtratetypePayment" name="edtratetypePayment"
                                value="1" checked>
                            <label class="form-check-label" for="exampleCheck1">Taxa única</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="edtexemptionPayment"
                                name="edtexemptionPayment" value="1">
                            <label class="form-check-label" for="exampleCheck1">Método do PagSeguro</label>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputCreateSize">Criado em</label>
                                <input type="date" class="form-control" name="edtcreatedAtPayment"
                                    id="edtcreatedAtPayment" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="inputUpdateSize">Última atualização</label>
                                <input type="date" class="form-control" name="edtupdatedAtPayment"
                                    id="edtupdatedAtPayment" value="" disabled>
                            </div>
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
$(document).ready(function() {
    var ratetype = $('#edtratetypePayment');
    var credit = $('#edtcredit');
    var expetion = $("#edtexemptionPayment");

    $('#edtratetypePayment').on('click', function() {
        if (ratetype.is(':checked')) {
            $("#edtratemonthPayment").prop('readonly', true);
            $("#edtratemonthPayment").val(0);
            $("#edtratetypePayment").val(1);
        } else {
            $("#edtratemonthPayment").prop('readonly', false);
            $("#edtratetypePayment").val(0);
        }
    });

    $('#edtcredit').on('click', function() {
    /*
    Se gerar crédito irá salver no banco 1 avisando que essa forma de pagamento
    terá a geração de contas a receber.
    */
    if (credit.is(':checked')) {
        $("#edtcredit").val(1);
    }
    /*
    Se não gerar crédito irá salver no banco 0 avisando que essa forma de pagamento
    não terá a geração de contas a receber.
    */
    else {
        $("#edtcredit").val(0);
    }
});

    $('#edtexemptionPayment').on('click', function() {
        /*
        Caso essa opção esteja marcada irá salvar no banco 1 dizendo que o cliente não terá isenção
        de taxa, ou seja, a taxa será repassada aos clientes e o usuária terá que verificar "marcar" a 
        partir de qual prestação ele começara a pagar a taxa caso se aplique, caso a taxa seja repassada
        de forma integral ele pode deixar a opção.
        */
        if (expetion.is(':checked')) {
            $("#edtidplots").val("-1");
            $("#edtidplots").prop('disabled', false);
            $("#edtexemptionPayment").val(1);
        /*
        Se o checkbox estiver desmarcado o cliente terá isenção de texa, assim ele não terá acrescimo na parcela
        independente da quantidade de prestações.
        */
        } else {
            $("#edtidplots").val("-1");
            $("#edtidplots").prop('disabled', true);
            $("#edtexemptionPayment").val(0);
        }
    });

var edtratetype = $('#edtratetypePayment');
var edtcredit = $('#edtcredit');

$('#edtratetypePayment').on('click', function() {
    if (edtratetype.is(':checked')) {

        $("#edtratemonthPayment").prop('readonly', true);
        $("#edtratetypePayment").val(1);
    } else {
        $("#edtratemonthPayment").prop('readonly', false);
        $("#edtratetypePayment").val(0);
    }
});

});
</script>

<script>
/* When click edit user */
$('#modaledtpayment').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var modal = $(this);
    var idPayment = button.data('whatever');
    modal.find('#edtidPayment').val(idPayment);
    var origin = location.origin;
    var requestPayment = origin+"/Configuracao/Pagamento/Buscar/"+idPayment;
    search(requestPayment);
});

function search(URL) {
    var request = new XMLHttpRequest();
    request.open('GET', URL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var payment = request.response;
        $('#edtnamePayment').val(payment[0].name);
        $('#edtfixratePayment').val(payment[0].payment_fixrate);
        $('#edtratePayment').val(payment[0].payment_rate);
        $('#edtratemonthPayment').val(payment[0].payment_ratevariable);
        if(payment[0].credit == 1){
            $("#edtcredit").val("1");
            $("#edtcredit").prop('checked', true);
        }
        else{
            $("#edtcredit").val("0");
            $("#edtcredit").prop('checked', false);
        }
        if(payment[0].payment_ratetype == 1){
            $("#edtratetypePayment").val("1");
            $("#edtratetypePayment").prop('checked', true);
            $('#edtratemonthPayment').prop('readonly', true);
        }
        else{
            $("#edtratetypePayment").val("0");
            $("#edtratetypePayment").prop('checked', false);
            $('#edtratemonthPayment').prop('readonly', false);
        }
        if(payment[0].exemption == 1){
            $("#edtexemptionPayment").val("1");
            $("#edtexemptionPayment").prop('checked', true);
            $('#edtidplots').val(payment[0].plot_id);
            $('#edtidplots').prop('disabled', false);
        }
        else{
            $("#edtexemptionPayment").val("0");
            $("#edtexemptionPayment").prop('checked', false);
            $('#edtidplots').val("-1");
            $('#edtidplots').prop('disabled', true);
        }
        var modified_value = (payment[0].updated_at).substring(0, 10);
        $('#edtupdatedAtPayment').val(modified_value);
        var modified_value = (payment[0].created_at).substring(0, 10);
        $('#edtcreatedAtPayment').val(modified_value);
    }
}
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