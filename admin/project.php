<? require_once("config.php");?>
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


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-flat-pickr.css">


    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

    <? if (isset($_GET["action"])) $action=$_GET["action"]; else $action="grid"; 
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
                            <h2 class="content-header-title float-left mb-0">Төсөл</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Төсөл
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
                                <a class="dropdown-item" href="?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Шинэ Төсөл</span></a>
                                <a class="dropdown-item" href="?action=category_new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Шинэ ангилал</span></a>
                                <a class="dropdown-item" href="?action=category"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Ангилал</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
            <? 
                if ($action=="grid")
                {
                    ?>
                    <section id="card-demo-example">
                        <div class="row match-height">
                            <?
                            
                                $sql = "SELECT * FROM project ORDER BY timestamp DESC";
                          
                                $result = mysqli_query($conn,$sql);
                                while ($data = mysqli_fetch_array($result))
                                {
                                    $project_id = $data["id"];
                                    $project_title = $data["title"];
                                    $project_brief = $data["brief"];
                                    $project_content = $data["content"];
                                    $project_image = $data["image"];
                                    $project_timestamp = $data["timestamp"];
                                    $project_duration = $data["duration"];
                                    $project_date = $data["date"];
                                    $project_participants = $data["participants"];
                                
                                    ?>
                                    <div class="col-md-6 col-12">
                                        <div class="card">
                                            <a href="?action=detail&id=<?=$project_id;?>">
                                                <img class="card-img-top img-fluid" src="../<?=$project_image;?>" alt="<?=$project_title;?>" />
                                            </a>
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <a href="?action=detail&id=<?=$project_id;?>" class="blog-title-truncate text-body-heading"><?=$project_title;?></a>
                                                </h4>
                                                <div class="media">
                                                    <div class="avatar mr-50">
                                                        <img src="../<?=$admin_avatar;?>" alt="Avatar" width="24" height="24" />
                                                    </div>
                                                    <div class="media-body">
                                                        <small class="text-muted mr-25">Оруулсан: </small>
                                                        <small><?=$admin_name;?></small>
                                                        <span class="text-muted ml-50 mr-25">|</span>
                                                        <small class="text-muted"><?=substr($project_timestamp,0,10);?></small>
                                                    </div>
                                                </div>
                                                
                                                <p class="card-text blog-content-truncate mt-2">
                                                    <?=$project_brief;?>
                                                </p>
                                                <hr />
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="users" class="font-medium-1 text-body mr-50"></i>
                                                        <span class="text-body font-weight-bold"><?=$project_participants;?>хүн</span>
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="watch" class="font-medium-1 text-body mr-50"></i>
                                                        <span class="text-body font-weight-bold"><?=$project_duration;?>ц</span>
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="calendar" class="font-medium-1 text-body mr-50"></i>
                                                        <span class="text-body font-weight-bold"><?=$project_date;?></span>
                                                    </div>

                                                    <a href="?action=edit&id=<?=$project_id;?>" class="font-weight-bold">Засах</a>

                                                    <a href="?action=detail&id=<?=$project_id;?>" class="font-weight-bold">Дэлгэрэнгүй</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?
                                }
                            ?>
                        </div>
                    </section>
                    <?
                }
                ?>

                <?
                if ($action == "detail")
                {
                    $project_id = $_GET["id"];
                  
                            $sql = "SELECT *
                            FROM project WHERE id='$project_id'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)==1)
                            {
                                $data = mysqli_fetch_array($result);                            
                                $project_id = $data["id"];
                                $project_title = $data["title"];
                                $project_brief = $data["brief"];
                                $project_content = $data["content"];
                                $project_image = $data["image"];
                                $project_timestamp = $data["timestamp"];
                                $project_visited = $data["visited"];

                                ?>
                                <div class="blog-detail-wrapper">
                                    <div class="row">
                                        <!-- Blog -->
                                        <div class="col-12">
                                            <div class="card">
                                                <img src="../<?=$project_image;?>" class="img-fluid card-img-top" alt="<?=$project_title;?>" />
                                                <div class="card-body">
                                                    <h4 class="card-title"><?=$project_title;?></h4>
                                                    <div class="media">
                                                        <div class="avatar mr-50">
                                                            <img src="../<?=$admin_avatar;?>" alt="Avatar" width="24" height="24" />
                                                        </div>
                                                        <div class="media-body">
                                                            <small class="text-muted mr-25">by</small>
                                                            <small><a href="javascript:void(0);" class="text-body"><?=$admin_name;?></a></small>
                                                            <span class="text-muted ml-50 mr-25">|</span>
                                                            <small class="text-muted"><?=substr($project_timestamp,0,10);?></small>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                    <p class="card-text mb-2 project-body">
                                                       <?=$project_content;?>
                                                    </p>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a href="?action=edit&id=<?=$project_id;?>" class="btn btn-success">Засах</a>
                                    <a href="?action=grid" class="btn btn-primary">Жагсаалт</a>
                                </div>
                                <?
                            }
                            else 
                            {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                    Төсөл олдсонгүй
                                    </div>
                                </div>
                                <?
                            }
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $project_id = $_GET["id"];
                    $sql = "SELECT *FROM project WHERE id='$project_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $project_title = $data["title"];
                        $project_brief = $data["brief"];
                        $project_category = $data["category"];
                        $project_content = $data["content"];
                        $project_image = $data["image"];
                        $project_timestamp = $data["timestamp"];
                        $project_visited = $data["visited"];
                        $project_participants = $data["participants"];
                        $project_duration = $data["duration"];
                        $project_date = $data["date"];


                       

                        ?>
                        <section id="input-group-basic">
                            <form action="?action=editing" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Basic -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                            </div>
                                            <div class="card-body">
                                                <input type="hidden" name="project_id" value="<?=$project_id;?>">

                                                <label class="form-label">Төслийн нэр</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" value="<?=$project_title;?>" placeholder="Нэр..." />
                                                </div>

                                                <label class="form-label">Ангилал</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="tag"></i></span>
                                                    </div>
                                                    <select class="form-control" name="category">
                                                        <?
                                                        $sql = "SELECT *FROM project_category ORDER BY dd";
                                                        $result= mysqli_query($conn,$sql);
                                                        while ($data = mysqli_fetch_array($result))
                                                        {
                                                            ?>
                                                            <option value="<?=$data["id"];?>" <?=($project_category == $data["id"])?'SELECTED':'';?>><?=$data["name"];?></option>
                                                            <?
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <label class="form-label">Товч танилцуулга</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <textarea class="form-control"  name="brief" placeholder="Товчхон"><?=$project_brief;?></textarea>
                                                </div>

                                                <label class="form-label">Оролцогч</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="users"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="participants" placeholder="Оролцогч" value="<?=$project_participants;?>" />
                                                </div>

                                                <label class="form-label">Үргэлжлэх хугацаа</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="watch"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="duration" placeholder="Үргэлжлэх хугацаа" value="<?=$project_duration;?>" />
                                                </div>

                                                <label class="form-label">Хэзээ</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="date" placeholder="хэзээ" value="<?=$project_date;?>" />
                                                </div>
                                                

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">

                                            </div>

                                        </div>
                                        <a href="?action=delete&id=<?=$project_id;?>" class="btn btn-danger">Устгах</a>

                                    </div>

                                    <!-- Merged -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Зураг</h4>
                                            </div>
                                            <div class="card-body">
                                                <?
                                                if ($project_image<>"")
                                                {
                                                    ?>
                                                    <div class="d-flex">
                                                        <img src="../<?=$project_image;?>" style="max-width:100%;">
                                                    </div>
                                                    <?
                                                }
                                                ?>
                                                <label class="form-label">Зураг</label>
                                                <input type="file" class="form-control mb-3" name="image"/>

                                                <label class="form-label">Дэлгэрэнгүй</label>
                                                <div class="input-group mb-2">
                                                    <textarea class="form-control"  name="content" id="editor"><?=$project_content;?></textarea>
                                                </div>

                                                
                                            </div>

                                        
                                        </div>
                                    </div>

                                
                                
                                </div>
                            </form>

                        </section>
                    <?
                    }
                    else header("location:?action=grid");
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $project_id = $_POST["project_id"];
                    $title = $_POST["title"];
                    $brief = $_POST["brief"];
                    $content = $_POST["content"];
                    $participants = $_POST["participants"];
                    $duration = $_POST["duration"];
                    $date = $_POST["date"];

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
                                $sql = "UPDATE project SET image='$target_file' WHERE id='$project_id'";

                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE project SET 
                    title='$title',
                    brief='$brief',
                    content='$content',
                    participants='$participants',
                    duration='$duration', 
                    date='$date' 
                    WHERE id='$project_id'";


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
                    <a class="btn btn-success" href="?action=edit&id=<?=$project_id;?>">Засах</a>
                    <a class="btn btn-primary" href="?action=detail&id=<?=$project_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="?action=grid">Бүх Төсөл</a>
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

                                                <label class="form-label">Төслийн нэр</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" value="" placeholder="Нэр..." />
                                                </div>

                                                <label class="form-label">Ангилал</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="tag"></i></span>
                                                    </div>
                                                    <select class="form-control" name="category">
                                                        <?
                                                        $sql = "SELECT *FROM project_category ORDER BY dd";
                                                        $result= mysqli_query($conn,$sql);
                                                        while ($data = mysqli_fetch_array($result))
                                                        {
                                                            ?>
                                                            <option value="<?=$data["id"];?>"><?=$data["name"];?></option>
                                                            <?
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <label class="form-label">Товч танилцуулга</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <textarea class="form-control"  name="brief" placeholder="Товчхон"></textarea>
                                                </div>

                                                <label class="form-label">Оролцогч</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="users"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="participants" placeholder="Оролцогч" value="" />
                                                </div>

                                                <label class="form-label">Үргэлжлэх хугацаа</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="watch"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="duration" placeholder="Үргэлжлэх хугацаа" value="" />
                                                </div>

                                                <label class="form-label">Хэзээ</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="date" placeholder="хэзээ" value="" />
                                                </div>
                                                

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">

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
                                                <label class="form-label">Зураг</label>
                                                <input type="file" class="form-control mb-3" name="image"/>

                                                <label class="form-label">Дэлгэрэнгүй</label>
                                                <div class="input-group mb-2">
                                                    <textarea class="form-control"  name="content" id="editor"></textarea>
                                                </div>

                                                
                                            </div>

                                        
                                        </div>
                                    </div>

                                
                                
                                </div>
                            </form>

                        </section>
                    <?                    
                }
                ?>


                <?
                if ($action=="adding")
                {
                    $title = $_POST["title"];
                    $brief = $_POST["brief"];
                    $content = $_POST["content"];
                    $participants = $_POST["participants"];
                    $duration = $_POST["duration"];
                    $date = $_POST["date"];
                    $image = "";

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
                                $image= substr($target_file,3);        
                            }
                    }
                    $sql = "INSERT INTO project (title,brief,content,image,participants,duration,date)  VALUES ('$title','$brief','$content','$image','$participants','$duration','$date')";

                    if (mysqli_query($conn,$sql))
                    {
                        $project_id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="?action=edit&id=<?=$project_id;?>">Засах</a>
                    <a class="btn btn-primary" href="?action=detail&id=<?=$project_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="?action=grid">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="delete")
                {
                    $project_id = $_GET["id"];
                    $sql = "SELECT *FROM project WHERE id='$project_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $project_title = $data["title"];
                        $project_brief = $data["brief"];
                        $project_content = $data["content"];
                        $project_image = $data["image"];
                        $project_timestamp = $data["timestamp"];
                        $project_visited = $data["visited"];
                        
                        $sql = "DELETE FROM project WHERE id='$project_id'";
    
    
                        if (mysqli_query($conn,$sql))
                        {
                            if ($project_image<>"")
                            if(file_exists('../'.$project_image))
                            unlink('../'.$project_image);

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
                        <a class="btn btn-primary" href="?action=grid">Бүх Төсөл</a>
                        <?
                    }
                    else header("location:?action=grid");
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
                                                $sql = "SELECT *FROM project_category ORDER BY dd";
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
                    $project_category_id = $_GET["id"];
                    $sql = "SELECT *FROM project_category WHERE id='$project_category_id'";
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
                                            
                                                <input type="hidden" name="project_category_id" value="<?=$project_category_id;?>">
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

                    <a class="btn btn-danger waves-effect waves-float waves-light" href="?action=category_delete&id=<?=$project_category_id;?>">Устгах</a>
                    <?
                }
                ?>


                <?
                if ($action=="category_editing")
                {
                    $project_category_id = $_POST["project_category_id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                  

                    $sql = "UPDATE project_category SET name='$name',dd='$dd' WHERE id='$project_category_id'";

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
                    <a class="btn btn-success" href="?action=category_edit&id=<?=$project_category_id;?>">Засах</a>
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
                   

                    $sql = "INSERT INTO project_category (name,dd) VALUES ('$name','$dd')";

                    if (mysqli_query($conn,$sql))
                    {
                        $project_category_id = mysqli_insert_id($conn);
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
                    <a class="btn btn-success" href="?action=category_edit&id=<?=$project_category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="?action=category">Жагсаалт</a>
                    <?
                }
                ?>

                <?
                if ($action=="category_delete")
                {
                    $project_category_id = $_GET["id"];
                    $sql = "SELECT *FROM project_category WHERE id='$project_category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $image = $data["image"];
                        $dd = $data["dd"];

                        $sql = "DELETE FROM project_category WHERE id='$project_category_id'";

                        if (mysqli_query($conn,$sql))
                        {
                            if (file_exists('../'.$image)) unlink('../'.$image);
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

    <script src="app-assets/vendors/js/ckeditor/ckeditor.js"></script>

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

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>


</body>
<!-- END: Body-->

</html>