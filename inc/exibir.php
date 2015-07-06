<?php
include_once('conn.php');
if($_SERVER['REQUEST_METHOD'] == "GET"){           //verificando se é GET
    $_pagina = $_GET["pagina"];

    switch($_pagina){
        case "pessoa":
        $sqlbuscarPessoa = "SELECT *, pessoa.nome AS 'pessoaNome', pessoa.id AS 'pessoaId', setor.nome AS 'setorNome' FROM pessoa LEFT JOIN setor ON setor_id = setor.id ORDER BY pessoa.id";
        $buscarPessoa = mysqli_query($conexao,$sqlbuscarPessoa);
        echo "<table class='hoverable'>
            <thead>
                <tr>
                    <th data-field='id'>ID</th>
                    <th data-field='nome'>Nome</th>
                    <th data-field='email'>Email</th>
                    <th data-field='setor_id'>Setor</th>
                    <th data-field='opcoes'></th>
                </tr>
            </thead>";
        while ($pessoa = mysqli_fetch_assoc($buscarPessoa)){
            $IDpessoa       = $pessoa['pessoaId'];
            $NOMEpessoa     = $pessoa['pessoaNome'];
            $EMAILpessoa    = $pessoa['email'];
            $SETORpessoa    = $pessoa['setorNome'];

            echo "
            <tbody>
                <tr>
                    <td>$IDpessoa</td>
                    <td>$NOMEpessoa</td>
                    <td>$EMAILpessoa</td>
                    <td>$SETORpessoa</td>
                    <td class='right-align'>
                    <button class='btn-flat waves-effect waves-blue' onclick=\"editar('$_pagina', '$IDpessoa')\">EDITAR</button>
                    <button class='btn-flat waves-effect waves-red' onclick=\"excluir('$_pagina', '$IDpessoa')\">EXCLUIR</button></td>
                </tr>
            </tbody>
";
        }
        echo "        </table>";
        break;

        case "produto":
        $sqlbuscarProduto = "SELECT * FROM produto ORDER BY id";
        $buscarProduto = mysqli_query($conexao,$sqlbuscarProduto);

        echo "<table class='hoverable'>
            <thead>
                <tr>
                    <th data-field='id'>ID</th>
                    <th data-field='nome'>Nome</th>
                    <th data-field='desc'>Descrição</th>
                    <th data-field='opcoes'></th>
                </tr>
            </thead>";

        while ($produto = mysqli_fetch_assoc($buscarProduto)){
            echo "
            <tbody>
                <tr>
                    <td>$produto[id]</td>
                    <td>$produto[nome]</td>
                    <td>$produto[descricao]</td>
                    <td class='right-align'>
                    <button class='btn-flat waves-effect waves-blue' onclick=\"editar('$_pagina', '$produto[id]')\">EDITAR</button>
                    <button class='btn-flat waves-effect waves-red' onclick=\"excluir('$_pagina', '$produto[id]')\">EXCLUIR</button></td>
                </tr>
            </tbody>";
        }
        echo "        </table>";
        break;

        case "setor":
        $sqlbuscarSetor = "SELECT * FROM setor ORDER BY id";
        $buscarSetor = mysqli_query($conexao,$sqlbuscarSetor);
        echo "<table class='hoverable'>
            <thead>
                <tr>
                    <th data-field='id'>ID</th>
                    <th data-field='nome'>Nome do setor</th>
                    <th data-field='desc'>Descrição</th>
                    <th data-field='opcoes'></th>
                </tr>
            </thead>";

        while ($setor = mysqli_fetch_assoc($buscarSetor)){
            echo "
            <tbody>
                <tr>
                    <td>$setor[id]</td>
                    <td>$setor[nome]</td>
                    <td>$setor[descricao]</td>
                    <td class='right-align'>
                    <button class='btn-flat waves-effect waves-blue' onclick=\"editar('$_pagina', '$setor[id]')\">EDITAR</button>
                    <button class='btn-flat waves-effect waves-red' onclick=\"excluir('$_pagina', '$setor[id]')\">EXCLUIR</button></td>
                </tr>
            </tbody>";
        }
        echo "        </table>";
        break;

        case "solicitar":
        $sqlbuscarSolicitar = "SELECT solicitacao.id, pessoa.nome AS 'nomePessoa', produto.nome AS 'nomeProduto', setor.nome AS 'nomeSetor', solicitacao.quantidade FROM solicitacao LEFT JOIN pessoa ON solicitacao.nome = pessoa.id LEFT JOIN produto ON solicitacao.produto_id = produto.id LEFT JOIN setor ON solicitacao.setor_id = setor.id ORDER BY solicitacao.id";
        $buscarSolicitar = mysqli_query($conexao,$sqlbuscarSolicitar);
        echo "<table class='hoverable'>
            <thead>
                <tr>
                    <th data-field='id'>ID</th>
                    <th data-field='nome'>Nome da pessoa</th>
                    <th data-field='prod'>Produto</th>
                    <th data-field='setor'>Setor</th>
                    <th data-field='quant'>Quantidade</th>
                    <th data-field='opcoes'></th>
                </tr>
            </thead>";

        while ($solicitar = mysqli_fetch_assoc($buscarSolicitar)){
            echo "
            <tbody>
                <tr>
                    <td>$solicitar[id]</td>
                    <td>$solicitar[nomePessoa]</td>
                    <td>$solicitar[nomeProduto]</td>
                    <td>$solicitar[nomeSetor]</td>
                    <td>$solicitar[quantidade]</td>
                    <td class='right-align'>
                    <button class='btn-flat waves-effect waves-blue' onclick=\"editar('$_pagina', '$solicitar[id]')\">EDITAR</button>
                    <button class='btn-flat waves-effect waves-red' onclick=\"excluir('$_pagina', '$solicitar[id]')\">EXCLUIR</button></td>
                </tr>
            </tbody>";
        }
        echo "        </table>";
        break;

        default:
        echo "";
    }

    /*
SELECT solicitacao.id, pessoa.nome, produto.nome, setor.nome, solicitacao.quantidade
FROM solicitacao 
LEFT JOIN pessoa 	ON solicitacao.nome = pessoa.id
LEFT JOIN produto 	ON solicitacao.produto_id = produto.id
LEFT JOIN setor 	ON solicitacao.setor_id = setor.id
;

$sql = "SELECT solicitacao.sol_id, pessoa.nome AS \'nomePessoa\', produto.nome AS \'nomeProduto\', setor.nome AS \'nomeSetor\', solicitacao.quantidade FROM solicitacao LEFT JOIN pessoa ON solicitacao.nome = pessoa.pes_id LEFT JOIN produto ON solicitacao.produto_id = produto.pro_id LEFT JOIN setor ON solicitacao.setor_id = setor.set_id";

    if($_id == "pessoa"){
        $sqlDeletar = "DELETE FROM tb_projetos WHERE pro_id = $_id";
        mysqli_query($conexao, $sqlDeletar);
        header('Location: ../index.php');    
    }else{
        header('Location: ../404.php');    
    }
    if(empty($_id)){                                // verificando se o $_id esta vazio. 
        header('Location: ../404.php');    
    }
*/
}
?>