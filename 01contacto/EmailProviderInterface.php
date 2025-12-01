<?php


/*
 * Interfaz que define el contrato para los proveedores de email.
 * Cualquier clase que implemente esta interfaz debe proporcionar
 * una implementación del método sendEmail.
 * Este enfoque permite la flexibilidad de cambiar el proveedor
 * de email sin afectar al resto de la aplicación.
 *
 */
interface EmailProviderInterface
{
     public function sendEmail(string $to, string  $subject, string  $body): bool;
}