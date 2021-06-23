<div class="modal fade" id="modalEditClient">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" id="title">
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
                            <input type="hidden" class="form-control" name="edtid" id="edtid" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputnameClient">Nome</label>
                            <input type="text" class="form-control" name="edtname" id="edtname"
                                placeholder="Rebeca Alana Débora Barbosa">
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label>Sexo</label>
                                    <select class="form-control select2bs4" name="edtsex" style="width: 100%;">
                                        <option value="">Selecione um sexo:</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Feminimo</option>
                                        <option value="3">Outro</option>
                                    </select>
                                </div>
                                <div class='col-6'>
                                    <label for="inputphoneClient">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="edtbirthday" id="edtbirthday"
                                        placeholder="04/05/2021">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputemailClient">Email</label>
                            <input type="text" class="form-control" name="edtemail" id="edtemail"
                                placeholder="rebecaalanadebora@alihstore.com">
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label for="inputcpfClient">Telefone</label>
                                    <input type="text" class="form-control" name="edtphone" id="edtphone"
                                        placeholder="(35) 99987-2682">
                                </div>
                                <div class='col-6'>
                                    <label for="inputphoneClient">CEP</label>
                                    <input type="text" class="form-control" name="edtcep" id="edtcep" placeholder="41510-520">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-9'>
                                    <label for="inputcpfClient">Endereço</label>
                                    <input type="text" class="form-control" name="edtaddress" id="edtaddress"
                                        placeholder="Rua Três de Maio">
                                </div>
                                <div class='col-3'>
                                    <label for="inputphoneClient">Número</label>
                                    <input type="text" class="form-control" name="edtnumber" id="edtnumber" placeholder="596">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label for="inputcpfClient">Bairro</label>
                                    <input type="text" class="form-control" name="edtdistrict" id="edtdistrict"
                                        placeholder="São Cristóvão">
                                </div>
                                <div class='col-6'>
                                    <label for="inputphoneClient">Cidade</label>
                                    <input type="text" class="form-control" name="edtcity" id="edtcity"
                                        placeholder="Pouso Alegre">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label for="inputphoneClient">Estado</label>
                                    <input type="text" class="form-control" name="edtstate" id="edtstate"
                                        placeholder="Pouso Alegre">
                                </div>
                                <div class='col-6'>
                                    <label for="inputcpfClient">CPF</label>
                                    <input type="text" class="form-control" name="edtcpf" id="edtcpf"
                                        placeholder="165.641.476-78">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label for="inputcreatedAtClient">Criado em</label>
                                    <input type="date" class="form-control" name="edtcreatedat"
                                        id="edtcreatedat" readonly>
                                </div>
                                <div class='col-6'>
                                    <label for="inputupdatedAtClient">Última alteração</label>
                                    <input type="date" class="form-control" name="edtupdatedat"
                                        id="edtupdatedat" readonly>
                                </div>
                            </div>
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
    modal.find('#edtcityClient').val(cityCity)
    modal.find('#edtsexClient').val(sexClient)
    modal.find('#edtbalance_duo').val(balance_due)
    modal.find('#edtcreatedAtClient').val(createdAtClient)
    modal.find('#edtupdatedAtClient').val(updatedAtClient)
})
</script>