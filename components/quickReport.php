<div class="card mb-5 scale-in-ver-top" style="box-shadow: rgba(207, 0, 0, 1) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset; border-radius:15px;">
    <div class="card-header">
        <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-sticky-note"></i> รายงานฝึกงาน</h3>
    </div>
    <div class="card-body p-3 m-0">
        <?php
        require 'connectDB.php';
        $getReportSQL = 'SELECT * FROM `report` WHERE reportOwner = ' . $_SESSION["userID"] . ' ORDER BY `report`.`reportDate` DESC LIMIT 2';
        $getReportQuery = mysqli_query($conn, $getReportSQL);

        if ($getReportQuery->num_rows > 0) {
            while ($reportInfo = $getReportQuery->fetch_assoc()) {
                $date = date_create($reportInfo["reportDate"]);
                $dateFormated = date_format($date, "d/m/Y");
                if ($reportInfo["reportImg"] == NULL) {
                    $reportImage = "noImg.png";
                } else {
                    $reportImage = $reportInfo["reportImg"];
                }
                echo '
                                <div class="card reportCardRounded slit-in-vertical">
                                    <div class="card-body">
                                        <div class="row pt-3 pb-3">
                                            <div class="col-12 col-md-2 hide-border-sm" style="border-right: 3px solid rgb(109, 109, 109);color:#000;">
                                                <p class="text-center fw-bold fs-4 mb-0 Promt">' . $dateFormated . '</p>
                                            </div>
                                            <div class="col-12 col-md-2 hide-border-sm" style="border-right: 3px solid rgb(109, 109, 109);color:#000;">
                                            <img src="uploads/' . $reportInfo["reportImg"] . '" class="img-thumbnail">
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <p class="fs-6 mb-0 Promt mb-1">' . $reportInfo["reportContent"] . '</p>
                                                <div class="form-text">
                                                Last Edit: ' . $reportInfo["reportLastEdit"] . '
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
            }
        } else {
        }
        ?>
        <div class="d-grid gap-2">
            <a href="report.php" class="btn-lg btn-primary Promt text-center">ดูรายงานเพิ่มเติม</a>
        </div>
    </div>
</div>