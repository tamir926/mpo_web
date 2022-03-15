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
                            <h2 class="content-header-title float-left mb-0">Бүтээдэхүүн</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Бүтээдэхүүн
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
                                <a class="dropdown-item" href="products?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Бүтээдэхүүн нэмэх</span></a>
                                <a class="dropdown-item" href="products?action=category_add"><i class="mr-1" data-feather="bar-chart-2"></i><span class="align-middle">Ангилал нэмэх</span></a>
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
                            $sql = "SELECT *FROM products";
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $product_id = $data["id"];
                                $product_name = $data["name"];
                                $product_barcode = $data["barcode"];
                                $product_comment = $data["comment"];
                                $product_images = $data["images"];
                                $member_id = $data["member_id"];
                                $sql_member = "SELECT *FROM members WHERE id='$member_id'";
                                $result_member = mysqli_query($conn,$sql_member);
                                $data_member = mysqli_fetch_array($result_member);
                                $member_name =$data_member["name"];
                                $member_avatar =$data_member["avatar"];
                                if ($product_images<>"") { $images = explode(",",$product_images); $image=$images[0]; } $image="";

                                if ($image=="") $image="product_images/empty_product.jpg";

                                ?>
                                <div class="col-md-4 col-lg-3">
                                    <div class="card">
                                        <img class="card-img-top" src="../<?=$image;?>" alt="<?=$product_name;?>" />
                                        <div class="card-body">
                                            <h4 class="card-title"><?=$product_name;?></h4>
                                            <p class="card-text">
                                               <?=$product_comment;?>
                                            </p>
                                            <a href="products?action=detail&id=<?=$product_id;?>" class="btn btn-outline-primary">Дэлгэрэнгүй</a>
                                            <a href="products?action=edit&id=<?=$product_id;?>" class="btn btn-outline-success">Засах</a>

                                            <a href="members?action=detail&id=<?=$member_id;?>" class="btn btn-outline-info w-100 mt-1">
                                                <div class="avatar">
                                                    <img src="../<?=$member_avatar;?>" width="34" height="34" alt="Avatar" />
                                                </div>
                                                <?=$member_name;?>
                                            </a>

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
                    $product_id = $_GET["id"];
                    $sql = "SELECT *FROM products WHERE id='$product_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $product_name = $data["name"];
                        $product_barcode = $data["barcode"];
                        $product_comment = $data["comment"];
                        $product_images = $data["images"];

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
                                        <form action="products?action=editing" method="post">
                                            <input type="hidden" name="product_id" value="<?=$product_id;?>">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name" value="<?=$product_name;?>" placeholder="Нэр..." />
                                            </div>

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="pause"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="barcode" value="<?=$product_barcode;?>" placeholder="Баркод..." />
                                            </div>


                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Тайлбар</span>
                                                </div>
                                                <textarea class="form-control" aria-label="With textarea" name="comment"><?=$product_comment;?></textarea>
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
                                        if ($product_images<>"")
                                        {
                                            $images = explode(",",$product_images);
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
                    $product_id = $_POST["product_id"];
                    $name = $_POST["name"];
                    $barcode = $_POST["barcode"];
                    $comment = $_POST["comment"];

                    $sql = "UPDATE products SET name='$name',barcode='$barcode',comment='$comment' WHERE id='$product_id'";


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
                    <a class="btn btn-success" href="products?action=edit&id=<?=$product_id;?>">Засах</a>
                    <a class="btn btn-primary" href="products?action=detail&id=<?=$product_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="products">Жагсаалт</a>
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
                                        <form action="products?action=adding" method="post">
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

                    $sql = "INSERT INTO products (name,barcode,comment,member_id)  VALUES ('$name','$barcode','$comment','$logged_member_id')";

                    if (mysqli_query($conn,$sql))
                    {
                        $product_id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="products?action=edit&id=<?=$product_id;?>">Засах</a>
                    <a class="btn btn-primary" href="products?action=detail&id=<?=$product_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="products">Жагсаалт</a>
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
                            $sql = "SELECT *FROM position_categories ORDER BY dd";
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $category_name = $data["name"];
                                $category_id = $data["id"];
                                ?>
                                <div class="card">
                                    <div class="card-header" data-toggle="collapse" role="button" data-target="#category-<?=$category_id;?>" aria-expanded="false" aria-controls="category-<?=$category_id;?>">
                                        <span class="lead collapse-title"><?=$category_name;?></span> 
                                        <div class="btn-group pull-right">
                                            <a href="products?action=category_edit&id=<?=$category_id;?>" class="btn btn-success btn-sm waves-effect waves-float waves-light"><i data-feather='edit'></i> Засах</a>
                                            <a href="products?action=subcategory_add&id=<?=$category_id;?>" class="btn btn-primary btn-sm waves-effect waves-float waves-light"><i data-feather='plus'></i> Нэмэх</a>
                                        </div>
                                    </div>

                                    <div id="category-<?=$category_id;?>" class="collapse" aria-labelledby="category-<?=$category_id;?>">
                                        <div class="card-body">
                                            <table>
                                                <tbody>
                                                    
                                                        <?
                                                        $sub_sql = "SELECT *FROM subcategories WHERE parent_id='$category_id' ORDER BY dd";
                                                        $sub_result = mysqli_query($conn,$sub_sql);
                                                        while ($sub_data = mysqli_fetch_array($sub_result))
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td><?=$sub_data["name"];?></td>
                                                                <td>
                                                                    <a href="products?action=subcategory_edit&id=<?=$sub_data["id"];?>" class="btn btn-success waves-effect waves-float waves-light"><i data-feather='edit'></i></a>
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
                                        <form action="products?action=category_adding" method="post">
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
                   

                    $sql = "INSERT INTO position_categories (name,dd)  VALUES ('$name','$dd')";

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
                    <a class="btn btn-success" href="products?action=category_edit&id=<?=$category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="products?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="category_edit")
                {
                    $category_id = $_GET["id"];
                    $sql = "SELECT *FROM position_categories WHERE id='$category_id'";
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
                                            <form action="products?action=category_editing" method="post">
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
                   

                    $sql = "UPDATE position_categories SET name='$name',dd='$dd' WHERE id='$category_id'";
                    
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
                    <a class="btn btn-success" href="products?action=category_edit&id=<?=$category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="products?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?  
                if ($action=="subcategory_edit")
                {
                    $subcategory_id = $_GET["id"];
                    $sql = "SELECT *FROM subcategories WHERE id='$subcategory_id'";
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
                                            <form action="products?action=subcategory_editing" method="post">
                                                <input type="hidden" name="id" value="<?=$subcategory_id;?>">

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="flag"></i></span>
                                                    </div>
                                                    <select class="form-control" name="parent_id">
                                                        <?
                                                        $sql = "SELECT *FROM position_categories ORDER BY dd";
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
                   

                    $sql = "UPDATE subcategories SET name='$name',dd='$dd' WHERE id='$subcategory_id'";
                    
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
                    <a class="btn btn-success" href="products?action=subcategory_edit&id=<?=$subcategory_id;?>">Засах</a>
                    <a class="btn btn-primary" href="products?action=category">Жагсаалт</a>
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
                                        <form action="products?action=subcategory_adding" method="post">
                                            <input type="hidden" name="id" value="<?=$subcategory_id;?>">

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="flag"></i></span>
                                                </div>
                                                <select class="form-control" name="parent_id">
                                                    <?
                                                    $sql = "SELECT *FROM position_categories ORDER BY dd";
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
                   

                    $sql = "INSERT INTO subcategories (name,dd,parent_id) VALUES ('$name','$dd','$parent_id')";
                    
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
                    <a class="btn btn-success" href="products?action=subcategory_edit&id=<?=$subcategory_id;?>">Засах</a>
                    <a class="btn btn-primary" href="products?action=category">Жагсаалт</a>
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
                            $sql = "SELECT *FROM forms ORDER BY dd";
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
                                            <a href="products?action=form_edit&id=<?=$form_id;?>" class="btn btn-success btn-sm waves-effect waves-float waves-light"><i data-feather='edit'></i> Засах</a>
                                            <a href="products?action=formresponce_add&id=<?=$form_id;?>" class="btn btn-primary btn-sm waves-effect waves-float waves-light"><i data-feather='plus'></i> Нэмэх</a>
                                        </div>
                                    </div>

                                    <div id="category-<?=$form_id;?>" class="collapse" aria-labelledby="category-<?=$form_id;?>">
                                        <div class="card-body">
                                            <table>
                                                <tbody>
                                                    
                                                        <?
                                                        $sub_sql = "SELECT *FROM formresponces WHERE form_id='$form_id' ORDER BY dd";
                                                        $sub_result = mysqli_query($conn,$sub_sql);
                                                        while ($sub_data = mysqli_fetch_array($sub_result))
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td><?=$sub_data["name"];?></td>
                                                                <td>
                                                                    <a href="products?action=formresponce_edit&id=<?=$sub_data["id"];?>" class="btn btn-success waves-effect waves-float waves-light"><i data-feather='edit'></i></a>
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
                                        <form action="products?action=form_adding" method="post">
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
                   

                    $sql = "INSERT INTO forms (name,dd)  VALUES ('$name','$dd')";

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
                    <a class="btn btn-success" href="products?action=form_edit&id=<?=$form_id;?>">Засах</a>
                    <a class="btn btn-primary" href="products?action=form">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="form_edit")
                {
                    $form_id = $_GET["id"];
                    $sql = "SELECT *FROM forms WHERE id='$form_id'";
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
                                            <form action="products?action=form_editing" method="post">
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
                        <a href="products?action=form_delete&id=<?=$form_id;?>" class="btn btn-danger waves-effect waves-float waves-light mt-1">Устгах</a>
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
                   

                    $sql = "UPDATE forms SET name='$name',dd='$dd' WHERE id='$form_id'";
                    
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
                    <a class="btn btn-success" href="products?action=form_edit&id=<?=$form_id;?>">Засах</a>
                    <a class="btn btn-primary" href="products?action=form">Жагсаалт</a>
                    <?
                    
                }
                ?>


                <?
                if ($action=="form_delete")
                {
                    $form_id = $_GET["id"];
                    $sql = "DELETE FROM forms WHERE id='$form_id'";
                    $sql2 = "DELETE FROM formresponces WHERE form_id='$form_id'";

                    
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
                    <a class="btn btn-primary" href="products?action=form">Жагсаалт</a>
                    <?          
                }
                ?>



                <?  
                if ($action=="formresponce_edit")
                {
                    $responce_id = $_GET["id"];
                    $sql = "SELECT *FROM formresponces WHERE id='$responce_id'";
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
                                            <form action="products?action=formresponce_editing" method="post">
                                                <input type="hidden" name="id" value="<?=$responce_id;?>">

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="flag"></i></span>
                                                    </div>
                                                    <select class="form-control" name="form_id">
                                                        <?
                                                        $sql = "SELECT *FROM forms ORDER BY dd";
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
                        <a href="products?action=formresponce_delete&id=<?=$responce_id;?>" class="btn btn-danger waves-effect waves-float waves-light mt-1">Устгах</a>
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
                   

                    $sql = "UPDATE formresponces SET name='$name',dd='$dd',form_id='$form_id' WHERE id='$responce_id'";
                    
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
                    <a class="btn btn-success" href="products?action=formresponce_edit&id=<?=$responce_id;?>">Засах</a>
                    <a class="btn btn-primary" href="products?action=form">Жагсаалт</a>
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
                                        <form action="products?action=formresponce_adding" method="post">

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="flag"></i></span>
                                                </div>
                                                <select class="form-control" name="form_id">
                                                    <?
                                                    $sql = "SELECT *FROM forms ORDER BY dd";
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
                   

                    $sql = "INSERT INTO formresponces (name,dd,form_id) VALUES ('$name','$dd','$form_id')";
                    
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
                    <a class="btn btn-success" href="products?action=formresponce_edit&id=<?=$responce_id;?>">Засах</a>
                    <a class="btn btn-primary" href="products?action=form">Жагсаалт</a>
                    <?
                }
                ?>

                <?  
                if ($action=="formresponce_delete")
                {
                    $responce_id = $_GET["id"];
                    $sql = "SELECT *FROM formresponces WHERE id='$responce_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $sql = "DELETE FROM formresponces WHERE id='$responce_id'";
                    
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
                    <a class="btn btn-primary" href="products?action=form">Жагсаалт</a>
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