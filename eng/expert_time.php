<? require_once("../config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>

        <div class="submenu">
            <div class="container d-flex justify-content-between">
                <h3 class="text-black">Training</h3>
                <ul class="submenu-ul">
                    <li><a href="training">Elementary</a></li>
                    <li><a href="training">Productivity</a></li>
                    <li><a href="training">Deepened</a></li>
                    <li><a href="experts">Experts</a></li>
                </ul>
            </div>
          
        </div>
             
        <!-- Start our volunteers Section -->
        <section class="bg-volunteers-section">
            <div class="container">
                <div class="row">
                    <div class="volunteers-option">
                        <div class="section-header">
                            <h2>Experts</h2>
                            <p>You can book an appointment with our experts</p>
                        </div>
                        <!-- .section-header -->
                        <div class="row">
                            <?
                            $expert = protect($_POST["expert"]);
                            $cust_name = protect($_POST["cust_name"]);
                            $cust_email = protect($_POST["cust_email"]);
                            $cust_tel = protect($_POST["cust_tel"]);
                            $date = protect($_POST["date"]);
                            $time = protect($_POST["time"]);
                            $sql = "INSERT INTO expert_time (expert,date,time,cust_name,cust_tel,cust_email) VALUES ('$expert','$date','$time','$cust_name','$cust_tel','$cust_email')";
                            if (mysqli_query($conn,$sql))
                                {
                                ?>
                                <div class="alert alert-success" role="alert">
                                    <div class="alert-body">
                                    Order request sent
                                    </div>
                                </div>
                                <?
                                }
                                else 
                                {
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        <div class="alert-body">
                                        An error occurred. <?=mysqli_error($conn);?>
                                        </div>
                                    </div>
                                    <?
                                }
                            ?>
                        
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .volume-option -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End our volunteers Section -->



        <? require_once("views/footer.php");?>


        <!-- Start Scrolling -->
        <div class="scroll-img"><i class="fa fa-angle-up" aria-hidden="true"></i></div>
        <!-- End Scrolling -->
    </div>

    <!-- Start Pre-Loader-->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>
    <!-- End Pre-Loader -->


    <script type="text/javascript" src="../assets/js/jquery-2.2.3.min.js"></script>
    <!-- <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>    <script type="text/javascript" src="../assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="../assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins.isotope.js"></script>
    <script type="text/javascript" src="../assets/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="../assets/js/lightcase.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.nstSlider.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="../assets/js/custom.isotope.js"></script>
    <script type="text/javascript" src="../assets/js/custom.map.js"></script>

    <script type="text/javascript" src="../assets/js/custom.js"></script>


</body>

</html>
