<? require_once("config.php");?>
<? require_once("views/login_check.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<style>
    .tooltip {
    position: relative;
    display: inline-block;
    }

    .tooltip .tooltiptext {
    visibility: hidden;
    width: 140px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px;
    position: absolute;
    z-index: 1;
    bottom: 150%;
    left: 50%;
    margin-left: -75px;
    opacity: 0;
    transition: opacity 0.3s;
    }

    .tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
    }

    .tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
    }
</style>
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
                                // $_SESSION['logged_user_id']=$data["id"];
                                // $_SESSION['logged_user_name']=$data["name"];
                                // $_SESSION['logged_user_rights']="user";
                                // $_SESSION['logged_user_avatar']=$data["avatar"];
                                // $_SESSION['logged_user_timestamp']=date("Y-m-d H:i:s");
                                
                                $g_logged_id = $_SESSION["logged_user_id"];
                                $sql = "SELECT *FROM assessment_mm_link WHERE member_id='$g_logged_id'";
                                $result = mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result)==1)
                                {
                                    $data = mysqli_fetch_array($result);
                                    $link = $data["link"];                                    
                                }
                                else 
                                {
                                    $rand = substr(sha1(time()), 0, 5).$g_logged_id;
                                    $sql = "INSERT INTO assessment_mm_link (member_id,link) VALUES ('$g_logged_id','$rand')";
                                    mysqli_query($conn,$sql);
                                    $link_id = mysqli_insert_id($conn);                                    
                                    $link = $rand;                                   
                                }

                                $sql = "SELECT id FROM assessment_mm WHERE member_id='$g_logged_id'";
                                mysqli_query($conn,$sql);
                                $total = mysqli_num_rows($result);

                                ?>

                                <h5>Ажилчдаас авах асуулга</h5>
                                <table class="table table-responsive mpo_assessment">
                                    <tbody>
                                        <tr>
                                            <td><a style="border:none" href="http://mpo.mn/amm?id=<?=$link;?>" target="new">http://mpo.mn/amm?id=<?=$link;?></a></td>
                                            <td align="center"><?=$total;?></td>
                                            <td align="center" width="100"><button onclick="navigator.clipboard.writeText('http://mpo.mn/amm?id='+'<?=$link;?>');" class="btn btn-warning">Хуулах</button> </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
                               
                                <h3>Үр дүн</h3>
                                <table class="table table-responsive mpo_assessment">
                                    <thead>
                                        <tr>
                                            <th>№</th><th width="50%">Талбар 1.0: МM Манлайлал</th><th>Давуу тал</th><th>Сайжруулах боломж</th><th>Оноо (1–5)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Байгууллага нь хүн бүрт хүрсэн мэдлэгийн алсын хараа, стратегитай ба тэр нь байгууллагын алсын хараа, эрхэм зорилго, зорилготой нягт нийцсэн байна.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer1"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                        
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>Байгууллагын зохион байгуулалт нь ММ-ын санал санаачлагыг бий болгоход нийцсэн. (i.e., мэдлэг/ мэдээллийн менежментийн төв зохицуулах хэсэг, Ахлах Мэдлэг/ мэдээллийн ажилтан,МТ-ийн баг, чанарын сайжруулалтын баг/ хэрэгжүүлэлийн зөвлөл, мэдлэгийн  холбоо). </td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer2"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                               
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>Санхүүгийн нөөцүүдийг ММ-ийн эхлүүлэхэд хуваарилах</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer3"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                  
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>Байгууллага мэдлэгийг хамгаалах бодлоготой байх (i.e., copyrights, patents, KM, мэдлэгийн аюулгүйн бодлого). </td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer4"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                       
                                        </tr>

                                        <tr>
                                            <td>5</td>
                                            <td>Менежерүүд мэдлэг хуваалцах хамтын ажиллагааны үнэ цэнийг менежерүүд үлгэрлэж үзүүлэх . Тэд өөрийн ажиллагчдадаа мэдээллийг түгээхэд илүү цаг зарцуулах, ажиллагсад хооронд болон хэлтэс хооронд мэдээлэлийн  хэвтээ чигт урсгалыг чиглүүлэх </td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer5"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                             
                                        </tr>

                                        <tr>
                                            <td>6</td>
                                            <td>Удирдлага гүйцэтгэлийн сайжруулалтыг , байгууллагын болон ажиллагсдын суралцалтыг, мэдлэг хуваалцалтыг, мэдлэг бий болгох, инновацийг  дэмжих , хүлээн зөвшөөрөх, урамшуулах </td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer6"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                          
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
                                            <td>Байгууллага гол чадавхиудаа тогтооно (Стратегийн хувьд чухал чадварууд буюу өрсөлдөх давуу байдлыг бий болгох)  Түүнийг эрхэм зорилго стратегийн зорилготой нийцүүлнэ.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer7"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                              
                                        </tr>

                                        <tr>
                                            <td>8</td>
                                            <td>Байгууллага хэрэглэгчдийн үнэ цэнийг нэмэгдүүлж, гүйцэтгэлийн төгс төгөлдөржилтөд хүргэхийн тулд ажлын тогтолцоо, гол үйл явцыг загварчилна.  </td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer8"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                         
                                        </tr>

                                        <tr>
                                            <td>9</td>
                                            <td>Шинэ технологи, байгууллага дотор мэдлэг хуваалцах, уян хатан чанар, үр ашиг, үр дүн нь үйл явцын загварт тусгагдана.   </td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer9"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                  
                                        </tr>

                                        <tr>
                                            <td>10</td>
                                            <td>Байгууллага гол үйл явцыг хэрэглэгчдийн шаардлагад нийцэж бизнесийн үр дүн тогтвортой байхаар удирдаж гүйцэтгэнэ.   </td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer10"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                          
                                        </tr>

                                        <tr>
                                            <td>11</td>
                                            <td>Байгууллага гол үйл явцыг хэрэглэгчдийн шаардлагад нийцэж бизнесийн үр дүн тогтвортой байхаар удирдаж гүйцэтгэнэ.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer11"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                    
                                        </tr>

                                        <tr>
                                            <td>12</td>
                                            <td>Байгууллага тасралтгүй ажлын үйл явцыг сайн гүйцэтгэл хүргэх, хэлбэлзлийг багасгах, бүтээгдэхүүн үйлчилгээг сайжруулах, сүүлийн үеийн бизнесийн чиг хандлага, хөгжилийг тандаж сайжруулж байхын  тулд байнга үнэлж сайжруулна.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer12"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                                
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
                                            <td>Байгууллагын боловсрол, сургалт, карьер хөгжлийн хөтөлбөр нь ажиллагчдын мэдлэг, чадвар, чадавхийг бий болгож нийт зорилгод хүрэхэд дэмжлэг болж өндөр гүйцэтгэлд нөлөөлдөг.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer13"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                         
                                        </tr>

                                        <tr>
                                            <td>14</td>
                                            <td>Байгууллага системтэй шинэ ажиллагчдыг дадлагажуулах үйл явцтай байх, үүнд ММ-ийн ойлголт өгөх, ашиг тус, систем, арга хэрэгслэлийг багтаана.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer14"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                       
                                        </tr>

                                        <tr>
                                            <td>15</td>
                                            <td>Байгууллага дадлагажуулах, дагалдуулах, сургах үйл явцтай байна</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer15"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                            
                                        </tr>

                                        <tr>
                                            <td>16</td>
                                            <td>Байгууллага ажиллагсдын чадавхийн тухйа датабазтай байга.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer16"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                    
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td>Мэдлэг хуваалцах, хамтын ажиллагаа нь идэвхтэй дэмжигдэг, урамшуулагддаг, зүгшрүүлдэг байна. </td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer17"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                         
                                        </tr>
                                        <tr>
                                            <td>18</td>
                                            <td>Ажиллагсад багуудад хуваагдаж ажлын байран дах асуудал, төвөгтэй ажлуудыг хариуцна. (i.e., чанарын дугуйлан, ажил сайжруулах баг, хэлтэс, түршлага солилцох баг)</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer18"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                
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
                                            <td>Удирдлага МТ-ийн бүтцийг бий болгосон (i.e., интернет, интранет, вебсайт) үр дүнтэй ММ-г хэрэгжүүлэх чадамжийг хөгжүүлсэн.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer19"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                                 
                                        </tr>

                                        <tr>
                                            <td>20</td>
                                            <td>МТ-ийн бүтэц тогтолцоо байгууллагын ММ-ийн стратегитай уялдсан. </td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer20"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                                  
                                        </tr>
                                        
                                        <tr>
                                            <td>21</td>
                                            <td>Хүн бүр компьютер ашиглах боломжтой.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer21"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                        
                                        </tr>

                                        <tr>
                                            <td>22</td>
                                            <td>Хүн бүр интернет, интранет хэрэглэх боломжтой, и-мейл хаягтай.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer22"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                        
                                        </tr>

                                        <tr>
                                            <td>23</td>
                                            <td>Мэдээллийг түгээх вебсайт, интранет нь тогтмол шинэчлэгддэг.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer23"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                           
                                        </tr>
                                        <tr>
                                            <td>24</td>
                                            <td>Интранет (ижил төрлийн сүлжээ) нь байгууллагын хэмжээнд мэдлэг мэдээлэл дамжуулах хуваалцах харилцаа холбооны гол эх үүсвэр байна.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer24"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                          
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
                                            <td>Байгууллага мэдлэгийг илрүүлэх, бий болгох, байршуулах, хуваалцах, хэрэглэх системтэй үйл явцтай.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer25"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                            
                                        </tr>

                                        <tr>
                                            <td>26</td>
                                            <td>Байгууллага мэдлэгийн эргэц нөөцийг бий болгох тэр нь мэдлэгийн нөөц хөрөнгийг хайж илрүүлэх.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer26"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                        
                                        </tr>

                                        <tr>
                                            <td>27</td>
                                            <td>Мэдлэг нь гүйцэтгэсэн ажил үүрэг, төсөлийн дараах баримтжуулалт, хуваалцахаас хуримтлагдана.  </td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer27"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                                   
                                        </tr>

                                        <tr>
                                            <td>28</td>
                                            <td>Ажиллагсад ажлаас гарахад  чухал мэдлэгийг үлдээх</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer28"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                      
                                        </tr>

                                        <tr>
                                            <td>29</td>
                                            <td>Байгууллагын хэмжээнд тэргүүн туршлага суралсан сургамжаа хуваалцдаг. Ингэснээр байгууллагад дахин хуримтлал хийх ажил давхардах явдал үгүй болно.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer29"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                             
                                        </tr>
                                        <tr>
                                            <td>30</td>
                                            <td>Түвшин тогтоох үйл ажиллагаа байгууллагын дотор болон гадаадад хийгдэнэ. Ингэснээр байгууллагын гүйцэтгэл шинэ мэдлэг бий болгох нь сайжирна.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer30"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                            
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
                                            <td>Байгууллага суралцалт инновацийн үнэ цэнийг тодорхой болгож тасралтгүй  сайжруулна.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer31"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                        
                                        </tr>

                                        <tr>
                                            <td>32</td>
                                            <td>Байгууллага эрсдлийг хүлээх, алдаа хийхийг суралцах боломж гэж үзэх ба улмаар тэр нь дахин давтагдахгүй байх </td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer32"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                           
                                        </tr>

                                        <tr>
                                            <td>33</td>
                                            <td>Байгууллагын нийт үйл явцын багууд байгуулага дахь өөр өөр хэсэгийн нэгдмэл ажиллагааг алдагдуулах асуудал хүндрэлийг шийдвэрлэхээр байгуулагдана.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer33"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                               
                                        </tr>

                                        <tr>
                                            <td>34</td>
                                            <td>Хүмүүс өөрт эрх бололцоо олгогдож өөрийн санаа санаачлага оролцоо нь байгууллагын зүгээс үнэлэгдэнэ.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer34"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                                    
                                        </tr>

                                        <tr>
                                            <td>35</td>
                                            <td>Удирдлага шинэ арга, техникийг оролдож үзэх хүсэлтэй байх</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer35"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                                   
                                        </tr>

                                        <tr>
                                            <td>36</td>
                                            <td>Хүвь хүмүүст хамтран ажиллах мэдээллээ солилцох үед урамшуулал олгох</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer36"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                              
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
                                            <td>Байгууллага ММ-ийг болон бусад өөрчлөлтийн санал санаачлагуудын амжилттай хэрэгжүүлсэн амжилтын тухай түүхтэй  (тогтворжуулах, хэмжих)</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer37"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                        
                                        </tr>

                                        <tr>
                                            <td>38</td>
                                            <td>Мэдлэгийн үүрэг оролцоо, санал санаачлагын үр нөлөөг үнэлэх зөв хэмжүүрүүд</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer38"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                                  
                                        </tr>

                                        <tr>
                                            <td>39</td>
                                            <td>Байгууллага эргэлтийн хугацааг багасгах, өртгийг их хэмжээгээр хэмнэх, үр дүнг сайжруулах, нөөцийн /Мэдлэгийг оролцуулаад/ үр ашигтай хэрэглээ, шийдвэр гаргалтыг сайжруулах, инновацийн хурдыг нэмэгдүүлэх замаар өндөр бүтээмжтэй болсон.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer39"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                                    
                                        </tr>

                                        <tr>
                                            <td>40</td>
                                            <td>Байгууллага бүтээмж, чанар, хэрэглэгчийн сэтгэл ханамжийг нэмэгдүүлсний үр дүнд ашгаа нэмэгдүүлсэн.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer40"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                          
                                        </tr>

                                        <tr>
                                            <td>41</td>
                                            <td>Байгууллага бизнесийн үйл явц, хэрэглэгчийн харилцааг сайжруулахад мэдлэгийг хэрэглэж үүний үр дүнд бүтээгдэхүүн үйлчилгээний чанар сайжирна.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer41"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                                  
                                        </tr>

                                        <tr>
                                            <td>42</td>
                                            <td>Байгууллага өндөр бүтээмж, ашигт ажиллагааны өсөлт, бүтээгдэхүүн үйлчилгээний сайн чанарын үр дүнд тогтвортой өсөлтийг хангасан.</td>
                                            <?
                                            $sub_count=$sub_score =0;
                                            $ans_adv=$ans_opp = array();
                                            
                                            $sql = "SELECT * FROM assessment_mm WHERE member_id='$g_logged_id'";
                                            $result = mysqli_query($conn,$sql);
                                            while ($data = mysqli_fetch_array($result))
                                            {
                                                $answer=$data["answer42"];
                                                $answer_array = explode("|",$answer);
                                                if (intval($answer_array[0])>0) $sub_score+=intval($answer_array[0]);
                                                if ($answer_array[1]<>"") array_push($ans_adv,$answer_array[1]);
                                                if ($answer_array[2]<>"") array_push($ans_opp,$answer_array[2]);
                                                $sub_count++;
                                            }
                                            ?>
                                            <td>
                                                <?
                                                foreach($ans_adv as $ans_adv_single)
                                                {
                                                    echo '<p>'.$ans_adv_single.'</p>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?
                                                foreach($ans_opp as $ans_opp_single)
                                                {
                                                    echo '<p>'.$ans_opp_single.'</p>';
                                                }
                                            ?>
                                            </td>
                                            <td>~<?=number_format($sub_score/$sub_count,1);?></td>                                                       
                                        </tr>

                                    </tbody>

                                </table>
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
    <script type="text/javascript" src="assets/js/custom.map.js"></script>
    <!-- <script type="text/javascript" src="assets/js/popper.min.js"></script> -->
    
    <script type="text/javascript" src="assets/js/custom.js"></script>

</body>

</html>
