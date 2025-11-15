<?php
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];
$link_confirmacao = "https://localhost/CanedoBooks/novasenha.html";

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'canedosbooks@gmail.com';
    $mail->Password = 'hugi rnqu ypej kltk';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('canedosbooks@gmail.com', 'Canedos Books');
    $mail->addAddress($email);

    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Subject = 'Recuperação de conta | Canedo Books';
    $mail->Body    = "<h3>Acesse o link abaixo para realizar a recuperação de sua conta:</h3>
                      <p><a href='$link_confirmacao'>Confirmar Cadastro</a></p>";

    $mail->send();
    header('Location: ../confirmaRecuperacaoSenha.html');
} catch (Exception $e) {
    echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
}
?>
