<?php
include_once('conn.php');
if($_SERVER['REQUEST_METHOD'] == "GET"){           //verificando se é GET
    $_id        = $_GET["id"];
    $_pagina    = $_GET["pagina"];

    switch($_pagina){
        case "pessoa":
        $sqlbuscarPessoa = "SELECT *,setor.id AS 'IDSETORpessoa', pessoa.nome AS 'pessoaNome', pessoa.id AS 'pessoaId', setor.nome AS 'setorNome' FROM pessoa LEFT JOIN setor ON setor_id = setor.id WHERE pessoa.id = $_id";
        $buscarPessoa = mysqli_query($conexao,$sqlbuscarPessoa);


        while ($pessoa = mysqli_fetch_assoc($buscarPessoa)){
            $IDpessoa       = $pessoa['pessoaId'];
            $NOMEpessoa     = $pessoa['pessoaNome'];
            $EMAILpessoa    = $pessoa['email'];
            $SETORpessoa    = $pessoa['setorNome'];
            $IDSETORpessoa  = $pessoa['IDSETORpessoa'];


            echo "<h4>Editar pessoa</h4>";
            echo "<input type='hidden' name='operacao' value='pessoa'>";
            echo "<input type='hidden' name='pes_id' class='active' value='$IDpessoa'>";
            echo "<div class='row'>";
            echo "<div class='input-field col s12'>";
            echo "<input id='editar-nome' value='$NOMEpessoa' name='pes_nome' type='text' class='validate'><label for='first_name' class='active'>Nome</label>";
            echo "</div>";
            echo "<div class='input-field col s12'>";
            echo "<input id='doeditar-emailis' value='$EMAILpessoa' name='pes_email' type='text' class='validate'><label for='last_name' class='active'>Email</label>";
            echo "</div>";
            echo "<div class='input-field col s12'>";
            echo "<select class='browser-default' name='pes_setor'>";
            echo "<option value='Setor' disabled>Escolha o setor</option>";
            $sqlbuscarSetor = "SELECT * FROM setor ORDER BY id";
            $buscarSetor = mysqli_query($conexao,$sqlbuscarSetor);
            while ($setor = mysqli_fetch_assoc($buscarSetor)){
                if($setor[id] == $IDSETORpessoa){
                    echo "<option selected value='$setor[id]'>$setor[nome]</option>";
                }else{
                    echo "<option value='$setor[id]'>$setor[nome]</option>";
                }
            }
            echo "</select>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        break;

        case "produto":
        $sqlbuscarProduto = "SELECT * FROM produto WHERE produto.id = $_id";
        $buscarProduto = mysqli_query($conexao,$sqlbuscarProduto);


        while ($produto = mysqli_fetch_assoc($buscarProduto)){
            echo "<h4>Editar produto</h4>";
            echo "<input type='hidden' name='operacao' value='produto'>";
            echo "<input type='hidden' name='pro_id' class='active' value='$produto[id]'>";
            echo "<div class='row'>";
            echo "    <div class='input-field col s12'>";
            echo "        <input name='nome' id='first_name' type='text' class='validate' value='$produto[nome]'>";
            echo "        <label class='active' for='first_name'>Nome</label>";
            echo "    </div>";
            echo "    <div class='input-field col s12'>";
            echo "        <textarea id='textarea1' name='descricao' class='materialize-textarea'>$produto[descricao]</textarea>";
            echo "        <label class='active' for='textarea1'>Descrição</label>";
            echo "    </div>";
            echo "</div>";
        }
        break;

        case "setor":
        $sqlbuscarSetor = "SELECT * FROM setor WHERE setor.id = $_id";
        $buscarSetor = mysqli_query($conexao,$sqlbuscarSetor);

        while ($setor = mysqli_fetch_assoc($buscarSetor)){            

            echo "<h4>Editar setor</h4>";
            echo "<input type='hidden' name='operacao' value='setor'>";
            echo "<input type='hidden' name='set_id' class='active' value='$setor[id]'>";
            echo "<div class='row'>";
            echo "    <div class='input-field col s12'>";
            echo "        <input id='first_name' name='nome' type='text' class='validate' value='$setor[nome]'>";
            echo "        <label class='active' for='first_name'>Nome do setor</label>";
            echo "    </div>";
            echo "    <div class='input-field col s12'>";
            echo "        <textarea id='textarea1' name='descricao' class='materialize-textarea'>$setor[descricao]</textarea>";
            echo "        <label class='active' for='textarea1'>Descrição</label>";
            echo "    </div>";
            echo "</div>";
        }
        break;

        case "solicitar":
        $sqlbuscarSolicitar = "SELECT solicitacao.id, pessoa.id AS 'idPessoa', produto.id AS 'idProduto', setor.id AS 'idSetor', solicitacao.quantidade FROM solicitacao LEFT JOIN pessoa ON solicitacao.nome = pessoa.id LEFT JOIN produto ON solicitacao.produto_id = produto.id LEFT JOIN setor ON solicitacao.setor_id = setor.id WHERE solicitacao.id = $_id";
        
        $sqlbuscarSetor     =       "SELECT * FROM setor ORDER BY id";
        $sqlbuscarProduto   =       "SELECT * FROM produto ORDER BY id";
        $sqlbuscarPessoa    =       "SELECT * FROM pessoa ORDER BY id";

        $buscarSetor        =       mysqli_query($conexao,$sqlbuscarSetor);
        $buscarProduto      =       mysqli_query($conexao,$sqlbuscarProduto);
        $buscarPessoa       =       mysqli_query($conexao,$sqlbuscarPessoa);

        $buscarSolicitar = mysqli_query($conexao,$sqlbuscarSolicitar);
        while ($solicitar = mysqli_fetch_assoc($buscarSolicitar)){
                    
            echo "        <h4>Editar solicitação</h4>";
            echo "        <input type='hidden' name='operacao' value='solicitar'>";
            echo "        <input type='hidden' name='sol_id' class='active' value='$solicitar[id]'>";
            echo "        <div class='row'>";
            echo "            <div class='input-field col s12'>";
            echo "                <select class='browser-default' name='nome'>";
            echo "                <option value='' disabled>Quem fará a solicitação..</option>";
            while ($nomes = mysqli_fetch_assoc($buscarPessoa)){
                if($solicitar[idPessoa] == $nomes[id]){
                    echo "<option value='$nomes[id]' selected>$nomes[nome]</option>";
                }else{
                    echo "<option value='$nomes[id]'>$nomes[nome]</option>";
                }
            }
            echo "                </select>";                                   
            echo "            </div>";
            echo "            <div class='input-field col s12'>";
            echo "                <select class='browser-default' name='produto_id'>";
            echo "                    <option value='' disabled >Escolha o produto..</option>";
            while ($produtos = mysqli_fetch_assoc($buscarProduto)){
                if($produtos[id] == $solicitar[idProduto]){
                    echo "<option value='$produtos[id]' selected>$produtos[nome]</option>";
                }else{
                    echo "<option value='$produtos[id]'>$produtos[nome]</option>";
                }
            }
            echo "                </select>";                                       
            echo "            </div>";
            echo "            <div class='input-field col s12'>";
            echo "                <select class='browser-default' name='setor_id'>";
            echo "                    <option value='' disabled>Escolha o setor..</option>";
            while ($setor = mysqli_fetch_assoc($buscarSetor)){
                if($setor[id] == $solicitar[idSetor]){
                    echo "<option value='$setor[id]' selected>$setor[nome]</option>";
                }else{
                    echo "<option value='$setor[id]'>$setor[nome]</option>";
                }
            }    
            echo "                </select>";
            echo "            </div>";
            echo "            <div class='input-field col s12'>";
            echo "                <input id='last_name' name='quantidade' type='number' class='validate' value='$solicitar[quantidade]'>";
            echo "                <label class='active' for='last_name'>Quantidade</label>";
            echo "            </div>";
            echo "        </div>";
        }
        break;
        default:
    }
}
?>