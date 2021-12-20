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
                            <h2 class="content-header-title float-left mb-0">Хуудас</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Хуудас
                                    </li>
                                </ol>
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
                                                <th>Нэр</th>
                                                <th>Шинэчлэгдсэн</th>
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT *FROM pages";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td><?=substr($data["timestamp"],0,10);?></td>
                                                        <td>
                                                            <a class="btn btn-success" href="pages?action=edit&id=<?=$data["page_id"];?>">Засах</a>
                                                            <a class="btn btn-primary" href="pages?action=detail&id=<?=$data["page_id"];?>">Дэлгэрэнгүй</a>
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
                    <?
                }
                ?>

                <?
                if ($action == "detail")
                {
                    $page_id = $_GET["id"];
                  
                            $sql = "SELECT *
                            FROM pages WHERE page_id='$page_id'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)==1)
                            {
                                $data = mysqli_fetch_array($result);                            
                                $page_name = $data["name"];
                                $page_content = $data["content"];
                                $page_timestamp = $data["timestamp"];

                                ?>
                                <div class="blog-detail-wrapper">
                                    <div class="row">
                                        <!-- Blog -->
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?=$page_name;?></h4>
                                                   
                                                       <?=$page_content;?>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a href="page?action=edit&id=<?=$page_id;?>" class="btn btn-success">Засах</a>
                                    <a href="page?action=list" class="btn btn-primary">Жагсаалт</a>
                                </div>
                                <?
                            }
                            else 
                            {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                    Хуудас олдсонгүй
                                    </div>
                                </div>
                                <?
                            }
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $page_id = $_GET["id"];
                    $sql = "SELECT *FROM pages WHERE page_id='$page_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $page_name = $data["name"];
                        $page_content = $data["content"];
                        $page_timestamp = $data["timestamp"];
                       

                        ?>
                        <section id="input-group-basic">
                            <form action="page?action=editing" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="page_id" value="<?=$page_id;?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                           
                                            <div class="card-body">
                                               
                                                <div class="input-group mt-2 mb-2">
                                                    <input type="text" name="name" class="form-control" value="<?=$page_name;?>">
                                                </div>


                                                <div class="input-group mt-2 mb-2">
                                                    <textarea class="form-control"  name="content" id="editor"><?=$page_content;?></textarea>
                                                </div>

                                                
                                            </div>

                                            

                                        </div>
                                    </div>

                                </div>
                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Хадгалах">

                            </form>
                        </section>
                    <?
                    }
                    else header("location:page?action=list");
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $page_id = $_POST["page_id"];
                    $name = $_POST["name"];
                    $content = mysqli_escape_string($conn,$_POST["content"]);

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
                                $sql = "UPDATE pages SET image='$target_file' WHERE page_id='$page_id'";

                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE pages SET name='$name',content='$content' WHERE page_id='$page_id'";


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
                    <a class="btn btn-success" href="page?action=edit&id=<?=$page_id;?>">Засах</a>
                    <a class="btn btn-primary" href="page?action=detail&id=<?=$page_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="page?action=list">Бүх Хуудас</a>
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