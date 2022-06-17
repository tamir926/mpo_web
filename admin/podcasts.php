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
                            <h2 class="content-header-title float-left mb-0">Подкаст</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Подкаст
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
                                <a class="dropdown-item" href="podcasts?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Подкаст нэмэх</span></a>
                                <!-- <a class="dropdown-item" href="podcasts?action=category_add"><i class="mr-1" data-feather="bar-chart-2"></i><span class="align-middle">Ангилал нэмэх</span></a> -->
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
                            $sql = "SELECT *FROM podcasts ORDER BY timestamp desc";
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $podcast_id = $data["id"];
                                $podcast_name = $data["name"];
                                $podcast_brief = $data["brief"];
                                $podcast_image = $data["image"];
                                $podcast_youtube = $data["youtube"];

                                ?>
                                <div class="col-md-4 col-lg-3">
                                    <div class="card">
                                        <img class="card-img-top" src="../<?=$podcast_image;?>" alt="<?=$podcast_name;?>" />
                                        <div class="card-body">
                                            <h4 class="card-title"><?=$podcast_name;?></h4>
                                            <p class="card-text">
                                               <?=$podcast_brief;?>
                                            </p>
                                            <a href="podcasts?action=edit&id=<?=$podcast_id;?>" class="btn btn-outline-success">Засах</a>

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
                if ($action=="edit")
                {
                    $podcast_id = $_GET["id"];
                    $sql = "SELECT *FROM podcasts WHERE id='$podcast_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $podcast_name = $data["name"];
                        $podcast_youtube = $data["youtube"];
                        $podcast_brief = $data["brief"];
                        $podcast_image = $data["image"];

                        ?>

                        <?
                    }
                    ?>
                    <section id="input-group-basic">
                        <div class="row">
                            <!-- Basic -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <form action="podcasts?action=editing" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="podcast_id" value="<?=$podcast_id;?>">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" placeholder="Нэр..." value="<?=$podcast_name;?>"/>
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="play"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="youtube" placeholder="Youtube" value="<?=$podcast_youtube;?>" />
                                            </div>


                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="edit"></i></span>
                                                </div>
                                                <textarea class="form-control" aria-label="With textarea" name="brief">"<?=$podcast_brief;?></textarea>
                                            </div>

                                            <div class="card-header">
                                                <h4 class="card-title">Зураг</h4>
                                            </div>


                                            <div class="card-body">
                                                <?
                                                 if ($podcast_image<>"")
                                                 {
                                                     ?>
                                                     <img src="../<?=$podcast_image;?>" style="max-width:100%;">
                                                     <?
                                                 }
                                                 ?>
                                                <input type="file" class="form-control" name="image"/>
                                            </div>


                                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">

                                        </form>
                                    </div>

                                </div>
                            </div>

                          
                           
                        </div>
                        <a href="podcasts?action=delete&id=<?=$podcast_id;?>" class="btn btn-danger">Устгах</a>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $podcast_id = $_POST["podcast_id"];
                    $name = mysqli_escape_string($conn,$_POST["name"]);
                    $youtube = $_POST["youtube"];
                    $brief = mysqli_escape_string($conn,$_POST["brief"]);
                    $image="";
                    
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
                                $sql = "UPDATE podcasts SET image ='$image' WHERE id='$podcast_id'";
                                mysqli_query($conn,$sql);
                            }
                    }

                    $sql = "UPDATE podcasts SET name='$name',youtube='$youtube',brief='$brief' WHERE id='$podcast_id'";

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
                    <a class="btn btn-success" href="podcasts?action=edit&id=<?=$podcast_id;?>">Засах</a>
                    <a class="btn btn-primary" href="podcasts">Жагсаалт</a>
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
                                    <div class="card-body">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <form action="podcasts?action=adding" method="post" enctype="multipart/form-data">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" placeholder="Нэр..." />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="play"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="youtube" placeholder="Youtube" />
                                            </div>


                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="edit"></i></span>
                                                </div>
                                                <textarea class="form-control" aria-label="With textarea" name="brief"></textarea>
                                            </div>

                                            <div class="card-header">
                                                <h4 class="card-title">Зураг</h4>
                                            </div>

                                            <div class="card-body">
                                                <input type="file" class="form-control" name="image"/>
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
                if ($action=="adding")
                {

                    $name = mysqli_escape_string($conn,$_POST["name"]);
                    $youtube = $_POST["youtube"];
                    $brief = mysqli_escape_string($conn,$_POST["brief"]);

                    $image="";
                    
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


                    $sql = "INSERT INTO podcasts (name,youtube,brief,image)  VALUES ('$name','$youtube','$brief','$image')";

                    if (mysqli_query($conn,$sql))
                    {
                        $podcast_id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="podcasts?action=edit&id=<?=$podcast_id;?>">Засах</a>
                    <a class="btn btn-primary" href="podcasts">Жагсаалт</a>
                    <?
                    
                }
                ?>


                <?
                if ($action=="delete")
                {
                    $podcast_id = $_GET["id"];
                    $sql = "SELECT *FROM podcasts WHERE id='$podcast_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);

                        if (file_exists('../'.$data["image"])) unlink('../'.$data["image"]);

                        $sql = "DELETE FROM podcasts WHERE id='$podcast_id'";

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
                        <a class="btn btn-primary" href="podcasts">Жагсаалт</a>
                        <?
                    }
                    else header("location:podcasts");
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