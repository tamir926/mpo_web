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
                        <img src="../assets/images/logos.jpg" class="mt-50">
                        <?
                        $sql = "SELECT *FROM pages WHERE page_id=18";
                        $result = mysqli_query($conn,$sql);
                        $page = mysqli_fetch_array($result);
                        ?>
                        <!-- <h6 class="green">МБТББ</h6> -->
                        <h2 class="text-black"><?=$page["name"];?></h2>
                        <p class="text-justify"><?=$page["content"];?></p>

                        <div class="pt-50">
                            <a href="introduction_eng.php" class="btn btn-success btn-xl mt-10">Introduction</a>
                            <a href="missionvision_eng.php" class="btn btn-success btn-xl mt-10">Mission vision</a>
                            <a href="structure_eng.php" class="btn btn-success btn-xl mt-10">Structure</a>
                            <a href="management_eng.php" class="btn btn-success btn-xl mt-10">Management</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        


        <section class="gray-bg">
            <div class="container text-center pt-50 pb-50">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <h4 class="text-black">Certification purpose</h4>
                        <p>This PSC is introduced by APO-AB as a scheme owner with the objective to build up pools ofproductivity specialist for all national productivity organisations members countries, includingMPO, a sole representative of national productivity organisation (NPO) in Mongolia.</p>
                    </div>
                    <div class="col-lg-4  mx-auto">
                        <h4 class="text-black">CERTIFICATION BENEFIT</h4>
                        <p>Individuals who meet the requirements will be awarded the certificate of "Certified Productivity Specialist" in accordance with the level and hierarchy of the productivity specialist, and will have the opportunity to improve their professional and bussiness prospects, connect with other productivity specialists, and participate in international projects of APO. In addition,  CPS will be recognized in member states with similar acceditation system of the NPO. A ceritified PS will be registered as a word-class productivity professional on the MPOCB directory and the APO portal.</p>
                    </div>
                    <div class="col-lg-4  mx-auto">
                        <h4 class="text-black text-left">Tiers of Productivity Specialist Certification</h4>
                        <p>MPOCB provides responsible Productivity Specialist Certification Scheme according to the following 3 levels:</p>
                            <a href="productivity_specialist_eng.php"><p class="green">1. Certified Productivity Specialist attested of the APO</p></a>
                            <a href="senior_productivity_eng.php"><p class="green">2. Certified Senior Productivity Specialist attested of APO</p></a>
                            <a href="master_productivity_eng.php"><p class="green">3. Certified Master Productivity Specialist</p></a>
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
                                <h4 class="text-black text-center">CERTIFICATION, RE-CERTIFICATION, AND CPD</h4>
                                <p>
                                    <a>CPS is expected to transfer knowledge of a wide range of productivity solutions to enterprises and organizations through training, facilitating, coaching, and consulting activities as follows:</a>
                                    <ul class="mpo-ul">
                                        <li>Indentify, implement, and explain productivity improvement solutions and productivity improvement methodologies</li>
                                        <li>Implement a comprehensive productivity programin the organization with stages to analyze productivity issues, indentify ways to improve, and implement them 
                                        </li>
                                        <li>Providing promotion, training, research and consulting services to national productivity centers, customer organizations and other organizations</li>
                                    </ul>
                                </p>
                                <div class="text-center">
                                    <a href="plan_eng.php" class="btn btn-success btn-xl mt-10">Plan</a>
                                    <a href="application" class="btn btn-success btn-xl mt-10">Application</a>
                                    
                                    <a href="process_eng.php" class="btn btn-success btn-xl mt-10" target="new">Process</a>
                                    <a href="appeal_eng.php" class="btn btn-success btn-xl mt-10" target="new">Appeal</a>
                                </div>

                            </div>
                        </div>
                    
                    </div>
            </section>
        </div>  

    <!-- Start Certified Productivity Section -->
    <section class="bg-recent-project">
            <div class="container">
                <div class="row">
                    <div class="recent-project">
                        <div class="section-header">
                            <h2>Certified Productivity</h2>
                            <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver ubiquitous leadership awesome skills.</p>
                        </div>
                        <!-- .section-header -->

                        <div id="filters" class="button-group ">
                            <button class="button is-checked" data-filter="*">show all</button>
                            <button class="button" data-filter=".cat-1">Master</button>
                            <button class="button" data-filter=".cat-2">Senior</button>
                            <button class="button" data-filter=".cat-3">Specialists</button>
                        </div>

                        <div class="portfolio-items">
                            <div class="item cat-1" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_Ch_Unurtsetseg_eng.php">Unurtsetseg. Ch</a></h4>
                                        <p>LVL : <span><a href="../cb_Ch_Unurtsetseg_eng.php">CMPS0001</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                            <div class="item cat-1" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_B_Anar_eng.php">Anar. B</a></h4>
                                        <p>LVL: <span><a href="#">CMPS0002</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                            <div class="item cat-1" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_B_Oyun_eng.php">Oyun. B</a></h4>
                                        <p>LVL : <span><a href="../cb_B_Oyun_eng.php">CMPS0003</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->

                            <div class="item cat-2" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_B_Uranchimeg_eng.php">Uranchimeg Byamba</a></h4>
                                        <p>LVL : <span><a href="../cb_B_Uranchimeg_eng.php">CSPS0001</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                            <div class="item cat-2" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_L_Urantsetseg_eng.php">Urantsetseg Lkhayemaz</a></h4>
                                        <p>LVL : <span><a href="../cb_L_Urantsetseg_eng.php">CSPS000002</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->                            

                            <div class="item cat-3" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_D_Ariunzul_eng.php">Ariunzul Davaa</a></h4>
                                        <p>LVL : <span><a href="../cb_D_Ariunzul_eng.php">PS000001</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                            <div class="item cat-3" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_L_Badamtsetseg_eng.php">Badamtsetseg Lkhagvasuren</a></h4>
                                        <p>LVL : <span><a href="../cb_L_Badamtsetseg_eng.php">PS000011</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                            <div class="item cat-3" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_L_Oyun_eng.php">Oyun Lozol</a></h4>
                                        <p>LVL : <span><a href="../cb_L_Oyun_eng.php">PS000009</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                            <div class="item cat-3" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_A_Oyungerel_eng.php">Oyungerel Altantsetseg </a></h4>
                                        <p>LVL : <span><a href="../cb_A_Oyungerel_eng.php">PS000010</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                            <div class="item cat-3" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_Ts_Khishigjargal_eng.php">Khishigjargal Tsendayush</a></h4>
                                        <p>LVL : <span><a href="../cb_Ts_Khishigjargal_eng.php">PS000007</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>

                            <!-- .items -->
                            <div class="item cat-3" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_T_Oyuntsetseg_eng.php">Oyuntsetseg Tavanjin</a></h4>
                                        <p>LVL : <span><a href="../cb_T_Oyuntsetseg_eng.php">PS000006</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                            <div class="item cat-3" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="../cb_N_Ariunjargal_eng.php">Ariunjargal Nerdui</a></h4>
                                        <p>LVL : <span><a href="../cb_N_Ariunjargal_eng.php">PS000002</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->

                            <div class="item cat-3" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="*">Erdenedavaa. G</a></h4>
                                        <p>LVL : <span><a href="#">Certified Productivity Specialist</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                            <div class="item cat-3" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="*">Oyunbileg. G</a></h4>
                                        <p>LVL : <span><a href="#">Certified Productivity Specialist</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                            <div class="item cat-3" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="*">Erdenedavaa. G</a></h4>
                                        <p>LVL : <span><a href="#">Certified Productivity Specialist</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                            <div class="item cat-3" data-category="transition">
                                <div class="item-inner">
                                        <!-- .overlay-project -->
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4><a href="*">Oyunbileg. G</a></h4>
                                        <p>LVL : <span><a href="#">Certified Productivity Specialist</a></span></p>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->

                        </div>
                        <!-- .isotope-items -->
                    </div>
                    <!-- .recent-project -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Recent Project Section -->

        <div class="pb-50">
            <section>
                    <div class="container gray-bg pt-100 pb-100 text-center jambotron">
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <h4 class="text-black text-center">Certificate Database</h4>
                                <p>Certification of CPS is valid for 3 years. Re-certification is subjected to candidates who meet continued conformity requirements.</p>
                                <p>Current valid certification can be provided upon request.</p>
                                <a href="certificate" class="btn btn-success btn-xl mt-10">Download Certificate</a>

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
                            <img src="../assets/images/image2.PNG" alt="MPO" class="img-responsive" />
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
