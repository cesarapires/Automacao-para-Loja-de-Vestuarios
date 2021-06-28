<div class="modal fade" id="modaleditproduct">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" id="titleedt">
                <h4 class="modal-title">Alterar produto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormEdtProducts" name="FormEdtProducts"
                    action="{{route('Site.ProductsUpdate')}}" novalidate class="needs-validation">
                    @csrf
                    @method('post')

                    <div class="form-group">
                        <div class='row'>
                            <div class='col-12'>
                                <input type="hidden" id="edtid" name="edtid">
                                <label for="inputNameProduct">Descrição</label>
                                <input type="text" class="form-control" name="edtname" id="edtname"
                                    placeholder="Conjunto Alice Ruby" required maxlength="50">
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class='row'>
                            <div class='col-9'>
                                <label for="inputStockProduct">Cor</label>
                                <input type="text" class="form-control" name="edtcolor" id="edtcolor"
                                    placeholder="Verde Militar/Nude" required maxlength="30">
                            </div>
                            <div class='col-3'>
                                <label for="inputStockProduct">Estoque</label>
                                <input type="text" class="form-control" name="edtstock" id="edtstock" placeholder="1" required  maxlength="3">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class='col-6'>
                                <label for="inputPrice_BuyProduct">Custo</label>
                                <input type="text" class="form-control" name="edtpricebuy" id="edtpricebuy"
                                    placeholder="17.99" placeholder="17.99" step=".01" required>
                            </div>
                            <div class='col-6'>
                                <label for="inputPrice_SellProduct">Venda</label>
                                <input type="text" class="form-control" name="edtpricesell" id="edtpricesell"
                                    placeholder="54.99" placeholder="54.99" step=".01" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class='col-6'>
                                <label>Tamanho</label>
                                <select class="form-control select2bs4" required name="edtsizeId" id="edtsizeId"
                                    style="width: 100%;">
                                    <option disabled value="">Selecione um tamanho:</option>
                                    @foreach($sizes as $sizes)
                                    <option value="{{$sizes->size_id}}">{{$sizes->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='col-6'>
                                <label>Tipo</label>
                                <select class="form-control select2bs4" required name="edttypeId" id="edttypeId"
                                    style="width: 100%;">
                                    <option disabled value="">Selecione um tipo:</option>
                                    @foreach($types as $types)
                                    <option value="{{$types->type_id}}">{{$types->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPrice_SellProduct">Data da última atualização</label>
                        <input type="text" class="form-control" name="edtupdateProduct" id="edtupdateProduct" value=""
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputPrice_SellProduct">Data de criação</label>
                        <input type="text" class="form-control" name="edtcreateProduct" id="edtcreateProduct" value=""
                            disabled>
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

<script>
/* When click edit user */
$('#modaleditproduct').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var modal = $(this);

    var idProduct = button.data('whatever');
    $('#titleedt').html(" <h4 class='modal-title'>Editar produto #" + idProduct + "</h4><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
    var requestProduct = "http://127.0.0.1:8000/Produtos/Buscar/" + idProduct;
    search(requestProduct);
});

function search(URL) {
    var request = new XMLHttpRequest();
    request.open('GET', URL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var product = request.response;
        $("#edtname").val(product[0].name);
        $("#edtcolor").val(product[0].color);
        $("#edtstock").val(product[0].stock);
        $("#edtpricebuy").val(product[0].price_buy);
        $("#edtpricesell").val(product[0].price_sell);
        $("#edttypeId").val(product[0].type_id);
        $("#edtsizeId").val(product[0].size_id);
        $("#edtupdateProduct").val(product[0].created_at);
        $("#edtcreateProduct").val(product[0].updated_at);
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
