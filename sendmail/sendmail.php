<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('uk', 'phpmailer/language/');
$mail->isHTML(true);


$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // SMTP сервера вашей почты
$mail->SMTPAuth = true;
$mail->Username = 'asanheyaa@gmail.com'; // Логин на почте
$mail->Password = 'cwapyrrgrhpxyfut'; // Пароль на почте
$mail->Port = 587;
$mail->SMTPSecure = 'TLS';

// Від кого лист
$mail->setFrom('asanheyaa@gmail.com', 'Замовлення');
// Кому відправити
$mail->addAddress('dzonniul@gmail.com');

// Текст письма
$mail->Subject = 'Замовлення StrumStart';


// Тіло письма 
$body = '<h1>Нове Замовлення StrumStart:</h1>';

if (trim(!empty($_POST['userName']))) {
	$body .= '<p><strong>Імя:</strong> ' . $_POST['userName'] . '</p>';
}
if (trim(!empty($_POST['userNumberPhone']))) {
	$body .= '<p><strong>Номер телефону:</strong> ' . $_POST['userNumberPhone'] . '</p>';
}

if (trim(!empty($_POST['userMessage']))) {
	$body .= '<p><strong>Повідомлення:</strong> ' . $_POST['userMessage'] . '</p>';
}

// Прикріпити файл
if (!empty($_FILES['image']['tmp_name'])) {
	// шлях завантаження файлу
	$filePath = __DIR__ . "/files/" . $_FILES['image']['name'];
	// завантажуємо файл
	if (copy($_FILES['image']['tmp_name'], $filePath)) {
		$fileAttach = $filePath;
		$body .= '<p><strong>Photo in attachment</strong></p>';
		$mail->addAttachment($fileAttach);
	}
}

$mail->Body = $body;

// Відправляєм

$mail->send();
$mail->smtpClose();
