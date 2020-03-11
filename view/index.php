<?php require_once('security.php') ?>
<!DOCTYPE html>
<html lang="en">
<!--header-->
    <?php include('header.php')?>
<!--end header-->
<body id="page-top">
    <div>
        <div class="card">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col-2">
                        <img src="../assets/img/images.jpg" alt="...." width="80" height="90">
                    </div>
                    <div class="col-8 titre">
                        <div class="heur font-weight-bolder text-center" id="horloge"></div>
                        <p class="text-white text-center"><?php echo('Session '.$_SESSION['user']['prenom'].' '.$_SESSION['user']['nom']) ?></p>
                        <div class="marquee-rtl"><marquee id="defile" behavior="slide" direction="left" loop="1000" scrollamount="5" scrolldelay="1">PHARMACIE EN LIGNE</marquee></div>
                    </div>
                    <div class="col-2">
                        <img src="../assets/img/images.jpg" alt="...." width="80" height="90" class="float-right">
                    </div>
                </div>
            </div>
            <div class="card-body bg-dark">
                <div class="row cont collapsed">
                    <!--sidebar-->
                    <?php include('menu.php') ?>
                    <!--end sidebar-->
                    <div class="col-9" id="container">
                    </div>
                </div>
            </div>
            <!--footer-->
            <?php include('footer.php') ?>
            <!--end footer-->
        </div>
    </div>
    <!--script-->
        <?php include('script.php')?>
    <!--end script-->

</body>


</html>