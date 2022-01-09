<div class="modal fade" id="modal_item">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Adicionar Produto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <div id="text-remove">
                    <p>Tem certeza que deseja <b>remover</b> esse item da compra?
                    </p>
                </div>
                <form method="post" enctype="multipart/form-data" id="form-item" name="form-item"
                    action="{{route('saleitens.store')}}">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputnameClient">ID Produto</label>
                            <input type="text" class="form-control" name="product_id" id="product_id"
                                Readonly>
                            <input type="hidden" class="form-control" name="sale_id" id="sale_id"
                                value="{{$sales->sale_id}}">
                            <input type="hidden" class="form-control" name="name_item" id="name_item"
                                value="">
                            <input type="hidden" class="form-control" name="saleitens_id" id="saleitens_id"
                                value="">
                        </div>
                        <div class="form-group">
                            <label>Produto</label>
                            <select class="form-control select2bs4" id="selectProduct" style="width: 100%;">
                                <option>Selecione o produto</option>
                                @foreach($products as $products)
                                <option value="{{$products->product_id}}" data-idProduct="{{$products->product_id}}" data-priceSell="{{$products->price_sell}}">{{$products->name}} {{$products->color}} - {{$products->size_name}} - R$ {!!number_format($products->price_sell,2, ',', ' ')!!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputcpfClient">Quantidade</label>
                            <input type="text" class="form-control" name="quantity" id="quantity"
                                value="1">
                        </div>
                        <div class="form-group">
                            <label for="inputemailClient">Valor</label>
                            <input type="number" step=".01" class="form-control" name="price" id="price"
                                value="0">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="button_send_modal" data-funcao="add" class="btn btn-success">Adicionar</button>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<script src="{{asset('js/scripts/modal_item.js')}}"></script>
