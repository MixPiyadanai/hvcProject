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
      $path = "uploads/";
      $path = $path . basename( $_FILES['uploaded_file']['name']);
  
      if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
        echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
        " has been uploaded<br>";
        $fileName = str_replace("uploads/","",$path);
        echo $fileName;
        require 'connectDB.php';
        $reportOrder = $_POST["reportOrder"];
        $updateImgSQL = "UPDATE `report` SET `reportImg` = '".$fileName."' WHERE `report`.`reportOrder` = ".$reportOrder." AND `report`.`reportOwner` = ".$_SESSION["userID"].";";
        $updateImgQuery = mysqli_query($conn,$updateImgSQL);
        if ($updateImgQuery) {
            header("Location: editReport.php");
        } else {
            echo "error";
        }
      } else{
          echo "There was an error uploading the file, please try again!";
      }
    }
}
