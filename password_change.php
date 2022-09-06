<? require_once("config.php");?>
<? require_once("views/login_check.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>
        <div class="submenu">
            <div class="container d-flex justify-content-between">
                <h3 class="text-black">Гишүүнчлэл</h3>
                <ul class="submenu-ul">
                    <li><a href="dashboard">Хянах самбар</a></li>
                    <li><a href="profile">Хувийн тохиргоо</a></li>
                    <li><a href="password_change">Нууц үг солих</a></li>
                    <li><a href="logout">Гарах</a></li>
                </ul>
            </div>
        </div>


        <section>
            <div class="container text-center pt-100 pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mx-auto text-justify">
                        <div class="donate-form">
                            <form action="password_change" method="POST" class="contact-form">
                                <div class="select-amount">
                                    <!-- .select-amount -->
                                    <div class="login-form">
                                        <h3>Нууц үг солих</h3>
                                        <?
                                        if (isset($_POST["password1"]) && isset($_POST["password2"]) && isset($_POST["password3"]))
                                        {
                                            
                                            $my_id =  $_SESSION['logged_user_id'];
                                            $sql = "SELECT *FROM users WHERE id='$my_id' LIMIT 1";
                                            $result = mysqli_query($conn,$sql);
                                            $profile = mysqli_fetch_array($result);
                                            $my_current_password = $profile["password"];

                                            unset($sql);
                                            unset($result);
                                            unset($profile);

                                            
                                            $password1 = $_POST["password1"];
                                            $password2 = $_POST["password2"];
                                            $password3 = $_POST["password3"];
        
                                            if ($password2==$password3)
                                            {
                                                if ($my_current_password==$password1)
                                                {
                                                    $sql = "UPDATE users 
                                                    SET password='$password2'
                                                    WHERE id='$my_id'";
                                                    if (mysqli_query($conn,$sql))
                                                    echo '<div class="alert">Үндсэн мэдээлэл амжилттай солигдлоо</div>';    
                                                    else 
                                                    echo '<div class="alert">Алдаа гарлаа </div>';    
                                                }
                                                else 
                                                echo '<div class="alert">Одоогийн нууц үг буруу байна </div>';    
                                            }
                                            else
                                            echo '<div class="alert">Шинэ нууц үг давтахад алдаа гарсан байна</div>';    

        
                                            
                                        }
                                        else 
                                        {
                                            ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control mt-30" name="password1"  placeholder="Одоогийн нууц үг">
                                                    </div>
                                                    <!-- .form-group -->

                                                    <div class="form-group">
                                                        <input type="password" class="form-control mt-30" name="password2"  placeholder="Шинэ нууц үг">
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="password" class="form-control mt-30" name="password3" placeholder="Шинэ нууц үг давтах">
                                                    </div>
                                                    <!-- .form-group -->

                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-default w-100 mt-30" value="Нэвтрэх">
                                                    </div>
                                                    <!-- .form-group -->
                                                </div>
                                                                                            <!-- .col-lg-6 -->
                                            </div>
                                            <!-- .row -->
                                            <?
                                        }
                                        ?>
                                    </div>
                                </div>
                            </form>
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
