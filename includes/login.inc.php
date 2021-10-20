<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($servername, $username, $password, $dbname);

include "functions.inc.php";

if (isset($_POST["submit"])){
$useruid = $_POST["username"];
$pwd = $_POST["password"];

    loginUser($conn,$useruid,$pwd);
}

else{
    header("Location: ../signin.html");
}