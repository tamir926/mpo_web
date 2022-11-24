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
                            <p>Манай экспертүүдээс цаг сонгох захиалах боломжтой</p>
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
                                            <p><?=$experts["position"];?></p>
                                            <p><?=$experts["worked"];?></p>
                                        </div>
                                        <!-- .volunteers-content -->
                                        <div class="volunteers-social-icon">
                                            <ul class="social-icon">
                                                <li><a href="tel:<?=$experts["tel"];?>"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                                <li><a href="mailto:<?=$experts["email"];?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <button class="btn btn-success mb-10" data-bs-toggle="modal" data-bs-target="#expert_<?=$experts["id"];?>">Цаг захиалах</button>
                                        <!-- .volunteers-social-icon -->
                                    </div>
                                    <!-- .volunteers-items -->
                                </div>

                                <div class="modal" tabindex="-1" id="expert_<?=$experts["id"];?>">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Экспертийн цаг захиалах</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Эксперт <?=$experts["name"];?></h4>
                                            <p><?=$experts["experience"];?></p>
                                            <p><?=$experts["education"];?></p>
                                            <p class="text-danger">Төлбөр: <?=number_format($experts["fee"]);?>₮</p>
                                            <form action="expert_time" method="post" id="timeselect">
                                                <input type="hidden" name="expert" value="<?=$experts["id"];?>">
                                                <div class="row">        
                                                    <div class="col-lg-4">Таны нэр
                                                        <input type="text" name="cust_name" class="form-control p-1" required>
                                                    </div>
                                                    <div class="col-lg-4">Утас
                                                        <input type="text" name="cust_tel" class="form-control p-1" required>
                                                    </div>
                                                    <div class="col-lg-4">Имэйл
                                                        <input type="text" name="cust_email" class="form-control p-1" required>
                                                    </div>

                                                    <div class="col-lg-4">Өдөр сонгох
                                                        <input type="date" name="date" class="form-control" required>
                                                    </div>
                                                    <div class="col-lg-4">Цаг сонгох
                                                        <select class="form-control" name="time" required>
                                                            <option disabled>Цаг сонгох</option>
                                                            <option value="10:00-11:00">10:00-11:00</option>
                                                            <option value="11:00-12:00">11:00-12:00</option>
                                                            <option value="12:00-13:00">12:00-13:00</option>
                                                            <option value="14:00-15:00">14:00-15:00</option>
                                                            <option value="15:00-16:00">15:00-16:00</option>
                                                            <option value="16:00-17:00">16:00-17:00</option>
                                                            <option value="17:00-18:00">10:00-11:00</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <button class="btn btn-warning btn-sm" onclick="submit();">Цаг захиалах</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Хаах</button>
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
