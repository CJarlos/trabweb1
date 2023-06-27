<?php
include "initconect.php";

$tableName = "userdata";
$result = $conn->query("SHOW TABLES LIKE '$tableName'");

if ($result->num_rows > 0) {

} else {
    $sql = "CREATE TABLE $tableName (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(30) NOT NULL,
        userpassword VARCHAR(255) NOT NULL,
        score INT(255)
    )";

    if ($conn->query($sql) === FALSE) {
        echo "Erro ao criar a tabela: " . $conn->error;
    }
}
?>

<?php
session_start();

function verifica_campo($campo) {
    global $conn;
    $campo = trim($campo);
    $campo = stripslashes($campo);
    return !empty($campo);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usernamebx'];
    $password = $_POST['passwordbx'];

    if (verifica_campo($username) && verifica_campo($password)) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        $result = $conn->query("SHOW TABLES LIKE '$tableName'");
        if ($result->num_rows > 0) {
            $insertSql = "INSERT INTO $tableName (username, userpassword) VALUES ('$username', '$password')";
            if ($conn->query($insertSql) === TRUE) {
                header("Location: menudojogo.php");
                exit();
            } else {
                echo "Erro ao inserir dados: " . $conn->error;
            }
        } else {
            echo "Erro ao inserir dados: A tabela '$tableName' não existe.";
        }
    } else {
        header("Location: ".$_SERVER['PHP_SELF']."?error=1");
        exit();
    }    
}
?>

<?php
if (isset($_GET['error']) && $_GET['error'] == 1) {
    echo '<span style="color: red;"> O campo USERNAME e/ou PASSWORD está vazio. Por favor, preencha ambos antes de prosseguir. </span>';
}
?>