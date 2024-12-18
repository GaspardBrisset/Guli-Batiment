<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);
$messageRecu = "
    <html>
        <head>
            <title>  </title>
        </head>
        <body>
            <table>
                <tr>
                    <td><p><b>Bonjour, </p>
                    <p>La personne du nom de " . $name . " vous a anvoyé un mail. Pour le contacter vous pouvais le contacter à " . $email . ".</p>
                   <p> Voici le contenu de ce mail :</p> 
                   <p>" . $message . "</p> 
                   </td>
                </tr>
            </table>
        </body>
    </html>";
try {
    // Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->SMTPDebug = 0; // Mode de débogage (0 pour désactiver, 1 pour les messages clients, 2 pour tous les messages)
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Utiliser TLS de manière sécurisée
    $mail->SMTPAuth = true;
    $mail->Username = 'guli.batiment.contact@gmail.com';                     //SMTP username
    $mail->Password = 'bfcl zffz xceh iasf';                               //SMTP password

    //Recipients
    $mail->setFrom('guli.batiment.contact@gmail.com', 'Information');
    $mail->addAddress('guli.batiment.contact@gmail.com', 'Joe User');     //Add a recipient
    $mail->addAddress('guli.batiment.contact@gmail.com');               //Name is optional
    $mail->addReplyTo('guli.batiment.contact@gmail.com', 'Information');

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $messageRecu;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $successMessage = "Votre message a été envoyé avec succès.";
    $successTitre = "Confirmation d'envoi.";

} catch (Exception $e) {
    $successMessage = "Il y a un problème dans votre mail.";
    $successTitre = "Erreur d'envoi.";
}

?>
<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Confirmation d'envoi</title>
</head>

<body id="contact-page">
    <section id="contact">
        <h2><?php echo $successTitre; ?></h2>
        <p><?php echo $successMessage; ?></p>
        <a href="index.php">Retour à l'accueil</a>
    </section>
    <?php include_once 'footer.php'; ?>
</body>

</html>