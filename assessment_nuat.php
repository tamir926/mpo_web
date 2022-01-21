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
                                    $nuat2017 = $_POST["sales_2017"]+$_POST["init_2017"]-$_POST["end_2017"]-$_POST["buy_2017"]-$_POST["exp_2017"];
                                    $nuat2018 = $_POST["sales_2018"]+$_POST["init_2018"]-$_POST["end_2018"]-$_POST["buy_2018"]-$_POST["exp_2018"];
                                    $nuat2019 = $_POST["sales_2019"]+$_POST["init_2019"]-$_POST["end_2019"]-$_POST["buy_2019"]-$_POST["exp_2019"];
                                    $nuat2020 = $_POST["sales_2020"]+$_POST["init_2020"]-$_POST["end_2020"]-$_POST["buy_2020"]-$_POST["exp_2020"];
                                    $nuat2021 = $_POST["sales_2021"]+$_POST["init_2021"]-$_POST["end_2021"]-$_POST["buy_2021"]-$_POST["exp_2021"];
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
                                                        data: [<?=$nuat2017;?>, <?=$nuat2018;?>, <?=$nuat2019;?>, <?=$nuat2020;?>, <?=$nuat2021;?>],
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
                                                        <td>
                                                           Нийт борлуулалт
                                                        </td>
                                                        <td><input type="text" class="form-control" name="sales_2017" ></td>
                                                        <td><input type="text" class="form-control" name="sales_2018" ></td>
                                                        <td><input type="text" class="form-control" name="sales_2019" ></td>
                                                        <td><input type="text" class="form-control" name="sales_2020" ></td>
                                                        <td><input type="text" class="form-control" name="sales_2021" ></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Эхний үлдэгдэл
                                                        </td>
                                                        <td><input type="text" class="form-control" name="init_2017" ></td>
                                                        <td><input type="text" class="form-control" name="init_2018" ></td>
                                                        <td><input type="text" class="form-control" name="init_2019" ></td>
                                                        <td><input type="text" class="form-control" name="init_2020" ></td>
                                                        <td><input type="text" class="form-control" name="init_2021" ></td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Эцсийн үлдэгдэл
                                                        </td>
                                                        <td><input type="text" class="form-control" name="end_2017" ></td>
                                                        <td><input type="text" class="form-control" name="end_2018" ></td>
                                                        <td><input type="text" class="form-control" name="end_2019" ></td>
                                                        <td><input type="text" class="form-control" name="end_2020" ></td>
                                                        <td><input type="text" class="form-control" name="end_2021" ></td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Нийт худалдан авалт
                                                        </td>
                                                        <td><input type="text" class="form-control" name="buy_2017" ></td>
                                                        <td><input type="text" class="form-control" name="buy_2018" ></td>
                                                        <td><input type="text" class="form-control" name="buy_2019" ></td>
                                                        <td><input type="text" class="form-control" name="buy_2020" ></td>
                                                        <td><input type="text" class="form-control" name="buy_2021" ></td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Захиргааны зардал
                                                        </td>
                                                        <td><input type="text" class="form-control" name="exp_2017" ></td>
                                                        <td><input type="text" class="form-control" name="exp_2018" ></td>
                                                        <td><input type="text" class="form-control" name="exp_2019" ></td>
                                                        <td><input type="text" class="form-control" name="exp_2020" ></td>
                                                        <td><input type="text" class="form-control" name="exp_2021" ></td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Нэмэгдсэн өртөг
                                                        </td>
                                                        <td><input type="text" class="form-control" name="nuat_2017" disabled></td>
                                                        <td><input type="text" class="form-control" name="nuat_2018" disabled></td>
                                                        <td><input type="text" class="form-control" name="nuat_2019" disabled></td>
                                                        <td><input type="text" class="form-control" name="nuat_2020" disabled></td>
                                                        <td><input type="text" class="form-control" name="nuat_2021" disabled></td>
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
