<?php
include "credentials.php";

$conn = mysqli_connect($servername, $user, $password);

if ($conn->connect_error) {
    die("Erro na conexão com BD: " . $conn->connect_error);
}

$result = $conn->query("SHOW DATABASES LIKE 'usertable'");

if ($result->num_rows > 0) {
    $conn->select_db('usertable');
} else {
    $sql = "CREATE DATABASE usertable";
    
    if ($conn->query($sql) === TRUE) {
        echo "DB criado com sucesso.";
        mysqli_close($conn);
        header("Location: " . $_SERVER['PHP_SELF']); 
        exit;
    } else {
        echo "Erro na criação do BD: " . $conn->error;
    }
}

$conn->select_db('usertable');
?>