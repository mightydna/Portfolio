<?php
    session_start();
    require 'config.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = htmlspecialchars($_POST['login_username']);
        $password = htmlspecialchars($_POST['login_password']);
    }

    if(!empty($username) && !empty($password)) {
        $stmt = $mysqli->prepare("SELECT id, username, password FROM User WHERE username = ?");
        $stmt -> bind_param("s", $username);
        $stmt -> execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            echo ("User existiert!!!!");
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header("Location: ../public/cockpit.php");
                exit();
            } else {
                echo ("Passwort falsch!");
                echo '
                <a href="../public/cockpit.php"><button id="back_button">Zurück</button></a>
                ';
            }
        } else {
            echo ("User existiert nicht!");
            echo '
                <a href="../public/cockpit.php"><button id="back_button">Zurück</button></a>
            ';
        }
        $stmt->close();
    }

?>