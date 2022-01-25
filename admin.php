<?php
session_start();

if ($_SESSION["userID"] == NULL) {
    header("Location: login.php");
} else {
}

if ($_SESSION["userRole"] == "Member") {
    header("Location: index.php");
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
        <div class="card mb-4 scale-in-ver-top cardRounded">
            <div class="card-header">
                <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-users-cog"></i> จัดการผู้ใช้</h3>
            </div>
            <div class="card-body p-3 pt-4 m-0">
                <div class="row">
                    <div class="col">
                        <a href="adminAddUser.php" class="btn btn-success Promt mb-2">เพิ่มผู้ใช้งาน</a>
                        <form>
                            <div class="row mb-3">
                                <div class="col-12 col-md-10">
                                    <select name="years" class="form-select form-select-lg mb-3 Promt">
                                        <option value="" selected>เลือกปีการศึกษา</option>
                                        <option value="64">64</option>
                                        <option value="63">63</option>
                                        <option value="62">62</option>
                                        <option value="61">61</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg Promt">ค้นหา</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">รหัสนักศึกษา</th>
                                        <th scope="col">ชื่อจริง</th>
                                        <th scope="col">นามสกุล</th>
                                        <th scope="col">เลขบัตรประจำตัวประชาชน</th>
                                        <th scope="col">บทบาท</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require 'connectDB.php';
                                    if (isset($_GET["years"])) {
                                    } else {
                                        $_GET["years"] = "Admin";
                                    }
                                    $getUserSQL = 'SELECT * FROM `user` WHERE `userName` LIKE "%' . $_GET["years"] . '%" ORDER BY `user`.`userName` ASC';
                                    $getUserQuery = mysqli_query($conn, $getUserSQL);
                                    if ($getUserQuery->num_rows >= 1) {
                                        while ($userInfo = $getUserQuery->fetch_assoc()) {
                                            $stdID = $userInfo["userName"];
                                            $firstName = $userInfo["userFirstName"];
                                            $lastName = $userInfo["userLastName"];
                                            $thID = $userInfo["userPassword"];
                                            $Role = $userInfo["userRole"];
                                            echo '
                                                <tr>
                                                    <th scope="row">' . $userInfo["userName"] . '</th>
                                                    <td>' . $userInfo["userFirstName"] . '</td>
                                                    <td>' . $userInfo["userLastName"] . '</td>
                                                    <td>' . $userInfo["userPassword"] . '</td>
                                                    <td>' . $userInfo["userRole"] . '</td>
                                                </tr>
                                                ';
                                        }
                                    } else {
                                        echo '
                                        <tr>
                                            <th scope="row">ไม่พบข้อมูล</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        ';
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary Promt" href="adminEdit.php?years=<?= $_GET["years"] ?>" role="button">แก้ไข</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="card mb-0 scale-in-ver-top cardRounded">
            <div class="card-header">
                <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-building"></i> จัดการสถานประกอบการ</h3>
            </div>
            <div class="card-body p-3 pt-4 m-0">
                <div class="row">
                    <div class="col">
                        <!-- Button trigger intern Modal -->
                        <button type="button" class="btn btn-success Promt mb-2" data-bs-toggle="modal" data-bs-target="#internFormModal">
                            เพิ่มสถานประกอบการ
                        </button>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">ที่ตั้ง</th>
                                        <th scope="col">แผนที่</th>
                                        <th scope="col">โทรศัพท์</th>
                                        <th scope="col">อีเมลล์</th>
                                        <th scope="col">เจ้าของ</th>
                                        <th scope="col">คำอธิบาย</th>
                                        <th scope="col">ปิด</th>
                                        <th scope="col">เปิด</th>
                                        <th scope="col">รูป</th>
                                        <th scope="col">MOU</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getInternSQL = "SELECT * FROM `internship`";
                                    $getinternQuery = mysqli_query($conn, $getInternSQL);
                                    while ($internInfo = $getinternQuery->fetch_assoc()) {
                                        $internName = $internInfo["internName"];
                                        $internLocation = $internInfo["internLocation"];
                                        $internMap = $internInfo["internMap"];
                                        $internPhone = $internInfo["internPhone"];
                                        $internEmail = $internInfo["internEmail"];
                                        $internOwner = $internInfo["internOwner"];
                                        $internDesc = $internInfo["internDesc"];
                                        $internClosed = $internInfo["internClosed"];
                                        $internOpen = $internInfo["internOpen"];
                                        $internImage = $internInfo["internImage"];
                                        $MOU = $internInfo["MOU"];
                                        echo '
                                        <tr>
                                            <th>' . $internName . '</th>
                                            <td><abbr title="' . $internLocation . '">Location</td>
                                            <td><abbr title="' . $internMap . '">Map</abbr></td>
                                            <td>' . $internPhone . '</td>
                                            <td>' . $internEmail . '</td>
                                            <td>' . $internOwner . '</td>
                                            <td><abbr title="' . $internDesc . '">Description</abbr></td>
                                            <td><abbr title="' . $internClosed . '">Closed</td>
                                            <td><abbr title="' . $internOpen . '">Open</td>
                                            <td>' . $internImage . '</td>
                                            <td>' . $MOU . '</td>
                                        </tr>
                                        ';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AddIntern Modal -->
    <div class="modal fade" id="internFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="internFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title Promt" id="internFormModalLabel">เพิ่มสถานประกอบการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="process/addInternProcess.php" enctype="multipart/form-data" method="GET">
                        <input type="text" class="form-control Promt mb-2" name="internName" placeholder="ชื่อสถานประกอบการ" required>
                        <input type="text" class="form-control Promt mb-2" name="internLocation" placeholder="ที่อยู่สถานประกอบการ" required>
                        <input type="text" class="form-control Promt mb-2" name="internMap" placeholder="แผนที่สถานประกอบการ" required>
                        <input type="text" class="form-control Promt mb-2" name="internPhone" placeholder="เบอร์ของสถานประกอบการ">
                        <input type="email" class="form-control Promt mb-2" name="internEmail" placeholder="อีเมลล์ของสถานประกอบการ">
                        <input type="text" class="form-control Promt mb-2" name="internOwner" placeholder="เจ้าของของสถานประกอบการ" required>
                        <div class="form-floating mb-2">
                            <textarea class="form-control fs-6 Promt" placeholder="คำอธิบายของสถานประกอบการ" id="floatingTextarea" style="height:150px" name="internDesc"></textarea>
                            <label for="floatingTextarea" class="pt-2 fs-6 Promt">คำอธิบายของสถานประกอบการ</label>
                        </div>
                        <input type="text" class="form-control Promt mb-2" name="internClosed" placeholder="เวลาปิดของสถานประกอบการ">
                        <input type="text" class="form-control Promt mb-2" name="internOpen" placeholder="เวลาเปิดของสถานประกอบการ">
                        <div class="form-check">
                            <input class="form-check-input" name="internMOU" type="checkbox" value="Yes" id="flexCheckDefault">
                            <label class="form-check-label Promt mb-2 fs-6" for="flexCheckDefault">
                                MOU
                            </label>
                        </div>
                        <input type="file" class="form-control fs-6 mb-2" name="uploaded_file" id="fileToUpload"></input><br />
                        <div class="d-grid gap-2">
                            <input type="submit" href="#" class="btn btn-primary Promt" value="เพิ่มข้อมูล"></input>
                        </div>
                    </form>
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