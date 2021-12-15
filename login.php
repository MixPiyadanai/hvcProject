<!doctype html>
<html lang="en">

<?php 
require 'components/head.php';
?>

<body>
    <div class="container mt-5 pt-5">
        <div class="card scale-in-ver-top" style="box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;">
            <div class="card-header">
                <h2 class="Itim">BasicLab : OmniJob | Login</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7 col-sm-12 slit-in-vertical">
                        <form action="process/loginProcess.php" method="POST">
                            <div class="mb-3">
                                <label for="inputStudentID" class="form-label Promt">ชื่อผู้ใช้</label>
                                <input type="text" class="form-control Promt" id="inputStudentID" placeholder="รหัสประจำตัวนักศึกษา" name="studentID">
                            </div>
                            <div class="mb-3">
                                <label for="inputStudentPassword" class="form-label Promt">รหัสผ่าน</label>
                                <input type="password" class="form-control Promt" id="inputStudentPassword" placeholder="เลขบัตรประจำตัวประชาชน" name="studentPassword">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary Promt">เข้าสู่ระบบ</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block pt-5 slit-in-vertical">
                        <div class="row">
                            <div class="col">
                                <img src="http://it.cmtc.ac.th/web2017/photo/logo/2017/1513260726_1-org.png" class="img-fluid mx-auto d-block" alt="it logo" width="350px">
                            </div>

                        </div>
                        <div class="row mt-5 mb-3">
                            <div class="col">
                                <img src="components/images/cmtc.png" class="img-fluid mx-auto d-block" alt="it logo" width="150px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>