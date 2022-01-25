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
    <div class="container pt-5 pe-5 ps-5 pb-5 container-shadow">
        <div class="card mb-0 scale-in-ver-top cardRounded">
            <div class="card-header">
                <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-user-plus"></i> เพิ่มผู้ใช้งาน </h3>
            </div>
            <div class="card-body p-3 pt-4 m-0">
                <div class="row">
                    <div class="col-12">
                        <form action="adminAddUser.php" method="GET">
                            <div class="input-group Promt">
                                <span class="input-group-text">รหัสนักศึกษา</span>
                                <input type="text" class="form-control" name="idFirst" placeholder="รหัสนักศึกษา (8 หลัก)" required maxlength="8">
                                <input type="text" class="form-control" name="userRow" placeholder="จำนวนนักเรียนที่ต้องการเพิ่ม" required>
                                <input type="submit" class="btn btn-primary" value="เพิ่มข้อมูล">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table Promt">
                                <thead>
                                    <tr>
                                        <th scope="col">รหัสนักศึกษา</th>
                                        <th scope="col">ชื่อจริง</th>
                                        <th scope="col">นามสกุล</th>
                                        <th scope="col">เลขบัตรประจำตัวประชาชน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="" method="GET">

                                        <?php
                                        if (isset($_GET["userRow"])) {
                                            $submitBtn = '<input type="submit" class="btn btn-primary mt-2" value="เพิ่มข้อมูล">';
                                        } else {
                                            $_GET["userRow"] = 0;
                                            $submitBtn = '';
                                        }
                                        for ($x = 1; $x <= $_GET["userRow"]; $x++) {
                                            $num_length = strlen((string)$x);
                                            $number = $x;
                                            $length = 3;
                                            $idLast3Digits = substr(str_repeat(0, $length) . $number, -$length);
                                            echo '
                                            <tr>
                                                <th scope="row">' . $_GET["idFirst"] . $idLast3Digits . '</th>
                                                <td><input type="text" name="firstName" placeholder="ชื่อจริง..." class="form-control" required></td>
                                                <td><input type="text" name="lastName" placeholder="นามสกุล..." class="form-control" required></td>
                                                <td><input type="text" name="thID" placeholder="เลขบัตรประจำตัวประชาชน" class="form-control" required maxlength="13"></td>
                                            </tr>';
                                        }
                                        
                                        ?>
                                        <?= $submitBtn;?>
                                    </form>
                                </tbody>
                            </table>
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