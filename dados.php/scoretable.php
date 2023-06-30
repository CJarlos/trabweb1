<?php
include "dados.php/initconect.php";

if (isset($_POST['score'])) {
    $pontuacao = $_POST['score'];

    $sql = "INSERT INTO userdata (score) VALUES ('$pontuacao')";
    if ($conn->query($sql) === TRUE) {
        header("Location: menudojogo.php");
        exit();
    } else {
        echo "Erro ao salvar a pontuação: " . $conn->error;
    }
}
?>