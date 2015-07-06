<?php
include_once('inc/conn.php');
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
        <header>
            <div class="appbar-container">
                <div class="appbar-top">
                    <span>
                        <a class="appbar-title" href="index.php">
                            <span>Controle de estoque</span>
                        </a>
                    </span>
                    <div class="appbar-links">
                        <span class="appbar-link-container"> 
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
        <section class="container">
            <div class="row">
                <div class="page-width-container col s12">
                    <article class="primary-article col s12">
                        <h1></h1>
                        <div class="topic-content">
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
    </body>
</html>
