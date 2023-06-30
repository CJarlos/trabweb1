<?php
include "initconect.php";

$tableName = "userdata";
$result = $conn->query("SHOW TABLES LIKE '$tableName'");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SERVER['PHP_SELF'];
    
} else {
    $sql = "CREATE TABLE $tableName (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(30) NOT NULL,
        userpassword VARCHAR(255) NOT NULL,
        score INT(255) NOT NULL
    )";

    if ($conn->query($sql) === FALSE) {
        echo "Erro ao criar a tabela: " . $conn->error;
    }
}

function verifica_campo($campo, $tableName) {
    global $conn;
    $campo = trim($campo);
    $campo = stripslashes($campo);
    return !empty($campo);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usernamebx'];
    $password = $_POST['passwordbx'];

    if (verifica_campo($username, $tableName) && verifica_campo($password, $tableName)) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        $result = $conn->query("SHOW TABLES LIKE '$tableName'");
        if ($result->num_rows > 0) {

            $sql = "SELECT * FROM userdata WHERE username = '$username'";
            $result = $conn->query($sql); 

            if ($result->num_rows == 0) {

                $insertSql = "INSERT INTO $tableName (username, userpassword) VALUES ('$username', '$password')";

                if ($conn->query($insertSql) === TRUE) {
                    $row = $result->fetch_assoc();
                    header("Location: menudojogo.php");
                    exit();
                } else { 
                    echo "Erro: " . $conn->error;
                }
            } else {
                $row = $result->fetch_assoc();
                header("Location: menudojogo.php");
                exit();
            }
        } else {
            echo "Erro: '$tableName' não foi criada.";
        }
    } else {
        header("Location: ".$_SERVER['PHP_SELF']."?error=1");
        exit();
    }    
}

    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo '<span style="color: red;"> O campo USERNAME e/ou PASSWORD está vazio. Por favor, preencha ambos antes de prosseguir. </span>';
}
?>
