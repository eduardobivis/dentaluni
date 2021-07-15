$(function(){

    //Validação Criar
    $("#create").validate({
        rules: {
            nome: { required: true }
        },
        messages: {
            nome: "O campo Nome é obrigatório"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});