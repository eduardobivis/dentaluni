$(function(){

    //Validação Editar
    $("#edit").validate({
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