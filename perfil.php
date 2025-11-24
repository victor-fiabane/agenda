<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/stylePerfil.css">
	<title>Perfil</title>
</head>
<?php

include_once("./db/config.php");
include_once("./db/setDb.php");
include_once("./crud.php");
/*
if (isset($_SESSION["id"])) {
	header("Location: Login_Screen.php");
	exit();
}
//if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
*/
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

if (!isset($_SESSION["id"])) {
	header("Location: Login_Screen.php");
	exit();
}


$userId = $_SESSION["id"];

$crud = new Crud($db);
$dados_perfil = $crud->readId($userId);

if (!$dados_perfil) {
	session_destroy();
	header("Location: login.php?erro=usuario_invalido");
	exit();
}

?>

<body>



	<!--              Desktop HTML                 -->
	<div id="containerPc">

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

		<div id="content">

			<div id="card">
				<div id="titulo">
					<h1>Seu perfil</h1>
				</div>
				<div id="container-dados">
					<h1>Id</h1>
					<p><?php echo $dados_perfil['id'] ?>
					</p>
					<br>
					<h1>E-mail</h1>
					<p><?php echo $dados_perfil['name'] ?>
					</p>
					<br>
					<h1>Nome completo</h1>
					<p><?php echo $dados_perfil['email'] ?>
					</p>
					<br>
					<h1>Administrador</h1>
					<p><?php echo $dados_perfil['isAdmin'] ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>

</html>