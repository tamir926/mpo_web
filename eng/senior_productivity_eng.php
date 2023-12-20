<? require_once("../config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>


        <section class="col-lg-6 mx-auto">
                <div class="container bg pt-50 pb-50">
                            <h2 class="text-center">SENIOR PRODUCTIVITY SPECIALIST</h2>
                            <p>•	University degree or diploma with at least 8 years of work experience or equivalent</p>
                            <p>•	Attended anyof these training programmes:
                            <ul class="mpo-ul">
                                <li>APO Multi-country Training Course on Development of Productivity Practitioners (Basic/ Advanced)</li>
                                <li>APO Multi-country Training Course on Certified Productivity Specialists; OR</li>
                                <li>Equivalent national or international training course productivity; OR</li>
                                <li>Aggregation of short training covering at least 15 Productivity Solution</li>
                            </ul>
                            </p>
                            <p>•	8 years of work experience with implementation of at least 8 projects in productivity improvement;</p>
                            <p>•	Minimum of 2000 *work hours on consultancy, training, promotion, and/or research in the past fews years, with at least 500 hours in the last 12 months;</p>
                            <p>•	Submit at least 3 positive testimonials from clients on productivity projects undertaken in the last 24 months.</p>
                            <p>*comprising advisory work, data collection, analysis, making recommendation, report writing, training design, and training on productivity solutions.</p>
                </div>
        </section>

        
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
