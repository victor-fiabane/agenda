<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- poppins font import -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleLoginScreen.css">
    <title>Login Screen</title>
</head>
<body>

<?php
    include_once("./db/config.php");
    include_once("./db/setDb.php");
    include_once("./crud.php");
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
?>


<!--              Desktop HTML                 -->
    <form id="formMainPc" method="post">
        <div id="mainPc">
            <!-- title div -->
            <div id="title">
                <nobr>
                    <h1 class="titleText" id="mainTitle">Agenda</h1> </br>
                    <h2 class="titleText" id="subtitle">Consultas Medicas</h2>
                </nobr>
            </div>
            <!--input div -->
            <div id="inputs">
                <div id="inputsSubdiv">
                    <img src="./img/profileImg.png" alt="" id="inputImg">
                    <div class="textarea" id="textarea1">
                    <p id="login">Login</p>
                        <input type="text" name="loginText" id="login" class="inputText" placeholder="Insira seu E-mail" required autofocus>
                    </div>
                    <div class="textarea">
                        <p id="pass">Senha</p>
                        <input type="password" name="passwordText" id="password" class="inputText" placeholder="Insira sua Senha" required>
                    </div>
                    <div id="submitDiv">
                        <input type="submit" id="subButton" name="subButton">
                    </div>
                </div>

            </div>

            <?php # php openning
            /*
            if (isset($_POST['subButton'])){           #
                if($_POST['loginText'] != ""){         # Checking if the textboxes are filled
                    if($_POST['passwordText'] != ""){  #
                        #write the code here
                        
                        $crud = new Crud($db);
                        $result = $crud->read();

                        $user = $_POST['loginText'];
                        $pass = $_POST['passwordText'];

                        if ($result) {
                            $found = false;
                            // Use um loop para iterar sobre os resultados obtidos com o PDO
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $login = $row['name'];
                                $senha = $row['password'];
                                    
                                if ($login == $user && $senha == $pass) {
                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                        session_start();
                                    }
                                    $_SESSION['username'] = $login;
                                    $found = true;
                                    echo '<script type="text/javascript"> window.location.href="mainMenu.php"; </script>';
                                    echo "found";
                                    break;
                                }
                            }
                            if (!$found) {
                                echo '<script>alert("Verifique suas credenciais e tente novamente");</script>';
                            } else {
                                // Trate o caso em que a consulta não retornou resultados
                                echo "Nenhum resultado encontrado.";
                            }
                        }
                    }


                }                                                             # Popping a message if 
            }                                                                #
            
*/
 # php openning
            if (isset($_POST['subButton'])){ 
                if(!empty($_POST['loginText'])){ 
                    if(!empty($_POST['passwordText'])){ 
                        
                        $crud = new Crud($db);

                        $result = $crud->read(); 

                        $user = $_POST['loginText'];
                        $pass = $_POST['passwordText'];

                        $found = false;

                        if ($result) {
                            
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $db_login = $row['name']; 
                                $db_senha = $row['password'];
                                
                                if ($db_login == $user && $db_senha == $pass) {
                                    
                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                        session_start();
                                    }
                                    $_SESSION['id'] = $row['id'];        
                                    $_SESSION['email'] = $row['email'];  
                                    $_SESSION['isAdmin'] = $row['isAdmin']; 
                                    
                                    $_SESSION['username'] = $db_login; 
                                    
                                    $found = true;
                                    header("Location: mainMenu.php");
                                    exit();
                                }
                            }
                            if (!$found) {
                                echo '<script>alert("Verifique suas credenciais e tente novamente");</script>';
                            }

                        } else {
                            echo '<script>alert("Erro ao consultar usuários no banco de dados.");</script>';
                        }
                    } else {
                        echo '<script>alert("Por favor, insira a senha.");</script>';
                    }
                } else {
                    echo '<script>alert("Por favor, insira o login.");</script>';
                } 
            }
            ?>

        </div>
    </form>
</body>
</html>