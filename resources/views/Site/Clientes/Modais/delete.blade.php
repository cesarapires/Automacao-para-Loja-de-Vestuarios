<div class="modal fade" id="modalDeleteClient">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" id="titledel">
                <h4 class="modal-title">Apagar cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormDelType" name="FormDelType"
                    action="{{route('Site.ClientsDelete')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <p>
                                Tem certeza que deseja apagar o cliente?
                                <br>
                                Ao apagar o cliente todos os registros dele também serão apagados:
                                <br>
                                <br>
                                - Caixa
                                <br>
                                - Contas a receber
                                <br>
                                - Vendas
                            </p>
                            <input type="hidden" class="form-control" name="delidClient" id="delidClient" value=""
                                Readonly>
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
$('#modalDeleteClient').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget); // Button that triggered the modal
    var modal = $(this);

    var idClient = button.data('whatever');

    modal.find('#delidClient').val(idClient);
    $('#titledel').html(" <h4 class='modal-title'>Apagar cliente #" + idClient + "</h4>");
})
</script>