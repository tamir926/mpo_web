<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>

        <li><i class="fa fa-arrow-left" aria-hidden="true"><a href="mbtbb.php">Буцах</a></li></i>
        <section>
        <div class="container">
                <div class="row">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="single-team-img">
                                    <img src="assets/images/team/single-team-img-1.jpg" class="img-responsive" />
                                </div>
                                <!-- .single-team-img -->
                            </div>
                            <!-- .col-md-5 -->
                            <div class="col-md-5">
                                <div class="container gray-bg pt-50 pb-50 jambotron">
                                    <h4>Лозол Оюун</h4>
                                    <h5>Баталгаажсан бүтээмжийн мэргэжилтэн</h5>
                                    <!-- .team-address-box -->
                                    <div class="team-address-box">
                                            <li>
                                            <i class="fa fa-list-ol" aria-hidden="true"></i>
                                                <span>Сертификат №: PS000009</span>
                                                </li>
                                            <li>
                                            <li>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <span>хүчэнтэй хугацаа: 2021-02/2024-02</span>
                                                </li>
                                            <li>
                                            <li>
                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                <span>Монгол улсын Их Сургууль Хууль зүйн сургууль Бакалавр 1994/1996</span>
                                                </li>
                                            <li>
                                                <i class="fa fa-home" aria-hidden="true"></i>
                                                <span>Улаанбаатар хот СХД</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                                <span>Төрсөн он: 1972</span>
                                            </li>
                                            <li>
                                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                                <span>Салбарын туршлага: Дижитал бүтээмж, Хувийн эрүүл мэндийн үйлчилгээ, Цахилгаан, цахилгаан бараа, Хими, Аялал жуучлал,Жижиглэнгийн худалдаа, хоол хүнс, ундаа, Мэргэжлийн үйлчилгээ</span>
                                            </li>
                                            <li>
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                            <a href="certificate.php">сертификатыг татаж авах</a>>
                                            </li>
                                        </div>
                                    </div>
                                <!-- .single-team-content -->
                            </div>
                            <!-- .col-md-5 -->
                        </div>
                        <!-- .row -->
                </div>
                <!-- .row -->
            </div>
        </section>

        <ul>
        <section class="">
            <div class="container text-center pt-50 pb-50">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                    <i class="fa fa-comments-o" aria-hidden="true"><h4 class="text-black">Зөвлөх үйлчилгээний талбар</h4></i>
                        <p>Бизнесийн шинжилгээ</p>
                    </div>
                    <div class="col-lg-4  mx-auto">
                    <i class="fa fa-level-up" aria-hidden="true"><h4 class="text-black text-left">Бүтээмж дээшлүүлэх анхан шатны арга хэрэгсэл</h4></i>
                            <p>ICC (Шинэлэг, бүтээлч дугуйлан), Ажилтны саналын схем</p>
                            <p>Ажилчид-удирдлагын харилцаа,5с </p>
                    </div>
                    <div class="col-lg-4  mx-auto">
                    <i class="fa fa-level-up" aria-hidden="true"><h4 class="text-black">Бүтээмж дээшлүүлэх ахисан шатны хэрэгсэл</h4></i>
                        <p>ISO 9000, Тэнцвэртэй онооны карт, Хүний нөөцийн менежмент</p>
                        <p>Нийт чанарын удирдлага,Бүтэцлэгдсэн OJT</p>
                    </div>
                </div>
            </div>
        </section>
        </ul>

        <section class="bg-green pt-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                            <img src="assets/images/image2.PNG" alt="MPO" class="img-responsive" />
                    </div>
                    <div class="col-lg-5 pt-50">  
                        <div class="d-flex justify-content-between">
                            <div >
                                <h1 class="text-white">Бүртгүүлнэ үү.</h1>
                                <p class="text-white">Бидэнтэй нэгдхийг хүсвэл</p>
                            </div>
                            <div>
                                <a href="register.php" class="btn btn-lg btn-default-2">Бүртгүүлэх</a>
                                <a href="login.php" class="btn btn-lg btn-default-2">Нэвтрэх</a>
                            </div>
                        </div>
                    </div>
                    <!-- .col-lg-8 -->
                    
                    <!-- .col-md-4 -->
                </div>
            </div>
            <!-- .container -->
        </section>
        <!-- End About Greenforest Section -->

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