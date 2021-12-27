<?
	require_once ('config.php');

	if (!function_exists('protection'))
	{
		function protection($input)
		{
			$input = str_replace("<", "", $input);
			$input = str_replace(">", "", $input);
			$input = str_replace("*", "", $input);
			$input = str_replace("script", "", $input);
			$input = str_replace(" and ", "", $input);
			$input = str_replace(" or ", "", $input);
			$input = str_replace("'", "", $input);
			$input = str_replace('"', '', $input);
			return ($input);
		}
	}


if (!function_exists('settings'))
{
	function settings($id_or_shortname)
	{
		global $conn;
		if (is_int($id_or_shortname))
			$sql = "SELECT *FROM settings WHERE id='$id_or_shortname' LIMIT 1";
		else 
			$sql = "SELECT *FROM settings WHERE shortname='$id_or_shortname' LIMIT 1";

		$result = mysqli_query($conn,$sql);
		
		if (mysqli_num_rows($result)==1)
			{
				$data = mysqli_fetch_array($result);
				return $data["value"];
			}
			else
				return "";
	}
}

// if (!function_exists(parameters))
// {
// 	function parameters($param_name)
// 	{
// 		global $conn;
// 			$sql = "SELECT *FROM parameters WHERE name='$param_name' LIMIT 1";
	
// 		$result = mysqli_query($conn,$sql);
		
// 		if (mysqli_num_rows($result)==1)
// 			{
// 				$data = mysqli_fetch_array($result);
// 				return $data["value"];
// 			}
// 			else
// 				return "";
// 	}
// }


if (!function_exists('gmt'))
	{
		function gmt($gmt,$timestamp)
		{
			return (date('Y-m-d H:i:s',strtotime($gmt, strtotime($timestamp))));
		}
	}


	if (!function_exists("notification"))
	{
		function notification($type,$id)
		{
			switch ($type) {
				case 'order':
					global $conn;
					$from_member=$to_member=0;
					$order_id = $id;
					
					$image = "";
					$text = "Захиалга үүсгэгдэв";
					$link = "orders2?action=detail&id=".$order_id;
					
					$sql_temp = "SELECT customer_id,total_sum FROM orders2 WHERE id='$order_id'";
					$result_temp= mysqli_query($conn,$sql_temp);
					$data_temp = mysqli_fetch_array($result_temp);
					$user_id = $data_temp["customer_id"];
					$price = $data_temp["total_sum"];
					
					$sql_temp = "INSERT INTO notification (image,from_member,to_member,text,link,user_id,price) 
					VALUES ('$image','$from_member','$to_member','$text','$link','$user_id','$price')";
					mysqli_query($conn,$sql_temp);
					break;
				
				default:
					# code...
					break;
			}

		}
	}

	if (!function_exists("isJson"))
	{
		function isJson($string) {
			json_decode($string);
			return (json_last_error() == JSON_ERROR_NONE);
		}
	}

		

	function getAuthorizationHeader()
	{
		$headers = null;
		if (isset($_SERVER['Authorization'])) {
			$headers = trim($_SERVER["Authorization"]);
		}
		else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
			$headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
		} elseif (function_exists('apache_request_headers')) {
			$requestHeaders = apache_request_headers();
			// Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
			$requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
			//print_r($requestHeaders);
			if (isset($requestHeaders['Authorization'])) {
				$headers = trim($requestHeaders['Authorization']);
			}
		}
		return $headers;
	}
	/**
	* get access token from header
	* */
	function getBearerToken() {
		$headers = getAuthorizationHeader();
		// HEADER: Get the access token from the header
		if (!empty($headers)) {
			if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
				return $matches[1];
			}
		}
		return null;
	}

?>