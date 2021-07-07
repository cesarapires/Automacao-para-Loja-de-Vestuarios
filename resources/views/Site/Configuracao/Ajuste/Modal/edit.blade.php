<div class="modal fade" id="modaledtadjustment">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar transação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.AdjustmentUpdate')}}" novalidate class="needs-validation">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-12'>
                                    <input type="hidden" class="form-control" name="edtidAdjustment" id="edtidAdjustment">
                                    <label for="inputNameProduct">Descrição</label>
                                    <input type="text" class="form-control" name="edtdescription" id="edtdescription"
                                        placeholder="Núcleo Sistemas Digitais" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label for="inputPrice_SellProduct">Data</label>
                                    <input type="date" class="form-control" name="edtdateAdjustment" id="edtdateAdjustment"
                                        placeholder="01/05/2021" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="rgUser">Tipo da transação</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="edttypeAdjustment"
                                        id="edttypeAdjustment" required>
                                        <option value="">Selecione o tipo</option>
                                        <option value="C">Crédito</option>
                                        <option value="D">Débito</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Valor</label>
                                    <input type="number" class="form-control" name="edtvalueAdjustment"
                                        id="edtvalueAdjustment" placeholder="R$ 127.00" step=".01" required>
                                </div>
                                <div class="col-6">
                                    <label>Última alteração em</label>
                                    <input type="date" class="form-control" name="edtupdatedadjustment"
                                        id="edtupdatedadjustment" placeholder="R$ 127.00" step=".01" readonly>
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
$('#modaledtadjustment').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var modal = $(this);
    var idAdjustment = button.data('whatever');
    modal.find('#edtidAdjustment').val(idAdjustment);
    var requestAdjustment = "http://127.0.0.1:8000/Configuracao/AjusteCaixa/Buscar/" + idAdjustment;
    search(requestAdjustment);
});

function search(URL) {
    var request = new XMLHttpRequest();
    request.open('GET', URL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var adjustment = request.response;
        $('#edtdescription').val(adjustment[0].description);
        $('#edtdateAdjustment').val(adjustment[0].date_adjustment);
        $('#edttypeAdjustment').val(adjustment[0].type);
        $('#edtvalueAdjustment').val(adjustment[0].value);
        var modified_value = (adjustment[0].updated_at).substring(0, 10);
        $('#edtupdatedadjustment').val(modified_value);
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