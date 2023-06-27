<?php
include "credentials.php";

$conn = mysqli_connect($servername, $user, $password, $dbname); //pode usar outro argumento conectando direto a base de dados

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
$result = $conn->query("SHOW DATABASES LIKE '$dbname'");

if ($result->num_rows > 0) {
    
    $conn->select_db($dbname);
    
} else {

    $sql = "CREATE DATABASE $dbname";
    
    if ($conn->query($sql) === TRUE) {
        echo "Conectado ao novo banco de dados";
    } else {
        echo "Erro na criação do banco de dados: " . $conn->error;
    }
    $conn->select_db($dbname);
}
?>
