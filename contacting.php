<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>


<body>
    <div class="box-layout">
        <? require_once("views/header.php");?>
        <div class="submenu">
            <div class="container d-flex justify-content-between">
                <h3 class="text-black">Холбоо барих</h3>
                <ul class="submenu-ul">
                    <li><a href="#">Хаяг байршил</a></li>
                    <li><a href="#">Нээлттэй ажлын байр</a></li>
                </ul>
            </div>
        </div>

        <!-- Start Page Header Section -->
        <section class="bg-page-header" style="background:url('assets/images/contact-bg.jpg'); background-size:cover;">
            <div class="page-header-overlay">
                <div class="container">
                    <div class="row">
                        <div class="page-header">
                            <div class="page-title">
                                <h2>Холбоо барих хэсэг</h2>
                            </div>
                            <!-- .page-title -->
                            <div class="page-header-content">
                                <ol class="breadcrumb">
                                    <li><a href="index">Нүүр хуудас</a></li>
                                    <li>Холбогдох</li>
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


        <!-- Start Contact us Section -->
        <section class="bg-contact-us">
            <div class="container">
                <div class="row">
                    <div class="contact-us">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3 class="contact-title">Cанал хүсэлт илгээх</h3>
                                <?
                                $name = protect($_POST["name"]);
                                $email = protect($_POST["email"]);
                                $tel = protect($_POST["tel"]);
                                $subject = protect($_POST["subject"]);
                                $message = protect($_POST["message"]);

                                $sql = "INSERT INTO feedback (title,content,name,contact,email) VALUES ('$subject','$message','$name','$tel','$email')";
                                if (mysqli_query($conn,$sql))
                                {
                                    ?>
                                    <div class="alert alert-success">
                                        Амжилттай илгээгдлээ.
                                    </div>
                                    <?
                                }
                                else 
                                {
                                    ?>
                                    <div class="alert alert-danger">
                                        Алдаа гарлаа
                                    </div>
                                    <?
                                }
                                ?>
                            </div>
                            <div class="col-lg-4">
                                <h3 class="contact-title">Contact Info</h3>
                                <ul class="contact-address">
                                    <li>
                                        <i class="flaticon-placeholder"></i>
                                        <div class="contact-content">
                                            <p><?=settings("address");?></p>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="flaticon-vibrating-phone"></i>
                                        <div class="contact-content">
                                            <p><?=settings("tel");?></p>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="flaticon-message"></i>
                                        <div class="contact-content">
                                            <p><?=settings("email");?></p>
                                        </div>
                                    </li>
                                </ul>                               
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .contact-us -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Contact us Section -->


        <!-- STart Maps Section -->
        <div id="map"></div>
        <!-- End Maps Section -->


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
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
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

    <!-- Map Api -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqVIkdttPNjl5c5hKlc_Hk3bfXQQlf2Rc&callback=initMap">


    </script>


</body>

</html>
