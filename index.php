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
        <?php
        require 'components/futuredInternship.php';
        ?>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <?php
                require 'components/newsCard.php';
                ?>
            </div>
            <div class="col-lg-4 col-md-12">
                <?php
                require 'components/userCard.php';
                ?>

            </div>
            <div class="col-12">
                <?php
                require 'components/browseInternship.php';
                ?>
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