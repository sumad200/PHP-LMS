<?php 
session_start();
if (!isset($_SESSION['role'])){
   echo "<script>
alert('You must be logged in to continue');
window.location.href='signin.html';
</script>";
exit();
}
if($_SESSION['role']=="Student"){
echo "Access Denied , Student Not Allowed"; 
exit();
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Upload Material</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css'><link rel="stylesheet" href="./uploadstyle.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!-- partial:index.partial.html -->
<div class=main-container>
  <div class="heading">
    <h2>Upload Material</h2><br>
  </div> 
<div class="form-container"> 
<form enctype="multipart/form-data" method="POST" action="./includes/webm.php">
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input required="" type="text" name="filetitle" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
 
  <div class="mb-3">
  <label for="exampleInputPassword1"  class="form-label">Material Type:</label>
  <select required="" name="filetype" class="form-select" id="role-select">
  <option value="">- Select a type -</option>
  <option value="Web Material">Web Material</option>
  <option value="File Upload">File Upload</option>
    </select></div>
  <div class="mb-3" id="pc-cont">
    <label for="exampleInputPassword1" class="form-label">Upload File:</label><br>
    <input type="file" name="file" id="upload">
    <div id="passwordHelpBlock" class="form-text">
  File must be less than 10MB  
</div></div>
   <div id="web-link" class="mb-3">
    <label  class="form-label">Link</label>
    
    <input required name="filelink" type="url" class="form-control" id="webm-url"></div>
  <div class="dd">  
  <input name="submit" type="submit" class="btn btn-primary"></input>
  <a class="btn btn-outline-success" href="profile.php">Back To Profile</a>
</div>
</form></div>
  </div> 
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script><script  src="./uploadscript.js"></script>

</body>
</html>
