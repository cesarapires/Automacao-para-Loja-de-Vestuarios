<div class="modal fade" id="modalNewProduct">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cadastrar cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormNewClient" name="FormNewClient"
                    action="{{route('Site.ClientsStore')}}" novalidate class="needs-validation">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputnameClient">Nome</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Rebeca Alana Débora Barbosa" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label>Sexo</label>
                                    <select class="form-control select2bs4" name="sex" style="width: 100%;">
                                        <option selected disabled value="">Selecione um sexo:</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Feminimo</option>
                                        <option value="3">Outro</option>
                                    </select>
                                </div>
                                <div class='col-6'>
                                    <label for="inputphoneClient">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="birthdate" id="birthdate"
                                        placeholder="04/05/2021">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputemailClient">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="rebecaalanadebora@alihstore.com" maxlength="50">
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label for="inputcpfClient">Telefone</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="(35) 99987-2682" maxlength="15">
                                </div>
                                <div class='col-6'>
                                    <label for="inputphoneClient">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="cep" placeholder="41510-520"  maxlength="9">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-9'>
                                    <label for="inputcpfClient">Endereço</label>
                                    <input type="text" class="form-control" name="address" id="address"
                                        placeholder="Rua Três de Maio" maxlength="50">
                                </div>
                                <div class='col-3'>
                                    <label for="inputphoneClient">Número</label>
                                    <input type="text" class="form-control" maxlength="5" name="number" id="number" placeholder="596">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label for="inputcpfClient">Bairro</label>
                                    <input type="text" class="form-control" maxlength="50" name="district" id="district"
                                        placeholder="São Cristóvão">
                                </div>
                                <div class='col-6'>
                                    <label for="inputphoneClient">Cidade</label>
                                    <input type="text" class="form-control" name="city" id="city"
                                        placeholder="Pouso Alegre" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label for="inputphoneClient">Estado</label>
                                    <input type="text" class="form-control" name="state" id="state"
                                        placeholder="Pouso Alegre" maxlength="2">
                                </div>
                                <div class='col-6'>
                                    <label for="inputcpfClient">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf"
                                        placeholder="165.641.476-78" maxlength="14">
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
$("#cep").blur(function() {

    var cep = $('#cep').val();
    var cepRequest = "https://viacep.com.br/ws/" + cep + "/json/";
    var request = new XMLHttpRequest();
    request.open('GET', cepRequest);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var returninformation = request.response;
        $('#address').val(returninformation.logradouro);
        $('#district').val(returninformation.bairro);
        $('#city').val(returninformation.localidade);
        $('#state').val(returninformation.uf);
    }
});

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
    $(document).ready(function () { 
        $("#phone").mask('(00) 00000-0000', {reverse: false});
        $("#cep").mask('00000-000', {reverse: true});
        $("#cpf").mask('000.000.000-00', {reverse: true}); 
    });
</script>