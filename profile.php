<?php session_start();

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Your LMS Account</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css'><link rel="stylesheet" href="./profilestyle.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!-- partial:index.partial.html -->
<br><h2 class="mt-2 mb-0">Your Profile</h2>
<div class="container mt-5">
 
    <div class="row d-flex justify-content-center">
      
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center"> <img src="https://cdn0.iconfinder.com/data/icons/users-40/96/account_avatar_person_profile_user_human_smart_graduate_student-512.png" width="100" class="rounded-circle"> </div>
                <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo($_SESSION['role'])?></span>
                    <h4 class="mt-2 mb-0"><?php echo($_SESSION['userid'])?></h4>
 <h6>Your Privileges:</h6>                 
 <div class="buttons"> <a href="resview.php" class="btn btn-primary px-4">View Material</a> 
<?php
if($_SESSION['role']=="Instructor"){

  echo '<a href="upload.php" class="btn btn-primary px-4">Upload Material</a>';
}
?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- partial -->
  <br><br>
<div class="cont">
<div class="gg" style="text-align: center;">
  <a href="logout.php" class="btn btn-danger">Logout</a></div></div>
</body>
</html>
