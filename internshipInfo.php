<?php
session_start();
error_reporting(0);

if ($_SESSION["userID"] == NULL) {
    header("Location: login.php");
} else {
}



require 'connectDB.php';
$getInternInfoSQL = 'SELECT * FROM `internship` WHERE internID = ' . $_GET["internID"];
$getInternInfoQuery = mysqli_query($conn, $getInternInfoSQL);

if ($getInternInfoQuery->num_rows != 0) {
    while ($internInfo = $getInternInfoQuery->fetch_assoc()) {
        $internName = $internInfo["internName"];
        $internLocation = $internInfo["internLocation"];
        $internPhone = $internInfo["internPhone"];
        $internEmail = $internInfo["internEmail"];
        $internOwner = $internInfo["internOwner"];
        $internDesc = $internInfo["internDesc"];
        $internClosed = $internInfo["internClosed"];
        $internOpen = $internInfo["internOpen"];
        $internImage = $internInfo["internImage"];
        $internSubmit = $internInfo["internSubmited"];
        $internMap = $internInfo["internMap"];
    }

    if ($internImage == NULL) {
        $internImage = "components/images/noImg.png";
    } else {
        $internImage = "" . $internImage;
    }

    $getOpenTimeSQL = 'SELECT internOpen FROM `internship` WHERE internID = ' . $_GET["internID"];
    $getOpenTimeQuery = mysqli_query($conn, $getOpenTimeSQL);
    if ($getOpenTimeQuery->num_rows != 0) {
        while ($OpenTime = $getOpenTimeQuery->fetch_assoc()) {
            $splitOpenTime = $OpenTime["internOpen"];
            $ArySplitOpentime = explode(",", $splitOpenTime);
            $oSunday = $ArySplitOpentime['0'];
            $oMonday = $ArySplitOpentime['1'];
            $oTuesday = $ArySplitOpentime['2'];
            $oWednesday = $ArySplitOpentime['3'];
            $oThursday = $ArySplitOpentime['4'];
            $oFriday = $ArySplitOpentime['5'];
            $oSaturday = $ArySplitOpentime['6'];
        }
    }

    $getClosedTimeSQL = 'SELECT internClosed FROM `internship` WHERE internID = ' . $_GET["internID"];
    $getClosedTimeQuery = mysqli_query($conn, $getClosedTimeSQL);
    if ($getClosedTimeQuery->num_rows != 0) {
        while ($ClosedTime = $getClosedTimeQuery->fetch_assoc()) {
            $splitClosedTime = $ClosedTime["internClosed"];
            $ArySplitClosedtime = explode(",", $splitClosedTime);
            $cSunday = $ArySplitClosedtime['0'];
            $cMonday = $ArySplitClosedtime['1'];
            $cTuesday = $ArySplitClosedtime['2'];
            $cWednesday = $ArySplitClosedtime['3'];
            $cThursday = $ArySplitClosedtime['4'];
            $cFriday = $ArySplitClosedtime['5'];
            $cSaturday = $ArySplitClosedtime['6'];
        }
    }
} else {
    header("Location: internship.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<?php
require 'components/head.php';
?>
<style>
    .map-responsive {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .map-responsive iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }
</style>

<body style="min-height:100%;">
    <?php
    require 'components/header.php';
    ?>
    <div class="container pt-5 pe-5 ps-5 container-shadow">
        <div class="card mb-5 scale-in-ver-top">
            <div class="card-header bg-white">
                <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-building"></i> รายละเอียดสถานประกอบการ</h3>
            </div>
            <div class="card-body" style="background-color: #EFEFEF;">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                        <img src="internPic/<?= $internImage ?>" class="mx-auto d-block" width="100%" style="border-radius: 15%;border-width:3px; border-color:rgba(50, 50, 50, 0.6);border-style:solid">
                    </div>
                    <div class="col-lg-6 col-md-9 col-sm-8 col-8">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="Promt fs-2"><?= $internName ?></h2>
                            </div>
                            <div class="col-12">
                                <h2 class="Promt fs-5"><?= $internDesc ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 p-3">
                        <div class="row">
                            <div class="col-12 col-sm-3 col-md-4">
                                <p class="fs-6 Promt fw-bold">Email</p>
                            </div>
                            <div class="col-12 col-sm-9 col-md-8">
                                <p class="fs-6 Promt"><?= $internEmail ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-3 col-md-4">
                                <p class="fs-6 Promt fw-bold">เจ้าของ</p>
                            </div>
                            <div class="col-12 col-sm-9 col-md-8">
                                <p class="fs-6 Promt"><?= $internOwner ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-3 col-md-4">
                                <p class="fs-6 Promt fw-bold">เบอร์</p>
                            </div>
                            <div class="col-12 col-sm-9 col-md-8">
                                <p class="fs-6 Promt"><?= $internPhone ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-3 col-md-4 text-secondary">
                                <p class="fs-6 Promt fw-bold">Submit</p>
                            </div>
                            <div class="col-12 col-sm-9 col-md-8 text-secondary">
                                <p class="fs-6 Promt"><?= $internSubmit ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!---
            <div class="card-footer" style="border-bottom:1px solid lightgrey">
                <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-user-friends"></i>
                    สถานะ</h3>
            </div>

            <div class="card-body bg-white" style="background-color: #EFEFEF;">

                <div class="row">

                    <div class="col-12 col-sm-4">
                        <?php
                        $getMaxInternshipSQL = "SELECT internMax FROM `internship` WHERE internID = " . $_GET["internID"];
                        $getMaxInternshipQuery = mysqli_query($conn, $getMaxInternshipSQL);
                        while ($maxIntern = $getMaxInternshipQuery->fetch_assoc()) {
                            $maxInternship = $maxIntern["internMax"];
                        }

                        ?>
                        <p class="fs-4 Promt fw-bold">สถานประกอบการรับคนได้สูงสุด</p>
                    </div>
                    <div class="col-12 col-sm-8">
                        <p class="fs-4 Promt"><?= $maxInternship ?> คน</p>
                    </div>

                    <div class="col-12 col-sm-4">
                        <?php
                        $getInterningInternshipSQL = "SELECT * FROM `interning` WHERE interningIntern = " . $_GET["internID"] . " AND interningStatus = 'Internship'";
                        $getInterningInternshipQuery = mysqli_query($conn, $getInterningInternshipSQL);
                        $userInternship = $getInterningInternshipQuery->num_rows;

                        ?>
                        <p class="fs-4 Promt fw-bold">กำลังเข้ารับการฝึกงานอยู่ทั้งหมด</p>
                    </div>
                    <div class="col-12 col-sm-8">
                        <p class="fs-4 Promt"><?= $userInternship ?> คน</p>
                    </div>

                    <div class="col-12 col-sm-4">
                        <?php
                        $getInterningQualifyingSQL = "SELECT * FROM `interning` WHERE interningIntern = " . $_GET["internID"] . " AND interningStatus = 'Qualifying'";
                        $getInterningQualifyingQuery = mysqli_query($conn, $getInterningQualifyingSQL);
                        $userQualifying = $getInterningQualifyingQuery->num_rows;

                        ?>
                        <p class="fs-4 Promt fw-bold">มีผู้ยื่นสมัครและกำลังรอการประเมินทั้งหมด</p>
                    </div>
                    <div class="col-12 col-sm-8">
                        <p class="fs-4 Promt"><?= $userQualifying ?> คน</p>
                    </div>
                    <?php
                        $checkInterningUserSQL = "SELECT * FROM `interning` WHERE interningIntern = " . $_GET["internID"] . " AND interningUser = ". $_SESSION["userID"];
                        $checkInterningUserQuery = mysqli_query($conn,$checkInterningUserSQL);
                        if ($checkInterningUserQuery->num_rows > 0) {
                            $disableRegister = "disabled";
                            $registeredText = "คุณได้ทำการสมัครไปแล้ว";
                            $bottonColor = "secondary";
                        } else {
                            $registeredText = "สมัคร";
                            $bottonColor = "primary";
                        }
                    ?>
                    <div class="col-12 col-sm-4">
                        <form method="POST" action="process/registerInternship.php">
                            <input type="text" value="<?= $_SESSION["userID"] ?>" name="userID" hidden>
                            <input type="text" value="<?= $_GET["internID"] ?>" name="internID" hidden>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn-lg btn-<?= $bottonColor?>" value="register" <?= $disableRegister?>><?= $registeredText?></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-sm-8">
                    </div>
                </div>
            </div>
            --->

            <div class="card-footer" style="border-bottom:1px solid lightgrey">
                <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-business-time"></i>
                    เวลาทำการ</h3>
            </div>
            <div class="card-body bg-white" style="background-color: #EFEFEF;">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-2">
                        <p class="fs-4 Promt fw-bold">อาทิตย์</p>
                    </div>
                    <div class="col-12 col-sm-9 col-md-10">
                        <p class="fs-4 Promt"><?= $oSunday ?>–<?= $cSunday ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-2">
                        <p class="fs-4 Promt fw-bold">จันทร์</p>
                    </div>
                    <div class="col-12 col-sm-9 col-md-10">
                        <p class="fs-4 Promt"><?= $oMonday ?>–<?= $cMonday ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-2">
                        <p class="fs-4 Promt fw-bold">อังคาร</p>
                    </div>
                    <div class="col-12 col-sm-9 col-md-10">
                        <p class="fs-4 Promt"><?= $oTuesday ?>–<?= $cTuesday ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-2">
                        <p class="fs-4 Promt fw-bold">พุธ</p>
                    </div>
                    <div class="col-12 col-sm-9 col-md-10">
                        <p class="fs-4 Promt"><?= $oWednesday ?>–<?= $cWednesday ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-2">
                        <p class="fs-4 Promt fw-bold">พฤหัสบดี</p>
                    </div>
                    <div class="col-12 col-sm-9 col-md-10">
                        <p class="fs-4 Promt"><?= $oThursday ?>–<?= $cThursday ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-2">
                        <p class="fs-4 Promt fw-bold">ศุกร์</p>
                    </div>
                    <div class="col-12 col-sm-9 col-md-10">
                        <p class="fs-4 Promt"><?= $oFriday ?>–<?= $cFriday ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-2">
                        <p class="fs-4 Promt fw-bold">เสาร์</p>
                    </div>
                    <div class="col-12 col-sm-9 col-md-10">
                        <p class="fs-4 Promt"><?= $oSaturday ?>–<?= $cSaturday ?></p>
                    </div>
                </div>
            </div>

            <div class="card-footer" style="border-bottom:1px solid lightgrey">
                <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-map" aria-hidden="true"></i>
                    ตำแหน่ง</h3>
            </div>
            <div class="card-body bg-white" style="background-color: #EFEFEF;">
                <div class="row">
                    <div class="col">
                        <p class="Promt pt-2 fw-bold fs-4"> ตำแหน่งสถานประกอบการ</p>
                        <p class="Promt fs-5"> <?= $internLocation ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed?pb=<?= $internMap ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php
    require 'components/footer.php';
    ?>
    <script type="text/javascript">
        $(".menu-toggle-btn").click(function() {
            $(this).toggleClass("fa-times");
            $(".navigation-menu").toggleClass("active");
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>