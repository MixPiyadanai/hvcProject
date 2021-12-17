<?php
session_start();
$userID = $_SESSION["userID"];
$reportTitle = $_POST["reportTitle"];
$reportDay = $_POST["Day"];
$reportMonth = $_POST["Month"];
$reportYear = $_POST["Year"];
$Date = $reportYear . "-" . $reportMonth . "-" . $reportDay;
$Content = $_POST["reportContent"];
$userID = $_SESSION["userID"];

if ($reportDay >= 1 && $reportDay <= 31) {
    if ($reportMonth >= 1 && $reportMonth <= 12) {
        require '../connectDB.php';
        $addReportSQL = "INSERT INTO `report` (`reportID`, `reportTitle`, `reportOwner`, `reportDate`, `reportContent`, `reportImg`, `reportCreate`, `reportLastEdit`) VALUES (NULL, '$reportTitle', '$userID', '$Date', '$Content', NULL, current_timestamp(), current_timestamp());";
        $addReportQuery = mysqli_query($conn, $addReportSQL);
        if ($addReportQuery) {
            header("Location: ../report.php");
        } else {
            echo "Error";
        }
        mysqli_close($conn);
    } else {
        $alert = "เดือนไม่ถูกต้อง";
    }
} else {
    $alert = "วันที่ไม่ถูกต้อง";
}
?>
<center>
    <h1><?= $alert; ?></h1>
    <a href="../addReport.php" style="font-weight:bold;font-size:larger;">กลับไปแก้ไข</a>
</center>