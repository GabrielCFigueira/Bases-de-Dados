<html>
    <head>
        <title> Update </title>
    </head>
    <body>
<?php

    $table = $_REQUEST['table'];

    function printQuery($result) {
        echo("<table border='5'>"); 
        $result->setFetchMode(PDO::FETCH_ASSOC);   
        while($row = $result->fetch()){ 
            echo("<tr>"); 
            foreach($row as $key=>$val) { 
                echo("<td> $key : $val </td>\n"); 
            }
            echo("</tr>");
        }
        echo("</table>");
    }


    $insertLocal = "insert into Local(moradaLocal) values(:moradaLocal)";
    $insertEvento = "insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, 
moradaLocal, numProcessoSocorro) values(:numTelefone, :instanteChamada, :nomePessoa, 
:moradaLocal, :numProcessoSocorro)"
    $insertProcesso = "insert into ProcessoSocorro(numProcessoSocorro) values(:numProcessoSocorro)";
    $insertMeio = "insert into Meio(numMeio, nomeMeio, nomeEntidade) values(:numMeio, :nomeMeio, 
:nomeEntidade)";
    $insertEntidade = "insert into EntidadeMeio(nomeEntidade) values(:nomeEntidade)";
    $insertMeioCombate = "insert into MeioCombate(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);"
    $insertMeioApoio = "insert into MeioApoio(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);"
    $insertMeioSocorro = "insert into MeioSocorro(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);"


    try 
    {
        $user="ist186426";		// -> replace by the user name
        $host="db.ist.utl.pt";	        // -> server where postgres is running
        $port=5432;			// -> default port where Postgres is installed
        $password="ytub0362";	        // -> replace with the password
        $dbname = $user;		// -> by default the name of the database is the name of the user
        
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        if ($table == "Local") {

            $result = $db->prepare($insertLocal);
            
            echo("<form action='index.html' method='post'>
            <p>Inserir novo Local</p>
            <p>Morada do Local: <input type='text' name='moradaLocal'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':moradaLocal' => $moradaLocal]);


        } else  if ($table == "Evento") {

            $result = $db->prepare($insertEvento);   

            echo("<form action='index.html' method='post'>
            <p>Inserir novo Evento de Emergência</p>
            <p>Número de Telefone: <input type='text' name='numTelefone'/>
            <p>Instante da Chamada: <input type='text' name='instanteChamada'/>
            <p>Nome da Pessoa: <input type='text' name='nomePessoa'/>
            <p>Morada do Local: <input type='text' name='moradaLocal'/>
            <p>Número de Processo de Socorro: <input type='text' name='numProcessoSocorro'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':moradaLocal' => $moradaLocal, ':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada,
':nomePessoa' => $nomePessoa, ':numProcessoSocorro' => $numProcessoSocorro]);


        } else  if ($table == "Processo") {

            $result = $db->prepare($insertProcesso);
            
            echo("<form action='index.html' method='post'>
            <p>Inserir novo Processo de Socorro</p>
            <p>Número de Processo Socorro: <input type='text' name='numProcessoSocorro'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':numProcessoSocorro' => $numProcessoSocorro]);


        } else  if ($table == "Meio") {

            $result = $db->prepare($insertMeio);  
            
            echo("<form action='index.html' method='post'>
            <p>Inserir novo Meio</p>
            <p>Número do Meio: <input type='text' name='numMeio'/>
            <p>Nome do Meio: <input type='text' name='nomeMeio'/>
            <p>Nome da Entidade Detentora do Meio: <input type='text' name='nomeEntidade'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio, ':nomeEntidade' => $nomeEntidade]);


        } else  if ($table == "Entidade") {

            $result = $db->prepare($insertEntidade);
            
            echo("<form action='index.html' method='post'>
            <p>Inserir nova Entidade</p>
            <p>Nome da Entidade : <input type='text' name='nomeEntidade'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':nomeEntidade' => $nomeEntidade]);


        } else  if ($table == "MeioCombate") {

            $result = $db->prepare($insertMeioCombate);   

            echo("<form action='index.html' method='post'>
            <p>Inserir novo Meio de Combate</p>
            <p>Número do Meio: <input type='text' name='numMeio'/>
            <p>Nome do Meio: <input type='text' name='nomeMeio'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else  if ($table == "MeioApoio") {

            $result = $db->prepare($insertMeioApoio);   

            echo("<form action='index.html' method='post'>
            <p>Inserir novo Meio de Apoio</p>
            <p>Número do Meio: <input type='text' name='numMeio'/>
            <p>Nome do Meio: <input type='text' name='nomeMeio'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else  if ($table == "MeioSocorro") {

            $result = $db->prepare($insertMeioSocorro);     

            echo("<form action='index.html' method='post'>
            <p>Inserir novo Meio de Apoio</p>
            <p>Número do Meio: <input type='text' name='numMeio'/>
            <p>Nome do Meio: <input type='text' name='nomeMeio'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else {
            #error message
        }
    }

?>
    </body>
</html>

    



