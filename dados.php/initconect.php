<?php
include "credentials.php";

$conn = mysqli_connect($servername, $user, $password, $dbname); //pode usar outro argumento conectando direto a base de dados

if ($conn->connect_error) {
    die("Erro na conexão com BD: " . $conn->connect_error);
}
$result = $conn->query("SHOW DATABASES LIKE '$dbname'");

if ($result->num_rows > 0) {
    
    $conn->select_db($dbname);
    
} else {

    $sql = "CREATE DATABASE $dbname";
    
    if ($conn->query($sql) === TRUE) {
        echo "BD criado";
    } else {
        echo "Erro na criação do BD: " . $conn->error;
    }
    $conn->select_db($dbname);
}
?>
