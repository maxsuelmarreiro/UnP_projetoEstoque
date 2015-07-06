<?php
    include_once('conn.php');
    if($_SERVER['REQUEST_METHOD'] == "GET"){           //verificando se é GET
        $_id = $_GET["deletar"];
        if(is_numeric($_id)){                           //verificando se o '$_id' é numero.
            $sqlDeletar = "DELETE FROM tb_projetos WHERE pro_id = $_id";
            mysqli_query($conexao, $sqlDeletar);
            header('Location: ../index.php');    
        }else{
            header('Location: ../404.php');    
        }
        if(empty($_id)){                                // verificando se o $_id esta vazio. 
            header('Location: ../404.php');    
        }
    }elseif($_SERVER['REQUEST_METHOD'] == "POST"){      //verificando se é POST

        if(isset($_POST["operacao"])){

            $op = $_POST["operacao"];                   //há um campo invisivel no formulario que passa esse valor, ai verifico se é cadastrar ou editar no switch.
            
            switch ($op) {
            case "cadastrar":
                $titulo     = $_POST["titulo_projeto"];
                $email      = $_POST["email_autor"];
                $autor      = $_POST["autor_projeto"];
                $prof       = $_POST["professor_orientador"];
                $resumo     = $_POST["resumo_projeto"];
                $curso      = $_POST["curso"];

                $sqlIncPeople = "INSERT INTO tb_projetos(pro_titulo, pro_autor, pro_resumo, pro_curso, pro_email, pro_prof) VALUES ('$titulo', '$autor', '$resumo', '$curso', '$email', '$prof')";

                if(mysqli_query($conexao, $sqlIncPeople)){
                    header('Location: ../index.php');   
                }else{
                    //vou criar um 'session' para informar o erro. 
                    header('Location: ../cadastro.php');    
                }
                break;
            case "editar":
                $id         = $_POST["pes_id"];
                $titulo     = $_POST["titulo_projeto"];
                $email      = $_POST["email_autor"];
                $autor      = $_POST["autor_projeto"];
                $prof       = $_POST["professor_orientador"];
                $resumo     = $_POST["resumo_projeto"];
                $curso      = $_POST["curso"];

                $sqlIncPeople = "UPDATE tb_projetos 
                                 SET pro_titulo = '$titulo', 
                                    pro_autor = '$autor', 
                                    pro_resumo = '$resumo', 
                                    pro_curso = '$curso', 
                                    pro_email = '$email', 
                                    pro_prof = '$prof' 
                                WHERE pro_id = $id";


                if(mysqli_query($conexao, $sqlIncPeople)){
                    header('Location: ../index.php');   
                }else{
                    //vou criar um 'session' para informar o erro. 
                    header('Location: ../cadastro.php');    
                }
                break;
            }
        }
    }else{
            header('Location: ../404.php');    
    }
?>