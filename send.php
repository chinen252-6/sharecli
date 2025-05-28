<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 入力を取得
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $company = htmlspecialchars($_POST['company'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8');
    $employees = htmlspecialchars($_POST['employees'], ENT_QUOTES, 'UTF-8');
    $status = isset($_POST['status']) ? implode(", ", $_POST['status']) : '';
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    // 送信先メールアドレス
    $to = "satoukibi6@gmail.com";  

    // 件名
    $subject = "お問い合わせフォームからの送信";

    // メール本文
    $body = <<<EOD
以下の内容が送信されました。

【お名前】
$name

【店舗名・会社名】
$company

【メールアドレス】
$email

【電話番号】
$tel

【従業員数】
$employees

【検討状況】
$status

【お問い合わせ内容】
$message
EOD;

    // メールヘッダー
    $headers = "From: $email";

    // メール送信
    if (mail($to, $subject, $body, $headers)) {
        echo "送信が完了しました。ありがとうございました。";
    } else {
        echo "メールの送信に失敗しました。";
    }
} else {
    echo "不正なアクセスです。";
}
?>
