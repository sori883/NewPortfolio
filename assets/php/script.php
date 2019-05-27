<?php
////////////////////////////////////////////////////////////
//init
////////////////////////////////////////////////////////////
$encode = "UTF-8"
$site_top = "https://sori883.com/";
$to = "hello@sori883.com";
$subject = "ポートフォリオのお問い合わせ";

$email = $_POST['Email'];
$message = $_POST['Message'];

//タイムゾーン
date_default_timezone_set('Asia/Tokyo');



////////////////////////////////////////////////////////////
//実行
////////////////////////////////////////////////////////////

//メール形式確認
function checkMail($mail){
	$mailaddress_array = explode('@',$mail);
	if(preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/", "$mail") && count($mailaddress_array) ==2){
		return true;
	}else{
		return false;
	}
}

//htmlタグとかをプレーンテキストに変換
function htmlEntity($string) {
	global $encode;
	return htmlspecialchars($string, ENT_QUOTES,$encode);
}


////////////////////////////////////////////////////////////
//関数
////////////////////////////////////////////////////////////






?>