<html>
    <head>
        <title> Inserir </title>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="icon" type="image/png" href="../img/database.png"/>
    </head>
    <body>
<?php

    include "../menu/submenu.html";

    function select_html($result, $name) {

        echo("<select id='combo_style' name='$name'>");

        echo("<option value='NULL' selected > Escolha uma opção </option>\n");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $result->fetch()){ 
            foreach($row as $key=>$val) {
                echo("<option value='$val'> $val </option>\n");
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
        <p><b>Morada do Local:</b></p> <input id='input_style' type='text' name='moradaLocal'/>
        <br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else  if ($table == "Processo") {
        
        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir novo Processo de Socorro</p>
        <p><b>Número de Processo Socorro:</b></p> <input id='input_style' type='text' name='numProcessoSocorro'/>
        <p id='form_title'>Insira um Evento de Emergência</p>
        <p><b>Número de Telefone:</b></p> <input id='input_style' type='text' name='numTelefone'/>
        <p><b>Instante da Chamada:</b>(aaaa-mm-dd hh:mm:ss)</p> <input id='input_style' type='text' name='instanteChamada'/>
        <p><b>Nome da Pessoa:</b></p> <input id='input_style' type='text' name='nomePessoa'/>
        <p><b>Morada do Local:</b></p>");

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
        <p><b>Número de Telefone:</b></p> <input id='input_style' type='text' name='numTelefone'/>
        <p><b>Instante da Chamada:</b></p> <input id='input_style' type='text' name='instanteChamada'/>
        <p><b>Nome da Pessoa:</b>(aaaa-mm-dd hh:mm:ss)</p> <input id='input_style' type='text' name='nomePessoa'/>
        <p><b>Morada do Local:</b></p>");

        $sql = "select * from local order by moradaLocal;";
        $result = $db->prepare($sql);
        $result->execute();
        
        select_html($result, "moradaLocal");

        echo("<p><b>Número de Processo de Socorro:</b></p>");

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
        <p><b>Número do Meio:</b></p> <input id='input_style' type='text' name='numMeio'/>
        <p><b>Nome do Meio:</b></p> <input id='input_style' type='text' name='nomeMeio'/>
        <p><b>Nome da Entidade Detentora do Meio:</b></p>");

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
        <p><b>Nome da Entidade:</b></p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else  if ($table == "MeioCombate") {

        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir novo Meio de Combate</p>
        <p><b>Número do Meio:</b></p> <input id='input_style' type='text' name='numMeio'/>
        <p><b>Nome Entidade:</b></p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else  if ($table == "MeioApoio") {

        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir novo Meio de Apoio</p>
        <p><b>Número do Meio:</b></p> <input id='input_style' type='text' name='numMeio'/>
        <p><b>Nome Entidade:</b></p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else  if ($table == "MeioSocorro") {

        echo("<form id='form_style' action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Inserir novo Meio de Socorro</p>
        <p><b>Número do Meio:</b></p> <input id='input_style' type='text' name='numMeio'/>
        <p><b>Nome Entidade:</b></p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");

    } else {
        echo("<script>console.log(\"Unexpected table name\");</script>");
    }


?>
    </body>
</html>

    



