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

            </div>
            <!-- /.card-body -->
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
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
        $("#datepayablereceible").prop('required', true);
        $('#statusreceiable').val(1);
    } else {
        $("#datepayablereceible").prop('required', false);
        $("#datepayablereceible").prop('disabled', true);
        $('#statusreceiable').val(0);
        $("#datepayablereceible").val(null);
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
