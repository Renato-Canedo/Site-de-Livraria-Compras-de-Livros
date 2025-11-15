<?php
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$nome = $_POST['nome'];
$email = $_POST['email'];
$link_confirmacao = "https://localhost/CanedoBooks/sucessoCadastro.html";

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
    $mail->addAddress($email, $nome);

    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Subject = 'Bem-vindo ao Canedos Books, ' . $nome . '!';
    $mail->Body    = "<h3>Olá, $nome!</h3><p>Seja bem-vindo ao Canedos Books. Clique no link abaixo para confirmar seu cadastro:</p>
                      <p><a href='$link_confirmacao'>Confirmar Cadastro</a></p>";
    $mail->AltBody = "Olá, $nome! Seja bem-vindo ao Canedos Books. Para confirmar seu cadastro, acesse: $link_confirmacao";

    $mail->send();
    header("Location: http://localhost/CanedoBooks/confirmaCadastro.html");
} catch (Exception $e) {
    echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
}
?>
