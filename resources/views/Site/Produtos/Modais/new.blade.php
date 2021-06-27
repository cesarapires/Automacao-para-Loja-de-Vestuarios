<div class="modal fade" id="modalNewProduct">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Produtos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.ProductsStore')}}" novalidate class="needs-validation">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-12'>
                                    <label for="inputNameProduct">Descrição</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Conjunto Alice Ruby" required maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='row'>
                                <div class='col-9'>
                                    <label for="inputStockProduct">Cor</label>
                                    <input type="text" class="form-control" name="color" id="color"
                                        placeholder="Verde Militar/Nude" required maxlength="30"> 
                                </div>
                                <div class='col-3'>
                                    <label for="inputStockProduct">Estoque</label>
                                    <input type="number" class="form-control" name="stock" id="stock"
                                        placeholder="1" required  maxlength="3">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label for="inputPrice_BuyProduct">Custo</label>
                                    <input type="number" class="form-control" name="pricebuy"
                                        id="pricebuy" placeholder="17.99" step=".01" required>
                                </div>
                                <div class='col-6'>
                                    <label for="inputPrice_SellProduct">Venda</label>
                                    <input type="number" class="form-control" name="pricesell"
                                        id="pricesell" placeholder="54.99" step=".01" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label>Tamanho</label>
                                    <select class="form-control select2bs4" name="size" required style="width: 100%;">
                                        <option selected disabled value="">Selecione um tamanho:</option>
                                        @foreach($sizes as $sizes)
                                        <option value="{{$sizes->size_id}}">{{$sizes->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class='col-6'>
                                    <label>Tipo</label>
                                    <select class="form-control select2bs4" name="type" required style="width: 100%;">
                                        <option selected disabled value="">Selecione um tipo:</option>
                                        @foreach($types as $types)
                                        <option value="{{$types->type_id}}">{{$types->name}}</option>
                                        @endforeach
                                    </select>
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
    <!-- /.modal-dialog -->
</div>

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
