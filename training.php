<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>

<body>
    <div class="box-layout">       
        <? require_once("views/header.php");?>
        <? 
        if (isset($_GET["action"])) $action = $_GET["action"]; else $action = "list";
        if (isset($_GET["category"])) $category_id = $_GET["category"]; else $category_id = 1;
        ?>

        <div class="submenu">
            <div class="container d-flex justify-content-between">
                <h3 class="text-black">Сургалт</h3>
                <ul class="submenu-ul">
                    <?
                    $sql = "SELECT *FROM courses_category";
                    $result = mysqli_query($conn,$sql);
                    while ($data = mysqli_fetch_array($result))
                    {
                        if ($data["id"] == $category_id) echo '<b>';
                        ?>
                        <li><a href="training?category=<?=$data["id"];?>"><?=$data["name"];?></a></li>
                        <?
                        if ($data["id"] == $category_id) echo '</b>';
                    }
                    ?>                    
                    <li><a href="experts">Мэргэжилтнүүд</a></li>
                </ul>
            </div>
          
        </div>
        <div class="mt-30 pb-50">
            <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <?                                   
                                $sql = "SELECT *FROM courses_category WHERE id='$category_id'";
                                $result = mysqli_query($conn,$sql);
                                $data = mysqli_fetch_array($result);
                                $category_name = $data["name"];
                                ?>
                                <h2><?=$category_name;?></h2>
                            </div>
                        </div>                    
                    </div>
            </section>
        </div>

        <hr>

        

        <section class="bg-upcoming-events">
            <div class="container">
                <?
                if ($action == "list")
                {
                    ?>
                    <div class="row">
                        <div class="upcoming-events">
                            <div class="row">
                                <?
                                $sql = "SELECT *FROM courses WHERE category='$category_id'";
                                $result = mysqli_query($conn,$sql);
                                while ($courses = mysqli_fetch_array($result))
                                {
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="event<?=($category_id>1)?$category_id:'';?>-items">
                                            <div class="event<?=($category_id>1)?$category_id:'';?>-img wrapper-img">
                                                <a href="#"><img src="<?=$courses["image"];?>" alt="upcoming-events-img-1" class="img-responsive" /></a>
                                                <div class="date-box">
                                                    <h5> <i class="fa fa-clock-o" aria-hidden="true"></i> <?=$courses["duration"];?>ц / <i class="fa fa-user" aria-hidden="true"></i> <?=$courses["participants"];?> хүн / <i class="fa fa-calendar" aria-hidden="true"></i> <?=$courses["date"];?></h5>
                                                </div>
                                            </div>
                                            <div class="events-content">
                                                <h3><a href="#" data-bs-toggle="modal" data-bs-target="#modal_id_<?=$courses["id"];?>"><?=$courses["title"];?></a></h3>
                                                <p><?=$courses["brief"];?></p>
                                                <a href="#" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#modal_id_<?=$courses["id"];?>">Дэлгэрэнгүй</a>
                                                <a class="btn btn-success btn-sm mt-3" href="?action=register&id=<?=$courses["id"];?>">Бүртгүүлэх</a>
                                            </div>
                                        </div>
                                        
                                        <div class="modal fade" id="modal_id_<?=$courses["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel"><?=$courses["title"];?></h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?=$courses["content"];?></p>
                                                    <table class="table mpo-table">
                                                        <tr>
                                                            <td width="30%"><h5 class="text-left">Хэзээ</h5></td>
                                                            <td width="30%"><h5 class="text-left">Цаг</h5></td>
                                                            <td width="30%"><h5 class="text-left">Оролцогч</h5></td>                                                        
                                                        </tr>
                                                        <tr>
                                                            <td><h4 class="text-left"><?=$courses["date"];?></h4></td>
                                                            <td><h4 class="text-left"><?=$courses["duration"];?> цаг</h4></td>
                                                            <td><h4 class="text-left"><?=$courses["participants"];?> хүн</h4></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-success" href="?action=register&id=<?=$courses["id"];?>">Бүртгүүлэх</a>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Хаах</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?
                                }
                                ?>                        
                            </div>

                        </div>
                    </div>
                    <?
                }

                if ($action == "register")
                {
                    if (isset($_POST["course_id"]))
                    {
                        $course_id = protect($_POST["course_id"]);
                        $surname = protect($_POST["surname"]);
                        $name = protect($_POST["name"]);
                        $rd = protect($_POST["rd"]);
                        $city = protect($_POST["city"]);
                        $dob = protect($_POST["dob"]);
                        $gender = protect($_POST["gender"]);
                        $position = protect($_POST["position"]);

                        $org_name = protect($_POST["org_name"]);
                        $org_address = protect($_POST["org_address"]);
                        $org_tel = protect($_POST["org_tel"]);
                        $org_email = protect($_POST["org_email"]);
                        $org_type = protect($_POST["org_type"]);
                        $org_employees = protect($_POST["org_employees"]);


                        $everbefore = protect($_POST["everbefore"]);
                        $payment_type = protect($_POST["payment_type"]);
                        $whichone = protect($_POST["whichone"]);
                        $whenisit = protect($_POST["whenisit"]);
                        $wherewasit = protect($_POST["wherewasit"]);

                        $participant_address = protect($_POST["participant_address"]);
                        $participant_mobile = protect($_POST["participant_mobile"]);
                        $participant_email = protect($_POST["participant_email"]);
                        $participant_referrer_name = protect($_POST["participant_referrer_name"]);
                        $participant_referrer_type = protect($_POST["participant_referrer_type"]);
                        $participant_referrer_tel = protect($_POST["participant_referrer_tel"]);
                        $participant_referrer_email = protect($_POST["participant_referrer_email"]);
                        $participant_referrer_address = protect($_POST["participant_referrer_address"]);
                        $participant_referrer = $participant_referrer_name."|".$participant_referrer_type."|".$participant_referrer_tel."|".$participant_referrer_email."|".$participant_referrer_address;
                        $sql = "INSERT INTO courses_candidates 
                        (course,surname,name,rd,gender,city,dob,position,org_name,org_address,org_tel,org_email,org_type,org_employees,everbefore,payment_type,whichone,whenisit,wherewasit,participant_address,participant_mobile,participant_email,participant_referrer) VALUES 
                        ('$course_id','$surname','$name','$rd','$gender','$city','$dob','$position','$org_name','$org_address','$org_tel','$org_email','$org_type','$org_employees','$everbefore','$payment_type','$whichone','$whenisit','$wherewasit','$participant_address','$participant_mobile','$participant_email','$participant_referrer')";
                        if (mysqli_query($conn,$sql))
                        {
                            ?>
                            <div class="alert alert-success">Амжилттай бүртгэлээ</div>
                            <?
                        }
                        else 
                        {
                            echo mysqli_error($conn);
                            ?>
                            <div class="alert alert-danger">Алдаа гарлаа</div>
                            <?
                        }
                    }

                    
                    $course_id = $_GET["id"];
                    $sql = "SELECT *FROM courses WHERE id='$course_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $courses = mysqli_fetch_array($result);

                        ?>
                        <table class="table">
                            <tr>
                                <td width="40%" style="vertical-align:top; padding:20px;">
                                    <img src="<?=$courses["image"];?>" class="w-100">
                                    <h4><?=$courses["title"];?></h4>
                                    <p><?=$courses["brief"];?></p>
                                    <table class="table mpo-table">
                                        <tr>
                                            <td width="30%"><h5 class="text-left">Хэзээ</h5></td>
                                            <td width="30%"><h5 class="text-left">Цаг</h5></td>
                                            <td width="30%"><h5 class="text-left">Оролцогч</h5></td>                                                        
                                        </tr>
                                        <tr>
                                            <td><h4 class="text-left"><?=$courses["date"];?></h4></td>
                                            <td><h4 class="text-left"><?=$courses["duration"];?> цаг</h4></td>
                                            <td><h4 class="text-left"><?=$courses["participants"];?> хүн</h4></td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="60%">
                                    <form action="?action=register&id=<?=$course_id;?>" method="post">
                                        <div class="training-form">
                                            <input type="hidden" name="course_id" value="<?=$course_id;?>">
                                            <table class="table table-border">
                                                <tr>
                                                    <td colspan="3"><h4>A. Ерөнхий мэдээлэл</h4></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="surname" placeholder="Овог">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="name" placeholder="Нэр">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="rd" placeholder="Регистрийн дугаар">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <select name="city" class="form-control">                                                            
                                                            <option value="" selected disabled>Харьяалал</option>
                                                            <option value="1">Багануур</option>
                                                            <option value="2">Багахангай</option>
                                                            <option value="3">Баянгол</option>
                                                            <option value="4">Баянзүрх</option>												
                                                            <option value="5">Налайх</option>												
                                                            <option value="6">Сонгинохайрхан</option>												
                                                            <option value="7">Сүхбаатар</option>												
                                                            <option value="8">Хан-Уул</option>												
                                                            <option value="9">Чингэлтэй</option>		
                                                            <option value="" disabled>Хөдөө орон нутаг</option>
                                                            <option value="102">Архангай</option>
                                                            <option value="103">Баян-Өлгий</option>
                                                            <option value="104">Баянхонгор</option>
                                                            <option value="105">Булган</option>												
                                                            <option value="106">Говь-Алтай</option>												
                                                            <option value="107">Говьсүмбэр</option>												
                                                            <option value="108">Дархан-Уул </option>												
                                                            <option value="109">Дорноговь</option>												
                                                            <option value="110">Дорнод</option>																												
                                                            <option value="111">Дундговь</option>																												
                                                            <option value="112">Завхан</option>																												
                                                            <option value="113">Орхон</option>																												
                                                            <option value="114">Өвөрхангай</option>																												
                                                            <option value="115">Өмнөговь</option>																												
                                                            <option value="116">Сүхбаатар</option>																												
                                                            <option value="117">Сэлэнгэ</option>																												
                                                            <option value="118">Төв</option>																												
                                                            <option value="119">Увс</option>																												
                                                            <option value="120">Ховд</option>																												
                                                            <option value="121">Хөвсгөл</option>																												
                                                            <option value="122">Хэнтий</option>	
                                                        </select>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="date" class="form-control" name="dob" placeholder="Төрсөн өдөр">
                                                    </td>
                                                    <td width="30%">
                                                        <select name="gender" class="form-control">
                                                            <option value="0">Эмэгтэй</option>
                                                            <option value="1">Эрэгтэй</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <input type="text" class="form-control" name="position" placeholder="Албан тушаал">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><h4>Б. Байгууллага/ компанийн ерөнхий мэдээлэл</h4></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="org_name" placeholder="Байгууллага/ компанийн нэр">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="org_address" placeholder="Хаяг">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="org_tel" placeholder="Утас">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="org_email" placeholder="Э-шуудан">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="org_type" placeholder="Бизнесийн төрөл">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="number" class="form-control" name="org_employees" placeholder="Нийт ажиллагсдын тоо" min="0" step="1">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><h4>В. Бүтээмжийн сургалт</h4></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <label class="form-label">Бүтээмжийн чиглэлээр сургалтанд оролцож байсан эсэх</label>
                                                        <select name="everbefore" class="form-control">                                                            
                                                            <option value="1">Тийм</option>
                                                            <option value="0">Үгүй</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="whichone" placeholder="Хэрэв тийм бол ямар нэртэй сургалтанд оролцож байсан бэ?">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="whenisit" placeholder="Хэзээ">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="wherewasit" placeholder="Хаана">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <label class="form-label">Төлбөр төлөх хэлбэр</label>
                                                        <select name="payment_type" class="form-control">                                                            
                                                            <option value="1">Бэлнээр</option>
                                                            <option value="2">Нэхэмжлэх авах</option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3"><h4>Г. Оролцогчийн мэдээлэл</h4></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="participant_address" placeholder="Хаяг">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="participant_mobile" placeholder="Гар утас">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="participant_email" placeholder="Э-шуудан: /өөрийн/">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Шаардлагатай үед холбоо барих хүн</td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="participant_referrer_name" placeholder="Нэр">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="participant_referrer_type" placeholder="Таны хэн болох">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="participant_referrer_tel" placeholder="Утас:">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="participant_referrer_email" placeholder="Э-шуудан:">
                                                    </td>  
                                                    <td colspan="2">
                                                        <input type="text" class="form-control" name="participant_referrer_address" placeholder="Хаяг:">
                                                    </td>                                                  
                                                </tr>
                                            </table>
                                        </div>
                                        <button class="btn-default mt-3" type="submit">Илгээх</button>
                                    </form>
                                </td>
                            </tr>
                        </table>

                        <?
                    }
                    else 
                    {
                        ?>
                        <div class="alert alert-danger">
                            Сургалтын дугаар олдсонгүй
                        </div>
                        <?
                    }
                }
                ?>
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
