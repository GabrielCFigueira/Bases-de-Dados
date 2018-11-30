<html>
    <head>
        <title> Inserir </title>
        <link rel="stylesheet" href="../style.css"/>
        <link rel="icon" type="image/png" href="../database.png"/>
    </head>
    <body>
        <center>
            <h1 id="sgbd"><a id="link_sgbd" href="../index.html">Sistema de Gestão de Incêndios Florestais</a></h1>
        </center>
        <ul id="menu">
            <li><a href="../list.php?table=Local">Locais</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Local">Inserir</a></li>
                </ul>
            </li>
            <li>
                <a href="../list.php?table=Evento">Eventos de Emergência</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Evento">Inserir</a></li>
                    <li><a href="../list.php?table=EventoProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="../list.php?table=Processo">Processos de Socorro</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Processo">Inserir</a></li>
                </ul>
            </li>
            <li><a href="../list.php?table=Meio">Meios</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Meio">Inserir</a></li>
                    <li><a href="../list.php?table=MeioCombate">Combate</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioCombate">Inserir</a></li>
                        </ul>
                    </li>
                    <li><a href="../list.php?table=MeioApoio">Apoio</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioApoio">Inserir</a></li>
                        </ul>
                    </li>
                    <li><a href="../list.php?table=MeioSocorro">Socorro</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioSocorro">Inserir</a></li>
                        </ul>
                    </li>
                    <li><a href="../list.php?table=MeioProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="../list.php?table=Entidade">Entidades</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Entidade">Inserir</a></li>
                </ul>
            </li>
            <li><a href="#">Listagens</a>
                <ul>
                    <li><a href="../list.php?table=MeioAccProc">Meios acionados num processo de socorro</a></li>
                    <li><a href="../list.php?table=MeioSocorroProcLocal">
                    Meios de socorro em processos de socorro originados num dado local de incêndio</a>
                    </li>
                </ul>
            </li>
        </ul>
<?php

    function select_html($result, $name) {

        echo("<select id='combo_style' name='$name'>");

        echo("<option value='NULL' selected > Escolha uma opção </option>\n");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $result->fetch()){ 
            foreach($row as $key=>$val) {
                echo("<option value=$val> $val </option>\n");
            }
        }

        echo("</select>");
    }

    include "../connect.php";

    $table = $_REQUEST['table'];

    if ($table == "Local") {

        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir novo Local</p>
        <p>Morada do Local:</p> <input id='input_style' type='text' name='moradaLocal'/>
        <br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else  if ($table == "Processo") {
        
        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir novo Processo de Socorro</p>
        <p>Número de Processo Socorro:</p> <input id='input_style' type='text' name='numProcessoSocorro'/>
        <p id='form_title'>Insira um Evento de Emergência</p>
        <p>Número de Telefone:</p> <input id='input_style' type='text' name='numTelefone'/>
        <p>Instante da Chamada:</p> <input id='input_style' type='text' name='instanteChamada'/>
        <p>Nome da Pessoa:</p> <input id='input_style' type='text' name='nomePessoa'/>
        <p>Morada do Local:</p>");

        $sql = "select * from local order by moradaLocal;";
        $result = $db->prepare($sql);
        $result->execute();
        
        select_html($result, "moradaLocal");

        echo("<br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else if($table == "Evento") {

        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir novo Evento de Emergência</p>
        <p>Número de Telefone:</p> <input id='input_style' type='text' name='numTelefone'/>
        <p>Instante da Chamada:</p> <input id='input_style' type='text' name='instanteChamada'/>
        <p>Nome da Pessoa:</p> <input id='input_style' type='text' name='nomePessoa'/>
        <p>Morada do Local:</p>");

        $sql = "select * from local order by moradaLocal;";
        $result = $db->prepare($sql);
        $result->execute();
        
        select_html($result, "moradaLocal");

        echo("<p>Número de Processo de Socorro:</p>");

        $sql = "select * from processosocorro order by numprocessosocorro;";
        $result = $db->prepare($sql);
        $result->execute();
        
        select_html($result, "numProcessoSocorro");

        echo("<br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else  if ($table == "Meio") {
    
        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir novo Meio</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome do Meio:</p> <input id='input_style' type='text' name='nomeMeio'/>
        <p>Nome da Entidade Detentora do Meio:</p>");

        $sql = "select * from entidademeio order by nomeentidade;";
        $result = $db->prepare($sql);
        $result->execute();
        
        select_html($result, "nomeEntidade");

        echo("<br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else  if ($table == "Entidade") {

        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir nova Entidade</p>
        <p>Nome da Entidade:</p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else  if ($table == "MeioCombate") {

        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir novo Meio de Combate</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome Entidade:</p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else  if ($table == "MeioApoio") {

        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir novo Meio de Apoio</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome Entidade:</p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else  if ($table == "MeioSocorro") {

        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir novo Meio de Socorro</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome Entidade:</p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else {
        echo("<script>console.log(\"Unexpected table name\");</script>");
    }


?>
    </body>
</html>

    



