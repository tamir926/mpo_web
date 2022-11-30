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
                                <h3>БҮТЭЭМЖИЙН ХЭМЖИЛТ, НЭМЭГДСЭН ӨРТӨГ ТООЦОХ</h3>
                                <?
                                if (!empty($_POST))
                                {
                                    $profit2017 = $_POST["init_balance_2017"]+$_POST["purchase_2017"]-$_POST["final_balance_2017"];
                                    $profit2018 = $_POST["init_balance_2018"]+$_POST["purchase_2018"]-$_POST["final_balance_2018"];
                                    $profit2019 = $_POST["init_balance_2019"]+$_POST["purchase_2019"]-$_POST["final_balance_2019"];
                                    $profit2020 = $_POST["init_balance_2020"]+$_POST["purchase_2020"]-$_POST["final_balance_2020"];
                                    $profit2021 = $_POST["init_balance_2021"]+$_POST["purchase_2021"]-$_POST["final_balance_2021"];

                                    $nuat_minus_2017 = $profit2017 -$_POST["marketing_2017"]-$_POST["audit_2017"]-$_POST["rent_2017"]-$_POST["service_2017"]-$_POST["office_2017"]-$_POST["maintenance_2017"]-$_POST["transport_2017"]-$_POST["other_2017"];
                                    $nuat_minus_2018 = $profit2018 -$_POST["marketing_2018"]-$_POST["audit_2018"]-$_POST["rent_2018"]-$_POST["service_2018"]-$_POST["office_2018"]-$_POST["maintenance_2018"]-$_POST["transport_2018"]-$_POST["other_2018"];
                                    $nuat_minus_2019 = $profit2019 -$_POST["marketing_2019"]-$_POST["audit_2019"]-$_POST["rent_2019"]-$_POST["service_2019"]-$_POST["office_2019"]-$_POST["maintenance_2019"]-$_POST["transport_2019"]-$_POST["other_2019"];
                                    $nuat_minus_2020 = $profit2020 -$_POST["marketing_2020"]-$_POST["audit_2020"]-$_POST["rent_2020"]-$_POST["service_2020"]-$_POST["office_2020"]-$_POST["maintenance_2020"]-$_POST["transport_2020"]-$_POST["other_2020"];
                                    $nuat_minus_2021 = $profit2021 -$_POST["marketing_2021"]-$_POST["audit_2021"]-$_POST["rent_2021"]-$_POST["service_2021"]-$_POST["office_2021"]-$_POST["maintenance_2021"]-$_POST["transport_2021"]-$_POST["other_2021"];

                                    $nuat_plus_2017 = $_POST["labor_2017"]+$_POST["care_2017"]+$_POST["administration_2017"]+$_POST["depreciation_2017"]+$_POST["interest_2017"]+$_POST["tax_2017"]+$_POST["beforetax_2017"]+$_POST["nonoperationexp_2017"]-$_POST["nonoperationinc_2017"];
                                    $nuat_plus_2018 = $_POST["labor_2018"]+$_POST["care_2018"]+$_POST["administration_2018"]+$_POST["depreciation_2018"]+$_POST["interest_2018"]+$_POST["tax_2018"]+$_POST["beforetax_2018"]+$_POST["nonoperationexp_2018"]-$_POST["nonoperationinc_2018"];
                                    $nuat_plus_2019 = $_POST["labor_2019"]+$_POST["care_2019"]+$_POST["administration_2019"]+$_POST["depreciation_2019"]+$_POST["interest_2019"]+$_POST["tax_2019"]+$_POST["beforetax_2019"]+$_POST["nonoperationexp_2019"]-$_POST["nonoperationinc_2019"];
                                    $nuat_plus_2020 = $_POST["labor_2020"]+$_POST["care_2020"]+$_POST["administration_2020"]+$_POST["depreciation_2020"]+$_POST["interest_2020"]+$_POST["tax_2020"]+$_POST["beforetax_2020"]+$_POST["nonoperationexp_2020"]-$_POST["nonoperationinc_2020"];
                                    $nuat_plus_2021 = $_POST["labor_2021"]+$_POST["care_2021"]+$_POST["administration_2021"]+$_POST["depreciation_2021"]+$_POST["interest_2021"]+$_POST["tax_2021"]+$_POST["beforetax_2021"]+$_POST["nonoperationexp_2021"]-$_POST["nonoperationinc_2021"];
                                   ?>
                                   <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
                                    <canvas id="myChart" width="1200" height="400"></canvas>
                                    <script>

                                    const ctx = document.getElementById('myChart').getContext('2d');
                                    
                                    const myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ['2017', '2018', '2019', '2020', '2021'],
                                            datasets: [{
                                                        label: 'Нэмэгдсэн өртгийн өсөлтийн үзүүлэлт',
                                                        data: [<?=$nuat_minus_2017;?>, <?=$nuat_minus_2018;?>, <?=$nuat_minus_2019;?>, <?=$nuat_minus_2020;?>, <?=$nuat_minus_2021;?>],
                                                        fill: false,
                                                        borderColor: 'rgb(58, 173, 72)',
                                                        tension: 0.1
                                                    }]
                                        },
                                        
                                    });
                                    </script>

                                            <div class="text-center">
                                                <a href="assessment_nuat" class="btn btn-default btn-lg">Ахин тооцоолох</a>
                                            </div>



                                   <?
                                }
                                else 
                                {
                                    ?>
                                    <div class="contacts">
                                        <form method="post" action="assessment_nuat"  id="feedback-form" class="contact-form clear">

                                            <table class="table table-responsive mpo_assessment">
                                                <thead>
                                                    <tr>
                                                        <th>Он</th><th>2017</th><th>2018</th><th>2019</th><th>2020</th><th>2021</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <tr>
                                                        <td>Нийт борлуулалтын орлого</td>
                                                        <td><input type="text" class="form-control" value="0" name="total_income_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="total_income_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="total_income_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="total_income_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="total_income_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Эхний үлдэгдэл</td>
                                                        <td><input type="text" class="form-control" value="0" name="init_balance_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="init_balance_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="init_balance_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="init_balance_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="init_balance_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Худалдан авалт</td>
                                                        <td><input type="text" class="form-control" value="0" name="purchase_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="purchase_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="purchase_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="purchase_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="purchase_2021" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Эцсийн үлдэгдэл</td>
                                                        <td><input type="text" class="form-control" value="0" name="final_balance_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="final_balance_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="final_balance_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="final_balance_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="final_balance_2021" required></td>
                                                    </tr>

                                                    <tr class="bg-warning">
                                                        <td>Нийт ашиг</td>
                                                        <td><input type="text" class="form-control" value="0" name="profit2017" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="profit2018" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="profit2019" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="profit2020" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="profit2021" disabled></td>
                                                    </tr>                                                

                                                    <tr>
                                                        <td colspan="6">Үйл ажиллагааны зардлууд</td>                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>Зар сурталчилгаа, маркетингийн зардал</td>
                                                        <td><input type="text" class="form-control" value="0" name="marketing_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="marketing_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="marketing_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="marketing_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="marketing_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Аудитын хөлс</td>
                                                        <td><input type="text" class="form-control" value="0" name="audit_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="audit_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="audit_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="audit_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="audit_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Түрээсийн зардал</td>
                                                        <td><input type="text" class="form-control" value="0" name="rent_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="rent_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="rent_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="rent_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="rent_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Засвар үйлчилгээний зардал</td>
                                                        <td><input type="text" class="form-control" value="0" name="service_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="service_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="service_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="service_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="service_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Оффисын, бусад хэрэглэгдэхүүний зардал</td>
                                                        <td><input type="text" class="form-control" value="0" name="office_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="office_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="office_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="office_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="office_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Ашиглалтын зардал</td>
                                                        <td><input type="text" class="form-control" value="0" name="maintenance_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="maintenance_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="maintenance_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="maintenance_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="maintenance_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Тээвэр, харилцаа холбооны зардал</td>
                                                        <td><input type="text" class="form-control" value="0" name="transport_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="transport_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="transport_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="transport_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="transport_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Бусад үйл ажиллагааны зардал</td>
                                                        <td><input type="text" class="form-control" value="0" name="other_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="other_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="other_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="other_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="other_2021" required></td>
                                                    </tr>

                                                    <tr class="bg-warning">
                                                        <td>Нэмэгдсэн өртөг (хасах аргаар)</td>
                                                        <td><input type="text" class="form-control" value="0" name="nuat_minus_2017" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="nuat_minus_2018" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="nuat_minus_2019" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="nuat_minus_2020" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="nuat_minus_2021" disabled></td>
                                                    </tr>       

                                                    <tr>
                                                        <td>Хөдөлмөрийн зардал</td>
                                                        <td><input type="text" class="form-control" value="0" name="labor_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="labor_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="labor_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="labor_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="labor_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Халамж, хөгжлийн зардал</td>
                                                        <td><input type="text" class="form-control" value="0" name="care_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="care_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="care_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="care_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="care_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Удирдлагын зардал</td>
                                                        <td><input type="text" class="form-control" value="0" name="administration_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="administration_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="administration_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="administration_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="administration_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Элэгдэл хорогдол</td>
                                                        <td><input type="text" class="form-control" value="0" name="depreciation_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="depreciation_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="depreciation_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="depreciation_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="depreciation_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Хүү</td>
                                                        <td><input type="text" class="form-control" value="0" name="interest_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="interest_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="interest_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="interest_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="interest_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Татвар</td>
                                                        <td><input type="text" class="form-control" value="0" name="tax_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="tax_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="tax_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="tax_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="tax_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Татварын өмнөх ашиг</td>
                                                        <td><input type="text" class="form-control" value="0" name="beforetax_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="beforetax_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="beforetax_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="beforetax_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="beforetax_2021" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Үйл ажиллагааны бус зардал</td>
                                                        <td><input type="text" class="form-control" value="0" name="nonoperationexp_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="nonoperationexp_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="nonoperationexp_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="nonoperationexp_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="nonoperationexp_2021" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Үйл ажиллагааны бус орлого</td>
                                                        <td><input type="text" class="form-control" value="0" name="nonoperationinc_2017" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="nonoperationinc_2018" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="nonoperationinc_2019" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="nonoperationinc_2020" required></td>
                                                        <td><input type="text" class="form-control" value="0" name="nonoperationinc_2021" required></td>
                                                    </tr>

                                                    <tr class="bg-warning">
                                                        <td>Нэмэгдсэн өртөг (хасах аргаар)</td>
                                                        <td><input type="text" class="form-control" value="0" name="nuat_plus_2017" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="nuat_plus_2018" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="nuat_plus_2019" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="nuat_plus_2020" disabled></td>
                                                        <td><input type="text" class="form-control" value="0" name="nuat_plus_2021" disabled></td>
                                                    </tr>      
                                                </tbody>

                                            </table>
                                            <div class="text-center">
                                                <input type="submit" class="btn btn-default" value="Тооцоолох" >
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
