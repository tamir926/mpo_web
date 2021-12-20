<?
   ob_start();
   session_start();
   require_once("../config.php"); 
   require_once("helper.php");

   if(isset($_POST["login_remember"])) {
      unset($_COOKIE['login_remember']);
      //echo "setting cookie[";
      setcookie ("login_remember",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60),'/');
      //echo $_COOKIE['login_remember']."]";
   } else {
      unset($_COOKIE['login_remember']);
   }


   if (isset($_POST["login-password"]) && isset($_POST["login-username"]))
   {
      $username = protect ($_POST["login-username"]);
      $password = protect ($_POST["login-password"]);

      
      if ($username == settings("admin_username") && $password == settings("admin_pass"))
      {
         $_SESSION['admin_name']=settings("admin_name");
         $_SESSION['admin_avatar']=settings("admin_avatar");
         $_SESSION['rights']="admin";
         $_SESSION['admin_timestamp']=date("Y-m-d H:i:s");
         $_SESSION['admin_logged']=TRUE;
         //require_once("refresh.php");
         
         header('Location: dashboard');

      }


      else {

            $sql = "SELECT *FROM members WHERE username='$username' AND password='$password' LIMIT 1";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result)==1)
            {
               $data = mysqli_fetch_array($result);
               
               $_SESSION['id']=$data["id"];
               $_SESSION['name']=$data["name"];
               $_SESSION['rights']="xt";
               $_SESSION['avatar']=$data["image"];
               $_SESSION['timestamp']=date("Y-m-d H:i:s");
               $_SESSION['logged']=TRUE;
               $sql = "UPDATE members SET logged_date = '".date("Y-m-d H:i:s")."' WHERE username='$username' AND password='$password' LIMIT 1";
               mysqli_query($conn,$sql);
            
               header('Location: ../user/dashboard');
              
            }
               else
                  header("location: login?error=wrong") ;
         }
            
   }
   else header("location: login?error=empty")
?>