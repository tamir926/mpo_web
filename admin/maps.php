<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/login_check.php");?>
<? require_once("views/init.php");?>


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/maps/leaflet.min.css">
    <!-- END: Vendor CSS-->


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/maps/map-leaflet.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->


<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

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
                            <h2 class="content-header-title float-left mb-0">Байршлууд</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Нүүр хуудас</a>
                                    </li>
                                    <li class="breadcrumb-item active">Байршлууд
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="maps-leaflet">
                    <div class="row">
                        <!-- Marker Circle & Polygon Starts -->
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4 class="card-title">Байршлууд</h4>
                                </div>
                                <div class="card-body">
                                    <div class="leaflet-map" id="shape-map"></div>
                                </div>
                            </div>
                        </div>
                        <!-- /Marker Circle & Polygon Ends -->
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <? require_once("views/footer.php");?>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="app-assets/vendors/js/maps/leaflet.min.js"></script>
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
    <script>
        /*=========================================================================================
        File Name: map-leaflet.js
        Description: Leaflet Maps
        ----------------------------------------------------------------------------------------
        Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
        Author: Pixinvent
        Author URL: hhttp://www.themeforest.net/user/pixinvent
        ==========================================================================================*/

        $(function () {
        'use strict';

        var assetsPath = 'app-assets/';

        if ($('body').attr('data-framework') === 'laravel') {
            assetsPath = $('body').attr('data-asset-path');
        }
      
        


        if ($('#shape-map').length) {
            var markerMap = L.map('shape-map').setView([47.917772, 106.9183047], 12);
          
            //var marker = L.marker([47.917772, 106.9183047]).addTo(markerMap);
            //var marker = L.marker([47.927772, 106.9383047]).addTo(markerMap);
            //var marker = L.marker([47.917772, 106.9183047]).addTo(markerMap);
            // var circle = L.circle([47.917772, 106.9183047], {
            // color: 'red',
            // fillColor: '#f03',
            // fillOpacity: 0.5,
            // radius: 500
            // }).addTo(markerMap);
            // var polygon = L.polygon([
            // [51.509, -0.08],
            // [51.503, -0.06],
            // [51.51, -0.047]
            // ]).addTo(markerMap);
            <?
            $sql = "SELECT *FROM positions WHERE location IS NOT NULL";
            $result = mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($result))
            {
                $location = $data["location"];
                $location = str_replace(",",", ",$location);
                if ($location <> "")
                    {
                        ?>
                        var marker = L.marker([<?=$location;?>]).bindPopup('<?=$data["name"];?><br><a href="positions?action=detail&id=<?=$data["id"];?>">дэлгэрэнгүй</a>').addTo(markerMap);
                        <?
                    }
            }
            ?>

            L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: 'Register app data',
            maxZoom: 18
            }).addTo(markerMap);
        }

        

       
        });

    </script>

</body>
<!-- END: Body-->

</html>