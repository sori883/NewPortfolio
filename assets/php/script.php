<?php
$encode = "UTF-8"
$site_top = "https://sori883.com/";
$to = "hello@sori883.com";
$Referer_check_domain = "sori883.com";
$email = $_POST['Email'];
$message = $_POST['Message'];
$subject = "ポートフォリオのお問い合わせ";

//タイムゾーン
date_default_timezone_set('Asia/Tokyo');



//メールチェック
if(empty($email){
    if(!checkMail($val)){
    $errm .= "<p class=\"error_messe\">【".$key."】はメールアドレスの形式が正しくありません。</p>\n";
    $empty_flag = 1;
    }
}

//メール送信
mail($to,$subject,$adminBody,$header);





function checkMail($str){
	$mailaddress_array = explode('@',$str);
	if(preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/", "$str") && count($mailaddress_array) ==2){
		return true;
	}else{
		return false;
	}
}

//htmlタグの無効化
function h($string) {
	global $encode;
	return htmlspecialchars($string, ENT_QUOTES,$encode);
}

?>