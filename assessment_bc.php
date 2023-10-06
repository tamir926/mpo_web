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
                                    $bc1_1 = intval($_POST["bc1_1"]);
                                    $bc1_2 = intval($_POST["bc1_2"]);
                                    $bc1_3 = intval($_POST["bc1_3"]);
                                    $bc1_4 = intval($_POST["bc1_4"]);
                                    $bc1_5 = intval($_POST["bc1_5"]);
                                    $bc1_6 = intval($_POST["bc1_6"]);
                                    
                                    $bc1 = $bc1_1+$bc1_2+$bc1_3+$bc1_4+$bc1_5+$bc1_6;

                                    $bc2_1 = intval($_POST["bc2_1"]);
                                    $bc2_2 = intval($_POST["bc2_2"]);
                                    $bc2_3 = intval($_POST["bc2_3"]);
                                    $bc2_4 = intval($_POST["bc2_4"]);
                                    $bc2_5 = intval($_POST["bc2_5"]);
                                    $bc2_6 = intval($_POST["bc2_6"]);
                                    $bc2_7 = intval($_POST["bc2_7"]);
                                    $bc2_8 = intval($_POST["bc2_8"]);
                                    $bc2_9 = intval($_POST["bc2_9"]);
                                    $bc2_10 = intval($_POST["bc2_10"]);
                                    $bc2_11 = intval($_POST["bc2_11"]);
                                    $bc2 = $bc2_1+$bc2_2+$bc2_3+$bc2_4+$bc2_5+$bc2_6+$bc2_7+$bc2_8+$bc2_9+$bc2_10+$bc2_11;

                                    $bc3_1 = intval($_POST["bc3_1"]);
                                    $bc3_2 = intval($_POST["bc3_2"]);
                                    $bc3_3 = intval($_POST["bc3_3"]);
                                    $bc3_4 = intval($_POST["bc3_4"]);
                                    $bc3_5 = intval($_POST["bc3_5"]);
                                    $bc3_6 = intval($_POST["bc3_6"]);
                                    $bc3_7 = intval($_POST["bc3_7"]);
                                    $bc3_8 = intval($_POST["bc3_8"]);
                                    $bc3_9 = intval($_POST["bc3_9"]);
                                    $bc3_10 = intval($_POST["bc3_10"]);
                                    $bc3_11 = intval($_POST["bc3_11"]);
                                    $bc3 = $bc3_1+$bc3_2+$bc3_3+$bc3_4+$bc3_5+$bc3_6+$bc3_7+$bc3_8+$bc3_9+$bc3_10+$bc3_11;

                                    echo "<h3>Талбар I Зөвлөмж</h3>";
                                    echo "<h5>Талбар I авсан оноо:$bc1</h5>";
                                    if ($bc1<=20)
                                    echo "<p>Танай аж ахуйн нэгж бизнесийн тасралтгүй байдлаа хангахын тулд Бизнесийн тасралтгүй үйл ажиллагааны бодлогоо тодорхойлох нь зүйтэй. Мөн түүнчлэн, Бизнесийн тасралтгүй байдлын арга хэмжээг авах, Эрсдлийн менежментийг нэвтрүүлэхэд удирдлагын оролцоог хангаж, хариуцах ажилтныг томилох нь чухал ач холбогдолтой юм.</p>";
                                    if ($bc1>20 && $bc1<=40)
                                    echo "<p>Танай аж ахуйн нэгж бизнесийн тасралтгүй байдлаа хангахын тулд Бизнесийн тасралтгүй үйл ажиллагааны бодлогоо зөв тодорхойлсон эсэхээ эргэн нягталж, Бизнесийн тасралтгүй байдлын арга хэмжээг авах, Эрсдлийн менежментийг нэвтрүүлэхэд удирдлагын оролцоог хангаж, хариуцах ажилтныг томилох нь чухал ач холбогдолтой юм.</p>";
                                    if ($bc1>40)
                                    echo "<p>Танай аж ахуйн нэгж бизнесийн тасралтгүй байдлаа хангах эхний алхмаа тавьсан байна. Бизнесийн тасралтгүй үйл ажиллагааны бодлогоо зөв тодорхойлсон эсэхээ эргэн нягталж, Бизнесийн тасралтгүй байдлын арга хэмжээг авах, Эрсдлийн менежментийг нэвтрүүлэхэд удирдлагын оролцоог бүрэн хангаж, хариуцах ажилтныг томилоход анхаарч ажиллаарай.</p>";

                                    echo "<h3>Талбар II Зөвлөмж</h3>";
                                    echo "<h5>Талбар II авсан оноо:$bc2</h5>";
                                    if ($bc2<=43)
                                    echo "<p>Танай аж ахуйн нэгж бизнесийн үйл ажиллагаанд нөлөөлж болох эрсдлийн сөрөг нөлөөнд маш өртөмтгий байна. Энэ нь  танай байгуулагад ноцтой нөлөөлөл үзүүлэх магадлал өндөр байгаа бөгөөд нөхцөл байдал муудсан тохиолдолд урт хугацааны тасалдал үүсгэж болзошгүй юм. Иймд танай байгууллага бизнесийн тасралтгүй байдлаа хангахын тулд Эрсдлийн менежментийг нэвтрүүлж, үйл ажиллагаанд учирч болзошгүй эрсдлийг тодорхойлж, тухайн эрсдлийг бууруулах/арилгах арга хэмжээг Бизнесийн тасралтгүй байдлын төлөвлөгөөнд шаардлагатай нөөцийн хамт тусгаж, ажилтнуудад тогтмол мэдээллэх нь үйл ажиллагааны тасралтгүй байдлыг хангахад чухал ач холбогдолтой юм.</p>";
                                    if ($bc2>43 && $bc2<=87)
                                    echo "<p>Танай аж ахуйн нэгж бизнесийн үйл ажиллагаанд нөлөөлж болох эрсдлийн сөрөг нөлөөнд бага зэргийн өртөмтгий байна. Энэ нь  нөхцөлд байдал муудсан тохиолдолд танай байгуулагын үйл ажиллагаанд урт хугацаанд тодорхой хэмжээний тасалдал үүсгэж болзошгүй юм. Иймд танай байгууллага бизнесийн тасралтгүй байдлаа хангахын тулд Эрсдлийн менежментийг нэвтрүүлэхдээ үйл ажиллагаанд учирч болзошгүй эрсдлийг бүрэн тодорхойлсон эсэх, тухайн эрсдлийг бууруулах/арилгах арга хэмжээг Бизнесийн тасралтгүй байдлын төлөвлөгөөнд шаардлагатай нөөцийн хамт бүрэн тусгаж, ажилтнуудад тогтмол мэдээллэж чадаж байгаа эсэхэд анхаарах нь зүйтэй юм.</p>";
                                    if ($bc2>87)
                                    echo "<p>Танай аж ахуйн нэгж бизнесийн тасралтгүй байдлыг тодорхой/бүрэн хэмжээнд төлөвлөж ажиллаж байна. Бизнесийн тасралтгүй үйл ажиллагааны бодлого, эрсдлийн менежментээ эргэн харж, үйл ажиллагаанд учирч болзошгүй эрсдлийг бүрэн тодорхойлсон эсэх, эрсдлийг бууруулах/арилгах арга хэмжээг Бизнесийн тасралтгүй байдлын төлөвлөгөөнд шаардлагатай нөөцийн хамт бүрэн тусгаж чадсан эсэх, ажилтнуудад тогтмол мэдээлэл хүргэж чадаж байгаа эсэхээ эргэн хянах нь зүйтэй юм.</p>";

                                    echo "<h3>Талбар III Зөвлөмж</h3>";
                                    echo "<h5>Талбар III авсан оноо:$bc3</h5>";
                                    if ($bc3<=36)
                                    echo "<p>Танай аж ахуйн нэгж үйл ажиллагаандаа бизнесийн тасралтгүй байдлыг системтэйгээр нэвтрүүлэх шаардлагатай байна.  Бизнесийн тасралтгүй байдлыг хангахад чиглэсэн арга хэмжээ үйл ажиллагааны журмуудад тусгаж, байгууллагын эрсдлийн журам, процессын жагсаалтыг гарган, шаардлагатай тохиолдолд сайжруулалтыг тухай бүрт хийх нь зүйтэй. Мөн бизнесийн тасралтгүй байдлын төлөвлөгөөний гүйцэтгэлийг тогтмол хянан, сайжруулахад анхаараарай. </p>";
                                    if ($bc3>36 && $bc3<=73)
                                    echo "<p>Танай аж ахуйн нэгж үйл ажиллагаандаа бизнесийн тасралтгүй байдлыг нэвтрүүлэх үе шатандаа явж байна. Бизнесийн тасралтгүй байдлыг хангахад чиглэсэн арга хэмжээ үйл ажиллагааны журмуудад тусгаж, байгууллагын эрсдлийн журам, процессын жагсаалтыг эргэн хянаж, шаардлагатай тохиолдолд сайжруулалтыг тухай бүрт хийх шаардлагатай. Мөн бизнесийн тасралтгүй байдлын төлөвлөгөөний гүйцэтгэлийг тогтмол хянан, сайжруулахад анхаараарай.</p>";
                                    if ($bc3>73)
                                    echo "<p>Танай аж ахуйн нэгж үйл ажиллагаандаа бизнесийн тасралтгүй байдлыг нэвтрүүлэх үе шатандаа явж байна. Бизнесийн тасралтгүй байдлыг хангахад чиглэсэн арга хэмжээ үйл ажиллагааны журмуудад тусгаж, байгууллагын эрсдлийн журам, процессын жагсаалтыг эргэн хянаж, шаардлагатай тохиолдолд сайжруулалтыг тухай бүрт хийх шаардлагатай. Мөн бизнесийн тасралтгүй байдлын төлөвлөгөөний гүйцэтгэлийг тогтмол хянан, сайжруулахад анхаараарай.</p>";



                                   ?>
                                  

                                    <div class="text-center">
                                        <a href="assessment_bc" class="btn btn-default btn-lg">Ахин тооцоолох</a>
                                    </div>



                                   <?
                                }
                                else 
                                {
                                    ?>
                                    <div class="contacts">
                                        <form method="post" action="assessment_bc"  id="feedback-form" class="contact-form clear">
                                            <h3 class="text-center">ЖДҮ-үүдэд зориулсан Бизнесийн тасралтгүй байдлын цахим үнэлгээ</h3>
                                                <table class="table table-responsive mpo_assessment">
                                                    <thead>
                                                        <tr>
                                                            <th>№</th>
                                                            <th>Талбар</th>
                                                            <th width="200px">Үнэлгээ</th>
                                                        </tr>
                                                        <tr>
                                                            <th>I</th>
                                                            <th colspan="2">Манлайлал</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Манай байгууллага тасралтгүй үйл ажиллагааны бодлого тодорхойлсон</td>
                                                            <td>
                                                                <select class="form-control" name="bc1_1">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Манай байгууллага эрсдлийн менежментийг хэрэгжүүлж, тохирсон арга хэмжээг тухай бүрт авч чаддаг</td>
                                                            <td>
                                                                <select class="form-control" name="bc1_2">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Бизнесийн тасралтгүй байдлын хэрэгжилтийг хангах ажилтныг удирдлагын зүгээс томилсон</td>
                                                            <td>
                                                                <select class="form-control" name="bc1_3">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Удирдлагын зүгээс байгууллагын тасралтгүй байдлыг хангах менежментийн ач холбогдлын талаар ажилтнуудад мэдээлэл тогтмол хүргэдэг</td>
                                                            <td>
                                                                <select class="form-control" name="bc1_4">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Бизнесийн тасралтгүй байдлын төлөвлөгөөг хэрэгжүүлэхэд удирдлага хангалттай оролцоотой байдаг</td>
                                                            <td>
                                                                <select class="form-control" name="bc1_5">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Удирдлагын зүгээс бизнесийн тасралтгүй байдлыг хангахад шаардлагатай нөөцөөр хангалттай хангаж ажилладаг</td>
                                                            <td>
                                                                <select class="form-control" name="bc1_6">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <thead>                                                       
                                                        <tr>
                                                            <th>II</th>
                                                            <th colspan="2">Төлөвлөлт</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Үйл ажиллагаанд сөргөөр нөлөөлж болзошгүй дотоод болон гадаад хүчин зүйлсийг тодорхойлсон</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_1">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                       
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Аливаа нэг эрсдэл үүсэхэд байгууллагын үйл ажиллагаанд ямар хэмжээний хохирол учруулж болзошгүйг урьдчилан тооцоолж, баримтжуулсан</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_2">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Эдгээр эрсдлийг бууруулах, арилгах чиглэлээр бизнесийн тасралтгүй байдлыг хангах төлөвлгөөг боловсруулж, шат дараатайгаар хэрэгжүүлдэг</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_3">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>             
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Төлөвлөгөөг хэрэгжүүлэхэд шаардлагатай хэмжигдэхүйц зорилтуудыг гаргасан</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_4">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Байгууллагын ажилтнуудад бизнесийн тасралтгүй байдлыг хангах, эрсдэл учирсан үед ямар арга хэмжээ авах талаар мэдээлэл тогтмол хүргэдэг</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_5">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Байгууллагын ханган нийлүүлэгч, бусад гадны оролцогч талуудад бизнесийн тасралтгүй байдлыг хангах, эрсдэл учирсан үед ямар арга хэмжээ авах талаар мэдээлэл тогтмол хүргэдэг</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_6">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Бизнесийн тасралтгүй байдлыг хангахын тулд шаардлагатай хүн хүч, тоног төхөөрөмж, төсөв, болон бусад хэрэгцээт нөөцийг тодорхойлсон</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_7">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td>8</td>
                                                            <td>Бизнесийн тасралтгүй байдлыг хангах ажилчдыг шаардлагатай мэдээллээр хангаж, сургалтад хамруулж бэлдсэн</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_8">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td>9</td>
                                                            <td>Бизнесийн үйл ажиллагааг явуулахад шаардагдах орц болон бусад барааны үнэ гэнэт өсөх эрсдлийг тооцоолж, зохих төлөвлөлтийг хийдэг</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_9">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td>10</td>
                                                            <td>Эрсдэлт нөхцөл байдлаас үүдэн үйл ажиллагааны гол тоног төхөөрөмж, машин механизмын засвар үйлчилгээ тасалдахгүй байхад анхаарч эрсдэлээ тооцоолж, зохих төлөвлөлтийг хийдэг</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_10">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Үндсэн нөөц ба/эсвэл түүхий эдийн хангамж тасалдахгүй байхад анхаарч эрсдэлээ тооцоолж, зохих төлөвлөлтийг хийдэг </td>
                                                            <td>
                                                                <select class="form-control" name="bc2_11">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td>12</td>
                                                            <td>Нийтийн аж ахуйн гол үйлчилгээ (ус, цахилгаан, харилцаа холбоо, эрүүл мэнд, ариун цэврийн байгууламж) удаан хугацаанд буюу үргэлжлэн тасалдах эрсдлийг урдчилан тооцоолж, зохих төлөвлөлтийг хийдэг</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_12">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td>13</td>
                                                            <td>Цар тахлын үед авч хэрэгжүүлэх арга хэмжээг баримтжуулсан ба хамаарах эрсдлийг тооцоолж, зохих төлөвлөлтийг хийдэг</td>
                                                            <td>
                                                                <select class="form-control" name="bc2_13">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                    <thead>                                                       
                                                        <tr>
                                                            <th>III</th>
                                                            <th colspan="2">Үйл явц ба тасралтгүй сайжруулалт</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Манай байгууллагын үйл ажиллагааны үйл явц /процесс/ ажилтнуудад ойлгомжтойгоор баримтжигдсан</td>
                                                            <td>
                                                                <select class="form-control" name="bc3_1">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Бизнесийн тасралтгүй байдлыг хангахад чиглэсэн арга хэмжээг үйл ажиллагааны журамд тусгасан</td>
                                                            <td>
                                                                <select class="form-control" name="bc3_2">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>  
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Ажил гүйцэтгэгчээр ажиллаж байгаа байгууллага/хувь хүмүүст бизнесийн тасралтгүй байдлыг хангаж ажиллахад ямар үүрэгтэй талаар танилцуулж, мэдээлэл хүргэсэн</td>
                                                            <td>
                                                                <select class="form-control" name="bc3_3">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>  
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Манай байгууллага ханган нийлүүлэгчдийн бизнесийн тасралтгүй байдлын чадавхид дүн шинжилгээ хийж, эрсдэлийг тооцдог</td>
                                                            <td>
                                                                <select class="form-control" name="bc3_4">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Танай байгууллагад эрсдэл үүсвэл аль үйл ажиллагааг хамгийн түрүүнд үргэлжлүүлэх ёстойг тодорхойлж, эрэмбэлсэн</td>
                                                            <td>
                                                                <select class="form-control" name="bc3_5">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Эрсдэл учирсан тохиолдолд ажилтан бүр тус бүрдээ ямар арга хэмжээ авахаа мэднэ</td>
                                                            <td>
                                                                <select class="form-control" name="bc3_6">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Мэдээлэл, технологийн хүрээнд байгууллагын мэдээлэл, дата аюулгүй байршдаг</td>
                                                            <td>
                                                                <select class="form-control" name="bc3_7">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                
                                                        <tr>
                                                            <td>8</td>
                                                            <td>Манай бизнес (ж.нь: ажилтан, тоног төхөөрөмж гэх мэт) хэсэгчилсэн болон бүрэн даатгалд хамрагдсан </td>
                                                            <td>
                                                                <select class="form-control" name="bc3_8">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                
                                                        <tr>
                                                            <td>9</td>
                                                            <td>Бизнесийн тасралтгүй байдлыг хангах төлөвлөгөөний хэрэгжилтийг тогтмол хянаж, түүнд дүн шинжилгээ хийдэг</td>
                                                            <td>
                                                                <select class="form-control" name="bc3_9">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                
                                                        <tr>
                                                            <td>10</td>
                                                            <td>Төлөвлөгөөний гүйцэтгэлд үндэслэн сайжруулалт хийж, дараагийн төлөвлөгөөг боловсруулдаг</td>
                                                            <td>
                                                                <select class="form-control" name="bc3_10">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </td>
                                                        </tr>                                                
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Бизнесийн тасралтгүй байдлыг хангах төлөвлөгөөг нөхцөл байдалд тохируулсан тогтмол шинэчилж, шинэчлэгдсэн мэдээллийг бүх ажилтнуудад танилцуулдаг</td>
                                                            <td>
                                                                <select class="form-control" name="bc3_11">
                                                                    <option disabled selected>Үнэлэх</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
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
