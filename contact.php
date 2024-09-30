<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre CSS -->
    <title>Contact</title>
</head>
<body id="contact-page">
    <?php include_once 'header.php'; ?>
    <!-- Section Contact -->
    <section id="contact">
        <h2>Contactez-nous</h2>
        <p>Pour toute question ou demande de devis, n'hésitez pas à nous contacter via le formulaire ci-dessous.</p>
        <form action="send.php" method="post">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" placeholder="Votre nom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Votre email" required>
            </div>
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" placeholder="Votre numéro de téléphone">
            </div>
            <div class="form-group">
                <label for="subject">Sujet</label>
                <input type="text" id="subject" name="subject" placeholder="Objet de votre demande" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Votre message" rows="5" required></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </section>
    <?php include_once 'footer.php'; ?>
</body>
</html>