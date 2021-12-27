<?php
    header('Content-Type: application/json');
    require_once 'config.php';
    require_once 'helper.php';

   // if (isset($_GET['parameter'])) $parameter = protection($_GET['parameter']); else $parameter="";

    $response = array();

    $response['response']=200;
    $response['error_msg'] ="";
    $response['aboutus_text']="Улсын 2-р төв эмнэлэг";
    $response['facebook']=settings("facebook");
    $response['twitter']=settings("twitter");
    $response['instagram']=settings("instagram");
    $response['address']=settings("address");
    $response['email']=settings("email");
    $response['contact']=settings("tel");

    // $links = array();
    // array_push($links,"http://e-balance.mof.gov.mn/");
    // array_push($links,"http://e-report.mof.gov.mn/");
    // array_push($links,"http://e-tax.mta.mn/");
    // array_push($links,"http://ebarimt.mn/");
    // array_push($links,"http://n8.daatgal.mn/");
    // $response['links']=$links;


echo json_encode($response);
?>