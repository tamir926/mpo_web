<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>

        <div class="submenu">
            <div class="container d-flex justify-content-between">
                <h3 class="text-black">Арга хэмжээ</h3>
                <ul class="submenu-ul">
                    <li><a href="#">Дотоод</a></li>
                    <li><a href="#">Гадаад</a></li>
                </ul>
            </div>
          
        </div>
        <div class="mt-30 pb-50">
        <div class="container">
            <section id="content">
                    <div class="event-info">
                            <h5>Таны</h5>
                            <h3>Сонголт...</h3>
                            <p>Хөгжилд хүрэх бүтээмжийн хязгааргүй <br> аянаа яг одоо эхлээрэй.</p>
                    </div>
            </section>
        </div>
        </div>

        <hr>

        

        <section class="bg-upcoming-events">
            <div class="container">
                <div class="row">
                    <div class="upcoming-events">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="event-items mb-20">
                                    <div class="event-img wrapper-img">
                                        <a href="#"><img src="assets/images/event1.jpg" alt="upcoming-events-img-1" class="img-responsive" /></a>
                                        <!-- .date-box -->
                                    </div>
                                    <!-- .event-img -->
                                    <div class="events-content">
                                        <div class="date">2022-02-01</div>
                                        <h3><a href="#">Бүтээмжийн ойлголт, зарчмууд</a></h3>
                                    </div>
                                    <!-- .events-content -->
                                </div>
                                <!-- .events-items -->
                            </div>
                            <!-- .col-lg-4 -->

                            <div class="col-lg-4">
                                <div class="event-items mb-20">
                                    <div class="event-img wrapper-img">
                                        <a href="#"><img src="assets/images/event1.jpg" alt="upcoming-events-img-1" class="img-responsive" /></a>
                                        <!-- .date-box -->
                                    </div>
                                    <!-- .event-img -->
                                    <div class="events-content">
                                        <div class="date">2022-02-01</div>
                                        <h3><a href="#">Бүтээмжийн ойлголт, зарчмууд</a></h3>
                                    </div>
                                    <!-- .events-content -->
                                </div>
                                <!-- .events-items -->
                            </div>
                            <!-- .col-lg-4 -->

                            <div class="col-lg-4">
                                <div class="event-items mb-20">
                                    <div class="event-img wrapper-img">
                                        <a href="#"><img src="assets/images/event1.jpg" alt="upcoming-events-img-1" class="img-responsive" /></a>
                                        <!-- .date-box -->
                                    </div>
                                    <!-- .event-img -->
                                    <div class="events-content">
                                        <div class="date">2022-02-01</div>
                                        <h3><a href="#">Бүтээмжийн ойлголт, зарчмууд</a></h3>
                                    </div>
                                    <!-- .events-content -->
                                </div>
                                <!-- .events-items -->
                            </div>
                            <!-- .col-lg-4 -->

                            <div class="col-lg-4">
                                <div class="event-items mb-20">
                                    <div class="event-img wrapper-img">
                                        <a href="#"><img src="assets/images/event1.jpg" alt="upcoming-events-img-1" class="img-responsive" /></a>
                                        <!-- .date-box -->
                                    </div>
                                    <!-- .event-img -->
                                    <div class="events-content">
                                        <div class="date">2022-02-01</div>
                                        <h3><a href="#">Бүтээмжийн ойлголт, зарчмууд</a></h3>
                                    </div>
                                    <!-- .events-content -->
                                </div>
                                <!-- .events-items -->
                            </div>
                            <!-- .col-lg-4 -->

                            <div class="col-lg-4">
                                <div class="event-items mb-20">
                                    <div class="event-img wrapper-img">
                                        <a href="#"><img src="assets/images/event1.jpg" alt="upcoming-events-img-1" class="img-responsive" /></a>
                                        <!-- .date-box -->
                                    </div>
                                    <!-- .event-img -->
                                    <div class="events-content">
                                        <div class="date">2022-02-01</div>
                                        <h3><a href="#">Бүтээмжийн ойлголт, зарчмууд</a></h3>
                                    </div>
                                    <!-- .events-content -->
                                </div>
                                <!-- .events-items -->
                            </div>
                            <!-- .col-lg-4 -->

                            <div class="col-lg-4">
                                <div class="event-items mb-20">
                                    <div class="event-img wrapper-img">
                                        <a href="#"><img src="assets/images/event1.jpg" alt="upcoming-events-img-1" class="img-responsive" /></a>
                                        <!-- .date-box -->
                                    </div>
                                    <!-- .event-img -->
                                    <div class="events-content">
                                        <div class="date">2022-02-01</div>
                                        <h3><a href="#">Бүтээмжийн ойлголт, зарчмууд</a></h3>
                                    </div>
                                    <!-- .events-content -->
                                </div>
                                <!-- .events-items -->
                            </div>
                            <!-- .col-lg-4 -->

                            

                            
                        </div>
                        <!-- .row -->


                    </div>
                    <!-- .upcoming-events -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Upcoming Events Section -->
      



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
