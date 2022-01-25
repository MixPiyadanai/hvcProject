<?php
session_start();

if ($_SESSION["userID"] == NULL) {
    header("Location: login.php");
} else {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="print.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="icon" href="components/images/logo.png">
    <title>รายงานของ <?= $_SESSION["userName"] ?></title>
    <style>
        h2 {
            font-family: 'Sarabun', sans-serif;
            font-weight: bold;
            font-size: 20px;
        }

        p {
            font-family: 'Sarabun', sans-serif;
            font-weight: normal;
            font-size: 16px;
            text-align: justify;
            text-justify: inter-word;
            text-indent: 3.5em;
        }

        h3 {
            font-family: 'Sarabun', sans-serif;
            font-weight: bold;
            font-size: 16px;
        }

        h4 {
            font-family: 'Sarabun', sans-serif;
            font-weight: normal;
            font-size: 16px;
        }

        h5 {
            font-family: 'Sarabun', sans-serif;
            font-weight: normal;
            font-size: 16px;
            text-indent: 3.5em;
        }
    </style>
</head>
<?php
require 'connectDB.php';
$getUserInfoSQL = "SELECT * FROM `user` WHERE userID = " . $_SESSION["userID"];
$getUserInfoQuery = mysqli_query($conn, $getUserInfoSQL);
while ($userInfo = $getUserInfoQuery->fetch_assoc()) {
    $firstName = $userInfo["userFirstName"];
    $lastName = $userInfo["userLastName"];
    $sex = $userInfo["userSex"];
    $stdID = $userInfo["userName"];
}
if ($sex == "Male") {
    $prefix = "นาย";
} else {
    $prefix = "นางสาว";
}

$getInternSQL = "SELECT * FROM `reportintern` WHERE riOwner = " . $_SESSION["userID"];
$getInternQuery = mysqli_query($conn, $getInternSQL);
if ($getInternQuery->num_rows > 0) {
    while ($internInfo = $getInternQuery->fetch_assoc()) {
        $intern = $internInfo["riIntern"];
        $internLocation = $internInfo["riInternLocation"];
        $mentor = $internInfo["riMentor"];
        $periodStart = $internInfo["riPeriodStart"];
        $periodEnd = $internInfo["riPeriodEnd"];
        $term = $internInfo["riTerm"];
        $year = $internInfo["riYear"];
        $class = $internInfo["riClass"];
        $classYear = $internInfo["riClassYear"];
        $classGroup = $internInfo["riClassGroup"];
        $workEnvironment = $internInfo["riWorkEnvironment"];
    }
    $commentTop = NULL;
    $commentBottom = NULL;
    $form = NULL;
} else {
    $commentTop = "<!---";
    $commentBottom = "--->";
    $form = '
    <div class="row">
        <div class="col p-5">
            <h1 class="Promt">กรุณากรอกข้อมูลเพื่อทำการประกอบรายงาน</h1>
            <form action="process/addReportInternProcess.php" method="GET" class="m-5">
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="intern" placeholder="สถานที่ฝึกงาน" required>
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="internLocation" placeholder="ตำแหน่งสถานที่ฝึกงาน" required>
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="mentor" placeholder="อาจารย์ที่ปรึกษา" required>
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="periodStart" placeholder="วันที่เริ่มฝึกงาน เช่น 13 พฤษภาคม พ.ศ. 2562" required>
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="periodEnd" placeholder="วันสิ้นสุดการฝึกงาน เช่น 12 กรกฎาคม พ.ศ. 2562" required>
                <select class="form-select mb-3 border border-info border-3 fw-bold" name="term" required>
                    <option value="" selected>เทอม</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="year" placeholder="ปีการศึกษา" required>
                <select class="form-select mb-3 border border-info border-3 fw-bold" name="class" required>
                    <option value="" selected>ระดับชั้น</option>
                    <option value="ปวช.">ปวช.</option>
                    <option value="ปวส.">ปวส.</option>
                </select>
                <select class="form-select mb-3 border border-info border-3 fw-bold" name="classYear" required>
                    <option value="" selected>ชั้นปี</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="classGroup" placeholder="ห้อง" required>
                <div class="form-floating">
                    <textarea class="form-control mb-3 border border-info border-3 fw-bold" placeholder="สภาพการทำงานในระหว่างเวลาการฝึกงาน" id="floatingTextarea" name="workEnvironment" maxlength="512"></textarea>
                    <label for="floatingTextarea">สภาพการทำงานในระหว่างเวลาการฝึกงาน</label>
                </div>
                <input class="form-control mb-3 btn btn-primary" type="submit" value="ยืนยันข้อมูล" required>
            </form>
        </div>
    </div>
    ';
}

if (isset($_GET["edit"]) && $_GET["edit"] == "edit") {
    $commentTop = "<!---";
    $commentBottom = "--->";
    $form = '
    <div class="row">
        <div class="col p-5">
            <h1 class="Promt">กรุณากรอกข้อมูลเพื่อทำการประกอบรายงาน</h1>
            <form action="process/addReportInternProcess.php" method="GET" class="m-5">
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="intern" placeholder="สถานที่ฝึกงาน" required value="' . $intern . '">
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="internLocation" placeholder="ตำแหน่งสถานที่ฝึกงาน" required value="' . $internLocation . '">
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="mentor" placeholder="อาจารย์ที่ปรึกษา" required value="' . $mentor . '">
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="periodStart" placeholder="วันที่เริ่มฝึกงาน เช่น 13 พฤษภาคม พ.ศ. 2562" required value="' . $periodStart . '">
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="periodEnd" placeholder="วันสิ้นสุดการฝึกงาน เช่น 12 กรกฎาคม พ.ศ. 2562" required value="' . $periodEnd . '">
                <select class="form-select mb-3 border border-info border-3 fw-bold" name="term" required>
                    <option value="" selected>เทอม</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="year" placeholder="ปีการศึกษา" required value="' . $year . '">
                <select class="form-select mb-3 border border-info border-3 fw-bold" name="class" required>
                    <option value="" selected>ระดับชั้น</option>
                    <option value="ปวช.">ปวช.</option>
                    <option value="ปวส.">ปวส.</option>
                </select>
                <select class="form-select mb-3 border border-info border-3 fw-bold" name="classYear" required>
                    <option value="" selected>ชั้นปี</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <input class="form-control mb-3 border border-info border-3 fw-bold" type="text" name="classGroup" placeholder="ห้อง" required value="' . $classGroup . '">
                <div class="form-floating">
                    <textarea class="form-control mb-3 border border-info border-3 fw-bold" style="height: 200px" id="floatingTextarea" name="workEnvironment" maxlength="512">' . $workEnvironment . '</textarea>
                    <label for="floatingTextarea">สภาพการทำงานในระหว่างเวลาการฝึกงาน</label>
                </div>
                <input class="form-control mb-3 btn btn-primary" type="submit" value="ยืนยันข้อมูล" required>
            </form>
        </div>
    </div>
    ';
} else {
}
?>

<body>
    <div class="container-fluid">

        <?= $form ?>
        <?= $commentTop ?>
        <div class="row">
            <div class="col p-0 pt-4">
                <img src="components/images/cmtc.png" class="rounded mx-auto d-block mb-1 mt-5" height="144px">
                <h2 class="text-center fs-5 mb-5">รายงานการฝึกงาน</h2>
                <h2 class="text-center fs-5 mb-5 pt-4">จัดทำโดย</h2>
                <h2 class="text-center fs-5 mb-5 pt-4"><?= $prefix . " " . $firstName . " " . $lastName ?></h2>

                <h2 class="text-center fs-5 pt-4">สถานที่ฝึกงาน <?= $intern ?></h2>
                <h2 class="text-center fs-5">ผู้ควบคุมดูแล <?= $mentor ?></h2>
                <h2 class="text-center fs-5 mb-5">ช่วงระยะเวลาฝึกงาน <?= $periodStart ?> ถึง <?= $periodEnd ?></h2>
                <h2 class="text-center fs-5 pt-4">รายงานฉบับนี้เป็นส่วนหนึ่งของวิชาฝึกงาน</h2>
                <h2 class="text-center fs-5">ประจำภาคเรียนที่ <?= $term ?> ปีการศึกษา <?= $year ?></h2>
                <h2 class="text-center fs-5 mb-5">รหัสวิชา 2901-8001 </h2>
                <h2 class="text-center fs-5 pt-4">คณะเทคโนโลยีสารสนเทศและการสื่อสาร</h2>
                <h2 class="text-center fs-5">สาขาวิชาเทคโนโลยีสารสนเทศและการสื่อสาร</h2>
                <h2 class="text-center fs-5">วิทยาลัยเทคนิคเชียงใหม่</h2>
                <h2 class="text-center fs-5 mb-5">ประจำภาคเรียนที่ <?= $term ?> ปีการศึกษา <?= $year ?></h2>
            </div>
        </div>

        <div class="row pt-5 mb-5">
            <div class="col p-0 pt-5">
                <h2 class="text-center fs-5 mb-5" style="margin-top:150px;padding-top:50px">จัดทำโดย</h2>
                <h2 class="text-center fs-5 pt-5"><?= $prefix . " " . $firstName . " " . $lastName ?></h2>
                <h2 class="text-center fs-5 ">รหัสนักศึกษา <?= $stdID ?> ระดับ <?= $class ?> ปีที่ <?= $classYear ?></h2>
                <h2 class="text-center fs-5 mb-5 ">กลุ่ม <?= $classGroup ?> แผนกวิชาช่าง/สาขางาน เทคโนโลยีสารสนเทศ</h2>
                <h2 class="text-center fs-5 pt-5 ">สถานที่ฝึกงาน <?= $intern ?></h2>
                <h2 class="text-center fs-5 ">ผู้ควบคุมดูแล <?= $mentor ?></h2>
                <h2 class="text-center fs-5 mb-5">ช่วงระยะเวลาฝึกงาน <?= $periodStart ?> ถึง <?= $periodEnd ?></h2>
                <h2 class="text-center fs-5 pt-5">รายงานฉบับนี้เป็นส่วนหนึ่งของวิชาฝึกงาน</h2>
                <h2 class="text-center fs-5 mb-5">ประจำภาคเรียนที่ <?= $term ?> ปีการศึกษา <?= $year ?> รหัสวิชา 2901-8001 </h2>
                <h2 class="text-center fs-5 pt-5">คณะ เทคโนโลยีสารสนเทศ และ การสื่อสาร</h2>
                <h2 class="text-center fs-5">สาขาวิชา เทคโนโลยีสารสนเทศ และ การสื่อสาร</h2>
                <h2 class="text-center fs-5">วิทยาลัยเทคนิคเชียงใหม่</h2>
                <h2 class="text-center fs-5">ประจำภาคเรียนที่ <?= $term ?> ปีการศึกษา <?= $year ?></h2>
            </div>
        </div>

        <?php
        if ($class = "ปวช.") {
            $fullClass = "ประกาศนียบัตรวิชาชีพ (ปวช.)";
        } else if ($class = "ปวส.") {
            $fullClass = "ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)";
        }
        ?>
        <div class="row pt-5">
            <div class="col p-0 pt-5">
                <h2 class="text-center fw-bold fs-5 mb-5" style="margin-top:150px;padding-top:60px">คำนำ</h2>
                <p class="text-start ps-5 pe-5 ms-5 me-5">
                    รายงานการฝึกประสบการณ์วิชาชีพเล่มนี้เป็นส่วนหนึ่งของการฝึกประสบการณ์วิชาชีพในสถานประกอบการ <?= $intern ?>
                    ของนักศึกษาระดับ<?= $fullClass ?> แผนกวิชาเทคโนโลยีสารสนเทศ สาขางานเทคโนโลยีสารสนเทศ ในภาคเรียนที่ <?= $term ?> ปีการศึกษา <?= $year ?>
                </p>
                <p class="text-start ps-5 pe-5 ms-5 me-5">
                    รายงานการฝึกประสบการณ์วิชาชีพเล่มนี้มีจุดมุ่งหมาย เพื่อเป็นการรวบรวมข้อมูลต่าง ๆ ที่เกี่ยวกับการฝึกประสบการณ์วิชาชีพในสถานประกอบการ บริษัท <?= $intern ?> ตลอดระยะเวลาการฝึกงานภายนอกสถานศึกษา โดยข้าพเจ้าได้เริ่มฝึกประสบการณ์วิชาชีพตั้งแต่วันที่ <?= $periodStart ?> จนถึง วันที่ <?= $periodEnd ?>
                </p>
                <p class="text-start ps-5 pe-5 ms-5 me-5">
                    ดังนั้นทางผู้จัดทำหวังเป็นอย่างยิ่งว่ารายงานการฝึกประสบการณ์วิชาชีพเล่มนี้คงเป็นประโยชน์สำหรับผู้ที่สนใจ ถ้าในรายงานเล่มนี้มีส่วนผิดพลาดประการใดทางผู้จัดทำขออภัยมา ณ ที่นี้ด้วย
                </p>
                <p class="text-end ps-5 pe-5 ms-5 me-5">
                    ผู้จัดทำ<br>
                    <?= $firstName . " " . $lastName ?>
                </p>

            </div>
        </div>
        <div class="row pt-5">
            <div class="col p-0 pt-5">
                <h2 class="text-center fw-bold fs-5" style="margin-top:150px;padding-top:460px">บทที่ 1</h2>
                <h2 class="text-center fw-bold fs-5 mb-3">บทนำ</h2>
                <h4 class="text-start ps-5 pe-5 ms-5 me-5">
                    ความเป็นมาและความสำคัญของการฝึกงาน
                </h4>
                <p class="text-start ps-5 pe-5 ms-5 me-5 mb-4">
                    การฝึกงาน หมายถึง กระบวนการเพิ่มทักษะและประสบการณ์ที่เป็นประโยชน์แก่การประกอบอาชีพ ช่วยให้นักเรียนมีความรู้ ความเข้าใจในการปฏิบัติงานจริง ทั้งในสถานประกอบการและการประกอบอาชีพอิสระ นักเรียนมีโอกาสได้ใช้เครื่องมือใหม่ๆในวงการธุรกิจ ตลอดจนทราบถึงขั้นตอนการปฏิบัติงานและเทคนิคการทำงาน สามารถเห็นวิธีการสร้างสรรค์ ผลผลิตที่มีประสิทธิภาพ นอกจากนั้น ยังสร้างความเชื่อมั่นและเจตนคติที่ดีต่อวิชาชีพ และให้นักเรียนฝึกงานทำงานร่วมกับผู้อื่น ที่สำคัญเป็นการเสริมสร้างสมรรถภาพในการประกอบอาชีพในอนาคตต่อไป
                </p>

                <h3 class="text-start ps-5 pe-5 ms-5 me-5">
                    1.1 วัตถุประสงค์ของการฝึกงาน
                </h3>
                <h5 class="text-start ps-5 pe-5 ms-5 me-5">
                    1.1.1 เรียนรู้การประกอบคอมพิวเตอร์ และเข้ารับรู้อุปกรณ์ที่เสียหาย
                </h5>
                <h5 class="text-start ps-5 pe-5 ms-5 me-5">
                    1.1.2 เพื่อที่จะนำความรู้ความเข้าใจใน อุปกรณ์ฮาร์ทแวร์ และ ซอฟแวร์ ไปพัฒนาและไปประยุกต์ใช้ได้ในชีวิตจริง
                </h5>
                <h5 class="text-start ps-5 pe-5 ms-5 me-5">
                    1.1.3 ได้รับการทราบถึงปัญหาต่าง ๆ ที่เกิดขึ้นในขณะนั้น และสามารถใช้สติปัญญาแก้ไขปัญหาได้อย่างมีเหตุผล
                </h5>
                <h5 class="text-start ps-5 pe-5 ms-5 me-5">
                    1.1.4 เพิ่มทักษะสร้างเสริมประสบการณ์ และพัฒนาวิชาชีพตามสภาพตามความเป็นจริงในสถานประกอบการ
                </h5>
                <h5 class="text-start ps-5 pe-5 ms-5 me-5 mb-4">
                    1.1.5 เพื่อฝึกฝนตนเองให้มีความรับผิดชอบต่อหน้าที่ เคารพระเบียบวินัยและทำงานร่วมกับผู้อื่นได้อย่างมีประสิทธิภาพ
                </h5>

                <h3 class="text-start ps-5 pe-5 ms-5 me-5">
                    1.2 ช่วงเวลาในการฝึกงาน
                </h3>
                <h5 class="text-start ps-5 pe-5 ms-5 me-5 mb-4">
                    เข้ารับการฝึกงานตั้งแต่ <?= $periodStart ?> ถึง <?= $periodEnd ?>
                </h5>

                <h3 class="text-start ps-5 pe-5 ms-5 me-5">
                    1.3 สภาพการทำงานในระหว่างเวลาการฝึกงาน
                </h3>
                <h5 class="text-start ps-5 pe-5 ms-5 me-5 mb-4">
                    <?= $workEnvironment ?>
                </h5>

                <h3 class="text-start ps-5 pe-5 ms-5 me-5">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    1.4 ผู้ควบคุมการฝึกงาน
                </h3>
                <h5 class="text-start ps-5 pe-5 ms-5 me-5 mb-4">
                    <?= $mentor . " ประจำสถานประกอบการ " . $intern ?>
                </h5>

                <h3 class="text-start ps-5 pe-5 ms-5 me-5">
                    1.5 สถานที่ฝึกงาน
                </h3>
                <h5 class="text-start ps-5 pe-5 ms-5 me-5 mb-4">
                    ที่ตั้ง <?= $internLocation ?>
                </h5>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col pt-5 ps-5 pe-5 ms-5 me-5 mb-4">
                <h2 class="text-center fw-bold fs-5" style="margin-top:450px;padding-top:460px">บทที่ 2</h2>
                <h2 class="text-center fw-bold fs-5 mb-3">ลักษณะงานที่ฝึก</h2>
                <h4 class="text-start ps-5 pe-5 ms-5 me-5">
                    ตารางที่ 2.1 แสดง ลักษณะงานที่ฝึกงาน
                </h4>
                <table class="table table-bordered p-0">
                    <thead>
                        <tr>
                            <th scope="col">วัน/เดือน/ปี</th>
                            <th scope="col">บันทึกรายงานการปฏิบัติงาน</th>
                            <th scope="col">รูปประกอบ    </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $getReportSQL = "SELECT * FROM `report` WHERE reportOwner = ".$_SESSION["userID"]." ORDER BY `report`.`reportDate` ASC";
                        $getReportQuery = mysqli_query($conn,$getReportSQL);
                        if ($getReportQuery->num_rows >= 1) {
                            while ($reportInfo = $getReportQuery->fetch_assoc()) {
                                echo "
                                <tr>
                                    <th>".$reportInfo["reportDate"]."</th>
                                    <td><h3>".$reportInfo["reportTitle"]."</h3><br><h4>".$reportInfo["reportContent"]."</h4></td>
                                    <td><img src='uploads/".$reportInfo["reportImg"]."' width='125px' class='rounded mx-auto d-block'></td>
                                </tr>
                                ";
                            }
                        } else {
                            $reportAlert = "ไม่พบรายงาน";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
        <?= $commentBottom ?>
    </div>

    <button class="btn btn-primary mb-5" type="botton" name="button" id="print" onclick="window.print()">ปริ้น</button>
    <a href="?edit=edit" id="print" class="btn btn-primary mb-5">แก้ไขรายงาน</a>
    <a href="report.php" id="print" class="btn btn-danger mb-5">กลับ</a>
</body>

</html>