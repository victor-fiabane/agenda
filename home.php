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
    <link rel="stylesheet" href="css/addConsulta.css">
    <title>Cadastro</title>
</head>

<body>

    <?php
    include_once("./db/config.php");
    include_once("./db/setDb.php");
    include_once("./crud.php");
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    ?>


    <!--              Desktop HTML                 -->
    <header>
        <nav>
            <a href="mainMenu.php"><button class="botoes">
                    <p>Menu</p>
                </button></a>
            <a href="logout.php"><button class="botoes">
                    <p>Sair</p>
                </button></a>
        </nav>
    </header>

    <form id="formMainPc" method="post">


        <div id="mainPc">

            <!-- title div -->
            <div id="title">
                <nobr>
                    <h1 class="titleText" id="mainTitle">Agenda</h1> </br>
                    <h2 class="titleText" id="subtitle">Consultas Médicas</h2>
                </nobr>
            </div>
            <!--input div -->

            <div id="inputs">
                <div id="inputsSubdiv">

                    <div id="inputTitle">
                        <h1>Cadastro</h1>
                    </div>
                    <!------------------------------------------------------------------------------------------------->
                    <div id="dados">
                        <div class="info">
                            <label for="pacienteText">Nome</label>
                            <input type="text" name="pacienteText" id="pacienteText" required>
                        </div>

                        <div class="info">
                            <label for="cpfText">CPF</label>
                            <input type="text" name="cpfText" id="cpfText" required>
                        </div>

                        <div class="info">
                            <label for="pesoText">Peso</label>
                            <input type="text" name="pesoText" id="pesoText" required>
                        </div>

                        <div class="info">
                            <label for="alturaText">Altura</label>
                            <input type="text" name="alturaText" id="alturaText" required>
                        </div>
                        <!------------------------------------------------------------------------------------------------->

                        <div class="info">
                            <label for="medicoText">Médico</label>
                            <input type="text" id="medicoText" name="medicoText" required>
                        </div>

                        <div class="info">
                            <label for="especText">Especialidade</label>
                            <input type="text" name="especText" id="especText" required>
                        </div>

                        <div class="info">
                            <label for="data">Data</label>
                            <input type="date" name="dateText" id="data" required>
                        </div>
                    </div>
                    <!------------------------------------------------------------------------------------------------->
                    <!------------------------------------------------------------------------------------------------->
                    <div id="submitDiv">
                        <input type="submit" id="btnSubmit" name="btnSubmit">
                    </div>
                </div>
            </div>


        </div>
    </form>
    <?php # php openning
    
    if (isset($_POST['btnSubmit'])) {
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

        $crud->insertPaciente($cpf, $nome, $medico, $especialidade, $peso, $altura, $data);
        echo '<script>alert("enviado para o banco de dados")</script>';
        $count = 1;
    }
    ?> <!-- php closing -->
</body>

</html>