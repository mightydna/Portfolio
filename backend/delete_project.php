<?php
    session_start();
    require 'config.php'; 

    if (isset($_GET['id'])) {
        echo ("Projekt ID: " . $_GET['id']);
        $project_id = $_GET['id'];

        $stmt = $mysqli->prepare("DELETE FROM Projekte WHERE id = ?");
        $stmt -> bind_param("i", $project_id);
        $stmt -> execute();
        $stmt -> close();

        header("Location: ../public/cockpit.php");
        exit;
    } else {
        echo ("Projekt-ID falsch");
    }

?>