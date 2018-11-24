<html>
    <head>
        <title> Update </title>
    </head>
    <body>
<?php

    $table = $_REQUEST['table'];

    if ($table == "Local") {

        echo("<form action='Insert_Queries/insertLocal.php' method='post'>
        <p><input type='hidden' name='table' value='<?=$_REQUEST['table']?>'/></p>
        <p>Inserir novo Local</p>
        <p>Morada do Local: <input type='text' name='moradaLocal'/>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "Evento") {

        echo("<form action='Insert_Queries/insertLocal.php' method='post'>
        <p><input type='hidden' name='table' value='<?=$_REQUEST['table']?>'/></p>
        <p>Inserir novo Evento de Emergência</p>
        <p>Número de Telefone: <input type='text' name='numTelefone'/>
        <p>Instante da Chamada: <input type='text' name='instanteChamada'/>
        <p>Nome da Pessoa: <input type='text' name='nomePessoa'/>
        <p>Morada do Local: <input type='text' name='moradaLocal'/>
        <p>Número de Processo de Socorro: <input type='text' name='numProcessoSocorro'/>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "Processo") {

        echo("<form action='Insert_Queries/insertLocal.php' method='post'>
        <p><input type='hidden' name='table' value='<?=$_REQUEST['table']?>'/></p>
        <p>Inserir novo Processo de Socorro</p>
        <p>Número de Processo Socorro: <input type='text' name='numProcessoSocorro'/>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "Meio") {
    
        echo("<form action='Insert_Queries/insertLocal.php' method='post'>
        <p><input type='hidden' name='table' value='<?=$_REQUEST['table']?>'/></p>
        <p>Inserir novo Meio</p>
        <p>Número do Meio: <input type='text' name='numMeio'/>
        <p>Nome do Meio: <input type='text' name='nomeMeio'/>
        <p>Nome da Entidade Detentora do Meio: <input type='text' name='nomeEntidade'/>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "Entidade") {

        echo("<form action='Insert_Queries/insertLocal.php' method='post'>
        <p><input type='hidden' name='table' value='<?=$_REQUEST['table']?>'/></p>
        <p>Inserir nova Entidade</p>
        <p>Nome da Entidade : <input type='text' name='nomeEntidade'/>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "MeioCombate") {

        echo("<form action='Insert_Queries/insertLocal.php' method='post'>
        <p><input type='hidden' name='table' value='<?=$_REQUEST['table']?>'/></p>
        <p>Inserir novo Meio de Combate</p>
        <p>Número do Meio: <input type='text' name='numMeio'/>
        <p>Nome do Meio: <input type='text' name='nomeMeio'/>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "MeioApoio") {

        echo("<form action='Insert_Queries/insertLocal.php' method='post'>
        <p><input type='hidden' name='table' value='<?=$_REQUEST['table']?>'/></p>
        <p>Inserir novo Meio de Apoio</p>
        <p>Número do Meio: <input type='text' name='numMeio'/>
        <p>Nome do Meio: <input type='text' name='nomeMeio'/>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else  if ($table == "MeioSocorro") {

        echo("<form action='Insert_Queries/insertLocal.php' method='post'>
        <p><input type='hidden' name='table' value='<?=$_REQUEST['table']?>'/></p>
        <p>Inserir novo Meio de Socorro</p>
        <p>Número do Meio: <input type='text' name='numMeio'/>
        <p>Nome do Meio: <input type='text' name='nomeMeio'/>
        <input type='submit' value='Submit'/></p>
        </form>");

    } else {
        #error message
    }


?>
    </body>
</html>

    



