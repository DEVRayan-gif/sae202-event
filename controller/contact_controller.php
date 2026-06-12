<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/var/www/sae202-event/vendor/autoload.php';

function envoyer() {
    $nom     = trim($_POST['nom'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $objet   = trim($_POST['objet'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($nom) || empty($email) || empty($message)) {
        $_SESSION['erreur'] = "Veuillez remplir tous les champs.";
        header('Location: /info_pratique');
        exit;
    }

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'chraibirayan6@gmail.com'; // ton gmail
        $mail->Password   = 'qjoh rwvf ziuh lvwt'; // mot de passe app Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom('chraibirayan6@gmail.com', 'OMNI Contact');
        $mail->addAddress('chraibirayan6@gmail.com');
        $mail->addReplyTo($email, $nom);

        $mail->Subject = "[OMNI] $objet - $nom";
        $mail->Body    = "Nom : $nom\nEmail : $email\nObjet : $objet\n\nMessage :\n$message";

        $mail->send();
        $_SESSION['succes'] = "Message transmis à OMNI. Nous vous répondrons sous 48h.";
        header('Location: /info_pratique');
        exit;

    } catch (Exception $e) {
        $_SESSION['erreur'] = "Erreur : " . $mail->ErrorInfo;
    }

    header('Location: /info_pratique');
    exit;
}