<html>
    <head>
        <title> Remove </title>
        <link rel="stylesheet" href="../style.css"/>
        <link rel="icon" type="image/png" href="../Postgresql.png"/>
    </head>
    <body>
        <center>
            <h1 id="sgbd">Sistema de Gestão de Incêndios Florestais</h1>
        </center>
<?php

    $table = $_REQUEST['table'];

    if ($table == "Local") {

        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Local</p>
        <p>Morada do Local:</p> <input id='input_style' type='text' name='moradaLocal'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form>");

    } else  if ($table == "Evento") {  

        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Evento de Emergência</p>
        <p>Número de Telefone:</p> <input id='input_style' type='text' name='numTelefone'/>
        <p>Instante da Chamada:</p> <input id='input_style' type='text' name='instanteChamada'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form>");


    } else  if ($table == "Processo") {
        
        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Processo de Socorro</p>
        <p>Número de Processo Socorro:</p> <input id='input_style' type='text' name='numProcessoSocorro'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form>");

    } else  if ($table == "Meio") {

        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Meio</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome da Entidade Detentora do Meio:</p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "Entidade") {

        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Entidade</p>
        <p>Nome da Entidade:</p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "MeioCombate") {

        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Meio de Combate</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome do Meio:</p> <input id='input_style' type='text' name='nomeMeio'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form>");

    } else  if ($table == "MeioApoio") {

        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Meio de Apoio</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome do Meio:</p> <input id='input_style' type='text' name='nomeMeio'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form>");

    } else  if ($table == "MeioSocorro") {

        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Meio de Socorro</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome do Meio:</p> <input id='input_style' type='text' name='nomeMeio'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form>");

    } else {
        #error message
    }

?>
    </body>
</html>

    



