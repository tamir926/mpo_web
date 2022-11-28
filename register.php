<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>

        <section>
            <div class="container text-center pt-100 pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mx-auto text-justify">
                        <div class="donate-form">
                                <div class="select-amount">
                                    <!-- .select-amount -->

                                    <div class="contact-form">
                                        <h3>Бүртгүүлэх</h3>
                                        <?
                                        if (isset($_POST["name"]) && isset($_POST["tel"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]))
                                        {

                                            $name = protect($_POST["name"]);
                                            $type = protect($_POST["type"]);
                                            $tel = protect($_POST["tel"]);
                                            $email = protect($_POST["email"]);
                                            $username = protect($_POST["username"]);
                                            $password = protect($_POST["password"]);
                                            $password2 = protect($_POST["password2"]);

                                            $sql = "SELECT id FROM users WHERE username='$username' OR tel='$tel' OR email='$email'";
                                            $result = mysqli_query($conn,$sql);
                                            if (mysqli_num_rows($result)==0)
                                            {
                                                if ($password==$password2)
                                                {
                                                    $sql = "INSERT INTO users (name,type,username,tel,email,password) VALUE ('$name','$type','$username','$tel','$email','$password')";
                                                    if (mysqli_query($conn,$sql))
                                                    {
                                                        ?>
                                                        <div class="alert">
                                                            Амжилттай бүртгэлээ
                                                        </div>                
                                                        <a href="login" class="btn btn-secondary w-100 mt-30">Нэвтрэх</a>
                                                        <?
                                                    }
                                                    else 
                                                    {
                                                        ?>
                                                        <div class="alert">
                                                            Алдаа гарлаа. <?=mysqli_error($conn);?>
                                                        </div>                
                                                        <a href="register" class="btn btn-warning w-100 mt-30">Бүртгүүлэх</a>
                                                        <?
                                                    }

                                                }
                                                else 
                                                {
                                                    ?>
                                                    <div class="alert ">
                                                        Нууц үг ижил биш байна
                                                    </div>                
                                                    <a href="register" class="btn btn-warning w-100 mt-30">Бүртгүүлэх</a>
                                                    <?
                                                }


                                            }
                                            else 
                                            {
                                                ?>
                                                <div class="alert ">
                                                    Нэвтрэх нэр, утасны дугаар эсвэл имэйл бүртгэлтэй байна. 
                                                </div>        
                                                <div class="form-group">       
                                                    <a href="login" class="btn btn-secondary w-100 mt-30">Нэвтрэх</a>
                                                    <a href="register" class="btn btn-warning w-100 mt-30">Бүртгүүлэх</a>
                                                </div>
                                                <?
                                            }

                                            
                                        }
                                        else 
                                        {
                                            ?>
                                            <form action="register" method="POST" class="contact-form">
                                                <p>Та манайд бүртгэлтэй бол <a href="login" class="login">энд дарж</a> нэвтэрнэ үү.</p>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control mt-30" name="name" id="name" placeholder="Нэр" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="radio" name="type" value="1"> Байгууллага
                                                            <input type="radio" name="type" value="0"> Хувь хүн
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" class="form-control mt-30" name="tel" id="tel" placeholder="Утас" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" class="form-control mt-30" name="email" id="email" placeholder="Имэйл" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" class="form-control mt-30" name="username" id="username" placeholder="Нэвтрэх нэр" required>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <input type="password" class="form-control mt-30" name="password" id="password" placeholder="Нууц үг"  minlength="6" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="password" class="form-control mt-30" name="password2" id="password2" placeholder="Нууц үг давтах" minlength="6" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-default w-100 mt-30" value="Бүртгүүлэх">
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                            <?
                                        }
                                        ?>

                                    </div>
                                </div>
                        </div>
                            
                    </div>
                </div>
                
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

    <script type="text/javascript" src="assets/js/custom.js"></script>


</body>

</html>
