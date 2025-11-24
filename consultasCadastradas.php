<?php
include_once("./db/config.php");
include_once("./db/setDb.php");
include_once("./crud.php");

if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css\styleConsultasCadastradas.css">
  <title>Caminhões
  </title>
</head>

<script>
  function myFunction() {
    let text;
    if (confirm("Você realmente deseja apagar este item?") == true) {

    } else {
      location.href = 'pneusCadastrados.php';
    }
    document.getElementById("demo").innerHTML = text;
  }
</script>


<body>

  <div class="mainPc">
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


    <main id="container-consultas">



      <?php
      //if ($_SESSION['isAdmin'] == 1) {
      if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
        //echo'<script>alert("'. $_SESSION['admin'] .'")</script>';
        $crud = new Crud($db);
        $result = $crud->readPac();


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='consultas'>";
          echo "<h1 class='titulo'>Paciente<h2>" . $row['nome'] . "</h1></h2>";
          echo "<h1 class='titulo'> Medico <h2>" . $row['medico'] . "</h1></h2>";
          echo "<h1 class='titulo'> especialidade <h2>" . $row['especialidade'] . "</h1>";
          echo "<h1 class='titulo'> Data <h2>" . $row['data'] . "</h1></h2>"; 
          echo "<div class='btnsConsultas'>";
          echo "<td><a href='editar.php?id=" . $row['cpf'] . "'>Editar</a> |
          <td>
         <a id='linkDeletar'  href='deletar.php?cpf=" . $row['cpf'] . "' class='delete';>Deletar</a></td>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        $crud = new Crud($db);
        $result = $crud->readPac();


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

          echo "<div class='trucks'>";
          echo "<h1 class='titulo'>Paciente<h2>" . $row['nome'] . "</h1></h2>";
          echo "<h1 class='titulo'> Medico <h2>" . $row['medico'] . "</h1></h2>";
          echo "<h1 class='titulo'> Especialidade <h2>" . $row['especialidade'] . "</h1></h2>";
          echo "<h1 class='titulo'> Data <h2>" . $row['date'] . "</h1></h2>";
          echo "<div class='btnsConsultas'>";
          echo "<td><a href='editar.php?id=" . $row['cpf'] . "'>Editar</a> |
          <td><a href='historico.php?cpf=" . $row['cpf'] . "'>Histórico</a> |
          <a  href='deletar.php?cpf=" . $row['cpf'] . "' class='delete';>Deletar</a></td>";
          echo "</div>";

          echo "</div>";
        }
      }
      ;


      function data($data)
      {
        $f = explode("-", $data); //Gera um array com 0 = ano, 1 = mês, 2 = dia
        $g = $f[2] . "/" . $f[1] . "/" . $f[0]; //Isso é uma string. Formate-a como quiser
        return $g;
      }
      ?>



    </main>

  </div>
</body>

</html>