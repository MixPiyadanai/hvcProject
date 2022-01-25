<?php
require '../connectDB.php';
session_start();

$checkInterningUserSQL = "SELECT * FROM `interning` WHERE interningIntern = " . $_POST["internID"] . " AND interningUser = " . $_SESSION["userID"];
$checkInterningUserQuery = mysqli_query($conn, $checkInterningUserSQL);
if ($checkInterningUserQuery->num_rows == 0) {
    $getInterningSQL = "SELECT * FROM `interning` INNER JOIN `internship` ON `interning`.`interningIntern` = `internship`.internID WHERE `interning`.`interningStatus` = 'Internship' AND `internship`.internID = " . $_POST["internID"];
    $getinterningQuery = mysqli_query($conn, $getInterningSQL);
    print_r($getinterningQuery);
    while ($internInfo = $getinterningQuery->fetch_assoc()) {
        if ($internInfo["internMax"] <= $getinterningQuery) {
            $registerSQL = "INSERT INTO `interning` (`interningID`, `interningUser`, `interningIntern`, `interningStatus`, `interningStart`, `interningEnd`, `interningDate`) VALUES (NULL, '".$_SESSION["userID"]."', '".$_POST["internID"]."', 'Qualifying', NULL, NULL, current_timestamp());";
            $registerQuery = mysqli_query($conn,$registerSQL);
            if ($registerQuery) {
                echo "success";
            } else {
                echo "something error";
            }
        } else {
            #คนสมัครเกิน
            echo "คนสมัครเกิน";
            header("Location: ../internship.php");
        }
    }
} else {
    #สมัครไปแล้ว
    echo "สมัครไปแล้ว";
    header("Location: ../internship.php");
}

mysqli_close($conn);
