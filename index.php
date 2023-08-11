<? require_once("config.php");?>
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
                                                                <a href="<?=$slider["link"];?>" class="btn btn-default">Дэлгэрэнгүй</a>
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
                            <h2>Бүтээмжийн <br><b>Үр Шим</b></h2>
                            <!-- <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver ubiquitous leadership awesome skills.</p> -->
                        </div>
                        <!-- .section-header -->
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">
                                        <i class="flaticon-greenhouse"></i>
                                        <div class="our-services-content">
                                            <h4><a href="#">Хөрөнгө оруулагчид</a></h4>
                                            <p>Эдийн засгийн өндөр өгөөж, ашиг орлого</p>
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
                                            <h4><a href="#">Иргэн, хамт олон</a></h4>
                                            <p>Өсөлт, хөгжил</p>
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
                                            <h4><a href="#">Хэрэглэгчид</a></h4>
                                            <p>Чанартай бүтээгдэхүүн, үйлчилгээ, сэтгэл ханамж</p>

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
                                            <h4><a href="#">Улс орон</a></h4>
                                            <p>Зөв бодлого, эрүүл орчин</p>
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
                                            <h4><a href="#">Нийгэм</a></h4>
                                            <p>Амьдралын чанар, аз жаргал</p>
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
                                            <h4><a href="#">Ирээдүй</a></h4>
                                            <p>Өрсөлдөх чадвар, Өндөр амжилт </p>
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
                        <h5>Арга хэмжээ  </h5>
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
                    <h2>Арга хэмжээ</h2>
                    <!-- <p>Professionally mesh enterprise wide imperatives without world class paradigms.Dynamically deliver ubiquitous leadership awesome skills.</p> -->
                    <ul class="nav nav-pills flex-column flex-sm-row" id="pills-tab" role="tablist">
                    <li class="w-50" role="presentation">
                        <button class="flex-sm-fill text-sm-center nav-link w-100 active" id="pills-domestic-tab" data-bs-toggle="pill" data-bs-target="#pills-domestic" type="button" role="tab" aria-controls="pills-domestic" aria-selected="true">Дотоод</button>
                    </li>
                    <li class="w-50" role="presentation">
                        <button class="flex-sm-fill text-sm-center nav-link w-100" id="pills-international-tab" data-bs-toggle="pill" data-bs-target="#pills-international" type="button" role="tab" aria-controls="pills-international" aria-selected="false">Олон Улс</button>
                    </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-domestic" role="tabpanel" aria-labelledby="pills-domestic-tab">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="blog-items">
                                    <div class="blog-img">
                                        <a href="https://news.mn/r/2664723/"><img src="https://news.mn/wp-content/uploads/2023/08/agriculture-money.shutterstock_1506944648-scaled-1-810x500.jpg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2023-08-02</a></h6>
                                            <h4><a href="#">Хүнсний үйлдвэрлэлийг дэмжихэд хөнгөлттэй зээл олгож байна</a></h4>
                                            <p>УИХ-ын  2022 оны “Хүнсний хангамж, аюулгүй байдлыг хангах талаар авах зарим арга хэмжээний тухай” 36 дугаар тогтоол, Засгийн газрын 2023 оны “Хүнсний хангамж, хөдөө аж ахуйн салбарын технологит ажлын талаар авах зарим арга хэмжээний тухай” 63 дугаар тогтоолоор арилжааны банкны эх үүсвэрээр, хүнс, хөдөө аж ахуйн үйлдвэрлэлийг эргэлтийн хөрөнгөөр дэмжих хүрээнд жилийн нийт 18 хувь (зээлдэгчээс 5 хувь, Засгийн газраас хариуцан төлөх 13 хувь)-ийн хүүтэй, 24 хүртэл  сарын хугацаатай, хөрөнгө оруулалтын, жилийн нийт 19 хувь (зээлдэгчээс 6 хувь, Засгийн газраас хариуцан төлөх 13 хувь)-ийн хүүтэй, 60 хүртэл   сарын хугацаатай хөнгөлөлттэй зээлийг олгохоор шийдвэрлэсэн.</p>
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
                                        <a href="https://news.mn/r/2665169/"><img src="https://news.mn/wp-content/uploads/2022/07/%D0%9C%D0%BE%D0%BD%D0%B3%D0%BE%D0%BB-%D0%A3%D0%BB%D1%81%D1%8B%D0%BD-%D0%A5%D3%A9%D0%B3%D0%B6%D0%BB%D0%B8%D0%B9%D0%BD-%D0%B1%D0%B0%D0%BD%D0%BA-810x500.jpg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2023-08-04</a></h6>
                                            <h4><a href="#">Хөгжлийн банкнаас зээл авсан компаниуд 335.6 тэрбумыг төлжээ</a></h4>
                                            <p>Монгол Улсын Хөгжлийн банкны зээлийн эргэн төлөлт энэ оны наймдугаар сарын 1-ний байдлаар 335,6 тэрбум төгрөгт хүрсэн байна. Үүнээс 1,4 тэрбумыг өмчлөх бусад үл хөдлөх хөрөнгөөр, үлдсэн 334,2 тэрбумыг бэлэн мөнгөөр төлжээ.</p>
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
                                        <a href="https://news.mn/r/2664830/"><img src="https://news.mn/wp-content/uploads/2023/08/tumur-zam-800x500.jpg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2023-08-02</a></h6>
                                            <h4><a href="#">Тавантолгой-Зүүнбаян чиглэлийн төмөр зам байнгын ашиглалтад орлоо</a></h4>
                                            <p>Тавантолгой-Зүүнбаян чиглэлийн төмөр зам байнгын ашиглалтад орсноор үндэсний төмөр замын сүлжээг 416,1 километрээр өргөтгөжээ.</p>
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
                                        <a href="https://news.mn/r/2665771/"><img src="https://news.mn/wp-content/uploads/2023/08/pZCDoDnexqRskdnhDT8UAY-780x470-1.jpeg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2023-08-08</a></h6>
                                            <h4><a href="#">Саран дээр газардахтай холбоотойгоор иргэдийг нүүлгэнэ</a></h4>
                                            <p>ОХУ ойрын нэг жилийн хугацаанд "Luna-25" хөлгөө саран дээр газардуулахаар төлөвлөж буй. ОХУ хамгийн сүүлд 1976 онд саран дээр газардсан. Энэ удаад Москвагаас зүүн зүгт 5550 км зайд орших Восточный Космодром станцаас "Союз-2 Фрегат" хөөргөгч онгоцоор "Luna-25" хөлгийг хөөргөх аж.

Бараг 50 жилийн дараа дахин саран дээр газардах гэж буйтай холбоотойгоор Хабаровск мужийн Шахтинский суурингийн оршин суугчдыг наймдугаар сарын 11-нд нүүлгэн шилжүүлэх болжээ. Шахтинский нь ОХУ-ын зүүн хязгаарын тосгон юм. Пуужин хөөргөгч онгоц Шахтинский орчимд унана гэж таамаглаж буй тул ийнхүү нүүлгэн шилжүүлэлт хийх шийдвэр гаргасан байна. "Умалта, Уссамах, Лепикан, Тастах, Саганар голуудын амсар, Бурея голын гатлага онгоцны гарцын хэсэг нь урьдчилан таамагласан уналтын бүсэд багтаж байна" гэж Хабаровск мужийн Верхнебурейн дүүргийн дарга Алексей Маслов хэллээ. 

"Luna-25" хөлгийг хөөргөж буй гол зорилго нь зөөлөн газардах технологийг хөгжүүлэх, сарны дотоод бүтцийг судлах, нөөц, тэр дундаа усны хайгуул хийх юм.</p>
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
                                        <a href="https://news.mn/r/2665677/"><img src="https://news.mn/wp-content/uploads/2023/08/collage-maker-27-jul-2023-07-32-am-3640-1690423359-810x500.jpg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2023-08-07</a></h6>
                                            <h4><a href="#">Пёньян: ОХУ руу зэвсэг экспортлоход анхаарлаа хандуулна</a></h4>
                                            <p>Хойд Солонгосын удирдагч Ким Жон Ун өнгөрсөн долоо хоногийн Пүрэв гаригаас Бямба гариг хооронд улсынхаа зэвсгийн үйлдвэрүүдээр зочлов. Тэрбээр энэ үеэрээ пуужингийн хөдөлгүүр, их буу болон бусад зэвсгийн үйлдвэрлэлийн хүчин чадлыг нэмэгдүүлэх зааварчилгааг өгчээ. Тус улс стратегийн болон ердийн төрөл бүрийн зэвсэг бүтээхийг эрмэлзэж, төрөл бүрийн үзэсгэлэн дэлгэж буй цаг үед олон өдөр үргэлжилсэн энэхүү онцгой айлчлал тохиолоо.</p>
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
                                        <a href="https://news.mn/r/2664716/"><img src="https://news.mn/wp-content/uploads/2023/08/YDZA5MBTZZJD7NWVLRS5X6BJQ4-810x500.jpg" alt="blog-img-1" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h6><a href="#">2023-08-02</a></h6>
                                            <h4><a href="#">Ван Иг АНУ-д айлчлахыг албан ёсоор урьжээ </a></h4>
                                            <p>Хятадын Гадаад хэргийн сайдаар буцаан томилогдсон Ван Иг Вашингтонд айлчлахыг албан ёсоор урьсан талаар АНУ-ын төрийн департментын төлөөлөгч Матт Миллер мэдэгджээ. Тэрбээр Даваа гарагт АНУ-ын Зүүн Ази, Номхон далайн асуудал эрхэлсэн нарийн бичгийн даргын туслах Даниел Критенбринк болон Хятадын Гадаад хэргийн яамны Хойд Америк, Далайн асуудал эрхэлсэн ерөнхий захирал Ян Тао нартай уулзах үеэрээ урилгыг өгсөн гэж мэдэгдэв. Гэхдээ Ван И урилгыг хүлээж авах эсэх нь хараахан тодорхойгүй байна</p>
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
                            <img src="assets/images/image2.PNG" alt="MPO" class="img-responsive" />
                    </div>
                    <div class="col-lg-5 pt-100">  
                        <div class="d-flex justify-content-between">
                            <div >
                                <h1 class="text-white">Гишүүнчлэл</h1>
                                <p class="text-white">Хэрэв та сонирхож байгаа бол</p>
                            </div>
                            <div>
                                <a href="https://mpo-org.mn/register" class="btn btn-lg btn-default-2">Бүртгүүлэх</a>
                                <a href="https://mpo-org.mn/login" class="btn btn-lg btn-default-2">Нэвтрэх</a>
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
