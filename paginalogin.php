<?php
session_start();
require_once "dados/initconect.php";
require "dados/requerimentlogin.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usernamebx'];
    $password = $_POST['passwordbx'];

    if (!empty($username) && !empty($password)) {
        $result = $conn->query("SELECT * FROM userdata WHERE username = '$username'");

        if ($result->num_rows == 0) {
            $insertSql = "INSERT INTO userdata (username, userpassword) VALUES ('$username', '$password')";
            if ($conn->query($insertSql) === TRUE) {
                $_SESSION['idUsuario'] = $conn->insert_id;

                header("Location: menudojogo.php");
                exit();
            } else {
                echo "Erro ao inserir usuário no banco de dados: " . $conn->error;
            }
        } else {
            $row = $result->fetch_assoc();
            $_SESSION['idUsuario'] = $row['idUsuario'];

            header("Location: menudojogo.php");
            exit();
        }
    } else {
        echo "Por favor, preencha TODOS os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/layoutinicial.css">
    <title>Fill It Up</title>
</head>
<body>
    <div id="allelem">
        <div id="logo">
            <a href="https://pt.cooltext.com"><img src="https://images.cooltext.com/5661249.png" width="350" height="80" alt="Fill It Up" /></a>
            <br/>
        </div>
        <div id="loginbox">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validarForm()">
                USERNAME: <input id="usernamebx" name="usernamebx" type="text" placeholder="USERNAME" required><br>
                PASSWORD: <input id="passwordbx" name="passwordbx" type="password" placeholder="PASSWORD" required><br>
                <button id="loginbtn" type="submit" value="loginbtn">LOG IN</button>
            </form>
        </div>
    </div>
    <script src="js/scriptlogin.js"></script>
</body>
</html>
