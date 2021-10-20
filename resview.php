<?php
 session_start();
 if(!isset($_SESSION['role'])){
  echo "<script>
alert('You must be logged in to continue');
window.location.href='login.php';
</script>";
exit();
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Material Portal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="tablestyle.css?v1"/>
</head>
<body>
   <center><h1>Uploaded Material</h1></center>
   <table class="table">
     <thead>
     	<tr>
     	 <th>Title</th>
     	 <th>Material Type</th>
     	 <th>View/Download</th>
     	</tr>
     </thead>
     <tbody>
     	  <?php
        $dl1="Title";
        $dl2="Material Type";
        $dl3="View/Download";

$conn = mysqli_connect("localhost", "root", "", "test");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM material";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  if($row["type"]=="File Upload"){
  $pl="./includes/".$row["filesrc"];
}
else{
  $pl=$row["filesrc"];
}
echo "<tr><td data-label=$dl1>" . $row["title"]. "</td><td data-label=$dl2>" . $row["type"] . "</td><td data-label=$dl3>"
. "<a href=$pl target="."_blank"." download "."rel="."noopener noreferrer"."><img src="."https://img.icons8.com/material-rounded/24/000000/link--v2.png"."/></a>". "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
     </tbody>
   </table>
   <br>
   <div class="holder"><a class="btn" href="profile.php" style="
    position: absolute;
    right: 0px;
">Back to Profile</a></div>
</body>
</html>