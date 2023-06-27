<?php
require_once "dados.php/initconect.php";
?>

<?php
require_once "dados.php/requerimentlogin.php";
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
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validateForm()">
                USERNAME: <input id="usernamebx" name="usernamebx" type="text" placeholder="USERNAME" required><br>
                PASSWORD: <input id="passwordbx" name="passwordbx" type="password" placeholder="PASSWORD" required><br>
                <button id="loginbtn" type="submit" value="loginbtn">LOG IN</button>
            </form>
        </div>
    </div>
    <script src="js/scriptlogin.js"></script>
</body>
</html>
