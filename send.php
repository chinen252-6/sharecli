<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $company = htmlspecialchars($_POST['company'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8');
    $employees = htmlspecialchars($_POST['employees'], ENT_QUOTES, 'UTF-8');
    $status = isset($_POST['status']) ? implode(", ", $_POST['status']) : '';
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    $to = "satoukibi6@gmail.com";
    $subject = "お問い合わせフォームからの送信";
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

    $headers = "From: k.chinen@shovel-creators.website\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('送信が完了しました。ありがとうございました。'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('メールの送信に失敗しました。'); window.location.href = 'index.html';</script>";
    }
} else {
    echo "<script>alert('不正なアクセスです。'); window.location.href = 'index.html';</script>";
}
