<?php include "init.php"; ?>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo $img; ?>slider-image1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo $img; ?>slider-image2.jpg" alt="Second slide">
        </div>        
    </div>
</div>
<div class='box-cont'>
            <div class='container'>
                <div class='row'>
                    <div class='col-sm-3 box'>
                        <div class='row'>
                            <img class='col-sm-5' src="<?php echo $img; ?>grid-img3.png" alt="Not found :(" width="120px" height="100px">
                            <div class='col-sm-5'>
                                <h4>Patients</h4>
                                <p>Register & Book Appointment</p>
                                <a href="System/User Login.php">Click Here</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-3 box'>
                        <div class='row'>
                            <img class='col-sm-5' src="<?php echo $img; ?>grid-img1.png" alt="Not found :(" width="120px" height="100px">
                            <div class='col-sm-5'>
                                <h4>Doctors Login</h4>
                                <a href="System/Doctor/Doctor-login.php">Click Here</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-3 box'>
                        <div class='row'>
                            <img class='col-sm-5' src="<?php echo $img; ?>grid-img2.png" alt="Not found :(" width="120px" height="100px">
                            <div class='col-sm-5'>
                                <h4>Admin Login</h4>
                                <a href="System/Admin/Admin-login.php">Click Here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <footer class="page-footer font-small blue">
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="https://facebook.com/Kirolos.Yossef23" target="_blank"> SlowArrow</a>
            </div>
            <!-- Copyright -->
        </footer>
<?php include $tpl . "footer.php";
