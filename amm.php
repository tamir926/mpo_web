<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>

<body class="contact-page pc">
    <div class="box-layout">
        <? require_once("views/header.php");?>

        <? require_once("views/submenu_assessment.php");?>

        <!-- Start Campaign Section -->
        <section class="bg-campaing-section">
            <div class="container">
                <div class="row">
                            <div class="col-lg-12">
                                <h3>ММ-ийн одоогийн түвшний үнэлгээ: ДАВУУ ТАЛ БА САЙЖРУУЛАХ БОЛОМЖУУДЫН МАТРИЦ</h3>
                                <?
                                if (isset($_GET["id"]))
                                {
                                    $link = protect(($_GET["id"]));
                                    $sql = "SELECT *FROM assessment_mm_link WHERE link='$link'";
                                    $result = mysqli_query($conn,$sql);
                                    if (mysqli_num_rows($result)==1)
                                    {
                                        $data = mysqli_fetch_array($result);
                                        $member_id = $data["member_id"];
                                        if (!empty($_POST))
                                        {
                                            $mm_adv_1 =  mysqli_escape_string($conn,protect($_POST["mm_adv_1"])); $mm_opp_1 =   mysqli_escape_string($conn,protect($_POST["mm_opp_1"]));$mm_score_1 =   mysqli_escape_string($conn,protect($_POST["mm_score_1"]));
                                            $mm_adv_2 =  mysqli_escape_string($conn,protect($_POST["mm_adv_2"]));$mm_opp_2 =   mysqli_escape_string($conn,protect($_POST["mm_opp_2"]));$mm_score_2 =   mysqli_escape_string($conn,protect($_POST["mm_score_2"]));
                                            $mm_adv_3 =  mysqli_escape_string($conn,protect($_POST["mm_adv_3"]));$mm_opp_3 =   mysqli_escape_string($conn,protect($_POST["mm_opp_3"]));$mm_score_3 =   mysqli_escape_string($conn,protect($_POST["mm_score_3"]));
                                            $mm_adv_4 =  mysqli_escape_string($conn,protect($_POST["mm_adv_4"]));$mm_opp_4 =   mysqli_escape_string($conn,protect($_POST["mm_opp_4"]));$mm_score_4 =   mysqli_escape_string($conn,protect($_POST["mm_score_4"]));
                                            $mm_adv_5 =  mysqli_escape_string($conn,protect($_POST["mm_adv_5"]));$mm_opp_5 =   mysqli_escape_string($conn,protect($_POST["mm_opp_5"]));$mm_score_5 =   mysqli_escape_string($conn,protect($_POST["mm_score_5"]));
                                            $mm_adv_6 =  mysqli_escape_string($conn,protect($_POST["mm_adv_6"]));$mm_opp_6 =   mysqli_escape_string($conn,protect($_POST["mm_opp_6"]));$mm_score_6 =   mysqli_escape_string($conn,protect($_POST["mm_score_6"]));
                                            $mm_adv_7 =  mysqli_escape_string($conn,protect($_POST["mm_adv_7"]));$mm_opp_7 =   mysqli_escape_string($conn,protect($_POST["mm_opp_7"]));$mm_score_7 =   mysqli_escape_string($conn,protect($_POST["mm_score_7"]));
                                            $mm_adv_8 =  mysqli_escape_string($conn,protect($_POST["mm_adv_8"]));$mm_opp_8 =   mysqli_escape_string($conn,protect($_POST["mm_opp_8"]));$mm_score_8 =   mysqli_escape_string($conn,protect($_POST["mm_score_8"]));
                                            $mm_adv_9 =  mysqli_escape_string($conn,protect($_POST["mm_adv_9"]));$mm_opp_9 =   mysqli_escape_string($conn,protect($_POST["mm_opp_9"]));$mm_score_9 =   mysqli_escape_string($conn,protect($_POST["mm_score_9"]));
                                            $mm_adv_10 = mysqli_escape_string($conn,protect($_POST["mm_adv_10"]));$mm_opp_10 = mysqli_escape_string($conn,protect($_POST["mm_opp_10"]));$mm_score_10 = mysqli_escape_string($conn,protect($_POST["mm_score_10"]));
        
                                            $mm_adv_11 =  mysqli_escape_string($conn,protect($_POST["mm_adv_11"]));$mm_opp_11 =   mysqli_escape_string($conn,protect($_POST["mm_opp_11"]));$mm_score_11 =   mysqli_escape_string($conn,protect($_POST["mm_score_11"]));
                                            $mm_adv_12 =  mysqli_escape_string($conn,protect($_POST["mm_adv_12"]));$mm_opp_12 =   mysqli_escape_string($conn,protect($_POST["mm_opp_12"]));$mm_score_12 =   mysqli_escape_string($conn,protect($_POST["mm_score_12"]));
                                            $mm_adv_13 =  mysqli_escape_string($conn,protect($_POST["mm_adv_13"]));$mm_opp_13 =   mysqli_escape_string($conn,protect($_POST["mm_opp_13"]));$mm_score_13 =   mysqli_escape_string($conn,protect($_POST["mm_score_13"]));
                                            $mm_adv_14 =  mysqli_escape_string($conn,protect($_POST["mm_adv_14"]));$mm_opp_14 =   mysqli_escape_string($conn,protect($_POST["mm_opp_14"]));$mm_score_14 =   mysqli_escape_string($conn,protect($_POST["mm_score_14"]));
                                            $mm_adv_15 =  mysqli_escape_string($conn,protect($_POST["mm_adv_15"]));$mm_opp_15 =   mysqli_escape_string($conn,protect($_POST["mm_opp_15"]));$mm_score_15 =   mysqli_escape_string($conn,protect($_POST["mm_score_15"]));
                                            $mm_adv_16 =  mysqli_escape_string($conn,protect($_POST["mm_adv_16"]));$mm_opp_16 =   mysqli_escape_string($conn,protect($_POST["mm_opp_16"]));$mm_score_16 =   mysqli_escape_string($conn,protect($_POST["mm_score_16"]));
                                            $mm_adv_17 =  mysqli_escape_string($conn,protect($_POST["mm_adv_17"]));$mm_opp_17 =   mysqli_escape_string($conn,protect($_POST["mm_opp_17"]));$mm_score_17 =   mysqli_escape_string($conn,protect($_POST["mm_score_17"]));
                                            $mm_adv_18 =  mysqli_escape_string($conn,protect($_POST["mm_adv_18"]));$mm_opp_18 =   mysqli_escape_string($conn,protect($_POST["mm_opp_18"]));$mm_score_18 =   mysqli_escape_string($conn,protect($_POST["mm_score_18"]));
                                            $mm_adv_19 =  mysqli_escape_string($conn,protect($_POST["mm_adv_19"]));$mm_opp_19 =   mysqli_escape_string($conn,protect($_POST["mm_opp_19"]));$mm_score_19 =   mysqli_escape_string($conn,protect($_POST["mm_score_19"]));
                                            $mm_adv_20 =  mysqli_escape_string($conn,protect($_POST["mm_adv_20"]));$mm_opp_20 =   mysqli_escape_string($conn,protect($_POST["mm_opp_20"]));$mm_score_20 =   mysqli_escape_string($conn,protect($_POST["mm_score_20"]));
        
                                            $mm_adv_21 =  mysqli_escape_string($conn,protect($_POST["mm_adv_21"]));$mm_opp_21 =   mysqli_escape_string($conn,protect($_POST["mm_opp_21"]));$mm_score_21 =   mysqli_escape_string($conn,protect($_POST["mm_score_21"]));
                                            $mm_adv_22 =  mysqli_escape_string($conn,protect($_POST["mm_adv_22"]));$mm_opp_22 =   mysqli_escape_string($conn,protect($_POST["mm_opp_22"]));$mm_score_22 =   mysqli_escape_string($conn,protect($_POST["mm_score_22"]));
                                            $mm_adv_23 =  mysqli_escape_string($conn,protect($_POST["mm_adv_23"]));$mm_opp_23 =   mysqli_escape_string($conn,protect($_POST["mm_opp_23"]));$mm_score_23 =   mysqli_escape_string($conn,protect($_POST["mm_score_23"]));
                                            $mm_adv_24 =  mysqli_escape_string($conn,protect($_POST["mm_adv_24"]));$mm_opp_24 =   mysqli_escape_string($conn,protect($_POST["mm_opp_24"]));$mm_score_24 =   mysqli_escape_string($conn,protect($_POST["mm_score_24"]));
                                            $mm_adv_25 =  mysqli_escape_string($conn,protect($_POST["mm_adv_25"]));$mm_opp_25 =   mysqli_escape_string($conn,protect($_POST["mm_opp_25"]));$mm_score_25 =   mysqli_escape_string($conn,protect($_POST["mm_score_25"]));
                                            $mm_adv_26 =  mysqli_escape_string($conn,protect($_POST["mm_adv_26"]));$mm_opp_26 =   mysqli_escape_string($conn,protect($_POST["mm_opp_26"]));$mm_score_26 =   mysqli_escape_string($conn,protect($_POST["mm_score_26"]));
                                            $mm_adv_27 =  mysqli_escape_string($conn,protect($_POST["mm_adv_27"]));$mm_opp_27 =   mysqli_escape_string($conn,protect($_POST["mm_opp_27"]));$mm_score_27 =   mysqli_escape_string($conn,protect($_POST["mm_score_27"]));
                                            $mm_adv_28 =  mysqli_escape_string($conn,protect($_POST["mm_adv_28"]));$mm_opp_28 =   mysqli_escape_string($conn,protect($_POST["mm_opp_28"]));$mm_score_28 =   mysqli_escape_string($conn,protect($_POST["mm_score_28"]));
                                            $mm_adv_29 =  mysqli_escape_string($conn,protect($_POST["mm_adv_29"]));$mm_opp_29 =   mysqli_escape_string($conn,protect($_POST["mm_opp_29"]));$mm_score_29 =   mysqli_escape_string($conn,protect($_POST["mm_score_29"]));
                                            $mm_adv_30 =  mysqli_escape_string($conn,protect($_POST["mm_adv_30"]));$mm_opp_30 =   mysqli_escape_string($conn,protect($_POST["mm_opp_30"]));$mm_score_30 =   mysqli_escape_string($conn,protect($_POST["mm_score_30"]));
        
                                            $mm_adv_31 =  mysqli_escape_string($conn,protect($_POST["mm_adv_31"]));$mm_opp_31 =   mysqli_escape_string($conn,protect($_POST["mm_opp_31"]));$mm_score_31 =   mysqli_escape_string($conn,protect($_POST["mm_score_31"]));
                                            $mm_adv_32 =  mysqli_escape_string($conn,protect($_POST["mm_adv_32"]));$mm_opp_32 =   mysqli_escape_string($conn,protect($_POST["mm_opp_32"]));$mm_score_32 =   mysqli_escape_string($conn,protect($_POST["mm_score_32"]));
                                            $mm_adv_33 =  mysqli_escape_string($conn,protect($_POST["mm_adv_33"]));$mm_opp_33 =   mysqli_escape_string($conn,protect($_POST["mm_opp_33"]));$mm_score_33 =   mysqli_escape_string($conn,protect($_POST["mm_score_33"]));
                                            $mm_adv_34 =  mysqli_escape_string($conn,protect($_POST["mm_adv_34"]));$mm_opp_34 =   mysqli_escape_string($conn,protect($_POST["mm_opp_34"]));$mm_score_34 =   mysqli_escape_string($conn,protect($_POST["mm_score_34"]));
                                            $mm_adv_35 =  mysqli_escape_string($conn,protect($_POST["mm_adv_35"]));$mm_opp_35 =   mysqli_escape_string($conn,protect($_POST["mm_opp_35"]));$mm_score_35 =   mysqli_escape_string($conn,protect($_POST["mm_score_35"]));
                                            $mm_adv_36 =  mysqli_escape_string($conn,protect($_POST["mm_adv_36"]));$mm_opp_36 =   mysqli_escape_string($conn,protect($_POST["mm_opp_36"]));$mm_score_36 =   mysqli_escape_string($conn,protect($_POST["mm_score_36"]));
                                            $mm_adv_37 =  mysqli_escape_string($conn,protect($_POST["mm_adv_37"]));$mm_opp_37 =   mysqli_escape_string($conn,protect($_POST["mm_opp_37"]));$mm_score_37 =   mysqli_escape_string($conn,protect($_POST["mm_score_37"]));
                                            $mm_adv_38 =  mysqli_escape_string($conn,protect($_POST["mm_adv_38"]));$mm_opp_38 =   mysqli_escape_string($conn,protect($_POST["mm_opp_38"]));$mm_score_38 =   mysqli_escape_string($conn,protect($_POST["mm_score_38"]));
                                            $mm_adv_39 =  mysqli_escape_string($conn,protect($_POST["mm_adv_39"]));$mm_opp_39 =   mysqli_escape_string($conn,protect($_POST["mm_opp_39"]));$mm_score_39 =   mysqli_escape_string($conn,protect($_POST["mm_score_39"]));
                                            $mm_adv_40 =  mysqli_escape_string($conn,protect($_POST["mm_adv_40"]));$mm_opp_40 =   mysqli_escape_string($conn,protect($_POST["mm_opp_40"]));$mm_score_40 =   mysqli_escape_string($conn,protect($_POST["mm_score_40"]));
        
                                            $mm_adv_41 =  mysqli_escape_string($conn,protect($_POST["mm_adv_41"]));$mm_opp_41 =   mysqli_escape_string($conn,protect($_POST["mm_opp_41"]));$mm_score_41 =   mysqli_escape_string($conn,protect($_POST["mm_score_41"]));
                                            $mm_adv_42 =  mysqli_escape_string($conn,protect($_POST["mm_adv_42"]));$mm_opp_42 =   mysqli_escape_string($conn,protect($_POST["mm_opp_42"]));$mm_score_42 =   mysqli_escape_string($conn,protect($_POST["mm_score_42"]));
                                            
                                            $answer1 = $mm_score_1."|".$mm_adv_1."|".$mm_opp_1;
                                            $answer2 = $mm_score_2."|".$mm_adv_2."|".$mm_opp_2;
                                            $answer3 = $mm_score_3."|".$mm_adv_3."|".$mm_opp_3;
                                            $answer4 = $mm_score_4."|".$mm_adv_4."|".$mm_opp_4;
                                            $answer5 = $mm_score_5."|".$mm_adv_5."|".$mm_opp_5;
                                            $answer6 = $mm_score_6."|".$mm_adv_6."|".$mm_opp_6;
                                            $answer7 = $mm_score_7."|".$mm_adv_7."|".$mm_opp_7;
                                            $answer8 = $mm_score_8."|".$mm_adv_8."|".$mm_opp_8;
                                            $answer9 = $mm_score_9."|".$mm_adv_9."|".$mm_opp_9;
                                            $answer10 = $mm_score_10."|".$mm_adv_10."|".$mm_opp_10;
                                            $answer11 = $mm_score_11."|".$mm_adv_11."|".$mm_opp_11;
                                            $answer12 = $mm_score_12."|".$mm_adv_12."|".$mm_opp_12;
                                            $answer13 = $mm_score_13."|".$mm_adv_13."|".$mm_opp_13;
                                            $answer14 = $mm_score_14."|".$mm_adv_14."|".$mm_opp_14;
                                            $answer15 = $mm_score_15."|".$mm_adv_15."|".$mm_opp_15;
                                            $answer16 = $mm_score_16."|".$mm_adv_16."|".$mm_opp_16;
                                            $answer17 = $mm_score_17."|".$mm_adv_17."|".$mm_opp_17;
                                            $answer18 = $mm_score_18."|".$mm_adv_18."|".$mm_opp_18;
                                            $answer19 = $mm_score_19."|".$mm_adv_19."|".$mm_opp_19;
                                            $answer20 = $mm_score_20."|".$mm_adv_20."|".$mm_opp_20;
                                            $answer21 = $mm_score_21."|".$mm_adv_21."|".$mm_opp_21;
                                            $answer22 = $mm_score_22."|".$mm_adv_22."|".$mm_opp_22;
                                            $answer23 = $mm_score_23."|".$mm_adv_23."|".$mm_opp_23;
                                            $answer24 = $mm_score_24."|".$mm_adv_24."|".$mm_opp_24;
                                            $answer25 = $mm_score_25."|".$mm_adv_25."|".$mm_opp_25;
                                            $answer26 = $mm_score_26."|".$mm_adv_26."|".$mm_opp_26;
                                            $answer27 = $mm_score_27."|".$mm_adv_27."|".$mm_opp_27;
                                            $answer28 = $mm_score_28."|".$mm_adv_28."|".$mm_opp_28;
                                            $answer29 = $mm_score_29."|".$mm_adv_29."|".$mm_opp_29;
                                            $answer30 = $mm_score_30."|".$mm_adv_30."|".$mm_opp_30;
                                            $answer31 = $mm_score_31."|".$mm_adv_31."|".$mm_opp_31;
                                            $answer32 = $mm_score_32."|".$mm_adv_32."|".$mm_opp_32;
                                            $answer33 = $mm_score_33."|".$mm_adv_33."|".$mm_opp_33;
                                            $answer34 = $mm_score_34."|".$mm_adv_34."|".$mm_opp_34;
                                            $answer35 = $mm_score_35."|".$mm_adv_35."|".$mm_opp_35;
                                            $answer36 = $mm_score_36."|".$mm_adv_36."|".$mm_opp_36;
                                            $answer37 = $mm_score_37."|".$mm_adv_37."|".$mm_opp_37;
                                            $answer38 = $mm_score_38."|".$mm_adv_38."|".$mm_opp_38;
                                            $answer39 = $mm_score_39."|".$mm_adv_39."|".$mm_opp_39;
                                            $answer40 = $mm_score_40."|".$mm_adv_40."|".$mm_opp_40;
                                            $answer41 = $mm_score_41."|".$mm_adv_41."|".$mm_opp_41;
                                            $answer42 = $mm_score_42."|".$mm_adv_42."|".$mm_opp_42;

                                            $sql ="INSERT INTO assessment_mm (member_id,answer1,answer2,answer3,answer4,answer5,answer6,answer7,answer8,answer9,answer10,answer11,answer12,answer13,answer14,answer15,answer16,answer17,answer18,answer19,answer20,answer21,answer22,answer23,answer24,answer25,answer26,answer27,answer28,answer29,answer30,answer31,answer32,answer33,answer34,answer35,answer36,answer37,answer38,answer39,answer40,answer41,answer42)
                                            VALUE ('$member_id','$answer1','$answer2','$answer3','$answer4','$answer5','$answer6','$answer7','$answer8','$answer9','$answer10','$answer11','$answer12','$answer13','$answer14','$answer15','$answer16','$answer17','$answer18','$answer19','$answer20','$answer21','$answer22','$answer23','$answer24','$answer25','$answer26','$answer27','$answer28','$answer29','$answer30','$answer31','$answer32','$answer33','$answer34','$answer35','$answer36','$answer37','$answer38','$answer39','$answer40','$answer41','$answer42')";
                                            if (mysqli_query($conn,$sql))
                                            {
                                                ?>
                                                <div class="alert alert-success">Хариултыг хүлээн авлаа. Баярлалаа</div>

                                                <?
                                            }
                                            else 
                                            {
                                                echo mysqli_error($conn);
                                                ?>
                                                <div class="alert alert-danger">Алдаа гарлаа та ахин оролдоно уу</div>
                                                <?                  
                                            }
                                            ?>
                                            
                                            
        
                                            <div class="text-center">
                                                <a href="amm?id=<?=$link;?>" class="btn btn-default btn-lg">Ахин үнэлэх</a>
                                            </div>

                                           <?
                                        }
                                        else 
                                        {
                                            ?>
                                            <div class="contacts">
                                                <form method="post" action="amm?id=<?=$link;?>"  id="feedback-form" class="contact-form clear">
        
                                                    <table class="table table-responsive mpo_assessment">
                                                        <thead>
                                                            <tr>
                                                                <th>№</th><th width="50%">Талбар 1.0: МM Манлайлал</th><th>Давуу тал</th><th>Сайжруулах боломж</th><th>Оноо (1–5)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Байгууллага нь хүн бүрт хүрсэн мэдлэгийн алсын хараа, стратегитай ба тэр нь байгууллагын алсын хараа, эрхэм зорилго, зорилготой нягт нийцсэн байдал</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_1"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_1"></td>
                                                                <td>
                                                                    <select name="mm_score_1" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Мэдлэгийн менежментийн (ММ) шаардлагыг хангах, санал санаачлагыг бий болгоход чиглэсэн аливаа зохион байгуулалттай байдал  (i.e., мэдлэг/ мэдээллийн менежментийгзохицуулах алба, ажлын хэсэг, ажилтан, Мэдээлэл технологийн баг, Чанарын сайжруулалтын баг/ хэрэгжүүлэлийн зөвлөл, мэдлэгийн  холбоо г.м). </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_2"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_2"></td>
                                                                <td>
                                                                    <select name="mm_score_2" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Мэдлэгийн менежементийг эхлүүлэх, хэрэгжүүлэх санхүүгийн нөөцүүдийг хуваарилсан байдал </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_3"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_3"></td>
                                                                <td>
                                                                    <select name="mm_score_3" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Байгууллага мэдлэгээ хамгаалах бодлоготой , түүнийг баримтлан хэрэгжүүлэх байдал (i.e., оюуны өмч /copyrights/, патент/ patents, Мэдлэгийн менежмент, мэдлэгийн аюулгүйн бодлого г.м). </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_4"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_4"></td>
                                                                <td>
                                                                    <select name="mm_score_4" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>5</td>
                                                                <td>Менежерүүд мэдлэг хуваалцах хамтын ажиллагааны үнэ цэнийг үлгэрлэж үзүүлэх байдал. Тэд өөрийн ажиллагчдадаа мэдээллийг түгээхэд илүү цаг зарцуулах, ажиллагсад хооронд болон хэлтэс хооронд мэдээллийн урсгалыг харилцан уялдааг хангах хэвтээ чигт  чиглүүлдэг байдал</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_5"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_5"></td>
                                                                <td>
                                                                    <select name="mm_score_5" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>6</td>
                                                                <td>Цех нэгжийн удирдлага гүйцэтгэлийн сайжруулалтыг, байгууллагын болон ажиллагсдын суралцалтыг, мэдлэг хуваалцалтыг, мэдлэг бий болгох, инновацийг  дэмжих, хүлээн зөвшөөрөх, урамшуулах байдал</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_6"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_6"></td>
                                                                <td>
                                                                    <select name="mm_score_6" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                              
                                                        </tbody>
        
                                                        <thead>
                                                            <tr>
                                                                <th>№</th><th width="50%">Талбар 2.0: Үйл явц</th><th>Давуу тал</th><th>Сайжруулах боломж</th><th>Оноо (1–5)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>Байгууллага гол чадавхиудаа тогтоон (Стратегийн хувьд чухал чадварууд буюу өрсөлдөх давуу байдлыг бий болгох)  Түүнийг эрхэм зорилго стратегийн зорилготой нийцүүлсэн байдал</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_7"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_7"></td>
                                                                <td>
                                                                    <select name="mm_score_7" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>8</td>
                                                                <td>Байгууллагын үйл ажиллагааны тогтолцоо, процесс нь хэрэглэгчдийн үнэ цэнийг нэмэгдүүлж, гүйцэтгэлийг төгс төгөлдөржилтөд хүргэхэд чиглэгдсэн, загварчлагдсан байдал.  </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_8"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_8"></td>
                                                                <td>
                                                                    <select name="mm_score_8" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>9</td>
                                                                <td>Шинэ технологи, байгууллага дотор мэдлэг хуваалцах уян хатан чанар, үр ашиг, үр дүн нь үйл ажиллагааны загварт тусгагдаж, бодит биелэлээ олсон байдал.   </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_9"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_9"></td>
                                                                <td>
                                                                    <select name="mm_score_9" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>10</td>
                                                                <td>Байгууллага нь уналтын нөхцөл байдал эсвэл урьдчилан таамаглаагүй үйл явдлыг зохицуулах тогтолцоотой бөгөөд энэ нь үйл ажиллагааг тасралтгүй, аливаа эрсдлээс урьдчилан сэргийлж, эргэн сэргэх боломжийг олгодог байдал.</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_10"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_10"></td>
                                                                <td>
                                                                    <select name="mm_score_10" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>11</td>
                                                                <td>Байгууллагын үйл ажиллагааны процесс нь хэрэглэгчдийн шаардлагад нийцэж бизнесийн үр дүнг тогтвортой байлгахад чиглүүлэн удирдаж байгаа байдал.   </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_11"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_11"></td>
                                                                <td>
                                                                    <select name="mm_score_11" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>12</td>
                                                                <td>Байгууллага тастарлтгүй сайжруулалтыг хангахын тулд үйл ажиллагааны процессын гүйцэтгэлийг дээшлүүлэх, доголдол/хэлбэлзлийг багасгах, бүтээгдэхүүн үйлчилгээг сайжруулах, сүүлийн үеийн бизнесийн, хөгжлийн чиг хандлагыг байнга тандаж, үнэлдэг байдал. </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_12"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_12"></td>
                                                                <td>
                                                                    <select name="mm_score_12" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                              
                                                        </tbody>
        
                                                        <thead>
                                                            <tr>
                                                                <th>№</th><th width="50%">Талбар 3.0: Хүн</th><th>Давуу тал</th><th>Сайжруулах боломж</th><th>Оноо (1–5)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>13</td>
                                                                <td>Байгууллагын боловсрол, сургалт, карьер хөгжлийн хөтөлбөр нь ажиллагчдын мэдлэг, чадвар, чадавхийг бий болгож үйл ажиллагааны гүйцэтгэл, зорилгод хүрэхэд дэмжлэг болж нөлөөлөх байдал.   </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_13"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_13"></td>
                                                                <td>
                                                                    <select name="mm_score_13" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>14</td>
                                                                <td>Байгууллага шинэ ажиллагчдыг дадлагажуулах тогтолцоотой байдал, үүнд Мэдлэгийн менежментийн ойлголт, систем, арга хэрэгслэл, үр ашгийг багтаана.</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_14"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_14"></td>
                                                                <td>
                                                                    <select name="mm_score_14" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>15</td>
                                                                <td>Байгууллага ажилтныг дадлагажуулах, дагалдуулах, сургах байдал</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_15"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_15"></td>
                                                                <td>
                                                                    <select name="mm_score_15" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>16</td>
                                                                <td>Байгууллага ажиллагсдын чадавхийн тухай мэдээллийн нэгдсэн сантай, түүний ашиглалтын байдал.</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_16"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_16"></td>
                                                                <td>
                                                                    <select name="mm_score_16" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
                                                            <tr>
                                                                <td>17</td>
                                                                <td>Мэдлэг хуваалцах, хамтын ажиллагаа нь идэвхтэй дэмжигддэг, урамшуулагддаг, зүгшрүүлэгддэг байдал. </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_17"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_17"></td>
                                                                <td>
                                                                    <select name="mm_score_17" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
                                                            <tr>
                                                                <td>18</td>
                                                                <td>Ажиллагсад ажлын байран дах асуудал, төвөгтэй ажлуудыг хэлэлцэн шийдвэрлэх багуудад ажиллах байдал. (i.e., чанарын дугуйлан, ажил сайжруулах баг, хэлтэс, түршлага солилцох баг)</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_18"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_18"></td>
                                                                <td>
                                                                    <select name="mm_score_18" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
                                                              
                                                        </tbody>
        
                                                        <thead>
                                                            <tr>
                                                                <th>№</th><th width="50%">Талбар 4.0: Технологи</th><th>Давуу тал</th><th>Сайжруулах боломж</th><th>Оноо (1–5)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>19</td>
                                                                <td>Удирдлага мэдээллийн технологийн (МТ )бүтцийг бий болгосон (i.e., интернет, интранет, вебсайт) үр дүнтэй ММ-г хэрэгжүүлэх чадамжийг хөгжүүлсэн байдал.</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_19"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_19"></td>
                                                                <td>
                                                                    <select name="mm_score_19" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>20</td>
                                                                <td>МТ-ийн бүтэц тогтолцоо нь байгууллагын ММ-ийн стратегитай уялдсан байдал </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_20"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_20"></td>
                                                                <td>
                                                                    <select name="mm_score_20" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>21</td>
                                                                <td>Хүн бүр компьютер ашиглах боломжтой байдал		</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_21"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_21"></td>
                                                                <td>
                                                                    <select name="mm_score_21" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>22</td>
                                                                <td>Хүн бүр интернет, интранет(дотоод сүлжээ) хэрэглэх боломжтой, и-мейл хаягтай.</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_22"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_22"></td>
                                                                <td>
                                                                    <select name="mm_score_22" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>23</td>
                                                                <td>Мэдээллийг түгээх вебсайт, интранет нь тогтмол шинэчлэгддэг байдал</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_23"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_23"></td>
                                                                <td>
                                                                    <select name="mm_score_23" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
                                                            <tr>
                                                                <td>24</td>
                                                                <td>Интранет (ижил төрлийн сүлжээ) нь байгууллагын хэмжээнд мэдлэг мэдээлэл дамжуулах хуваалцах харилцаа холбооны гол эх үүсвэр болдог байдал.</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_24"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_24"></td>
                                                                <td>
                                                                    <select name="mm_score_24" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
                                                        </tbody>
        
                                                        <thead>
                                                            <tr>
                                                                <th>№</th><th width="50%">Талбар 5.0: Мэдлэгийн үйл явц</th><th>Давуу тал</th><th>Сайжруулах боломж</th><th>Оноо (1–5)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>25</td>
                                                                <td>Байгууллага мэдлэгийг илрүүлэх, бий болгох, байршуулах, хуваалцах, хэрэглэх системтэй, процесстой байдал.  </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_25"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_25"></td>
                                                                <td>
                                                                    <select name="mm_score_25" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>26</td>
                                                                <td>Байгууллага мэдлэгийн нөөцийг бий болгох чиглэсэн мэдлэгийг хайх илрүүлэх байдал.  </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_26"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_26"></td>
                                                                <td>
                                                                    <select name="mm_score_26" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>27</td>
                                                                <td>Мэдлэг нь гүйцэтгэсэн ажил үүрэг, төслийн дараах баримтжуулалт, мэдлэг хуваалцалтаар хуримтлагдах байдал.  </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_27"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_27"></td>
                                                                <td>
                                                                    <select name="mm_score_27" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>28</td>
                                                                <td>Ажиллагсад ажлаас гарахад  чухал мэдлэгийг өвлөн авч үлдээх байдал </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_28"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_28"></td>
                                                                <td>
                                                                    <select name="mm_score_28" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>29</td>
                                                                <td>Байгууллагын хэмжээнд тэргүүн туршлага, сургамжаасаа хуваалцдаг, энэ нь   байгууллагын үйл ажиллагаанд мэдлэг болон эерэгээр нөлөөлдөг байдал</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_29"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_29"></td>
                                                                <td>
                                                                    <select name="mm_score_29" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
                                                            <tr>
                                                                <td>30</td>
                                                                <td>Байгууллага дотоод болон гадаадын түвшин тогтоох үйл ажиллагаа /бенчмарк/ хийдэг. Ингэснээр байгууллагад шинэ мэдлэгийг бий болгох, гүйцэтгэлийг сайжирдаг байх.  </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_30"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_30"></td>
                                                                <td>
                                                                    <select name="mm_score_30" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
                                                        </tbody>
        
                                                        <thead>
                                                            <tr>
                                                                <th>№</th><th width="50%">Талбар 6.0: Суралцалт инноваци</th><th>Давуу тал</th><th>Сайжруулах боломж</th><th>Оноо (1–5)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>31</td>
                                                                <td>Байгууллага суралцалт инновацийн үнэ цэнийг тодорхой болгож тасралтгүй  сайжруулдаг байдал</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_31"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_31"></td>
                                                                <td>
                                                                    <select name="mm_score_31" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>32</td>
                                                                <td>Байгууллага эрсдлийг хүлээх, алдаа хийхийг суралцах боломж гэж үзэх ба улмаар тэр нь дахин давтагдахгүй байх </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_32"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_32"></td>
                                                                <td>
                                                                    <select name="mm_score_32" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Байгууллагын сайжруулалтын багуудууд нь хэсэг нэгжүүдийн нэгдмэл ажиллагаанд тулгарсан асуудал хүндрэлийг шийдвэрлэдэг байх.</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_33"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_33"></td>
                                                                <td>
                                                                    <select name="mm_score_33" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>34</td>
                                                                <td>Ажилтнуудад өөрчлөн сайжруулах санал санаачилгыг дэвшүүлэх боломж олгогдож тэр нь байгууллагын зүгээс үнэлэгддэг байдал </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_34"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_34"></td>
                                                                <td>
                                                                    <select name="mm_score_34" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>35</td>
                                                                <td>Удирдлагын шинэ арга барил, техникийг турших, оролдож үзэх хүсэлт эрмэлзлэл		</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_35"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_35"></td>
                                                                <td>
                                                                    <select name="mm_score_35" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>36</td>
                                                                <td>Хүвь хүмүүст хамтран ажиллах мэдээллээ солилцох үед урамшуулал олгох  </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_36"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_36"></td>
                                                                <td>
                                                                    <select name="mm_score_36" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                        </tbody>
        
                                                        <thead>
                                                            <tr>
                                                                <th>№</th><th width="50%">Талбар 7.0: Гарц</th><th>Давуу тал</th><th>Сайжруулах боломж</th><th>Оноо (1–5)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>37</td>
                                                                <td>Байгууллага ММ-ийг болон бусад өөрчлөлтийн санал санаачлагуудыг амжилттай хэрэгжүүлсэн байдал  (тогтворжсон, хэмжигдсэн)</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_37"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_37"></td>
                                                                <td>
                                                                    <select name="mm_score_37" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>38</td>
                                                                <td>Мэдлэгийн үүрэг оролцоо, санал санаачлагын үр нөлөөг үнэлэх зөв хэмжүүрүүдтэй эсэх  </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_38"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_38"></td>
                                                                <td>
                                                                    <select name="mm_score_38" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>39</td>
                                                                <td>Байгууллага мэдлэгийн оролцоотойгоор өртөг зардлыг бууруулах, үйл ажиллагааны үр дүнг сайжруулах, нөөцийг үр ашигтай хэрэглэх, шийдвэр гаргалтыг сайжруулах, инновацийн хурдыг нэмэгдүүлэх замаар өндөр бүтээмжтэй болсон байдал.  </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_39"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_39"></td>
                                                                <td>
                                                                    <select name="mm_score_39" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>40</td>
                                                                <td>Байгууллага бүтээмж, чанар, хэрэглэгчийн сэтгэл ханамжийг нэмэгдүүлсний үр дүнд ашгаа нэмэгдүүлсэн байдал.</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_40"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_40"></td>
                                                                <td>
                                                                    <select name="mm_score_40" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>41</td>
                                                                <td>Байгууллага бизнесийн үйл явц, хэрэглэгчийн харилцааг сайжруулахад мэдлэгийг хэрэглэж үүний үр дүнд бүтээгдэхүүн үйлчилгээний чанар сайжирсан байдал.</td>
                                                                <td><input type="text" class="form-control" name="mm_adv_41"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_41"></td>
                                                                <td>
                                                                    <select name="mm_score_41" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                            <tr>
                                                                <td>42</td>
                                                                <td>Байгууллага өндөр бүтээмж, ашигт ажиллагааны өсөлт, бүтээгдэхүүн үйлчилгээний сайн чанарын үр дүнд тогтвортой өсөлтийг хангасан байдал.  </td>
                                                                <td><input type="text" class="form-control" name="mm_adv_42"></td>
                                                                <td><input type="text" class="form-control" name="mm_opp_42"></td>
                                                                <td>
                                                                    <select name="mm_score_42" class="form-control" required>
                                                                        <option value="" selected disabled>Сонгоно уу</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </td>                                                        
                                                            </tr>
        
                                                        </tbody>
        
                                                    </table>
                                                    <div class="text-center">
                                                        <input type="submit" class="btn btn-default" value="Үнэлгээ өгөх" >
                                                    </div>
                                                </form>
                                            </div>
                                            <?
                                        }                              
                                    }
                                    else 
                                    {
                                        ?>
                                        <div class="alert alert-danger">Асуулгын дугаар олдсонгүй</div>
                                        <?                  
                                    }
                                }
                                else 
                                {
                                    ?>
                                    <div class="alert alert-danger">Асуулгын дугаар хоосон байна</div>
                                    <?                  
                                }

                                ?>
                            </div>
                            <!-- .col-md-4 -->                           
                            
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .focus-cause -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Campaign Section -->


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
    <!-- <script type="text/javascript" src="assets/js/popper.min.js"></script> -->
    
    <script type="text/javascript" src="assets/js/custom.js"></script>
</body>

</html>
