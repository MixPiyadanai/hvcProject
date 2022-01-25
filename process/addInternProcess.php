<?php 
session_start();

if ($_SESSION["userID"] == NULL) {
    header("Location: login.php");
} else {
}

$uploadStatus = 0;

if ($uploadStatus = 1) {
    if(!empty($_FILES['uploaded_file']))
    {
      $path = "internPic/";
      $path = $path . basename( $_FILES['uploaded_file']['name']);
  
      if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
        echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
        " has been uploaded<br>";
        $fileName = str_replace("uploads/","",$path);
        echo $fileName;
      } else{
          echo "There was an error uploading the file, please try again!";
      }
    }
}

$internName = $_GET["internName"];
$internLocation = $_GET["internLocation"];
$internMap = $_GET["internMap"];
$internPhone = $_GET["internPhone"];
$internEmail = $_GET["internEmail"];
$internOwner = $_GET["internOwner"];
$internDesc = $_GET["internDesc"];
$internClosed = $_GET["internClosed"];
$internOpen = $_GET["internOpen"];
$internMOU = $_GET["internMOU"];
$internImage = $_GET["uploaded_file"];

echo $internName."<br>".$internLocation."<br>".$internMap."<br>".$internPhone."<br>".$internEmail."<br>".$internOwner."<br>".$internDesc."<br>".$internClosed."<br>".$internOpen."<br>".$internImage."<br>" .$internMOU."<br>";
require '../connectDB.php';
$insertInternSQL = "INSERT INTO `internship` (`internID`, `internName`, `internLocation`, `internMap`, `internPhone`, `internEmail`, `internOwner`, `internDesc`, `internMax`, `internSubmited`, `internClosed`, `internOpen`, `internImage`, `MOU`) VALUES (NULL, '".$internName."', '".$internLocation."', '".$internMap."', '".$internPhone."', '".$internEmail."', '".$internOwner."', '".$internDesc."', NULL, CURRENT_TIMESTAMP(), '".$internClosed."', '".$internOpen."', '".$internImage."', '".$internMOU."');";
echo $insertInternSQL;
$insertInternQuery = mysqli_query($conn, $insertInternSQL);
if ($insertInternQuery) {
    echo "success";
    header("Location: ../admin.php");
} else {
    echo "fail";
    header("Location: ../admin.php");
}


?>