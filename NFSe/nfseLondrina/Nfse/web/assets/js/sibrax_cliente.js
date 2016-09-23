$("#cliente_fone").mask("(99) 99999-9999");

$("#cliente_fone").on("blur", function() {
    var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

    if( last.length == 3 ) {
        var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
        var lastfour = move + last;
        var first = $(this).val().substr( 0, 9 );

        $(this).val( first + '-' + lastfour );
    }
})

$("#cliente_celular").mask("(99) 99999-9999");

$("#cliente_celular").on("blur", function() {
    var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

    if( last.length == 3 ) {
        var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
        var lastfour = move + last;
        var first = $(this).val().substr( 0, 9 );

        $(this).val( first + '-' + lastfour );
    }
})

$('form[name="cliente"]').submit(function() {
    $("#cliente_cpfcnpj").unmask();
});

$("#cliente_cpfcnpj").keydown(function(){
    try {
        $("#cliente_cpfcnpj").unmask();
    } catch (e) {}

    var tamanho = $("#cliente_cpfcnpj").val().length;

    if(tamanho <= 11){
        $("#cliente_cpfcnpj").mask("999.999.999-99");
    } else {
        $("#cliente_cpfcnpj").mask("99.999.999/9999-99");
    }
});

$(document).ready( function() {
    $('#cliente_cep').change(function() {

        var selected = $(this).val()
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "http://api.postmon.com.br/v1/cep/"+selected, false);
        xhr.send();

        if(xhr.statusText == 'OK' && xhr.status == 200){
            var dadosJson = JSON.parse(xhr.response);

            var endereco = document.getElementById('cliente_endereco');
            endereco.value = dadosJson.logradouro;
            var bairro = document.getElementById('cliente_bairro');
            bairro.value = dadosJson.bairro;
            var cidade = document.getElementById('cliente_cidade');
            cidade.value = dadosJson.cidade;
            var estado = document.getElementById('cliente_uf');
            estado.value = dadosJson.estado;
            var codIbge = document.getElementById('cliente_codCid');
            codIbge.value = dadosJson.cidade_info.codigo_ibge;
        }

    });
});

//Salvar
jQuery(document).ready(function () {
    jQuery('#cliente_form').submit(function () {

        var dados = jQuery(this).serializeArray();
        jQuery.ajax({
            type: "POST",
            url: "SalvarCliente",
            data: {dados: dados},
            success: function (data) {
                if (data.success == true){
                    alert('Cadastrado com Sucesso!');
                    // var url=  "{{ path('cliente_edit', {'id': valorID}) }}";
                    // url = url.replace('valorID', data.idCliente);
                    // window.location = url;
                }
                else if (data.success == false) {
                    alert('Erro ao salvar cadastro. Erros: ' + data.msg);
                }
            }
        });

        return false;
    });
});

function mascaraData(val) {
    var pass = val.value;
    var expr = /[0123456789]/;

    for (i = 0; i < pass.length; i++) {
        // charAt -> retorna o caractere posicionado no índice especificado
        var lchar = val.value.charAt(i);
        var nchar = val.value.charAt(i + 1);

        if (i == 0) {
            // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
            // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
            // instStr.search(expReg);
            if ((lchar.search(expr) != 0) || (lchar > 3)) {
                val.value = "";
            }

        } else if (i == 1) {

            if (lchar.search(expr) != 0) {
                // substring(indice1,indice2)
                // indice1, indice2 -> será usado para delimitar a string
                var tst1 = val.value.substring(0, (i));
                val.value = tst1;
                continue;
            }

            if ((nchar != '/') && (nchar != '')) {
                var tst1 = val.value.substring(0, (i) + 1);

                if (nchar.search(expr) != 0)
                    var tst2 = val.value.substring(i + 2, pass.length);
                else
                    var tst2 = val.value.substring(i + 1, pass.length);

                val.value = tst1 + '/' + tst2;
            }

        } else if (i == 4) {

            if (lchar.search(expr) != 0) {
                var tst1 = val.value.substring(0, (i));
                val.value = tst1;
                continue;
            }

            if ((nchar != '/') && (nchar != '')) {
                var tst1 = val.value.substring(0, (i) + 1);

                if (nchar.search(expr) != 0)
                    var tst2 = val.value.substring(i + 2, pass.length);
                else
                    var tst2 = val.value.substring(i + 1, pass.length);

                val.value = tst1 + '/' + tst2;
            }
        }

        if (i >= 6) {
            if (lchar.search(expr) != 0) {
                var tst1 = val.value.substring(0, (i));
                val.value = tst1;
            }
        }
    }

    if (pass.length > 10)
        val.value = val.value.substring(0, 10);
    return true;
}

$(document).ready(function(){
    $('#check_switch').click(function(){
        var x = $("#dados_titular").is(":visible");
        if(x == false){
            $("#dados_titular").show();
        }else{
            $("#dados_titular").hide();
        }

        var y = $(window).scrollTop();
        $(window).scrollTop(y+150);
    });
});