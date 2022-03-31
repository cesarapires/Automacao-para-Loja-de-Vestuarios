var base_url = window.location.origin;

//Função de trocar os itens do modal de itens
$("#selectProduct").change(function() {
    var priceProduct = ($(this).find(':selected').attr('data-priceSell'));
    var idProduct = ($(this).find(':selected').attr('data-idProduct'));
    $('#name_item').val($(this).find(':selected').text());
    $('#product_id').val(idProduct);
    $('#price').val(priceProduct);
});

//Ajax para adicionar produto
$("#button_send_modal").click(function(){
    if ($("#button_send_modal").val() == 'add'){
        add_receivable();
    } else if ($("#button_send_modal").val() == 'edit'){
        edit_receivable();
    } else if ($("#button_send_modal").val() == 'delete'){
        delete_receivable();
    } else if ($("#button_send_modal").val() == 'receivable'){
        receivable();
    }
});


$("#modal_receivables").on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    $('#modalClass').attr('class', 'modal-dialog modal-dialog-scrollable');
    if(button.data('funcao') == 'edit'){
        $("#modalClass").addClass("modal-lg");
        $("#modal-title").empty().html(`Editar Promissória #${button.data('value')}`);
        $("#text-remove").hide();
        $("#form-receber-parcial").hide();
        $("#form-editar-titulo").show();
        $("#form-novo-titulo").hide();
        $("#saleitens_id").val(button.data('value'));
        $("#form-item").show();
        $("#button_send_modal").empty().html("Salvar");
        $("#button_send_modal").val('edit');
        get_receivable();
    }
    else if(button.data('funcao') == 'delete'){
        $("#modal-title").empty().html(`Deletar Promissória #${button.data('value')}`);
        $("#text-remove").show();
        $("#form-receber-parcial").hide();
        $("#form-editar-titulo").hide();
        $("#form-novo-titulo").hide();
        $("#saleitens_id").val(button.data('value'));
        $("#button_send_modal").empty().html("Remover");
        $("#button_send_modal").val('delete');
    }
    else if(button.data('funcao') == 'new'){
        $("#modal-title").empty().html("Nova Promissória");
        $("#text-remove").hide();
        $("#form-receber-parcial").hide();
        $("#form-editar-titulo").hide();
        $("#form-novo-titulo").show();
        $("#button_send_modal").empty().html("Adicionar");
        $("#button_send_modal").val('add');
    } else {
        $("#modal-title").empty().html("Receber parcialmente");
        $("#text-remove").hide();
        $("#form-receber-parcial").show();
        $("#form-editar-titulo").hide();
        $("#form-novo-titulo").hide();
        $("#button_send_modal").empty().html("Receber");
        $("#button_send_modal").val('receivable');
    }
});

function get_receivable(){
    let saleitens_id = $("input[name=saleitens_id]").val();
    $.ajax({
        type: "GET",
        url: `${base_url}/api/receivables/${saleitens_id}`,
    }).done(function (Response) {
        if(Response){
            $("input[name=product_id]").val(Response[0].product_id);
            $("input[name=quantity]").val(Response[0].quantity);
            $("#selectProduct").val(Response[0].product_id);
            $("input[name=price]").val(Response[0].price);
        }
        else{
            $('#modal_item').modal('hide');
            $("#form_item").trigger("reset");
            toastr.error(Response.message);
        }
    }).fail(function () {
        toastr.error("Não foi possível completar a requisição");
    });
}

function add_receivable(){
    let name = $("input[name=name_item]").val().slice(0, -11);
    let sale_id = $("input[name=sale_id]").val();
    let product_id = $("input[name=product_id]").val();
    let quantity = $("input[name=quantity]").val();
    let price = $("input[name=price]").val();
    let _token   = $('input[name="_token"]').val();
    $.ajax({
        type: "POST",
        url: `${base_url}/api/saleitens`,
        data: {
            name:name,
            sale_id:sale_id,
            product_id:product_id,
            quantity:quantity,
            price:price,
            _token: _token
        },
    }).done(function (Response) {
        if(Response.code == 200){
            $('#modal_item').modal('hide');
            $("#form_item").trigger("reset");
            loadtable();
            calcular();
            toastr.success(Response.message);
        }
        else{
            toastr.error(Response.message);
        }
    }).fail(function () {
        toastr.error("Não foi possível completar a requisição");
    });
}

function edit_receivable(){
    let saleitens_id = $("input[name=saleitens_id]").val();
    let name = $("input[name=name_item]").val().slice(0, -11);
    let sale_id = $("input[name=sale_id]").val();
    let product_id = $("input[name=product_id]").val();
    let quantity = $("input[name=quantity]").val();
    let price = $("input[name=price]").val();
    let _token   = $('input[name="_token"]').val();
    $.ajax({
        type: "PUT",
        url: `${base_url}/api/receivables/${sale_id}`,
        data: {
            saleitens_id: saleitens_id,
            name:name,
            product_id:product_id,
            quantity:quantity,
            price:price,
        },
    }).done(function (Response) {
        loadtable();
        calcular();
        if(Response.code == 200){
            $('#modal_item').modal('hide');
            $("#form_item").trigger("reset");
            toastr.success(Response.message);
        }
        else{
            toastr.error(Response.message);
        }
    }).fail(function () {
        toastr.error("Não foi possível completar a requisição");
    });
}

function delete_receivable(){
    let sale_id = $("input[name=sale_id]").val();
    let saleitens_id = $("input[name=saleitens_id]").val();
    let _token   = $('input[name="_token"]').val();
    $.ajax({
        type: "DELETE",
        url: `${base_url}/api/receivables/${sale_id}`,
        data: {
            saleitens_id: saleitens_id,
            _token: _token
        },
    }).done(function (Response) {
        loadtable();
        calcular();
        if(Response.code == 200){
            $('#modal_item').modal('hide');
            $("#form_item").trigger("reset");
            toastr.success(Response.message);
        }
        else{
            toastr.error(Response.message);
        }
    }).fail(function () {
        toastr.error("Não foi possível completar a requisição");
    });
}

