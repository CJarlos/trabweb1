<?php
session_start();

function verifica_campo($username) {
    $username = trim($username);
    $username = stripslashes($username);
    $username = htmlspecialchars($username);
    return !empty($username); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usernamebx'];

    if ($username == '') {
        header("Location: ".$_SERVER['PHP_SELF']."?error=1");
        exit();
    } else {
        if (verifica_campo($username)) {
            $_SESSION['username'] = $username;
            header("Location: menudojogo.php");
            exit();
        }
    }
}
?>


<?php
if (isset($_GET['error']) && $_GET['error'] == 1) {
    echo '<span style="color: red;"> O campo USERNAME está vazio. Por favor, preencher antes de prosseguir. </span>'; //não é possível adicionar id em span dentro de echo;
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
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                USERNAME: <input id="usernamebx" name="usernamebx" type="text" placeholder="USERNAME" ><br> <!-- ADICIONAR O REQUIRED-->
                PASSWORD: <input id="passwordbx" name="pwdbx" type="password" placeholder="PASSWORD" ><br> <!-- ADICIONAR O REQUIRED-->
                <button id="loginbtn" type="submit" value="loginbtn">LOG IN</button>
            </form>
        </div>
    </div>
    <script src="js/scriptlogin.js"></script>
</body>
</html>
