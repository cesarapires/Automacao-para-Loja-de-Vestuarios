<div class="modal fade" id="modalclosesale">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Fechar venda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormDelType" name="FormDelType"
                    action="{{route('Site.CloseSale')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="closesaleid" id="closesaleid" value=""
                                Readonly>
                            <p id="nameProduct">Ao fechar a venda todos os itens terão saída do
                                estoque!
                                <br>
                                Será gerado contas a receber ou a venda irá direto para o caixa!
                                <br>
                                <br>
                                Você deseja prosseguir?
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-success">Sim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$('#modalclosesale').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)

    var saleId = button.data('whatever').saleId

    modal.find('#closesaleid').val(saleId)
})
</script>