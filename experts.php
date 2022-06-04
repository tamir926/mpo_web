<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>

        <div class="submenu">
            <div class="container d-flex justify-content-between">
                <h3 class="text-black">Сургалт</h3>
                <ul class="submenu-ul">
                    <li><a href="training">Анхан шат</a></li>
                    <li><a href="training">Бүтээмж</a></li>
                    <li><a href="training">Гүнзгийрүүлсэн</a></li>
                    <li><a href="experts">Экспертүүд</a></li>
                </ul>
            </div>
          
        </div>
             
        <!-- Start our volunteers Section -->
        <section class="bg-volunteers-section">
            <div class="container">
                <div class="row">
                    <div class="volunteers-option">
                        <div class="section-header">
                            <h2>Экспертүүд</h2>
                            <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver ubiquitous leadership awesome skills.</p>
                        </div>
                        <!-- .section-header -->
                        <div class="row">
                            <?
                            $sql = "SELECT *FROM experts ORDER BY name";
                            $result = mysqli_query($conn,$sql);
                            while ($experts = mysqli_fetch_array($result))
                            {
                                ?>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="volunteers-items">
                                        <div class="volunteers-img">
                                            <img src="<?=$experts["avatar"];?>" alt="<?=$experts["name"];?>" class="img-responsive" />
                                        </div>
                                        <div class="volunteers-content">
                                            <h4><a href="#"><?=$experts["name"];?></a></h4>
                                            <p>Эксперт</p>
                                        </div>
                                        <!-- .volunteers-content -->
                                        <div class="volunteers-social-icon">
                                            <ul class="social-icon">
                                                <li><a href="tel:<?=$experts["tel"];?>"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                                <li><a href="mailto:<?=$experts["email"];?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <!-- .volunteers-social-icon -->
                                    </div>
                                    <!-- .volunteers-items -->
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


    <script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>
    <!-- <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>    <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins.isotope.js"></script>
    <script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="assets/js/lightcase.js"></script>
    <script type="text/javascript" src="assets/js/jquery.nstSlider.js"></script>
    <script type="text/javascript" src="assets/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/js/custom.isotope.js"></script>
    <script type="text/javascript" src="assets/js/custom.map.js"></script>

    <script type="text/javascript" src="assets/js/custom.js"></script>


</body>

</html>
