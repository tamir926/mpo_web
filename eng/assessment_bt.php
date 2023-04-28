<? require_once("config.php");?>
<? require_once("views/login_check.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>

<body class="contact-page pc">
    <div class="box-layout">
        <? require_once("views/header.php");?>

        <? require_once("views/submenu_assessment.php");?>

        <style>
            div.rotate {
                -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
                -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
                -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
                        filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
                    -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
            }
        </style>
    

        <!-- Start Campaign Section -->
        <section class="bg-campaing-section">
            <div class="container">
                <div class="row">
                            <div class="col-lg-12">
                                <?
                                if (!empty($_POST))
                                {
                                    $bt1 = intval($_POST["bt1"]);
                                    $bt2 = intval($_POST["bt2"]);
                                    $bt3 = intval($_POST["bt3"]);
                                    $bt4 = intval($_POST["bt4"]);
                                    $bt5 = intval($_POST["bt5"]);
                                    $bt6 = intval($_POST["bt6"]);
                                    $bt7 = intval($_POST["bt7"]);
                                    $bt8 = intval($_POST["bt8"]);
                                    $bt9 = intval($_POST["bt9"]);
                                    $bt10 = intval($_POST["bt10"]);
                                    $bt11 = intval($_POST["bt11"]);
                                    $bt12 = intval($_POST["bt12"]);
                                    $bt13 = intval($_POST["bt13"]);
                                    $bt14 = intval($_POST["bt14"]);
                                    $bt15 = intval($_POST["bt15"]);
                                    $bt16 = intval($_POST["bt16"]);
                                    $bt17 = intval($_POST["bt17"]);
                                    $bt18 = intval($_POST["bt18"]);
                                    $bt19 = intval($_POST["bt19"]);
                                    $bt20 = intval($_POST["bt20"]);
                                    $bt21 = intval($_POST["bt21"]);
                                    $bt22 = intval($_POST["bt22"]);
                                    $bt23 = intval($_POST["bt23"]);
                                    $bt24 = intval($_POST["bt24"]);
                                    $bt25 = intval($_POST["bt25"]);
                                    $bt26 = intval($_POST["bt26"]);
                                    $bt27 = intval($_POST["bt27"]);
                                    $bt28 = intval($_POST["bt28"]);
                                    $bt29 = intval($_POST["bt29"]);
                                    $bt30 = intval($_POST["bt30"]);
                                    $bt31 = intval($_POST["bt31"]);
                                    $bt32 = intval($_POST["bt32"]);
                                    $bt33 = intval($_POST["bt33"]);
                                    $bt34 = intval($_POST["bt34"]);
                                    $total = $bt1+$bt2+$bt3+$bt4+$bt5+$bt6+$bt7+$bt8+$bt9+$bt10+$bt11+$bt12+$bt13+$bt14+$bt15+$bt16+$bt17+$bt18+$bt19+$bt20+$bt21+$bt22+$bt23+$bt24+$bt25+$bt26+$bt27+$bt28+$bt29+$bt30+$bt31+$bt32+$bt33+$bt34;

                                   ?>
                                   <h3 class="text-center"><?=$total?>/1000 үнэлгээ авсан байна.</h3>
                                  

                                    <div class="text-center">
                                        <a href="assessment_5c" class="btn btn-default btn-lg">Ахин тооцоолох</a>
                                    </div>



                                   <?
                                }
                                else 
                                {
                                    ?>
                                    <div class="contacts">
                                        <form method="post" action="assessment_bt"  id="feedback-form" class="contact-form clear">
                                            <h3 class="text-center">БИЗНЕСИЙН ТӨГӨЛДӨРШЛИЙН ТАСРАЛТГҮЙ САЙЖРУУЛАЛТЫН ҮНЭЛГЭЭ</h3>
                                            <h4>1.МАНЛАЙЛАЛ</h4>
                                                <table class="table table-responsive mpo_assessment">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2">Ангилал</th>
                                                            <th rowspan="2">№</th>
                                                            <th rowspan="2">Шалгуур</th>
                                                            <th><div class="rotate">Байхгүй</div></th>
                                                            <th><div class="rotate">Зарим</div></th>
                                                            <th><div class="rotate">Зарим чухал хэсэг</div></th>
                                                            <th><div class="rotate">Ихэнх чухал хэсэг</div></th>
                                                            <th><div class="rotate">Бүх чухал хэсэг</div></th>
                                                            <th><div class="rotate">Төгс төгөлдөршил</div></th>

                                                        </tr>
                                                        <tr>
                                                            <th>0</th>
                                                            <th>2</th>
                                                            <th>4</th>
                                                            <th>6</th>
                                                            <th>8</th>
                                                            <th>10</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="5">А. Удирдлагын манлайлал </td>
                                                            <td>1</td>
                                                            <td>Байгууллагын зорилт, алсын хараа, үнэ цэнийг тодорхойлох</td>
                                                            <td><input type="radio" name="bt1" value="0"></td>
                                                            <td><input type="radio" name="bt1" value="2"></td>
                                                            <td><input type="radio" name="bt1" value="4"></td>
                                                            <td><input type="radio" name="bt1" value="6"></td>
                                                            <td><input type="radio" name="bt1" value="8"></td>
                                                            <td><input type="radio" name="bt1" value="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Байгууллагын зорилт, алсын хараа, үнэ цэнийг ажилтнуудад түгээн дэлгэрүүлэх</td>
                                                            <td><input type="radio" name="bt2" value="0"></td>
                                                            <td><input type="radio" name="bt2" value="2"></td>
                                                            <td><input type="radio" name="bt2" value="4"></td>
                                                            <td><input type="radio" name="bt2" value="6"></td>
                                                            <td><input type="radio" name="bt2" value="8"></td>
                                                            <td><input type="radio" name="bt2" value="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Байгууллагын зорилт, алсын хараа, үнэ цэнийг хэрэглэгчид болон хамтран ажиллагч түншүүд, гадны бусад хамааралтай хүмүүст түгээн дэлгэрүүлэх</td>
                                                            <td><input type="radio" name="bt3" value="0"></td>
                                                            <td><input type="radio" name="bt3" value="2"></td>
                                                            <td><input type="radio" name="bt3" value="4"></td>
                                                            <td><input type="radio" name="bt3" value="6"></td>
                                                            <td><input type="radio" name="bt3" value="8"></td>
                                                            <td><input type="radio" name="bt3" value="10"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Төгөлдөршлийн үүрэг амлалтыг өдөр тутмын үйл ажиллагаандаа дагаж мөрдөх, баталгаажуулах.</td>
                                                            <td><input type="radio" name="bt4" value="0"></td>
                                                            <td><input type="radio" name="bt4" value="2"></td>
                                                            <td><input type="radio" name="bt4" value="4"></td>
                                                            <td><input type="radio" name="bt4" value="6"></td>
                                                            <td><input type="radio" name="bt4" value="8"></td>
                                                            <td><input type="radio" name="bt4" value="10"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Хувь хүний оролцоо ба  манлайллыг үнэлж дүгнэх, сайжруулах</td>
                                                            <td><input type="radio" name="bt5" value="0"></td>
                                                            <td><input type="radio" name="bt5" value="2"></td>
                                                            <td><input type="radio" name="bt5" value="4"></td>
                                                            <td><input type="radio" name="bt5" value="6"></td>
                                                            <td><input type="radio" name="bt5" value="8"></td>
                                                            <td><input type="radio" name="bt5" value="10"></td>

                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">B.Байгууллагын соёл</td>
                                                            <td>6</td>
                                                            <td>Инновацыг дэмжих, байгууллагын зорилго, үнэ цэнийг ажилтнуудын зан төлөв байдалд тохируулан тайлбарлах</td>
                                                            <td><input type="radio" name="bt6" value="0"></td>
                                                            <td><input type="radio" name="bt6" value="2"></td>
                                                            <td><input type="radio" name="bt6" value="4"></td>
                                                            <td><input type="radio" name="bt6" value="6"></td>
                                                            <td><input type="radio" name="bt6" value="8"></td>
                                                            <td><input type="radio" name="bt6" value="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Байгууллагын үнэт зүйлс нь бодит байдалд зөвшөөрөгдөх </td>
                                                            <td><input type="radio" name="bt7" value="0"></td>
                                                            <td><input type="radio" name="bt7" value="2"></td>
                                                            <td><input type="radio" name="bt7" value="4"></td>
                                                            <td><input type="radio" name="bt7" value="6"></td>
                                                            <td><input type="radio" name="bt7" value="8"></td>
                                                            <td><input type="radio" name="bt7" value="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>Үнэт зүйлсийг сурталчлан таниулах хөтөлбөр боловсруулах танилцуулах</td>
                                                            <td><input type="radio" name="bt8" value="0"></td>
                                                            <td><input type="radio" name="bt8" value="2"></td>
                                                            <td><input type="radio" name="bt8" value="4"></td>
                                                            <td><input type="radio" name="bt8" value="6"></td>
                                                            <td><input type="radio" name="bt8" value="8"></td>
                                                            <td><input type="radio" name="bt8" value="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>Ирээдүйн хүсэн хүлээлт ба одоогийн байдлын зөрүүгийн  дүгнэлт</td>
                                                            <td><input type="radio" name="bt9" value="0"></td>
                                                            <td><input type="radio" name="bt9" value="2"></td>
                                                            <td><input type="radio" name="bt9" value="4"></td>
                                                            <td><input type="radio" name="bt9" value="6"></td>
                                                            <td><input type="radio" name="bt9" value="8"></td>
                                                            <td><input type="radio" name="bt9" value="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">C.Корпорацийн нийгмийн хариуцлага</td>
                                                            <td>10</td>
                                                            <td>Нийгэм, хүрээлэн буй орчиндоо байгууллагын оруулах хувь нэмрийг тусгасан бодлого, зорилго, хөтөлбөрийг батлах</td>
                                                            <td><input type="radio" name="bt10" value="0"></td>
                                                            <td><input type="radio" name="bt10" value="2"></td>
                                                            <td><input type="radio" name="bt10" value="4"></td>
                                                            <td><input type="radio" name="bt10" value="6"></td>
                                                            <td><input type="radio" name="bt10" value="8"></td>
                                                            <td><input type="radio" name="bt10" value="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Бодлого, зорилго, хөтөлбөрүүдийг  сурталчлах, ажилтнуудыг татан оролцуулах.</td>
                                                            <td><input type="radio" name="bt11" value="0"></td>
                                                            <td><input type="radio" name="bt11" value="2"></td>
                                                            <td><input type="radio" name="bt11" value="4"></td>
                                                            <td><input type="radio" name="bt11" value="6"></td>
                                                            <td><input type="radio" name="bt11" value="8"></td>
                                                            <td><input type="radio" name="bt11" value="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td>Байгууллагын ил тод байдал, хариуцлага хүлээх чадвар,  засаглалын тогтолцоог бий болгох.</td>
                                                            <td><input type="radio" name="bt12" value="0"></td>
                                                            <td><input type="radio" name="bt12" value="2"></td>
                                                            <td><input type="radio" name="bt12" value="4"></td>
                                                            <td><input type="radio" name="bt12" value="6"></td>
                                                            <td><input type="radio" name="bt12" value="8"></td>
                                                            <td><input type="radio" name="bt12" value="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>13</td>
                                                            <td>Хэрэгжүүлсэн үйл ажиллагаанууд нь нийгэм, хүрээлэн байгаа орчинд  оруулсан хувь нэмрийг дүгнэх, сайжруулах</td>
                                                            <td><input type="radio" name="bt13" value="0"></td>
                                                            <td><input type="radio" name="bt13" value="2"></td>
                                                            <td><input type="radio" name="bt13" value="4"></td>
                                                            <td><input type="radio" name="bt13" value="6"></td>
                                                            <td><input type="radio" name="bt13" value="8"></td>
                                                            <td><input type="radio" name="bt13" value="10"></td>
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
