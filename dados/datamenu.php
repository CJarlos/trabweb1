<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = htmlspecialchars($_SESSION['username']);
    $password = htmlspecialchars($_SESSION['password']);
    
    $username = trim($username);
    $username = stripslashes($username);
    
    $password = trim($password);
    $password = stripslashes($password);
} else {
    $username = '';
    $password = '';
}
?>

<?php
$dbsqlinsert = "INSERT INTO userdata (username, userpassword)
VALUES ('$username', '$password')";
?>