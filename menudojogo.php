<?php
require "dados/datamenu.php";
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    session_unset();
    session_destroy();

    header("Location: paginalogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/layout_menu.css">
    <title>Fill It Up</title>
</head>
<body>
    <div id="menubox">
        <form action="fillitupgame.php" method="POST">
            <button class="button" id="startbtn">START</button><br>
        </form><br>
        <button class="button" id="ldrbtn">LEADERBOARD</button><br>
        <button class="button" id="optbtn">OPTIONS</button><br>
        <button class="button" id="crdbtn">CREDITS</button><br>
        <form action="paginalogin.php" method="POST">
            <button class="button" id="qtbtn" name="logout">QUIT SESSION</button><br>
        </form>
    </div>
    <script src="js/scriptmenudojogo.js"></script>
</body>
</html>
