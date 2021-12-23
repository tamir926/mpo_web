<?php
header('Content-Type: application/json');
require_once 'config.php';
require_once 'helper.php';

$responce = array();


//$username = protection($_POST['username']); // $username="magnate";
//$password = protection($_POST['password']); // $password="123";
//$devicetoken = protection($_POST['devicetoken']);
//$deviceinfo = protection($_POST['deviceinfo']);

//echo $username;
//echo $password;
if (isJson(file_get_contents('php://input')))
//if ($username<>"" && $password <>"")
    {
            $input= json_decode( file_get_contents( 'php://input' ), true );
            if (isset($input['payment']))
            {
                $payment = protection($input['payment']);
                $status = 200;
                $responce['status'] = 0;


                $host = "https://merchant-sandbox.qpay.mn"; //test
                $host = "https://merchant.qpay.mn"; //production
                    
                $url = $host."/v2/auth/token";

                //test
                $username = "TEST_MERCHANT";
                $password = "123456";

                
                //production
                $username = "SHBD_TBB";
                $password = "FupFlUCk";

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
                curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                $result = curl_exec($ch);
                $result_decode = json_decode($result);

                // if(curl_exec($ch) === false)
                // {
                //     echo 'Curl error: ' . curl_error($ch);
                // }
                // else
                // {
                //     echo 'Operation completed without any errors';
                // }
            
                // $sql = "INSERT INTO invoice (user,amount,plan) VALUES ('$my_id',$payment_amount,'$plan_name')";
                // mysqli_query($conn,$sql);
                // $local_invoice_id = mysqli_insert_id($conn);
                $local_invoice_id = 1;
                curl_close($ch);  

                $access_token = $result_decode->access_token;

                $url = $host."/v2/invoice";
                $authorization = "Authorization: Bearer $access_token";

                $post_data['invoice_code'] = "TEST_INVOICE"; //TEST
                $post_data['invoice_code'] = "SHBD_TBB_INVOICE"; //PRODUCTION

                $post_data['sender_invoice_no'] = strval($local_invoice_id);
                $post_data['invoice_receiver_code'] = "terminal";
                $post_data['invoice_description'] = "User:1, Nyabo app payment: 20000";
                $post_data['amount'] = $payment;
                $post_data['callback_url'] = "https://starlight-soft.com/nyabo/api/payments?payment_id=".$local_invoice_id;

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));

                $result = curl_exec($ch);
                $result_decode = json_decode($result);
                curl_close($ch); 
                
                $invoice_id =  $result_decode->invoice_id; 
                $qr_text =  $result_decode->qr_text; 
                $qr_image =  $result_decode->qr_image; 
                $qPay_shortUrl =  $result_decode->qPay_shortUrl; 
                $urls =  $result_decode->urls; 
                // $sql = "UPDATE invoice SET invoice_id='$invoice_id' WHERE id='$local_invoice_id'";
                // mysqli_query($conn,$sql);
                $payment = array();
                $payment["invoice"]=$invoice_id;
                $payment["qr_text"]=$qr_text;
                $payment["qr_image"]=$qr_image;
                $payment["short_urls"]=$qPay_shortUrl;
                $payment["urls"]=$urls;
                $responce['payment'] = $payment;

            }
            if (isset($input['invoice']))
            {
                $invoice = protection($input['invoice']);
                $responce['payment_status'] = 1;
                $responce['payment_date'] = "2021-12-22";
            }
            $responce['status'] = 1;
    }
    else
    {
         $responce['status'] = 1;
         $responce["error"]="invalid JSON format";
        //$responce["responce"]=504;
        //$responce["error"]="Нэвтрэх нэр болон нууц үг явуулаагүй байна.";

    }
http_response_code ($status);
echo json_encode($responce);


//curl -i -X PUT -d '{"address":"Sunset Boulevard"}' http://localhost/clients/ryan
?>