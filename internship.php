<?php
session_start();
if ($_SESSION["userID"] == NULL) {
    header("Location: login.php");
} else {
}

if (isset($_GET["view"])) {
    if ($_GET["view"] >= 9) {
        $scrollOnLoad = 'onload="window.scrollTo(0,document.body.scrollHeight);"';
    } else {
        $scrollOnLoad = NULL;
    }
} else {
    $scrollOnLoad = NULL;
}

if (isset($_GET["name"])) {

} else {
    $_GET["name"] = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<?php
require 'components/head.php';
?>

<body style="min-height:100%;" <?= $scrollOnLoad ?>>
    <?php
    require 'components/header.php';
    ?>
    <div class="container pt-5 pe-5 ps-5 container-shadow">
        <div class="row">
            <div class="col-12">
                <div class="card mb-5 scale-in-ver-top cardRounded">
                    <div class="card-header">
                        <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-search"></i> ค้นหาสถานประกอบการ</h3>
                    </div>
                    <div class="card-body p-3 m-0">
                        <div class="row">
                            <div class="col slit-in-vertical">
                                <form action="" method="GET">
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-10">
                                            <input type="text" class="form-control Promt searchKeyword fs-4" value="<?= $_GET["name"]?>" name="name" id="searchKeyword" placeholder="พิมพ์ค้นหา...">
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary btn-lg Promt">ค้นหา</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!---
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-1">
                                        <p class="mb-0 Itim fw-bold fs-5">Filter</p>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-11">
                                        <div class="row">
                                            <div class="col-1">
                                                <p class="mb-0 Itim fs-5">Type,</p>
                                            </div>
                                            <div class="col-1">
                                                <p class="mb-0 Itim fs-5">Type,</p>
                                            </div>
                                            <div class="col-1">
                                                <p class="mb-0 Itim fs-5">Type,</p>
                                            </div>
                                            <div class="col-1">
                                                <p class="mb-0 Itim fs-5">Type,</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                --->
                                <hr class="mb-0">
                                <div class="row mb-3">
                                    <?php
                                    require "connectDB.php";
                                    if (!isset($_GET["view"])) {
                                        $_GET["view"] = 8;
                                    }
                                    $internRow = $_GET["view"];

                                    $getInternSQL = "SELECT * FROM `internship` WHERE `internName` LIKE '%".$_GET["name"]."%' ORDER BY `internship`.`internID` DESC LIMIT " . $internRow . ";";
                                    $getInternQuery = mysqli_query($conn, $getInternSQL);

                                    while ($InternInfo = $getInternQuery->fetch_assoc()) {

                                        if ($InternInfo["internImage"] == NULL) {
                                            $internImage = "components/images/noImg.png";
                                        } else {
                                            $internImage = "internPic/" . $InternInfo["internImage"];
                                        }

                                        $getInterningSQL = "SELECT * FROM `interning` INNER JOIN `internship` ON `interning`.`interningIntern` = `internship`.internID WHERE `interning`.`interningStatus` = 'Internship' AND `internship`.internID = " . $InternInfo["internID"];
                                        $getinterningQuery = mysqli_query($conn, $getInterningSQL);
                                        $userInterning = $getinterningQuery->num_rows;

                                        if ($userInterning >= $InternInfo["internMax"]) {
                                            $badgeColor = "danger";
                                            $readyBadge = "danger";
                                            $readyBadgeText = "ไม่พร้อม";
                                        } else if ($userInterning == 0) {
                                            $badgeColor = "success";
                                            $readyBadge = "success";
                                            $readyBadgeText = "พร้อมรับ";
                                        } else if ($userInterning <= $InternInfo["internMax"]) {
                                            $badgeColor = "warning";
                                            $readyBadge = "success";
                                            $readyBadgeText = "พร้อมรับ";
                                        }
                                        echo '
                                        <div class="col-md-12 col-lg-6 mt-3 mb-3">
                                        <div class="card cardRounded" id="' . $_GET["view"] . '">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-3 p-0 ps-3 d-flex align-items-center justify-content-center">
                                                        <img src="' . $internImage . '" class="img-fluid" alt="..." style="border-radius:15px 0px 0px 15px">
                                                    </div>
                                                    <div class="col-9 pe-3 pt-2" style="border-radius: 15px">
                                                        <h4 class="Itim">' . $InternInfo["internName"] . '</h4>
                                                        <p class="fw-light fs-5">' . $InternInfo["internDesc"] . '</p>
                                                        <hr>
                                                        <!---
                                                        <h6 class="Itim">ตำแหน่ง | พนักงานถูพื้น, ภารโรง</h6>
                                                        --->
                                                        <div class="col mb-2">
                                                        
                                                        <!---
                                                            <span class="badge rounded-pill bg-' . $readyBadge . ' Promt">' . $readyBadgeText . '</span>
                                                            <span class="badge rounded-pill bg-' . $badgeColor . ' Promt">' . $InternInfo["internMax"] . ' / ' . $userInterning . '</span>
                                                        --->
                                                        
                                                        </div>
                                                        <div class="d-grid gap-2 mb-2">
                                                            <a href="internshipInfo.php?internID=' . $InternInfo["internID"] . '" class="btn btn-primary rounded-pill">ดูรายละเอียด</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        ';
                                    }
                                    $InternRow = $_GET["view"] + 4;
                                    mysqli_close($conn);
                                    ?>
                                    <a href="internship.php?view=<?= $InternRow ?>&name=<?=$_GET["name"]?>" class="btn btn-primary btn-lg mx-auto d-block Promt">หน้าถัดไป</a>
                                </div>
                            </div>
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