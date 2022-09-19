<?php

header('Content-type: application/json');

require_once('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->isHTML(true);
$mail->setLanguage("br");
$mail->Charset = "utf-8";
$mail->SMTPAuth   = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Host       = 'smtp.hostinger.com';
$mail->Username   = 'services@estilodev.com.br';
$mail->Password   = 'Services@2023';
$mail->Port       = 587;
$mail->AltBody = 'New Lead';    
$mail->setFrom('services@estilodev.com.br','Email de testes'); //quem está enviando
$mail->addAddress('fabioo_defreitas@hotmail.com','Fabio'); //quem vai receber

if ($_POST) {
    $mail->Subject = $_POST['subject'];
    $mail->Body    = "
        <h1>New Lead</h1>
        <p>Nome: " . $_POST['name'] . "</p>
        <p>E-mail: " . $_POST['email'] . "</p>
        <p>Assunto: " . $_POST['subject'] . "</p>
        <p>Mensagem: " . $_POST['message'] . "</p>
    ";

    try {
        if ($mail->send()) {
            echo json_encode([
                "data"=>"success"
            ]);
        } else {
            echo json_encode([
                "data"=>"error"
            ]);
        }
    } catch (\Throwable $th) {
        echo $th;
    } 
}

?>