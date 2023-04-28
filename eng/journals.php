<? require_once("../config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>

<body>
    <div class="box-layout">
        <? require_once("views/header.php");?>
        
        <section class="bg-page-header" style="background-image: url('../assets/images/magazine_bg.jpg');">
            <div class="page-header-overlay">
                <div class="container">
                    <div class="row">
                        <div class="page-header">
                            <div class="page-title">
                                <h2>Magazine</h2>
                            </div>
                            <!-- .page-title -->
                            <div class="page-header-content">
                                <ol class="breadcrumb">
                                    <li><a href="index">Home page</a></li>
                                    <li>Magazine</li>
                                </ol>
                            </div>
                            <!-- .page-header-content -->
                        </div>
                        <!-- .page-header -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </div>
            <!-- .page-header-overlay -->
        </section>
        <!-- End Page Header Section -->


        <!-- Start Service Style2 Section -->
        <section class="bg-servicesstyle2-section">
            <div class="container">
                <div class="row">
                    <div class="our-services-option">                        
                        <div class="row">
                            <?
                            $sql = "SELECT *FROM magazine ORDER BY number DESC, date DESC";
                            $result= mysqli_query($conn,$sql);
                            while ($magazines = mysqli_fetch_array($result))
                            {
                                ?>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="our-services-box">
                                        <div class="our-services-items">
                                            <img src="<?=$magazines["image"];?>" class="w-100">
                                            <div class="our-services-content">
                                                <h4><a href="<?=$magazines["pdf"];?>" target="new"><?=$magazines["title"];?></a></h4>
                                                <p><?=$magazines["date"];?></p>
                                                <a href="<?=$magazines["pdf"];?>" target="new">Read<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?
                            }
                            ?>                            
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .our-services-option -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Service Style2 Section -->


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
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.waypoints.min.js"></script>
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
