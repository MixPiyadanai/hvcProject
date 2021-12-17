<?php
session_start();

if ($_SESSION["userID"] == NULL) {
    header("Location: login.php");
} else {
}
require 'connectDB.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php
require 'components/head.php';
?>

<body style="min-height:100%;">
    <?php
    require 'components/header.php';
    ?>
    <div class="container pb-5 pt-5 pe-5 ps-5 container-shadow">
        <div class="card mb-0 scale-in-ver-top cardRounded">
            <div class="card-header">
                <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-sticky-note"></i> แก้ไขรายงาน</h3>
            </div>
            <div class="card-body p-3 pt-4 m-0">
                <div class="row mb-4">
                    <div class="col slit-in-vertical">
                        <form action="process/addReportProcess.php" method="POST">
                            <label for="reportTitle" class="form-label Promt fs-3">หัวข้อ</label>
                            <input type="text" class="form-control fs-3 Itim mb-3" id="reportTitle" placeholder="หัวข้อ" value="" name="reportTitle">
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-labe Promt fs-3">ประจำวันที่</label>
                                </div>
                                <div class="col-12 col-sm-3 col-md-2">
                                    <input type="text" id="inputPassword6" class="form-control fs-3 Itim" placeholder="วัน" value="" name="Day">
                                </div>
                                <div class="col-12 col-sm-3 col-md-2">
                                    <input type="text" id="inputPassword6" class="form-control fs-3 Itim" placeholder="เดือน" value="" name="Month">
                                </div>
                                <div class="col-12 col-sm-3 col-md-2">
                                    <input type="text" id="inputPassword6" class="form-control fs-3 Itim" placeholder="ปี" value="" name="Year">
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control Itim fs-3 pt-5" placeholder="เนื้อหา" id="formContent" style="height: 250px" name="reportContent"></textarea>
                                <label for="formContent Itim fs-3" >เนื้อหา</label>
                            </div>
                            <label class="form-label fs-3 Itim" for="reportImg">เพิ่มรูปภาพ</label>
                            <input type="file" class="form-control fs-4 Itim mb-3" id="reportImg" />
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-2 mb-4">
                                    <div class="d-grid gap-2">
                                        <a href="report.php" class="btn-lg btn-danger Promt text-center fs-5">ยกเลิก</a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-2 mb-4">
                                    <div class="d-grid gap-2">
                                        <input type="submit" class="btn-lg btn-success Promt text-center fs-5" value="เพิ่มรายงาน">
                                    </div>
                                </div>
                            </div>
                        </form>
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