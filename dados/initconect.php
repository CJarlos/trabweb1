<?php
include "credentials.php";
?>

<?php
$conn = mysqli_connect($servername, $user, $password); //pode usar outro argumento conectando direto a base de dados

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
    } else {
        echo "Erro na criação do BD: " . $conn->error;
    }
    $conn->select_db($dbname);
}
?>
