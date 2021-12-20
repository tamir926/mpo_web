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
                            <h2 class="content-header-title float-left mb-0">Гишүүнчлэл</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Гишүүнчлэл
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
                                <a class="dropdown-item" href="membership?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Шинэ Гишүүнчлэл</span></a>
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
                            
                                $sql = "SELECT * FROM membership";
                          
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $membership_id = $data["id"];
                                $membership_title = $data["title"];
                                $membership_brief = $data["brief"];
                                $membership_content = $data["content"];
                                $membership_image = $data["image"];
                                $membership_timestamp = $data["timestamp"];
                                $membership_visited = $data["visited"];
                               
                                ?>
                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <a href="membership?action=detail&id=<?=$membership_id;?>">
                                            <img class="card-img-top img-fluid" src="../<?=$membership_image;?>" alt="<?=$membership_title;?>" />
                                        </a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="membership?action=detail&id=<?=$membership_id;?>" class="blog-title-truncate text-body-heading"><?=$membership_title;?></a>
                                            </h4>
                                            <div class="media">
                                                <div class="avatar mr-50">
                                                    <img src="../<?=$admin_avatar;?>" alt="Avatar" width="24" height="24" />
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted mr-25">Оруулсан: </small>
                                                    <small><?=$admin_name;?></small>
                                                    <span class="text-muted ml-50 mr-25">|</span>
                                                    <small class="text-muted"><?=substr($membership_timestamp,0,10);?></small>
                                                </div>
                                            </div>
                                            
                                            <p class="card-text blog-content-truncate mt-2">
                                                <?=$membership_brief;?>
                                            </p>
                                            <hr />
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="eye" class="font-medium-1 text-body mr-50"></i>
                                                    <span class="text-body font-weight-bold"><?=$membership_visited;?> Үзсэн</span>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <i data-feather="calendar" class="font-medium-1 text-body mr-50"></i>
                                                    <span class="text-body font-weight-bold"><?=substr($membership_timestamp,0,10);?></span>
                                                </div>


                                                <a href="membership?action=detail&id=<?=$membership_id;?>" class="font-weight-bold">Дэлгэрэнгүй</a>
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
                    $membership_id = $_GET["id"];
                  
                            $sql = "SELECT *
                            FROM membership WHERE id='$membership_id'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)==1)
                            {
                                $data = mysqli_fetch_array($result);                            
                                $membership_id = $data["id"];
                                $membership_title = $data["title"];
                                $membership_brief = $data["brief"];
                                $membership_content = $data["content"];
                                $membership_image = $data["image"];
                                $membership_timestamp = $data["timestamp"];
                                $membership_visited = $data["visited"];

                                ?>
                                <div class="blog-detail-wrapper">
                                    <div class="row">
                                        <!-- Blog -->
                                        <div class="col-12">
                                            <div class="card">
                                                <img src="../<?=$membership_image;?>" class="img-fluid card-img-top" alt="<?=$membership_title;?>" />
                                                <div class="card-body">
                                                    <h4 class="card-title"><?=$membership_title;?></h4>
                                                    <div class="media">
                                                        <div class="avatar mr-50">
                                                            <img src="../<?=$admin_avatar;?>" alt="Avatar" width="24" height="24" />
                                                        </div>
                                                        <div class="media-body">
                                                            <small class="text-muted mr-25">by</small>
                                                            <small><a href="javascript:void(0);" class="text-body"><?=$admin_name;?></a></small>
                                                            <span class="text-muted ml-50 mr-25">|</span>
                                                            <small class="text-muted"><?=substr($membership_timestamp,0,10);?></small>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                    <p class="card-text mb-2 membership-body">
                                                       <?=$membership_content;?>
                                                    </p>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a href="membership?action=edit&id=<?=$membership_id;?>" class="btn btn-success">Засах</a>
                                    <a href="membership?action=grid" class="btn btn-primary">Жагсаалт</a>
                                </div>
                                <?
                            }
                            else 
                            {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                    Гишүүнчлэл олдсонгүй
                                    </div>
                                </div>
                                <?
                            }
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $membership_id = $_GET["id"];
                    $sql = "SELECT *FROM membership WHERE id='$membership_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $membership_title = $data["title"];
                        $membership_brief = $data["brief"];
                        $membership_content = $data["content"];
                        $membership_image = $data["image"];
                        $membership_timestamp = $data["timestamp"];
                        $membership_visited = $data["visited"];

                       

                        ?>
                        <section id="input-group-basic">
                            <form action="membership?action=editing" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Basic -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                            </div>
                                            <div class="card-body">
                                                <input type="hidden" name="membership_id" value="<?=$membership_id;?>">

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" value="<?=$membership_title;?>" placeholder="Гишүүн байгууллагын нэр..." />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <textarea class="form-control"  name="brief"><?=$membership_brief;?></textarea>
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
                                                <?
                                                if ($membership_image<>"")
                                                {
                                                    ?>
                                                    <img src="../<?=$membership_image;?>" style="max-width:100%;">
                                                    <?
                                                    
                                                }
                                                ?>
                                                <input type="file" class="form-control" name="image"/>

                                                <div class="input-group mt-2 mb-2">
                                                    <textarea class="form-control"  name="content" id="editor"><?=$membership_content;?></textarea>
                                                </div>

                                                
                                            </div>

                                        
                                        </div>
                                    </div>

                                
                                
                                </div>
                            </form>
                        </section>
                    <?
                    }
                    else header("location:membership?action=grid");
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $membership_id = $_POST["membership_id"];
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
                                $sql = "UPDATE membership SET image='$target_file' WHERE id='$membership_id'";

                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE membership SET title='$title',brief='$brief',content='$content' WHERE id='$membership_id'";


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
                    <a class="btn btn-success" href="membership?action=edit&id=<?=$membership_id;?>">Засах</a>
                    <a class="btn btn-primary" href="membership?action=detail&id=<?=$membership_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="membership">Бүх Гишүүнчлэл</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="membership?action=adding" method="post" enctype="multipart/form-data">
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
                                                <input type="text" class="form-control" name="title" placeholder="Гишүүн байгууллагын нэр..." />
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
                    $sql = "INSERT INTO membership (title,brief,content,image)  VALUES ('$title','$brief','$content','$image')";

                    if (mysqli_query($conn,$sql))
                    {
                        $membership_id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="membership?action=edit&id=<?=$membership_id;?>">Засах</a>
                    <a class="btn btn-primary" href="membership?action=detail&id=<?=$membership_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="membership">Жагсаалт</a>
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