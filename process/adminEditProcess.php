<?php 
require "../connectDB.php";

if ($_GET["edit"] == "แก้ไข") {
    $updateInfoSQL = "UPDATE `user` SET `userName` = '".$_GET["stdID"]."', `userFirstName` = '".$_GET["firstName"]."', `userLastName` = '".$_GET["lastName"]."', `userPassword` = '".$_GET["thID"]."', `userRole` = '".$_GET["role"]."' WHERE `user`.`userID` = ".$_GET["userID"].";";
    $updateInfoQuery = mysqli_query($conn, $updateInfoSQL);
    if ($updateInfoQuery) {
        echo "success";
        header("Location: ../adminEdit.php?status=success&years=".$_GET["years"]."");
    } else {
        echo "update fail";
        header("Location: ../adminEdit.php?status=fail");
    }
} else if ($_GET["edit"] == "ลบ") {
    $deleteInfoSQL = "DELETE FROM `user` WHERE `user`.`userID` = ".$_GET["userID"].";";
    $deleteInfoQuery = mysqli_query($conn,$deleteInfoSQL);
    if ($deleteInfoQuery) {
        header("Location: ../adminEdit.php?status=deleted&years=".$_GET["years"]."");
    } else {
        header("Location: ../adminEdit.php?status=fail");
    }
} else {
    header("Location: ../adminEdit.php");
}
?>
