<div class="card mb-5 scale-in-ver-top cardRounded">
    <div class="card-header">
        <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-search"></i> ค้นหาสถานประกอบการ</h3>
    </div>
    <div class="card-body p-3 m-0">
        <div class="row">
            <div class="col slit-in-vertical">
                <form>
                    <div class="row mb-3">
                        <div class="col-12 col-md-10">
                            <input type="text" class="form-control Promt searchKeyword fs-4" id="searchKeyword" placeholder="พิมพ์ค้นหา...">
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg Promt">ค้นหา</button>
                            </div>
                        </div>
                    </div>

                </form>
                <hr class="mb-0">
                <div class="row mb-3">
                <?php
                                    require "connectDB.php";
                                    $getInternSQL = "SELECT * FROM `internship` ORDER BY `internship`.`internID` DESC LIMIT 6";
                                    $getInternQuery = mysqli_query($conn, $getInternSQL);
                                    while ($InternInfo = $getInternQuery->fetch_assoc()) {
                                        echo '
                                        <div class="col-md-12 col-lg-6 mt-3 mb-3">
                                        <div class="card cardRounded">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-3 p-0 ps-3 d-flex align-items-center justify-content-center">
                                                        <img src="components/images/cmtc.png" class="img-fluid" alt="..." style="border-radius:15px 0px 0px 15px">
                                                    </div>
                                                    <div class="col-9 pe-3 pt-2" style="border-radius: 15px">
                                                        <h4 class="Itim">'. $InternInfo["internName"].'</h4>
                                                        <p class="fw-light fs-5">'. $InternInfo["internDesc"].'</p>
                                                        <hr>
                                                        <h6 class="Itim">ตำแหน่ง | พนักงานถูพื้น, ภารโรง</h6>
                                                        <div class="col mb-2">
                                                            <span class="badge rounded-pill bg-success Promt">พร้อมรับ</span>
                                                            <span class="badge rounded-pill bg-warning text-dark Promt">5 / 1</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        ';
                                    }
                                    mysqli_close($conn);
                                    ?>
                </div>

                <a href="internship.php?view=8" class="btn btn-primary btn-lg mx-auto d-block Promt">ดูทั้งหมด</a>
            </div>
        </div>
    </div>
</div>