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
                            <h2 class="content-header-title float-left mb-0">Байгууллага</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Байгууллага
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="volunteers_organisation?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Бүртгэх</span></a>
                            </div>
                        </div>
                    </div>
                </div> -->
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
                                                <th>Лого</th>
                                                <th>Нэр</th>
                                                <th>Төлөөлөгч</th>
                                                <th>Утас</th>
                                                <th>Имэйл</th>
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT *FROM volunteers_organisation ORDER BY created_at DESC";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><img src="../<?=$data["logo"];?>" height="35"></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td><?=$data["presenter_name"];?><br><i><?=$data["presenter_position"];?></i></td>
                                                        <td><?=$data["tel"];?></td>
                                                        <td><?=$data["email"];?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a class="btn btn-primary" href="volunteers_organisation?action=detail&id=<?=$data["id"];?>">Дэлгэрэнгүй</a>
                                                                <a class="btn btn-success" href="volunteers_organisation?action=edit&id=<?=$data["id"];?>">Засах</a></td>
                                                            </div>

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
                    $organisation_id = $_GET["id"];
                    $sql = "SELECT *FROM volunteers_organisation WHERE id='$organisation_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $organisation_name = $data["name"];
                        $organisation_presenter_name = $data["presenter_name"];
                        $organisation_presenter_position = $data["presenter_position"];
                        $organisation_tel = $data["tel"];
                        $organisation_email = $data["email"];
                        $organisation_logo = $data["logo"];

                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="volunteers_organisation?action=editing" method="post" enctype="multipart/form-data">
                            <div class="row">
                            
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="organisation_id" value="<?=$organisation_id;?>">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" value="<?=$organisation_name;?>" placeholder="Нэр..." required />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="presenter_name" value="<?=$organisation_presenter_name;?>" placeholder="Төлөөлөгч..." required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="presenter_position" value="<?=$organisation_presenter_position;?>" placeholder="Албан тушаал..." required/>
                                                </div>


                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="tel" value="<?=$organisation_tel;?>" placeholder="Утас..." required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="mail"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="email" value="<?=$organisation_email;?>" placeholder="Имэйл..." required/>
                                                </div>
                                                
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Лого</h4>
                                        </div>
                                        <div class="card-body">
                                        
                                            <img class="img-fluid d-block" src="../<?=$organisation_logo;?>" />

                                            <div class="form-group">
                                                <label for="customFile1">Лого сонгох</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile1"  name="image"/>
                                                    <label class="custom-file-label" for="customFile1">Лого сонгох</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Засварлах">

                        </form>

                        <a href="volunteers_organisation?action=delete&id=<?=$organisation_id;?>" class="btn btn-danger">Устгах</a>

                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $organisation_id = $_POST["organisation_id"];
                    $name = $_POST["name"];
                    $presenter_name = $_POST["presenter_name"];
                    $presenter_position = $_POST["presenter_position"];
                    $tel = $_POST["tel"];
                    $email = $_POST["email"];

                    if(isset($_FILES['image']) && $_FILES['image']['name']!="")
                      {
                          if ($_FILES['image']['name']!="")
                              {                        
                                  @$folder = date("Ym");
                                  if(!file_exists('../uploads/'.$folder))
                                  mkdir ( '../uploads/'.$folder);
                                  $target_dir = '../uploads/'.$folder;
                                  $target_file = $target_dir."/".@date("his").rand(0,1000). basename($_FILES["image"]["name"]);
                                  move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                                  //$image=settings("base_url").$target_file;
                                //   $thumb_image_content = resize_image($target_file,300,200);
                                //   $thumb = substr($target_file,0,-4)."_thumb".substr($target_file,-4,4);
                                //   imagejpeg($thumb_image_content,$thumb,75);
                                  //$thumb = settings("base_url").$thumb;
                                  $target_file= substr($target_file,3);
                                  $sql = "UPDATE volunteers_organisation SET logo='$target_file' WHERE id='$organisation_id'";

                                  //echo $sql;
                                  mysqli_query($conn,$sql);
          
                              }
                      }

                    $sql = "UPDATE volunteers_organisation SET name='$name',presenter_name='$presenter_name',presenter_position='$presenter_position',email='$email',tel='$tel' WHERE id='$organisation_id'";

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
                    <a class="btn btn-success" href="volunteers_organisation?action=edit&id=<?=$organisation_id;?>">Засах</a>
                    <a class="btn btn-primary" href="volunteers_organisation?action=detail&id=<?=$organisation_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="volunteers_organisation">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="volunteers_organisation?action=adding" method="post" enctype="multipart/form-data">
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
                                                    <input type="text" class="form-control" name="name"  placeholder="Нэр..." required />
                                                </div>


                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="mail"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="url" placeholder="Линк..." required/>
                                                </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Лого</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="customFile1">Лого сонгох</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile1"  name="image"/>
                                                    <label class="custom-file-label" for="customFile1">Лого сонгох</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Оруулах">

                        </form>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="adding")
                {
                    $name = $_POST["name"];
                    $url = $_POST["url"];
                    $target_file ="";
                   
                    if(isset($_FILES['image']) && $_FILES['image']['name']!="")
                      {
                          if ($_FILES['image']['name']!="")
                              {                        
                                  @$folder = date("Ym");
                                  if(!file_exists('../uploads/'.$folder))
                                  mkdir ( '../uploads/'.$folder);
                                  $target_dir = '../uploads/'.$folder;
                                  $target_file = $target_dir."/".@date("his").rand(0,1000). basename($_FILES["image"]["name"]);
                                  move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                                  //$image=settings("base_url").$target_file;
                                //   $thumb_image_content = resize_image($target_file,300,200);
                                //   $thumb = substr($target_file,0,-4)."_thumb".substr($target_file,-4,4);
                                //   imagejpeg($thumb_image_content,$thumb,75);
                                  //$thumb = settings("base_url").$thumb;
                                  $target_file= substr($target_file,3);
          
                              }
                      }

                    $sql = "INSERT INTO volunteers_organisation (name,url,logo) VALUES ('$name','$url','$target_file')";

                    if (mysqli_query($conn,$sql))
                    {
                        $organisation_id = mysqli_insert_id($conn);
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
                    <a class="btn btn-success" href="volunteers_organisation?action=edit&id=<?=$organisation_id;?>">Засах</a>
                    <a class="btn btn-primary" href="volunteers_organisation?action=detail&id=<?=$organisation_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="volunteers_organisation">Жагсаалт</a>
                    <?
                }
                ?>

                <?
                if ($action=="detail")
                {
                    $organisation_id = $_GET["id"];
                    $sql = "SELECT *FROM volunteers_organisation WHERE id='$organisation_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $name = $data["name"];
                        $email = $data["email"];
                        $tel = $data["tel"];
                        $type = $data["type"];
                        $industry = $data["industry"];
                        $presenter_name = $data["presenter_name"];
                        $presenter_position = $data["presenter_position"];
                        $city = $data["city"];
                        $district = $data["district"];
                        $web = $data["web"];
                        $instagram = $data["instagram"];
                        $facebook = $data["facebook"];
                        $youtube = $data["youtube"];
                        $twitter = $data["twitter"];
                        $other = $data["other"];
                        $logo = $data["logo"];

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
                                                <p class="card-text mb-0"><?=$name;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="home" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Байгууллагын төрөл</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$type;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="home" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Үйл ажиллагааны төрөл</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$industry;?></p>
                                            </div>




                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Төлөөлөгч</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$presenter_name;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="phone" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Албан тушаал</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$presenter_position;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="phone" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Утас</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$tel;?></p>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="mail" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Имэйл</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$email;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Хаяг хот</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$city;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Хаяг дүүрэг</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$district;?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Лого</h4>
                                    </div>
                                    <div class="card-body">
                                        <img class="img-fluid d-block" src="../<?=$logo;?>" />
                                        
                                        <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Вебсайт</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$web;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Facebook</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$facebook;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Instagram</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$instagram;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">youtube</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$youtube;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">twitter</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$twitter;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">other</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$other;?></p>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-success" href="volunteers_organisation?action=edit&id=<?=$organisation_id;?>">Засах</a>
                        <a class="btn btn-primary" href="volunteers_organisation">Жагсаалт</a>
                    </section>
                    <?
                }
                ?>

                <?
                if ($action=="delete")
                {
                    $organisation_id = $_GET["id"];
                    $sql = "SELECT *FROM volunteers_organisation WHERE id='$organisation_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $image = $data["logo"];

                        if(file_exists('../'.$image))
                        {
                            unlink('../'.$image);
                        }

                        $sql = "DELETE FROM volunteers_organisation WHERE id='$organisation_id'";

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
                        <a class="btn btn-primary" href="volunteers_organisation">Жагсаалт</a>
                        <?
                    }
                    else 
                    header("location:volunteers_organisation");
                    
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