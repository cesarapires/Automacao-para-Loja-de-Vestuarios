<div class="modal fade" id="modaleditclient">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" id="titleedt">
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormEditClient" name="FormEditClient"
                    action="{{route('Site.ClientsUpdate')}}" novalidate class="needs-validation">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="edtid" id="edtid" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputnameClient">Nome</label>
                            <input type="text" class="form-control" name="edtname" id="edtname"
                                placeholder="Rebeca Alana Débora Barbosa" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label>Sexo</label>
                                    <select class="form-control select2bs4" name="edtsex" id="edtsex"
                                        style="width: 100%;">
                                        <option selected disabled value="">Selecione um sexo:</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Feminimo</option>
                                        <option value="3">Outro</option>
                                    </select>
                                </div>
                                <div class='col-6'>
                                    <label for="inputphoneClient">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="edtbirthdate" id="edtbirthdate"
                                        placeholder="04/05/2021">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputemailClient">Email</label>
                            <input type="text" class="form-control" name="edtemail" id="edtemail"
                                placeholder="rebecaalanadebora@alihstore.com" maxlength="50">
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label for="inputcpfClient">Telefone</label>
                                    <input type="text" class="form-control" name="edtphone" id="edtphone"
                                        placeholder="(35) 99987-2682" maxlength="15">
                                </div>
                                <div class='col-6'>
                                    <label for="inputphoneClient">CEP</label>
                                    <input type="text" class="form-control" name="edtcep" id="edtcep"
                                        placeholder="41510-520" maxlength="9">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-9'>
                                    <label for="inputcpfClient">Endereço</label>
                                    <input type="text" class="form-control" name="edtaddress" id="edtaddress"
                                        placeholder="Rua Três de Maio" maxlength="50">
                                </div>
                                <div class='col-3'>
                                    <label for="inputphoneClient">Número</label>
                                    <input type="text" class="form-control" maxlength="5" name="edtnumber"
                                        id="edtnumber" placeholder="596">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label for="inputcpfClient">Bairro</label>
                                    <input type="text" class="form-control" maxlength="50" name="edtdistrict"
                                        id="edtdistrict" placeholder="São Cristóvão">
                                </div>
                                <div class='col-6'>
                                    <label for="inputphoneClient">Cidade</label>
                                    <input type="text" class="form-control" name="edtcity" id="edtcity"
                                        placeholder="Pouso Alegre" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label for="inputphoneClient">Estado</label>
                                    <input type="text" class="form-control" name="edtstate" id="edtstate"
                                        placeholder="Pouso Alegre" maxlength="2">
                                </div>
                                <div class='col-6'>
                                    <label for="inputcpfClient">CPF</label>
                                    <input type="text" class="form-control" name="edtcpf" id="edtcpf"
                                        placeholder="165.641.476-78" maxlength="14">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
                                    <label for="inputcreatedAtClient">Criado em</label>
                                    <input type="date" class="form-control" name="edtcreatedat" id="edtcreatedat"
                                        readonly step="2">
                                </div>
                                <div class='col-6'>
                                    <label for="inputupdatedAtClient">Última alteração</label>
                                    <input type="date" class="form-control" name="edtupdatedat" id="edtupdatedat"
                                        readonly step="2">
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
$("#edtcep").blur(function() {

    var cep = $('#edtcep').val();
    var cepRequest = "https://viacep.com.br/ws/" + cep + "/json/";
    var request = new XMLHttpRequest();
    request.open('GET', cepRequest);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var returninformation = request.response;
        $('#edtaddress').val(returninformation.logradouro);
        $('#edtdistrict').val(returninformation.bairro);
        $('#edtcity').val(returninformation.localidade);
        $('#edtstate').val(returninformation.uf);
    }
});


/* When click edit user */
$('#modaleditclient').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var modal = $(this);

    var idClient = button.data('whatever');
    $('#titleedt').html(" <h4 class='modal-title'>Editar cliente #"+idClient+"</h4>");
    var requestClient = "http://127.0.0.1:8000/Clientes/Buscar/" + idClient;
    search(requestClient);

});

function search(URL) {
    var request = new XMLHttpRequest();
    request.open('GET', URL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var client = request.response;
        $('#edtid').val(client[0].client_id);
        $('#edtname').val(client[0].name);
        $('#edtsex').val(client[0].sex);
        $('#edtbirthdate').val(client[0].birth_date);
        $('#edtemail').val(client[0].email);
        $('#edtphone').val(client[0].phone);
        $('#edtcep').val(client[0].cep);
        $('#edtaddress').val(client[0].address);
        $('#edtdistrict').val(client[0].district);
        $('#edtnumber').val(client[0].number);
        $('#edtcity').val(client[0].city);
        $('#edtstate').val(client[0].state);
        $('#edtcpf').val(client[0].cpf);
        var updated = (client[0].updated_at).substring(0, 10);
        $('#edtupdatedat').val(updated);
        var created = (client[0].created_at).substring(0, 10);
        $('#edtcreatedat').val(created);
    }
}

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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script>
$(document).ready(function() {
    $("#edtphone").mask('(00) 00000-0000', {
        reverse: false
    });
    $("#edtcep").mask('00000-000', {
        reverse: true
    });
    $("#edtcpf").mask('000.000.000-00', {
        reverse: true
    });
});
</script>