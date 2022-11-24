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
                            <h2 class="content-header-title float-left mb-0">Экспертүүд</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Экспертүүд
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="experts?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Эксперт бүртгэх</span></a>
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
                                                <th>Зураг</th>
                                                <th>Нэр</th>
                                                <th>Утас</th>
                                                <th>Имэйл</th>
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT *FROM experts";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><img src="../<?=$data["avatar"];?>" height="40" width="30"></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td><?=$data["tel"];?></td>
                                                        <td><?=$data["email"];?></td>
                                                        <td><a class="btn btn-success" href="experts?action=edit&id=<?=$data["id"];?>">Засах</a></td>
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
                    $expert_id = $_GET["id"];
                    $sql = "SELECT *FROM experts WHERE id='$expert_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $expert_name = $data["name"];
                        $expert_tel = $data["tel"];
                        $expert_email = $data["email"];
                        $expert_avatar = $data["avatar"];
                        $expert_position = $data["position"];
                        $expert_worked = $data["worked"];
                        $expert_education = $data["education"];
                        $expert_exprience = $data["experience"];
                        $expert_fee = $data["fee"];

                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="experts?action=editing" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="expert_id" value="<?=$expert_id;?>">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" value="<?=$expert_name;?>" placeholder="Нэр..." required />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="tel" value="<?=$expert_tel;?>" placeholder="Утас..." required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="mail"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="email" value="<?=$expert_email;?>" placeholder="Имэйл..." required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="fee" value="<?=$expert_fee;?>"  value="0" placeholder="Төлбөр" required />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="position" value="<?=$expert_position;?>" placeholder="Албан тушаал" required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="worked" value="<?=$expert_worked;?>" placeholder="Ажиллласан жил" required/>
                                                </div>



                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <textarea class="form-control"  name="education" placeholder="Боловсролын байдал"><?=$expert_education;?></textarea>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <textarea class="form-control"  name="experience" placeholder="Мэргэшсэн чиглэл:"><?=$expert_exprience;?></textarea>
                                                </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Зураг</h4>
                                        </div>
                                        <div class="card-body">
                                        
                                            <img class="img-fluid d-block" src="../<?=$expert_avatar;?>" />

                                            <div class="form-group">
                                                <label for="customFile1">Зураг сонгох</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile1"  name="image"/>
                                                    <label class="custom-file-label" for="customFile1">Зураг сонгох</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Засварлах">

                        </form>
                        <a href="experts?action=delete&id=<?=$expert_id;?>" class="btn btn-danger mt-3">Устгах</a>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $expert_id = $_POST["expert_id"];
                    $name = $_POST["name"];
                    $tel = $_POST["tel"];
                    $email = $_POST["email"];

                    $position = $_POST["position"];
                    $worked = $_POST["worked"];
                    $education = mysqli_escape_string($conn,$_POST["education"]);
                    $experience = mysqli_escape_string($conn,$_POST["experience"]);
                    $fee = intval($_POST["fee"]);


                    if (is_uploaded_file($_FILES['image']['tmp_name'])) 
                    { 
                            @$folder = date("Ym");
                            if(!file_exists('../uploads/'.$folder))
                            mkdir ( '../uploads/'.$folder);
                            $target_dir = '../uploads/'.$folder."/";
                            $filename = date("his")."_".rand(0,1000)."_".$expert_id;
                            $ext = substr(basename($_FILES["image"]["name"]),-3,3);
                            $target_file = $target_dir.$filename.".".$ext;
                            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                
                            // echo $target_dir."/".$filename . ".jpg";
                            if (strtolower($ext)=='png')
                            {
                                $image = imagecreatefrompng($target_file);
                                $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
                                imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
                                imagealphablending($bg, TRUE);
                                imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
                                imagedestroy($image);
                                $quality = 50; // 0 = worst / smaller file, 100 = better / bigger file 
                                imagejpeg($bg, $target_dir.$filename . ".jpg", $quality);
                                imagedestroy($bg);
                                unlink($target_dir.$filename . ".png");
                                $target_file =$target_dir.$filename . ".jpg";
                                $ext = '.jpg';
                            }
                                $image_content = resize_image($target_file,300,300);
                                imagejpeg($image_content,$target_file,50);
                                $target_file= substr($target_file,3);
                                // $sql = "SELECT avatar FROM experts WHERE id='$position_id'";
                                // $result = mysqli_query($conn,$sql);
                                // $data = mysqli_fetch_array($result);
                                // $old_avatar = $data["avatar"];
                                // if ($old_avatar<>"")  $old_images.=",".$target_file;
                                // else $old_images=$target_file;
                                $sql = "UPDATE experts SET avatar='$target_file' WHERE id='$expert_id'";
                                // echo $sql;
                               mysqli_query($conn,$sql);
                               
                
                    }
                    $sql = "UPDATE experts SET name='$name',tel='$tel',email='$email',position='$position',worked='$worked',education='$education',experience='$experience',fee='$fee' WHERE id='$expert_id'";

                    if (mysqli_query($conn,$sql))
                    {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай засагдлаа
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
                    <a class="btn btn-success" href="experts?action=edit&id=<?=$expert_id;?>">Засах</a>
                    <a class="btn btn-primary" href="experts?action=detail&id=<?=$expert_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="experts">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="experts?action=adding" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" value="" placeholder="Нэр..." required />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="tel" value="" placeholder="Утас..." required/>
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="mail"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="email" value="" placeholder="Имэйл..." required/>
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                </div>
                                                <input type="number" class="form-control" name="fee" value=""  value="0" placeholder="Төлбөр" required />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="position" value="" placeholder="Албан тушаал" required/>
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="worked" value="" placeholder="Ажиллласан жил" required/>
                                            </div>



                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                </div>
                                                <textarea class="form-control"  name="education" placeholder="Боловсролын байдал"></textarea>
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                </div>
                                                <textarea class="form-control"  name="experience" placeholder="Мэргэшсэн чиглэл:"></textarea>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Зураг</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="customFile1">Зураг сонгох</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile1"  name="image"/>
                                                    <label class="custom-file-label" for="customFile1">Зураг сонгох</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Засварлах">

                        </form>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="adding")
                {
                    $name = $_POST["name"];
                    $tel = $_POST["tel"];
                    $email = $_POST["email"];

                    $position = $_POST["position"];
                    $worked = $_POST["worked"];
                    $education = mysqli_escape_string($conn,$_POST["education"]);
                    $experience = mysqli_escape_string($conn,$_POST["experience"]);
                    $fee = intval($_POST["fee"]);
                 

                    $sql = "INSERT INTO experts (name,tel,email,position,worked,education,experience,fee) VALUES ('$name','$tel','$email','$position','$worked','$education','$experience','$fee')";

                    if (mysqli_query($conn,$sql))
                    {
                        $expert_id = mysqli_insert_id($conn);

                        if (is_uploaded_file($_FILES['image']['tmp_name'])) 
                        { 
                                @$folder = date("Ym");
                                if(!file_exists('../uploads/'.$folder))
                                mkdir ( '../uploads/'.$folder);
                                $target_dir = '../uploads/'.$folder."/";
                                $filename = date("his")."_".rand(0,1000)."_".$expert_id;
                                $ext = substr(basename($_FILES["image"]["name"]),-3,3);
                                $target_file = $target_dir.$filename.".".$ext;
                                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                    
                                // echo $target_dir."/".$filename . ".jpg";
                                if (strtolower($ext)=='png')
                                {
                                    $image = imagecreatefrompng($target_file);
                                    $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
                                    imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
                                    imagealphablending($bg, TRUE);
                                    imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
                                    imagedestroy($image);
                                    $quality = 50; // 0 = worst / smaller file, 100 = better / bigger file 
                                    imagejpeg($bg, $target_dir.$filename . ".jpg", $quality);
                                    imagedestroy($bg);
                                    unlink($target_dir.$filename . ".png");
                                    $target_file =$target_dir.$filename . ".jpg";
                                    $ext = '.jpg';
                                }
                                    $image_content = resize_image($target_file,300,300);
                                    imagejpeg($image_content,$target_file,50);
                                    $target_file= substr($target_file,3);
                                    // $sql = "SELECT avatar FROM experts WHERE id='$position_id'";
                                    // $result = mysqli_query($conn,$sql);
                                    // $data = mysqli_fetch_array($result);
                                    // $old_avatar = $data["avatar"];
                                    // if ($old_avatar<>"")  $old_images.=",".$target_file;
                                    // else $old_images=$target_file;
                                    $sql = "UPDATE experts SET avatar='$target_file' WHERE id='$expert_id'";
                                    // echo $sql;
                                mysqli_query($conn,$sql);
                                
                    
                        }
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай үүсгэгдлээ
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
                    <a class="btn btn-success" href="experts?action=edit&id=<?=$expert_id;?>">Засах</a>
                    <a class="btn btn-primary" href="experts?action=detail&id=<?=$expert_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="experts">Жагсаалт</a>
                    <?
                }
                ?>

                <?
                if ($action=="detail")
                {
                    $expert_id = $_GET["id"];
                    $sql = "SELECT *FROM experts WHERE id='$expert_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $expert_name = $data["name"];
                        $expert_tel = $data["tel"];
                        $expert_email = $data["email"];
                        $expert_avatar = $data["avatar"];
                        $expert_position = $data["position"];
                        $expert_worked = $data["worked"];
                        $expert_education = $data["education"];
                        $expert_exprience = $data["experience"];
                        $expert_fee = $data["fee"];


                    }
                    ?>
                    <section id="input-group-basic">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="user-info-wrapper">
                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Нэр</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$expert_name;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="phone" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Утас</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$expert_tel;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="mail" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Имэйл</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$expert_email;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="lock" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Нэвтрэх нэр</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$expert_username;?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Зураг</h4>
                                    </div>
                                    <div class="card-body">
                                        <img class="img-fluid d-block" src="../<?=$expert_avatar;?>" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-success" href="experts?action=edit&id=<?=$expert_id;?>">Засах</a>
                        <a class="btn btn-primary" href="experts">Жагсаалт</a>
                    </section>
                    <?
                }
                ?>

                <?
                if ($action=="delete")
                {
                    $expert_id = $_GET["id"];
                    $sql = "SELECT *FROM experts WHERE id='$expert_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $expert_avatar = $data["avatar"];

                        $sql = "DELETE FROM experts WHERE id='$expert_id'";

                        if (mysqli_query($conn,$sql))
                        {
                            if (file_exists('../'.$expert_avatar)) unlink('../'.$expert_avatar);
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
                        <a class="btn btn-primary" href="experts">Жагсаалт</a>
                        <?
                    }
                   
                }
                ?>

                <? 
                if ($action=="time")
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
                                                <th>Өдөр</th>
                                                <th>Цаг</th>
                                                <th>Эксперт</th>
                                                <th>Төлөв</th>                                                
                                                <th>Захиалга өгсөн</th>                                                
                                                <th>Захиалсан</th>                                                                                                
                                                <th>Төлбөр</th>                                                
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT expert_time.*,name expert_name,fee FROM expert_time LEFT JOIN experts ON expert_time.expert=experts.id WHERE date>='".date("Y-m-d")."' ORDER BY time";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><?=$data["date"];?></td>
                                                        <td><?=$data["time"];?></td>
                                                        <td><?=$data["expert_name"];?></td>
                                                        <td><?=($data["status"])?'<span class="badge badge-success">Батаглаажсан</span>':'<span class="badge badge-danger">Баталгаажаагүй</span>';?></td>
                                                        <td><?=$data["created_date"];?></td>
                                                        <td><?=$data["cust_name"];?><br><?=$data["cust_tel"];?><br><?=$data["cust_email"];?></td>

                                                        <td><?=number_format($data["fee"]);?></td>
                                                        <td>
                                                            <?
                                                            if ($data["status"]==0)                                                            
                                                            {
                                                                ?>
                                                                <a class="btn btn-success" href="experts?action=timeverify&id=<?=$data["id"];?>">Баталгаажуулах</a>
                                                                <a class="btn btn-danger" href="experts?action=timedelete&id=<?=$data["id"];?>">Устгах</a>
                                                                <?
                                                            }
                                                            ?>
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
                if ($action=="timeverify")
                {
                    $time_id = intval($_GET["id"]);
                  
                    $sql = "UPDATE expert_time SET status=1,verified_date=current_timestamp() WHERE id='$time_id'";

                    if (mysqli_query($conn,$sql))
                    {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай засагдлаа
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
                    <a class="btn btn-primary" href="experts?action=time">Жагсаалт</a>
                    <?
                    
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