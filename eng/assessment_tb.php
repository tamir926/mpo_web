<? require_once("config.php");?>
<? require_once("views/login_check.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>

<body class="contact-page pc">
    <div class="box-layout">
        <? require_once("views/header.php");?>

        <? require_once("views/submenu_assessment.php");?>


    

        <!-- Start Campaign Section -->
        <section class="bg-campaing-section">
            <div class="container">
                <div class="row">
                            <div class="col-lg-12">
                                <?
                                if (!empty($_POST))
                                {
                                    $tb1 = intval($_POST["tb1"]);
                                    $tb2 = intval($_POST["tb2"]);
                                    $tb3 = intval($_POST["tb3"]);
                                    $tb4 = intval($_POST["tb4"]);
                                    $tb5 = intval($_POST["tb5"]);
                                    $tb6 = intval($_POST["tb6"]);
                                    $tb7 = intval($_POST["tb7"]);
                                    $tb8 = intval($_POST["tb8"]);
                                    $tb9 = intval($_POST["tb9"]);
                                    $tb10 =intval($_POST["tb10"]);
                                   
                                    $total = $tb1+$tb2+$tb3+$tb4+$tb5+$tb6+$tb7+$tb8+$tb9+$tb10;

                                   ?>
                                   <h3 class="text-center"><?=$total?>/30 үнэлгээ авсан байна.</h3>
                                  

                                    <div class="text-center">
                                        <a href="assessment_tb" class="btn btn-default btn-lg">Ахин тооцоолох</a>
                                    </div>



                                   <?
                                }
                                else 
                                {
                                    ?>
                                    <div class="contacts">
                                        <form method="post" action="assessment_tb"  id="feedback-form" class="contact-form clear">
                                            <h3 class="text-center">ТӨРИЙН БАЙГУУЛЛАГЫН БҮТЭЭМЖИЙН ГҮЙЦЭТГЭЛИЙН ТҮВШИН ТОГТООХ АСУУЛГА</h3>
                                            <p><i>Үнэлгээ:  0-илрэлгүй   1-заримдаа илэрнэ 2-ихэнхдээ илэрнэ 3-бүх талаар илэрнэ </i></p>
                                                <table class="table table-responsive mpo_assessment">
                                                    <thead>
                                                        <tr>
                                                            <th>№</th>
                                                            <th>Асуулт</th>
                                                            <th>0</th>
                                                            <th>1</th>
                                                            <th>2</th>
                                                            <th>3</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Эрхэм зорилго, алсын харааг тодорхойлж бүх шатны ажилтнуудад хүргэсэн.</td>
                                                            <td><input type="radio" name="tb1" value="0"></td>
                                                            <td><input type="radio" name="tb1" value="1"></td>
                                                            <td><input type="radio" name="tb1" value="2"></td>
                                                            <td><input type="radio" name="tb1" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>Удирдлагууд байгууллагын өсөлт хөгжлийг хангах шинэ арга замыг тодорхойлж ажилладаг.</td>
                                                            <td><input type="radio" name="tb2" value="0"></td>
                                                            <td><input type="radio" name="tb2" value="1"></td>
                                                            <td><input type="radio" name="tb2" value="2"></td>
                                                            <td><input type="radio" name="tb2" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>3</td>
                                                            <td>Үйл ажиллагааны сайжруулалт хийж, байгаль орчин болон нийгэмд үзүүлэх сөрөг нөлөөг багасгах талаар ажил санаачилж хэрэгжүүлдэг.</td>
                                                            <td><input type="radio" name="tb3" value="0"></td>
                                                            <td><input type="radio" name="tb3" value="1"></td>
                                                            <td><input type="radio" name="tb3" value="2"></td>
                                                            <td><input type="radio" name="tb3" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>Иргэд, харилцагчдын хэрэгцээ шаардлага, сэтгэл ханамжийн талаар байнга үнэлгээ хийдэг.</td>
                                                            <td><input type="radio" name="tb4" value="0"></td>
                                                            <td><input type="radio" name="tb4" value="1"></td>
                                                            <td><input type="radio" name="tb4" value="2"></td>
                                                            <td><input type="radio" name="tb4" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>Иргэд, харилцагчийн гомдлын мөрөөр хяналт, хийж баримтжуулж, залруулж, дахин гарахаас урдчилан сэргийлдэг.</td>
                                                            <td><input type="radio" name="tb5" value="0"></td>
                                                            <td><input type="radio" name="tb5" value="1"></td>
                                                            <td><input type="radio" name="tb5" value="2"></td>
                                                            <td><input type="radio" name="tb5" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>6</td>
                                                            <td>Хувь хүний бүтээлч санаачлага, инноваци, хурдан хариу үйлдэл үзүүлэх, үр дүнтэй харилцаа холбоог дэмждэг.</td>
                                                            <td><input type="radio" name="tb6" value="0"></td>
                                                            <td><input type="radio" name="tb6" value="1"></td>
                                                            <td><input type="radio" name="tb6" value="2"></td>
                                                            <td><input type="radio" name="tb6" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>7</td>
                                                            <td>Ажилтнуудын манлайлал, карьер өсөлт, дэвшлийн төлөвлөгөөг гаргасан.</td>
                                                            <td><input type="radio" name="tb7" value="0"></td>
                                                            <td><input type="radio" name="tb7" value="1"></td>
                                                            <td><input type="radio" name="tb7" value="2"></td>
                                                            <td><input type="radio" name="tb7" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>8</td>
                                                            <td>Ажилтнуудын ажлын байрны орчин, соёл, сэтгэл ханамжийг нэмэгдүүлэх идэвхжүүлэлтийн хөтөлбөрийг хэрэгжүүлдэг.</td>
                                                            <td><input type="radio" name="tb8" value="0"></td>
                                                            <td><input type="radio" name="tb8" value="1"></td>
                                                            <td><input type="radio" name="tb8" value="2"></td>
                                                            <td><input type="radio" name="tb8" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>9</td>
                                                            <td>Ажлын процесс, үйлчилгээний чанарыг сайжруулах санаачлагууд төслийг хэрэгжүүлдэг.</td>
                                                            <td><input type="radio" name="tb9" value="0"></td>
                                                            <td><input type="radio" name="tb9" value="1"></td>
                                                            <td><input type="radio" name="tb9" value="2"></td>
                                                            <td><input type="radio" name="tb9" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td>Байгууллагын өдөр тутмын үйл ажиллагааны болон нийт гүйцэтгэлийн үр дүнг бүх талын мэдээлэл нотолгоонд тулгуурлан дүгнэдэг. (санхүү, хэрэглэгчийн сэтгэл ханамж, ажилтнуудын сэтгэл ханамж, байгаль орчин, гол процессуд).</td>
                                                            <td><input type="radio" name="tb10" value="0"></td>
                                                            <td><input type="radio" name="tb10" value="1"></td>
                                                            <td><input type="radio" name="tb10" value="2"></td>
                                                            <td><input type="radio" name="tb10" value="3"></td>                                                            
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>


                                                <div class="text-center">
                                                    <input type="submit" class="btn btn-default" value="Илгээх" >
                                                </div>
                                        </form>
                                    </div>
                                    <?
                                }
                                ?>
                            </div>
                            <!-- .col-md-4 -->                           
                            
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .focus-cause -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Campaign Section -->


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
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins.isotope.js"></script>
    <script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="assets/js/lightcase.js"></script>
    <script type="text/javascript" src="assets/js/jquery.nstSlider.js"></script>
    <script type="text/javascript" src="assets/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/js/custom.isotope.js"></script>
    <script type="text/javascript" src="assets/js/custom.map.js"></script>
    <!-- <script type="text/javascript" src="assets/js/popper.min.js"></script> -->
    
    <script type="text/javascript" src="assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('input[type=text]').on('input', function(){
               //$('#nuat_2017').val($('#sales_2017').val()+$('#init_2017').val()-$('#end_2017').val()-$('#exp_2017').val()-$('#buy_2017').val());
               //$('#nuat_2018').val($('#sales_2018').val()+$('#init_2018').val()-$('#end_2018').val()-$('#exp_2018').val()-$('#buy_2018').val());
               $('input[name=nuat_2017]').val(
                   (parseInt($('input[name=sales_2017]').val())|| 0)
                   +(parseInt($('input[name=init_2017]').val())|| 0)
                   -(parseInt($('input[name=end_2017]').val())|| 0)
                   -(parseInt($('input[name=exp_2017]').val())|| 0)
                   -(parseInt($('input[name=buy_2017]').val())|| 0)
                   );
                $('input[name=nuat_2018]').val(
                   (parseInt($('input[name=sales_2018]').val())|| 0)
                   +(parseInt($('input[name=init_2018]').val())|| 0)
                   -(parseInt($('input[name=end_2018]').val())|| 0)
                   -(parseInt($('input[name=exp_2018]').val())|| 0)
                   -(parseInt($('input[name=buy_2018]').val())|| 0)
                   );
                $('input[name=nuat_2019]').val(
                   (parseInt($('input[name=sales_2019]').val())|| 0)
                   +(parseInt($('input[name=init_2019]').val())|| 0)
                   -(parseInt($('input[name=end_2019]').val())|| 0)
                   -(parseInt($('input[name=exp_2019]').val())|| 0)
                   -(parseInt($('input[name=buy_2019]').val())|| 0)
                   );
                $('input[name=nuat_2020]').val(
                   (parseInt($('input[name=sales_2020]').val())|| 0)
                   +(parseInt($('input[name=init_2020]').val())|| 0)
                   -(parseInt($('input[name=end_2020]').val())|| 0)
                   -(parseInt($('input[name=exp_2020]').val())|| 0)
                   -(parseInt($('input[name=buy_2020]').val())|| 0)
                   );
                $('input[name=nuat_2021]').val(
                   (parseInt($('input[name=sales_2021]').val())|| 0)
                   +(parseInt($('input[name=init_2021]').val())|| 0)
                   -(parseInt($('input[name=end_2021]').val())|| 0)
                   -(parseInt($('input[name=exp_2021]').val())|| 0)
                   -(parseInt($('input[name=buy_2021]').val())|| 0)
                   );
            })
        });    
    </script>

</body>

</html>
