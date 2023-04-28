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
                                    if(isset($_POST["jdu1"])) $jdu1 = intval($_POST["jdu1"]); else $jdu1=0;
                                    if(isset($_POST["jdu2"])) $jdu2 = intval($_POST["jdu2"]); else $jdu2=0;
                                    if(isset($_POST["jdu3"])) $jdu3 = intval($_POST["jdu3"]); else $jdu3=0;
                                    if(isset($_POST["jdu4"])) $jdu4 = intval($_POST["jdu4"]); else $jdu4=0;
                                    if(isset($_POST["jdu5"])) $jdu5 = intval($_POST["jdu5"]); else $jdu5=0;
                                    if(isset($_POST["jdu6"])) $jdu6 = intval($_POST["jdu6"]); else $jdu6=0;
                                    if(isset($_POST["jdu7"])) $jdu7 = intval($_POST["jdu7"]); else $jdu7=0;
                                    if(isset($_POST["jdu8"])) $jdu8 = intval($_POST["jdu8"]); else $jdu8=0;
                                    if(isset($_POST["jdu9"])) $jdu9 = intval($_POST["jdu9"]); else $jdu9=0;
                                    if(isset($_POST["jdu10"])) $jdu10 = intval($_POST["jdu10"]); else $jdu10=0;
                                    if(isset($_POST["jdu11"])) $jdu11 = intval($_POST["jdu11"]); else $jdu11=0;
                                    if(isset($_POST["jdu12"])) $jdu12 = intval($_POST["jdu12"]); else $jdu12=0;
                                    if(isset($_POST["jdu13"])) $jdu13 = intval($_POST["jdu13"]); else $jdu13=0;
                                    if(isset($_POST["jdu14"])) $jdu14 = intval($_POST["jdu14"]); else $jdu14=0;
                                    if(isset($_POST["jdu15"])) $jdu15 = intval($_POST["jdu15"]); else $jdu15=0;
                                    if(isset($_POST["jdu16"])) $jdu16 = intval($_POST["jdu16"]); else $jdu16=0;
                                    if(isset($_POST["jdu17"])) $jdu17 = intval($_POST["jdu17"]); else $jdu17=0;
                                    if(isset($_POST["jdu18"])) $jdu18 = intval($_POST["jdu18"]); else $jdu18=0;
                                    if(isset($_POST["jdu19"])) $jdu19 = intval($_POST["jdu19"]); else $jdu19=0;
                                    if(isset($_POST["jdu20"])) $jdu20 = intval($_POST["jdu20"]); else $jdu20=0;
                                    if(isset($_POST["jdu21"])) $jdu21 = intval($_POST["jdu21"]); else $jdu21=0;
                                    if(isset($_POST["jdu22"])) $jdu22 = intval($_POST["jdu22"]); else $jdu22=0;
                                    if(isset($_POST["jdu23"])) $jdu23 = intval($_POST["jdu23"]); else $jdu23=0;
                                    if(isset($_POST["jdu24"])) $jdu24 = intval($_POST["jdu24"]); else $jdu24=0;
                                   
                                    $total = $jdu1+$jdu2+$jdu3+$jdu4+$jdu5+$jdu6+$jdu7+$jdu8+$jdu9+$jdu10+$jdu11+$jdu12+$jdu13+$jdu14+$jdu15+$jdu16+$jdu17+$jdu18+$jdu19+$jdu20+$jdu21+$jdu22+$jdu23+$jdu24;

                                   ?>
                                   <h3 class="text-center"><?=$total?>/72 үнэлгээ авсан байна.</h3>
                                
                                <?php
                                if ($total < 35)  
                                echo "1c";
                               
                                if ($total >= 35 && $total < 70 ) 
                                echo "2c"; 
                                if ($total >= 70 && $total < 105 )
                                echo "3c";
                                if ($total >= 105 && $total < 140 )
                                echo "4c";
                                if ($total > "140")
                                echo "5c";
                                        
                                ?>
                                    
                                    <div class="text-center">
                                        <a href="assessment_jdu" class="btn btn-default btn-lg">Ахин тооцоолох</a>
                                    </div>

                                   <?
                                }
                                else 
                                {
                                    ?>
                                    <div class="contacts">
                                        <form method="post" action="assessment_jdu"  id="feedback-form" class="contact-form clear">
                                            <h3 class="text-center">ЖДҮ-ийн бүтээмж, сайжруулалтын хөтөлбөрийн анхан шатны үнэлгээ</h3>
                                            <p><i>Үнэлгээ:  0-илрэлгүй   1-заримдаа илэрнэ 2-ихэнхдээ илэрнэ 3-бүх талаар илэрнэ </i></p>
                                                <table class="table table-responsive mpo_assessment">
                                                    <thead>
                                                        <tr>
                                                            <th>Ангилал</th>
                                                            <th>№</th>
                                                            <th>Хяналтын цэг</th>
                                                            <th>0</th>
                                                            <th>1</th>
                                                            <th>2</th>
                                                            <th>3</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="2">Алдаа</td>
                                                            <td>1</td>
                                                            <td>Үйлчлүүлэгчид танай үйлчилгээний чанарын талаар гомдол гаргадаг уу?</td>
                                                            <td><input type="radio" name="jdu1" value="0"></td>
                                                            <td><input type="radio" name="jdu1" value="1"></td>
                                                            <td><input type="radio" name="jdu1" value="2"></td>
                                                            <td><input type="radio" name="jdu1" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>Алдааны улмаас давтан ажил хийдэг үү?</td>
                                                            <td><input type="radio" name="jdu2" value="0"></td>
                                                            <td><input type="radio" name="jdu2" value="1"></td>
                                                            <td><input type="radio" name="jdu2" value="2"></td>
                                                            <td><input type="radio" name="jdu2" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="3">Саатал, хоцролт</td>
                                                            <td>3</td>
                                                            <td>Ажлын урсгалыг удаашруулж байгаа саатал байна уу?</td>
                                                            <td><input type="radio" name="jdu3" value="0"></td>
                                                            <td><input type="radio" name="jdu3" value="1"></td>
                                                            <td><input type="radio" name="jdu3" value="2"></td>
                                                            <td><input type="radio" name="jdu3" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>Үйлчлүүлэгчид энэ үйлчилгээг авахын тулд дараалалд хүлээх хэрэгтэй юу?</td>
                                                            <td><input type="radio" name="jdu4" value="0"></td>
                                                            <td><input type="radio" name="jdu4" value="1"></td>
                                                            <td><input type="radio" name="jdu4" value="2"></td>
                                                            <td><input type="radio" name="jdu4" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>Дуусгаагүй ажил хуримтлагдсан уу?</td>
                                                            <td><input type="radio" name="jdu5" value="0"></td>
                                                            <td><input type="radio" name="jdu5" value="1"></td>
                                                            <td><input type="radio" name="jdu5" value="2"></td>
                                                            <td><input type="radio" name="jdu5" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="3">Сул зогсолт</td>
                                                            <td>6</td>
                                                            <td>Захиалга, даалгавар хүлээж байгаа эсвэл сул зогсож байгаа ажиллагсад бий юу?</td>
                                                            <td><input type="radio" name="jdu6" value="0"></td>
                                                            <td><input type="radio" name="jdu6" value="1"></td>
                                                            <td><input type="radio" name="jdu6" value="2"></td>
                                                            <td><input type="radio" name="jdu6" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>7</td>
                                                            <td>Байнга ашиглагддаггүй офис, тусгай хэрэгслүүд байдаг уу?</td>
                                                            <td><input type="radio" name="jdu7" value="0"></td>
                                                            <td><input type="radio" name="jdu7" value="1"></td>
                                                            <td><input type="radio" name="jdu7" value="2"></td>
                                                            <td><input type="radio" name="jdu7" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>8</td>
                                                            <td>Хэрэглэгдээгүй байгаа зай, байгууламж байна уу?</td>
                                                            <td><input type="radio" name="jdu8" value="0"></td>
                                                            <td><input type="radio" name="jdu8" value="1"></td>
                                                            <td><input type="radio" name="jdu8" value="2"></td>
                                                            <td><input type="radio" name="jdu8" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="3">Хэт ачаалал, жигд бус байдал</td>
                                                            <td>9</td>
                                                            <td>Өдрийн аль нэг цаг, 7 хоногийн аль нэг өдөр, жилийн аль нэг сард ажил хэвийн хэмжээнээс ихсэх үе бий юу?</td>
                                                            <td><input type="radio" name="jdu9" value="0"></td>
                                                            <td><input type="radio" name="jdu9" value="1"></td>
                                                            <td><input type="radio" name="jdu9" value="2"></td>
                                                            <td><input type="radio" name="jdu9" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td>Хэн нэг ажилчин бусдаасаа илүү ажил хариуцаж ажилладаг уу ?</td>
                                                            <td><input type="radio" name="jdu10" value="0"></td>
                                                            <td><input type="radio" name="jdu10" value="1"></td>
                                                            <td><input type="radio" name="jdu10" value="2"></td>
                                                            <td><input type="radio" name="jdu10" value="3"></td>                                                            
                                                        </tr>


                                                        <tr>
                                                            <td>11</td>
                                                            <td>Ажлыг дуусгахад илүү цагаар ажиллах шаардлагатай юу?</td>
                                                            <td><input type="radio" name="jdu11" value="0"></td>
                                                            <td><input type="radio" name="jdu11" value="1"></td>
                                                            <td><input type="radio" name="jdu11" value="2"></td>
                                                            <td><input type="radio" name="jdu11" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="3">Муу бүтэц болон технологи</td>
                                                            <td>12</td>
                                                            <td>Шинэ технологийн тусламжгүйгээр гар аргаар гүйцэтгэдэг процессууд байдаг уу?</td>
                                                            <td><input type="radio" name="jdu12" value="0"></td>
                                                            <td><input type="radio" name="jdu12" value="1"></td>
                                                            <td><input type="radio" name="jdu12" value="2"></td>
                                                            <td><input type="radio" name="jdu12" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>13</td>
                                                            <td>Жигд бус ажлын процессууд байдаг уу? </td>
                                                            <td><input type="radio" name="jdu13" value="0"></td>
                                                            <td><input type="radio" name="jdu13" value="1"></td>
                                                            <td><input type="radio" name="jdu13" value="2"></td>
                                                            <td><input type="radio" name="jdu13" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>14</td>
                                                            <td>Ажлын гүйцэтгэлд нөлөөлөх мэдээллийн дутагдал байна уу? </td>
                                                            <td><input type="radio" name="jdu14" value="0"></td>
                                                            <td><input type="radio" name="jdu14" value="1"></td>
                                                            <td><input type="radio" name="jdu14" value="2"></td>
                                                            <td><input type="radio" name="jdu14" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="4">Хог хаягдал </td>
                                                            <td>15</td>
                                                            <td>Баримт бичиг болон бусад хэвлэмэл материалуудын хэрэгцээгүй хуулбарууд байна уу?</td>
                                                            <td><input type="radio" name="jdu15" value="0"></td>
                                                            <td><input type="radio" name="jdu15" value="1"></td>
                                                            <td><input type="radio" name="jdu15" value="2"></td>
                                                            <td><input type="radio" name="jdu15" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>16</td>
                                                            <td>Шаардлагагүй, их тоо хэмжээтэй хангамжийн материалууд байна уу?</td>
                                                            <td><input type="radio" name="jdu16" value="0"></td>
                                                            <td><input type="radio" name="jdu16" value="1"></td>
                                                            <td><input type="radio" name="jdu16" value="2"></td>
                                                            <td><input type="radio" name="jdu16" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>17</td>
                                                            <td>Эрчим хүчний хэт их хэрэглээ байгаа юу?  – бензин, цахилгаан гэх мэт</td>
                                                            <td><input type="radio" name="jdu17" value="0"></td>
                                                            <td><input type="radio" name="jdu17" value="1"></td>
                                                            <td><input type="radio" name="jdu17" value="2"></td>
                                                            <td><input type="radio" name="jdu17" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>18</td>
                                                            <td>Доголдсон, эвдэрсэн тоног төхөөрөмж, байгууламж байна уу?</td>
                                                            <td><input type="radio" name="jdu18" value="0"></td>
                                                            <td><input type="radio" name="jdu18" value="1"></td>
                                                            <td><input type="radio" name="jdu18" value="2"></td>
                                                            <td><input type="radio" name="jdu18" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="3">Аюул</td>
                                                            <td>19</td>
                                                            <td>Үйлчлүүлэгчдийн эрүүл мэнд, аюулгүй ажиллагаа, аюулгүй байдалд заналхийлж буй аюулууд байдаг уу?</td>
                                                            <td><input type="radio" name="jdu19" value="0"></td>
                                                            <td><input type="radio" name="jdu19" value="1"></td>
                                                            <td><input type="radio" name="jdu19" value="2"></td>
                                                            <td><input type="radio" name="jdu19" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>20</td>
                                                            <td>Ажилчдын эрүүл мэнд, аюулгүй байдалд заналхийлж буй аюулууд бий юу?</td>
                                                            <td><input type="radio" name="jdu20" value="0"></td>
                                                            <td><input type="radio" name="jdu20" value="1"></td>
                                                            <td><input type="radio" name="jdu20" value="2"></td>
                                                            <td><input type="radio" name="jdu20" value="3"></td>                                                            
                                                        </tr>


                                                        <tr>
                                                            <td>21</td>
                                                            <td>Баримт бичиг, тоног төхөөрөмж, байгууламж болон бусад эд хөрөнгийн аюулгүй байдалд заналхийлж болох эрсдлүүд байна уу?</td>
                                                            <td><input type="radio" name="jdu21" value="0"></td>
                                                            <td><input type="radio" name="jdu21" value="1"></td>
                                                            <td><input type="radio" name="jdu21" value="2"></td>
                                                            <td><input type="radio" name="jdu21" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="3">Ажилчдын мэдлэг идэвхжүүлэлт хангалтгүй</td>
                                                            <td>22</td>
                                                            <td>Ажилтнуудаас гомдол гаргадаг уу?</td>
                                                            <td><input type="radio" name="jdu22" value="0"></td>
                                                            <td><input type="radio" name="jdu22" value="1"></td>
                                                            <td><input type="radio" name="jdu22" value="2"></td>
                                                            <td><input type="radio" name="jdu22" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>23</td>
                                                            <td>Ажилтнууд системгүй, дураараа загнах байдал байгаа юу?</td>
                                                            <td><input type="radio" name="jdu23" value="0"></td>
                                                            <td><input type="radio" name="jdu23" value="1"></td>
                                                            <td><input type="radio" name="jdu23" value="2"></td>
                                                            <td><input type="radio" name="jdu23" value="3"></td>                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>24</td>
                                                            <td>Ажилтнууд өөрчлөлтийг эсэргүүцдэг үү? </td>
                                                            <td><input type="radio" name="jdu24" value="0"></td>
                                                            <td><input type="radio" name="jdu24" value="1"></td>
                                                            <td><input type="radio" name="jdu24" value="2"></td>
                                                            <td><input type="radio" name="jdu24" value="3"></td>                                                            
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
