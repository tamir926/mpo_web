<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>
        <?
        if (isset($_POST["timestamp"]))
        {
            ?>
            <div class="container">
                <?
                if(isset($_FILES['excel']))
                    {                       
                        $target_dir = 'uploads/tmp/';
                        $target_file = $target_dir."/".@date("his").rand(0,1000). basename($_FILES["excel"]["name"]);
                        move_uploaded_file($_FILES['excel']['tmp_name'], $target_file);
                        if (isset($_POST["signature"]))
                        $signature = $_POST["signature"]; else $signature = NULL;
                        $description = mysqli_escape_string($conn,$_POST["description"]);
                        require_once('assets/php/PHPExcel.php');
                        require_once('assets/php/PHPExcel/IOFactory.php');
                        $objPHPExcel = PHPExcel_IOFactory::load($target_file);
                        $aSheet =$objPHPExcel->getActiveSheet();
                        $fullname = $aSheet->getCell("C8")->getValue();

                        if ($fullname<>"")
                        {
                            $sql= "INSERT INTO mbtbb_application_bm (fullname,description,signature) VALUES ('$fullname','$description','$signature')";
                            if (mysqli_query($conn,$sql))
                            echo "Submitted successfully";
                            else 
                            echo "There was an error sending.".mysqli_error($conn);
                        }
                        else 
                        {
                            echo "The last name field in the Excel file is empty.";
                        }
                        if (file_exists($target_file)) unlink($target_file);
                    }
                    else echo "Excel file not found";
                ?>
            </div>
            <?
        }
        if (!isset($_POST["timestamp"]))
        {
            ?>
            <section>
                <div class="container text-center pt-100 pb-100">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 mx-auto text-justify col-sm-5">
                                        <div class="login-form">
                                            <h3>CPD</h3>
                                            <p>Тасралтгүй мэргэжил дээшлүүлэх маягтыг бөглөж, secretariat@mpo-org.mn хаягаар MPOCB руу илгээнэ үү.<a class="green" href="../files/Cb_cpd_eng.xlsx" target="new">Download the Excel file here.</a></p>
                            </div>
                                
                        </div>
                    </div>
                    
                </div>
            </section>

            <?
        }
        ?>
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


    <script type="text/javascript" src="../assets/js/jquery-2.2.3.min.js"></script>
    <!-- <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>    <script type="text/javascript" src="../assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="../assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins.isotope.js"></script>
    <script type="text/javascript" src="../assets/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="../assets/js/lightcase.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.nstSlider.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="../assets/js/custom.isotope.js"></script>
    <script type="text/javascript" src="../assets/js/custom.map.js"></script>
    <script type="text/javascript" src="../assets/js/signature_pad.js"></script>
    <script type="text/javascript" src="../assets/js/custom.js"></script>
    <script>
        function resizeCanvas() {
            var oldContent = signaturePad.toData();
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            signaturePad.clear();
            signaturePad.fromData(oldContent);
        }
            var wrapper = document.getElementById("signature-pad"),
                canvas = wrapper.querySelector("canvas"),
                signaturePad;

            var signaturePad = new SignaturePad(canvas);
            signaturePad.minWidth = 1; //minimale Breite des Stiftes
            signaturePad.maxWidth = 5; //maximale Breite des Stiftes
            signaturePad.penColor = "#000000"; //Stiftfarbe
            signaturePad.backgroundColor = "#FFFFFF"; //Hintergrundfarbe

            window.onresize = resizeCanvas;
            resizeCanvas();

            function submitForm() {
                //Unterschrift in verstecktes Feld übernehmen
                document.getElementById('signature').value = signaturePad.toDataURL();
            }
    </script>

    
</body>

</html>