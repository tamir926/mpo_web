<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>

<body>
    <div class="box-layout">
        <? require_once("views/header.php");?>

        <div class="submenu">
            <div class="container d-flex justify-content-between">
                <h3 class="text-black">Номын сан</h3>
                <ul class="submenu-ul">
                    <?
                    $sql = "SELECT *FROM books_category";
                    $result = mysqli_query($conn,$sql);
                    while ($data = mysqli_fetch_array($result))
                    {
                        ?>
                            <li><a href="library?category=<?=$data["id"];?>"><?=$data["name"];?></a></li>
                        <?
                    }
                    ?>                
                </ul>
            </div>
          
        </div>


        
        <section class="bg-page-header" style="background-image: url('assets/images/magazine_bg.jpg');">
            <div class="page-header-overlay">
                <div class="container">
                    <div class="row">
                        <div class="page-header">
                            <div class="page-title">
                                <h2>Номын сан</h2>
                            </div>
                            <!-- .page-title -->
                            <div class="page-header-content">
                                <ol class="breadcrumb">
                                    <li><a href="index">Нүүр хуудас</a></li>
                                    <li>Номын сан</li>
                                </ol>
                            </div>
                            <!-- .page-header-content -->
                        </div>
                        <!-- .page-header -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </div>
            <!-- .page-header-overlay -->
        </section>
        <!-- End Page Header Section -->

        <?
         if (isset($_GET["category"]))
         $category_id = $_GET["category"];
         else $category_id = 1;
        ?>

        
        <section class="bg-upcoming-events">
            <div class="container">
                
                        <?
                            $sql = "SELECT *FROM books WHERE category='$category_id'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)>0)
                            {
                                $count =1;
                                ?>
                                <table class="table mt-3 border table-hover table-stripe">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Код</th>
                                            <th>Нэр</th>
                                            <th>Хэвлэгдсэн</th>
                                            <th>Зохиогч</th>
                                            <th>Хувь</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        while ($books = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr class="border">
                                                <td ><?=$count++;?></td>
                                                <td><h4><?=$books["code"];?></h4></td>
                                                <td><?=$books["title"];?></td>
                                                <td><?=$books["published"];?></td>
                                                <td><?=$books["editor"];?></td>
                                                <td><?=$books["unit"];?></td>
                                            </tr>
                                            <?
                                        }
                                        ?>       
                                    </tbody> 
                                </table>

                                <?
                            }
                        ?>
                             

                        </div>
                        <!-- .row -->


                    </div>
                    <!-- .upcoming-events -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Upcoming Events Section -->





        <? require_once("views/footer.php");?>


        <!-- Start Scrolling -->
        <div class="scroll-img"><i class="fa fa-angle-up" aria-hidden="true"></i></div>
        <!-- End Scrolling -->
    </div>

    <!-- Start Pre-Loader-->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>
    <!-- End Pre-Loader -->




    <script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins.isotope.js"></script>
    <script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="assets/js/lightcase.js"></script>
    <script type="text/javascript" src="assets/js/jquery.nstSlider.js"></script>
    <script type="text/javascript" src="assets/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/js/custom.isotope.js"></script>
    <script type="text/javascript" src="assets/js/custom.map.js"></script>

    <script type="text/javascript" src="assets/js/custom.js"></script>


</body>

</html>
