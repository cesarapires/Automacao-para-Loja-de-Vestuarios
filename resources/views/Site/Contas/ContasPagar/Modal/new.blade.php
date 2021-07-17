<div class="modal fade" id="modalnewpayable">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Contas a Pagar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.PayableStore')}}" novalidate class="needs-validation">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-12'>
                                    <label for="inputNameProduct">Credor</label>
                                    <input type="text" class="form-control" required name="namePayable" id="namePayable"
                                        placeholder="Núcleo Sistemas Digitais">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label for="inputPrice_SellProduct">Data da Compra</label>
                                    <input type="date" class="form-control" required name="buyPayable" id="buyPayable"
                                        placeholder="01/05/2021">
                                </div>
                                <div class='col-6'>
                                    <label for="inputPrice_BuyProduct">Vencimento</label>
                                    <input type="date" class="form-control" required name="duePayable" id="duePayable"
                                        placeholder="04/05/2021">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Valor</label>
                                    <input type="number" class="form-control" required name="pricePayable" id="pricePayable"
                                        placeholder="R$ 127.00" step=".01">
                                </div>
                                <div class='col-5'>
                                    <label>Status</label>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="statusPayable"
                                            id="statusPayable">
                                        <label class="form-check-label">Efetivação</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Data Pagamento</label>
                                    <input type="date" class="form-control" name="datePayable" id="datePayable"
                                        placeholder="04/06/2021" disabled>
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
var payablestatus = $('#statusPayable');

$('#statusPayable').on('click', function() {
    if (payablestatus.is(':checked')) {
        $("#datePayable").prop('disabled', false);
        $("#datePayable").prop('riquered', true);
        $('#statusPayable').val(1);
    } else {
        $("#datePayable").prop('riquered', false);
        $("#datePayable").prop('disabled', true);
        $('#statusPayable').val(0);
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
