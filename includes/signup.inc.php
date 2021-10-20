<?php

if (isset($_POST["submit"])){
   $useruid = $_POST["uname"];
   $pwd = $_POST["pwd"];
   $pwdrepeat = $_POST["pwdcon"];
   $role = $_POST["role"];
   $pc = $_POST['passcode'];
   if($role=="Instructor"){
   if($pc!="182764"){
    echo "<script>
    alert('Your passcode is wrong, please contact your HOD');
    window.location.href='../signup.html';
    </script>";
    exit();
   }
}
   require_once 'dbh.inc.php';
   require_once 'functions.inc.php';

if(uidExists($conn,$useruid)!==false){
    echo "<script>
    alert('Username is already taken, try again with a different one');
    window.location.href='../signup.html';
    </script>";
    exit();
}
  
 createUser($conn,$useruid,$pwd,$role);


}
else{
    header("Location: ../signup.html");
}