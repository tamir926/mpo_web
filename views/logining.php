<?
   require_once("../config.php"); 
   require_once("helper.php");
   ob_start();
   session_start();

   if(isset($_POST["login_remember"])) {
      unset($_COOKIE['login_remember']);
      //echo "setting cookie[";
      setcookie ("login_remember",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60),'/');
      //echo $_COOKIE['login_remember']."]";
   } else {
      unset($_COOKIE['login_remember']);
   }


   if (isset($_POST["username"]) && isset($_POST["password"]))
   {
      $username = protect ($_POST["username"]);
      $password = protect ($_POST["password"]);


            $sql = "SELECT *FROM users WHERE username='$username' AND password='$password' LIMIT 1";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result)==1)
            {
               $data = mysqli_fetch_array($result);
               
               $_SESSION['logged_user_id']=$data["id"];
               $_SESSION['logged_user_name']=$data["name"];
               $_SESSION['logged_user_rights']="user";
               $_SESSION['logged_user_avatar']=$data["avatar"];
               $_SESSION['logged_user_timestamp']=date("Y-m-d H:i:s");
               $_SESSION['logged']=TRUE;
               $sql = "UPDATE users SET logged_date = '".date("Y-m-d H:i:s")."' WHERE username='$username' AND password='$password' LIMIT 1";
               mysqli_query($conn,$sql);
               //echo $sql;
               //var_dump($_SESSION);
               header('Location: index');
              
            }
               else
                  header("Location: login?error=wrong") ;
         }
            
   else header("Location: login?error=empty")
?>