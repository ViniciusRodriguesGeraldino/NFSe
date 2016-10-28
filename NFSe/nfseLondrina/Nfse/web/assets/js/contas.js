
// Add Linhas
function carregaLinhasLancamento() {

    var qtdParcelas = document.getElementById("qtdParcelas");
    var table = document.getElementById("tabelaLancamentos");
    var numOfRows = table.rows.length;

    var divVisivel = $('#Parcelamento').is(':visible');

    if(parseInt(qtdParcelas.value) > 1 &&  divVisivel){

        var addLinhas = parseInt(qtdParcelas.value) - numOfRows;

        addLinhas += 1;

        for (var i = 0; i < addLinhas; i++) {

            var newRow = table.insertRow(numOfRows);

            var rowNumber = numOfRows - 1;

            newCell = newRow.insertCell(0);
            newCell.innerHTML = '<input type="text" id="itemVencimento' + rowNumber + '" name="itemVencimento' + rowNumber + '" class="ContaItem text-center" data-format="dd/MM/yyyy" required="required" placeholder="DD/MM/AAAA">';

            newCell = newRow.insertCell(1);
            newCell.innerHTML = '<input type="text" id="itemValor' + rowNumber + '" name="itemValor' + rowNumber + '" class="ContaItem text-right" required="required" placeholder="0,00">';

            newCell = newRow.insertCell(2);
            newCell.innerHTML = '<input type="text" id="itemAcrescimo' + rowNumber + '" name="itemAcrescimo' + rowNumber + '" class="ContaItem text-right" placeholder="0,00">';

            newCell = newRow.insertCell(3);
            newCell.innerHTML = '<input type="text" id="itemDesconto' + rowNumber + '" name="itemDesconto' + rowNumber + '" class="ContaItem text-right" placeholder="0,00">';

            newCell = newRow.insertCell(4);
            newCell.innerHTML = '<input type="text" id="itemHistorico' + rowNumber + '" name="itemHistorico' + rowNumber + '" class="ContaItem text-center">';

            // newCell = newRow.insertCell(5);
            // newCell.innerHTML = '<input type="text" id="itemCentroCusto' + rowNumber + '" name="itemCentroCusto' + rowNumber + '" class="ContaItem text-center">';

            newCell = newRow.insertCell(5);
            newCell.innerHTML = '×';
            newCell.setAttribute('onclick', 'RemoveTableRow(this)');
            newCell.setAttribute('id', 'btnRemoveLinha');
            newCell.setAttribute('class', 'sale-delete-row');

            numOfRows++;
        }
        lancaValores();
    }
}

// Remove Linha
(function ($) {
    RemoveTableRow = function (handler) {
        var tr = $(handler).closest('tr');
        tr.fadeOut(400, function () {
            tr.remove();
        });
        return false;
    };
})(jQuery);

function lancaValores() {

    var qtdParcelas       = document.getElementById("qtdParcelas");
    var totalDocumento    = document.getElementById("valorTotalDocumento");
    var table             = document.getElementById("tabelaLancamentos");
    var dataVencto        = document.getElementById("dataVencimentoNota");
    var vencimento        = dataVencto.value;
    var historico         = document.getElementById("historico");
    var acrescimo         = document.getElementById("acrescimos");
    var desconto          = document.getElementById("descontos");

    totalDocumento.value = totalDocumento.value.replace(",", ".");
    acrescimo.value = acrescimo.value.replace(",", ".");
    desconto.value = desconto.value.replace(",", ".");

    qtd = qtdParcelas.value;

    if(qtd == null || qtd == '')
        qtd = 1;

    if(totalDocumento.value == null || totalDocumento.value == '')
        totalDocumento.value = '0.00';

    if(acrescimo.value == null || acrescimo.value == '')
        acrescimo.value = '0.00';

    if(desconto.value == null || desconto.value == '')
        desconto.value = '0.00';

    //Calcula valor da parcela
    var valorParcela      = parseFloat(totalDocumento.value) / parseInt(qtd);
    var valUltimaParc     = 0;
    var valorMultiplicado = valorParcela.toFixed(2) * qtd;
    valorMultiplicado = valorMultiplicado.toFixed(2);

    if (valorMultiplicado < parseFloat(totalDocumento.value)){
        var resto = parseFloat(totalDocumento.value) - valorMultiplicado;
        resto = resto.toFixed(2);
        valUltimaParc = parseFloat(valorParcela.toFixed(2)) + parseFloat(resto);
        valUltimaParc = valUltimaParc.toFixed(2);
    }else{
        valUltimaParc = valorParcela.toFixed(2);
    }

    //Calcula valor do acrescimo
    var valorParcelaAcrescimo = parseFloat(acrescimo.value / parseInt(qtd))
    var valUltimaParcAcresimo = 0;
    var valorMultiplicadoAcres= valorParcelaAcrescimo.toFixed(2) * qtd;
    valorMultiplicadoAcres = valorMultiplicadoAcres.toFixed(2);

    if (valorMultiplicadoAcres < parseFloat(acrescimo.value)){
        var resto2 = parseFloat(acrescimo.value) - valorMultiplicadoAcres;
        resto2 = resto2.toFixed(2);
        valUltimaParcAcresimo = parseFloat(valorParcelaAcrescimo.toFixed(2)) + parseFloat(resto2);
        valUltimaParcAcresimo = valUltimaParcAcresimo.toFixed(2);
    }else{
        valUltimaParcAcresimo = valorParcelaAcrescimo.toFixed(2);
    }

    //Calcula valor do desconto
    var valorParcelaDesconto = parseFloat(desconto.value / parseInt(qtd))
    var valUltimaParcDesconto = 0;
    var valorMultiplicadoDesc= valorParcelaDesconto.toFixed(2) * qtd;
    valorMultiplicadoDesc = valorMultiplicadoDesc.toFixed(2);

    if (valorMultiplicadoDesc < parseFloat(desconto.value)){
        var resto3 = parseFloat(desconto.value) - valorMultiplicadoDesc;
        resto3 = resto3.toFixed(2);
        valUltimaParcDesconto = parseFloat(valorParcelaDesconto.toFixed(2)) + parseFloat(resto3);
        valUltimaParcDesconto = valUltimaParcDesconto.toFixed(2);
    }else{
        valUltimaParcDesconto = valorParcelaDesconto.toFixed(2);
    }

    for (var i = 1, row; row = table.rows[i]; i++) {
        // console.log(row);

        for (var j = 0, col; col = row.cells[j]; j++) {

            //vencto
            if(j==0 && col.firstChild.value == ''){
                col.firstChild.value = vencimento;
            }

            //valor
            if(j==1){
                if(i == table.rows.length-1)
                    col.firstChild.value = valUltimaParc;
                else
                    col.firstChild.value = valorParcela.toFixed(2);
            }

            //acrescimo
            if(j==2){
                if(i == table.rows.length-1)
                    col.firstChild.value = valUltimaParcAcresimo;
                else
                    col.firstChild.value = valorParcelaAcrescimo.toFixed(2);
            }

            //desconto
            if(j==3){
                if(i == table.rows.length-1)
                    col.firstChild.value = valUltimaParcDesconto;
                else
                    col.firstChild.value = valorParcelaDesconto.toFixed(2);
            }

            if(j==4){
                col.firstChild.value = historico.value;
            }

        }
        vencimento = retornaProximoMes(vencimento);
    }
}

function retornaProximoMes(dataVal) {
    //Pura gambiarra não me orgulho disto
    var data = dataVal.split("/");

    var newData = data[1]+"/"+data[0]+"/"+data[2];

    var dataNova = new Date(newData);

    dataNova.setMonth(dataNova.getMonth() + 1);

    var dia = dataNova.getDate();
    if (dia.toString().length == 1)
        dia = "0"+dia;
    var mes = dataNova.getMonth()+1;
    if (mes.toString().length == 1)
        mes = "0"+mes;
    var ano = dataNova.getFullYear();
    return dia+"/"+mes+"/"+ano;

    return dataNova;
}

// {#Busca Clientes#}
$(document).on('input', '.NomeCliente', function () {
    var str = $(this).val(); // this.value

    $.ajax({
        url: 'carregaClientes',
        data: {str: str},
        type: 'post',
        success: function (data) {
            $("#NomeCliente").autocomplete({
                source: function(request, response) {
                    var rows = formataClientes(data);
                    return response(rows);
                },

                delay: 200,

                select: function(event, ui) {
                    var hasValue = (ui.item.value != undefined && ui.item.value != "" && ui.item.value != null);
                    if (hasValue) {
                        var focusedElement = $(this);
                        focusedElement.val(ui.item.label);

                        document.getElementById('NomeCliente').value = ui.item.label;
                        document.getElementById('idCliente').value = ui.item.value;

                        return false;
                    }
                    else {
                        return false;
                    }
                },

            });
        }
    });
})

function habilitaParcelamento() {
    var select = document.getElementById('formaPagamento');
    var valor = select.options[select.selectedIndex].value;
    if(valor == 2){
        $("#Parcelamento").show();
    }else {
        $("#Parcelamento").hide();
    }
}

//Salvar
jQuery(document).ready(function () {
    jQuery('#contas_form').submit(function () {

        var dados = jQuery(this).serializeArray();

        var table = document.getElementById('tabelaLancamentos');
        var rowLength = table.rows.length;
        var lancs = [];

        for(var i=1; i<rowLength; i+=1){
            var row = table.rows[i];

            lancs[i-1] = [  row.cells[0].children[0].value,
                row.cells[1].children[0].value,
                row.cells[2].children[0].value,
                row.cells[3].children[0].value,
                row.cells[4].children[0].value
            ]
        }

        jQuery.ajax({
            type: "POST",
            url: "SalvarConta",
            data: {dados: dados, lancamentos: lancs},
            success: function (data) {
                console.log(data);
                if (data.success == true){
                    alert('Conta Salva com Sucesso!');
                }
                else if (data.success == false) {
                    alert('Erro ao salvar conta. Erros: ' + data.mensagens);
                }
            }
        });

        return false;
    });
});

// Editar
jQuery(document).ready(function () {
    jQuery('#contas_form_edit').submit(function () {

        var dados = jQuery(this).serializeArray();

        var table = document.getElementById('tabelaLancamentos');
        var rowLength = table.rows.length;
        var lancs = [];

        for(var i=1; i<rowLength; i+=1){
            var row = table.rows[i];

            lancs[i-1] = [  row.cells[0].children[0].value,
                row.cells[1].children[0].value,
                row.cells[2].children[0].value,
                row.cells[3].children[0].value,
                row.cells[4].children[0].value
            ]
        }

        console.log(dados);

        jQuery.ajax({
            type: "POST",
            url: "EditarConta",
            data: {dados: dados, lancamentos: lancs},
            success: function (data) {
                console.log(data);
                if (data.success == true){
                    alert('Conta Salva com Sucesso!');
                }
                else if (data.success == false) {
                    alert('Erro ao salvar conta. Erros: ' + data.mensagens);
                }
            }
        });

        return false;
    });
});

function formataClientes(data) {
    var rows = [];
    var rowData = null;
    var dataLength = data.length;
    for (var i = 0; i < dataLength; i++) {
        rowData = data[i];
        rows[i] = {
            label: rowData.nome + ' (' + rowData.cpfcnpj + ')',
            value: rowData.id
        };
    }
    return rows;
}

//Carrega Clientes no Modal
$(document).on('show.bs.modal','#modalClientes', function () {
    $('#body_pesquisa').show();
    $('#body_cadastra_cliente').hide();
    $('#BtnNovoCliente').show();
    $('#SelecionarCliente')[0].textContent = "Selecionar";

    var table = document.getElementById('table_search');
    var numOfRows = table.rows.length;
    if(numOfRows > 2)
        return;

    $.ajax({
        url: 'carregaClientes',
        data: {str: ''},
        type: 'post',
        success: function (data) {
            for(var i=0; i<= data.length-1; i++){

                var newRow = table.insertRow(numOfRows);

                newCell = newRow.insertCell(0);
                newCell.innerHTML = data[i].codigoCliente;
                newCell.setAttribute('class', 'lista_codigo_cliente');

                newCell = newRow.insertCell(1);
                newCell.innerHTML = data[i].nome;
                newCell.setAttribute('class', 'lista_nome');

                newCell = newRow.insertCell(2);
                newCell.innerHTML = data[i].cnpj;
                newCell.setAttribute('class', 'lista_cnpj');

                newCell = newRow.insertCell(3);
                newCell.innerHTML = data[i].id;
                newCell.setAttribute('class', 'lista_id');

                numOfRows++;
            }

            //Atribui valor do Modal para o campo do form
            $('#table_search > tbody > tr').dblclick(function () {
                $('#modalClientes').modal('toggle');

                var inputNome   = document.getElementById('NomeCliente');
                inputNome.value = $(this).find(".lista_nome").text() + ' (' + $(this).find(".lista_cnpj").text() + ')';

                var inputIdCliente = document.getElementById('idCliente');
                inputIdCliente.value = $(this).find(".lista_id").text();
            });

            $("#table_search > tbody > tr").click(function() {
                var selected = $(this).hasClass("highlight");
                $("#table_search > tbody > tr").removeClass("highlight");
                if(!selected)
                    $(this).addClass("highlight");
            });

            $("#SelecionarCliente").click(function () {

                $('#modalClientes').modal('toggle');

                if ($('#SelecionarCliente')[0].textContent == "Selecionar"){
                    var cliente = $('.highlight');
                    var inputNome   = document.getElementById('NomeCliente');
                    inputNome.value = cliente.find(".lista_nome").text() + ' (' + cliente.find(".lista_cnpj").text() + ')';

                    var inputIdCliente = document.getElementById('idCliente');
                    inputIdCliente.value = cliente.find(".lista_id").text();
                }else if($('#SelecionarCliente')[0].textContent == "Salvar"){

                    var cliente_cpfcnpj = document.getElementById('cliente_cpfcnpj').value;
                    var cliente_nome = document.getElementById('cliente_nome').value;
                    var cliente_email = document.getElementById('cliente_email').value;
                    var cliente_cep = document.getElementById('cliente_cep').value;
                    var cliente_uf = document.getElementById('cliente_uf').value;
                    var cliente_endereco = document.getElementById('cliente_endereco').value;
                    var cliente_numero = document.getElementById('cliente_numero').value;
                    var cliente_cidade = document.getElementById('cliente_cidade').value;
                    var cliente_bairro = document.getElementById('cliente_bairro').value;
                    var cliente_codCidade = document.getElementById('cliente_codCidade').value;

                    if(cliente_cpfcnpj=="" || cliente_cpfcnpj==null || cliente_nome=="" || cliente_nome==null ||
                        cliente_email=="" || cliente_email==null || cliente_cep=="" || cliente_cep==null ||
                        cliente_uf=="" || cliente_uf==null || cliente_endereco=="" || cliente_endereco==null ||
                        cliente_numero=="" || cliente_numero==null || cliente_cidade=="" || cliente_cidade==null ||
                        cliente_bairro=="" || cliente_bairro==null || cliente_codCidade=="" || cliente_codCidade==null){
                        alert('Preencha os dados corretamente.');
                        return false;
                    }else{

                        var dados = {'cliente_cpfcnpj' : cliente_cpfcnpj, 'cliente_nome' : cliente_nome, 'cliente_email' : cliente_email,
                            'cliente_cep' : cliente_cep, 'cliente_uf' : cliente_uf, 'cliente_endereco' : cliente_endereco,
                            'cliente_numero' : cliente_numero, 'cliente_cidade' : cliente_cidade, 'cliente_bairro' : cliente_bairro,
                            'cliente_codCidade' : cliente_codCidade
                        };

                        jQuery.ajax({
                            type: "POST",
                            url: "notaCadastraCliente",
                            data: dados,
                            success: function (data) {
                                if (data.success == false) {
                                    alert('Erro ao salvar este cadastro. Erros: ' + data.msg);
                                    return false;
                                }else if (data.success == true) {
                                    var inputNome = document.getElementById('NomeCliente');
                                    inputNome.value = data.nome_cliente + ' (' + data.cnpj_cliente + ')';

                                    var inputIdCliente = document.getElementById('idCliente');
                                    inputIdCliente.value = data.id_cliente;

                                    var newRow = table.insertRow(numOfRows);

                                    newCell = newRow.insertCell(0);
                                    newCell.innerHTML = "";
                                    newCell.setAttribute('class', 'lista_codigo_cliente');

                                    newCell = newRow.insertCell(1);
                                    newCell.innerHTML = data.nome_cliente;
                                    newCell.setAttribute('class', 'lista_nome');

                                    newCell = newRow.insertCell(2);
                                    newCell.innerHTML = data.cnpj_cliente;
                                    newCell.setAttribute('class', 'lista_cnpj');

                                    newCell = newRow.insertCell(3);
                                    newCell.innerHTML = data.id_cliente;
                                    newCell.setAttribute('class', 'lista_id');

                                    numOfRows++;

                                }else{
                                    alert('Erro ao cadastrar. Entre em contato com o suporte.')
                                }
                            }
                        });
                    }
                }

            });

        }
    });
});

$(document).ready(function() {
    //Busca Clientes no Modal
    $(".search").keyup(function () {
        var searchTerm = $(".search").val();
        var listItem = $('.results tbody').children('tr');
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

        $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
            return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }
        });

        $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
            $(this).attr('visible','false');
        });

        $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
            $(this).attr('visible','true');
        });
        var jobCount = $('.results tbody tr[visible="true"]').length;
        $('.counter').text(jobCount + ' item');

        if(jobCount == '0') {
            $('.no-result').show();
        }else {
            $('.no-result').hide();
        }
    });

    $('#BtnNovoCliente').click(function (e) {
        $('#body_pesquisa').hide();
        $('#body_cadastra_cliente').show();
        $('#SelecionarCliente')[0].textContent = "Salvar";
        $('#BtnNovoCliente').hide();
    });

});

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
        var codIbge = document.getElementById('cliente_codCidade');
        codIbge.value = dadosJson.cidade_info.codigo_ibge;
    }

});