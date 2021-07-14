<div class="modal fade" id="modalNewPayment">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pagamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormNewPayment" name="FormNewPayment"
                    action="{{route('Site.PaymentStore')}}"  novalidate class="needs-validation">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNamePayment">Descrição</label>
                            <input type="text" class="form-control" required name="namePayment" id="namePayment"
                                placeholder="Sumup - Crédito">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputNamePayment">Taxa Fixa</label>
                                <input type="number" class="form-control" name="fixratePayment" id="fixratePayment"
                                    placeholder="3.4" required step="0.01">
                            </div>
                            <div class="col-md-6">
                                <label for="inputNamePayment">Taxa variável</label>
                                <input type="number" class="form-control" required name="ratePayment" id="ratePayment"
                                    placeholder="3.4" step="0.01">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputNamePayment">Taxa ao mês</label>
                                <input type="number" class="form-control" name="ratemonthPayment" id="ratemonthPayment"
                                    value="0" readonly step="0.01">
                            </div>
                            <div class="col-md-6">
                                <label for="rgUser">Parcelas</label>
                                <select class="form-control select2bs4" id="idplots" name="idplots"
                                    style="width: 100%;" disabled>
                                    <option value="">Selecione as parcelas</option>
                                    @foreach($plots as $plots)
                                    <option value="{{$plots->number}}">
                                        {{$plots->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="credit" name="credit" value="0">
                            <label class="form-check-label" for="exampleCheck1">Pagamento gerará crédito</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="ratetypePayment" name="ratetypePayment"
                                value="1" checked>
                            <label class="form-check-label" for="exampleCheck1">Taxa única</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exemptionPayment"
                                name="exemptionPayment" value="1">
                            <label class="form-check-label" for="exampleCheck1">Método do PagSeguro</label>
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

<script>
$(document).ready(function() {
    var ratetype = $('#ratetypePayment');
    var credit = $('#credit');
    var expetion = $("#exemptionPayment");

    $('#ratetypePayment').on('click', function() {
        if (ratetype.is(':checked')) {
            $("#ratemonthPayment").prop('readonly', true);
            $("#ratemonthPayment").val(0);
            $("#ratetypePayment").val(1);
        } else {
            $("#ratemonthPayment").prop('readonly', false);
            $("#ratetypePayment").val(0);
        }
    });

    $('#credit').on('click', function() {
        /*
        Se gerar crédito irá salvar no banco 1 avisando que essa forma de pagamento
        terá a geração de contas a receber.
        */
        if (credit.is(':checked')) {
            $("#credit").val(1);
        }
        /*
        Se não gerar crédito irá salvar no banco 0 avisando que essa forma de pagamento
        não terá a geração de contas a receber.
        */
        else {
            $("#credit").val(0);
        }
    });

    $('#exemptionPayment').on('click', function() {
        /*
        Caso essa opção esteja marcada irá salvar no banco 1 dizendo que o cliente não terá isenção
        de taxa, ou seja, a taxa será repassada aos clientes e o usuária terá que verificar "marcar" a 
        partir de qual prestação ele começara a pagar a taxa caso se aplique, caso a taxa seja repassada
        de forma integral ele pode deixar a opção.
        */
        if (expetion.is(':checked')) {
            $("#idplots").val("-1");
            $("#idplots").prop('disabled', false);
            $("#exemptionPayment").val(1);
        /*
        Se o checkbox estiver desmarcado o cliente terá isenção de texa, assim ele não terá acrescimo na parcela
        independente da quantidade de prestações.
        */
        } else {
            $("#idplots").val("1");
            $("#idplots").prop('disabled', true);
            $("#exemptionPayment").val(0);
        }
    });

});
</script>