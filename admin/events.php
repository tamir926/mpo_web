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
                            <h2 class="content-header-title float-left mb-0">Арга хэмжээ</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Арга хэмжээ
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
                                <a class="dropdown-item" href="events?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Шинэ Арга хэмжээ</span></a>
                                <a class="dropdown-item" href="events?action=category_new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Шинэ ангилал</span></a>
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
                            
                                $sql = "SELECT * FROM events ORDER BY date DESC";
                          
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $events_id = $data["id"];
                                $events_title = $data["title"];
                                $events_date = $data["date"];
                                $events_brief = $data["brief"];
                                $events_content = $data["content"];
                                $events_image = $data["image"];
                                $events_timestamp = $data["timestamp"];
                                $events_visited = $data["visited"];
                               
                                ?>
                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <a href="events?action=detail&id=<?=$events_id;?>">
                                            <img class="card-img-top img-fluid" src="../<?=$events_image;?>" alt="<?=$events_title;?>" />
                                        </a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="events?action=detail&id=<?=$events_id;?>" class="blog-title-truncate text-body-heading"><?=$events_title;?></a>
                                            </h4>
                                            <div class="media">
                                                <div class="avatar mr-50">
                                                    <img src="../<?=$admin_avatar;?>" alt="Avatar" width="24" height="24" />
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted mr-25">Оруулсан: </small>
                                                    <small><?=$admin_name;?></small>
                                                    <span class="text-muted ml-50 mr-25">|</span>
                                                    <small class="text-muted"><?=substr($events_date,0,10);?></small>
                                                </div>
                                            </div>
                                            
                                            <p class="card-text blog-content-truncate mt-2">
                                                <?=$events_brief;?>
                                            </p>
                                            <hr />
                                            <div class="d-flex justify-content-between align-items-center">
                                                
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="calendar" class="font-medium-1 text-body mr-50"></i>
                                                    <span class="text-body font-weight-bold"><?=$events_date;?></span>
                                                </div>

                                                <a href="events?action=edit&id=<?=$events_id;?>" class="font-weight-bold">Засах</a>

                                                <a href="events?action=detail&id=<?=$events_id;?>" class="font-weight-bold">Дэлгэрэнгүй</a>
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
                    $events_id = $_GET["id"];
                  
                            $sql = "SELECT *
                            FROM events WHERE id='$events_id'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)==1)
                            {
                                $data = mysqli_fetch_array($result);                            
                                $events_id = $data["id"];
                                $events_title = $data["title"];
                                $events_brief = $data["brief"];
                                $events_content = $data["content"];
                                $events_image = $data["image"];
                                $events_timestamp = $data["timestamp"];
                                $events_visited = $data["visited"];
                                $events_date = $data["date"];

                                ?>
                                <div class="blog-detail-wrapper">
                                    <div class="row">
                                        <!-- Blog -->
                                        <div class="col-12">
                                            <div class="card">
                                                <img src="../<?=$events_image;?>" class="img-fluid card-img-top" alt="<?=$events_title;?>" />
                                                <div class="card-body">
                                                    <h4 class="card-title"><?=$events_title;?></h4>
                                                    <div class="media">
                                                        <div class="avatar mr-50">
                                                            <img src="../<?=$admin_avatar;?>" alt="Avatar" width="24" height="24" />
                                                        </div>
                                                        <div class="media-body">
                                                            <small class="text-muted mr-25">by</small>
                                                            <small><a href="javascript:void(0);" class="text-body"><?=$admin_name;?></a></small>
                                                            <span class="text-muted ml-50 mr-25">|</span>
                                                            <small class="text-muted"><?=$events_date;?></small>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                    <p class="card-text mb-2 events-body">
                                                       <?=$events_content;?>
                                                    </p>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a href="events?action=edit&id=<?=$events_id;?>" class="btn btn-success">Засах</a>
                                    <a href="events?action=grid" class="btn btn-primary">Жагсаалт</a>
                                </div>
                                <?
                            }
                            else 
                            {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                    Арга хэмжээ олдсонгүй
                                    </div>
                                </div>
                                <?
                            }
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $events_id = $_GET["id"];
                    $sql = "SELECT *FROM events WHERE id='$events_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $events_title = $data["title"];
                        $events_category = $data["category"];
                        $events_brief = $data["brief"];
                        $events_content = $data["content"];
                        $events_image = $data["image"];
                        $events_timestamp = $data["timestamp"];
                        $events_visited = $data["visited"];
                        $events_date = $data["date"];

                       

                        ?>
                        <section id="input-group-basic">
                            <form action="events?action=editing" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Basic -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                            </div>
                                            <div class="card-body">
                                                <input type="hidden" name="events_id" value="<?=$events_id;?>">

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" value="<?=$events_title;?>" placeholder="Нэр..." />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <select name="category" class="form-control">
                                                        <?
                                                        $sql= "SELECT *FROM events_category";
                                                        $result = mysqli_query($conn,$sql);
                                                        while ($data = mysqli_fetch_array($result))
                                                        {
                                                            ?>
                                                            <option value="<?=$data["id"];?>" <?=($data["id"]==$events_category)?'SELECTED':'';?>><?=$data["name"];?></option>    
                                                            <?

                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="calendar"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" id="from-datepicker" name="date" value="<?=$events_date;?>" placeholder="Огноо" />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <textarea class="form-control"  name="brief" placeholder="Товч хэсэг"><?=$events_brief;?></textarea>
                                                </div>

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">

                                            </div>

                                        </div>
                                        <a href="events?action=delete&id=<?=$events_id;?>" class="btn btn-danger">Устгах</a>   
                                    </div>

                                    <!-- Merged -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Зураг</h4>
                                            </div>
                                            <div class="card-body">
                                                <?
                                                if ($events_image<>"")
                                                {
                                                    ?>
                                                    <img src="../<?=$events_image;?>" style="max-width:100%;">
                                                    <?
                                                    
                                                }
                                                ?>
                                                <input type="file" class="form-control" name="image"/>

                                                <div class="input-group mt-2 mb-2">
                                                    <textarea class="form-control"  name="content" id="editor" placeholder="Үндсэн хэсэг"><?=$events_content;?></textarea>
                                                </div>

                                                
                                            </div>

                                        
                                        </div>
                                    </div>

                                
                                
                                </div>
                            </form>
                        </section>
                    <?
                    }
                    else header("location:events?action=grid");
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $events_id = $_POST["events_id"];
                    $title = $_POST["title"];
                    $category = $_POST["category"];
                    $brief = mysqli_escape_string($conn,$_POST["brief"]);
                    $content = mysqli_escape_string($conn,$_POST["content"]);
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
                                $sql = "UPDATE events SET image='$target_file' WHERE id='$events_id'";

                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE events SET title='$title',category='$category',brief='$brief',content='$content',date='$date' WHERE id='$events_id'";


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
                    <a class="btn btn-success" href="events?action=edit&id=<?=$events_id;?>">Засах</a>
                    <a class="btn btn-primary" href="events?action=detail&id=<?=$events_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="events">Бүх Арга хэмжээ</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="events?action=adding" method="post" enctype="multipart/form-data">
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
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="title" placeholder="Нэр..." />
                                            </div>

                                            <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <select name="category" class="form-control">
                                                        <?
                                                        $sql= "SELECT *FROM events_category";
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

                                            <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="calendar"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" id="from-datepicker" name="date" placeholder="Огноо" />
                                                </div>


                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                </div>
                                                <textarea class="form-control"  name="brief"></textarea>
                                            </div>

                                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Үүсгэх">

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
                                           
                                            <input type="file" class="form-control" name="image"/>

                                            <div class="input-group mt-2 mb-2">
                                                <textarea class="form-control"  name="content"  id="editor"></textarea>
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
                    $category = $_POST["category"];
                    $brief = mysqli_escape_string($conn,$_POST["brief"]);
                    $content = mysqli_escape_string($conn,$_POST["content"]);
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
                                $image= substr($target_file,3);        
                            }
                    }
                    $sql = "INSERT INTO events (title,brief,content,date,image,category)  VALUES ('$title','$brief','$content','$date','$image','$category')";

                    if (mysqli_query($conn,$sql))
                    {
                        $events_id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="events?action=edit&id=<?=$events_id;?>">Засах</a>
                    <a class="btn btn-primary" href="events?action=detail&id=<?=$events_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="events">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="delete")
                {
                    $events_id = $_GET["id"];
                    $sql = "SELECT *FROM events WHERE id='$events_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $events_image = $data["image"];

                        $sql = "DELETE FROM events WHERE id='$events_id'";


                        if (mysqli_query($conn,$sql))
                        {
                            if (file_exists('../'.$events_image))
                            unlink('../'.$events_image);
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
                        <a class="btn btn-primary" href="events">Бүх Арга хэмжээ</a>
                        <?                        
                    }
                    else header("location:events?action=grid");
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
                                                <th>Зураг</th>
                                                <th>Нэр</th>
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT *FROM events_category ORDER BY dd";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><img src="../<?=$data["image"];?>" width="40"></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td>
                                                            <a class="btn btn-success" href="events?action=category_edit&id=<?=$data["id"];?>">Засах</a>
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
                    $events_category_id = $_GET["id"];
                    $sql = "SELECT *FROM events_category WHERE id='$events_category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $name = $data["name"];
                        $image = $data["image"];
                        $images =explode(',', $data["images"]);
                        $dd = $data["dd"];
                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="events?action=category_editing" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="events_category_id" value="<?=$events_category_id;?>">
                                                <div class="input-group mb-2">
                                                    <?
                                                    if ($image<>"")
                                                    {
                                                        ?>
                                                        <img src="../<?=$image;?>" style="max-width:100%;">
                                                        <?
                                                        
                                                    }
                                                    ?>
                                                    <input type="file" class="form-control" name="image"/>
                                                </div>

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
                                
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Нэмэлт зураг</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <div class="input-group mb-2">
                                                    <?
                                                    foreach($images as $image)
                                                    {
                                                        ?>
                                                        <img src="../<?=$image;?>" style="max-width:100%;">
                                                        <br>
                                                        <?
                                                        
                                                    }
                                                    ?>
                                                    <input type="file" class="form-control" name="files[]" multiple/>
                                                </div>






                                        </div>

                                    </div>
                                </div>
                                
                            </div>

                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Засварлах">

                        </form>
                    </section>
                    <a class="btn btn-danger waves-effect waves-float waves-light mt-1" href="events?id=<?=$events_category_id;?>">Устгах</a>
                    <?
                    
                }
                ?>


                <?
                if ($action=="category_editing")
                {
                    $events_category_id = $_POST["events_category_id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                  
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
                                $sql = "UPDATE events_category SET image='$image' WHERE id='$events_category_id'";
                                mysqli_query($conn,$sql);            
                            }
                    }

                    extract($_POST);
                    @$folder = date("Ym");
                    if(!file_exists('../uploads/'.$folder))
                    mkdir ( '../uploads/'.$folder);
                    $target_dir = '../uploads/'.$folder;

                    $error=array();
                    $extension=array("jpeg","jpg","png","gif","JPEG","JPG","PNG","GIF");
                    $files = array();
                    if (isset($_FILES["files"]))
                    {
                        foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
                        $file_name=$_FILES["files"]["name"][$key];
                        $file_tmp=$_FILES["files"]["tmp_name"][$key];
                        $ext=pathinfo($file_name,PATHINFO_EXTENSION);

                        if(in_array($ext,$extension)) {
                            $target_file = $target_dir."/".date("his").rand(1000,9999).".".$ext;
                            if (move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$target_file))
                                {
                                    array_push($files,substr($target_file,3));
                                }
                                else 
                                {
                                    array_push($error,"$file_name, upload error");
                                }                            
                           // }
                        }
                        else {
                            array_push($error,"$file_name, ");
                        }
                    }
                    }
                    
                    
                    $sql = "UPDATE events_category SET name='$name',dd='$dd',images='".implode(',',$files)."' WHERE id='$events_category_id'";
                    //echo $sql;
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
                    <a class="btn btn-success" href="events?action=category_edit&id=<?=$events_category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="events?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="category_new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="events?action=category_adding" method="post" enctype="multipart/form-data">
                            <div class="row">
                            
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                                <div class="input-group mb-2">                                                 
                                                    <input type="file" class="form-control" name="image"/>
                                                </div>


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

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Нэмэлт зураг</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                            <div class="input-group mb-2">                                                  
                                                <input type="file" class="form-control" name="files[]" multiple>
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

                    extract($_POST);
                    @$folder = date("Ym");
                    if(!file_exists('../uploads/'.$folder))
                    mkdir ( '../uploads/'.$folder);
                    $target_dir = '../uploads/'.$folder;

                    $error=array();
                    $extension=array("jpeg","jpg","png","gif","JPEG","JPG","PNG","GIF");
                    $files = array();
                    if (isset($_FILES["files"]))
                    {
                        foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
                        $file_name=$_FILES["files"]["name"][$key];
                        $file_tmp=$_FILES["files"]["tmp_name"][$key];
                        $ext=pathinfo($file_name,PATHINFO_EXTENSION);

                        if(in_array($ext,$extension)) {
                            $target_file = $target_dir."/".date("his").rand(1000,9999).".".$ext;
                            if (move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$target_file))
                                {
                                    array_push($files,substr($target_file,3));
                                }
                                else 
                                {
                                    array_push($error,"$file_name, upload error");
                                }                            
                           // }
                        }
                        else {
                            array_push($error,"$file_name, ");
                        }
                    }
                    }


                    $sql = "INSERT INTO events_category (name,image,images,dd) VALUES ('$name','$image','".implode(',',$files)."','$dd')";

                    if (mysqli_query($conn,$sql))
                    {
                        $events_category_id = mysqli_insert_id($conn);
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
                    <a class="btn btn-success" href="events?action=category_edit&id=<?=$events_category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="events?action=category">Жагсаалт</a>
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

    <script src="app-assets/vendors/js/ckeditor/ckeditor.js"></script>

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->

    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            $("#from-datepicker").datepicker({ 
                format: 'yyyy-mm-dd'
            });
            
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