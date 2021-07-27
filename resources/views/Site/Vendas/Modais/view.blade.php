<div class="modal fade" id="modalviewsale">
    <div class="modal-dialog modal-xl">
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
                        <address id="clientID">

                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col" id="saleID">

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
                                    <th>Preço</th>
                                    <th>Descrição</th>
                                    <th>Quantidade</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody id="produtos">
                                
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
                                <tbody id="total">

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
                        <a href="" id="btnImprimir" rel="noopener" target="_blank" class="btn btn-default"><i
                                class="fas fa-print"></i> Imprimir</a>
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
    var origin = location.origin;
    var saleRequest = origin + "/Vendas/Buscar/" + idSale;
    searchpayable(saleRequest);
    $("#btnImprimir").attr("href", "Vendas/Imprimir/"+idSale)

});


function searchpayable(saleURL) {
    var request = new XMLHttpRequest();
    request.open('GET', saleURL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var sale = request.response;
        $('#saleID').html(
            "<br>" +
            "<b>Pedido: #" + sale.InfoVenda[0].sale_id + "</b><br>" +
            "<b>Data:</b> " + moment(sale.InfoVenda[0].date_sale).format('DD/MM/YYYY') + "<br>" +
            "<b>Forma de Pagamento:</b> " + sale.InfoVenda[0].payment + "<br>" +
            "<b>Parcelas:</b> " + sale.InfoVenda[0].plot
        );

        $('#clientID').html(
            "<strong>" + sale.InfoVenda[0].name + "</strong><br>" +
            sale.InfoVenda[0].address + ", " + sale.InfoVenda[0].number + "<br>" +
            sale.InfoVenda[0].city + ", " + sale.InfoVenda[0].state + " " + sale.InfoVenda[0].cep +
            "<br>" +
            "Telefone: " + sale.InfoVenda[0].phone + "<br>" +
            "Email: " + sale.InfoVenda[0].email
        );

        $('#total').html(
            "<tr>" +
            "<th style='width:50%'>Subtotal:</th>" +
            "<td>R$ " + sale.InfoVenda[0].subtotalitens + "</td>" +
            "</tr>" +
            "<tr>" +
            "<th>Taxa (9.3%):</th>" +
            "<td>R$ 10.34</td>" +
            "</tr>" +
            "<tr>" +
            "<th>Frete:</th>" +
            "<td>R$ " + sale.InfoVenda[0].price_shipping + "</td>" +
            "</tr>" +
            "<tr>" +
            "<th>Total:</th>" +
            "<td>R$ " + sale.InfoVenda[0].amount + "</td>" +
            "</tr>"
        );

        $('#produtos').html('');
        var cont = 1;
        const myObj = (sale.Produtos);
        for (const item of sale.Produtos) { // You can use `let` instead of `const` if you like
            $('#produtos').append(
                "<tr>" +
                "<td>"+cont+ "</td>" +
                "<td>R$ "+item.price+"</td>" +
                "<td>"+item.name+"</td>" +
                "<td>"+item.quantity+"</td>" +
                "<td>R$ "+item.subtotal+"</td>" +
                "</tr>"
            );
            cont++;
        }

    }
}
</script>