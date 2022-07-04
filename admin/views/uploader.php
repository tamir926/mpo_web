<?
    require_once("login_check.php");
    //var_dump($_FILES);
    if ($_FILES["image"]["name"]) {
        if (!$_FILES["image"]['error']) {
        $name = md5(rand(100, 200).$_FILES["image"]["name"]);
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = $name.'.'.$ext;
        
        @$folder = date("Ym");
        if(!file_exists('../../uploads/'.$folder))
        mkdir('../../uploads/'.$folder);
        $target_dir = '../../uploads/'.$folder;
        $destination = $target_dir.'/'.$filename; //change this directory
        $location = $_FILES['image']["tmp_name"];
        move_uploaded_file($location, $destination);
        echo substr($destination,6); //change this URL
        } else {
        echo $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['image']['error'];
        }
    }
?>