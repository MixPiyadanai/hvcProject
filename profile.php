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
    <div class="container pt-5 pe-5 ps-5" style="z-index:-1;box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;">
        <div class="card mb-5 scale-in-ver-top" style="z-index:-1;">
            <div class="card-header bg-white">
                <h3 class="Promt pt-2 fw-bold"> <i class="fas fa-users"></i> ข้อมูลบัญชีผู้ใช้</h3>
            </div>
            <div class="card-header">
                <div class="row pt-2">
                    <div class="col-md-2 col-sm-4 col-4" style="border-right: 2px solid #CF0000;">
                        <a href="#">
                            <p class="fw-bold text-center fs-5 mb-0 Promt">ข้อมูล</p>
                        </a>

                    </div>
                    <div class="col-md-2 col-sm-4 col-4" style="border-right: 2px solid #CF0000;">
                        <a href="#">
                            <p class="fw-bold text-center fs-5 mb-0 Promt">รายงาน</p>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 col-4 fw-bold text-center fs-5 mb-0 Promt">
                        <a href="#">
                            <p class="fw-bold text-center fs-5 mb-0 Promt">ตั้งค่า</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body" style="background-color: #EFEFEF;">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                        <img src="https://c.tenor.com/AbkJkB1pGr8AAAAC/hutao-money-rain.gif" class="mx-auto d-block" alt="..." width="100%" style="border-radius: 25%;border-width:3px; border-color:rgba(207, 0, 0, 1);border-style:solid">
                    </div>
                    <div class="col-lg-7 col-md-9 col-sm-8 col-8">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="Itim"><?= $_SESSION["userName"] ?></h2>
                            </div>
                            <div class="col-12">
                                <h2 class="Itim">แผนก เทคโนโลยีสารสนเทศ</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 p-3">
                        AAAAAAAAAx
                    </div>

                </div>
            </div>
            <div class="card-footer ">
                <h3 class="Promt pt-2 fw-bold"> <i class="fa fa-paperclip" aria-hidden="true"></i>
                    รายงานฝึกงาน</h3>
            </div>
            <div class="card-footer bg-white p-4">
                <div class="card reportCardRounded">
                    <div class="card-body">
                        <div class="row pt-3 pb-3">
                            <div class="col-12 col-md-2 hide-border-sm" style="border-right: 3px solid rgb(109, 109, 109);color:#000;">
                                <p class="text-center fw-bold fs-2 mb-0 Itim">9</p>
                                <p class="text-center fw-bold fs-3 Itim">Dec 2021</p>
                            </div>
                            <div class="col-12 col-md-10">
                                <p class="fw-bold fs-4 mb-0 Itim">Title</p>
                                <p class="fs-6 mb-0 Itim mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary Itim" type="button">แก้ไข</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card reportCardRounded">
                    <div class="card-body">
                        <div class="row pt-3 pb-3">
                            <div class="col-12 col-md-2 hide-border-sm" style="border-right: 3px solid rgb(109, 109, 109);color:#000;">
                                <p class="text-center fw-bold fs-2 mb-0 Itim">10</p>
                                <p class="text-center fw-bold fs-3 Itim">Dec 2021</p>
                            </div>
                            <div class="col-12 col-md-10">
                                <p class="fw-bold fs-4 mb-0 Itim">Title</p>
                                <p class="fs-6 mb-0 Itim mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary Itim" type="button">แก้ไข</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card reportCardRounded">
                    <div class="card-body">
                        <div class="row pt-3 pb-3">
                            <div class="col-12 col-md-2 hide-border-sm" style="border-right: 3px solid rgb(109, 109, 109);color:#000;">
                                <p class="text-center fw-bold fs-2 mb-0 Itim">11</p>
                                <p class="text-center fw-bold fs-3 Itim">Dec 2021</p>
                            </div>
                            <div class="col-12 col-md-10">
                                <p class="fw-bold fs-4 mb-0 Itim">Title</p>
                                <p class="fs-6 mb-0 Itim mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary Itim" type="button">แก้ไข</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn-lg btn-primary Itim" type="button">ดูรายงานเพิ่มเติม</button>
                </div>
            </div>
            <div id="setting" class="card-footer ">
                <h3 class="Promt pt-2 fw-bold"> <i class="fa fa-paperclip" aria-hidden="true"></i>
                    ตั้งค่า</h3>
            </div>
            <div class="card-footer bg-white p-4">
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