<?php
    
    require 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['form_checkbox'])) {
            echo ("Bitte akzeptieren Sie die Datenschutzerklärung um mich zu kontaktieren!");
            exit();
        }
        $name = htmlspecialchars($_POST['form_name']);
        $email = htmlspecialchars($_POST['form_mail']);
        $message = htmlspecialchars($_POST['form_msg']);

        $stmt = $mysqli->prepare("INSERT INTO Kontakte (name, mail, nachricht) VALUES (?, ?, ?)");
        $stmt -> bind_param("sss", $name, $email, $message);

        if ($stmt -> execute()) {
            $stmt -> close();

            require 'mail.php';
            exit();

        } else {
            echo ("Anfrage fehlgeschlagen");
        }
    }
?>