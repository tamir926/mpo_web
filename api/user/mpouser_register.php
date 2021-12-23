<?php
header('Content-Type: application/json');
require_once 'config.php';
require_once 'helper.php';

$response = array();


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

            //$token =  $input["token"];
            //$order_detail =  $input["order_detail"];
            //$totalcount =  $input["count"];
            //$totalsum =  $input["totalsum"];
            //$description =  $input["description"];
            //$expect_date =  $input["expect_date"];


             $username = protection($input['username']);
             $password = protection($input['password']);
             $tel = protection($input['tel']);
             $name = protection($input['name']);
             $type = protection($input['type']);

             //  $devicetoken = protection($input['devicetoken']);
            //  $deviceinfo = protection($input['deviceinfo']);


            // INIT DEFAULT VALUES
            //==================================
            //==================================
            //==================================
            $status = 200;


            //==================================


            $sql = "SELECT * FROM users WHERE username = '$username' OR tel = '$tel' OR email='$email'";
            $result=mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) ==0)
            {
                $data= mysqli_fetch_array($result);
                $user_id = $data["id"];
                $response['name'] = $data["name"];
                $response['surname'] = $data["surname"];
                $response['avatar'] = settings("base_url").$data["avatar"];
                //$token = "U".date("md").sha256($data["id"].date("Y-m-d H:i:s"));
                $sql = "INSERT INTO users (name,tel,email,username,password) VALUES ('$name','$tel','$email','$username','$password')";
                if (mysqli_query($conn,$sql))
                    {
                        $sql = "UPDATE users SET token='$token',logged_date='".date("Y-m-d H:i:s")."' WHERE id = '$user_id' LIMIT 1";
                        mysqli_query($conn,$sql);            

                        $token = "U".date("md").hash('sha256', $username.date("Y-m-d H:i:s").$password);

                        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
                        $result=mysqli_query($conn,$sql);
                        $data= mysqli_fetch_array($result);
                        $user_id = $data["id"];
                        $response['name'] = $data["name"];
                        $response['surname'] = $data["surname"];
                        $response['avatar'] = settings("base_url").$data["avatar"];

                        $response['token'] =  $token;
                        $response['status'] = 0;
                        $response["error"] ="";
                    }
                    else
                    {
                        //$status = 401;
                        $response['status'] = 1;
                        $response["error"]="Error in registration";
                    }
                    

            }
            else
            {
                //$status = 401;
                $response['status'] = 1;
                $response["error"]="Username, tel or email already registered before";
            }

            /*
            $modules = array();
            $module = array();

            $module["name"] = "Төсөл";
            $module["icon"] = "th-large";
            $module["url"] = "https://felix.amjilt-erp.com/project.php";
            array_push($modules,$module);

            $module["name"] = "Захиалга";
            $module["icon"] = "flag";
            $module["url"] = "https://felix.amjilt-erp.com/order.php";
            array_push($modules,$module);

            $module["name"] = "Ажилчид";
            $module["icon"] = "user";
            $module["url"] = "https://felix.amjilt-erp.com/employeeList.php";
            array_push($modules,$module);

            $module["name"] = "Агуулах";
            $module["icon"] = "home";
            $module["url"] = "https://felix.amjilt-erp.com/warehouse.php";
            array_push($modules,$module);



            $response["modules"]=$modules;
            */

    }
    else
    {
         //$status=505;

         $response['status'] = 1;
         $response["error"]="invalid JSON format";
        //$response["response"]=504;
        //$response["error"]="Нэвтрэх нэр болон нууц үг явуулаагүй байна.";

    }
$response['response'] = 200;
http_response_code ($status);
echo json_encode($response);


//curl -i -X PUT -d '{"address":"Sunset Boulevard"}' http://localhost/clients/ryan
?>