<?php

date_default_timezone_set('Asia/Tokyo');

$postMail = $_POST['Email'];
$postMsg = $_POST['Message'];


$adminSubject = "ポートフォリオからお問い合わせが届きました。";
$adminMail = 'hello@sori883.com';
$adminName = 'sorinaji';
$signature = <<< FOOTER
──────────────────────────
Name:sorinaji
E-mail:hello@sori883.com
URL: https://sori883.com/
──────────────────────────
FOOTER;

$userSubject = 'お問い合わせありがとうございました。';

$adminHeader = '';
$adminBody = '';

$userBody = '';
$userHeader = '';


# 管理者用のheader作成
$adminHeader = adminHeader($postMail);
# 管理者用のbody作成
$adminBody = adminBody($postMsg, $signature);

# ユーザのheader作成
$userBody = userHeader($postMail);
# ユーザのbody作成
$userHeader = userBody($postMsg, $signature);

# 送信者に届くメール
mail($postMail, $userSubject, $userBody, $userHeader);
# サイト管理者に送信するメール
mail($adminMail, $adminSubject, $adminBody, $adminHeader);

# リダイレクト
header('Location: '.$_SERVER['HTTP_HOST'].'index.html');


# 管理者に送るメールのヘッダー
function adminHeader($postMail){
    $header .= "Content-Type:text/plain;charset=iso-2022-jp\r\nX-Mailer: PHP/".phpversion();
    $header .= "Return-Path: ". $postMail ."\r\n";
    $header .= "From:". $postMail ."\r\n";
    $header .= "Sender: " . $postMail ." \r\n";
    $header .= "Reply-To: " . $adminMail . " \r\n";
    $header .= "Organization: " . $postMail . " \r\n";
    $header .= "X-Sender: " . $postMail . "\r\n";
    $header .= "X-Priority: 3 \r\n";

    return $header;
}

# 管理者に送るメールのボディ
function adminBody($postMsg, $signature){
    $body .= "======================================================\n";
    $body .= $postMsg;
    $body .= "\n======================================================\n\n";
    $body .= "送信された日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
    $body .= "送信者のホスト名：".getHostByAddr(getenv('REMOTE_ADDR'))."\n";
    $body .= "問い合わせのページURL：".@$_SERVER['HTTP_REFERER']."\n";
    $body .= $signature;

    return $body;
}

# ユーザに送るメールのヘッダー
function userHeader($postMail){
    $header .= "Content-Type:text/plain;charset=iso-2022-jp\r\nX-Mailer: PHP/".phpversion();
    $header .= "Return-Path: ". $postMail ."\r\n";
    $header .= "From:". $adminMail ."\r\n";
    $header .= "Sender: " . $adminMail ." \r\n";
    $header .= "Reply-To: " . $postMail . " \r\n";
    $header .= "Organization: " . $adminName . " \r\n";
    $header .= "X-Sender: " . $adminMail . "\r\n";
    $header .= "X-Priority: 3 \r\n";

    return $header;
}

# ユーザに送るメールのボディ
function userBody($postMsg, $signature){
    $body .= "お問い合わせありがとうございます。\n";
    $body .= "問い合わせ内容は以下の通りです。\n";
    $body .= "======================================================\n";
    $body .= $postMsg;
    $body .= "\n======================================================\n\n";
    $body .= "問い合わせのページURL：".@$_SERVER['HTTP_REFERER']."\n";
    $body .= $signature;

    return $body;
}

?>