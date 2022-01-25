<?php
session_start();
require '../connectDB.php';
$getReportSQL = "SELECT * FROM `report` WHERE reportOrder = " . $_GET["reportOrder"] . " AND reportOwner = " . $_SESSION["userID"];
$getReportQuery = mysqli_query($conn, $getReportSQL);
if ($getReportQuery->num_rows >= 1) {
    $updateReportSQL = "UPDATE `report` SET `reportDate` = '" . $_GET["date"] . "', `reportContent` = '" . $_GET["content"] . "', `reportLastEdit` = current_timestamp() WHERE `report`.`reportID` = 1;";
    $updateReportQuery = mysqli_query($conn, $updateReportSQL);
    if ($updateReportQuery) {
        echo "อัพเดตข้อมูลสำเร็จ";
    } else {
        echo "update error";
    }
    
} else if ($getReportQuery->num_rows == 0) {
    $insertReportSQL = "INSERT INTO `report` (`reportID`, `reportOrder`, `reportOwner`, `reportDate`, `reportContent`, `reportImg`, `reportCreate`, `reportLastEdit`) VALUES (NULL, '" . $_GET["reportOrder"] . "', '" . $_SESSION["userID"] . "', '" . $_GET["date"] . "', '" . $_GET["content"] . "', 'noImg.png', current_timestamp(), current_timestamp());";
    $insertReportQuery = mysqli_query($conn, $insertReportSQL);
    if ($insertReportQuery) {
        echo "เพิ่มข้อมูลสำเร็จ";
    } else {
        echo "insert error";
    }
}


?>

<center>

    <a href="../report.php" style="font-weight:bold;font-size:larger;">กลับไปแก้ไข</a>
</center>