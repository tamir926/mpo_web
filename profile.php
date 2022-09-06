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

        
        <? $my_id =  $_SESSION['logged_user_id']; ?>


        <section>
            <div class="container text-center pt-100 pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mx-auto text-justify">
                        <div class="donate-form">
                            <div class="select-amount">
                                <!-- .select-amount -->
                                <div class="login-form">
                                    <h3>Хувийн тохиргоо</h3>
                                    <?
                                    if (isset($_POST["name"]) && isset($_POST["tel"]) && isset($_POST["email"]) && isset($_POST["username"]))                                        
                                    {
                                        
                                        $name = $_POST["name"];
                                        $type = $_POST["type"];
                                        $tel = $_POST["tel"];
                                        $email = $_POST["email"];
                                        $username = $_POST["username"];


                                        $sql = "UPDATE users 
                                        SET 
                                        name='$name',
                                        type='$type',
                                        username='$username',                                            
                                        tel='$tel',
                                        email='$email'
                                        WHERE id='$my_id'";
                                        if (mysqli_query($conn,$sql))
                                        echo '<div class="alert">Үндсэн мэдээлэл амжилттай шинэчлэгдлээ</div>';    
                                        else 
                                        echo '<div class="alert">Алдаа гарлаа '.mysqli_error($conn).'</div>';                                                                                        
                                        
                                    }
                                    
                                        
                                    $sql = "SELECT *FROM users WHERE id='$my_id' LIMIT 1";
                                    $result = mysqli_query($conn,$sql);
                                    $profile = mysqli_fetch_array($result);
                                    $name = $profile["name"];
                                    $type = $profile["type"];
                                    $tel = $profile["tel"];
                                    $email = $profile["email"];
                                    $username = $profile["username"];

                                    unset($sql);
                                    unset($result);
                                    unset($profile);
                                    ?>


                                    <form action="profile" method="POST" class="contact-form">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control mt-30" name="name" id="name" placeholder="Нэр" value="<?=$name;?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <input type="radio" name="type" value="1" <?=($type==1)?'checked':'';?>> Байгууллага
                                                    <input type="radio" name="type" value="0" <?=($type==0)?'checked':'';?>> Хувь хүн
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control mt-30" name="tel" id="tel" placeholder="Утас" value="<?=$tel;?>"required>
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control mt-30" name="email" id="email" placeholder="Имэйл" value="<?=$email;?>"required>
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control mt-30" name="username" id="username" placeholder="Нэвтрэх нэр" value="<?=$username;?>" required>
                                                </div>
                                                                                                    
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-default w-100 mt-30" value="Засах">
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                        
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
