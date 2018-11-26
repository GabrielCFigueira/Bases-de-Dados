<html>
    <head>
        <title> Remover </title>
        <link rel="stylesheet" href="../style.css"/>
        <link rel="icon" type="image/png" href="../Postgresql.png"/>
    </head>
    <body>
        <center>
            <h1 id="sgbd"><a id="link_sgbd">Sistema de Gestão de Incêndios Florestais</a></h1>
        </center>
        <ul id="menu">
            <li><a href="#">Locais</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Local">Inserir</a></li>
                    <li><a href="../RemoveQueries/remove.php?table=Local">Remover</a></li>
                    <li><a href="../list.php?table=Local">Listar</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Eventos de Emergência</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Evento">Inserir</a></li>
                    <li><a href="../RemoveQueries/remove.php?table=Evento">Remover</a></li>
                    <li><a href="../list.php?table=Evento">Listar</a></li>
                    <li><a href="../assoc.php?table=EventoProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="#">Processos de Socorro</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Processo">Inserir</a></li>
                    <li><a href="../RemoveQueries/remove.php?table=Processo">Remover</a></li>
                    <li><a href="../list.php?table=Processo">Listar</a></li>
                </ul>
            </li>
            <li><a href="#">Meios</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Meio">Inserir</a></li>
                    <li><a href="../RemoveQueries/remove.php?table=Meio">Remover</a></li>
                    <li><a href="../list.php?table=Meio">Listar</a></li>
                    <li><a href="#">Combate</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioCombate">Inserir</a></li>
                            <li><a href="../list.php?table=EditarMeioCombate">Editar</a></li>
                            <li><a href="../RemoveQueries/remove.php?table=MeioCombate">Remover</a></li>
                            <li><a href="../list.php?table=MeioCombate">Listar</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Apoio</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioApoio">Inserir</a></li>
                            <li><a href="../list.php?table=EditarMeioApoio">Editar</a></li>
                            <li><a href="../RemoveQueries/remove.php?table=MeioApoio">Remover</a></li>
                            <li><a href="../list.php?table=MeioApoio">Listar</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Socorro</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioSocorro">Inserir</a></li>
                            <li><a href="../list.php?table=EditarMeioSocorro">Editar</a></li>
                            <li><a href="../RemoveQueries/remove.php?table=MeioSocorro">Remover</a></li>
                            <li><a href="../list.php?table=MeioSocorro">Listar</a></li>
                        </ul>
                    </li>
                    <li><a href="../assoc.php?table=MeioProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="#">Entidades</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Entidade">Inserir</a></li>
                    <li><a href="../RemoveQueries/remove.php?table=Entidade">Remover</a></li>
                    <li><a href="../list.php?table=Entidade">Listar</a></li>
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
        <input id='button_style' type='submit' value='Submit'/>
        </form>");

    } else  if ($table == "Entidade") {

        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Entidade</p>
        <p>Nome da Entidade:</p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form>");

    } else  if ($table == "MeioCombate") {

        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Meio de Combate</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome Entidade:</p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form>");

    } else  if ($table == "MeioApoio") {

        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Meio de Apoio</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome Entidade:</p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form>");

    } else  if ($table == "MeioSocorro") {

        echo("<form id='form_style' action='runRemoval.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Remover Meio de Socorro</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome Entidade:</p> <input id='input_style' type='text' name='nomeEntidade'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form>");

    } else {
        echo("<script>console.log(\"Unexpected table name\");</script>");
    }

?>
    </body>
</html>

    



