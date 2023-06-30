<?php
include 'initconect.php';

if (isset($_POST['score'])) {
    $pontuacao = $_POST['score'];
    $sql =   $sql = "INSERT INTO userdata (score) VALUES ('$pontuacao')";
    if ($conn->query($sql) === TRUE) {
        header("Location: leaderboard.php");
        exit();
    } else {
        echo "Erro ao salvar a pontuação: " . $conn->error;
    }
}
?>
