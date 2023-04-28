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
                                    $climate1 = $_POST["climate1"];
                                    $climate2 = $_POST["climate2"];
                                    $climate3 = $_POST["climate3"];
                                    $climate4 = $_POST["climate4"];
                                    $climate5 = $_POST["climate5"];
                                    $climate6 = intval($_POST["climate6"]);
                                    $climate7 = intval($_POST["climate7"]);
                                    $climate8 = intval($_POST["climate8"]);
                                    $climate9 = intval($_POST["climate9"]);
                                    $climate10 =intval($_POST["climate10"]);
                                    $climate11 = intval($_POST["climate11"]);
                                    $climate12 = intval($_POST["climate12"]);
                                    $climate13 = intval($_POST["climate13"]);
                                    $climate14 = intval($_POST["climate14"]);
                                    $climate15 = intval($_POST["climate15"]);
                                    $climate16 = intval($_POST["climate16"]);
                                    $climate17 = intval($_POST["climate17"]);
                                    $climate18 = intval($_POST["climate18"]);
                                    $climate19 = intval($_POST["climate19"]);
                                    $climate20 =intval($_POST["climate20"]);
                                    $climate21 = intval($_POST["climate21"]);
                                    $climate22 = intval($_POST["climate22"]);
                                    $climate23 = intval($_POST["climate23"]);
                                    $climate24 = intval($_POST["climate24"]);
                                    $climate25 = intval($_POST["climate25"]);
                                    $climate26 = $_POST["climate26"];
                                    $climate27 = $_POST["climate27"];
                                   
                                   

                                   ?>
                                   <h3 class="text-center">Үнэлэгээ авлаа</h3>
                                  

                                    <div class="text-center">
                                        <a href="assessment_climate" class="btn btn-default btn-lg">Ахин тооцоолох</a>
                                    </div>



                                   <?
                                }
                                else 
                                {
                                    ?>
                                    <div class="contacts">
                                        <form method="post" action="assessment_climate"  id="feedback-form" class="contact-form clear">
                                            <h3 class="text-center">БАЙГУУЛЛАГЫН УУР АМЬСГАЛЫН СУДАЛГААНЫ ТАЛААР</h3>
                                            <h3>Байгууллагын уур амьсгалын судалгаа гэж юу вэ?</h3>
                                            <p>Байгууллагын уур амьсгалын судалгаа нь удирдлага, ажиллагсад  хоорондын харилцаа холбоо, ажиллагсад  ажлын байран дээрээ хөгжих боломж, мөн алба, хэлтэс, нэгжүүдийн хоорондын уялдаа холбоо үр дүнтэй явагддаг эсэх, шинэ санаа санаачлагыг удирдлагын зүгээс дэмждэг эсэх, ажиллагсад өөрсдийн ажилдаа сэтгэл ханамжтай байдаг зэрэг асуудлуудыг тодорхойлох зорилгоор асуулгын аргаар явуулдаг товч судлагааны арга хэрэгсэл юм.</p>
                                            <h3>Байгууллагын уур амьсгалын судалгааны зорилго</h3>
                                            <p>Энэхүү судалгааны арга хэрэгсэл нь байгууллагад бүтээмжийн хөдөлгөөн өрнүүлэхэд нөлөөлөх ажиллагсдын  ажилд  хандах хандлагыг тодорхойлох, бүтээмжийг сайжруулах боломжтой талбар, үйл ажиллагааг тодорхойлох, байгууллагын дотоод давуу талыг тодорхойлж, анхан шатны дүн шинжилгээ хийх, мөн цаашид гаргасан ахиц дэвшилдээ тогтмол хяналт тавихад Тань чиглүүлэг болох ач холбогдолтой юм. </p>
                                            <h3>Судалгааг хэрхэн бөглөх вэ?</h3>
                                            <p>Уг асуулга нь нийт 22 асуултаас бүрдэх ба асуулт болгонд 'Огт үгүй', 'Үгүй', 'Итгэлгүй байна', 'Тийм', 'Үнэхээр тийм' гэсэн хариултуудаас сонгоно. Сүүлийн 2 асуулт нээлттэй асуулт тул хариултаа бөглөж бичнэ. Судалгааг бөглөж дуусаад 'Илгээх' товчийг дарснаар Таны судалгаа илгээгдэнэ. Уг судалгаа нь байгууллагын захиалгаар нээгдэх ба тодорхой заасан хугацаанд тухайн байгууллагын ажилтнууд нэвтэрч, судалгааг бөглөх юм. Судалгаанд ажилтнууд хамрагдаж дуусмагц судалгааг хааж, дүгнэлт хариуцсан ажилтан руу и-мэйлээр илгээгдэх болно. </p>
                                            


                                                <table class="table table-responsive mpo_assessment">
                                                    <thead>
                                                        <tr>
                                                            <th width="50">Асуулга</th>
                                                            <th width="50">Хариулт</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td >Хүйс:</td>
                                                           
                                                            <td>
                                                                <SELECT name="climate1" class="form-control">
                                                                    <option value="0">Эмэгтэй</option>
                                                                    <option value="1">Эрэгтэй</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Нас:</td>
                                                            <td>
                                                                <input type="text" name="climate2" class="form-control"></input>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Тасаг хэлтэс:</td>
                                                            <td>
                                                                <input type="text" name="climate3" class="form-control"></input>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Албан тушаал:</td>
                                                            <td>
                                                                <input type="text" name="climate4" class="form-control"></input>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ажилласан жил:</td>
                                                            <td>
                                                                <input type="text" name="climate5" class="form-control"></input>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>1.Таны удирдлага танд компанийн зорилгыг ойлгомжтойгоор тайлбарлаж өгдөг үү?</td>
                                                            <td>
                                                                <SELECT name="climate6" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.Та ажилдаа сонирхолтой юу?</td>
                                                            <td>
                                                                <SELECT name="climate7" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3.Таны ажил хэцүү буюу төвөгтэй байдаг уу?</td>
                                                            <td>
                                                                <SELECT name="climate8" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.Та ажлаасаа сэтгэл ханамж авдаг уу?</td>
                                                            <td>
                                                                <SELECT name="climate9" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5.Та удирдах ажилтнаа хангалттай ажлаа гүйцэтгэдэг гэж  тодорхойлж чадах уу?</td>
                                                            <td>
                                                                <SELECT name="climate10" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6.Та өөрийгөө хөгжүүлэх зорилгоор сургалтад хангалттай хамрагддаг уу?</td>
                                                            <td>
                                                                <SELECT name="climate11" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7.Таны шууд удирдлага тантай таны ажлын гүйцэтгэл, цаашдын өсөлт, хөгжлийн талаар ярилцдаг уу?</td>
                                                            <td>
                                                                <SELECT name="climate12" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>8.Танай байгууллагын удирдлага ажилтнуудын хооронд хангалттай хэмжээний итгэлцэлтэй байж, харилцан ойлголцож чаддаг уу?</td>
                                                            <td>
                                                                <SELECT name="climate13" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>9.Таны бодлоор танай хэлтэс/нэгжийн багийн ажиллагаа маш сайн байж чадаж байгаа юу?</td>
                                                            <td>
                                                                <SELECT name="climate14" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>10.Таны бодлоор танай компанид сайн карьер хөгжлийн болон бусад боломжууд байгаа гэж үздэг үү?</td>
                                                            <td>
                                                                <SELECT name="climate15" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>11.Таны бодлоор таны шууд удирдлага бүх хүмүүстэй ижил түвшинд /жигд/ харьцдаг уу ?</td>
                                                            <td>
                                                                <SELECT name="climate16" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>12.Та удирдлагынхаа хэлсэн бүхэнд итгэлтэй байж, дагаж ажиллаж чаддаг уу ?</td>
                                                            <td>
                                                                <SELECT name="climate17" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>13.Танай компанид ажилтнуудын хоорондын харилцаа холбоо үр нөлөөтэй /сайн/ байдаг уу?</td>
                                                            <td>
                                                                <SELECT name="climate18" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>14.Танай байгууллагын удирдлага болон ажилтнуудын хоорондын харилцаа холбоо сайн үр дүнтэй байдаг уу?</td>
                                                            <td>
                                                                <SELECT name="climate19" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>15.Танай компанид алба/хэлтэс нэгжүүдийн хоорондын харилцаа, уялдаа холбоо үр дүнтэй явагддаг уу?</td>
                                                            <td>
                                                                <SELECT name="climate20" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>16.Таны бодлоор  ажилтнуудын санал санаачилгыг удирдлагын зүгээс дэмждэг үү?</td>
                                                            <td>
                                                                <SELECT name="climate21" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>17.Танай компани таны төсөөлж  байгаагаас илүү амжилтад хүрнэ гэдэгт итгэлтэй байдаг уу?</td>
                                                            <td>
                                                                <SELECT name="climate22" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>18.Ирэх 5 жилд та өөрийн компанидаа үргэлжлүүлж ажиллахыг хүсэж байна уу ?</td>
                                                            <td>
                                                                <SELECT name="climate23" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>19.Чанартай үйлчилгээгээр хэрэглэгч, хамтран ажиллагч нараа хангах нь танд чухал байдаг уу?</td>
                                                            <td>
                                                                <SELECT name="climate24" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>20.Танай компани дээр  бүтээмж, чанарын үйл ажиллагаа явагдвал та идэвхтэй оролцох уу?</td>
                                                            <td>
                                                                <SELECT name="climate25" class="form-control">
                                                                    <option value="0">Огт үгүй</option>
                                                                    <option value="1">Үгүй</option>
                                                                    <option value="2">Итгэлгүй байна</option>
                                                                    <option value="3">Тийм</option>
                                                                    <option value="4">Үнэхээр тийм</option>
                                                                </SELECT>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>21.Миний ажил дээр доорх асуудлууд/бэрхшээлүүд тулгарч байна: </td>
                                                            <td>
                                                                <input type="text" name="climate26" class="form-control"></input>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>22.Миний зүгээс сайжруулах санал: </td>
                                                            <td>
                                                                <input type="text" name="climate27" class="form-control"></input>
                                                            </td>
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
    <!-- <script type="text/javascript" src="assets/js/popper.min.js"></script> -->
    
    <script type="text/javascript" src="assets/js/custom.js"></script>
   
</body>

</html>
