<?php
include_once('conn.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){      //verificando se é POST

    if(isset($_POST["operacao"])){

        $op = $_POST["operacao"];

        switch ($op) {
            case "pessoa":
            $pes_nome     = $_POST["pes_nome"];
            $pes_email    = $_POST["pes_email"];
            $pes_setor    = $_POST["pes_setor"];

            $sqlIncPessoa = "INSERT INTO pessoa(nome, email, setor_id) VALUES ('$pes_nome', '$pes_email', '$pes_setor')";

            if(mysqli_query($conexao, $sqlIncPessoa)){
                echo "Cadastrado com sucesso!";
            }else{
                echo "ERRO";
            }
            break;
            case "produto":
            $pro_nome      = $_POST["nome"];
            $pro_descricao = $_POST["descricao"];

            $sqlIncProduto = "INSERT INTO produto(nome, descricao) VALUES ('$pro_nome', '$pro_descricao')";

            if(mysqli_query($conexao, $sqlIncProduto)){
                echo "Cadastrado com sucesso!";
            }else{
                echo "ERRO";
            }
            break;

            case "setor":
            $set_nome      = $_POST["nome"];
            $set_descricao = $_POST["descricao"];

            $sqlIncSetor = "INSERT INTO setor(nome, descricao) VALUES ('$set_nome', '$set_descricao')";

            if(mysqli_query($conexao, $sqlIncSetor)){
                echo "Cadastrado com sucesso!";
            }else{
                echo "ERRO";
            }
            break;
            case "solicitar":
            $sol_nome      = $_POST["nome"];
            $sol_produto_id = $_POST["produto_id"];
            $sol_quantidade = $_POST["quantidade"];
            $sol_setor_id = $_POST["setor_id"];

            $sqlIncSolicitar = "INSERT INTO solicitacao(nome, produto_id, quantidade, setor_id) VALUES ('$sol_nome', '$sol_produto_id', '$sol_quantidade', '$sol_setor_id')";
            
            if(mysqli_query($conexao, $sqlIncSolicitar)){
                echo "Cadastrado com sucesso!";
            }else{
                echo "ERRO";
            }
            break;
            
            default:
        }
    }
}else{
    header('Location: ../404.php');    
}
?>