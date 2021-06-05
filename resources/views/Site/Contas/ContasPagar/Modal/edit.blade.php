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
                    action="{{route('Site.ProductsStore')}}">
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
                                    <input type="text" class="form-control" name="edtnamePayable" id="edtnamePayable"
                                        placeholder="Núcleo Sistemas Digitais">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label for="inputPrice_SellProduct">Data da Compra</label>
                                    <input type="text" class="form-control" name="edtbuyPayable" id="edtbuyPayable"
                                        placeholder="01/05/2021">
                                </div>
                                <div class='col-6'>
                                    <label for="inputPrice_BuyProduct">Vencimento</label>
                                    <input type="text" class="form-control" name="edtduePayable" id="edtduePayable"
                                        placeholder="04/05/2021">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Valor</label>
                                    <input type="text" class="form-control" name="edtpricePayable" id="edtpricePayable"
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
                                <div class='col-6'>
                                    <label>Data Pagamento</label>
                                    <input type="text" class="form-control" name="edtdatePayable" id="edtdatePayable"
                                        placeholder="04/06/2021" disabled>
                                </div>
                                <div class='col-6'>
                                    <label>Última Modificação</label>
                                    <input type="text" class="form-control" name="lastupdatedPayable"
                                        id="lastupdatedPayable" placeholder="04/06/2021" disabled>
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

    $.ajax({
        type: "GET",
        url: "ContasPagar/Buscar/"+idPayable,
        data: dataString,
        cache: true
        /*success: function(data) {
            console.log(data);
           // modal.find('.dash').html(data);
        },*/
        /*error: function(err) {
            console.log(err);
        }*/
    });
});

var edtpayablestatus = $('#edtstatusPayable');

$('#edtstatusPayable').on('click', function() {
    if (edtpayablestatus.is(':checked')) {
        $("#edtdatePayable").prop('disabled', false);
        $('#edtstatusPayable').val(1)
    } else {
        $("#edtdatePayable").prop('disabled', true);
        $('#edtstatusPayable').val(0)
    }
});
</script>