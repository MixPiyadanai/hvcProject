<?php 
require '../connectDB.php';
session_start();
$userID = $_POST["studentID"];

$getUserSQL = 'SELECT * FROM `user` WHERE userName = "'.$userID.'"';
$getUserQuery = mysqli_query($conn,$getUserSQL);

mysqli_close($conn);
if ($getUserQuery->num_rows >= 1) {
    while ($Userinfo = $getUserQuery->fetch_assoc()) {
        if ($_POST["studentPassword"] == $Userinfo["userPassword"]) {
            $_SESSION["userRole"] = $Userinfo["userRole"];
            $_SESSION["userID"] = $Userinfo["userID"];
            header("Location: ../index.php");
        } else {
            echo "password error";
        }
    }
} else {
    echo "user not found";
}
?>