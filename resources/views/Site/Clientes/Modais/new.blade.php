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
                <form method="post" enctype="multipart/form-data" id="FormProducts" name="FormProducts"
                    action="{{route('Site.ClientsStore')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputnameClient">Nome</label>
                            <input type="text" class="form-control" name="nameClient" id="nameClient"
                                placeholder="Rebeca Alana Débora Barbosa">
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label for="inputcpfClient">CPF</label>
                                    <input type="text" class="form-control" name="cpfClient" id="cpfClient"
                                        placeholder="165.641.476-78">
                                </div>
                                <div class='col-6'>
                                    <label for="inputphoneClient">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="phoneClient" id="phoneClient"
                                        placeholder="04/05/2021">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputemailClient">Email</label>
                            <input type="text" class="form-control" name="emailClient" id="emailClient"
                                placeholder="rebecaalanadebora@alihstore.com">
                        </div>
                        <div class="form-group">
                            <div class='row'>
                                <div class='col-6'>
                                    <label for="inputcpfClient">Telefone</label>
                                    <input type="text" class="form-control" name="cpfClient" id="cpfClient"
                                        placeholder="(35) 99987-2682">
                                </div>
                                <div class='col-6'>
                                    <label for="inputphoneClient">Cidade</label>
                                    <input type="text" class="form-control" name="phoneClient" id="phoneClient"
                                        placeholder="Pouso Alegre">
                                </div>
                            </div>
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