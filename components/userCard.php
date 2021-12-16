<?php
require 'connectDB.php';

$GetProfileSQL = "SELECT * FROM `user` WHERE userID = " . $_SESSION["userID"];
$GetProfileQuery = mysqli_query($conn, $GetProfileSQL);
while ($ProfileInfo = $GetProfileQuery->fetch_assoc()) {
    $_SESSION["userName"] = $ProfileInfo["userName"];
    $_SESSION["userPassword"] = $ProfileInfo["userPassword"];
    $_SESSION["userRole"] = $ProfileInfo["userRole"];
}


?>

<div class="card mb-5 scale-in-ver-top cardRounded">
    <div class="card-header">
        <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-user"></i> บัญชีผู้ใช้</h3>
    </div>
    <div class="card-body p-3 m-0">
        <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-4 mb-3 slit-in-vertical">
                <img src="https://c.tenor.com/AbkJkB1pGr8AAAAC/hutao-money-rain.gif" class="mx-auto d-block" alt="..." width="150px" style="border-radius: 50%;border-width:3px; border-color:rgba(207, 0, 0, 1);border-style:solid">
                <hr class="d-sm-none d-md-block d-none d-sm-block d-md-none d-lg-block">
            </div>
            <div class="col-lg-12 col-md-8 col-sm-8 slit-in-vertical">
                <div class="row pt-3 pb-3">
                    <div class="col-5" style="border-right: 2px solid #CF0000;">
                        <p class="fw-bold fs-5 mb-0 Itim">UserName</p>
                        <p class="fw-bold fs-5 mb-0 Itim">Role</p>
                    </div>
                    <div class="col-7">
                        <p class="fw-bold fs-5 mb-0 Itim"><?= $_SESSION["userName"] ?></p>
                        <p class="fw-bold fs-5 mb-0 Itim"><?= $_SESSION["userRole"] ?></p>
                    </div>
                </div>
                <a href="profile.php" class="btn btn-primary mx-auto d-block Promt">ดูบัญชี</a>
                <a href="logout.php" class="btn btn-danger mx-auto d-block mt-2 Promt">ออกจากระบบ</a>
            </div>
        </div>
    </div>
</div>