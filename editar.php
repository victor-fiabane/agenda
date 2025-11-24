<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- poppins font import -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleEditar.css">
    <title>Atualizar</title>
</head>

<body>
    <?php
    include_once("./db/config.php");
    include_once("./db/setDb.php");
    include_once("./crud.php");
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    $cpf = $_GET['id'];
    $crud = new Crud($db);
    $result = $crud->readPaciente($cpf);

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        $nome = $row['nome'];
        $medico = $row['medico'];
        $especialidade = $row['especialidade'];
        $peso = $row['peso'];
        $altura = $row['altura'];
        $data = $row['data'];
    }

    //↑↑↑↑ AR_Games made this ↑↑↑↑ -----> Vito corrections @_@
    

    ?>
    <header>
        <nav>
            <a href="consultasCadastradas.php"><button class="botoes">
                    <p>Voltar</p>
                </button></a>
            <a href="mainMenu.php"><button class="botoes">
                    <p>menu</p>
                </button></a>
        </nav>
    </header>

    <!--              Desktop HTML                 -->
    <form id="formMainPc" method="post">
        <div id="mainPc">
            <!-- title div -->
            <div id="title">
                <nobr>
                    <h1 class="titleText" id="mainTitle">Agenda</h1> </br>
                    <h2 class="titleText" id="subtitle">Consultas médicas</h2>
                </nobr>
            </div>
            <!--input div -->
            <div id="inputs">
                <div id="inputsSubdiv">

                    <div id="inputTitle">
                        <h1>Editar</h1>
                    </div>
                    <!------------------------------------------------------------------------------------------------->
                    <div id="dados">
                        <div class="info">
                            <label for="pacienteText">Nome</label>
                            <input type="text" name="pacienteText" id="pacienteText" required value=<?php echo $nome; ?>>
                        </div>

                        <div class="info">
                            <label for="pacienteText">CPF</label>
                            <input type="text" name="cpfText" id="cpfText" readonly value=<?php echo $cpf ?>>
                        </div>

                        <div class="info">
                            <label for="pacienteText">Peso</label>
                            <input type="text" name="pesoText" id="pesoText" required value=<?php echo $peso; ?>>
                        </div>

                        <div class="info">
                            <label for="pacienteText">Altura</label>
                            <input type="text" name="alturaText" id="alturaText" required value=<?php echo $altura; ?>>
                        </div>
                        <!------------------------------------------------------------------------------------------------->

                        <div class="info    ">
                            <label for="pacienteText">Médico</label>
                            <input type="text" id="medicoText" name="medicoText" required value=<?php echo $medico; ?>>
                        </div>

                        <div class="info">
                            <label for="pacienteText">Especialidade</label>
                            <input type="text" name="especText" id="especText" required value=<?php echo $especialidade; ?>>
                        </div>

                        <div class="info">
                            <label for="pacienteText">Data</label>
                            <input type="date" name="dateText" id="data">
                        </div>
                    </div>
                    <!------------------------------------------------------------------------------------------------->
                    <div id="submitDiv">
                        <input type="submit" class="btnSubmit" name="btnSubmit">
                    </div>
                </div>

            </div>


        </div>
    </form>
    <?php # php openning
    
    if (isset($_POST['subButton'])) {
        include_once "./db/config.php";
        include_once "./db/setDb.php";
        include_once "./crud.php";

        $crud = new Crud($db);

        $nome = $_POST['pacienteText'];
        $medico = $_POST['medicoText'];
        $altura = $_POST['alturaText'];
        $peso = $_POST['pesoText'];
        $especialidade = $_POST['especText'];
        $cpf = $_POST['cpfText'];
        $data = $_POST['dateText'];

        $crud->updatePaciente($cpf, $nome, $medico, $especialidade, $peso, $altura, $data);
        echo '<script>alert("enviado para o banco de dados")</script>';
        $count = 1;
    }
    ?> <!-- php closing -->
    </div>
    </form>
</body>

</html>