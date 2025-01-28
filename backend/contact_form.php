<?php
    
    require 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['form_checkbox'])) {
            echo ("Bitte akzeptieren die die Datenschutzerklärung um mich zu kontaktieren!");
            exit;
        }
        $name = $_POST['form_name'];
        $email = $_POST['form_mail'];
        $message = $_POST['form_msg'];

        $stmt = $mysqli->prepare("INSERT INTO Kontakte (name, mail, nachricht) VALUES (?, ?, ?)");
        $stmt -> bind_param("sss", $name, $email, $message);

        if ($stmt -> execute()) {
            $stmt -> close();

            require 'mail.php';
            header("Location: ../public/index.php#contact");
            exit;

        } else {
            echo ("Anfrage fehlgeschlagen");
        }
    }
?>