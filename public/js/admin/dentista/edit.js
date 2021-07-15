$(function(){

    //Máscara
    $( '.cro' ).mask("#");

    //MultiSelect
    $('.especialidades').select2();

    //Validação Editar
    $("#edit").validate({
        rules: {
            nome: { required: true, maxlength: 100 },
            email: { required: true, email: true, maxlength: 100  },
            cro: { required: true, digits: true, maxlength: 11 },
            cro_uf: { required: true }
        },
        messages: {
            name: {
                required: "O campo Nome é obrigatório",
                maxlength: "O campo Nome não pode conter mais de 100 caracteres"
            },
            email: {
                required: "O campo Email é obrigatório", 
                email: "Insira um Email válido",
                maxlength: "O campo E-mail não pode conter mais de 100 caracteres"
            },
            cro: {
                required: "O campo CRO é obrigatório",
                digits: "O Campo CRO deve conter apenas dígitos",
                maxlength: "O campo CRO não pode conter mais de 11 caracteres"
            },
            cro_uf: "O campo CRO UF é obrigatório"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});