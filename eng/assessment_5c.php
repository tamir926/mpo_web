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
                                    $c1 = intval($_POST["c1"]);
                                    $c2 = intval($_POST["c2"]);
                                    $c3 = intval($_POST["c3"]);
                                    $c4 = intval($_POST["c4"]);
                                    $c5 = intval($_POST["c5"]);
                                    $c6 = intval($_POST["c6"]);
                                    $c7 = intval($_POST["c7"]);
                                    $c8 = intval($_POST["c8"]);
                                    $c9 = intval($_POST["c9"]);
                                    $c10 = intval($_POST["c10"]);
                                    $c11 = intval($_POST["c11"]);
                                    $c12 = intval($_POST["c12"]);
                                    $c13 = intval($_POST["c13"]);
                                    $c14 = intval($_POST["c14"]);
                                    $c15 = intval($_POST["c15"]);
                                    $c16 = intval($_POST["c16"]);
                                    $c17 = intval($_POST["c17"]);
                                    $c18 = intval($_POST["c18"]);
                                    $c19 = intval($_POST["c19"]);
                                    $c20 = intval($_POST["c20"]);
                                    $c21 = intval($_POST["c21"]);
                                    $c22 = intval($_POST["c22"]);
                                    $c23 = intval($_POST["c23"]);
                                    $c24 = intval($_POST["c24"]);
                                    $c25 = intval($_POST["c25"]);
                                    $c26 = intval($_POST["c26"]);
                                    $c27 = intval($_POST["c27"]);
                                    $c28 = intval($_POST["c28"]);
                                    $c29 = intval($_POST["c29"]);
                                    $c30 = intval($_POST["c30"]);
                                    $c31 = intval($_POST["c31"]);
                                    $c32 = intval($_POST["c32"]);
                                    $c33 = intval($_POST["c33"]);
                                    $c34 = intval($_POST["c34"]);
                                    $total = $c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9+$c10+$c11+$c12+$c13+$c14+$c15+$c16+$c17+$c18+$c19+$c20+$c21+$c22+$c23+$c24+$c25+$c26+$c27+$c28+$c29+$c30+$c31+$c32+$c33+$c34;

                                   ?>
                                   <h3 class="text-center"><?=$total?>/170 үнэлгээ авсан байна.</h3>
                                  
                                   
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
                                        <a href="assessment_5c" class="btn btn-default btn-lg">Ахин тооцоолох</a>
                                    </div>



                                   <?
                                }
                                else 
                                {
                                    ?>
                                    <div class="contacts">
                                        <form method="post" action="assessment_5c"  id="feedback-form" class="contact-form clear">
                                            <h3 class="text-center">АЖЛЫН БАЙРНЫ СОЁЛ 5С</h3>
                                                <table class="table table-responsive mpo_assessment">
                                                    <thead>
                                                        <tr>
                                                            <th>Ангилал</th>
                                                            <th>№</th>
                                                            <th>Шалгуур</th>
                                                            <th>5</th>
                                                            <th>4</th>
                                                            <th>3</th>
                                                            <th>2</th>
                                                            <th>1</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="5">5С-ийн бодлого</td>
                                                            <td>1</td>
                                                            <td>5С-ийн бодлого сайн боловсруулагдсан.</td>
                                                            <td><input type="radio" id="c1" name="c1" value="5"></td>
                                                            <td><input type="radio" id="c1" name="c1" value="4"></td>
                                                            <td><input type="radio" id="c1" name="c1" value="3"></td>
                                                            <td><input type="radio" id="c1" name="c1" value="2"></td>
                                                            <td><input type="radio" id="c1" name="c1" value="1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Бүх шатны ажилтнуудад ойлгомжтой.</td>
                                                            <td><input type="radio" id="c2" name="c2" value="5"></td>
                                                            <td><input type="radio" id="c2" name="c2" value="4"></td>
                                                            <td><input type="radio" id="c2" name="c2" value="3"></td>
                                                            <td><input type="radio" id="c2" name="c2" value="2"></td>
                                                            <td><input type="radio" id="c2" name="c2" value="1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Гүйцэтгэх захирлаар батлуулсан.</td>
                                                            <td><input type="radio" id="c3" name="c3" value="5"></td>
                                                            <td><input type="radio" id="c3" name="c3" value="4"></td>
                                                            <td><input type="radio" id="c3" name="c3" value="3"></td>
                                                            <td><input type="radio" id="c3" name="c3" value="2"></td>
                                                            <td><input type="radio" id="c3" name="c3" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Цэвэр цэмцгэр, хэрэгцээтэй газруудад байрлуулсан.</td>
                                                            <td><input type="radio" id="c4" name="c4" value="5"></td>
                                                            <td><input type="radio" id="c4" name="c4" value="4"></td>
                                                            <td><input type="radio" id="c4" name="c4" value="3"></td>
                                                            <td><input type="radio" id="c4" name="c4" value="2"></td>
                                                            <td><input type="radio" id="c4" name="c4" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>5С-ийн хэрэгжүүлэлтэд шаардлагатай мэдээллүүд багтсан.</td>
                                                            <td><input type="radio" id="c5" name="c5" value="5"></td>
                                                            <td><input type="radio" id="c5" name="c5" value="4"></td>
                                                            <td><input type="radio" id="c5" name="c5" value="3"></td>
                                                            <td><input type="radio" id="c5" name="c5" value="2"></td>
                                                            <td><input type="radio" id="c5" name="c5" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">5С-ийн бүтцийн схем</td>
                                                            <td>6</td>
                                                            <td>Байгууллагын 5С-ийн булангаас харахад хялбар</td>
                                                            <td><input type="radio" id="c6" name="c6" value="5"></td>
                                                            <td><input type="radio" id="c6" name="c6" value="4"></td>
                                                            <td><input type="radio" id="c6" name="c6" value="3"></td>
                                                            <td><input type="radio" id="c6" name="c6" value="2"></td>
                                                            <td><input type="radio" id="c6" name="c6" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>5С-ийг үр дүнтэй хэрэгжүүлэхэд хялбар сайн бэлтгэсэн</td>
                                                            <td><input type="radio" id="c7" name="c7" value="5"></td>
                                                            <td><input type="radio" id="c7" name="c7" value="4"></td>
                                                            <td><input type="radio" id="c7" name="c7" value="3"></td>
                                                            <td><input type="radio" id="c7" name="c7" value="2"></td>
                                                            <td><input type="radio" id="c7" name="c7" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">5С-ийн булан</td>
                                                            <td>8</td>
                                                            <td>Стратегийн ач холбогдол бүхий газар байрлуулсан, байнга хэрэглэгддэг</td>
                                                            <td><input type="radio" id="c8" name="c8" value="5"></td>
                                                            <td><input type="radio" id="c8" name="c8" value="4"></td>
                                                            <td><input type="radio" id="c8" name="c8" value="3"></td>
                                                            <td><input type="radio" id="c8" name="c8" value="2"></td>
                                                            <td><input type="radio" id="c8" name="c8" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>5С-ийн булан дахь мэдээлэл нь шинэ, байнга сайжруулагддаг, сонирхол татам</td>
                                                            <td><input type="radio" id="c9" name="c9" value="5"></td>
                                                            <td><input type="radio" id="c9" name="c9" value="4"></td>
                                                            <td><input type="radio" id="c9" name="c9" value="3"></td>
                                                            <td><input type="radio" id="c9" name="c9" value="2"></td>
                                                            <td><input type="radio" id="c9" name="c9" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">5С-ийн багуудын нэр, булан</td>
                                                            <td>10</td>
                                                            <td>5С-ийн багууд нэртэй, фото зургууд нь 5С-ийн буланд тавигдсан.</td>
                                                            <td><input type="radio" id="c10" name="c10" value="5"></td>
                                                            <td><input type="radio" id="c10" name="c10" value="4"></td>
                                                            <td><input type="radio" id="c10" name="c10" value="3"></td>
                                                            <td><input type="radio" id="c10" name="c10" value="2"></td>
                                                            <td><input type="radio" id="c10" name="c10" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Багийн гишүүд өөр өөрийн үүрэг оролцоотой.</td>
                                                            <td><input type="radio" id="c11" name="c11" value="5"></td>
                                                            <td><input type="radio" id="c11" name="c11" value="4"></td>
                                                            <td><input type="radio" id="c11" name="c11" value="3"></td>
                                                            <td><input type="radio" id="c11" name="c11" value="2"></td>
                                                            <td><input type="radio" id="c11" name="c11" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td>Багууд 5С-ийн булангаа сайн ашигладаг.</td>
                                                            <td><input type="radio" id="c12" name="c12" value="5"></td>
                                                            <td><input type="radio" id="c12" name="c12" value="4"></td>
                                                            <td><input type="radio" id="c12" name="c12" value="3"></td>
                                                            <td><input type="radio" id="c12" name="c12" value="2"></td>
                                                            <td><input type="radio" id="c12" name="c12" value="1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">5С хэрэгжүүлэлтийн төлөвлөлт  - Гантын хүснэгтээр</td>
                                                            <td>13</td>
                                                            <td>Гантын хүснэгтийг удирдах зөвлөлөөс гаргаж 5С-ийн буланд байрлуулсан.</td>
                                                            <td><input type="radio" id="c13" name="c13" value="5"></td>
                                                            <td><input type="radio" id="c13" name="c13" value="4"></td>
                                                            <td><input type="radio" id="c13" name="c13" value="3"></td>
                                                            <td><input type="radio" id="c13" name="c13" value="2"></td>
                                                            <td><input type="radio" id="c13" name="c13" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td>Гантын хүснэгтэд 5С-ыг амжилттай хэрэгжүүлэхэд нөлөөлөх үйл ажиллагааг нарийвчлан тусгаж чадсан.</td>
                                                            <td><input type="radio" id="c14" name="c14" value="5"></td>
                                                            <td><input type="radio" id="c14" name="c14" value="4"></td>
                                                            <td><input type="radio" id="c14" name="c14" value="3"></td>
                                                            <td><input type="radio" id="c14" name="c14" value="2"></td>
                                                            <td><input type="radio" id="c14" name="c14" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>15</td>
                                                            <td>Удирдлага болон баг хуваарийн дагуу бүх үйл ажиллагааг явуулдаг.</td>
                                                            <td><input type="radio" id="c15" name="c15" value="5"></td>
                                                            <td><input type="radio" id="c15" name="c15" value="4"></td>
                                                            <td><input type="radio" id="c15" name="c15" value="3"></td>
                                                            <td><input type="radio" id="c15" name="c15" value="2"></td>
                                                            <td><input type="radio" id="c15" name="c15" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>16</td>
                                                            <td>Уулзалт ярилцлагын хугацааг удирдах зөвлөлөөс тогтоосон.</td>
                                                            <td><input type="radio" id="c16" name="c16" value="5"></td>
                                                            <td><input type="radio" id="c16" name="c16" value="4"></td>
                                                            <td><input type="radio" id="c16" name="c16" value="3"></td>
                                                            <td><input type="radio" id="c16" name="c16" value="2"></td>
                                                            <td><input type="radio" id="c16" name="c16" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">5С-ийн багийн ажлын тэмдэглэл</td>
                                                            <td>17</td>
                                                            <td>Багийн уулзалтын хугацааг тэмдэглэсэн.</td>
                                                            <td><input type="radio" id="c17" name="c17" value="5"></td>
                                                            <td><input type="radio" id="c17" name="c17" value="4"></td>
                                                            <td><input type="radio" id="c17" name="c17" value="3"></td>
                                                            <td><input type="radio" id="c17" name="c17" value="2"></td>
                                                            <td><input type="radio" id="c17" name="c17" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>18</td>
                                                            <td>5С-ын буланд багийн уулзалт, ярилцлагын хуваарийг байрлуулсан.</td>
                                                            <td><input type="radio" id="c18" name="c18" value="5"></td>
                                                            <td><input type="radio" id="c18" name="c18" value="4"></td>
                                                            <td><input type="radio" id="c18" name="c18" value="3"></td>
                                                            <td><input type="radio" id="c18" name="c18" value="2"></td>
                                                            <td><input type="radio" id="c18" name="c18" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>19</td>
                                                            <td>Тасралтгүй сайжруулалтын үр дүнг тэмдэглэж, зураг , схем, баримтаар харуулж, бусад багийн гишүүдтэй хуваалцдаг.</td>
                                                            <td><input type="radio" id="c19" name="c19" value="5"></td>
                                                            <td><input type="radio" id="c19" name="c19" value="4"></td>
                                                            <td><input type="radio" id="c19" name="c19" value="3"></td>
                                                            <td><input type="radio" id="c19" name="c19" value="2"></td>
                                                            <td><input type="radio" id="c19" name="c19" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">Сахилна бат, ажилчдын хандлага</td>
                                                            <td>20</td>
                                                            <td>5С-ыг хэрэгжүүлснээр байгууллагын ажилчид сайн сахилга баттай, зөв хандлагатай болсон гэсэн илрэл байгаа.</td>
                                                            <td><input type="radio" id="c20" name="c20" value="5"></td>
                                                            <td><input type="radio" id="c20" name="c20" value="4"></td>
                                                            <td><input type="radio" id="c20" name="c20" value="3"></td>
                                                            <td><input type="radio" id="c20" name="c20" value="2"></td>
                                                            <td><input type="radio" id="c20" name="c20" value="1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>21</td>
                                                            <td>Аюулгүй ажиллагааны талаарх мэдлэг <br>Хөдөлмөр хамгааллын хувцас, багаж, тоног төхөөрөмжийг хэрэглэдэг.</td>
                                                            <td><input type="radio" id="c21" name="c21" value="5"></td>
                                                            <td><input type="radio" id="c21" name="c21" value="4"></td>
                                                            <td><input type="radio" id="c21" name="c21" value="3"></td>
                                                            <td><input type="radio" id="c21" name="c21" value="2"></td>
                                                            <td><input type="radio" id="c21" name="c21" value="1"></td>

                                                        </tr>
                                                       
                                                        <tr>
                                                            <td>Ажилчдын сургалт, хөгжил</td>
                                                            <td>22</td>
                                                            <td>5С-ийн сургалт, менежерүүдэд зориулсан сургалт, арга зүйн сургалт болон давтамж</td>
                                                            <td><input type="radio" id="c22" name="c22" value="5"></td>
                                                            <td><input type="radio" id="c22" name="c22" value="4"></td>
                                                            <td><input type="radio" id="c22" name="c22" value="3"></td>
                                                            <td><input type="radio" id="c22" name="c22" value="2"></td>
                                                            <td><input type="radio" id="c22" name="c22" value="1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Идэвхжүүлэлт</td>
                                                            <td>23</td>
                                                            <td>-Ярилцлага/ Оюуны довтолгоо<br>-Зурагт хуудас<br>-Их цэвэрлэгээ<br>-7 хоног, сарын цуглаан                                                            </td>
                                                            <td><input type="radio" id="c23" name="c23" value="5"></td>
                                                            <td><input type="radio" id="c23" name="c23" value="4"></td>
                                                            <td><input type="radio" id="c23" name="c23" value="3"></td>
                                                            <td><input type="radio" id="c23" name="c23" value="2"></td>
                                                            <td><input type="radio" id="c23" name="c23" value="1"></td>

                                                        </tr>
                                                        <tr>
                                                            <td>Шагнал урамшуулал</td>
                                                            <td>24</td>
                                                            <td>-Захидал<br>-Хөнгөлөлтийн карт<br>-Урамшуулал<br>-Бонус<br>-Бусад</td>
                                                            <td><input type="radio" id="c24" name="c24" value="5"></td>
                                                            <td><input type="radio" id="c24" name="c24" value="4"></td>
                                                            <td><input type="radio" id="c24" name="c24" value="3"></td>
                                                            <td><input type="radio" id="c24" name="c24" value="2"></td>
                                                            <td><input type="radio" id="c24" name="c24" value="1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">Үр дүнтэй үнэлгээ</td>
                                                            <td>25</td>
                                                            <td>5С-ийн дотоод аудитын давтамж</td>
                                                            <td><input type="radio" id="c25" name="c25" value="5"></td>
                                                            <td><input type="radio" id="c25" name="c25" value="4"></td>
                                                            <td><input type="radio" id="c25" name="c25" value="3"></td>
                                                            <td><input type="radio" id="c25" name="c25" value="2"></td>
                                                            <td><input type="radio" id="c25" name="c25" value="1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>26</td>
                                                            <td>Аудитын шалгуур хэрэглэхэд хялбар, бүрэн боловсруулсан.</td>
                                                            <td><input type="radio" id="c26" name="c26" value="5"></td>
                                                            <td><input type="radio" id="c26" name="c26" value="4"></td>
                                                            <td><input type="radio" id="c26" name="c26" value="3"></td>
                                                            <td><input type="radio" id="c26" name="c26" value="2"></td>
                                                            <td><input type="radio" id="c26" name="c26" value="1"></td>


                                                        </tr>
                                                        <tr>
                                                            <td>27</td>
                                                            <td>Аудитын үнэлгээ ажилтнуудын мэдлэг мэдээллийг нэмэгдүүлэхийн тулд дэлгэж харуулсан байна.</td>
                                                            <td><input type="radio" id="c27" name="c27" value="5"></td>
                                                            <td><input type="radio" id="c27" name="c27" value="4"></td>
                                                            <td><input type="radio" id="c27" name="c27" value="3"></td>
                                                            <td><input type="radio" id="c27" name="c27" value="2"></td>
                                                            <td><input type="radio" id="c27" name="c27" value="1"></td>


                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">Удирдлагын хяналт</td>
                                                            <td>28</td>
                                                            <td>Давтамж</td>
                                                            <td><input type="radio" id="c28" name="c28" value="5"></td>
                                                            <td><input type="radio" id="c28" name="c28" value="4"></td>
                                                            <td><input type="radio" id="c28" name="c28" value="3"></td>
                                                            <td><input type="radio" id="c28" name="c28" value="2"></td>
                                                            <td><input type="radio" id="c28" name="c28" value="1"></td>


                                                        </tr>
                                                        <tr>
                                                            <td>29</td>
                                                            <td>Сайжруулалтын төсөв</td>
                                                            <td><input type="radio" id="c29" name="c29" value="5"></td>
                                                            <td><input type="radio" id="c29" name="c29" value="4"></td>
                                                            <td><input type="radio" id="c29" name="c29" value="3"></td>
                                                            <td><input type="radio" id="c29" name="c29" value="2"></td>
                                                            <td><input type="radio" id="c29" name="c29" value="1"></td>


                                                        </tr>
                                                        <tr>
                                                            <td>30</td>
                                                            <td>Хэрэглэгчид чиглэсэн үнэ цэнэ, бодлого, хөтөлбөрүүд байдаг уу?</td>
                                                            <td><input type="radio" id="c30" name="c30" value="5"></td>
                                                            <td><input type="radio" id="c30" name="c30" value="4"></td>
                                                            <td><input type="radio" id="c30" name="c30" value="3"></td>
                                                            <td><input type="radio" id="c30" name="c30" value="2"></td>
                                                            <td><input type="radio" id="c30" name="c30" value="1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>31</td>
                                                            <td>Хэрэглэгчийн одоогийн/ирээдүйн хүлээлтийг тодорхойлдог уу?</td>
                                                            <td><input type="radio" id="c31" name="c31" value="5"></td>
                                                            <td><input type="radio" id="c31" name="c31" value="4"></td>
                                                            <td><input type="radio" id="c31" name="c31" value="3"></td>
                                                            <td><input type="radio" id="c31" name="c31" value="2"></td>
                                                            <td><input type="radio" id="c31" name="c31" value="1"></td>


                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">Хэрэглэгчийн үйлчилгээ</td>
                                                            <td>32</td>
                                                            <td>Хэрэглэгчийн процессыг тодорхойлсон уу?</td>
                                                            <td><input type="radio" id="c32" name="c32" value="5"></td>
                                                            <td><input type="radio" id="c32" name="c32" value="4"></td>
                                                            <td><input type="radio" id="c32" name="c32" value="3"></td>
                                                            <td><input type="radio" id="c32" name="c32" value="2"></td>
                                                            <td><input type="radio" id="c32" name="c32" value="1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>33</td>
                                                            <td>Хэрэглэгчийн сэтгэл ханамжийг дээшлүүлэхэд ажилчид оролцдог уу?</td>
                                                            <td><input type="radio" id="c33" name="c33" value="5"></td>
                                                            <td><input type="radio" id="c33" name="c33" value="4"></td>
                                                            <td><input type="radio" id="c33" name="c33" value="3"></td>
                                                            <td><input type="radio" id="c33" name="c33" value="2"></td>
                                                            <td><input type="radio" id="c33" name="c33" value="1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>34</td>
                                                            <td>Хэрэглэгчийн талаарх мэдээллийг цуглуулж , сэтгэл ханамжийн судалгааг авдаг уу?</td>
                                                            <td><input type="radio" id="c34" name="c34" value="5"></td>
                                                            <td><input type="radio" id="c34" name="c34" value="4"></td>
                                                            <td><input type="radio" id="c34" name="c34" value="3"></td>
                                                            <td><input type="radio" id="c34" name="c34" value="2"></td>
                                                            <td><input type="radio" id="c34" name="c34" value="1"></td>
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
