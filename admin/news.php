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
                            <h2 class="content-header-title float-left mb-0">Мэдээ</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Мэдээ
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
                            <a class="dropdown-item" href="news?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Шинэ мэдээ</span></a>
                                <a class="dropdown-item" href="news?action=category_new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Шинэ ангилал</span></a>
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
                            
                                $sql = "SELECT * FROM news";
                          
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $news_id = $data["id"];
                                $news_title = $data["title"];
                                $news_brief = $data["brief"];
                                $news_content = $data["content"];
                                $news_image = $data["image"];
                                $news_timestamp = $data["timestamp"];
                                $news_visited = $data["visited"];
                               
                                ?>
                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <a href="news?action=detail&id=<?=$news_id;?>">
                                            <img class="card-img-top img-fluid" src="../<?=$news_image;?>" alt="<?=$news_title;?>" />
                                        </a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="news?action=detail&id=<?=$news_id;?>" class="blog-title-truncate text-body-heading"><?=$news_title;?></a>
                                            </h4>
                                            <div class="media">
                                                <div class="avatar mr-50">
                                                    <img src="../<?=$admin_avatar;?>" alt="Avatar" width="24" height="24" />
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted mr-25">Оруулсан: </small>
                                                    <small><?=$admin_name;?></small>
                                                    <span class="text-muted ml-50 mr-25">|</span>
                                                    <small class="text-muted"><?=substr($news_timestamp,0,10);?></small>
                                                </div>
                                            </div>
                                            
                                            <p class="card-text blog-content-truncate mt-2">
                                                <?=$news_brief;?>
                                            </p>
                                            <hr />
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="eye" class="font-medium-1 text-body mr-50"></i>
                                                    <span class="text-body font-weight-bold"><?=$news_visited;?> Үзсэн</span>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <i data-feather="calendar" class="font-medium-1 text-body mr-50"></i>
                                                    <span class="text-body font-weight-bold"><?=substr($news_timestamp,0,10);?></span>
                                                </div>

                                                <a href="news?action=edit&id=<?=$news_id;?>" class="font-weight-bold">Засах</a>

                                                <a href="news?action=detail&id=<?=$news_id;?>" class="font-weight-bold">Дэлгэрэнгүй</a>
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
                    $news_id = $_GET["id"];
                  
                            $sql = "SELECT *
                            FROM news WHERE id='$news_id'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)==1)
                            {
                                $data = mysqli_fetch_array($result);                            
                                $news_id = $data["id"];
                                $news_title = $data["title"];
                                $news_brief = $data["brief"];
                                $news_content = $data["content"];
                                $news_image = $data["image"];
                                $news_timestamp = $data["timestamp"];
                                $news_visited = $data["visited"];

                                ?>
                                <div class="blog-detail-wrapper">
                                    <div class="row">
                                        <!-- Blog -->
                                        <div class="col-12">
                                            <div class="card">
                                                <img src="../<?=$news_image;?>" class="img-fluid card-img-top" alt="<?=$news_title;?>" />
                                                <div class="card-body">
                                                    <h4 class="card-title"><?=$news_title;?></h4>
                                                    <div class="media">
                                                        <div class="avatar mr-50">
                                                            <img src="../<?=$admin_avatar;?>" alt="Avatar" width="24" height="24" />
                                                        </div>
                                                        <div class="media-body">
                                                            <small class="text-muted mr-25">by</small>
                                                            <small><a href="javascript:void(0);" class="text-body"><?=$admin_name;?></a></small>
                                                            <span class="text-muted ml-50 mr-25">|</span>
                                                            <small class="text-muted"><?=substr($news_timestamp,0,10);?></small>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                    <p class="card-text mb-2 news-body">
                                                       <?=$news_content;?>
                                                    </p>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a href="news?action=edit&id=<?=$news_id;?>" class="btn btn-success">Засах</a>
                                    <a href="news?action=grid" class="btn btn-primary">Жагсаалт</a>
                                </div>
                                <?
                            }
                            else 
                            {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                    Мэдээ олдсонгүй
                                    </div>
                                </div>
                                <?
                            }
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $news_id = $_GET["id"];
                    $sql = "SELECT *FROM news WHERE id='$news_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $news_title = $data["title"];
                        $news_brief = $data["brief"];
                        $news_content = $data["content"];
                        $news_image = $data["image"];
                        $news_timestamp = $data["timestamp"];
                        $news_visited = $data["visited"];

                       

                        ?>
                        <section id="input-group-basic">
                            <form action="news?action=editing" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Basic -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                            </div>
                                            <div class="card-body">
                                                <input type="hidden" name="news_id" value="<?=$news_id;?>">

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" value="<?=$news_title;?>" placeholder="Нэр..." />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <textarea class="form-control"  name="brief"><?=$news_brief;?></textarea>
                                                </div>

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">

                                            </div>

                                        </div>
                                        <a href="news?action=delete&id=<?=$news_id;?>" class="btn btn-danger">Устгах</a>

                                    </div>

                                    <!-- Merged -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Зураг</h4>
                                            </div>
                                            <div class="card-body">
                                                <?
                                                if ($news_image<>"")
                                                {
                                                    ?>
                                                    <img src="../<?=$news_image;?>" style="max-width:100%;">
                                                    <?
                                                    
                                                }
                                                ?>
                                                <input type="file" class="form-control" name="image"/>

                                                <div class="input-group mt-2 mb-2">
                                                    <textarea class="form-control"  name="content" id="editor"><?=$news_content;?></textarea>
                                                </div>

                                                
                                            </div>

                                        
                                        </div>
                                    </div>

                                
                                
                                </div>
                            </form>

                        </section>
                    <?
                    }
                    else header("location:news?action=grid");
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $news_id = $_POST["news_id"];
                    $title = $_POST["title"];
                    $brief = $_POST["brief"];
                    $content = $_POST["content"];

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
                                $sql = "UPDATE news SET image='$target_file' WHERE id='$news_id'";

                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE news SET title='$title',brief='$brief',content='$content' WHERE id='$news_id'";


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
                    <a class="btn btn-success" href="news?action=edit&id=<?=$news_id;?>">Засах</a>
                    <a class="btn btn-primary" href="news?action=detail&id=<?=$news_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="news">Бүх мэдээ</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="news?action=adding" method="post" enctype="multipart/form-data">
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
                    $brief = $_POST["brief"];
                    $content = $_POST["content"];

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
                    $sql = "INSERT INTO news (title,brief,content,image)  VALUES ('$title','$brief','$content','$image')";

                    if (mysqli_query($conn,$sql))
                    {
                        $news_id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="news?action=edit&id=<?=$news_id;?>">Засах</a>
                    <a class="btn btn-primary" href="news?action=detail&id=<?=$news_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="news">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="delete")
                {
                    $news_id = $_GET["id"];
                    $sql = "SELECT *FROM news WHERE id='$news_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $news_title = $data["title"];
                        $news_brief = $data["brief"];
                        $news_content = $data["content"];
                        $news_image = $data["image"];
                        $news_timestamp = $data["timestamp"];
                        $news_visited = $data["visited"];
                        
                        $sql = "DELETE FROM news WHERE id='$news_id'";
    
    
                        if (mysqli_query($conn,$sql))
                        {
                            if(file_exists('../'.$news_image))
                            unlink('../'.$news_image);

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
                        <a class="btn btn-primary" href="news">Бүх мэдээ</a>
                        <?
                    }
                    else header("location:news?action=grid");
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
                                                $sql = "SELECT *FROM news_category ORDER BY dd";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td>
                                                            <a class="btn btn-success" href="news?action=category_edit&id=<?=$data["id"];?>">Засах</a>
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
                    $news_category_id = $_GET["id"];
                    $sql = "SELECT *FROM news_category WHERE id='$news_category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $name = $data["name"];
                        $dd = $data["dd"];
                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="news?action=category_editing" method="post" enctype="multipart/form-data">
                            <div class="row">
                            
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="news_category_id" value="<?=$news_category_id;?>">
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
                    <?
                }
                ?>


                <?
                if ($action=="category_editing")
                {
                    $news_category_id = $_POST["news_category_id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                  

                    $sql = "UPDATE news_category SET name='$name',dd='$dd' WHERE id='$news_category_id'";

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
                    <a class="btn btn-success" href="news?action=category_edit&id=<?=$news_category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="news?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="category_new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="news?action=category_adding" method="post" enctype="multipart/form-data">
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
                   

                    $sql = "INSERT INTO news_category (name,dd) VALUES ('$name','$dd')";

                    if (mysqli_query($conn,$sql))
                    {
                        $news_category_id = mysqli_insert_id($conn);
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
                    <a class="btn btn-success" href="news?action=category_edit&id=<?=$news_category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="news?action=category">Жагсаалт</a>
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