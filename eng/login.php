<? require_once("../config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>

        <section>
            <div class="container text-center pt-100 pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mx-auto text-justify">
                        <div class="donate-form">
                            <form action="logining" method="POST" class="contact-form">
                                <div class="select-amount">
                                    <!-- .select-amount -->
                                    <div class="login-form">
                                        <h3>Login</h3>
                                        <p>If you are not registered with us <a href="register" class="mpo_a text-warning">Click here</a> please register.</p>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control mt-30" name="username" id="firstname" placeholder="Нэвтрэх нэр">
                                                </div>
                                                <!-- .form-group -->

                                                <div class="form-group">
                                                    <input type="password" class="form-control mt-30" name="password" id="password" placeholder="Нууц үг">
                                                </div>
                                                <!-- .form-group -->

                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-default w-100 mt-30" value="Login">
                                                </div>
                                                <!-- .form-group -->
                                            </div>
                                                                                        <!-- .col-lg-6 -->
                                        </div>
                                        <!-- .row -->
                                    </div>
                                </div>
                            </form>
                        </div>
                            
                    </div>
                </div>
                
            </div>
        </section>
        
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
