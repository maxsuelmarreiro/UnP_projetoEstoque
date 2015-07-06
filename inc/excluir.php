<?php
include_once('conn.php');
if($_SERVER['REQUEST_METHOD'] == "GET"){           //verificando se é GET
    $_id        = $_GET["id"];
    $_pagina    = $_GET["pagina"];

    if(is_numeric($_id)){
        switch($_pagina){
            case "pessoa":
            $sqlbuscarPessoa = "DELETE FROM pessoa WHERE pessoa.id = '$_id'";
            $buscarPessoa = mysqli_query($conexao,$sqlbuscarPessoa);
            if ($conexao->query($sqlbuscarPessoa) === TRUE) {
                echo "sucesso";
            } else {
                echo "erro";
            }
            break;

            case "produto":
            $sqlbuscarProduto = "DELETE FROM produto WHERE produto.id = '$_id'";
            $buscarProduto = mysqli_query($conexao,$sqlbuscarProduto);
            if ($conexao->query($sqlbuscarProduto) === TRUE) {
                echo "sucesso";
            } else {
                echo "erro";
            }
            break;

            case "setor":
            $sqlbuscarSetor = "DELETE FROM setor WHERE setor.id = '$_id'";
            $buscarSetor = mysqli_query($conexao,$sqlbuscarSetor);
            if ($conexao->query($sqlbuscarSetor) === TRUE) {
                echo "sucesso";
            } else {
                echo "erro";
            }
            break;
            
            case "solicitar":
            $sqlbuscarSolicitar = "DELETE FROM solicitacao WHERE solicitacao.id = '$_id'";
            $buscarSolicitar = mysqli_query($conexao,$sqlbuscarSolicitar);
            if ($conexao->query($sqlbuscarSolicitar) === TRUE) {
                echo "sucesso";
            } else {
                echo "erro";
            }
            break;

            default:
            echo "";
        }
    }
}
?>