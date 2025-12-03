<?php

require "vendor/autoload.php";

require  __DIR__."/EmailService.php";
require __DIR__."/MailtrapProvider.php";


if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['mensaje'])){
    header('Location:formulario.php?error=1');
    exit();
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    header('Location:formulario.php?error=2');
    exit();
}


$ProveedorCorreo= new MailtrapProvider();
$correo_enviado= $email= new EmailService($ProveedorCorreo);
$email->sendEmail(
    to: $_POST['email'],
    subject: $_POST['nombre'],
    body: $_POST['mensaje'],

);

$correo_enviado?->header('Location:formulario.php?success=1');
exit();
header('Location:formulario.php?error=3');
exit();