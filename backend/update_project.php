<?php
    session_start();
    require 'config.php'; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Hole alle Formulardaten
        $projektname = htmlspecialchars($_POST['edit_projektname']);
        $projektnameEn = htmlspecialchars($_POST['edit_projektname_en']);
        $description = htmlspecialchars($_POST['edit_description']);
        $descriptionEn = htmlspecialchars($_POST['edit_description_en']);
        $livelink = htmlspecialchars($_POST['edit_livelink']);
        $gitlink = htmlspecialchars($_POST['edit_gitlink']);
        $id = htmlspecialchars($_POST['edit_id']);
        
        // Bildverarbeitung
        if (isset($_FILES['edit_image']) && $_FILES['edit_image']['error'] == 0) {
            // Wenn ein neues Bild hochgeladen wurde, lese es ein
            $image = file_get_contents($_FILES['edit_image']['tmp_name']);
        } else {
            // Wenn kein neues Bild hochgeladen wird, das vorhandene Bild beibehalten
            $stmt = $mysqli->prepare("SELECT image FROM Projekte WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($image);
            $stmt->fetch();
            $stmt->close();
        }

        $stmt = $mysqli->prepare("UPDATE Projekte SET image=?, name=?, name_en=?, description=?, description_en=?, livelink=?, gitlink=? WHERE id=?");
        $stmt -> bind_param("bssssssi", $null, $projektname, $projektnameEn, $description, $descriptionEn, $livelink, $gitlink, $id);
        $stmt -> send_long_data(0, $image);
        if ($stmt -> execute()) {
            $stmt -> close();
            header("Location: edit_project.php?id=$id");
        } else {
            echo ("Update fehlgeschlagen :(");
        }
    }

?>