<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Lade die .env-Datei
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$mailHost = $_ENV['MAIL_HOST'];
$mailUser = $_ENV['MAIL_USERNAME'];
$mailPass = $_ENV['MAIL_PASSWORD'];

   $mail = new PHPMailer(true);
   $_Name = $_POST['form_name'];  
   $_Mail = $_POST['form_mail'];
   $_Mailtext = $_POST['form_msg'];

   try {
        //$mail->SMTPDebug = 2; // Debugging aktivieren
        //$mail->Debugoutput = 'html'; 
    
       // Server-Einstellungen
       $mail->isSMTP();
       $mail->Host       = $mailHost; // Host Adresse
       $mail->SMTPAuth   = true;
       $mail->Username   = $mailUser; // Absender E-Mail-Adresse
       $mail->Password   = $mailPass;            // Account Passwort
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Verschlüsselung
       $mail->Port       = 465; // Port abhängig von der Verschlüsselung
 
       // Empfänger
       $mail->setFrom($mailUser, $_Name); // Absender, muss identisch sein mit Username
       $mail->addAddress('webmaster@nageldominik.de', 'NAME_EINFUEGEN'); // Empfänger-Adresse und Name

       // Inhalte der E-Mail
       $mail->isHTML(true);
       $mail->Subject = 'Portfolio Kontaktanfrage';
       $mail->Body    = 'Absender: ' . $_Mail . '</br>' . 'Nachricht: ' . $_Mailtext;
       $mail->AltBody = $_Mailtext;

       $mail->send();

   } catch (Exception $e) {
       echo "E-Mail konnte nicht gesendet werden. Fehler: {$mail->ErrorInfo}";
   }
?>