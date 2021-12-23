<?php
header('Content-Type: application/json');
require_once 'config.php';
require_once 'helper.php';

    $response = array();

    $response['response']=0;
    $response['error_msg'] ="";


        $categories = array();
        $sql = "SELECT *FROM links_category ORDER BY dd";
        $result = mysqli_query($conn,$sql);
        while ( $data= mysqli_fetch_array($result))
        {
            $category = array();
            $category_id = $data["id"];
            $category_name = $data["name"];
            $category["category_id"] = $category_id;
            $category["category_name"] = $category_name;
                $links = array();
                $sql_links = "SELECT *FROM links WHERE category=$category_id ORDER BY dd";
                $result_links = mysqli_query($conn,$sql_links);
                while ( $data_links= mysqli_fetch_array($result_links))
                {
                    $link = array();
                    $link["id"] = intval($data_links["id"]);
                    $link["name"] =$data_links["name"];
                    $link["url"] =$data_links["url"];
                    array_push($links,$link);
                    unset($link);
                }
            $category["links"] = $links;
            array_push($categories,$category);
            unset($category);
        }

    $response['category']=$categories;
    $response['response'] = 200;
    unset($products);             
    


echo json_encode($response);
?>