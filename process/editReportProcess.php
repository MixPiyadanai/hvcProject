<?php
session_start();
$reportTitle = $_POST["reportTitle"];
$reportDay = $_POST["Day"];
$reportMonth = $_POST["Month"];
$reportYear = $_POST["Year"];
$reportID = $_POST["reportID"];
$Date = $reportYear . "-" . $reportMonth . "-" . $reportDay;
$Content = $_POST["reportContent"];
$userID = $_SESSION["userID"];



require '../connectDB.php';
if ($_POST["Submit"] == "แก้ไข") {
    if ($reportDay >= 1 && $reportDay <= 31) {
        if ($reportMonth >= 1 && $reportMonth <= 12) {

            $updateReportSQL = "UPDATE `report` SET `reportTitle` = '" . $reportTitle . "', `reportDate` = '" . $Date . "', `reportContent` = '" . $Content . "', `reportLastEdit` = CURRENT_TIME() WHERE `report`.`reportID` = " . $reportID . ";";
            $updateReportQuery = mysqli_query($conn, $updateReportSQL);
            if ($updateReportQuery) {
                header("Location: ../report.php");
            } else {
                echo "Error";
            }
        } else {
            $alert = "เดือนไม่ถูกต้อง";
        }
    } else {
        $alert = "วันที่ไม่ถูกต้อง";
    }
} else if ($_POST["Submit"] == "ลบรายงาน") {
    $DELETESQL = "DELETE FROM `report` WHERE `report`.`reportID` = " . $reportID;

    $DELETEQuery = mysqli_query($conn, $DELETESQL);
    if ($DELETEQuery) {
        header("Location: ../report.php");
        echo $DELETESQL;
        $alert = "Error 1";
    } else {
        $alert = "Error";
    }
} else {
    $alert = "Error";
}
mysqli_close($conn);
?>
<center>
    <h1><?= $alert; ?></h1>
    <a href="../editReport.php?reportID=<?= $reportID ?>" style="font-weight:bold;font-size:larger;">กลับไปแก้ไข</a>
</center>