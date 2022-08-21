<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

class TestEmail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';
    }

    public function kontol()
    {
        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nugrahaadrian613@gmail.com'; // user email anda
        $mail->Password = 'gylvjrqsfymuwbim'; // password email anda
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('nugrahaadrian613@gmail.com', 'STMIK Bandung'); // user email anda
        $mail->addReplyTo('nugrahaadrian613@gmail.com', ''); //user email anda

        // Email subject
        $mail->Subject = 'Pemberitahuan Approve Pembayaran'; //subject email

        // Add a recipient
        $mail->addAddress("dadanibnu61@gmail.com"); //email tujuan pengiriman email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "hello guys"; // isi email
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
}
