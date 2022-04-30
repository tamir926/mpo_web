<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>


        <div class="pb-50 mt-50">
            <section>
                    <div class="container gray-bg pt-100 pb-100 text-center jambotron">
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <h4 class="text-black text-center">Сертификат</h4>
                                <?
                                $search = protect($_POST["search"]);
                                $sql = "SELECT *FROM certificate WHERE rd='$search' OR cert_no='$search' LIMIT 1";
                                $result = mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result)==1)
                                {
                                    $certificate = mysqli_fetch_array($result);
                                    $lastname = $certificate["lastname"];
                                    $firstname = $certificate["firstname"];
                                    $rd = $certificate["rd"];
                                    $cert_no = $certificate["cert_no"];
                                    $thumb = $certificate["thumb"];
                                    ?>
                                    <table class="table m-auto">
                                        <tr>
                                            <td align="left" valign="top">
                                                <h4><?=$lastname;?> овогтой <?=$firstname;?></h4>
                                                <h4>Гэрчилгээ №<?=$cert_no;?></h4>
                                            </td>
                                            <td>
                                                <td>
                                                    <?=(file_exists($thumb))?'<img src="'.$thumb.'">':'';?>
                                                    <button class="btn btn-success btn-xl mt-10" 
                                                    onclick="Swal.fire({
                                                    title: 'Qpay төлбөр',
                                                    text: 'Төлбөр төлөгдсөнөөр сертификат татагдах болно.',
                                                    imageUrl: 'assets/images/qpay.png',
                                                    imageWidth: 300,
                                                    imageHeight: 300,
                                                    imageAlt: 'Qpay',
                                                    })">Серитификат авах</button>
                                                </td>
                                            </td>
                                        </tr>
                                    </table>

                                    

                                    <?
                                }
                                else 
                                echo "Серитификат олдсонгүй";
                                ?>

                            </div>
                        </div>
                    
                    </div>
            </section>
        </div>

       





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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>


</body>

</html>
