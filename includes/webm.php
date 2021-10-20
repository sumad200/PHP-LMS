<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


$imageTitle = $_POST['filetitle'];
$imageDesc = $_POST['filetype'];
$imagelink = $_POST['filelink'];

if($imageDesc == "Web Material"){

$insertQry = 'insert into material (title, type, filesrc) values(?,?,?)';
 
$insertStatement = mysqli_prepare($conn,$insertQry);
 
mysqli_stmt_bind_param($insertStatement,'sss',$imageTitle, $imageDesc, $imagelink);
 
mysqli_stmt_execute($insertStatement);
echo "<script>
alert('Web Material added successfully');
window.location.href='../resview.php';
</script>"; 
mysqli_close($conn);

}
else{

  $location = "uploads/";
  $file_new_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
  $file_name = $_FILES["file"]["name"]; // Get uploaded file name
  $file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
  $file_size = $_FILES["file"]["size"]; // Get uploaded file size
  $final_name=$location . $file_new_name;

if ($file_size > 10485760) { // Check file size 10mb or not
		echo "<script>alert('Woops! File is too big. Maximum file size allowed for upload 10 MB.');
    window.location.href='../upload.php';</script>";
    exit();
	} 
  else {
  
    $sql = 'insert into material (title, type, filesrc) values(?,?,?)';
      
    $insertStatement = mysqli_prepare($conn,$sql);
 
mysqli_stmt_bind_param($insertStatement,'sss',$imageTitle, $imageDesc, $final_name);
 
mysqli_stmt_execute($insertStatement);
move_uploaded_file($file_temp, $final_name);
echo "<script>
alert('File Uploaded, Material added successfully');
window.location.href='../resview.php';
</script>";
mysqli_close($conn);
}
}




