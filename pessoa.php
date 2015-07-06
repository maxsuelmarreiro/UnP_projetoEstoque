<?php
include_once('inc/conn.php');
$sqlbuscarSetor = "SELECT * FROM setor ORDER BY id";
$buscarSetor = mysqli_query($conexao,$sqlbuscarSetor);
?>
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Controle de estoque - MaxCode</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/materialize.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

        <!-- Add your site or application content here -->
        <div class="content-background"></div>
        <header class="primary-header nocontent">
            <div class="appbar-container">
                <div class="appbar-top">
                    <span itemscope="itemscope">
                        <a class="appbar-title" href="index.php" itemprop="url"><span itemprop="title">Controle de estoque</span></a>
                    </span>
                    <div class="appbar-links">
                        <span class="appbar-icon appbar-link-container"> 
                            <a class="product-icon" href="pessoa.php"> 
                                <span itemprop="title">Pessoa</span> 
                            </a> 
                            <a class="product-icon" href="produto.php"> 
                                <span itemprop="title">Produto</span> 
                            </a> 
                            <a class="product-icon" href="setor.php"> 
                                <span itemprop="title">Setor</span> 
                            </a> 
                        </span>    
                        <a href="solicitar.php" class="wwaves-effect bbtn">Solicitar</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a href="#inserir" class="modal-trigger btn-floating btn-large red">
                <i class="large mdi-content-add"></i>
            </a>
        </div>
        <!-- Modal Structure -->
        <div id="inserir" class="modal modal-fixed-footer">
            <form id="form" action="" method="post" class="col s12">
                <div class="modal-content">
                    <input type="hidden" name="operacao" value="pessoa">
                    <h4>Cadastrar pessoa</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="um" name="pes_nome" type="text" class="validate">
                            <label for="first_name">Nome</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="dois" name="pes_email" type="text" class="validate">
                            <label for="last_name">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="pes_setor">
                                <option value="" disabled selected>Escolha o setor</option>
                                <?php 
while ($setor = mysqli_fetch_assoc($buscarSetor)){
    echo "<option value='$setor[id]'>$setor[nome]</option>";
}
                                ?>
                            </select>  
                            <label>Setor</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit">Enviar</button>
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
                </div>
            </form>
        </div>

        <!-- Modal editar -->
        <div id="modalEditar" class="modal modal-fixed-footer">
            <form id="formeditar" action="" method="post" class="col s12">
                <div id="container-excluir" class="modal-content">

                </div>
                <div class="modal-footer">
                    <button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit">Enviar</button>
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
                </div>
            </form>
        </div>

        <section class="container">
            <div class="row">
                <div class="page-width-container col s12">
                    <article class="primary-article col s12">
                        <h1>Lista de pessoas</h1>
                        <div id="container-exibir" class="topic-content">
                            <br>
                            <div class="progress">
                                <div class="indeterminate"></div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/plugins.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script>$(document).ready(function(){$('select').material_select();});</script>
        <script> 
            $(document).ready(function(){
                $('.modal-trigger').leanModal();
            });
        </script>
        <script type="text/javascript">
            exibirConteudo("pessoa");
            function abrirModal(){
                $('#inserir').openModal();
            }
            function editar(pag, id){
                exibirEditar(pag,id);
                $('#modalEditar').openModal();
            }
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('#form').submit(function(){
                    var dados = jQuery( this ).serialize();
                    jQuery.ajax({
                        type: "POST",
                        url: "inc/inserir.php",
                        data: dados,
                        success: function(data)
                        {
                            //alert(data);
                            if(data == 'Cadastrado com sucesso!'){
                                Materialize.toast(data, 3000,'',function(){
                                    document.getElementById("um").value = "";
                                    document.getElementById("dois").value = "";
                                });
                                exibirConteudo("pessoa"); //atualiza tabela
                            }else{
                                Materialize.toast("Epa! Algo saiu errado.", 3000,'',function(){abrirModal()}); //se der erro reabre o modal.
                            }
                            //Materialize.toast(data, 4000);
                        }
                    });
                    return false;
                });
            });
            jQuery(document).ready(function(){
                jQuery('#formeditar').submit(function(){
                    var dados = jQuery( this ).serialize();
                    jQuery.ajax({
                        type: "POST",
                        url: "inc/editar.php",
                        data: dados,
                        success: function(data)
                        {
                            //alert(data);
                            if(data == 'Editado com sucesso!'){
                                Materialize.toast(data, 3000,'',function(){});
                                exibirConteudo("pessoa"); //atualiza tabela
                            }else{
                                Materialize.toast("Epa! Algo saiu errado.", 3000,'',function(){}); //se der erro reabre o modal.
                            }
                            //Materialize.toast(data, 4000);
                        }
                    });
                    return false;
                });
            });
        </script>
    </body>
</html>
