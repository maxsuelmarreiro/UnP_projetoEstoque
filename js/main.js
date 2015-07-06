function exibirConteudo(str) {
    if (str == "") {
        document.getElementById("container-exibir").innerHTML = "Não há registros...";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("container-exibir").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","inc/exibir.php?pagina="+str,true);
        xmlhttp.send();
    }
}

function excluir(pag, id){
    if (pag == "" || id == "") {
        Materialize.toast('Erro 42.', 4000);
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                conteudo = document.getElementById("container-excluir");
                conteudo.innerHTML = xmlhttp.responseText;
                conteudo_aposPHP = document.getElementById("container-excluir");
                if(conteudo_aposPHP.innerHTML == "sucesso"){
                    Materialize.toast('Deletado com sucesso!', 4000);
                }else{
                    Materialize.toast('Não é possivel remover! (Erro de FOREIGN KEY)', 4000);
                }
                    exibirConteudo(pag);                   
            }
        }
        xmlhttp.open("GET","inc/excluir.php?pagina="+pag+"&id="+id,true);
        xmlhttp.send();
    }
}

function exibirEditar(pag, id){
    if (pag == "" || id == "") {
        Materialize.toast('Erro 42.', 4000);
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("container-excluir").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","inc/exibireditar.php?pagina="+pag+"&id="+id,true);
        xmlhttp.send();
    }
}