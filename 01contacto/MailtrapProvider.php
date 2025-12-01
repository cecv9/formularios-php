<?php
/*
 * Implementación del proveedor de email utilizando Mailtrap.
 * Esta clase implementa la interfaz EmailProviderInterface,
 * proporcionando una implementación concreta del método sendEmail.
 * Utiliza la biblioteca PHPMailer para enviar correos electrónicos
 * a través del servicio SMTP de Mailtrap.
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require  __DIR__.'/EmailProviderInterface.php';
require  'vendor/autoload.php';

final class MailtrapProvider implements EmailProviderInterface
{

    public function sendEmail(string $to, string $subject, string $body): bool
    {
        $mail = new PHPMailer(true);

            // Configuración del servidor
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '3b73d5280da28d';
        $mail->Password = 'cdba051001e024';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        try {
            // Configura y envía el mensaje
            $mail->setFrom('your@email.com', 'Your Name');
            $mail->addAddress('recipient@example.com', 'Recipient Name');
            $mail->Subject = 'Asunto del correo';
            $mail->Body = 'Cuerpo del mensaje';
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'El mensaje no pudo ser enviado.';
            echo 'Error de correo: ' . $mail->ErrorInfo;
            return false;
        }
    }
}

// Looking to send emails in production? Check out our Email API/SMTP product!
/*
$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '3b73d5280da28d';
$phpmailer->Password = 'cdba051001e024';
*/