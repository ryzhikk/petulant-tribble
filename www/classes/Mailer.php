<?php


class Mailer {

    public function SendMail($message)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dianakrylowa@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->From = 'from@example.com';
        $mail->FromName = 'Test';
        $mail->addAddress('dianakrylowa@yandex.ru', 'Diana');

        $mail->Subject = 'Error!';
        $mail->Body = $message;

        if (!$mail->send()) {
            return 'Message could not be sent.Mailer Error: ' . $mail->ErrorInfo;
        }
        else {
            return 'Message has been sent';
        }
    }
} 