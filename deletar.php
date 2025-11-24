<?php
include_once("./db/config.php");
include_once("./db/setDb.php");
include_once("./crud.php");

if (!isset($_GET['cpf']) || empty($_GET['cpf'])) {
    echo "<script>alert('Erro: CPF não especificado para exclusão.');</script>";
    echo "<script>location.href='pneusCadastrados.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['cpfText'])) {
        die("Erro: CPF não recebido.");
    }
/*Não mexer
    $cpf = $_POST['cpfText'];

    $crud = new Crud($db);
    $result = $crud->removerPaciente($cpf);

    echo "<script> alert('Caminhão excluído com sucesso.'); </script>";
    echo "<script> location.href='pneusCadastrados.php'; </script>";
    exit();
	*/
	$cpf = $_POST['cpfText'];
    $crud = new Crud($db);
    $result = $crud->removerPaciente($cpf);
//DEBUG NÃO MEXER//DEBUG NÃO MEXER//DEBUG NÃO MEXER//DEBUG NÃO MEXER//DEBUG NÃO MEXER
    if ($result) {
        echo "<script> alert('Registro excluído com sucesso.'); </script>";
    } else { 
        echo "<script> alert('ERRO: Falha na exclusão. Verifique o log do servidor e o CPF: $cpf.'); </script>";
    }

    echo "<script> location.href='pneusCadastrados.php'; </script>";
    exit();
}
//DEBUG NÃO MEXER//DEBUG NÃO MEXER//DEBUG NÃO MEXER//DEBUG NÃO MEXER//DEBUG NÃO MEXER
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/deletar.css">
	<title>Excluir</title>
</head>

<body>
	<div id="conteudo">
		<form id="formulario" method="post" 
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?cpf=' . $_GET['cpf']; ?>">
			<h1>Excluir consulta</h1>
			<p>Tem certeza que deseja excluir essa consulta?</p>

			<input id="id" type="hidden" name="cpfText" 
       value="<?php echo isset($_GET['cpf']) ? htmlspecialchars($_GET['cpf']) : ''; ?>">

    <div id="botoes">
			<input id="btnExcluir" type="submit" value="Excluir">
			<input  id="btnVoltar" type="button" onclick="location.href='consultasCadastradas.php'" value="Cancelar">
		
    </div>
        </form>
	</div>
</body>
</html>
