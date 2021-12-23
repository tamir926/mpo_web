<?php
header('Content-Type: application/json');
require_once 'config.php';
require_once 'helper.php';

    $response = array();

    $response['response']=0;
    $response['error_msg'] ="";

    $news = array();
    if (isset($_GET["id"]))
        $sql_new = "SELECT news.*,news_category.name category_name FROM news LEFT JOIN news_category ON category=news_category.id WHERE category=".$_GET["id"]." ORDER BY dd";
        else 
        $sql_new = "SELECT news.*,news_category.name category_name FROM news LEFT JOIN news_category ON category=news_category.id ORDER BY dd";


    $result_news = mysqli_query($conn,$sql_new);
    while ( $data_news= mysqli_fetch_array($result_news))
    {
        $new = array();
        $new["id"] = intval($data_news["id"]);
        $new["title"] =$data_news["title"];
        $new["image"] =settings("base_url").$data_news["image"];
        $new["brief"] =$data_news["brief"];
        $new["content"] =$data_news["content"];
        $new["date"] =substr($data_news["timestamp"],0,10);
        $new["category_id"] =intval($data_news["category"]);
        $new["category_name"] =$data_news["category_name"];

        array_push($news,$new);
        unset($new);
    }
        

    $response['news']=$news;
    $response['response'] = 200;
    unset($products);             
    


echo json_encode($response);
?>