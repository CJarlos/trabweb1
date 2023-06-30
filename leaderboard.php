<?php
session_start();
require 'dados/credentials.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pontuacao = $_POST['pontuacao'];

    $conn = new mysqli($servername, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("ERRO: " . $conn->connect_error);
    }

    $sql = "SELECT id FROM userdata";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idUsuario = $row['id'];

        $sqlUpdate = "UPDATE userdata SET score = $pontuacao WHERE id = $idUsuario";
        if ($conn->query($sqlUpdate) === TRUE) {
        
        } else {
            echo "Erro ao atualizar a pontuação: " . $conn->error;
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/leaderboard.css">
    <title>Fillitup</title>
</head>
<body>
    <div id="lbTop">
    <a href="https://pt.cooltext.com"><img src="https://images.cooltext.com/5662705.png" width="286" height="50" alt="leaderboard" /></a>
    </div>
    <div id="scoreTable">                
    <?php
        $conn = new mysqli($servername, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        $sql = "SELECT username, score FROM userdata";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div id='containerscore'>";
            echo "<table id='scoreboard'>";
            echo "<tr><th>Username</th><th>Pontuação</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["username"]."</td>";
                echo "<td>".$row["score"]."</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";
            echo "<br>";
        }

        $conn->close();
    ?>
    </div>
    <div id="btnsIpt">
        <!-- Botão para retornar ao menudojogo.php -->
        <a href="menudojogo.php"><button class="button">Main Menu</button></a>

        <!-- Botão para retornar para a paginalogin.php -->
        <a href="paginalogin.php"><button class="button">Login Page</button></a>
    </div>
</body>
</html>
