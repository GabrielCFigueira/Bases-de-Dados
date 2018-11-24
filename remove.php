<html>
    <head>
        <title> Update </title>
    </head>
    <body>
<?php

    $table = $_REQUEST['table'];


    $removeLocal = "delete from Local where moradaLocal= :moradaLocal";
    $removeEvento = "delete from EventoEmergencia where numTelefone = :numTelefone and 
instanteChamada = :instanteChamada";
    $removeProcesso = "delete from ProcessoSocorro where numProcessoSocorro = :numProcessoSocorro";
    $removeMeio = "delete from Meio where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
    $removeEntidade = "delete from EntidadeMeio where nomeEntidade = :nomeEntidade";
    $removeMeioCombate = "delete from MeioCombate where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
    $removeMeioApoio = "delete from MeioApoio where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
    $removeMeioSocorro = "delete from MeioSocorro where numMeio = :numMeio and nomeEntidade = :nomeEntidade";


    try 
    {
        $user="istxxxxxx";		// -> replace by the user name
        $host="db.ist.utl.pt";	        // -> server where postgres is running
        $port=5432;			// -> default port where Postgres is installed
        $password="pass";	        // -> replace with the password
        $dbname = $user;		// -> by default the name of the database is the name of the user
        
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        if ($table == "Local") {

            $result = $db->prepare($removeLocal);
            
            echo("<form action='index.html' method='post'>
            <p>Remover Local</p>
            <p>Morada do Local: <input type='text' name='moradaLocal'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':moradaLocal' => $moradaLocal]);


        } else  if ($table == "Evento") {

            $result = $db->prepare($removeEvento);   

            echo("<form action='index.html' method='post'>
            <p>Remover Evento de Emergência</p>
            <p>Número de Telefone: <input type='text' name='numTelefone'/>
            <p>Instante da Chamada: <input type='text' name='instanteChamada'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada]);


        } else  if ($table == "Processo") {

            $result = $db->prepare($removeProcesso);
            
            echo("<form action='index.html' method='post'>
            <p>Remover Processo de Socorro</p>
            <p>Número de Processo Socorro: <input type='text' name='numProcessoSocorro'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':numProcessoSocorro' => $numProcessoSocorro]);


        } else  if ($table == "Meio") {

            $result = $db->prepare($removeMeio);  
            
            echo("<form action='index.html' method='post'>
            <p>Remover Meio</p>
            <p>Número do Meio: <input type='text' name='numMeio'/>
            <p>Nome da Entidade Detentora do Meio: <input type='text' name='nomeEntidade'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);


        } else  if ($table == "Entidade") {

            $result = $db->prepare($removeEntidade);
            
            echo("<form action='index.html' method='post'>
            <p>Remover Entidade</p>
            <p>Nome da Entidade : <input type='text' name='nomeEntidade'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':nomeEntidade' => $nomeEntidade]);


        } else  if ($table == "MeioCombate") {

            $result = $db->prepare($removeMeioCombate);   

            echo("<form action='index.html' method='post'>
            <p>Remover Meio de Combate</p>
            <p>Número do Meio: <input type='text' name='numMeio'/>
            <p>Nome do Meio: <input type='text' name='nomeMeio'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else  if ($table == "MeioApoio") {

            $result = $db->prepare($removeMeioApoio);   

            echo("<form action='index.html' method='post'>
            <p>Remover Meio de Apoio</p>
            <p>Número do Meio: <input type='text' name='numMeio'/>
            <p>Nome do Meio: <input type='text' name='nomeMeio'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else  if ($table == "MeioSocorro") {

            $result = $db->prepare($removeMeioSocorro);     

            echo("<form action='index.html' method='post'>
            <p>Remover Meio de Socorro</p>
            <p>Número do Meio: <input type='text' name='numMeio'/>
            <p>Nome do Meio: <input type='text' name='nomeMeio'/>
            <input type='submit' value='Submit'/></p>
            </form>")

            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else {
            #error message
        }

        $db = null;
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }

?>
    </body>
</html>

    



