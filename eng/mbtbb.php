<? require_once("../config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>

        <section>
            <div class="container text-center pt-100 pb-100">
                <div class="row">
                    <div class="col-8 mx-auto text-justify">
                        <img src="assets/images/logos.jpg" class="mt-50">
                        <?
                        $sql = "SELECT *FROM pages WHERE page_id=1";
                        $result = mysqli_query($conn,$sql);
                        $page = mysqli_fetch_array($result);
                        ?>
                        <!-- <h6 class="green">МБТББ</h6> -->
                        <h2 class="text-black"><?=$page["name"];?></h2>
                        <p class="text-justify"><?=$page["content"];?></p>

                        <div class="pt-50">
                            <a class="btn btn-warning" href="assets/images/mbbtb_structure.png" data-rel="lightcase:myCollection">Structure</a>
                            <a class="btn btn-warning" href="assets/images/brochure1.jpg" data-rel="lightcase:brochure" >Brochure</a>
                            <a href="assets/images/brochure2.jpg" data-rel="lightcase:brochure"></a>
                            <a href="assets/images/uz.png" data-rel="lightcase:uz" class="btn btn-warning">Management Board</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        


        <section class="gray-bg">
            <div class="container text-center pt-50 pb-50">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <h4 class="text-black">Projects Purpose</h4>
                        <p>а. Certificaion the completency of an expert in implementing productivity improve solution and impovement projects</p>
                        <p>б. Dissenubation of soecialized knowledge/informat ion though factories and orgazanions to solve productivity improvement problems by providing training programs, coordination, guidance, and consulting services</p>
                    </div>
                    <div class="col-lg-4  mx-auto">
                        <h4 class="text-black">Signifation</h4>
                        <p>Individuals who meet the requirements will be awarded the certificate of "Certified Productivity Specialist" in accordance with the level and hierarchy og the productivity specialist, and will have the opportunity to improve their professional and bussiness prospects, connect with other productivity specialist , and participate in international projects of APO. In addition , certified PS will be recognized in member states with similar acceditation system of thw NPT. A ceritified PS will be registered as a word-class productivity professional on the MPOCB directory and the APO portal.</p>
                    </div>
                    <div class="col-lg-4  mx-auto">
                        <h4 class="text-black text-left">Type Of Certification</h4>
                        <p>MPOCB provides responsible Productivity Specialist Certification of Scheme on the 3 level: </p>
                            <p>1.  Certified Productivity Specialist attested of the APO</p>
                            <p>2.  Certified Senior Productivity Specialist attested of APO</p>
                            <p>3.  Certified Master Productivity Specialist</p>
                    </div>
                </div>
            </div>
        </section>

        
        <div class="container mt-20">
            <section id="content" class="pb-200 text-center">
                    <div class="content-info pb-200">
                            <h4 class="fw-100">How to become a Certification Professional?</h4>
                            <div class="banner-btn">
								<div class="video-btn">
									<a href="https://www.youtube.com/embed/P7egbt4gYKw" data-rel="lightcase" title="Watch Now" class="video-icon">
										<img src="assets/images/play.png" alt="video">									
									</a>
                                </div>
							</div>
                    </div>
            </section>
        </div>

        <div class="pb-50">
            <section>
                    <div class="container gray-bg pt-100 pb-100 jambotron">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h4 class="text-black text-center">Certification</h4>
                                <p>
                                    <ul class="mpo-ul">
                                        <li>Indentify, implement, and explain productivity improvement solutions and productivity improvement methodologies</li>
                                        <li>Implement a comprehensive productivity programin the organization with stages to analyze productivity issues, indentify ways to improve, and implement them 
                                        </li>
                                        <li>Providing promotion, training, research and consulting services to national productivity centers, customer organizations and other organizations</li>
                                    </ul>
                                </p>
                                <div class="text-center">
                                    <a href="assets/images/roadmap.jpg" data-rel="lightcase:roadmap" class="btn btn-success btn-xl mt-10 ">Plan</a>
                                    <a href="mbbtb_brochure" class="btn btn-success btn-xl mt-10" target="new">Manual</a>
                                    <a href="application" class="btn btn-success btn-xl mt-10">Application</a>
                                </div>

                            </div>
                        </div>
                    
                    </div>
            </section>
        </div>



        <section class="bg-servicesstyle2-section">
            <div class="container">
                <div class="row">
                    <div class="our-services-option">
                        <div class="section-header">
                            <h2>Certified Professionals</h2>
                            <p>You are invited to become a Certified Productivity Professional certified by the Asian Productivit Organization. Please download the application form, enter your infornation and send it to <a href="maito:info@mpo-org.mn">info@mpo-org.mn</a>.</p>
                        </div>
                        <!-- .section-header -->
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Даваагийн Ариунзул</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Нэргүйн Ариунжаргал</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Лхайзамын Уранцэцэг</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Очирвааны Урангоо</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Бямбын Уранчимэг</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Таванжингийн Оюунцэцэг</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Цэнд-Аюушын Хишигжаргал</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Мягмарсүрэнгийн Хишигдэлгэр</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Лозолын Оюун</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Лхагвасүрэнгийн Бадамцэцэг</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Жаргалын Ариунзул</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Алтанцэцэгийн Оюунгэрэл</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->
                            
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <div class="our-services-content">
                                            <h4><a href="#">Баттулгын Балжинням</a></h4>
                                            <p class="yellow">Productivity Specialist</p>
                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>
                            <!-- .col-md-4 -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .our-services-option -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>


        <div class="pb-50">
            <section>
                    <div class="container gray-bg pt-100 pb-100 text-center jambotron">
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <h4 class="text-black text-center">Certificate</h4>
                                <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis odio ac felis aliquam tincidunt. Praesent non lacus a tortor consequat aliquam at et libero. Suspendisse congue, purus at congue sagittis, tellus nibh elementum mauris, nec tincidunt tortor sapien id nibh. 
                                </p>
                                <a href="certificate" class="btn btn-success btn-xl mt-10">Download the certificate</a>

                            </div>
                        </div>
                    
                    </div>
            </section>
        </div>




        <!-- Start About Greenforest Section -->
        <section class="bg-green pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                            <img src="assets/images/image2.PNG" alt="MPO" class="img-responsive" />
                    </div>
                    <div class="col-lg-5 pt-100">  
                        <div class="d-flex justify-content-between">
                            <div >
                                <h1 class="text-white">Join Us</h1>
                                <p class="text-white">if you interested</p>
                            </div>
                            <div>
                                <a href="#" class="btn btn-lg btn-default-2">Register</a>
                                <a href="#" class="btn btn-lg btn-default-2">Login</a>
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
