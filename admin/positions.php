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


    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">
    <? if ($_GET["action"]) $action=$_GET["action"]; else $action="list"; 
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
                            <h2 class="content-header-title float-left mb-0">Байршил</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Байршил
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="plus"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="positions?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-left">Бүртгэх</span></a>
                                <a class="dropdown-item" href="positions?action=category_add"><i class="mr-1" data-feather="bar-chart-2"></i><span class="align-left">Ангилал нэмэх</span></a>
                                <a class="dropdown-item" href="positions?action=form_add"><i class="mr-1" data-feather="check-square"></i><span class="align-left">Форм нэмэх</span></a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <? 
                if ($action=="list")
                {
                    ?><!-- Basic table -->
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
                                                <th>Оруулсан</th>
                                                <th>Тайлбар</th>                                            
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT *FROM positions";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    $position_id =  $data["id"];
                                                    $position_name =  $data["name"];
                                                    $position_tel =  $data["tel"];
                                                    $position_email =  $data["email"];
                                                    $position_comment =  $data["comment"];
                                                    $member_id = $data["member_id"];
                                                    $sql_member = "SELECT *FROM members WHERE id='$member_id'";
                                                    $result_member = mysqli_query($conn,$sql_member);
                                                    $data_member = mysqli_fetch_array($result_member);
                                                    $member_name =$data_member["name"];
                                                    $member_avatar =$data_member["avatar"];
                    

                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td><?=$data["tel"];?></td>
                                                        <td><?=$data["email"];?></td>
                                                        <td>
                                                        <a href="members?action=detail&id=<?=$member_id;?>">
                                                                <div class="avatar">
                                                                    <img src="../<?=$member_avatar;?>" width="34" height="34" alt="Avatar" />
                                                                </div><?=$member_name;?>
                                                            </a>
                                                        </td>
                                                        <td><?=$data["comment"];?></td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="positions?action=detail&id=<?=$position_id;?>" title="Дэлгэрэнгүй"><i data-feather='more-horizontal'></i></a>
                                                            <a class="btn btn-success btn-sm" href="positions?action=edit&id=<?=$position_id;?>" title="Засах"><i data-feather='edit'></i></a>
                                                        
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
                        <!-- Modal to add new record -->
                        <div class="modal modal-slide-in fade" id="modals-slide-in">
                            <div class="modal-dialog sidebar-sm">
                                <form class="add-new-record modal-content pt-0">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                            <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-post">Post</label>
                                            <input type="text" id="basic-icon-default-post" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-email">Email</label>
                                            <input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                                            <small class="form-text text-muted"> You can use letters, numbers & periods </small>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-date">Joining Date</label>
                                            <input type="text" class="form-control dt-date" id="basic-icon-default-date" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="form-label" for="basic-icon-default-salary">Salary</label>
                                            <input type="text" id="basic-icon-default-salary" class="form-control dt-salary" placeholder="$12000" aria-label="$12000" />
                                        </div>
                                        <button type="button" class="btn btn-primary data-submit mr-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!--/ Basic table -->
                    <?
                }
                ?>

                <?
                if ($action=="detail")
                {
                    $position_id = $_GET["id"];
                    $sql = "SELECT *FROM positions WHERE id='$position_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $position_name = $data["name"];
                        $position_tel = $data["tel"];
                        $position_email = $data["email"];
                        $position_comment = $data["comment"];
                        $position_location = $data["location"];
                        $position_location = str_replace(",",", ",$position_location);
                        $position_images = $data["images"];

                        ?>

                        <?
                    }
                    ?>
                    <section id="input-group-basic">
                        <div class="row">
                            <!-- Basic -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                    </div>
                                    <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="home" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Нэр</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$position_name;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="phone" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Утас</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$position_tel;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="mail" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Имэйл</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$position_email;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather='edit' class="mr-1"></i></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Тайлбар</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$position_comment;?></p>
                                            </div>

                                    </div>

                                </div>
                            </div>

                            <!-- Merged -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Зураг</h4>
                                    </div>
                                    <div class="card-body">
                                        <?
                                        if ($position_images<>"")
                                        {
                                            $images = explode(",",$position_images);
                                            if (count($images)>0)
                                            {
                                                ?>
                                                    <div id="carousel-wrap" class="carousel slide" data-ride="carousel" data-wrap="false">
                                                        <ol class="carousel-indicators">
                                                            <?
                                                                $count =0;
                                                                foreach ($images as $image)
                                                                {
                                                                    ?>
                                                                    <li data-target="#carousel-interval" data-slide-to="<?=$count;?>" <?=($count==0)?'class="active"':'';?>></li>
                                                                    <?
                                                                    $count++;
                                                                }
                                                            ?>
                                                        </ol>
                                                        <div class="carousel-inner" role="listbox">    
                                                            <?
                                                            $count =0;
                                                            foreach ($images as $image)
                                                            {
                                                                
                                                                ?>
                                                                <div class="carousel-item <?=($count++==0)?'active':'';?>">
                                                                    <img class="img-fluid d-block w-100" src="../<?=$image;?>" alt="First slide" />
                                                                </div>

                                                                <?
                                                            }
                                                            ?>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carousel-wrap" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carousel-wrap" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                <?
                                            }
                                        }
                                        ?>


                                    </div>
                                </div>
                                <div class="card">

                                    <div class="card-header">
                                        <h4 class="card-title">Байршил</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="leaflet-map" id="user-location"></div>
                                    </div>
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
                    $position_id = $_GET["id"];
                    $sql = "SELECT *FROM positions WHERE id='$position_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $position_name = $data["name"];
                        $position_tel = $data["tel"];
                        $position_email = $data["email"];
                        $position_comment = $data["comment"];
                        $position_location = $data["location"];
                        $position_location = str_replace(",",", ",$position_location);
                        $position_images = $data["images"];

                        ?>

                        <?
                    }
                    ?>
                    <section id="input-group-basic">
                        <div class="row">
                            <!-- Basic -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="positions?action=editing" method="post">
                                            <input type="hidden" name="position_id" value="<?=$position_id;?>">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" value="<?=$position_name;?>" placeholder="Нэр..." />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="tel" value="<?=$position_tel;?>" placeholder="Утас..." />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="mail"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="email" value="<?=$position_email;?>" placeholder="Имэйл..." />
                                            </div>


                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Тайлбар</span>
                                                </div>
                                                <textarea class="form-control" aria-label="With textarea" name="comment"><?=$position_comment;?></textarea>
                                            </div>

                                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">

                                        </form>
                                    </div>

                                </div>
                            </div>

                            <!-- Merged -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Зураг</h4>
                                    </div>
                                    <div class="card-body">
                                        <?
                                        if ($position_images<>"")
                                        {
                                            $images = explode(",",$position_images);
                                            if (count($images)>0)
                                            {
                                                ?>
                                                    <div id="carousel-wrap" class="carousel slide" data-ride="carousel" data-wrap="false">
                                                        <ol class="carousel-indicators">
                                                            <?
                                                                $count =0;
                                                                foreach ($images as $image)
                                                                {
                                                                    ?>
                                                                    <li data-target="#carousel-interval" data-slide-to="<?=$count;?>" <?=($count==0)?'class="active"':'';?>></li>
                                                                    <?
                                                                    $count++;
                                                                }
                                                            ?>
                                                        </ol>
                                                        <div class="carousel-inner" role="listbox">    
                                                            <?
                                                            $count =0;
                                                            foreach ($images as $image)
                                                            {
                                                                
                                                                ?>
                                                                <div class="carousel-item <?=($count++==0)?'active':'';?>">
                                                                    <img class="img-fluid d-block w-100" src="../<?=$image;?>" alt="First slide" />
                                                                </div>

                                                                <?
                                                            }
                                                            ?>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carousel-wrap" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carousel-wrap" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                <?
                                            }
                                        }
                                        ?>


                                    </div>
                                </div>
                                <div class="card">

                                    <div class="card-header">
                                        <h4 class="card-title">Байршил</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="leaflet-map" id="user-location"></div>
                                    </div>
                                </div>
                            </div>

                          
                           
                        </div>
                    </section>
                    <?
                }
                ?>

                


                <?
                if ($action=="editing")
                {
                    $position_id = $_POST["position_id"];
                    $name = $_POST["name"];
                    $tel = $_POST["tel"];
                    $email = $_POST["email"];
                    $comment = $_POST["comment"];

                    $sql = "UPDATE positions SET name='$name',tel='$tel',email='$email',comment='$comment' WHERE id='$position_id'";


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
                    <a class="btn btn-success" href="positions?action=edit&id=<?=$position_id;?>">Засах</a>
                    <a class="btn btn-primary" href="positions?action=detail&id=<?=$position_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="positions">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                        <div class="row">
                            <!-- Basic -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="positions?action=adding" method="post">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" placeholder="Нэр..." />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="tel" placeholder="Утас..." />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="mail"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="email" placeholder="Имэйл..." />
                                            </div>


                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Тайлбар</span>
                                                </div>
                                                <textarea class="form-control" aria-label="With textarea" name="comment"></textarea>
                                            </div>

                                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">

                                        </form>
                                    </div>

                                </div>
                            </div>

                            <!-- Merged -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Зураг</h4>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                </div>
                                <div class="card">

                                    <div class="card-header">
                                        <h4 class="card-title">Байршил</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="leaflet-map" id="user-location"></div>
                                    </div>
                                </div>
                            </div>

                          
                           
                        </div>
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
                    $comment = $_POST["comment"];

                    $sql = "INSERT INTO positions (name,tel,email,comment,member_id)  VALUES ('$name','$tel','$email','$comment','$logged_member_id')";

                    if (mysqli_query($conn,$sql))
                    {
                        $position_id  = mysqli_insert_id ($conn);
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай үүслээ
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
                    <a class="btn btn-success" href="positions?action=edit&id=<?=$position_id;?>">Засах</a>
                    <a class="btn btn-primary" href="positions?action=detail&id=<?=$position_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="positions">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <? 
                if ($action=="category")
                {
                    ?>
                    <div class="tab-content">
                        <div class="collapse-margin collapse-icon mt-2">
                            <?
                            $sql = "SELECT *FROM categories ORDER BY dd";
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $category_name = $data["name"];
                                $category_id = $data["id"];
                                $color = $data["color"];
                                ?>
                                <div class="card">
                                    <div class="card-header" data-toggle="collapse" role="button" data-target="#category-<?=$category_id;?>" aria-expanded="false" aria-controls="category-<?=$category_id;?>">
                                        <span class="lead collapse-title">
                                            <span class="bullet font-small-3 mr-50 cursor-pointer" style="background-color:<?=$color;?>"></span> 
                                            <?=$category_name;?>
                                        </span> 
                                        <div class="btn-group pull-right">
                                            <a href="positions?action=category_edit&id=<?=$category_id;?>" class="btn btn-success btn-sm waves-effect waves-float waves-light"><i data-feather='edit'></i> Засах</a>
                                            <a href="positions?action=subcategory_add&id=<?=$category_id;?>" class="btn btn-primary btn-sm waves-effect waves-float waves-light"><i data-feather='plus'></i> Нэмэх</a>
                                        </div>
                                    </div>

                                    <div id="category-<?=$category_id;?>" class="collapse" aria-labelledby="category-<?=$category_id;?>">
                                        <div class="card-body">
                                            <table>
                                                <tbody>
                                                    
                                                        <?
                                                        $sub_sql = "SELECT *FROM position_subcategories WHERE parent_id='$category_id' ORDER BY dd";
                                                        $sub_result = mysqli_query($conn,$sub_sql);
                                                        while ($sub_data = mysqli_fetch_array($sub_result))
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td><?=$sub_data["name"];?></td>
                                                                <td>
                                                                    <a href="positions?action=subcategory_edit&id=<?=$sub_data["id"];?>" class="btn btn-success waves-effect waves-float waves-light"><i data-feather='edit'></i></a>
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

                                <?
                            }
                            ?>
                        </div>
                    </div>
                    <?
                }
                ?>

                <?
                if ($action=="category_add")
                {
                    ?>
                    <section id="input-group-basic">
                        <div class="row">
                            <!-- Basic -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="positions?action=category_adding" method="post">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="at-sign"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" placeholder="Ангиллын нэр..." />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="cpu"></i></span>
                                                </div>
                                                <input type="number" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="0"/>
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather='feather'></i></span>
                                                </div>  
                                                <input type="color" class="form-control" id="color" name="color">
                                            </div>

                                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                        </form>
                                    </div>
                                </div>
                            </div>                         
                           
                        </div>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="category_adding")
                {
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                    $color = $_POST["color"];
                   

                    $sql = "INSERT INTO categories (name,dd,color)  VALUES ('$name','$dd','$color')";

                    if (mysqli_query($conn,$sql))
                    {
                        $category_id  = mysqli_insert_id ($conn);
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай үүслээ
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
                    <a class="btn btn-success" href="positions?action=category_edit&id=<?=$category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="positions?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="category_edit")
                {
                    $category_id = $_GET["id"];
                    $sql = "SELECT *FROM categories WHERE id='$category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        ?>
                        <section id="input-group-basic">
                            <div class="row">
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="positions?action=category_editing" method="post">
                                                <input type="hidden" name="id" value="<?=$category_id;?>">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="at-sign"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" placeholder="Ангиллын нэр..." value="<?=$data["name"];?>"/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="cpu"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="<?=$data["dd"];?>"/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather='feather'></i></span>
                                                    </div>  
                                                    <input type="color" class="form-control" id="color" name="color" value="<?=$data["color"];?>">
                                                </div>

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                            </form>
                                        </div>
                                    </div>
                                </div>                         
                            
                            </div>
                        </section>
                        <a href="positions?action=category_delete&id=<?=$category_id;?>" class="btn btn-danger waves-effect waves-float waves-light mt-1">Устгах</a>

                        <?

                    }
                    
                    
                }
                ?>


                <?
                if ($action=="category_editing")
                {
                    $category_id = $_POST["id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                    $color = $_POST["color"];
                   

                    $sql = "UPDATE categories SET name='$name',dd='$dd',color='$color' WHERE id='$category_id'";
                    
                    if (mysqli_query($conn,$sql))
                    {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай заслаа
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
                    <a class="btn btn-success" href="positions?action=category_edit&id=<?=$category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="positions?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?  
                if ($action=="category_delete")
                {
                    $category_id = $_GET["id"];
                    $sql = "SELECT *FROM categories WHERE id='$category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $sql = "DELETE FROM categories WHERE id='$category_id'";
                    
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
                    }
                    ?>
                    <a class="btn btn-primary" href="positions?action=category">Жагсаалт</a>
                    <?
                    
                    
                }
                ?>



                <?  
                if ($action=="subcategory_edit")
                {
                    $subcategory_id = $_GET["id"];
                    $sql = "SELECT *FROM position_subcategories WHERE id='$subcategory_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $parent_id = $data["parent_id"];
                        $subcategory_id = $data["id"];
                        $subcategory_name = $data["name"];
                        $subcategory_dd = $data["dd"];
                        ?>
                        <section id="input-group-basic">
                            <div class="row">
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="positions?action=subcategory_editing" method="post">
                                                <input type="hidden" name="id" value="<?=$subcategory_id;?>">

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="flag"></i></span>
                                                    </div>
                                                    <select class="form-control" name="parent_id">
                                                        <?
                                                        $sql = "SELECT *FROM categories ORDER BY dd";
                                                        $result = mysqli_query($conn,$sql);
                                                        while ($data = mysqli_fetch_array($result))
                                                        {
                                                            ?>
                                                            <option value="<?=$data["id"];?>" <?=($data["id"]==$parent_id)?'SELECTED':'';?>><?=$data["name"];?></option>
                                                            <?
                                                        }
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="at-sign"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" placeholder="Ангиллын нэр..." value="<?=$subcategory_name;?>"/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="cpu"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="<?=$subcategory_dd;?>"/>
                                                </div>

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                            </form>
                                        </div>
                                    </div>
                                </div>                         
                            
                            </div>
                        </section>
                        <a href="positions?action=subcategory_delete&id=<?=$subcategory_id;?>" class="btn btn-danger waves-effect waves-float waves-light mt-1">Устгах</a>
                        <?
                    }
                    
                    
                }
                ?>


                <?
                if ($action=="subcategory_editing")
                {
                    $subcategory_id = $_POST["id"];
                    $parent_id = $_POST["parent_id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                   

                    $sql = "UPDATE position_subcategories SET name='$name',dd='$dd' WHERE id='$subcategory_id'";
                    
                    if (mysqli_query($conn,$sql))
                    {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай заслаа
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
                    <a class="btn btn-success" href="positions?action=subcategory_edit&id=<?=$subcategory_id;?>">Засах</a>
                    <a class="btn btn-primary" href="positions?action=category">Жагсаалт</a>
                    <?
                }
                ?>

                <?  
                if ($action=="subcategory_add")
                {
                    $parent_id = $_GET["id"];
                    ?>
                    <section id="input-group-basic">
                        <div class="row">
                            <!-- Basic -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="positions?action=subcategory_adding" method="post">
                                            <input type="hidden" name="id" value="<?=$subcategory_id;?>">

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="flag"></i></span>
                                                </div>
                                                <select class="form-control" name="parent_id">
                                                    <?
                                                    $sql = "SELECT *FROM categories ORDER BY dd";
                                                    $result = mysqli_query($conn,$sql);
                                                    while ($data = mysqli_fetch_array($result))
                                                    {
                                                        ?>
                                                        <option value="<?=$data["id"];?>" <?=($data["id"]==$parent_id)?'SELECTED':'';?>><?=$data["name"];?></option>
                                                        <?
                                                    }
                                                    ?>

                                                </select>
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="at-sign"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" placeholder="Ангиллын нэр..." value=""/>
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="cpu"></i></span>
                                                </div>
                                                <input type="number" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="0"/>
                                            </div>

                                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                        </form>
                                    </div>
                                </div>
                            </div>                         
                        
                        </div>
                    </section>
                    <?
                    
                }
                ?>

                <?
                if ($action=="subcategory_adding")
                {
                    $parent_id = $_POST["parent_id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                   

                    $sql = "INSERT INTO position_subcategories (name,dd,parent_id) VALUES ('$name','$dd','$parent_id')";
                    
                    if (mysqli_query($conn,$sql))
                    {
                        $subcategory_id =mysqli_insert_id($conn);
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай заслаа
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
                    <a class="btn btn-success" href="positions?action=subcategory_edit&id=<?=$subcategory_id;?>">Засах</a>
                    <a class="btn btn-primary" href="positions?action=category">Жагсаалт</a>
                    <?
                }
                ?>

                <?  
                if ($action=="subcategory_delete")
                {
                    $subcategory_id = $_GET["id"];
                    $sql = "SELECT *FROM position_subcategories WHERE id='$subcategory_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $sql = "DELETE FROM position_subcategories WHERE id='$subcategory_id'";
                    
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
                    }
                    ?>
                    <a class="btn btn-primary" href="positions?action=category">Жагсаалт</a>
                    <?
                    
                    
                }
                ?>



                
                <? 
                if ($action=="form")
                {
                    ?>
                    <div class="tab-content">
                        <div class="collapse-margin collapse-icon mt-2">
                            <?
                            $sql = "SELECT *FROM position_forms ORDER BY dd";
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $form_name = $data["name"];
                                $form_id = $data["id"];
                                ?>
                                <div class="card">
                                    <div class="card-header" data-toggle="collapse" role="button" data-target="#category-<?=$form_id;?>" aria-expanded="false" aria-controls="category-<?=$form_id;?>">
                                        <span class="lead collapse-title"><?=$form_name;?></span> 
                                        <div class="btn-group pull-right">
                                            <a href="positions?action=form_edit&id=<?=$form_id;?>" class="btn btn-success btn-sm waves-effect waves-float waves-light"><i data-feather='edit'></i> Засах</a>
                                            <a href="positions?action=formresponce_add&id=<?=$form_id;?>" class="btn btn-primary btn-sm waves-effect waves-float waves-light"><i data-feather='plus'></i> Нэмэх</a>
                                        </div>
                                    </div>

                                    <div id="category-<?=$form_id;?>" class="collapse" aria-labelledby="category-<?=$form_id;?>">
                                        <div class="card-body">
                                            <table>
                                                <tbody>
                                                    
                                                        <?
                                                        $sub_sql = "SELECT *FROM position_formresponces WHERE form_id='$form_id' ORDER BY dd";
                                                        $sub_result = mysqli_query($conn,$sub_sql);
                                                        while ($sub_data = mysqli_fetch_array($sub_result))
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td><?=$sub_data["name"];?></td>
                                                                <td>
                                                                    <a href="positions?action=formresponce_edit&id=<?=$sub_data["id"];?>" class="btn btn-success waves-effect waves-float waves-light"><i data-feather='edit'></i></a>
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

                                <?
                            }
                            ?>
                        </div>
                    </div>
                    <?
                }
                ?>

                <?
                if ($action=="form_add")
                {
                    ?>
                    <section id="input-group-basic">
                        <div class="row">
                            <!-- Basic -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="positions?action=form_adding" method="post">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="at-sign"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" placeholder="Асуулт..." />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="cpu"></i></span>
                                                </div>
                                                <input type="number" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="0"/>
                                            </div>

                                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                        </form>
                                    </div>
                                </div>
                            </div>                         
                           
                        </div>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="form_adding")
                {
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                   

                    $sql = "INSERT INTO position_forms (name,dd)  VALUES ('$name','$dd')";

                    if (mysqli_query($conn,$sql))
                    {
                        $form_id  = mysqli_insert_id ($conn);
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай үүслээ
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
                    <a class="btn btn-success" href="positions?action=form_edit&id=<?=$form_id;?>">Засах</a>
                    <a class="btn btn-primary" href="positions?action=form">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="form_edit")
                {
                    $form_id = $_GET["id"];
                    $sql = "SELECT *FROM position_forms WHERE id='$form_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        ?>
                        <section id="input-group-basic">
                            <div class="row">
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="positions?action=form_editing" method="post">
                                                <input type="hidden" name="id" value="<?=$form_id;?>">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="at-sign"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" placeholder="Асуулт..." value="<?=$data["name"];?>"/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="cpu"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="<?=$data["dd"];?>"/>
                                                </div>


                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                            </form>
                                        </div>
                                    </div>
                                </div>                         
                            
                            </div>
                        </section>
                        <a href="positions?action=form_delete&id=<?=$form_id;?>" class="btn btn-danger waves-effect waves-float waves-light mt-1">Устгах</a>
                        <?

                    }
                    
                    
                }
                ?>


                <?
                if ($action=="form_editing")
                {
                    $form_id = $_POST["id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                   

                    $sql = "UPDATE position_forms SET name='$name',dd='$dd' WHERE id='$form_id'";
                    
                    if (mysqli_query($conn,$sql))
                    {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай заслаа
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
                    <a class="btn btn-success" href="positions?action=form_edit&id=<?=$form_id;?>">Засах</a>
                    <a class="btn btn-primary" href="positions?action=form">Жагсаалт</a>
                    <?
                    
                }
                ?>


                <?
                if ($action=="form_delete")
                {
                    $form_id = $_GET["id"];
                    $sql = "DELETE FROM position_forms WHERE id='$form_id'";
                    $sql2 = "DELETE FROM position_formresponces WHERE form_id='$form_id'";

                    
                    if (mysqli_query($conn,$sql) && mysqli_query($conn,$sql2))
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
                    <a class="btn btn-primary" href="positions?action=form">Жагсаалт</a>
                    <?          
                }
                ?>



                <?  
                if ($action=="formresponce_edit")
                {
                    $responce_id = $_GET["id"];
                    $sql = "SELECT *FROM position_formresponces WHERE id='$responce_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $form_id = $data["form_id"];
                        $responce_name = $data["name"];
                        $responce_dd = $data["dd"];
                        ?>
                        <section id="input-group-basic">
                            <div class="row">
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="positions?action=formresponce_editing" method="post">
                                                <input type="hidden" name="id" value="<?=$responce_id;?>">

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="flag"></i></span>
                                                    </div>
                                                    <select class="form-control" name="form_id">
                                                        <?
                                                        $sql = "SELECT *FROM position_forms ORDER BY dd";
                                                        $result = mysqli_query($conn,$sql);
                                                        while ($data = mysqli_fetch_array($result))
                                                        {
                                                            ?>
                                                            <option value="<?=$data["id"];?>" <?=($data["id"]==$form_id)?'SELECTED':'';?>><?=$data["name"];?></option>
                                                            <?
                                                        }
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="at-sign"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" placeholder="Хариулт..." value="<?=$responce_name;?>"/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="cpu"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="<?=$responce_dd;?>"/>
                                                </div>

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                            </form>
                                        </div>
                                    </div>
                                </div>                         
                            
                            </div>
                        </section>
                        <a href="positions?action=formresponce_delete&id=<?=$responce_id;?>" class="btn btn-danger waves-effect waves-float waves-light mt-1">Устгах</a>
                        <?
                    }
                    
                    
                }
                ?>


                <?
                if ($action=="formresponce_editing")
                {
                    $responce_id = $_POST["id"];
                    $form_id = $_POST["form_id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                   

                    $sql = "UPDATE position_formresponces SET name='$name',dd='$dd',form_id='$form_id' WHERE id='$responce_id'";
                    
                    if (mysqli_query($conn,$sql))
                    {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай заслаа
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
                    <a class="btn btn-success" href="positions?action=formresponce_edit&id=<?=$responce_id;?>">Засах</a>
                    <a class="btn btn-primary" href="positions?action=form">Жагсаалт</a>
                    <?
                }
                ?>

                <?  
                if ($action=="formresponce_add")
                {
                    $form_id = $_GET["id"];
                    ?>
                    <section id="input-group-basic">
                        <div class="row">
                            <!-- Basic -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="positions?action=formresponce_adding" method="post">

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="flag"></i></span>
                                                </div>
                                                <select class="form-control" name="form_id">
                                                    <?
                                                    $sql = "SELECT *FROM position_forms ORDER BY dd";
                                                    $result = mysqli_query($conn,$sql);
                                                    while ($data = mysqli_fetch_array($result))
                                                    {
                                                        ?>
                                                        <option value="<?=$data["id"];?>" <?=($data["id"]==$form_id)?'SELECTED':'';?>><?=$data["name"];?></option>
                                                        <?
                                                    }
                                                    ?>

                                                </select>
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="at-sign"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" placeholder="Хариулт..." value=""/>
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="cpu"></i></span>
                                                </div>
                                                <input type="number" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="0"/>
                                            </div>

                                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                        </form>
                                    </div>
                                </div>
                            </div>                         
                        
                        </div>
                    </section>
                    <?
                    
                }
                ?>

                <?
                if ($action=="formresponce_adding")
                {
                    $form_id = $_POST["form_id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                   

                    $sql = "INSERT INTO position_formresponces (name,dd,form_id) VALUES ('$name','$dd','$form_id')";
                    
                    if (mysqli_query($conn,$sql))
                    {
                        $subcategory_id =mysqli_insert_id($conn);
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай үүсгэлээ
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
                    <a class="btn btn-success" href="positions?action=formresponce_edit&id=<?=$responce_id;?>">Засах</a>
                    <a class="btn btn-primary" href="positions?action=form">Жагсаалт</a>
                    <?
                }
                ?>

                <?  
                if ($action=="formresponce_delete")
                {
                    $responce_id = $_GET["id"];
                    $sql = "SELECT *FROM position_formresponces WHERE id='$responce_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $sql = "DELETE FROM position_formresponces WHERE id='$responce_id'";
                    
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
                    }
                    ?>
                    <a class="btn btn-primary" href="positions?action=form">Жагсаалт</a>
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
    <script src="app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="app-assets/vendors/js/maps/leaflet.min.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/tables/table-datatables-basic.js"></script>

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

    <script>
        /*=========================================================================================
        File Name: map-leaflet.js
        Description: Leaflet Maps
        ----------------------------------------------------------------------------------------
        Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
        Author: Pixinvent
        Author URL: hhttp://www.themeforest.net/user/pixinvent
        ==========================================================================================*/

        $(function () {
        'use strict';

        var assetsPath = 'app-assets/';

        if ($('body').attr('data-framework') === 'laravel') {
            assetsPath = $('body').attr('data-asset-path');
        }
        

        if ($('#user-location').length) {
            var userLocation = L.map('user-location').setView([47.917772, 106.9183047], 10);
            userLocation.locate({
                setView: true,
                maxZoom: 16
            });

            

            function onLocationFound(e) {
                var radius = e.accuracy;
                L.marker(e.latlng)
                    .addTo(userLocation)
                    .bindPopup('Би энд байна ' + radius + 'м орчим')
                    .openPopup();
                L.circle(e.latlng, radius).addTo(userLocation);
            }
            userLocation.on('locationfound', onLocationFound);
            L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
                maxZoom: 12
            }).addTo(userLocation);


            <?
            if ($position_location<>"")
            {
                ?>
                var marker = L.marker([<?=$position_location;?>]).bindPopup('<?=$position_name;?>').addTo(userLocation);
                <?
            }
            ?>
        }
        



       
        });

    </script>

</body>
<!-- END: Body-->

</html>