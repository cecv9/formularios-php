<?php
/*
 * Clase de servicio de email que utiliza un proveedor de email
 * para enviar correos electrónicos.
 * Esta clase depende de la interfaz EmailProviderInterface,
 * lo que permite la inyección de diferentes implementaciones
 * de proveedores de email (por ejemplo, Mailtrap, SendGrid, etc.).
 */

final  class  EmailService
{
    public function __construct(private  readonly  EmailProviderInterface  $emailProvider)
    {}

    public function sendEmail(string $to, string  $subject, string  $body): bool
    {
         return  $this->emailProvider->sendEmail($to, $subject, $body);
    }

}
