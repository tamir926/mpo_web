<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/login_check.php");?>
<? require_once("views/init.php");?>


   <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/maps/leaflet.min.css">


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/maps/map-leaflet.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-flat-pickr.css">


    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">
    <? if (isset($_GET["action"])) $action=$_GET["action"]; else $action="list"; 
    ?>
    <? require_once("views/header.php");?>


    <? require_once("views/topmenu.php");?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Сургалтанд бүртгүүлэгсэд</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Сургалтанд бүртгүүлэгсэд
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="content-body">
                <? 
                if ($action=="list")
                {
                    ?>
                     <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Нэр</th>
                                                <th>Утас</th>
                                                <th>Имэйл</th>
                                                <th>Байгуулага</th>                                            
                                                <th>Сургалт</th>                                            
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT courses_candidates.*,courses.title course_name 
                                                FROM courses_candidates 
                                                LEFT JOIN courses ON courses_candidates.course=courses.id 
                                                ORDER BY courses_candidates.id DESC LIMIT 50";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td><?=$data["participant_mobile"];?></td>
                                                        <td><?=$data["participant_email"];?></td>
                                                        <td><?=$data["org_name"];?></td>
                                                        <td><?=$data["course_name"];?></td>
                                                        <td width="300px">
                                                            <div class="btn-group">                                                                
                                                                <a class="btn btn-primary btn-sm" href="?action=detail&id=<?=$data["id"];?>">Харах</a>
                                                                <a class="btn btn-success btn-sm" href="?action=edit&id=<?=$data["id"];?>">Засах</a>
                                                                <a class="btn btn-danger btn-sm" href="?action=delete&id=<?=$data["id"];?>">Устгах</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                      
                    </section>
                    <?
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $candidate_id = $_GET["id"];
                    $sql = "SELECT *FROM courses_candidates WHERE id='$candidate_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $course_id = $data["course"];
                        $surname = $data["surname"];
                        $name = $data["name"];
                        $rd = $data["rd"];
                        $city = $data["city"];
                        $dob = $data["dob"];
                        $gender = $data["gender"];
                        $position = $data["position"];

                        $org_name = $data["org_name"];
                        $org_address = $data["org_address"];
                        $org_tel = $data["org_tel"];
                        $org_email = $data["org_email"];
                        $org_type = $data["org_type"];
                        $org_employees = $data["org_employees"];


                        $everbefore = $data["everbefore"];
                        $payment_type = $data["payment_type"];
                        $whichone = $data["whichone"];
                        $whenisit = $data["whenisit"];
                        $wherewasit = $data["wherewasit"];

                        $participant_address = $data["participant_address"];
                        $participant_mobile = $data["participant_mobile"];
                        $participant_email = $data["participant_email"];

                        $participant_referrer = $data["participant_referrer"];
                        $participant_referrers = explode("|",$participant_referrer);
                        $participant_referrer_name = $participant_referrers[0];
                        $participant_referrer_type = $participant_referrers[1];
                        $participant_referrer_tel = $participant_referrers[2];
                        $participant_referrer_email = $participant_referrers[3];
                        $participant_referrer_address = $participant_referrers[4];


                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="?action=editing" method="post" enctype="multipart/form-data">
                            <div class="container">
                                <div class="card">
                                    <input type="hidden" name="course_id" value="<?=$course_id;?>">
                                    <input type="hidden" name="candidate_id" value="<?=$candidate_id;?>">
                                    <table class="table table-border">
                                        <tr>
                                            <td colspan="3"><h4>A. Ерөнхий мэдээлэл</h4></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="surname" placeholder="Овог" value="<?=$surname;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="name" placeholder="Нэр" value="<?=$name;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="rd" placeholder="Регистрийн дугаар" value="<?=$rd;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <select name="city" class="form-control">                                                            
                                                    <option value="" selected disabled>Харьяалал</option>
                                                    <option value="1" <?=($city==1)?'SELECTED':'';?>>Багануур</option>
                                                    <option value="2" <?=($city==2)?'SELECTED':'';?>>Багахангай</option>
                                                    <option value="3" <?=($city==3)?'SELECTED':'';?>>Баянгол</option>
                                                    <option value="4" <?=($city==4)?'SELECTED':'';?>>Баянзүрх</option>												
                                                    <option value="5" <?=($city==5)?'SELECTED':'';?>>Налайх</option>												
                                                    <option value="6" <?=($city==6)?'SELECTED':'';?>>Сонгинохайрхан</option>												
                                                    <option value="7" <?=($city==7)?'SELECTED':'';?>>Сүхбаатар</option>												
                                                    <option value="8" <?=($city==8)?'SELECTED':'';?>>Хан-Уул</option>												
                                                    <option value="9" <?=($city==9)?'SELECTED':'';?>>Чингэлтэй</option>		
                                                    <option value="" disabled>Хөдөө орон нутаг</option>
                                                    <option value="102" <?=($city==102)?'SELECTED':'';?>>Архангай</option>
                                                    <option value="103" <?=($city==103)?'SELECTED':'';?>>Баян-Өлгий</option>
                                                    <option value="104" <?=($city==104)?'SELECTED':'';?>>Баянхонгор</option>
                                                    <option value="105" <?=($city==105)?'SELECTED':'';?>>Булган</option>												
                                                    <option value="106" <?=($city==106)?'SELECTED':'';?>>Говь-Алтай</option>												
                                                    <option value="107" <?=($city==107)?'SELECTED':'';?>>Говьсүмбэр</option>												
                                                    <option value="108" <?=($city==108)?'SELECTED':'';?>>Дархан-Уул </option>												
                                                    <option value="109" <?=($city==109)?'SELECTED':'';?>>Дорноговь</option>												
                                                    <option value="110" <?=($city==110)?'SELECTED':'';?>>Дорнод</option>																												
                                                    <option value="111" <?=($city==111)?'SELECTED':'';?>>Дундговь</option>																												
                                                    <option value="112" <?=($city==112)?'SELECTED':'';?>>Завхан</option>																												
                                                    <option value="113" <?=($city==113)?'SELECTED':'';?>>Орхон</option>																												
                                                    <option value="114" <?=($city==114)?'SELECTED':'';?>>Өвөрхангай</option>																												
                                                    <option value="115" <?=($city==115)?'SELECTED':'';?>>Өмнөговь</option>																												
                                                    <option value="116" <?=($city==116)?'SELECTED':'';?>>Сүхбаатар</option>																												
                                                    <option value="117" <?=($city==117)?'SELECTED':'';?>>Сэлэнгэ</option>																												
                                                    <option value="118" <?=($city==118)?'SELECTED':'';?>>Төв</option>																												
                                                    <option value="119" <?=($city==119)?'SELECTED':'';?>>Увс</option>																												
                                                    <option value="120" <?=($city==120)?'SELECTED':'';?>>Ховд</option>																												
                                                    <option value="121" <?=($city==121)?'SELECTED':'';?>>Хөвсгөл</option>																												
                                                    <option value="122" <?=($city==122)?'SELECTED':'';?>>Хэнтий</option>	
                                                </select>
                                            </td>
                                            <td width="30%">
                                                <input type="date" class="form-control" name="dob" placeholder="Төрсөн өдөр" value="<?=$dob;?>">
                                            </td>
                                            <td width="30%">
                                                <select name="gender" class="form-control">
                                                    <option value="0" <?=($gender==0)?'SELECTED':'';?>>Эмэгтэй</option>
                                                    <option value="1" <?=($gender==1)?'SELECTED':'';?>>Эрэгтэй</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <input type="text" class="form-control" name="position" placeholder="Албан тушаал" value="<?=$position;?>">
                                            </td>                                                   
                                        </tr>
                                        <tr>
                                            <td colspan="3"><h4>Б. Байгууллага/ компанийн ерөнхий мэдээлэл</h4></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="org_name" placeholder="Байгууллага/ компанийн нэр" value="<?=$org_name;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="org_address" placeholder="Хаяг" value="<?=$org_address;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="org_tel" placeholder="Утас" value="<?=$org_tel;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="org_email" placeholder="Э-шуудан" value="<?=$org_email;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="org_type" placeholder="Бизнесийн төрөл" value="<?=$org_type;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="number" class="form-control" name="org_employees" placeholder="Нийт ажиллагсдын тоо" min="0" step="1" value="<?=$org_employees;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><h4>В. Бүтээмжийн сургалт</h4></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <label class="form-label">Бүтээмжийн чиглэлээр сургалтанд оролцож байсан эсэх</label>
                                                <select name="everbefore" class="form-control">                                                            
                                                    <option value="1" <?=($everbefore==1)?'SELECTED':'';?>>Тийм</option>
                                                    <option value="0" <?=($everbefore==0)?'SELECTED':'';?>>Үгүй</option>
                                                </select>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="whichone" placeholder="Хэрэв тийм бол ямар нэртэй сургалтанд оролцож байсан бэ?" value="<?=$whichone;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="whenisit" placeholder="Хэзээ" value="<?=$whenisit;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="wherewasit" placeholder="Хаана" value="<?=$wherewasit;?>">
                                            </td>
                                        </tr>
        
                                        <tr>
                                            <td colspan="3">
                                                <label class="form-label">Төлбөр төлөх хэлбэр</label>
                                                <select name="payment_type" class="form-control">                                                            
                                                    <option value="1" <?=($payment_type==1)?'SELECTED':'';?>>Бэлнээр</option>
                                                    <option value="2" <?=($payment_type==2)?'SELECTED':'';?>>Нэхэмжлэх авах</option>
                                                </select>
                                            </td>
                                        </tr>
        
                                        <tr>
                                            <td colspan="3"><h4>Г. Оролцогчийн мэдээлэл</h4></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_address" placeholder="Хаяг" value="<?=$participant_address;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_mobile" placeholder="Гар утас" value="<?=$participant_mobile;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_email" placeholder="Э-шуудан: /өөрийн/" value="<?=$participant_email;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Шаардлагатай үед холбоо барих хүн</td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_referrer_name" placeholder="Нэр" value="<?=$participant_referrer_name;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_referrer_type" placeholder="Таны хэн болох" value="<?=$participant_referrer_type;?>">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_referrer_tel" placeholder="Утас:" value="<?=$participant_referrer_tel;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_referrer_email" placeholder="Э-шуудан:" value="<?=$participant_referrer_email;?>">
                                            </td>  
                                            <td colspan="2">
                                                <input type="text" class="form-control" name="participant_referrer_address" placeholder="Хаяг:" value="<?=$participant_referrer_address;?>">
                                            </td>                                                  
                                        </tr>
                                    </table>
                                </div>
                                <button class="btn btn-success waves-effect waves-float waves-light" type="submit">Хадгалах</button>

                            </div>

                        </form>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $candidate_id = $_POST["candidate_id"];

                    $course_id = $_POST["course_id"];
                    $surname = $_POST["surname"];
                    $name = $_POST["name"];
                    $rd = $_POST["rd"];
                    $city = $_POST["city"];
                    $dob = $_POST["dob"];
                    $gender = $_POST["gender"];
                    $position = $_POST["position"];

                    $org_name = $_POST["org_name"];
                    $org_address = $_POST["org_address"];
                    $org_tel = $_POST["org_tel"];
                    $org_email = $_POST["org_email"];
                    $org_type = $_POST["org_type"];
                    $org_employees = $_POST["org_employees"];


                    $everbefore = $_POST["everbefore"];
                    $payment_type = $_POST["payment_type"];
                    $whichone = $_POST["whichone"];
                    $whenisit = $_POST["whenisit"];
                    $wherewasit = $_POST["wherewasit"];

                    $participant_address = $_POST["participant_address"];
                    $participant_mobile = $_POST["participant_mobile"];
                    $participant_email = $_POST["participant_email"];
                    $participant_referrer_name = $_POST["participant_referrer_name"];
                    $participant_referrer_type = $_POST["participant_referrer_type"];
                    $participant_referrer_tel = $_POST["participant_referrer_tel"];
                    $participant_referrer_email = $_POST["participant_referrer_email"];
                    $participant_referrer_address = $_POST["participant_referrer_address"];

                    $participant_referrer = $participant_referrer_name."|".$participant_referrer_type."|".$participant_referrer_tel."|".$participant_referrer_email."|".$participant_referrer_address;
                    $sql = "UPDATE courses_candidates SET
                    course='$course_id',
                    surname='$surname',
                    name='$name',
                    rd='$rd',
                    gender='$gender',
                    city='$city',
                    dob='$dob',
                    position='$position',
                    org_name='$org_name',
                    org_address='$org_address',
                    org_tel='$org_tel',
                    org_email='$org_email',
                    org_type='$org_type',
                    org_employees='$org_employees',
                    everbefore='$everbefore',
                    payment_type='$payment_type',
                    whichone='$whichone',
                    whenisit='$whenisit',
                    wherewasit='$wherewasit',
                    participant_address='$participant_address',
                    participant_mobile='$participant_mobile',
                    participant_email='$participant_email',
                    participant_referrer='$participant_referrer'
                    WHERE id='$candidate_id'";
                    if (mysqli_query($conn,$sql))
                    {
                        ?>
                        <div class="alert alert-success">
                            <div class="alert-body">
                            Амжилттай заслаа
                            </div>
                        </div>
                        <?
                    }
                    else 
                    {
                        echo mysqli_error($conn);
                        ?>
                        <div class="alert alert-danger">
                            <div class="alert-body">Алдаа гарлаа</div>
                        </div>
                        <?
                    }
                
                     
                    ?>
                    <a class="btn btn-success" href="?action=edit&id=<?=$candidate_id;?>">Засах</a>
                    <a class="btn btn-primary" href="?action=detail&id=<?=$candidate_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="?action=list">Жагсаалт</a>
                    <?
                    
                }
                ?>
   

                <?
                if ($action=="detail")
                {
                    $candidate_id = $_GET["id"];
                    $sql = "SELECT *FROM courses_candidates WHERE id='$candidate_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $course_id = $data["course"];
                        $image = $data["image"];
                        $surname = $data["surname"];
                        $name = $data["name"];
                        $rd = $data["rd"];
                        $city = $data["city"];
                        $dob = $data["dob"];
                        $gender = $data["gender"];
                        $position = $data["position"];

                        $org_name = $data["org_name"];
                        $org_address = $data["org_address"];
                        $org_tel = $data["org_tel"];
                        $org_email = $data["org_email"];
                        $org_type = $data["org_type"];
                        $org_employees = $data["org_employees"];


                        $everbefore = $data["everbefore"];
                        $payment_type = $data["payment_type"];
                        $whichone = $data["whichone"];
                        $whenisit = $data["whenisit"];
                        $wherewasit = $data["wherewasit"];

                        $participant_address = $data["participant_address"];
                        $participant_mobile = $data["participant_mobile"];
                        $participant_email = $data["participant_email"];

                        $participant_referrer = $data["participant_referrer"];
                        $participant_referrers = explode("|",$participant_referrer);
                        $participant_referrer_name = $participant_referrers[0];
                        $participant_referrer_type = $participant_referrers[1];
                        $participant_referrer_tel = $participant_referrers[2];
                        $participant_referrer_email = $participant_referrers[3];
                        $participant_referrer_address = $participant_referrers[4];


                    }
                    ?>
                    <section id="input-group-basic">
                            <div class="container">
                                <div class="card">
                                    <table class="table table-border">
                                        <tr>
                                            <td colspan="3"><h4>A. Ерөнхий мэдээлэл</h4></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="surname" placeholder="Овог" value="<?=$surname;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="name" placeholder="Нэр" value="<?=$name;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="rd" placeholder="Регистрийн дугаар" value="<?=$rd;?>" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <select name="city" class="form-control" disabled>                                                            
                                                    <option value="" selected disabled>Харьяалал</option>
                                                    <option value="1" <?=($city==1)?'SELECTED':'';?>>Багануур</option>
                                                    <option value="2" <?=($city==2)?'SELECTED':'';?>>Багахангай</option>
                                                    <option value="3" <?=($city==3)?'SELECTED':'';?>>Баянгол</option>
                                                    <option value="4" <?=($city==4)?'SELECTED':'';?>>Баянзүрх</option>												
                                                    <option value="5" <?=($city==5)?'SELECTED':'';?>>Налайх</option>												
                                                    <option value="6" <?=($city==6)?'SELECTED':'';?>>Сонгинохайрхан</option>												
                                                    <option value="7" <?=($city==7)?'SELECTED':'';?>>Сүхбаатар</option>												
                                                    <option value="8" <?=($city==8)?'SELECTED':'';?>>Хан-Уул</option>												
                                                    <option value="9" <?=($city==9)?'SELECTED':'';?>>Чингэлтэй</option>		
                                                    <option value="" disabled>Хөдөө орон нутаг</option>
                                                    <option value="102" <?=($city==102)?'SELECTED':'';?>>Архангай</option>
                                                    <option value="103" <?=($city==103)?'SELECTED':'';?>>Баян-Өлгий</option>
                                                    <option value="104" <?=($city==104)?'SELECTED':'';?>>Баянхонгор</option>
                                                    <option value="105" <?=($city==105)?'SELECTED':'';?>>Булган</option>												
                                                    <option value="106" <?=($city==106)?'SELECTED':'';?>>Говь-Алтай</option>												
                                                    <option value="107" <?=($city==107)?'SELECTED':'';?>>Говьсүмбэр</option>												
                                                    <option value="108" <?=($city==108)?'SELECTED':'';?>>Дархан-Уул </option>												
                                                    <option value="109" <?=($city==109)?'SELECTED':'';?>>Дорноговь</option>												
                                                    <option value="110" <?=($city==110)?'SELECTED':'';?>>Дорнод</option>																												
                                                    <option value="111" <?=($city==111)?'SELECTED':'';?>>Дундговь</option>																												
                                                    <option value="112" <?=($city==112)?'SELECTED':'';?>>Завхан</option>																												
                                                    <option value="113" <?=($city==113)?'SELECTED':'';?>>Орхон</option>																												
                                                    <option value="114" <?=($city==114)?'SELECTED':'';?>>Өвөрхангай</option>																												
                                                    <option value="115" <?=($city==115)?'SELECTED':'';?>>Өмнөговь</option>																												
                                                    <option value="116" <?=($city==116)?'SELECTED':'';?>>Сүхбаатар</option>																												
                                                    <option value="117" <?=($city==117)?'SELECTED':'';?>>Сэлэнгэ</option>																												
                                                    <option value="118" <?=($city==118)?'SELECTED':'';?>>Төв</option>																												
                                                    <option value="119" <?=($city==119)?'SELECTED':'';?>>Увс</option>																												
                                                    <option value="120" <?=($city==120)?'SELECTED':'';?>>Ховд</option>																												
                                                    <option value="121" <?=($city==121)?'SELECTED':'';?>>Хөвсгөл</option>																												
                                                    <option value="122" <?=($city==122)?'SELECTED':'';?>>Хэнтий</option>	
                                                </select>
                                            </td>
                                            <td width="30%">
                                                <input type="date" class="form-control" name="dob" placeholder="Төрсөн өдөр" value="<?=$dob;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <select name="gender" class="form-control" disabled>
                                                    <option value="0" <?=($gender==0)?'SELECTED':'';?>>Эмэгтэй</option>
                                                    <option value="1" <?=($gender==1)?'SELECTED':'';?>>Эрэгтэй</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="text" class="form-control" name="position" placeholder="Албан тушаал" value="<?=$position;?>" disabled>
                                            </td>                                                   
                                            <td>
                                                <?
                                                if ($image<>"") echo '<img src="../'.$image.'" width="300" height="400">';
                                                ?>
                                            </td>                                                   
                                        </tr>
                                        <tr>
                                            <td colspan="3"><h4>Б. Байгууллага/ компанийн ерөнхий мэдээлэл</h4></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="org_name" placeholder="Байгууллага/ компанийн нэр" value="<?=$org_name;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="org_address" placeholder="Хаяг" value="<?=$org_address;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="org_tel" placeholder="Утас" value="<?=$org_tel;?>" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%"> 
                                                <input type="text" class="form-control" name="org_email" placeholder="Э-шуудан" value="<?=$org_email;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="org_type" placeholder="Бизнесийн төрөл" value="<?=$org_type;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="number" class="form-control" name="org_employees" placeholder="Нийт ажиллагсдын тоо" min="0" step="1" value="<?=$org_employees;?>" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><h4>В. Бүтээмжийн сургалт</h4></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <label class="form-label">Бүтээмжийн чиглэлээр сургалтанд оролцож байсан эсэх</label>
                                                <select name="everbefore" class="form-control" disabled>                                                            
                                                    <option value="1" <?=($everbefore==1)?'SELECTED':'';?>>Тийм</option>
                                                    <option value="0" <?=($everbefore==0)?'SELECTED':'';?>>Үгүй</option>
                                                </select>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="whichone" placeholder="Хэрэв тийм бол ямар нэртэй сургалтанд оролцож байсан бэ?" value="<?=$whichone;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="whenisit" placeholder="Хэзээ" value="<?=$whenisit;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="wherewasit" placeholder="Хаана" value="<?=$wherewasit;?>" disabled>
                                            </td>
                                        </tr>
        
                                        <tr>
                                            <td colspan="3">
                                                <label class="form-label">Төлбөр төлөх хэлбэр</label>
                                                <select name="payment_type" class="form-control" disabled>                                                            
                                                    <option value="1" <?=($payment_type==1)?'SELECTED':'';?>>Бэлнээр</option>
                                                    <option value="2" <?=($payment_type==2)?'SELECTED':'';?>>Нэхэмжлэх авах</option>
                                                </select>
                                            </td>
                                        </tr>
        
                                        <tr>
                                            <td colspan="3"><h4>Г. Оролцогчийн мэдээлэл</h4></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_address" placeholder="Хаяг" value="<?=$participant_address;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_mobile" placeholder="Гар утас" value="<?=$participant_mobile;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_email" placeholder="Э-шуудан: /өөрийн/" value="<?=$participant_email;?>" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Шаардлагатай үед холбоо барих хүн</td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_referrer_name" placeholder="Нэр" value="<?=$participant_referrer_name;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_referrer_type" placeholder="Таны хэн болох" value="<?=$participant_referrer_type;?>" disabled>
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_referrer_tel" placeholder="Утас:" value="<?=$participant_referrer_tel;?>" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                            <td width="30%">
                                                <input type="text" class="form-control" name="participant_referrer_email" placeholder="Э-шуудан:" value="<?=$participant_referrer_email;?>" disabled>
                                            </td>  
                                            <td colspan="2">
                                                <input type="text" class="form-control" name="participant_referrer_address" placeholder="Хаяг:" value="<?=$participant_referrer_address;?>" disabled>
                                            </td>                                                  
                                        </tr>
                                    </table>
                                </div>

                            </div>
                    </section>
                    <?
                }
                ?>

                <?
                if ($action=="delete")
                {
                    $candidate_id = $_GET["id"];
                    $sql = "SELECT *FROM courses_candidates WHERE id='$candidate_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $sql = "DELETE FROM courses_candidates WHERE id='$candidate_id'";

                        if (mysqli_query($conn,$sql))
                        {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <div class="alert-body">
                                Амжилттай устгалаа
                                </div>
                            </div>
                            <?
                        }
                        else 
                        {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                Алдаа гарлаа. <?=mysqli_error($conn);?>
                                </div>
                            </div>
                            <?
                        }
                        ?>
                        <a class="btn btn-primary" href="?action=list">Жагсаалт</a>
                        <?
                    }   
                    else 
                    {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <div class="alert-body">
                            Бүртгэл олдсонгүй
                            </div>
                        </div>
                        <?
                    }

                }
                ?>


                

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <? require_once("views/footer.php");?>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->

    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

</body>
<!-- END: Body-->

</html>