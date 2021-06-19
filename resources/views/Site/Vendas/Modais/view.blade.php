<div class="modal fade" id="modalviewsale">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Visualizar Venda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <small class="float-right">Data: {{date('d/m/Y')}}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        De
                        <address>
                            <strong>Alih Store</strong><br>
                            Rua Bias Fortes, 589<br>
                            Congonhal, MG 37550-000<br>
                            Telefone: (35) 9276-9490<br>
                            Email: alihstore@hotmail.com
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        Para
                        <address>
                            <strong>John Doe</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            Telefone: (555) 539-1037<br>
                            Email: john.doe@example.com
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col" id="saleID">
                        
                        <br>
                       
                        
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Qty</th>
                                    <th>Preço</th>
                                    <th>Produto</th>
                                    <th>Descrição</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Call of Duty</td>
                                    <td>455-981-221</td>
                                    <td>El snort testosterone trophy driving gloves handsome</td>
                                    <td>$64.50</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Need for Speed IV</td>
                                    <td>247-925-726</td>
                                    <td>Wes Anderson umami biodiesel</td>
                                    <td>$50.00</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Monsters DVD</td>
                                    <td>735-845-642</td>
                                    <td>Terry Richardson helvetica tousled street art master</td>
                                    <td>$10.70</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Grown Ups Blue Ray</td>
                                    <td>422-568-642</td>
                                    <td>Tousled lomo letterpress</td>
                                    <td>$25.99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                        <p class="lead">Métodos de pagamento:</p>
                        <img src="../../dist/img/credit/visa.png" alt="Visa">
                        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                        <img src="../../dist/img/credit/american-express.png" alt="American Express">
                        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                            Este documento não é um comprovante fiscal da sua compra, ele deve ser usado apenas
                            para conferência dos produtos ou como orçamento.
                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>R$ 250.30</td>
                                    </tr>
                                    <tr>
                                        <th>Taxa (9.3%):</th>
                                        <td>R$ 10.34</td>
                                    </tr>
                                    <tr>
                                        <th>Frete:</th>
                                        <td>R$ 5.80</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>R$ 265.24</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                class="fas fa-print"></i> Imprimir</a>
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Gerar PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
/* When click edit user */
$('#modalviewsale').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var modal = $(this);

    var idSale = button.data('whatever');
    var saleRequest = "http://127.0.0.1:8000/Vendas/Buscar/"+idSale;
    searchpayable(saleRequest);

});


function searchpayable(saleURL) {
    var request = new XMLHttpRequest();
    request.open('GET', saleURL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var sale = request.response;
        $('#saleID').html(
        "<br>"+
        "<b>Pedido: #"+sale[0].sale_id+"</b><br>"+
        "<b>Data:</b> "+sale[0].date_sale+"<br>"+
        "<b>Forma de Pagamento:</b> 2/22/2014<br>"+
        "<b>Parcelas:</b> 968-34567"
        );
        
        /*$('#edtbuyPayable').val(sale[0].date_buypayable);
        $('#edtduePayable').val(sale[0].date_duepayable);
        if(sale[0].status == 1){
            $('#edtstatusPayable').val(sale[0].status);
            $('#edtstatusPayable').prop('checked', true);
            $("#edtdatePayable").prop('disabled', false);
        }
        else{
            $('#edtstatusPayable').val(0);
            $("#edtdatePayable").prop('disabled', true);
            $('#edtstatusPayable').prop('checked', false)
            $("#edtdatePayable").val(null);
        }
        $('#edtstatusPayable').val(sale[0].status);
        $('#edtdatePayable').val(sale[0].date_payable);
        $('#edtpricePayable').val(sale[0].value);
        var modified_value = (payable[0].updated_at).replace(' ', 'T');
        $('#lastupdatedPayable').val(modified_value);*/
    }
}
</script>