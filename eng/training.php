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
                    <?
                    $sql = "SELECT *FROM courses_category";
                    $result = mysqli_query($conn,$sql);
                    while ($data = mysqli_fetch_array($result))
                    {
                        ?>
                            <li><a href="training?category=<?=$data["id"];?>"><?=$data["name"];?></a></li>
                        <?
                    }
                    ?>                    
                    <li><a href="experts">Experts</a></li>
                </ul>
            </div>
          
        </div>
        <div class="mt-30 pb-50">
            <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <?
                                if (isset($_GET["category"]))
                                $category_id = $_GET["category"];
                                else $category_id = 1;

                                $sql = "SELECT *FROM courses_category WHERE id='$category_id'";
                                $result = mysqli_query($conn,$sql);
                                $data = mysqli_fetch_array($result);
                                $category_name = $data["name"];
                                ?>
                                <h1><?=$category_name;?></h1>
                            </div>
                        </div>
                    
                    </div>
            </section>
        </div>

        <hr>

        

        <section class="bg-upcoming-events">
            <div class="container">
                <div class="row">
                    <div class="upcoming-events">
                        <div class="row">
                            <?
                            $sql = "SELECT *FROM courses WHERE category='$category_id'";
                            $result = mysqli_query($conn,$sql);
                            while ($courses = mysqli_fetch_array($result))
                            {
                                ?>
                                <div class="col-lg-4">
                                    <div class="event<?=($category_id>1)?$category_id:'';?>-items">
                                        <div class="event<?=($category_id>1)?$category_id:'';?>-img wrapper-img">
                                            <a href="#"><img src="<?=$courses["image"];?>" alt="upcoming-events-img-1" class="img-responsive" /></a>
                                            <div class="date-box">
                                                <h5> <i class="fa fa-clock-o" aria-hidden="true"></i> <?=$courses["duration"];?>h / <i class="fa fa-user" aria-hidden="true"></i> <?=$courses["participants"];?> people</h5>
                                            </div>
                                        </div>
                                        <div class="events-content">
                                            <h3><a href="#" data-bs-toggle="modal" data-bs-target="#modal_id_<?=$courses["id"];?>"><?=$courses["title"];?></a></h3>
                                            <p><?=$courses["brief"];?></p>
                                            <a href="#" class="btn btn-success btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#modal_id_<?=$courses["id"];?>">Details</a>
                                        </div>
                                    </div>
                                    
                                    <div class="modal fade" id="modal_id_<?=$courses["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?=$courses["title"];?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?=$courses["content"];?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?
                            }
                            ?>                        
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
