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
                    <div class="col-12 col-md-12 col-lg-2 mb-4">
                        <div class="d-grid gap-2">
                            <a href="addReport.php" class="btn-lg btn-primary Promt text-center fs-5">เพิ่มรายงานใหม่</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-2 mb-4">
                        <div class="d-grid gap-2">
                            <a href=# class="btn-lg btn-success Promt text-center fs-5">พิมพ์รายงาน</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col slit-in-vertical">
                        <?php
                        require 'connectDB.php';
                        $getReportSQL = 'SELECT * FROM `report` WHERE reportOwner = ' . $_SESSION["userID"] . ' ORDER BY `report`.`reportDate` DESC';
                        $getReportQuery = mysqli_query($conn, $getReportSQL);

                        if ($getReportQuery->num_rows > 0) {
                            $alert = NULL;
                            while ($reportInfo = $getReportQuery->fetch_assoc()) {
                                $date = date_create($reportInfo["reportDate"]);
                                $dateFormated = date_format($date, "d/m/Y");
                                echo '
                                <div class="card reportCardRounded">
                                    <div class="card-body">
                                        <div class="row pt-3 pb-3">
                                            <div class="col-12 col-md-2 hide-border-sm" style="border-right: 3px solid rgb(109, 109, 109);color:#000;">
                                                <p class="text-center fw-bold fs-3 mb-0 Itim">' . $dateFormated . '</p>
                                            </div>
                                            <div class="col-12 col-md-2 hide-border-sm" style="border-right: 3px solid rgb(109, 109, 109);color:#000;">
                                            <img src="components/images/noImg.png" class="img-thumbnail">
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <p class="fw-bold fs-4 mb-0 Itim">' . $reportInfo["reportTitle"] . '</p>
                                                <p class="fs-6 mb-0 Itim mb-1">' . $reportInfo["reportContent"] . '</p>
                                                <div class="form-text">
                                                Last Edit: ' . $reportInfo["reportLastEdit"] . '
                                                </div>
                                                <form action="editReport.php">
                                                    <div class="d-grid gap-2">
                                                        <input type="text" value="'.$reportInfo["reportID"].'" hidden name="reportID">
                                                        <input type="submit" class="btn btn-primary Itim" value="แก้ไข">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                        } else {
                            $alert = "ไม่พบข้อมูลรายงาน...<br>มาเพิ่มรายงานแรกกันเถอะ";
                        }
                        ?>
                        <p class="fw-bold Itim fs-1 text-center"><?= $alert ?></p>

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