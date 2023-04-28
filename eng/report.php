<? require_once("../config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>

        <div class="submenu">
            <div class="container d-flex justify-content-between">
                <h3 class="text-black">Knowledge base</h3>
                <ul class="submenu-ul">
                    <li><a href="journals">Magazine</a></li>
                    <li><a href="library">Library</a></li>
                    <li><a href="podcast">Podcast</a></li>
                    <li class="active"><a href="report">Report</a></li>
                </ul>
            </div>
          
        </div>
        

        <section class="bg-upcoming-events mt-50">
            <div class="container">
                <div class="row">
                    <div class="upcoming-events">
                        <div class="row">
                            <?
                            $sql = "SELECT *FROM reports ORDER BY timestamp DESC";
                            $result= mysqli_query($conn,$sql);
                            while ($podcast = mysqli_fetch_array($result))
                            {
                                ?>
                                <div class="col-lg-4">
                                    <div class="event-items mb-20">
                                        <div class="event-img wrapper-img">
                                            <a href="<?=$podcast["youtube"];?>" data-rel="lightcase:myCollection">
                                                <img src="<?=$podcast["image"];?>" alt="video-icon" />
                                            </a>

                                            <!-- <a href="#"><img src="assets/images/podcast.jpg" alt="upcoming-events-img-1" class="img-responsive" /></a> -->
                                            <!-- .date-box -->
                                        </div>
                                        <!-- .event-img -->
                                        <div class="events-content">
                                            <div class="date"><?=substr($podcast["timestamp"],0,10);?></div>
                                            <h3><a href="<?=$podcast["youtube"];?>" data-rel="lightcase:myCollection"><?=$podcast["name"];?></a></h3>
                                            <p><?=$podcast["brief"];?></p>
                                        </div>
                                        <!-- .events-content -->
                                    </div>
                                    <!-- .events-items -->
                                </div>

                                <?
                            }
                            ?>
                            

                            

                            

                            
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
