/* Funcionalidades Gerais do Sistema, podem ser usadas em Qualquer página */

    
$( window ).on("load", function() {
                    
    //Máscara Telefone
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
    $( ".telefone" ).mask(SPMaskBehavior, spOptions);

    //Máscara Horário
    $('.data').mask("00/00/0000");
    $('.money').mask('##0,00', {reverse: true});
    $('.integer').mask("#");
    
    
    //Data Table
    $('table.display').DataTable({
        
        //Tradução
        language: {
            sEmptyTable: "Nenhum registro encontrado",
            sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
            sInfoFiltered: "(Filtrados de _MAX_ registros)",
            sInfoPostFix: "",
            sInfoThousands: ".",
            sLengthMenu: "_MENU_ resultados por página",
            sLoadingRecords: "Carregando...",
            sProcessing: "Processando...",
            sZeroRecords: "Nenhum registro encontrado",
            sSearch: "Pesquisar",
            oPaginate: {
                sNext: "Próximo",
                sPrevious: "Anterior",
                sFirst: "Primeiro",
                sLast: "Último"
            },
            oAria: {
                sSortAscending: ": Ordenar colunas de forma ascendente",
                sSortDescending: ": Ordenar colunas de forma descendente"
            },
            select: {
                rows: {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            }
        }
    });

    //Sweet Alerts - Confirmação ao Deletar
    $(".form-deletar").on("submit", function(){
        
        var texto = "";
        switch($('meta[name=modulo]').attr("content")) {
            default:
                texto = "Você não poderá reverter essa ação.";
        }

        event.preventDefault();
        Swal.fire({
            title: 'Tem certeza disso?',
            text: texto,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.value) {
                $(this).unbind('submit').submit();
            }
        })
    });

});
