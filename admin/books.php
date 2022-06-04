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
                            <h2 class="content-header-title float-left mb-0">Ном</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Ном
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
                                <a class="dropdown-item" href="books?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Бүртгэх</span></a>
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
                                                <th>Огноо</th>
                                                <th>PDF</th>
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT *FROM books ORDER BY number DESC, date DESC";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$data["number"];?></td>
                                                        <td><img src="../<?=$data["image"];?>" height="40" width="30"></td>
                                                        <td><?=$data["title"];?></td>
                                                        <td><?=$data["date"];?></td>
                                                        <td><a href="../<?=$data["pdf"];?>" target="new">PDF</a></td>
                                                        <td><a class="btn btn-success" href="books?action=edit&id=<?=$data["id"];?>">Засах</a></td>
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
                    $books_id = $_GET["id"];
                    $sql = "SELECT *FROM books WHERE id='$books_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $books_title = $data["title"];
                        $books_number = $data["number"];
                        $books_date = $data["date"];
                        $books_image = $data["image"];
                        $books_pdf = $data["pdf"];

                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="books?action=editing" method="post" enctype="multipart/form-data">
                            <div class="row">
                            
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="books_id" value="<?=$books_id;?>">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" value="<?=$books_title;?>" placeholder="Нэр..." required />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="hash"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="number" value="<?=$books_number;?>" placeholder="Дугаар" required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="date" value="<?=$books_date;?>" placeholder="Огноо" required/>
                                                </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Номийн зураг болон файл</h4>
                                        </div>
                                        <div class="card-body">
                                        
                                            <img class="img-fluid d-block" src="../<?=$books_image;?>" />

                                            <div class="form-group">
                                                <label for="customFile1">Зураг сонгох</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile1"  name="image"/>
                                                    <label class="custom-file-label" for="customFile1">Зураг сонгох</label>
                                                </div>
                                            </div>

                                            <a class="btn btn-success" src="../<?=$$books_pdf;?>" >Татах</a>


                                            <div class="form-group">
                                                <label for="customFile1">PDF файл</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" accept="application/pdf" id="customFile2"  name="pdf"/>
                                                    <label class="custom-file-label" for="customFile2">PDF сонгох</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Засварлах">

                        </form>
                    </section>
                    <a href="books?action=delete&id=<?=$books_id;?>" class="btn btn-danger mt-3">Устгах</a>

                    <?
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $books_id = $_POST["books_id"];
                    $title = $_POST["title"];
                    $number = $_POST["number"];
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
                                  $sql = "UPDATE books SET avatar='$target_file' WHERE id='$books_id'";

                                  //echo $sql;
                                  mysqli_query($conn,$sql);
          
                              }
                      }

                    if(isset($_FILES['pdf']) && $_FILES['pdf']['name']!="")
                      {
                          if ($_FILES['pdf']['name']!="")
                              {                        
                                  @$folder = date("Ym");
                                  if(!file_exists('../uploads/'.$folder))
                                  mkdir ( '../uploads/'.$folder);
                                  $target_dir = '../uploads/'.$folder;
                                  $target_file = $target_dir."/".@date("his").rand(0,1000). basename($_FILES["pdf"]["name"]);
                                  move_uploaded_file($_FILES['pdf']['tmp_name'], $target_file);
                                  $target_file= substr($target_file,3);
                                  $sql = "UPDATE books SET pdf='$target_file' WHERE id='$books_id'";
                                  mysqli_query($conn,$sql);
          
                              }
                      }

                    $sql = "UPDATE books SET title='$title',number='$number',date='$date' WHERE id='$books_id'";

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
                    <a class="btn btn-success" href="books?action=edit&id=<?=$books_id;?>">Засах</a>
                    <a class="btn btn-primary" href="books?action=detail&id=<?=$books_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="books">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="books?action=adding" method="post" enctype="multipart/form-data">
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
                                                    <input type="text" class="form-control" name="title" placeholder="Нэр..." required />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="hash"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="number" placeholder="Дугаар" required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="date" placeholder="Огноо" required/>
                                                </div>                                    

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Номийн зураг болон файл</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="customFile1">Зураг сонгох</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile1"  name="image"/>
                                                    <label class="custom-file-label" for="customFile1">Зураг сонгох</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="customFile1">PDF файл</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" accept="application/pdf" id="customFile2"  name="pdf"/>
                                                    <label class="custom-file-label" for="customFile2">PDF сонгох</label>
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
                    $title = $_POST["title"];
                    $number = $_POST["number"];
                    $date = $_POST["date"];
                    $image=$pdf = $target_file =NULL;
                   
                   
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


                    if(isset($_FILES['pdf']) && $_FILES['pdf']['name']!="")
                      {
                          if ($_FILES['pdf']['name']!="")
                              {                        
                                  @$folder = date("Ym");
                                  if(!file_exists('../uploads/'.$folder))
                                  mkdir ( '../uploads/'.$folder);
                                  $target_dir = '../uploads/'.$folder;
                                  $target_file = $target_dir."/".@date("his").rand(0,1000). basename($_FILES["pdf"]["name"]);
                                  move_uploaded_file($_FILES['pdf']['tmp_name'], $target_file);
                                  $pdf= substr($target_file,3);
                              }
                      }

                    $sql = "INSERT INTO books (title,number,date,image,pdf) VALUES ('$title','$number','$date','$image','$pdf')";

                    if (mysqli_query($conn,$sql))
                    {
                        $books_id = mysqli_insert_id($conn);
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
                    <a class="btn btn-success" href="books?action=edit&id=<?=$books_id;?>">Засах</a>
                    <a class="btn btn-primary" href="books?action=detail&id=<?=$books_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="books">Жагсаалт</a>
                    <?
                }
                ?>

                <?
                if ($action=="detail")
                {
                    $books_id = $_GET["id"];
                    $sql = "SELECT *FROM books WHERE id='$books_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $books_title = $data["title"];
                        $books_number = $data["number"];
                        $books_date = $data["date"];
                        $books_image = $data["image"];
                        $books_pdf = $data["pdf"];

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
                                                <p class="card-text mb-0"><?=$books_title;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="hash" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Дугаар</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$books_number;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="mail" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Имэйл</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$books_email;?></p>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title mr-3 w-10">
                                                    <i data-feather="calendar" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Огноо</span>
                                                </div>
                                                <p class="card-text mb-0"><?=$books_date;?></p>
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
                                        <img class="img-fluid d-block" src="../<?=$books_image;?>" />

                                        <a href="../<?=$books_pdf;?>" class="btn btn-success mt-3">Татах</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-success" href="books?action=edit&id=<?=$books_id;?>">Засах</a>
                        <a class="btn btn-primary" href="books">Жагсаалт</a>
                    </section>
                    <?
                }
                ?>

                <?
                if ($action=="delete")
                {
                    $books_id = $_GET["id"];
                    $sql = "SELECT *FROM books WHERE id='$books_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $books_title = $data["title"];
                        $books_number = $data["number"];
                        $books_date = $data["date"];
                        $books_image = $data["image"];
                        $books_pdf = $data["pdf"];

                        $sql = "DELETE FROM books WHERE id='$books_id'";

                        if (mysqli_query($conn,$sql))
                        {
                            if (file_exists('../'.$books_image)) unlink('../'.$books_image);
                            if (file_exists('../'.$books_pdf)) unlink('../'.$books_pdf);
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
                        <a class="btn btn-primary" href="books">Жагсаалт</a>
                        <?

                    }
                   
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
                                                $sql = "SELECT *FROM books_category ORDER BY dd";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td>
                                                            <a class="btn btn-success" href="books?action=category_edit&id=<?=$data["id"];?>">Засах</a>
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
                    $books_category_id = $_GET["id"];
                    $sql = "SELECT *FROM books_category WHERE id='$books_category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $name = $data["name"];
                        $dd = $data["dd"];
                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="books?action=category_editing" method="post" enctype="multipart/form-data">
                            <div class="row">
                            
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="books_category_id" value="<?=$books_category_id;?>">
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
                    $books_category_id = $_POST["books_category_id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                  

                    $sql = "UPDATE books_category SET name='$name',dd='$dd' WHERE id='$books_category_id'";

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
                    <a class="btn btn-success" href="books?action=category_edit&id=<?=$books_category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="books?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="category_new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="books?action=category_adding" method="post" enctype="multipart/form-data">
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
                   

                    $sql = "INSERT INTO books_category (name,dd) VALUES ('$name','$dd')";

                    if (mysqli_query($conn,$sql))
                    {
                        $books_category_id = mysqli_insert_id($conn);
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
                    <a class="btn btn-success" href="books?action=category_edit&id=<?=$books_category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="books?action=category">Жагсаалт</a>
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