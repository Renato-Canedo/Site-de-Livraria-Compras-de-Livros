<?php

$codigoDigitado = $_POST['numero'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoDigitado = $_POST['codigo'];
    $codigoCorreto = $_SESSION['codigo'];

    if ($codigoDigitado == $codigoCorreto) {
        header('Location: ../sucesso2fa.html');
        exit();
    } else {
        echo "Código incorreto. Tente novamente.";
    }
}
?>