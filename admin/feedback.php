<? require_once("config.php"); ?>
<? require_once("views/helper.php"); ?>
<? require_once("views/login_check.php"); ?>
<? require_once("views/init.php"); ?>


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

    <? if (isset($_GET["action"])) $action = $_GET["action"];
    else $action = "list";
    ?>
    <? require_once("views/header.php"); ?>


    <? require_once("views/topmenu.php"); ?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Санал хүсэлт</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Санал хүсэлт
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
                                <a class="dropdown-item" href="faqs?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Шинэ Асуулт хариулт</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <?
                if ($action == "list") {
                    $count = 1;
                ?>
                    <section>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="bg-gray-700">
                                                <th class="whitespace-no-wrap">№</th>
                                                <th class="whitespace-no-wrap">Нэр</th>
                                                <th class="whitespace-no-wrap">Утас</th>
                                                <th class="whitespace-no-wrap">Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                            $sql = "SELECT *FROM feedback ORDER BY timestamp DESC";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($data = mysqli_fetch_array($result)) {

                                            ?>
                                                    <tr class="hover:bg-gray-400">
                                                        <td><?= $count++; ?></td>
                                                        <td><a href="feedback?action=detail&id=<?= $data["id"]; ?>"><?= $data["name"]; ?></a></td>
                                                        <td><a href="feedback?action=detail&id=<?= $data["id"]; ?>"><?= $data["contact"]; ?></a></td>
                                                        <td>
                                                            <a href="feedback?action=detail&id=<?= $data["id"]; ?>" title="Харах" class="btn btn-primary">
                                                                Харах
                                                            </a>
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
                    </section>
                <?
                }
                ?>

                <?
                if ($action == "detail") 
                {
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <?
                                    if (isset($_GET["id"])) $feedback_id = $_GET["id"];
                                    else header("location:category");
                                    $sql = "SELECT *FROM feedback WHERE id=$feedback_id LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) == 1) {
                                        $data = mysqli_fetch_array($result);
                                    ?>
                                        <div>
                                            <label>Нэр</label> <br>
                                            <?= $data["name"]; ?>
                                        </div>
                                        <div>
                                            <label>Утас</label> <br>
                                            <?= $data["contact"]; ?>
                                        </div>

                                        <div>
                                            <label>Имэйл</label> <br>
                                            <?= $data["email"]; ?>
                                        </div>

                                        <div>
                                            <label>Гарчиг</label> <br>
                                            <?= $data["title"]; ?>
                                        </div>
                                    

                                        <div>
                                            <label>Агуулга</label> <br>
                                            <?= $data["content"]; ?>
                                        </div>
                                    <?
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group">
                        <a href="feedback?action=delete&id=<?= $feedback_id; ?>" class="btn btn-danger"><i class="icon ion-ios-trash"></i> Устгах</a>
                        <a href="feedback" class="btn btn-success">Бусад санал хүсэлт</a>
                    </div>

                    <?
                }
                ?>


                <?
                if ($action == "delete") 
                {
                    ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <?
                                        if (isset($_GET["id"])) $feedback_id = $_GET["id"];
                                        else header("location:category");
                                        $sql = "SELECT *FROM feedback WHERE id=$feedback_id LIMIT 1";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) == 1) {
                                            if (mysqli_query($conn, "DELETE FROM feedback WHERE id=$feedback_id")) {
                                        ?>
                                                <div class="alert alert-success" role="alert">
                                                    <div class="alert-body">
                                                        Амжилттай Устгагдлаа.
                                                    </div>
                                                </div>
                                            <?
                                            } else {
                                            ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <div class="alert-body">
                                                        Алдаа гарлаа. <?= mysqli_error($conn); ?>
                                                    </div>
                                                </div>
                                        <?
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group">
                            <a href="feedback" class="btn btn-success">Бусад санал хүсэлт</a>
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

    <? require_once("views/footer.php"); ?>
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