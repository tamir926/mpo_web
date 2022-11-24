<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>

        <section>
            <div class="container text-center pt-100 pb-100">
                <div class="row">
                    <div class="col-8 mx-auto text-justify">
                        <img src="assets/images/abb_logo.png" class="mt-50">
                        <?
                        $sql = "SELECT *FROM pages WHERE page_id=11";
                        $result = mysqli_query($conn,$sql);
                        $page = mysqli_fetch_array($result);
                        ?>
                        <!-- <h6 class="green">МБТББ</h6> -->
                        <h2 class="text-black"><?=$page["name"];?></h2>
                        <p class="text-justify"><?=$page["content"];?></p>

                        <div class="pt-50">
                            <a class="btn btn-warning" href="https://www.apo-tokyo.org/" target="new">АББ ҮНДСЭН ВЕБСАЙТ</a>
                            <a class="btn btn-warning" href="https://www.apo-tokyo.org/wedo/projects/annual-programs/" target="new">АББ ХӨТӨЛБӨР</a>
                            <a class="btn btn-warning" href="abb_join">МЭРГЭЖИЛТЭН БОЛОХ</a>
                            <a class="btn btn-warning" href="pdfs/apo_vision_2025.pdf">AББ алсын хараа 2025</a>

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
