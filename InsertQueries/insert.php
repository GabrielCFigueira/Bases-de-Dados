<html>
    <head>
        <title> Update </title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
<?php

    $table = $_REQUEST['table'];

    if ($table == "Local") {

        echo("<form action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p>Inserir novo Local</p>
        <p>Morada do Local:</p> <input id='input_style' type='text' name='moradaLocal'/>
        <br>
        <input type='submit' value='Submit'/>
        </form>");

    } else  if ($table == "Evento") {

        echo("<form action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p>Inserir novo Evento de Emergência</p>
        <p>Número de Telefone: <input id='input_style' type='text' name='numTelefone'/>
        <p>Instante da Chamada: <input id='input_style' type='text' name='instanteChamada'/>
        <p>Nome da Pessoa: <input id='input_style' type='text' name='nomePessoa'/>
        <p>Morada do Local: <input id='input_style' type='text' name='moradaLocal'/>
        <p>Número de Processo de Socorro: <input id='input_style' type='text' name='numProcessoSocorro'/>
        <br>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "Processo") {

        echo("<form action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p>Inserir novo Processo de Socorro</p>
        <p>Número de Processo Socorro: <input id='input_style' type='text' name='numProcessoSocorro'/>
        <br>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "Meio") {
    
        echo("<form action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p>Inserir novo Meio</p>
        <p>Número do Meio: <input id='input_style' type='text' name='numMeio'/>
        <p>Nome do Meio: <input id='input_style' type='text' name='nomeMeio'/>
        <p>Nome da Entidade Detentora do Meio: <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "Entidade") {

        echo("<form action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p>Inserir nova Entidade</p>
        <p>Nome da Entidade : <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "MeioCombate") {

        echo("<form action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p>Inserir novo Meio de Combate</p>
        <p>Número do Meio: <input id='input_style' type='text' name='numMeio'/>
        <p>Nome do Meio: <input id='input_style' type='text' name='nomeMeio'/>
        <br>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "MeioApoio") {

        echo("<form action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p>Inserir novo Meio de Apoio</p>
        <p>Número do Meio: <input id='input_style' type='text' name='numMeio'/>
        <p>Nome do Meio: <input id='input_style' type='text' name='nomeMeio'/>
        <br>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "MeioSocorro") {

        echo("<form action='runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p>Inserir novo Meio de Socorro</p>
        <p>Número do Meio: <input id='input_style' type='text' name='numMeio'/>
        <p>Nome do Meio: <input id='input_style' type='text' name='nomeMeio'/>
        <br>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else {
        #error message
    }


?>
    </body>
</html>

    



