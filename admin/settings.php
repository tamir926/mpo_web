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
    <? if ($_GET["action"]) $action=$_GET["action"]; else $action="list"; 
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
                            <h2 class="content-header-title float-left mb-0">Тохиргоо</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Тохиргоо
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
                                <a class="dropdown-item" href="positions?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Бүртгэх</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <? 
                if ($action=="list")
                {
                    ?><!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                        <th class="wd-5p">№</th>
                                        <th class="wd-30p">Нэр</th>
                                        <th class="wd-40p">Утга</th>
                                        <th class="wd-10p">Зассан</th>
                                        <th class="wd-5p">-</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $count =1;
                                        $sql = "SELECT *FROM settings ORDER BY name DESC";
                                        $result = mysqli_query($conn,$sql);
                                        if (mysqli_num_rows($result)>0)
                                        {
                                        while ($data = mysqli_fetch_array($result))
                                        {

                                            ?>
                                            <tr>
                                            <td><?=$count++;?></td>
                                            <td><h4><?=$data["name"];?></h4>
                                                <i><?=$data["description"];?></i>
                                            </td>
                                            <td><?
                                            if ($data["type"]=="t") echo $data["value"];
                                            if ($data["type"]=="c") echo $data["value"];
                                            if ($data["type"]=="i" &&  $data["value"]<>"") echo "<img src='../". $data["value"]."' style='max-width:60px; max-height:60px;'>";
                                            if ($data["type"]=="f" &&  $data["value"]<>"") echo "<a href='". $data["value"]."' target='new' class='btn btn-success'>Татах</a>";
                                            if ($data["type"]=="b") 
                                                if ($data["value"]) echo "<span class='tx-14 tx-success'>On</span>"; else echo "<span class='tx-14 tx-danger'>Off</span>";

                                            ?></td>
                                            <td><?=substr($data["update_date"],0,10);?></td>
                                            <td class="tx-18">
                                                <div class="btn-group">
                                                   
                                                    <a href="settings?action=edit&id=<?=$data["id"];?>"  class="btn btn-success btn-icon" title="Засах"><i data-feather='edit'></i></a>
                                                </div>
                                            </td>
                                            </tr>
                                            <?
                                        }
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
                    <!--/ Basic table -->
                    <?
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $settings_id = $_GET["id"];
                    $sql = "SELECT *FROM settings WHERE id=$settings_id LIMIT 1";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        ?>
                       
                        <section id="input-group-basic">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Засах</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="settings.php?action=editing" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?=$data["id"];?>">
                                                <input type="hidden" name="type" value="<?=$data["type"];?>">
                                                <div class="media-list mg-t-25">
                                                    <div class="media">
                                                    <div class="media-body mg-l-15 mg-t-4">
                                                        <h6 class="tx-14 tx-gray-700">Нэр</h6>
                                                        <input type="text" name="name" value="<?=$data["name"];?>" class="form-control" readonly="readonly">
                                                    </div><!-- media-body -->
                                                    </div><!-- media -->
                                                    <div class="media mg-t-25">
                                                    <div class="media-body mg-l-15 mg-t-4">
                                                        <h6 class="tx-14 tx-gray-700">Тайлбар (*)</h6>
                                                        <input type="text" name="description" value="<?=$data["description"];?>" class="form-control" required="required">
                                                    </div><!-- media-body -->
                                                    </div><!-- media -->
                                                    <div class="media mg-t-25">
                                                    <div class="media-body mg-l-15 mg-t-4">
                                                        <h6 class="tx-14 tx-gray-700">Утга (*) </h6>
                                                        <?
                                                        if ($data["type"]=="t")
                                                        {
                                                        ?>
                                                        <input type="text" name="value" value="<?=$data["value"];?>" class="form-control">
                                                        <?
                                                        };

                                                        if ($data["type"]=="c")
                                                        {
                                                        ?>
                                                            <textarea class="form-control" name="value"><?=$data["value"];?></textarea>
                                                        <?
                                                        };


                                                        if ($data["type"]=="i")
                                                        {
                                                        if ($data["value"]<>"") 
                                                        {
                                                            ?>
                                                            <img src="../<?=$data["value"];?>" style="max-width:100%;">
                                                            <?
                                                        };
                                                        ?>
                                                            <br>
                                                        <input type="file" name="value">
                                                        <?
                                                        };
                                                        

                                                        if ($data["type"]=="f")
                                                        {
                                                        if ($data["value"]<>"") 
                                                        {
                                                            ?>
                                                            <a href="../<?=$data["value"];?>" target="new" class="btn btn-warning">Татах</a>
                                                            <?
                                                        };
                                                        ?>
                                                            <br>
                                                        <input type="file" name="value">
                                                        <?
                                                        };

                                                        if ($data["type"]=="b")
                                                        {
                                                        ?>
                                                            <div class="toggle-wrapper">
                                                            <input type="hidden" name="value" value="<?=$data["value"];?>" id="value">
                                                            <div class="toggle toggle-light success" id="toggle"></div>
                                                            </div>
                                                        <?
                                                        };


                                                        ?>
                                                        

                                                    
                                                    </div><!-- media-body -->
                                                    </div><!-- media -->
                                                    

                                                </div><!-- media-list -->
                                                    
                                                    
                                                <div class="clearfix"></div><br>

                                                <div class="btn-group">
                                                    <input type="submit" class="btn btn-success" value="Хадгалах">
                                                    <a href="settings.php" class="btn btn-primary"><i class="icon ion-ios-list"></i> Бусад тохиргоо</a>
                                                </div>
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
                if ($action=="editing")
                {
                      if (isset($_POST["id"])) $settings_id=$_POST["id"]; else header("location:settings.php");
                      $type = $_POST["type"];

                      if ($type=="t") $value = $_POST["value"];
                      if ($type=="c") $value = $_POST["value"];
                      if ($type=="b") $value = $_POST["value"];
                      if ($type=="i")
                      {   
                          $value="";
                          if(isset($_FILES['value']) && $_FILES['value']['name']!="")
                          {
                            @$folder = date("Ym");
                            if(!file_exists('../uploads/'.$folder))
                            mkdir ( '../uploads/'.$folder);
                            $target_dir = '../uploads/'.$folder;
                            $target_file = $target_dir."/".@date("his").rand(0,1000).$settings_id.substr(basename($_FILES["value"]["name"]),-4,4);
                            if (move_uploaded_file($_FILES['value']['tmp_name'], $target_file))
                              $thumb_image_content = resize_image($target_file,300,300);
                              $thumb = substr($target_file,0,-4)."_thumb".substr($target_file,-4,4);
                              imagejpeg($thumb_image_content,$thumb,75);
                              //$target_file = substr($target_file,3);
                              //$thumb = substr($thumb,3);
                            $value=$thumb;
                            if (substr($value,0,3)=="../") $value=substr($value,3);

                          }
                      } 

                      if ($type=="f")
                      {   
                          $value="";
                          if(isset($_FILES['value']) && $_FILES['value']['name']!="")
                          {
                            @$folder = date("Ym");
                            if(!file_exists('../uploads/'.$folder))
                            mkdir ( '../uploads/'.$folder);
                            $target_dir = '../uploads/'.$folder;
                            $target_file = $target_dir."/".@date("his").rand(0,1000).$settings_id.substr(basename($_FILES["value"]["name"]),-4,4);
                            if (move_uploaded_file($_FILES['value']['tmp_name'], $target_file))
                            $value=$target_file;
                            if (substr($value,0,3)=="../") $value=substr($value,3);
                          }
                      } 
                      $description = $_POST["description"];
                      //if ($value=="")
                      //  $sql = "UPDATE settings SET description='$description' WHERE id=$settings_id LIMIT 1";
                     // if ($value<>"")
                    $sql = "UPDATE settings SET value='$value', description='$description' WHERE id=$settings_id LIMIT 1";
                       //  echo $sql;
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
                      <div class="btn-group">
                        <a href="settings.php?action=edit&id=<?=$settings_id;?>" class="btn btn-success"><i class="icon ion-edit"></i> Засах</a>
                        <a href="settings.php" class="btn btn-primary"><i class="icon ion-ios-list"></i> Бусад тохиргоо</a>
                      </div>   
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
    <script src="app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="app-assets/vendors/js/maps/leaflet.min.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/tables/table-datatables-basic.js"></script>
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