<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'apikey';                     //SMTP username
    $mail->Password   = 'apikey-copiar-paineltwilio';  //SMTP password
    //Usando recurso SMTP da Twilio (SendGrid) 
    // https://www.twilio.com/en-us/products/email-api/smtp-service                              //SMTP password

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($_POST['femail'], $_POST['fnome']);
    $mail->addAddress('sandroaf@unidavi.edu.br', 'Sandro Alencar Fernandes');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo($_POST['femail'], $_POST['fnome']);
    $mail->addCC('sandro@arealocal.com.br');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contato site DEVs-TI 2026';
    $corpo = "Telefone: " . $_POST["ffone"];
    $corpo = $corpo . "\n\r" . $_POST["fmsg"];
    $mail->Body    = $corpo;
    $mail->AltBody = $corpo;

    $mail->send();
    $msg = 'Sucesso! Sua mensagem foi enviada';
} catch (Exception $e) {
    echo "ERRO! Mensagem não foi enviar. Mailer código erro: {$mail->ErrorInfo}";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato por e-mail</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <br>
    <main>
        <h1>Contato - Mensagem</h1>
        <br>
        <?php
        echo "<h2>$msg</h2><br>";
        echo "Mensagem de: <strong>" . $_POST["fnome"] . "</strong>";
        echo "<br>";
        echo "Telefone: " . $_POST["ffone"] . " e-mail: " . $_POST["femail"];
        echo "<br>";
        echo "Mensagem: <br>";
        echo "<pre>" . $_POST["fmsg"] . "</pre>";
        ?>
    </main>
</body>

</html>