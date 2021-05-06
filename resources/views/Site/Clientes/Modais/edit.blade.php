<div class="modal fade" id="modalEditClient">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.ClientsUpdate')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputidClient">ID</label>
                            <input type="text" class="form-control" name="edtidClient" id="edtidClient" Readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputnameClient">Nome</label>
                            <input type="text" class="form-control" name="edtnameClient" id="edtnameClient">
                        </div>
                        <div class="form-group">
                            <label for="inputcpfClient">CPF</label>
                            <input type="text" class="form-control" name="edtcpfClient" id="edtcpfClient" Readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputemailClient">Email</label>
                            <input type="text" class="form-control" name="edtemailClient" id="edtemailClient">
                        </div>
                        <div class="form-group">
                            <label for="inputphoneClient">Telefone</label>
                            <input type="text" class="form-control" name="edtphoneClient" id="edtphoneClient">
                        </div>
                        <div class="form-group">
                            <label for="inputbirth_DateClient">Data de Nascimento</label>
                            <input type="text" class="form-control" name="edtbirthdateClient" id="edtbirthdateClient">
                        </div>
                        <div class="form-group">
                            <label for="inputcityClient">Cidade</label>
                            <input type="text" class="form-control" name="edtcityCity" id="edtcityCity">
                        </div>
                        <div class="form-group">
                            <label>Sexo</label>
                            <select class="form-control select2bs4" name="sexClient" style="width: 100%;">
                                <option value="">Selecione um sexo:</option>
                                <option value="1">Masculino</option>
                                <option value="2">Feminimo</option>
                                <option value="3">Outro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputcreatedAtClient">Criado em</label>
                            <input type="text" class="form-control" name="edtcreatedAtClient" id="edtcreatedAtClient" Readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputupdatedAtClient">Última alteração</label>
                            <input type="text" class="form-control" name="edtupdatedAtClient" id="edtupdatedAtClient" Readonly>
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
</div>

<script>
/* When click edit user */
$('#modalEditClient').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)

    var idClient = button.data('whatever').idClient
    var nameClient = button.data('whatever').nameClient
    var cpfClient = button.data('whatever').cpfClient
    var phoneClient = button.data('whatever').phoneClient
    var emailClient = button.data('whatever').emailClient
    var birthdateClient = button.data('whatever').birthdateClient
    var cityCity = button.data('whatever').cityCity
    var sexClient = button.data('whatever').sexClient
    var balance_due = button.data('whatever').balance_due
    var createdAtClient = button.data('whatever').createdAtClient
    var updatedAtClient = button.data('whatever').updatedAtClient

    modal.find('#edtidClient').val(idClient)
    modal.find('#edtnameClient').val(nameClient)
    modal.find('#edtcpfClient').val(cpfClient)
    modal.find('#edtphoneClient').val(phoneClient)
    modal.find('#edtemailClient').val(emailClient)
    modal.find("#edtbirthdateClient").val(birthdateClient)
    modal.find('#edtcityCity').val(cityCity)
    modal.find('#edtsexClient').val(sexClient)
    modal.find('#edtbalance_duo').val(balance_due)
    modal.find('#edtcreatedAtClient').val(createdAtClient)
    modal.find('#edtupdatedAtClient').val(updatedAtClient)
})
</script>