<div class="modal fade" id="modalDeleteIten">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Remover item da venda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormDelType" name="FormDelType"
                    action="{{route('Site.ProductsDelete')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputIdType">ID </label>
                            <input type="hidden" class="form-control" name="delidProduct" id="delidProduct" value=""
                                Readonly>
                        </div>
                        <div>
                            <p>Tem certeza que deseja remover o item</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-danger">Sim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
/* When click edit user */
$('#modalDeleteProduct').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)

    var idProduct = button.data('whatever').idProduct
    var nameProduct = button.data('whatever').nameProduct

    modal.find('#delidProduct').val(idProduct)
    modal.find('#delnameProduct').val(nameProduct)
})
</script>