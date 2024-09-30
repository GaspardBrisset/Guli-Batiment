<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assurez-vous que le chemin est correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Serveur SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'brissetgaspard@gmail.com'; // Votre adresse email
        $mail->Password = 'Br1sset2001.@'; // Votre mot de passe ou mot de passe d'application
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinataire
        $mail->setFrom('brissetgaspard@gmail.com', 'Nom d\'expéditeur');
        $mail->addAddress('destinataire@example.com'); // Remplacez par l'adresse email du destinataire

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = "Nouveau message de $name: $subject";
        $mail->Body    = nl2br("Nom: $name<br>Email: $email<br>Message:<br>$message");

        // Envoi de l'email
        $mail->send();
        echo 'Message envoyé avec succès.';
    } catch (Exception $e) {
        echo "Échec de l'envoi du message. Erreur: {$mail->ErrorInfo}";
    }
} else {
    echo "Méthode de requête non valide.";
}
?>