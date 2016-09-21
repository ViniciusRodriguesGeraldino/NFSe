
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
                source: data
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