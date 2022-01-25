<?php
session_start();

if ($_SESSION["userID"] == NULL) {
    header("Location: login.php");
} else {
}

if ($_SESSION["userRole"] == "Member") {
    header("Location: index.php");
}

if (isset($_GET["status"]) && $_GET["status"] == "success") {
    $badge = '<span class="badge bg-success">แก้ไขสำเร็จ</span>';
} else if (!isset($_GET["status"])) {
    $badge = "";
} else if (isset($_GET["status"]) && $_GET["status"] == "fail") {
    $badge = '<span class="badge bg-danger">แก้ไขไม่สำเร็จ</span>';
} else if (isset($_GET["status"]) && $_GET["status"] == "deleted") {
    $badge = '<span class="badge bg-success">ลบผู้ใช้สำเร็จ</span>';
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
            <div class="card-header bg-warning">
                <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-users-cog"></i> แก้ไข <?= $badge ?></h3>
            </div>
            <div class="card-body p-3 pt-4 m-0">
                <div class="row">
                    <div class="col">
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
                                        <th scope="col">#</th>
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
                                    while ($userInfo = $getUserQuery->fetch_assoc()) {
                                        $editUserID = $userInfo["userID"];
                                        $stdID = $userInfo["userName"];
                                        $firstName = $userInfo["userFirstName"];
                                        $lastName = $userInfo["userLastName"];
                                        $thID = $userInfo["userPassword"];
                                        $Role = $userInfo["userRole"];
                                        if ($Role == "Member") {
                                            $selected = "";
                                        } else {
                                            $selected = "selected";
                                        }

                                        echo '
                                        <form action="process/adminEditProcess.php" method="GET">
                                            <tr>
                                                <th scope="row"><input type="text" class="form-control" name="stdID" value="' . $stdID . '"> </th>
                                                <td><input type="text" class="form-control" name="firstName" value="' . $firstName . '"></td>
                                                <td><input type="text" class="form-control" name="lastName" value="' . $lastName . '"></td>
                                                <td><input type="text" class="form-control" name="thID" value="' . $thID . '"></td>
                                                <td>

                                                    <select name="role" class="form-select form-select Promt">
                                                        <option value="Member">Member</option>
                                                        <option ' . $selected . ' value="Admin">Admin</option>
                                                    </select>
                                                </td>
                                                <td>
                                                <input type="text" class="form-control" name="userID" value="' . $editUserID . '" hidden>
                                                <input type="text" class="form-control" name="years" value="' . $_GET["years"] . '" hidden>
                                                    <input type="submit" class="form-control btn btn-primary mb-1" name="edit" value="แก้ไข">
                                                    <input type="submit" class="form-control btn btn-danger" name="edit" value="ลบ">
                                                </td>
                                            </tr>
                                        </form>
                                        ';
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary Promt" href="admin.php?years=<?= $_GET["years"] ?>">กลับ</a>
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