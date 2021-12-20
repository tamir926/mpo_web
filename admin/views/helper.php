<?
	//require_once ('../config.php');

	if (!function_exists("protect"))
	{
		function protect($input)
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


if (!function_exists("settings"))
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

if (!function_exists("parameters"))
{
	function parameters($param_name)
	{
		global $conn;
			$sql = "SELECT *FROM parameters WHERE name='$param_name' LIMIT 1";
	
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

if (!function_exists("price"))
{
	function price($product,$rank)
	{
		global $conn;
		$sql = "SELECT *FROM products WHERE id='$product' LIMIT 1";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)==1)
		{
			$data = mysqli_fetch_array($result);
			switch ($rank)
			{
				case 'G1':
					return ($data["price_G1"]);
					break;
				case 'G2':
					return ($data["price_G2"]);
					break;
				case 'G3':
					return ($data["price_G3"]);
					break;
				case 'G4':
					return ($data["price_G4"]);
					break;
				case 'G5':
					return ($data["price_G5"]);
					break;
				case 'G6':
					return ($data["price_G6"]);
					break;
				case 'G7':
					return ($data["price_G7"]);
					break;
				case 'G8':
					return ($data["price_G8"]);
					break;
				case 'G9':
					return ($data["price_G9"]);
					break;
				case 'G10':
					return ($data["price_G10"]);
					break;
				default:
					return ($data["price_G3"]);
					break;
			}
		}
		else return (0);
	}
}

if (!function_exists("customer"))
{
	function customer($customer_id,$guest_or_user)
	{
		global $conn;
		if ($guest_or_user==1) $sql_temp = "SELECT *FROM guest WHERE guest_id='$customer_id' LIMIT 1";
		if ($guest_or_user==2) $sql_temp = "SELECT *FROM user WHERE id='$customer_id' LIMIT 1";
		
		$result_temp = mysqli_query($conn,$sql_temp);
		if (mysqli_num_rows($result_temp)==1)
			{
				$data_temp = mysqli_fetch_array($result_temp);
				return ($data_temp);
			}
			else
				return "";
	}
}


if (!function_exists("progress"))
{
	function progress($input)
	{
		if ($input<5) return 0;
		if ($input>=5 && $input<10) return 5;
		if ($input>=10 && $input<15) return 10;
		if ($input>=15 && $input<20) return 15;
		if ($input>=20 && $input<25) return 20;
		if ($input>=25 && $input<30) return 25;
		if ($input>=30 && $input<35) return 30;
		if ($input>=35 && $input<40) return 35;
		if ($input>=40 && $input<45) return 40;
		if ($input>=45 && $input<50) return 45;
		if ($input>=50 && $input<55) return 50;
		if ($input>=55 && $input<60) return 55;
		if ($input>=60 && $input<65) return 60;
		if ($input>=65 && $input<70) return 65;
		if ($input>=70 && $input<75) return 70;
		if ($input>=75 && $input<80) return 75;
		if ($input>=80 && $input<85) return 80;
		if ($input>=85 && $input<90) return 85;
		if ($input>=90 && $input<95) return 90;
		if ($input>=95 && $input<100) return 95;
		if ($input>=100) return 100;
	}
}

if (!function_exists("status"))
	{
		function status($input)
		{
		switch ($input)
			{
				case "placed":return "Шинэ";break;
				case "pending":return "Баталгаажсан";break;
				case "later":return "Хойшлуулсан";break;
				case "onway":return "Хүргэлтэнд";break;
				case "cancel":return "Цуцлагдсан";break;				
				case "delivered":return "ХҮРГЭГДСЭН";break;
				default: return $input; break;
			}
		}
	}

if (!function_exists("gmt"))
	{
		function gmt($gmt,$timestamp)
		{
			if ($timestamp<>"0000-00-00 00:00:00")
			return (date('Y-m-d H:i:s',strtotime($gmt." hours", strtotime($timestamp))));
			else  return "---";
		}
	}
if (!function_exists("nationality"))
{
	function nationality($input)
	{
		switch ($input)
		{
			case ("altai-urianhai") : 
			case (1): return "Алтайн Урианхай";break;
			case ("barga") : case (2): return "Барга";break;
			case ("baoan") : case (3): return "Баоань";break;
			case ("bayd") : case (4): return "Баяд";break;
			case ("buriad") : case (5): return "Буриад";break;
			case ("darhad") : case (6): return "Дархад";break;
			case ("dariganga") : case (7): return "Дарьганга";break;
			case ("deed") : case (8): return "Дээд Монголчууд";break;
			case ("durvud") : case (9): return "Дөрвөд";break;
			case ("zahchin") : case (10): return "Захчин";break;
			case ("kazak") : case (11): return "Казах Хасаг";break;
			case ("mongor") : case (12): return "Монгор Ту";break;
			case ("myngad") : case (13): return "Мянгад";break;
			case ("uuld") : case (14): return "Өөлд";break;
			case ("oirad") : case (15): return "Синьцзяны Ойрадууд";break;
			case ("torguud") : case (16): return "Торгууд";break;
			case ("tuva") : case (17): return "Тува Урианхай";break;
			case ("uzemchin") : case (18): return "Үзэмчин";break;
			case ("halh") : case (19): return "Халх";break;
			case ("hamniga") : case (20): return "Хамниган";break;
			case ("hotogoid") : case (21): return "Хотогойд";break;
			case ("hoton") : case (22): return "Хотон";break;
			case ("huvsgul-urianhai") : case (23): return "Хөвсгөлийн Урианхай Ар Ширхтэн Урианхай";break;
			case ("halh") : case (24): return "Халх";break;
			case ("tsahar") : case (25): return "Цахар";break;
		}
	}
}

if (!function_exists("cards_in_image"))
{
	function cards_in_image($cards,$size)
	{
		global $conn;
		$return="";
		if ($size<0 || $size>60) $size = 60;
		foreach(explode(",",$cards) as $single_card)
		{
			$single_card =str_replace(" ","",$single_card);
			//if (file_exists("img/'.$single_card.'.png"))
			$return.='<img src="img/'.$single_card.'.png" width="'.$size.'" style="align:left">';
			//else $return .=$single_card.",";
		}
		return $return;
	}
}

if (!function_exists("resize_image"))
{
	function resize_image($file, $w, $h, $crop=FALSE) 
	{
		list($width, $height) = getimagesize($file);
		$r = $width / $height;
		if ($crop) {
			if ($width > $height) {
				$width = ceil($width-($width*abs($r-$w/$h)));
			} else {
				$height = ceil($height-($height*abs($r-$w/$h)));
			}
			$newwidth = $w;
			$newheight = $h;
		} else {
			if ($w/$h > $r) {
				$newwidth = $h*$r;
				$newheight = $h;
			} else {
				$newheight = $w/$r;
				$newwidth = $w;
			}
		}
		$src = imagecreatefromjpeg($file);
		$dst = imagecreatetruecolor($newwidth, $newheight);
		imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		return $dst;
	}
}


?>