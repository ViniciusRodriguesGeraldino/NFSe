$("#convenio_telefone").mask("(99) 99999-9999");

$("#convenio_telefone").on("blur", function() {
    var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

    if( last.length == 3 ) {
        var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
        var lastfour = move + last;
        var first = $(this).val().substr( 0, 9 );

        $(this).val( first + '-' + lastfour );
    }
})

$('form[name="convenio_form"]').submit(function() {
    $("#convenio_cnpj").unmask();
});

$("#convenio_cnpj").keydown(function(){
    $("#convenio_cnpj").mask("99.999.999/9999-99");
});

//Salvar
jQuery(document).ready(function () {
    jQuery('#convenio_form').submit(function () {

        var dados = jQuery(this).serializeArray();
        jQuery.ajax({
            type: "POST",
            url: "SalvarConvenio",
            data: {dados: dados},
            success: function (data) {
                if (data.success == true){
                    alert('Cadastrado com Sucesso!');
                    var id = document.getElementById('convenio_id');
                    id.value = data.idConvenio;
                }
                else if (data.success == false) {
                    alert('Erro ao salvar cadastro. Erros: ' + data.msg);
                }
            }
        });

        return false;
    });
});

//Editar
jQuery(document).ready(function () {
    jQuery('#convenio_form_edit').submit(function () {

        var dados = jQuery(this).serializeArray();
        console.log(dados);
        jQuery.ajax({
            type: "POST",
            url: "EditarConvenio",
            data: {dados: dados},
            success: function (data) {
                if (data.success == true){
                    alert('Alterado com Sucesso!');
                }
                else if (data.success == false) {
                    alert('Erro ao alterar o cadastro. Erros: ' + data.msg);
                }
            }
        });

        return false;
    });
});

$(document).ready( function() {
    $('#convenio_cep').change(function() {

        var selected = $(this).val()
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "http://api.postmon.com.br/v1/cep/"+selected, false);
        xhr.send();

        if(xhr.statusText == 'OK' && xhr.status == 200){
            var dadosJson = JSON.parse(xhr.response);

            var endereco = document.getElementById('convenio_endereco');
            endereco.value = dadosJson.logradouro;
            var bairro = document.getElementById('convenio_bairro');
            bairro.value = dadosJson.bairro;
            var cidade = document.getElementById('convenio_cidade');
            cidade.value = dadosJson.cidade;
            var estado = document.getElementById('convenio_uf');
            estado.value = dadosJson.estado;
            var codIbge = document.getElementById('convenio_cod_cidade');
            codIbge.value = dadosJson.cidade_info.codigo_ibge;
        }

    });
});