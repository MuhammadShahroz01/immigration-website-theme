
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



if (isset($_POST['send'])) {
    $nameForm = $_POST['name'];
    $emailForm = $_POST['email'];
    $phoneForm = $_POST['phone'];
    $subjectForm = $_POST['subject'];
    $messageForm = $_POST['message'];


    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'singlesolution.email.sender@gmail.com';
    $mail->Password = 'ynyzwxoiqqvpmjmi';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('singlesolution.email.sender@gmail.com', 'Immigration.com');
    $mail->addAddress('chshahroz69@gmail.com', 'Immigration.com');




    $mail->Subject = 'Subject';
    $mail->Body = 'Email';



    $html = file_get_contents('contact.html');

    $html = str_replace('{{name}}', $nameForm, $html);
    $html = str_replace('{{email}}', $emailForm, $html);
    $html = str_replace('{{phone}}', $phoneForm, $html);
    $html = str_replace('{{subject}}', $subjectForm, $html);
    $html = str_replace('{{message}}', $messageForm, $html);
    $mail->msgHTML($html);




    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        echo "<script>location='../../contact.php?status=2'</script>";
    } else {
        echo "<script>location='../../index.php?status=1'</script>";
    }
}

?>