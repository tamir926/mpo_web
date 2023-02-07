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
                            <h2 class="content-header-title float-left mb-0">Шагналтан</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Шагналтан
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
                                <a class="dropdown-item" href="?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Бүртгэх</span></a>
                                <a class="dropdown-item" href="?action=category_new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Ангилал нэмэх</span></a>
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
                                                <th>Байгуулага</th>
                                                <th>Албан тушаал</th>
                                                <th>Ангилал</th>                                            
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT awards.*,awards_category.name category_name FROM awards LEFT JOIN awards_category ON awards.category=awards_category.id";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><img src="../<?=$data["avatar"];?>" height="40" width="40"></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td><?=$data["organization"];?></td>
                                                        <td><?=$data["position"];?></td>
                                                        <td><?=$data["category_name"];?></td>
                                                        <td><a class="btn btn-success" href="?action=edit&id=<?=$data["id"];?>">Засах</a></td>
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
                    $award_id = $_GET["id"];
                    $sql = "SELECT *FROM awards WHERE id='$award_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $award_name = $data["name"];
                        $award_organization = $data["organization"];
                        $award_position = $data["position"];
                        $award_avatar = $data["avatar"];
                        $award_category = $data["category"];

                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="?action=editing" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="award_id" value="<?=$award_id;?>">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" value="<?=$award_name;?>" placeholder="Нэр..." required />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="organization" value="<?=$award_organization;?>" placeholder="Байгууллага" required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="hash"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="position" value="<?=$award_position;?>" placeholder="Албан тушаал" required/>
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
                                        
                                            <img class="img-fluid d-block" src="../<?=$award_avatar;?>" />

                                            <div class="form-group">
                                                <label for="customFile1">Зураг сонгох</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile1"  name="image"/>
                                                    <label class="custom-file-label" for="customFile1">Зураг сонгох</label>
                                                </div>
                                            </div>

                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="tag"></i></span>
                                                </div>
                                                <select name="category" class="form-control">
                                                    <?
                                                    $sql = "SELECT *FROM awards_category ORDER BY dd";
                                                    $result = mysqli_query($conn,$sql);
                                                    while ($data = mysqli_fetch_array($result))
                                                    {
                                                        ?>
                                                        <option value="<?=$data["id"];?>" <?=($data["id"]==$award_category)?'SELECTED':'';?>><?=$data["name"];?></option>
                                                        <?
                                                    }
                                                    ?>
                                                </select>
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
                if ($action=="editing")
                {
                    $award_id = $_POST["award_id"];
                    $name = $_POST["name"];
                    $organization = $_POST["organization"];
                    $position = $_POST["position"];
                    $category = $_POST["category"];

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
                                  $target_file= substr($target_file,3);
                                  $sql = "UPDATE awards SET avatar='$target_file' WHERE id='$award_id'";
                                  mysqli_query($conn,$sql);
          
                              }
                      }

                    $sql = "UPDATE awards SET name='$name',organization='$organization',position='$position',category='$category' WHERE id='$award_id'";

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
                    <a class="btn btn-success" href="?action=edit&id=<?=$award_id;?>">Засах</a>
                    <a class="btn btn-primary" href="?action=detail&id=<?=$award_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="awards">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="?action=adding" method="post" enctype="multipart/form-data">
                            <div class="row">
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
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="organization" value="" placeholder="Байгууллага" required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="hash"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="position" value="" placeholder="Албан тушаал"/>
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

                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="tag"></i></span>
                                                </div>
                                                <select name="category" class="form-control">
                                                    <?
                                                    $sql = "SELECT *FROM awards_category ORDER BY dd";
                                                    $result = mysqli_query($conn,$sql);
                                                    while ($data = mysqli_fetch_array($result))
                                                    {
                                                        ?>
                                                        <option value="<?=$data["id"];?>"><?=$data["name"];?></option>
                                                        <?
                                                    }
                                                    ?>
                                                </select>
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
                    $organization = $_POST["organization"];
                    $position = $_POST["position"];
                    $category = $_POST["category"];
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

                    $sql = "INSERT INTO awards (name,organization,position,category,avatar) VALUES ('$name','$organization','$position','$category','$target_file')";

                    if (mysqli_query($conn,$sql))
                    {
                        $award_id = mysqli_insert_id($conn);
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
                    <a class="btn btn-success" href="?action=edit&id=<?=$award_id;?>">Засах</a>
                    <a class="btn btn-primary" href="?action=detail&id=<?=$award_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="awards">Жагсаалт</a>
                    <?
                }
                ?>

                <?
                if ($action=="detail")
                {
                    $award_id = $_GET["id"];
                    $sql = "SELECT *FROM awards WHERE id='$award_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $award_name = $data["name"];
                        $award_tel = $data["tel"];
                        $award_email = $data["email"];
                        $award_avatar = $data["avatar"];
                        $award_username = $data["username"];

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
                                                <p class="card-text mb-0"><?=$award_name;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="phone" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Утас</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$award_tel;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="mail" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Имэйл</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$award_email;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="lock" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Нэвтрэх нэр</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$award_username;?></p>
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
                                        <img class="img-fluid d-block" src="../<?=$award_avatar;?>" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-success" href="?action=edit&id=<?=$award_id;?>">Засах</a>
                        <a class="btn btn-primary" href="awards">Жагсаалт</a>
                    </section>
                    <?
                }
                ?>


                
                <?  
                if ($action=="category")
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
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT *FROM awards_category ORDER BY dd";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td>
                                                            <a class="btn btn-success" href="?action=category_edit&id=<?=$data["id"];?>">Засах</a>
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
                if ($action=="category_edit")
                {
                    $awards_category_id = $_GET["id"];
                    $sql = "SELECT *FROM awards_category WHERE id='$awards_category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $name = $data["name"];
                        $dd = $data["dd"];
                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="?action=category_editing" method="post" enctype="multipart/form-data">
                            <div class="row">
                            
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="awards_category_id" value="<?=$awards_category_id;?>">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="help-circle"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" placeholder="Ангиллын нэр" required  value="<?=$name;?>"/>
                                                </div>


                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="help-circle"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="dd" placeholder="Эрэмбэ" value="<?=$dd;?>" required/>
                                                </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Засварлах">

                        </form>
                    </section>
                    <a class="btn btn-danger waves-effect waves-float waves-light mt-3" href="?action=category_delete&id=<?=$awards_category_id;?>">Устгах</a>

                    <?
                }
                ?>


                <?
                if ($action=="category_editing")
                {
                    $awards_category_id = $_POST["awards_category_id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                  

                    $sql = "UPDATE awards_category SET name='$name',dd='$dd' WHERE id='$awards_category_id'";

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
                    <a class="btn btn-success" href="?action=category_edit&id=<?=$awards_category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="category_new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="?action=category_adding" method="post" enctype="multipart/form-data">
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
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="help-circle"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" placeholder="Ангиллын нэр" required />
                                                </div>

                                               

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="help-circle"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="dd" placeholder="Эрэмбэ" value="0" required/>
                                                </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Үүсгэх">

                        </form>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="category_adding")
                {
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                   

                    $sql = "INSERT INTO awards_category (name,dd) VALUES ('$name','$dd')";

                    if (mysqli_query($conn,$sql))
                    {
                        $awards_category_id = mysqli_insert_id($conn);
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
                    <a class="btn btn-success" href="?action=category_edit&id=<?=$awards_category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="?action=category">Жагсаалт</a>
                    <?
                }
                ?>

                <?
                if ($action=="category_delete")
                {
                    $awards_category_id = $_GET["id"];
                    $sql = "SELECT *FROM awards_category WHERE id='$awards_category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $name = $data["name"];
                        $dd = $data["dd"];

                        $sql = "DELETE FROM awards_category WHERE id='$awards_category_id'";

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
                        <a class="btn btn-primary" href="?action=category">Жагсаалт</a>
                        <?
                    }
                    else 
                    header("location:awards?action=category");                   
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