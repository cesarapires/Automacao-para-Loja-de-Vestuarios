<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | NSD</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">

    
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> Alih Store
                        <small class="float-right">Data: {{date('d/m/Y')}}</small>
                    </h2>
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
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script>
    window.addEventListener("load", window.print());
    </script>
    <script>
    /* When click edit user */
    $(document).ready(function() {       
        var idSale = 3;
        var origin = location.origin;
        var saleRequest = origin + "/Vendas/Buscar/" + idSale;
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
            for (const item of sale.Produtos) { // You can use `let` instead of `const` if you like
                $('#produtos').append(
                    "<tr>" +
                    "<td>" + cont + "</td>" +
                    "<td>R$ " + item.price + "</td>" +
                    "<td>" + item.name + "</td>" +
                    "<td>" + item.quantity + "</td>" +
                    "<td>R$ " + item.subtotal + "</td>" +
                    "</tr>"
                );
                cont++;
            }

        }
    }
    </script>
</body>

</html>