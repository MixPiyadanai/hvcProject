<?php
session_start();

if ($_SESSION["userID"] == NULL) {
    header("Location: login.php");
} else {
}
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
                <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-sticky-note"></i> รายงานฝึกงาน</h3>
            </div>
            <div class="card-body p-3 pt-4 m-0">
                <div class="row">
                    <!---
                    <div class="col-12 col-md-12 col-lg-2 mb-4">
                        <div class="d-grid gap-2">
                            <a href="addReport.php" class="btn-lg btn-primary Promt text-center fs-5">เพิ่มรายงานใหม่</a>
                        </div>
                    </div>
                    --->
                    <div class="col-12 col-md-12 col-lg-2 mb-4">
                        <div class="d-grid gap-2">
                            <a href="reportPrint.php" class="btn-lg btn-success Promt text-center fs-5">พิมพ์รายงาน</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col slit-in-vertical">
                        <table class="table table-bordered table-responsive Promt text-center fw-bold">
                            <caption>กดที่ช่องเพื่อแก้ไขรายงานในวันนั้น ๆ<br>และต้องเพิ่มรายงานก่อนเพิ่มรูปภาพ</caption>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="?reportOrder=1">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">1</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=2">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">2</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=3">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">3</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=4">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">4</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=5">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">5</p>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="?reportOrder=6">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">6</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=7">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">7</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=8">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">8</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=9">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">9</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=10">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">10</p>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="?reportOrder=11">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">11</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=12">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">12</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=13">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">13</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=14">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">14</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=15">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">15</p>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="?reportOrder=16">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">16</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=17">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">17</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=18">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">18</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=19">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">19</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=20">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">20</p>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="?reportOrder=21">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">21</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=22">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">22</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=23">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">23</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=24">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">24</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=25">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">25</p>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="?reportOrder=26">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">26</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=27">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">27</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=28">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">28</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=29">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">29</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?reportOrder=30">
                                            <div class="d-grid gap-2">
                                                <p class="btn btn-primary m-0">30</p>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                        if (isset($_GET["reportOrder"])) {
                            $commentTop = NULL;
                            $commentBot = NULL;
                            $getImgReportSQL = "SELECT * FROM `report` WHERE reportOrder = " . $_GET["reportOrder"] . " AND reportOwner = " . $_SESSION["userID"] . "";
                            $getImgReportQuery = mysqli_query($conn, $getImgReportSQL);
                            while ($imgInfo = $getImgReportQuery->fetch_assoc()) {
                                if ($imgInfo["reportImg"] == "noImg.png") {
                                    $ImageUrl = "noImg.png";
                                } else {
                                    $ImageUrl = $imgInfo["reportImg"];
                                }
                            }
                            $getReportInfoSQL = "SELECT * FROM `report` WHERE `reportOrder` = " . $_GET["reportOrder"] . " AND `reportOwner` = " . $_SESSION["userID"] . "";
                            $getReportInfoQuery = mysqli_query($conn, $getReportInfoSQL);
                            if ($getReportInfoQuery) {
                                while ($reportInfo = $getReportInfoQuery->fetch_assoc()) {
                                    $reportContent = $reportInfo["reportContent"];
                                    $reportDate = $reportInfo["reportDate"];
                                }
                            }
                        } else {
                            $commentTop = "<!---";
                            $commentBot = "--->";
                        }
                        if (isset($reportContent)) {
                        } else {
                            $reportContent = NULL;
                        }
                        ?>
                        <?= $commentTop ?>
                        <div class="row">
                            <div class="col">
                                <div class="card mb-5 scale-in-ver-top" style="box-shadow: rgba(207, 0, 0, 1) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset; border-radius:15px;">
                                    <div class="card-header">
                                        <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-sticky-note"></i> รายงานประจำวันที่ <?= $_GET["reportOrder"] ?></h3>
                                    </div>
                                    <div class="card-body p-3 m-0">
                                        <form action="process/addReportProcess.php" method="GET" class="Promt mb-3">
                                            <div class="form-floating mb-2">
                                                <textarea class="form-control fs-4" placeholder="เนื้อหาภายในวันนี้" id="floatingTextarea" style="height:250px" name="content"><?= $reportContent ?></textarea>
                                                <label for="floatingTextarea" class="pt-2">เนื้อหาวันนี้</label>
                                            </div>
                                            <input type="date" class="form-control mb-2" name="date" value="<?= $reportDate ?>">
                                            <input type="text" class="form-control mb-2" name="reportOrder" value="<?= $_GET["reportOrder"] ?>" hidden>
                                            <div class="d-grid gap-2">
                                                <input type="submit" class="btn-lg btn-primary" name="" value="แก้ไขรายงาน">
                                            </div>
                                        </form>

                                        <img src="uploads/<?= $ImageUrl ?>" class="img-thumbnail rounded mx-auto d-block" width="300px">
                                        <form enctype="multipart/form-data" action="upload.php" method="POST" class="Promt">
                                            <label class="form-label fs-3" for="fileToUpload">เพิ่มรูปภาพ</label>
                                            <input type="file" class="form-control fs-4 mb-2" name="uploaded_file" id="fileToUpload"></input><br />
                                            <div class="d-grid gap-2">
                                                <input type="submit" class="btn-lg btn-success Promt text-center fs-5" value="เพิ่มรูปภาพ"></input>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= $commentBot ?>
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