<?php
session_start();
require_once '../vendor/autoload.php';

use Twilio\Rest\Client;

// Variáveis devem vir do .env ou variáveis de ambiente
$sid    = getenv('TWILIO_SID'); 
$token  = getenv('TWILIO_TOKEN'); 
$twilioNumber = getenv('TWILIO_NUMBER');

$client = new Client($sid, $token);

$telefone = $_POST['telefone'];
$codigo = rand(100000, 999999);

$_SESSION['codigo_verificacao'] = $codigo;
$_SESSION['telefone'] = $telefone;

try {
    $client->messages->create(
        $telefone,
        [
            'from' => $twilioNumber,
            'body' => "Seu código de verificação é: $codigo"
        ]
    );
    header("Location: http://localhost/CanedoBooks/confirma2fa.html");
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: " . $e->getMessage();
}
