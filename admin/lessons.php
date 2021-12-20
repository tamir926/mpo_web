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
    <? if ($_GET["action"]) $action=$_GET["action"]; else $action="grid"; 
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
                            <h2 class="content-header-title float-left mb-0">Хичээл</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Хичээл
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
                                <a class="dropdown-item" href="lessons?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Бүтээдэхүүн нэмэх</span></a>
                                <a class="dropdown-item" href="lessons?action=category_add"><i class="mr-1" data-feather="bar-chart-2"></i><span class="align-middle">Ангилал нэмэх</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <? 
                if ($action=="grid")
                {
                    $category_id = $_GET["category"];
                    ?>
                    <section id="card-demo-example">
                        <div class="row match-height">
                            <?
                            $sql = "SELECT lessons.*, teachers.name teacher_name, teachers.avatar teacher_avatar
                            FROM lessons LEFT JOIN teachers ON lessons.teacher=teachers.id WHERE category='$category_id'";
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $lesson_id = $data["id"];
                                $lesson_name = $data["name"];
                                $lesson_description = $data["description"];
                                $lesson_teacher_id = $data["teacher"];
                                $lesson_teacher_name = $data["teacher_name"];
                                $lesson_teacher_avatar = $data["teacher_avatar"];
                                $lesson_image = $data["image"];
                                $lesson_visited = $data["visited"];
                                $lesson_bought = $data["bought"];
                                $lesson_price = $data["price"];
                                $lesson_date = $data["created_date"];
                                $lesson_subjects = $data["subjects"];
                               
                                ?>
                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <a href="lessons?action=detail&id=<?=$lesson_id;?>">
                                            <img class="card-img-top img-fluid" src="../<?=$lesson_image;?>" alt="<?=$lesson_name;?>" />
                                        </a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="lessons?action=detail&id=<?=$lesson_id;?>" class="blog-title-truncate text-body-heading"><?=$lesson_name;?></a>
                                            </h4>
                                            <div class="media">
                                                <div class="avatar mr-50">
                                                    <img src="../<?=$lesson_teacher_avatar;?>" alt="Avatar" width="24" height="24" />
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted mr-25">Оруулсан: </small>
                                                    <small><a href="teachers?action=detail&id=<?=$lesson_teacher_id;?>" class="text-body"><?=$lesson_teacher_name;?></a></small>
                                                    <span class="text-muted ml-50 mr-25">|</span>
                                                    <small class="text-muted"><?=substr($lesson_date,0,10);?></small>
                                                </div>
                                            </div>
                                            
                                            <p class="card-text blog-content-truncate mt-2">
                                                <?=$lesson_description;?>
                                            </p>
                                            <hr />
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="eye" class="font-medium-1 text-body mr-50"></i>
                                                    <span class="text-body font-weight-bold"><?=$lesson_visited;?> Үзсэн</span>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <i data-feather="dollar-sign" class="font-medium-1 text-body mr-50"></i>
                                                    <span class="text-body font-weight-bold"><?=$lesson_bought;?> Авсан</span>
                                                </div>


                                                <div class="d-flex align-items-center">
                                                    <i data-feather="file-text" class="font-medium-1 text-body mr-50"></i>
                                                    <span class="text-body font-weight-bold"><?=$lesson_subjects;?> Сэдэв</span>
                                                </div>


                                                <a href="lessons?action=detail&id=<?=$lesson_id;?>" class="font-weight-bold">Дэлгэрэнгүй</a>
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
                    $lesson_id = $_GET["id"];
                  
                            $sql = "SELECT lessons.*, teachers.name teacher_name, teachers.avatar teacher_avatar
                            FROM lessons LEFT JOIN teachers ON lessons.teacher=teachers.id WHERE lessons.id='$lesson_id'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)==1)
                            {
                                $data = mysqli_fetch_array($result);                            
                                $lesson_id = $data["id"];
                                $lesson_name = $data["name"];
                                $lesson_description = $data["description"];
                                $lesson_teacher_id = $data["teacher"];
                                $lesson_teacher_name = $data["teacher_name"];
                                $lesson_teacher_avatar = $data["teacher_avatar"];
                                $lesson_image = $data["image"];
                                $lesson_visited = $data["visited"];
                                $lesson_bought = $data["bought"];
                                $lesson_price = $data["price"];
                                $lesson_date = $data["created_date"];
                                $lesson_subjects = $data["subjects"];

                                ?>
                                <div class="blog-detail-wrapper">
                                    <div class="row">
                                        <!-- Blog -->
                                        <div class="col-8">
                                            <div class="card">
                                                <img src="../<?=$lesson_image;?>" class="img-fluid card-img-top" alt="<?=$lesson_name;?>" />
                                                <div class="card-body">
                                                    <h4 class="card-title"><?=$lesson_name;?></h4>
                                                    <div class="media">
                                                        <div class="avatar mr-50">
                                                            <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" width="24" height="24" />
                                                        </div>
                                                        <div class="media-body">
                                                            <small class="text-muted mr-25">by</small>
                                                            <small><a href="javascript:void(0);" class="text-body">Ghani Pradita</a></small>
                                                            <span class="text-muted ml-50 mr-25">|</span>
                                                            <small class="text-muted">Jan 10, 2020</small>
                                                        </div>
                                                    </div>
                                                    <div class="my-1 py-25">
                                                        <a href="javascript:void(0);">
                                                            <div class="badge badge-pill badge-light-danger mr-50">Gaming</div>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <div class="badge badge-pill badge-light-warning">Video</div>
                                                        </a>
                                                    </div>
                                                    <p class="card-text mb-2">
                                                        Before you get into the nitty-gritty of coming up with a perfect title, start with a rough draft: your
                                                        working title. What is that, exactly? A lot of people confuse working titles with topics. Let's clear that
                                                        Topics are very general and could yield several different blog posts. Think "raising healthy kids," or
                                                        "kitchen storage." A writer might look at either of those topics and choose to take them in very, very
                                                        different directions.A working title, on the other hand, is very specific and guides the creation of a
                                                        single blog post. For example, from the topic "raising healthy kids," you could derive the following working
                                                        title See how different and specific each of those is? That's what makes them working titles, instead of
                                                        overarching topics.
                                                    </p>
                                                    <h4 class="mb-75">Unprecedented Challenge</h4>
                                                    <ul class="p-0 mb-2">
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Preliminary thinking systems</span>
                                                        </li>
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Bandwidth efficient</span>
                                                        </li>
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Green space</span>
                                                        </li>
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Social impact</span>
                                                        </li>
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Thought partnership</span>
                                                        </li>
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Fully ethical life</span>
                                                        </li>
                                                    </ul>
                                                    <div class="media">
                                                        <div class="avatar mr-2">
                                                            <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" width="60" height="60" alt="Avatar" />
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="font-weight-bolder">Willie Clark</h6>
                                                            <p class="card-text mb-0">
                                                                Based in London, Uncode is a blog by Willie Clark. His posts explore modern design trends through photos
                                                                and quotes by influential creatives and web designer around the world.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr class="my-2" />
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-center mr-1">
                                                                <a href="javascript:void(0);" class="mr-50">
                                                                    <i data-feather="message-square" class="font-medium-5 text-body align-middle"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <div class="text-body align-middle">19.1K</div>
                                                                </a>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="mr-50">
                                                                    <i data-feather="bookmark" class="font-medium-5 text-body align-middle"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <div class="text-body align-middle">139</div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown blog-detail-share">
                                                            <i data-feather="share-2" class="font-medium-5 text-body cursor-pointer" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                                    <i data-feather="github" class="font-medium-3"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                                    <i data-feather="gitlab" class="font-medium-3"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                                    <i data-feather="facebook" class="font-medium-3"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                                    <i data-feather="twitter" class="font-medium-3"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                                    <i data-feather="linkedin" class="font-medium-3"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ Blog -->

                                        <div class="col-3">
                                            <div class="sidebar-detached sidebar-right">
                                                <div class="sidebar">
                                                    <div class="blog-sidebar my-2 my-lg-0">
                                                        <!-- Search bar -->
                                                        <div class="blog-search">
                                                            <div class="input-group input-group-merge">
                                                                <input type="text" class="form-control" placeholder="Search here" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text cursor-pointer">
                                                                        <i data-feather="search"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/ Search bar -->

                                                        <!-- Recent Posts -->
                                                        <div class="blog-recent-posts mt-3">
                                                            <h6 class="section-label">Recent Posts</h6>
                                                            <div class="mt-75">
                                                                <div class="media mb-2">
                                                                    <a href="page-blog-detail.html" class="mr-2">
                                                                        <img class="rounded" src="../../../app-assets/images/banner/banner-22.jpg" width="100" height="70" alt="Recent Post Pic" />
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h6 class="blog-recent-post-title">
                                                                            <a href="page-blog-detail.html" class="text-body-heading">Why Should Forget Facebook?</a>
                                                                        </h6>
                                                                        <div class="text-muted mb-0">Jan 14 2020</div>
                                                                    </div>
                                                                </div>
                                                                <div class="media mb-2">
                                                                    <a href="page-blog-detail.html" class="mr-2">
                                                                        <img class="rounded" src="../../../app-assets/images/banner/banner-27.jpg" width="100" height="70" alt="Recent Post Pic" />
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h6 class="blog-recent-post-title">
                                                                            <a href="page-blog-detail.html" class="text-body-heading">Publish your passions, your way</a>
                                                                        </h6>
                                                                        <div class="text-muted mb-0">Mar 04 2020</div>
                                                                    </div>
                                                                </div>
                                                                <div class="media mb-2">
                                                                    <a href="page-blog-detail.html" class="mr-2">
                                                                        <img class="rounded" src="../../../app-assets/images/banner/banner-39.jpg" width="100" height="70" alt="Recent Post Pic" />
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h6 class="blog-recent-post-title">
                                                                            <a href="page-blog-detail.html" class="text-body-heading">The Best Ways to Retain More</a>
                                                                        </h6>
                                                                        <div class="text-muted mb-0">Feb 18 2020</div>
                                                                    </div>
                                                                </div>
                                                                <div class="media">
                                                                    <a href="page-blog-detail.html" class="mr-2">
                                                                        <img class="rounded" src="../../../app-assets/images/banner/banner-35.jpg" width="100" height="70" alt="Recent Post Pic" />
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h6 class="blog-recent-post-title">
                                                                            <a href="page-blog-detail.html" class="text-body-heading">Share a Shocking Fact or Statistic</a>
                                                                        </h6>
                                                                        <div class="text-muted mb-0">Oct 08 2020</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/ Recent Posts -->

                                                        <!-- Categories -->
                                                        <div class="blog-categories mt-3">
                                                            <h6 class="section-label">Categories</h6>
                                                            <div class="mt-1">
                                                                <div class="d-flex justify-content-start align-items-center mb-75">
                                                                    <a href="javascript:void(0);" class="mr-75">
                                                                        <div class="avatar bg-light-primary rounded">
                                                                            <div class="avatar-content">
                                                                                <i data-feather="watch" class="avatar-icon font-medium-1"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="blog-category-title text-body">Fashion</div>
                                                                    </a>
                                                                </div>
                                                                <div class="d-flex justify-content-start align-items-center mb-75">
                                                                    <a href="javascript:void(0);" class="mr-75">
                                                                        <div class="avatar bg-light-success rounded">
                                                                            <div class="avatar-content">
                                                                                <i data-feather="shopping-cart" class="avatar-icon font-medium-1"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="blog-category-title text-body">Food</div>
                                                                    </a>
                                                                </div>
                                                                <div class="d-flex justify-content-start align-items-center mb-75">
                                                                    <a href="javascript:void(0);" class="mr-75">
                                                                        <div class="avatar bg-light-danger rounded">
                                                                            <div class="avatar-content">
                                                                                <i data-feather="command" class="avatar-icon font-medium-1"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="blog-category-title text-body">Gaming</div>
                                                                    </a>
                                                                </div>
                                                                <div class="d-flex justify-content-start align-items-center mb-75">
                                                                    <a href="javascript:void(0);" class="mr-75">
                                                                        <div class="avatar bg-light-info rounded">
                                                                            <div class="avatar-content">
                                                                                <i data-feather="hash" class="avatar-icon font-medium-1"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="blog-category-title text-body">Quote</div>
                                                                    </a>
                                                                </div>
                                                                <div class="d-flex justify-content-start align-items-center">
                                                                    <a href="javascript:void(0);" class="mr-75">
                                                                        <div class="avatar bg-light-warning rounded">
                                                                            <div class="avatar-content">
                                                                                <i data-feather="video" class="avatar-icon font-medium-1"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="blog-category-title text-body">Video</div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/ Categories -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?
                            }
                            else 
                            {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                    Хичээл олдсонгүй
                                    </div>
                                </div>
                                <?
                            }
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $lesson_id = $_GET["id"];
                    $sql = "SELECT *FROM lessons WHERE id='$lesson_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $lesson_name = $data["name"];
                        $lesson_barcode = $data["barcode"];
                        $lesson_comment = $data["comment"];
                        $lesson_images = $data["images"];

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
                                        <form action="lessons?action=editing" method="post">
                                            <input type="hidden" name="lesson_id" value="<?=$lesson_id;?>">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" value="<?=$lesson_name;?>" placeholder="Нэр..." />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="barcode" value="<?=$lesson_barcode;?>" placeholder="Баркод..." />
                                            </div>


                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Тайлбар</span>
                                                </div>
                                                <textarea class="form-control" aria-label="With textarea" name="comment"><?=$lesson_comment;?></textarea>
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
                                        if ($lesson_images<>"")
                                        {
                                            $images = explode(",",$lesson_images);
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
                            </div>

                          
                           
                        </div>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $lesson_id = $_POST["lesson_id"];
                    $name = $_POST["name"];
                    $barcode = $_POST["barcode"];
                    $comment = $_POST["comment"];

                    $sql = "UPDATE lessons SET name='$name',barcode='$barcode',comment='$comment' WHERE id='$lesson_id'";


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
                    <a class="btn btn-success" href="lessons?action=edit&id=<?=$lesson_id;?>">Засах</a>
                    <a class="btn btn-primary" href="lessons?action=detail&id=<?=$lesson_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="lessons">Жагсаалт</a>
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
                                        <form action="lessons?action=adding" method="post">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" placeholder="Нэр..." />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="barcode" placeholder="Баркод..." />
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
                    $barcode = $_POST["barcode"];
                    $comment = $_POST["comment"];

                    $sql = "INSERT INTO lessons (name,barcode,comment,member_id)  VALUES ('$name','$barcode','$comment','$logged_member_id')";

                    if (mysqli_query($conn,$sql))
                    {
                        $lesson_id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="lessons?action=edit&id=<?=$lesson_id;?>">Засах</a>
                    <a class="btn btn-primary" href="lessons?action=detail&id=<?=$lesson_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="lessons">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <? 
                if ($action=="category")
                {
                    ?>
                    <div class="row">
                            <?
                            $sql = "SELECT *FROM category ORDER BY dd";
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $category_name = $data["name"];
                                $category_id = $data["id"];
                                $category_dd = $data["dd"];
                                $category_image = $data["image"];
                                
                                ?>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="media-list">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="../<?=$category_image;?>" alt="avatar" class="cursor-pointer" width="64" height="64">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><?=$category_name;?></h4>
                                                        <p>Жагсаалтын эрэмбэ:<?=$category_dd;?></p>
                                                        <a href="lessons?action=category_edit&id=<?=$category_id;?>" class="btn btn-success btn-sm waves-effect waves-float waves-light"><i data-feather='edit'></i> Засах</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?
                            }
                            ?>
                    </div>
                    <?
                }
                ?>

                <?
                if ($action=="category_add")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="lessons?action=category_adding" method="post" enctype="multipart/form-data">
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

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
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

                    $sql = "INSERT INTO category (name,dd,image)  VALUES ('$name','$dd','$target_file')";

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
                    <a class="btn btn-success" href="lessons?action=category_edit&id=<?=$category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="lessons?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="category_edit")
                {
                    $category_id = $_GET["id"];
                    $sql = "SELECT *FROM category WHERE id='$category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        ?>
                        <section>
                            <form action="lessons?action=category_editing" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
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

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                            </form>
                                        </div>
                                    </div>

                                </div>                         

                                <div class="col-md-6">
                                    
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Зураг</h4>
                                        </div>
                                        <div class="card-body">
                                        
                                            <img src="../<?=$data["image"];?>" />

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
                        </section>
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
                                $sql = "UPDATE category SET image='$target_file' WHERE id='$category_id'";

                                mysqli_query($conn,$sql);
        
                            }
                    }

                    
                   

                    $sql = "UPDATE category SET name='$name',dd='$dd' WHERE id='$category_id'";
                    
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
                    <a class="btn btn-success" href="lessons?action=category_edit&id=<?=$category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="lessons?action=category">Жагсаалт</a>
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