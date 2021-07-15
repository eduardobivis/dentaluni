$(function(){

    //Validação Criar
    $("#create").validate({
        rules: {
            quantidade: { required: true },
            custo_unitario: { required:true },
            material_id: { required:true }
        },
        messages: {
            quantidade: "O campo Quantidade é obrigatório",
            custo_unitario: "O campo Custo Unitário é obrigatório",
            material_id: "O campo Material é obrigatório"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});