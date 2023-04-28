<? require_once("../config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>

        <!-- Start Slider Section -->

        <section class="bg-slider-option">
            <div class="slider-option">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?
                        $count =1;
                        $sql = "SELECT *FROM slider";
                        $result = mysqli_query($conn,$sql);
                        while ($slider = mysqli_fetch_array($result))
                        {
                            ?>
                            <div class="carousel-item <?=($count==1)?'active':'';?>" data-bs-interval="2000">
                                <div class="slider-item">
                                    <img src="<?=$slider["image"];?>" alt="<?=$slider["title"];?>">
                                    <div class="slider-content-area">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="slider-content">
                                                        <h2><?=$slider["title"];?></h2>
                                                        <p><?=$slider["description"];?></p>
                                                        <?
                                                        if ($slider["link"]!='' && $slider["link"]!='#')
                                                        {
                                                            ?>
                                                            <div class="slider-btn">
                                                                <a href="<?=$slider["link"];?>" class="btn btn-default">More</a>
                                                            </div>
                                                            <?
                                                        }
                                                        ?>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-4"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?
                            $count ++;
                            
                        }
                        ?>
                    <button class="left carousel-control carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="right carousel-control carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- End Slider Section -->
<!-- 
        <div class="container">
            <section id="content">
                    <div class="content-info">
                            <h5>Таны</h5>
                            <h3>Сонголт...</h3>
                            <p>Хөгжилд хүрэх бүтээмжийн хязгааргүй <br> аянаа яг одоо эхлээрэй.</p>
                            <div class="box">
                                <div class="box-1">
                                        <div class="icon">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </div>
                                        
                                        <p class="txt">
                                            <i class="fa fa-handshake-o" aria-hidden="true"></i><br>
                                            <b>Мэдлэг</b> баялгийг <br> нэмэгдүүлнэ
                                        </p> 
                                        
                                </div>                    
                                <div class="box-2">
                                        <div class="icon">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </div>
                                        <p class="txt">
                                            <i class="fa fa-deaf" aria-hidden="true"></i><br>
                                        Шинэ <b>шийдэл</b> <br> таныг тодорхойлно
                                        </p> 

                                        
                                </div>                    
                                <div class="box-3">
                                        <div class="icon">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </div>
                                        <p class="txt">
                                            <i class="fa fa-magic" aria-hidden="true"></i><br>
                                            Олон улсад хүлээн <br> зөвшөөрөгдөх <b>гарц</b>
                                        </p> 
                                        
                                </div>                    
                            </div>
                    </div>
            </section>
        </div> -->



        <!-- Start Service Style2 Section -->
        <section class="bg-servicesstyle2-section">
            <div class="container">
                <div class="row">
                    <div class="our-services-option">
                        <div class="section-header">
                            <h2>Productivity <br><b>profit</b></h2>
                            <!-- <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver ubiquitous leadership awesome skills.</p> -->
                        </div>
                        <!-- .section-header -->
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <i class="flaticon-greenhouse"></i>
                                        <div class="our-services-content">
                                            <h4><a href="#">Investors</a></h4>
                                            <p>High economic returns and profits</p>
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
                                        <i class="flaticon-technology"></i>
                                        <div class="our-services-content">
                                            <h4><a href="#">Citizen and community</a></h4>
                                            <p>Growth and development</p>
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
                                        <i class="flaticon-light-bulb"></i>
                                        <div class="our-services-content">
                                            <h4><a href="#">Consumers</a></h4>
                                            <p>Quality products, service and satisfaction</p>

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
                                        <i class="flaticon-recycling-symbol"></i>
                                        <div class="our-services-content">
                                            <h4><a href="#">Country</a></h4>
                                            <p>Right policy, healthy environment</p>
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
                                        <i class="flaticon-sprout"></i>
                                        <div class="our-services-content">
                                            <h4><a href="#">society</a></h4>
                                            <p>Quality of life and happiness</p>
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
                                        <i class="flaticon-droplet"></i>
                                        <div class="our-services-content">
                                            <h4><a href="#">The future</a></h4>
                                            <p>Competitiveness, High achievement </p>
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
        <!-- End Service Style2 Section -->
        

        



        <!-- Start People working Section -->
        <section class="bg-people-work-section">
            <div class="container">
                <div class="row">
                    <div class="people-work-section">
                        <h5>For Clients </h5>
                        <h2><b>Interested Skills</b></h2>
                        <!-- .section-header -->
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="d-flex justify-content-between mpo-list">
                                    <a href="#">Video Production</a>
                                    <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="d-flex justify-content-between mpo-list">
                                    <a href="#">Time Management</a>
                                    <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="d-flex justify-content-between mpo-list">
                                    <a href="#">Communication Skills</a>
                                    <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="d-flex justify-content-between mpo-list">
                                    <a href="#">Autonomy</a>
                                    <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="d-flex justify-content-between mpo-list">
                                    <a href="#">Interpersonal Sensivity</a>
                                    <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="d-flex justify-content-between mpo-list">
                                    <a href="#">Throughness</a>
                                    <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="d-flex justify-content-between mpo-list">
                                    <a href="#">Resilience</a>
                                    <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="d-flex justify-content-between mpo-list">
                                    <a href="#">Computer Literacy</a>
                                    <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="d-flex justify-content-between mpo-list">
                                    <a href="#">Resilience</a>
                                    <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="d-flex justify-content-between mpo-list">
                                    <a href="#">Computer Literacy</a>
                                    <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .people-work-section -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End People working Section -->



         <!-- Start Blog Section -->
         <section class="bg-blog-section">
            <div class="container">
                <div class="section-header">
                    <h2>Measures</h2>
                    <!-- <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver ubiquitous leadership awesome skills.</p> -->
                    <ul class="nav nav-pills flex-column flex-sm-row" id="pills-tab" role="tablist">
                    <li class="w-50" role="presentation">
                        <button class="flex-sm-fill text-sm-center nav-link w-100 active" id="pills-domestic-tab" data-bs-toggle="pill" data-bs-target="#pills-domestic" type="button" role="tab" aria-controls="pills-domestic" aria-selected="true">Internal</button>
                    </li>
                    <li class="w-50" role="presentation">
                        <button class="flex-sm-fill text-sm-center nav-link w-100" id="pills-international-tab" data-bs-toggle="pill" data-bs-target="#pills-international" type="button" role="tab" aria-controls="pills-international" aria-selected="false">International</button>
                    </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-domestic" role="tabpanel" aria-labelledby="pills-domestic-tab">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="blog-items">
                                    <div class="blog-img">
                                        <a href="#"><img src="https://news.mn/wp-content/uploads/2021/06/Хүүхдүүд-болон-жирэмсэн-эхчүүдийн-вакцинжуулалт-11-250x156.jpg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2021-12-15</a></h6>
                                            <h4><a href="#">There will be 14 temporary vaccination points in major markets</a></h4>
                                            <p>Completely actuaze cent centric coloration an sharing without ainstalled and base awesome event PSD Template.</p>
                                        </div>
                                        <!-- .blog-content -->
                                    </div>
                                    <!-- .blog-content-box -->
                                </div>
                                <!-- .blog-items -->
                            </div>
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="blog-items">
                                    <div class="blog-img">
                                        <a href="#"><img src="https://news.mn/wp-content/uploads/2021/12/Шинэ-жил-талбай-цаг-агаар-250x156.jpg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2021-12-15</a></h6>
                                            <h4><a href="#">There will be 14 temporary vaccination points in major markets</a></h4>
                                            <p>Completely actuaze cent centric coloration an sharing without ainstalled and base awesome event PSD Template.</p>
                                        </div>
                                        <!-- .blog-content -->
                                    </div>
                                    <!-- .blog-content-box -->
                                </div>
                                <!-- .blog-items -->
                            </div>
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="blog-items">
                                    <div class="blog-img">
                                        <a href="#"><img src="https://news.mn/wp-content/uploads/2020/04/онгоц-250x156.jpg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2021-12-15</a></h6>
                                            <h4><a href="#">Passengers on the Ulaanbaatar-Frankfurt route increased by 75.5 percent</a></h4>
                                            <p>Completely actuaze cent centric coloration an sharing without ainstalled and base awesome event PSD Template.</p>
                                        </div>
                                        <!-- .blog-content -->
                                    </div>
                                    <!-- .blog-content-box -->
                                </div>
                                <!-- .blog-items -->
                            </div>
                            <!-- .col-md-4 -->

                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-international" role="tabpanel" aria-labelledby="pills-international-tab">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="blog-items">
                                    <div class="blog-img">
                                        <a href="#"><img src="https://ichef.bbc.co.uk/wwhp/624/cpsprodpb/138E2/production/_122489008_mediaitem122489006.jpg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2021-12-15</a></h6>
                                            <h4><a href="#">US and Russia to talk as Putin hits out on Ukraine</a></h4>
                                            <p>Completely actuaze cent centric coloration an sharing without ainstalled and base awesome event PSD Template.</p>
                                        </div>
                                        <!-- .blog-content -->
                                    </div>
                                    <!-- .blog-content-box -->
                                </div>
                                <!-- .blog-items -->
                            </div>
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="blog-items">
                                    <div class="blog-img">
                                        <a href="#"><img src="https://ichef.bbc.co.uk/wwhp/304/ibroadcast/images/live/p0/9w/hc/p09whcp6.jpg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2021-12-15</a></h6>
                                            <h4><a href="#">The four pillars of happiness</a></h4>
                                            <p>Completely actuaze cent centric coloration an sharing without ainstalled and base awesome event PSD Template.</p>
                                        </div>
                                        <!-- .blog-content -->
                                    </div>
                                    <!-- .blog-content-box -->
                                </div>
                                <!-- .blog-items -->
                            </div>
                            <!-- .col-md-4 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="blog-items">
                                    <div class="blog-img">
                                        <a href="#"><img src="https://ichef.bbc.co.uk/wwhp/624/cpsprodpb/E6F9/production/_122492195_gettyimages-1279883614.jpg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2021-12-15</a></h6>
                                            <h4><a href="#">US literary icon Joan Didion dies at 87 </a></h4>
                                            <p>Completely actuaze cent centric coloration an sharing without ainstalled and base awesome event PSD Template.</p>
                                        </div>
                                        <!-- .blog-content -->
                                    </div>
                                    <!-- .blog-content-box -->
                                </div>
                                <!-- .blog-items -->
                            </div>
                            <!-- .col-md-4 -->

                        </div>
                    </div>
                </div>
            </div>            
        </section>
        <!-- End Blog Section -->


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
    <!-- <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script> -->
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
