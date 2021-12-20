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
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">


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
                            <a class="dropdown-item" href="projects?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Шинэ Төсөл</span></a>
                                <a class="dropdown-item" href="projects?action=category_new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Шинэ ангилал</span></a>
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
                            
                                $sql = "SELECT * FROM projects ORDER BY timestamp DESC";
                          
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $projects_id = $data["id"];
                                $projects_title = $data["title"];
                                $projects_brief = $data["brief"];
                                $projects_content = $data["content"];
                                $projects_image = $data["thumb"];
                                $projects_timestamp = $data["timestamp"];
                                $projects_visited = $data["visited"];
                               
                                ?>
                                <div class="col-md-3 col-12">
                                    <div class="card">
                                        <a href="projects?action=detail&id=<?=$projects_id;?>">
                                            <img class="card-img-top img-fluid" src="../<?=$projects_image;?>" alt="<?=$projects_title;?>" />
                                        </a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="projects?action=detail&id=<?=$projects_id;?>" class="blog-title-truncate text-body-heading"><?=$projects_title;?></a>
                                            </h4>
                                            <div class="media">
                                                <div class="avatar mr-50">
                                                    <img src="../<?=$admin_avatar;?>" alt="Avatar" width="24" height="24" />
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted mr-25">Оруулсан: </small>
                                                    <small><?=$admin_name;?></small>
                                                    <span class="text-muted ml-50 mr-25">|</span>
                                                    <small class="text-muted"><?=substr($projects_date,0,10);?></small>
                                                </div>
                                            </div>
                                            
                                            <p class="card-text blog-content-truncate mt-2">
                                                <?=$projects_brief;?>
                                            </p>
                                            <hr />
                                            <div class="d-flex justify-content-between align-items-center">
                                                
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="calendar" class="font-medium-1 text-body mr-50"></i>
                                                    <span class="text-body font-weight-bold"><?=$projects_date;?></span>
                                                </div>

                                                <a href="projects?action=edit&id=<?=$projects_id;?>" class="font-weight-bold">Засах</a>

                                                <a href="projects?action=detail&id=<?=$projects_id;?>" class="font-weight-bold">Дэлгэрэнгүй</a>
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
                    $projects_id = $_GET["id"];
                  
                            $sql = "SELECT *
                            FROM projects WHERE id='$projects_id'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)==1)
                            {
                                $data = mysqli_fetch_array($result);                            
                                $projects_id = $data["id"];
                                $projects_title = $data["title"];
                                $projects_brief = $data["brief"];
                                $projects_content = $data["content"];
                                $projects_image = $data["image"];
                                $projects_timestamp = $data["timestamp"];
                                $projects_visited = $data["visited"];
                                $projects_date = $data["date"];

                                ?>
                                <div class="blog-detail-wrapper">
                                    <div class="row">
                                        <!-- Blog -->
                                        <div class="col-12">
                                            <div class="card">
                                                <img src="../<?=$projects_image;?>" class="img-fluid card-img-top" alt="<?=$projects_title;?>" />
                                                <div class="card-body">
                                                    <h4 class="card-title"><?=$projects_title;?></h4>
                                                    <div class="media">
                                                        <div class="avatar mr-50">
                                                            <img src="../<?=$admin_avatar;?>" alt="Avatar" width="24" height="24" />
                                                        </div>
                                                        <div class="media-body">
                                                            <small class="text-muted mr-25">by</small>
                                                            <small><a href="javascript:void(0);" class="text-body"><?=$admin_name;?></a></small>
                                                            <span class="text-muted ml-50 mr-25">|</span>
                                                            <small class="text-muted"><?=$projects_date;?></small>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                    <p class="card-text mb-2 projects-body">
                                                       <?=$projects_content;?>
                                                    </p>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a href="projects?action=edit&id=<?=$projects_id;?>" class="btn btn-success">Засах</a>
                                    <a href="projects?action=grid" class="btn btn-primary">Жагсаалт</a>
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
                    $projects_id = $_GET["id"];
                    $sql = "SELECT *FROM projects WHERE id='$projects_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $projects_title = $data["title"];
                        $projects_from_date = $data["from_date"];
                        $projects_to_date = $data["to_date"];
                        $projects_brief = $data["brief"];
                        $projects_content = $data["content"];

                        $projects_thumb = $data["thumb"];
                        $projects_images = $data["images"];

                        $projects_city = $data["location_city"];
                        $projects_district = $data["location_district"];

                        $projects_category = $data["category"];
                        $projects_sustainability = $data["sustainability"];
                        $projects_person = $data["person"];
                        $projects_benefits = $data["benefits"];

                        $is_organisation = $data["is_organisation"];
                        $name = $data["name"];
                        $presenter = $data["presenter"];

                        $manhour = $data["manhour"];


                        $status = $data["status"];
                        //echo "[".$projects_to_date."]";
                        if ($projects_to_date=="0000-00-00 00:00:00") $projects_to_date = date("Y-m-d H:i"); 
                        //echo "[".$projects_to_date."]";


                        ?>
                        <section id="input-group-basic">
                            <form action="projects?action=editing" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Basic -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Үндсэн Мэдээлэлэл</h4>
                                            </div>
                                            <div class="card-body">
                                                <input type="hidden" name="projects_id" value="<?=$projects_id;?>">

                                                <p>Төслийн нэр</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" value="<?=$projects_title;?>" placeholder="Нэр..." />
                                                </div>
                                                

                                                <p>Эхлэх хугацаа</p>
                                                <div class="input-group mb-2">
                                                    
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="calendar"></i></span>
                                                    </div>
                                                    <input type="text" id="fp-date-time" class="form-control flatpickr-date-time" name="from_date" value="<?=$projects_from_date;?>" placeholder="YYYY-MM-DD HH:MM" />
                                                </div>
                                                

                                                <p>Дуусах</p>
                                                <div class="input-group mb-2">
                                                    
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="calendar"></i></span>
                                                    </div>
                                                    <input type="text" id="fp-date-time" class="form-control flatpickr-date-time" name="to_date" value="<?=$projects_to_date;?>" placeholder="YYYY-MM-DD HH:MM" />
                                                </div>
                                        

                                                <p>Жижиг зураг</p>
                                                <?
                                                if ($projects_thumb<>"")
                                                {
                                                    ?>
                                                    <img src="../<?=$projects_thumb;?>" style="max-width:100%;">
                                                    <?
                                                    
                                                }
                                                ?>
                                                <input type="file" class="form-control" name="thumb"/>

                                                <p>Байгууллага эсвэл иргэн</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <select class="form-control" name="is_organisation">
                                                        <option value="1">Байгууллага</option>
                                                        <option value="2">Хувь хүн</option>
                                                    </select>
                                                </div>

                                                <p>Зохион байгуулагч</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" value="<?=$name;?>" placeholder="Нэр..." />
                                                </div>

                                                <p>Холбоо барих</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="presenter" value="<?=$presenter;?>" placeholder="Нэр..." />
                                                </div>


                                                <p>Ангилал</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <select class="form-control" name="category">
                                                        <option value="1" <?=($projects_category==1)?'SELECTED':'';?>>Байгаль орчин</option>
                                                        <option value="2" <?=($projects_category==2)?'SELECTED':'';?>>Боловсрол</option>
                                                        <option value="3" <?=($projects_category==3)?'SELECTED':'';?>>Хүний эрх</option>
                                                        <option value="4" <?=($projects_category==4)?'SELECTED':'';?>>Эрүүл мэнд</option>
                                                        <option value="5" <?=($projects_category==5)?'SELECTED':'';?>>Хөгжлийн бэрхшээлтэй иргэд</option>
                                                        <option value="6" <?=($projects_category==6)?'SELECTED':'';?>>Хүүхэд, залуучууд</option>
                                                        <option value="7" <?=($projects_category==7)?'SELECTED':'';?>>Эмэгтэйчүүд</option>
                                                        <option value="8" <?=($projects_category==8)?'SELECTED':'';?>>Гамшигаас хамгаалах</option>
                                                        <option value="0" <?=($projects_category==0)?'SELECTED':'';?>>Бусад</option>
                                                    </select>
                                                </div>

                                                <p>Тогтвортой хөгжил</p>
                                                <select class="form-control" name="sustainability">
                                                    <option value="1" <?=($projects_sustainability==1)?'SELECTED':'';?>>1. Ядуурлыг устгах</option>
                                                    <option value="2" <?=($projects_sustainability==2)?'SELECTED':'';?>>2. Өлсгөлөнг зогсоох</option>
                                                    <option value="3" <?=($projects_sustainability==3)?'SELECTED':'';?>>3. Эрүүл мэндийг дэмжих</option>
                                                    <option value="4" <?=($projects_sustainability==4)?'SELECTED':'';?>>4. Чанартай боловсролыг дэмжих</option>
                                                    <option value="5" <?=($projects_sustainability==5)?'SELECTED':'';?>>5. Жендэрийн эрх тэгш байдлыг хангах</option>
                                                    <option value="6" <?=($projects_sustainability==6)?'SELECTED':'';?>>6. Баталгаат ундны ус, ариун цэврийн байгууламжаар </option>
                                                    <option value="7" <?=($projects_sustainability==7)?'SELECTED':'';?>>7. Сэргээгдэх эрчим хүчийг нэвтрүүлэх</option>
                                                    <option value="8" <?=($projects_sustainability==8)?'SELECTED':'';?>>8. Зохистой хөдөлмөр, эдийн засгийн өсөлтийг дэмжих</option>
                                                    <option value="9" <?=($projects_sustainability==9)?'SELECTED':'';?>>9. Найдвартай дэд бүтэц, хүртээмжтэй, тогтвортой аж үйлдвэрийг хөгжүүлэх, инновацийг хөхиүлэн дэмжих</option>
                                                    <option value="10" <?=($projects_sustainability==10)?'SELECTED':'';?>>10. Улс орны дотоодын болон улс хоорондын тэгш бус байдлыг багасгах</option>
                                                    <option value="11" <?=($projects_sustainability==11)?'SELECTED':'';?>>11.Хотын тэгш, хүртээмжтэй, аюулгүй, тогтвортой хөгжлийг дэмжих</option>
                                                    <option value="12" <?=($projects_sustainability==12)?'SELECTED':'';?>>12. Хариуцлагатай, тогтвортой хэрэглээ болон үйлдвэрлэлийг дэмжих</option>
                                                    <option value="13" <?=($projects_sustainability==13)?'SELECTED':'';?>>13. Уур амьсгалын өөрчлөлт, түүний үр дагавартай тэмцэх арга хэмжээг нэн даруй авах</option>
                                                    <option value="14" <?=($projects_sustainability==14)?'SELECTED':'';?>>14. Далай тэнгисийн нөөцийг хамгаалах, зүй зохистой ашиглах</option>
                                                    <option value="15" <?=($projects_sustainability==15)?'SELECTED':'';?>>15. Хуурай газрын экосистемийг хамгаалах</option>
                                                    <option value="16" <?=($projects_sustainability==16)?'SELECTED':'';?>>16. Энх тайван, шударга ёсыг цогцлоох</option>
                                                    <option value="17" <?=($projects_sustainability==17)?'SELECTED':'';?>>17. Тогтвортой хөгжлийн төлөө дэлхий нийтийн түншлэлийг сэргээж, түүнийг хэрэгжүүлэх арга замыг сайжруулах</option>
                                                </select>

                                                

                                                <p>Товчхон</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <textarea class="form-control"  name="brief"><?=$projects_brief;?></textarea>
                                                </div>

                                                <p>Харагдах эсэх</p>
                                                <select class="form-control" name="status">
                                                    <option value="0" <?=($status==0)?'SELECTED':'';?>>Харагдахгүй</option>
                                                    <option value="1" <?=($status==1)?'SELECTED':'';?>>Харагдах</option>
                                                </select>


                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">

                                            </div>

                                        </div>
                                        <a href="projects?action=delete&id=<?=$projects_id;?>" class="btn btn-danger waves-effect waves-float waves-light mt-1">Устгах</a>

                                    </div>

                                    <!-- Merged -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Нэмэлт мэдээлэл</h4>
                                            </div>
                                            <div class="card-body">
                                                <p>Хот / аймаг</p>
                                                <select class="form-control" name="location_city">
                                                    <? 
                                                    $sql = "SELECT *FROM address_city ORDER BY id";
                                                    $result = mysqli_query($conn,$sql);
                                                    while ($data = mysqli_fetch_array($result))
                                                    {
                                                        ?>
                                                        <option value="<?=$data["id"];?>" <?=($projects_city==$data["id"])?'SELECTED':'';?>><?=$data["name"];?></option>
                                                        <?
                                                    }
                                                    ?>
                                                </select>
                                                <p>Дүүрэг / Сум</p>
                                                <select class="form-control" name="location_district">
                                                    <option value="0" <?=($projects_district==0)?'SELECTED':'';?>>Сонгоогүй</option>

                                                    <? 
                                                    $sql = "SELECT *FROM address_district ORDER BY id";
                                                    $result = mysqli_query($conn,$sql);
                                                    while ($data = mysqli_fetch_array($result))
                                                    {
                                                        ?>
                                                        <option value="<?=$data["id"];?>" <?=($projects_district==$data["id"])?'SELECTED':'';?>><?=$data["name"];?></option>
                                                        <?
                                                    }
                                                    ?>
                                                </select>

                                                
                                                <?
                                                if ($projects_images<>"")
                                                {
                                                    ?>
                                                    <img src="../<?=$projects_image;?>" style="max-width:100%;">
                                                    <?
                                                    
                                                }
                                                ?>
                                                <!-- <p>Дотор зургууд</p>
                                                <input type="file" class="form-control" name="images[]"/> -->

                                                <p>Дэлгэрэнгүй</p>
                                                <div class="input-group mt-2 mb-2">
                                                    <textarea class="form-control"  name="content" id="editor"><?=$projects_content;?></textarea>
                                                </div>

                                                <p>Сайн дурынхан</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="users"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="person" value="<?=$projects_person;?>" placeholder="Сайн дурынхан..." />
                                                </div>

                                                <p>Ажилласан цаг</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="users"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="manhour" value="<?=$manhour;?>" placeholder="Цаг..." />
                                                </div>


                                                <p>Ашиг хүртэгч</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="users"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="benefits" value="<?=$projects_benefits;?>" placeholder="Нэр..." />
                                                </div>

                                                
                                            </div>

                                        
                                        </div>
                                    </div>

                                
                                
                                </div>
                            </form>
                        </section>
                    <?
                    }
                    else header("location:projects?action=grid");
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $projects_id = $_POST["projects_id"];

                    $is_organisation = $_POST["is_organisation"];
                    $name = $_POST["name"];
                    $presenter = $_POST["presenter"];

                    $category = $_POST["category"];
                    $sustainability = $_POST["sustainability"];

                    $title = mysqli_escape_string($conn,$_POST["title"]);
                    $brief = mysqli_escape_string($conn,$_POST["brief"]);
                    $content = mysqli_escape_string($conn,$_POST["content"]);
                    $from_date = $_POST["from_date"];
                    $to_date = $_POST["to_date"];

                    // $date = $_POST["date"];
                    // $time = $_POST["time"];
                    // $duration = $_POST["duration"];

                    $location_city = $_POST["location_city"];
                    $location_district = $_POST["location_district"];

                    $person = $_POST["person"];
                    $manhour = $_POST["manhour"];                
                    $benefits = $_POST["benefits"];
                    $status = $_POST["status"];


                    if(isset($_FILES['thumb']) && $_FILES['thumb']['name']!="")
                    {
                        if ($_FILES['thumb']['name']!="")
                            {                        
                                @$folder = date("Ym");
                                if(!file_exists('../uploads/'.$folder))
                                mkdir ( '../uploads/'.$folder);
                                $target_dir = '../uploads/'.$folder;
                                $target_file = $target_dir."/".@date("his").rand(0,1000). basename($_FILES["thumb"]["name"]);
                                move_uploaded_file($_FILES['thumb']['tmp_name'], $target_file);
                                $thumb= substr($target_file,3);
                                $sql = "UPDATE projects SET thumb='$thumb' WHERE id='$projects_id'";
                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE projects SET 
                    title='$title',
                    brief='$brief',
                    content='$content',
                    from_date='$from_date',
                    to_date='$to_date',
                    -- date='$date',
                    -- time='$time',
                    -- duration='$duration',
                    is_organisation='$is_organisation',
                    name='$name',
                    presenter = '$presenter',
                    location_city = '$location_city',
                    location_district = '$location_district',
                    person = '$person',
                    benefits = '$benefits',
                    category = '$category',
                    manhour = '$manhour',               
                    sustainability = '$sustainability',
                    status = '$status'
                    WHERE id='$projects_id'";


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
                    <a class="btn btn-success" href="projects?action=edit&id=<?=$projects_id;?>">Засах</a>
                    <a class="btn btn-primary" href="projects?action=detail&id=<?=$projects_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="projects">Бүх Төсөл</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="projects?action=adding" method="post" enctype="multipart/form-data">
                            <div class="row">
                                 <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Үндсэн Мэдээлэлэл</h4>
                                            </div>
                                            <div class="card-body">
                                                <p>Сайн дурын үйл ажиллагааны нэр</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" value="" placeholder="СДҮА..." />
                                                </div>
                                                

                                                

                                                <p>Эхэлсэн хугацаа</p>
                                                <div class="input-group mb-2">
                                                    
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="calendar"></i></span>
                                                    </div>
                                                    <input type="text" id="fp-date-time" class="form-control flatpickr-date-time" name="from_date" value="<?=date("Y-m-d H:i");?>" placeholder="YYYY-MM-DD HH:MM" />
                                                </div>
                                                

                                                <p>Дууссан хугацаа</p>
                                                <div class="input-group mb-2">
                                                    
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="calendar"></i></span>
                                                    </div>
                                                    <input type="text" id="fp-date-time" class="form-control flatpickr-date-time" name="to_date"  value="<?=date("Y-m-d H:i");?>" placeholder="YYYY-MM-DD HH:MM" />
                                                </div>
                                        

                                                <p>Сайн дурын үйл ажиллагааны фото зураг</p>
                                                <input type="file" class="form-control" name="thumb"/>

                                                <p>Байгууллага эсвэл иргэн</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <select class="form-control" name="is_organisation">
                                                        <option value="1">Байгууллага</option>
                                                        <option value="2">Хувь хүн</option>
                                                    </select>
                                                </div>

                                                <p>Зохион байгуулагч</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" value="" placeholder="Нэр..." />
                                                </div>

                                                <p>Холбоо барих</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="presenter" value="" placeholder="Нэр..." />
                                                </div>


                                                <p>Ангилал</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <select class="form-control" name="category">
                                                        <option value="1"></option></option>Байгаль орчин</option>
                                                        <option value="2">Боловсрол</option>
                                                        <option value="3">Хүний эрх</option>
                                                        <option value="4">Эрүүл мэнд</option>
                                                        <option value="5">Хөгжлийн бэрхшээлтэй иргэд</option>
                                                        <option value="6">Хүүхэд, залуучууд</option>
                                                        <option value="7">Эмэгтэйчүүд</option>
                                                        <option value="8">Гамшигаас хамгаалах</option>
                                                        <option value="0">Бусад</option>
                                                    </select>
                                                </div>

                                                <p>Тогтвортой хөгжлийн зорилт</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                    </div>
                                                    <select class="form-control" name="sustainability">
                                                        <option value="1">Ядуурлыг устгах</option>
                                                        <option value="2">Өлсгөлөнг зогсоох</option>
                                                        <option value="3">Эрүүл мэндийг дэмжих</option>
                                                        <option value="4">Чанартай боловсролыг дэмжих</option>
                                                        <option value="5">Жендэрийн эрх тэгш байдлыг хангах</option>
                                                        <option value="6">Баталгаат ундны ус, ариун цэврийн байгууламжаар </option>
                                                        <option value="7">Сэргээгдэх эрчим хүчийг нэвтрүүлэх</option>
                                                        <option value="8">Зохистой хөдөлмөр, эдийн засгийн өсөлтийг дэмжих</option>
                                                        <option value="9">Найдвартай дэд бүтэц, хүртээмжтэй, тогтвортой аж үйлдвэрийг хөгжүүлэх, инновацийг хөхиүлэн дэмжих</option>
                                                        <option value="10">Улс орны дотоодын болон улс хоорондын тэгш бус байдлыг багасгах</option>
                                                        <option value="11">Хотын тэгш, хүртээмжтэй, аюулгүй, тогтвортой хөгжлийг дэмжих</option>
                                                        <option value="12">Хариуцлагатай, тогтвортой хэрэглээ болон үйлдвэрлэлийг дэмжих</option>
                                                        <option value="13">Уур амьсгалын өөрчлөлт, түүний үр дагавартай тэмцэх арга хэмжээг нэн даруй авах</option>
                                                        <option value="14">Далай тэнгисийн нөөцийг хамгаалах, зүй зохистой ашиглах</option>
                                                        <option value="15">Хуурай газрын экосистемийг хамгаалах</option>
                                                        <option value="16">Энх тайван, шударга ёсыг цогцлоох</option>
                                                        <option value="17">Тогтвортой хөгжлийн төлөө дэлхий нийтийн түншлэлийг сэргээж, түүнийг хэрэгжүүлэх арга замыг сайжруулах</option>
                                                    </select>
                                                </div>

                                                

                                                <p>Товчхон</p>
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
                                                <h4 class="card-title">Нэмэлт мэдээлэл</h4>
                                            </div>
                                            <div class="card-body">
                                                <p>Хот / аймаг</p>
                                                <select class="form-control" name="location_city">
                                                    <? 
                                                    $sql = "SELECT *FROM address_city ORDER BY id";
                                                    $result = mysqli_query($conn,$sql);
                                                    while ($data = mysqli_fetch_array($result))
                                                    {
                                                        ?>
                                                        <option value="<?=$data["id"];?>"><?=$data["name"];?></option>
                                                        <?
                                                    }
                                                    ?>
                                                </select>
                                                <p>Дүүрэг / Сум</p>
                                                <select class="form-control" name="location_district">
                                                    <option value="0">Сонгоогүй</option>
                                                    <? 
                                                    $sql = "SELECT *FROM address_district ORDER BY id";
                                                    $result = mysqli_query($conn,$sql);
                                                    while ($data = mysqli_fetch_array($result))
                                                    {
                                                        ?>
                                                        <option value="<?=$data["id"];?>"><?=$data["name"];?></option>
                                                        <?
                                                    }
                                                    ?>
                                                </select>

                                                
                                                <!-- <p>Дотор зургууд</p>
                                                <input type="file" class="form-control" name="images[]"/> -->

                                                <p>Дэлгэрэнгүй</p>
                                                <div class="input-group mt-2 mb-2">
                                                    <textarea class="form-control"  name="content" id="editor"></textarea>
                                                </div>

                                                <p>Сайн дурын хүн</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="users"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="person" value="" placeholder="Ажилласан хүн..." />
                                                </div>

                                                <p>Ажилласан цаг</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="users"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="manhour" value="" placeholder="Цаг..." />
                                                </div>

                                                

                                                <p>Ашиг хүртэгч</p>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="users"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="benefits" value="" placeholder="Ашиг хүргэгч..." />
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
                    $is_organisation = $_POST["is_organisation"];
                    $name = $_POST["name"];
                    $presenter = $_POST["presenter"];

                    $category = $_POST["category"];
                    $sustainability = $_POST["sustainability"];

                    $title = mysqli_escape_string($conn,$_POST["title"]);
                    $brief = mysqli_escape_string($conn,$_POST["brief"]);
                    $content = mysqli_escape_string($conn,$_POST["content"]);
                    
                    $from_date = $_POST["from_date"];
                    $to_date = $_POST["to_date"];
                    if ($to_date=="") $to_date = date("Y-m-d H:i:s"); 
                    

                    $location_city = $_POST["location_city"];
                    $location_district = $_POST["location_district"];

                    $person = $_POST["person"];
                    $manhour = $_POST["manhour"];                
                    $benefits = $_POST["benefits"];
                    
                    $thumb = "";
                    if(isset($_FILES['thumb']) && $_FILES['thumb']['name']!="")
                    {
                        if ($_FILES['thumb']['name']!="")
                            {                        
                                @$folder = date("Ym");
                                if(!file_exists('../uploads/'.$folder))
                                mkdir ( '../uploads/'.$folder);
                                $target_dir = '../uploads/'.$folder;
                                $target_file = $target_dir."/".@date("his").rand(0,1000). basename($_FILES["thumb"]["name"]);
                                move_uploaded_file($_FILES['thumb']['tmp_name'], $target_file);
                                $thumb= substr($target_file,3);        
                            }
                    }

                    $sql = "INSERT INTO projects (title,brief,content,thumb,from_date,to_date,is_organisation,name,presenter,location_city,location_district,person,manhour,benefits,category,sustainability,status)  
                    VALUES ('$title','$brief','$content','$thumb','$from_date','$to_date','$is_organisation','$name','$presenter','$location_city','$location_district','$person','$manhour','$benefits','$category','$sustainability',1)";

                    if (mysqli_query($conn,$sql))
                    {
                        $projects_id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="projects?action=edit&id=<?=$projects_id;?>">Засах</a>
                    <a class="btn btn-primary" href="projects?action=detail&id=<?=$projects_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="projects">Жагсаалт</a>
                    <?
                    
                }
                ?>


                <?
                if ($action=="delete")
                {
                    $projects_id = $_GET["id"];
                  

                    $sql = "DELETE FROM projects WHERE id='$projects_id'";


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
                    <a class="btn btn-primary" href="projects">Бүх Төсөл</a>
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
    <script src="app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>

    <script src="app-assets/vendors/js/ckeditor/ckeditor.js"></script>

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/forms/pickers/form-pickers.js"></script>

    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            $("#from-datepicker").datepicker({ 
                format: 'yyyy-mm-dd hh:ii:ss'
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