<?php
include_once('conn.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST["operacao"])){

        $op = $_POST["operacao"];

        switch ($op) {
            case "pessoa":
            $pes_id       = $_POST["pes_id"];     
            $pes_nome     = $_POST["pes_nome"];
            $pes_email    = $_POST["pes_email"];
            $pes_setor    = $_POST["pes_setor"];

            $sqlIncPeople = "UPDATE pessoa SET nome = '$pes_nome', email = '$pes_email', setor_id = '$pes_setor' WHERE id = $pes_id";

            if(mysqli_query($conexao, $sqlIncPeople)){
                echo "Editado com sucesso!";
            }else{
                echo "ERRO";
            }
            break;
            case "produto":
            $pro_id         = $_POST["pro_id"];     
            $pro_nome       = $_POST["nome"];
            $pro_descricao  = $_POST["descricao"];

            $sqlIncProduto = "UPDATE produto SET nome = '$pro_nome', descricao = '$pro_descricao' WHERE id = $pro_id";

            if(mysqli_query($conexao, $sqlIncProduto)){
                echo "Editado com sucesso!";
            }else{
                echo "ERRO";
            }
            break;
            case "setor":
            $set_id        = $_POST["set_id"];     
            $set_nome      = $_POST["nome"];
            $set_descricao = $_POST["descricao"];

            $sqlIncSetor = "UPDATE setor SET nome = '$set_nome', descricao = '$set_descricao' WHERE id = $set_id";

            if(mysqli_query($conexao, $sqlIncSetor)){
                echo "Editado com sucesso!";
            }else{
                echo "ERRO";
            }
            break;
            
            
            case "solicitar":
            $sol_id         = $_POST["sol_id"];
            $sol_nome       = $_POST["nome"];
            $sol_produto_id = $_POST["produto_id"];
            $sol_quantidade = $_POST["quantidade"];
            $sol_setor_id   = $_POST["setor_id"];

            $sqlIncSolicitar = "UPDATE solicitacao SET nome = '$sol_nome', produto_id = '$sol_produto_id', quantidade = '$sol_quantidade', setor_id = '$sol_setor_id' WHERE solicitacao.id = $sol_id";

            if(mysqli_query($conexao, $sqlIncSolicitar)){
                echo "Editado com sucesso!";
            }else{
                echo "ERRO";
            }
            break;
        }
    }
}else{
    header('Location: ../404.php');    
}
?>