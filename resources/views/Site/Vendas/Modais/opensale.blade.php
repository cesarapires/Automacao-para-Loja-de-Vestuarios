<div class="modal fade" id="modalopensale">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Abrir venda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormDelType" name="FormDelType"
                    action="{{route('Site.DelIten')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="delsaleitens_id" id="delsaleitens_id"
                                value="" Readonly>
                            <p id="nameProduct">Ao abrir a venda todos os itens retornarão para o
                                estoque!
                                <br>
                                <br>
                                Você deseja prosseguir?</p>
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