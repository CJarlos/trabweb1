<?php
session_start(); 

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/layoutmenu.css">
    <title>Fill It Up</title>
</head>
<body>
    <div id="menubox">
        <button class="button" id="startbtn">START</button><br>
        <button class="button" id="optbtn">OPTIONS</button><br>
        <button class="button" id="crdbtn">CREDITS</button><br>
        <button class="button" id="qtbtn">QUIT SESSION</button><br>
    </div>
    <div id="area de teste">
        <?php echo $username; ?>
    </div>
    <script src="js/scriptmenudojogo.js"></script>
</body>
</html>