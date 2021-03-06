<?php 
require "connectDB.php";
$checkRoleSQL = "SELECT userRole FROM `user` WHERE userID = ".$_SESSION["userID"];
$checkRoleQuery = mysqli_query($conn, $checkRoleSQL);
while ($userRole = $checkRoleQuery->fetch_assoc()) {
    $Role = $userRole["userRole"];
}
if ($Role == "Member") {
    $adminManagment = '';
} else if ($Role == "Admin"){
    $adminManagment = '<a href="admin.php"><i class="fab fa-vaadin works" style="margin-right:0;"></i></a>';
} else {
    Header("Location: logout.php");
}
?>

<header  style="box-shadow: rgba(207, 0, 0, 1) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;">
    <div class="inner-width">
        <a href="http://it.cmtc.ac.th/web2017/" class="logo d-none d-sm-block"><img src="http://it.cmtc.ac.th/web2017/photo/logo/2017/1513260726_1-org.png" alt=""></a>
        <i class="menu-toggle-btn fas fa-bars"></i>
        <nav class="navigation-menu">
            <a href="index.php"><i class="fas fa-home home"></i> หน้าหลัก</a>
            <a href="internship.php?view=8"><i class="fab fa-buffer works"></i> สถานประกอบการ</a>
            <a href="contacts.php"><i class="fas fa-headset contact"></i> ติดต่อเรา</a>
            <a href="report.php"><i class="fas fa-sticky-note report"></i> รายงาน</a>
            <a href="profile.php"><i class="fas fa-users team"></i> บัญชี</a>
            <?= $adminManagment?>
        </nav>
    </div>
</header>