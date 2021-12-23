<?php
header('Content-Type: application/json');
require_once 'config.php';
require_once 'helper.php';

    $response = array();

    $response['response']=0;
    $response['error_msg'] ="";

    $faqs = array();
    $sql = "SELECT * FROM faqs ORDER BY dd";


    $result = mysqli_query($conn,$sql);
    while ( $data= mysqli_fetch_array($result))
    {
        $faq = array();
        $faq["id"] = intval($data["id"]);
        $faq["question"] =$data["question"];
        $faq["answer"] = $data["answer"];

        array_push($faqs,$faq);
        unset($faq);
    }
        

    $response['faqs']=$faqs;
    $response['response'] = 200;
    unset($faqs);             
    


echo json_encode($response);
?>