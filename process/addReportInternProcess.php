<?php 
session_start();
require '../connectDB.php';
$getInfoSQL = "SELECT * FROM `reportintern` WHERE riOwner = ".$_SESSION["userID"];
$getInfoQuery = mysqli_query($conn, $getInfoSQL);

if ($getInfoQuery->num_rows == 0) {
    $insertInfoSQL = "INSERT INTO `reportintern` (`riID`, `riOwner`, `riIntern`, `riInternLocation`,`riMentor`, `riPeriodStart`, `riPeriodEnd`, `riTerm`, `riYear`, `riClass`, `riClassYear`, `riClassGroup`, `riWorkEnvironment`) VALUES (NULL, '".$_SESSION["userID"]."', '".$_GET["intern"]."', '".$_GET["internLocation"]."', '".$_GET["mentor"]."', '".$_GET["periodStart"]."', '".$_GET["periodEnd"]."', '".$_GET["term"]."', '".$_GET["year"]."', '".$_GET["class"]."', '".$_GET["classYear"]."', '".$_GET["classGroup"]."', '".$_GET["workEnvironment"]."');";
    $insertInfoQuery = mysqli_query($conn,$insertInfoSQL);
    if ($insertInfoQuery) {
        header("Location: ../reportPrint.php");
    } else {
        echo "error";
    }
} else {
    $updateInfoSQL = "UPDATE `reportintern` SET `riIntern` = '".$_GET["intern"]."', `riInternLocation` = '".$_GET["internLocation"]."', `riMentor` = '".$_GET["mentor"]."', `riPeriodStart` = '".$_GET["periodStart"]."', `riPeriodEnd` = '".$_GET["periodEnd"]."', `riTerm` = '".$_GET["term"]."', `riYear` = '".$_GET["year"]."', `riClass` = '".$_GET["class"]."', `riClassYear` = '".$_GET["classYear"]."', `riClassGroup` = '".$_GET["classGroup"]."', `riWorkEnvironment` = '".$_GET["workEnvironment"]."' WHERE `reportintern`.`riOwner` = ".$_SESSION["userID"].";";
    $updateInfoQuery = mysqli_query($conn,$updateInfoSQL);
    if ($updateInfoQuery) {
        header("Location: ../reportPrint.php");
    } else {
        echo "edit error";
    }
}

?>