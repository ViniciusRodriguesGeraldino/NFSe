window.onload = addListeners;

function addListeners(){
    document.getElementById('controladorRelatorio').addEventListener('mousedown', mouseDown, false);
    window.addEventListener('mouseup', mouseUp, false);

}

function mouseUp(){
    window.removeEventListener('mousemove', divMove, true);
}

function divMove(e){
    var div = document.getElementById("controladorRelatorio");
    div.style.position = "absolute";
    div.style.top = e.clientY + "px";
    div.style.left = e.clientX + "px";
    }

function mouseDown(e){
    window.addEventListener('mousemove', divMove, true);
    $('#controladorRelatorio').not(this).css('z-index', '100');
    $(this).css('z-index', '1000');
}

function controlaPag(obj) {
    var pagina = parseInt(document.getElementById('paginaAtual').value);
    var paginaAtual = document.getElementById('pag'.concat(pagina));

    if(obj.id == 'avancarPagina')
        var pageNext = document.getElementById('pag'.concat(pagina+1));
    else if(obj.id == 'voltarPagina')
        var pageNext = document.getElementById('pag'.concat(pagina-1));

    if(pageNext != null){
        paginaAtual.setAttribute("hidden", true);
        pageNext.removeAttribute("hidden");

        if(obj.id == 'avancarPagina'){
            document.getElementById('paginaAtual').value = pagina+1;

            var x = pagina+1;
            var texto = document.getElementById('lblRel').innerHTML;
            var textoDe = texto.substr(texto.indexOf("de")-1, texto.length);
            document.getElementById('lblRel').innerHTML  = x + textoDe;
        }
        else if(obj.id == 'voltarPagina'){
            document.getElementById('paginaAtual').value = pagina-1;

            var x = pagina-1;
            var texto = document.getElementById('lblRel').innerHTML;
            var textoDe = texto.substr(texto.indexOf("de")-1, texto.length);
            document.getElementById('lblRel').innerHTML  = x + textoDe;
        }

    }
}

function ImprimirRelatorio(elem)
{
    var pagina = parseInt(document.getElementById('paginaAtual').value);
    var paginaAtual = document.getElementById('pag'.concat(pagina));
    var page1 = document.getElementById('pag1');
    document.getElementById('paginaAtual').value = 1;

    paginaAtual.setAttribute("hidden", true);
    page1.removeAttribute("hidden");

    window.print();
}