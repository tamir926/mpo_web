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
                <h3 class="text-black">Төсөл</h3>
                <ul class="submenu-ul">
                    <?
                    $sql = "SELECT *FROM project_category";
                    $result = mysqli_query($conn,$sql);
                    while ($data = mysqli_fetch_array($result))
                    {
                        if ($data["id"] == $category_id) echo '<b>';
                        ?>
                        <li><a href="projects?category=<?=$data["id"];?>"><?=$data["name"];?></a></li>
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
                                $sql = "SELECT *FROM project_category WHERE id='$category_id'";
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
                                $sql = "SELECT *FROM project WHERE category='$category_id'";
                                $result = mysqli_query($conn,$sql);
                                while ($project = mysqli_fetch_array($result))
                                {
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="event<?=($category_id>1)?$category_id:'';?>-items">
                                            <div class="event<?=($category_id>1)?$category_id:'';?>-img wrapper-img">
                                                <a href="#"><img src="<?=$project["image"];?>" alt="upcoming-events-img-1" class="img-responsive" /></a>
                                                <div class="date-box">
                                                    <h5> <i class="fa fa-clock-o" aria-hidden="true"></i> <?=$project["duration"];?>ц / <i class="fa fa-user" aria-hidden="true"></i> <?=$project["participants"];?> хүн / <i class="fa fa-calendar" aria-hidden="true"></i> <?=$project["date"];?></h5>
                                                </div>
                                            </div>
                                            <div class="events-content">
                                                <h3><a href="#" data-bs-toggle="modal" data-bs-target="#modal_id_<?=$project["id"];?>"><?=$project["title"];?></a></h3>
                                                <p><?=$project["brief"];?></p>
                                                <a href="#" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#modal_id_<?=$project["id"];?>">Дэлгэрэнгүй</a>
                                                <a class="btn btn-success btn-sm mt-3" href="?action=register&id=<?=$project["id"];?>">Бүртгүүлэх</a>
                                            </div>
                                        </div>
                                        
                                        <div class="modal fade" id="modal_id_<?=$project["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel"><?=$project["title"];?></h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?=$project["content"];?></p>
                                                    <table class="table mpo-table">
                                                        <tr>
                                                            <td width="30%"><h5 class="text-left">Хэзээ</h5></td>
                                                            <td width="30%"><h5 class="text-left">Цаг</h5></td>
                                                            <td width="30%"><h5 class="text-left">Оролцогч</h5></td>                                                        
                                                        </tr>
                                                        <tr>
                                                            <td><h4 class="text-left"><?=$project["date"];?></h4></td>
                                                            <td><h4 class="text-left"><?=$project["duration"];?> цаг</h4></td>
                                                            <td><h4 class="text-left"><?=$project["participants"];?> хүн</h4></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-success" href="?action=register&id=<?=$project["id"];?>">Бүртгүүлэх</a>
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
                    
                    
                    $project_id = $_GET["id"];
                    $sql = "SELECT *FROM project WHERE id='$project_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $project = mysqli_fetch_array($result);

                        ?>
                        <table class="table">
                            <tr>
                                <td width="40%" style="vertical-align:top; padding:20px;">
                                    <img src="<?=$project["image"];?>" class="w-100">
                                    <h4><?=$project["title"];?></h4>
                                    <p><?=$project["brief"];?></p>
                                    <table class="table mpo-table">
                                        <tr>
                                            <td width="30%"><h5 class="text-left">Хэзээ</h5></td>
                                            <td width="30%"><h5 class="text-left">Цаг</h5></td>
                                            <td width="30%"><h5 class="text-left">Оролцогч</h5></td>                                                        
                                        </tr>
                                        <tr>
                                            <td><h4 class="text-left"><?=$project["date"];?></h4></td>
                                            <td><h4 class="text-left"><?=$project["duration"];?> цаг</h4></td>
                                            <td><h4 class="text-left"><?=$project["participants"];?> хүн</h4></td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="60%">
                                    <?
                                    if (isset($_POST["project_id"]))
                                    {
                                        $course_id = protect($_POST["project_id"]);
                                        $comname = protect($_POST["comname"]);
                                        $comdate = protect($_POST["comdate"]);
                                        $comrd = protect($_POST["comrd"]);
                                        $ceogender = protect($_POST["ceogender"]);
                                        $field_action = protect($_POST["field_action"]);
                                        $workers = protect($_POST["workers"]);
                                        $woman = protect($_POST["woman"]);
                
                                        $department = protect($_POST["department"]);
                                        $location = protect($_POST["location"]);
                                        $ceoname = protect($_POST["ceoname"]);
                                        $city = protect($_POST["city"]);
                                        $reqiust = protect($_POST["reqiust"]);
                                        $advice = protect($_POST["advice"]);
                
                
                                        $result = protect($_POST["result"]);
                                        $start_date = protect($_POST["start_date"]);
                                        $end_date = protect($_POST["end_date"]);
                                        $meeting_location = protect($_POST["meeting_location"]);
                                        $level = protect($_POST["level"]);
                
                                        $pname = protect($_POST["pname"]);
                                        $pnamee = protect($_POST["pnamee"]);
                                        $pposition = protect($_POST["pposition"]);
                                        $pmail = protect($_POST["pmail"]);
                                        $ptel = protect($_POST["ptel"]);
                                        $pdate = protect($_POST["pdate"]);
                                        //$updated_date = protect($_POST["updated_date"]);
                                        //$created_date = protect($_POST["created_date"]);
                                        $sql = "INSERT INTO project_candidate 
                                        (project,comname,comdate,comrd,workers,ceogender,field_action,woman,department,location,ceoname,city,reqiust,advice,result,start_date,end_date,meeting_location,level,pname,pnamee,pposition,pmail,ptel,pdate) VALUES 
                                        ('$project_id','$comname','$comdate','$comrd','$workers','$ceogender','$field_action','$woman','$department','$location','$ceoname','$city','$reqiust','$advice','$result','$start_date','$end_date','$meeting_location','$level','$pname','$pnamee','$pposition','$pmail','$ptel','$pdate')";
                                        if (mysqli_query($conn,$sql))
                                        {
                                            $candidate_id = mysqli_insert_id($conn);
                                            // if(isset($_FILES['image']) && $_FILES['image']['name']!="")
                                            // {
                                            //     if ($_FILES['image']['name']!="")
                                            //         {                        
                                            //             @$folder = date("Ym");
                                            //             if(!file_exists('uploads/'.$folder))
                                            //             mkdir ( 'uploads/'.$folder);
                                            //             $target_dir = 'uploads/'.$folder;
                                            //             $target_file = $target_dir."/"."candidate_".$candidate_id."_".basename($_FILES["image"]["name"]);
                                            //             move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                                            //             $sql = "UPDATE project_candidate SET image='$target_file' WHERE id='$candidate_id'";
                                            //             mysqli_query($conn,$sql);
                                
                                            //         }
                                            // }
                                            
                                            ?>
                                            <div class="alert alert-success">Амжилттай бүртгэлээ</div>
                                            <?
                                        }
                                        else 
                                        {
                                            // echo mysqli_error($conn);
                                            ?>
                                            <div class="alert alert-danger">Алдаа гарлаа</div>
                                            <?
                                        }
                                    }

                                    ?>
                                    <form action="?action=register&id=<?=$project_id;?>" method="post" enctype="multipart/form-data">
                                        <div class="projects-form">
                                            <input type="hidden" name="project_id" value="<?=$project_id;?>">
                                            <table class="table table-border">
                                                <tr>
                                                    <td colspan="3"><h4>A. Аж ахуйн нэгжийн мэдээлэл</h4></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="comname" placeholder="Байгууллагын нэр" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="comrd" placeholder="Байгууллагын регистрийн дугаар" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="comdate" placeholder="Үүсгэн байгуулсан он" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="field_action" placeholder="Үйл ажиллагааны чиглэл" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="workers" placeholder="Нийт ажилчдын тоо" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="woman" placeholder="Эмэгтэй ажилчдын тоо" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="department" placeholder="Хэлтэс, нэгжийн тоо" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="location" placeholder="Байршил" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="ceoname" placeholder="Захирлын овог, нэр" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <select name="ceogender" class="form-control" required>
                                                            <option value="0">Эмэгтэй</option>
                                                            <option value="1">Эрэгтэй</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><h4>Б. Аж ахуйн нэгжийн мэдээлэл</h4></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select name="city" class="form-control" required>                                                            
                                                            <option value="" selected disabled>Төслийн сэдвийг сонгох /олон сэдвүүдийг нэгтгэн багц төсөл болгох боломжтой</option>
                                                            <option value="1">Бүтээмж, чанарын менежмент</option>
                                                            <option value="2">Ажлын байрны соёл 5С</option>
                                                            <option value="3">Кайзэн хандлага, саналын систем</option>
                                                            <option value="4">Чанарын менежментийн тогтолцоо ISO9001:2015</option>												
                                                            <option value="5">Баримтжуулсан тогтолцоо /ЧМТ ISO9001:2015 ОУ-ын стандартын шаардлагын хүрээнд/</option>												
                                                            <option value="6">Процессын хандлага /ЧМТ ISO9001:2015 ОУ-ын стандартын шаардлагын хүрээнд/</option>												
                                                            <option value="7">Ногоон бүтээмж</option>												
                                                            <option value="8">Материалын урсгал зардлын тооцоолол</option>												
                                                            <option value="9">Мэдлэгийн менежмент</option>		
                                                            <!-- <option value="" disabled>Хөдөө орон нутаг</option> -->
                                                            <option value="10">Чанарын дугуйлан</option>
                                                            <option value="11">7 алдагдал</option>
                                                            <option value="12">Стратеги менежмент</option>
                                                            <option value="13">Эрсдлийн удирдлага /ЧМТ ISO9001:2015 ОУ-ын стандартын шаардлагын хүрээнд/</option>												
                                                            <option value="14">Бизнесийн төгөлдөршил</option>												
                                                            <option value="15">Балансалсан үнэлгээний систем</option>												
                                                            <option value="16">Эрчим хүчний хэмнэлт </option>												
                                                       
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="reqiust" placeholder="Төслийн хүрээнд ямар асуудлыг шийдвэрлэхийг хүсч байна вэ?" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="advice" placeholder="Ямар төрлийн бизнесийн зөвлөгөө шаардлагатай байна вэ?" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="result" placeholder="Дээрх зөвлөгөөг авснаар танай компани ямар үр дүн хүлээж байна вэ?" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="start_date" placeholder="Төслийг эхлүүлэхээр төлөвлөж буй огноо: " required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="end_date" placeholder="Төслийн нийт үргэлжлэх хугацаа: " required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <select name="meeting_location" class="form-control" required>
                                                            <option value="" selected disabled>Төслийн уулзалтуудыг зохион байгуулах байршил</option>
                                                            <option value="0">Байгууллага дээрээ</option>
                                                            <option value="1">Зайнаас холбогдох /Zoom/</option>
                                                        </select>
                                                    </td>
                                                    <td width="30%">
                                                        <select name="level" class="form-control" required>
                                                            <option value="" selected disabled>Хамрагдах оролцогчдын түвшин</option>
                                                            <option value="0">Дээд түвшний удирдлага</option>
                                                            <option value="1">Дунд түвшний ажилтнууд</option>
                                                            <option value="2">Анхан шатны ажилчид</option>
                                                            <option value="3">Бүтээмжийн багийн гишүүд</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><h5 style="color: gray;"><b>Танай компанийг төлөөлж төслийг хариуцах хүн:</b></h5></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="pnamee" placeholder="Овог" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="pname" placeholder="Нэр" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="pposition" placeholder="Албан тушаал" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="pmail" placeholder="И-мэйл хаяг" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="ptel" placeholder="Утасны дугаар" required>
                                                    </td>
                                                    <td width="30%">
                                                        <input type="text" class="form-control" name="pdate" placeholder="Хүсэлт илгээсэн огноо" required>
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
                            Төслийн дугаар олдсонгүй
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
