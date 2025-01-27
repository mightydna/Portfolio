<?php
    session_start();
    require 'config.php'; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Hole alle Formulardaten
        $projektname = $_POST['edit_projektname'];
        $description = $_POST['edit_description'];
        $livelink = $_POST['edit_livelink'];
        $gitlink = $_POST['edit_gitlink'];
        $id = $_POST['edit_id'];
        
        echo $projektname;
        // Bildverarbeitung
        $image = null;
        if (isset($_FILES['edit_image']) && $_FILES['edit_image']['error'] == 0) {
            // Wenn ein neues Bild hochgeladen wurde, lese es ein
            $image = file_get_contents($_FILES['edit_image']['tmp_name']);
        }
 
        //echo $image;

        $stmt = $mysqli->prepare("UPDATE Projekte SET image=?, name=?, description=?, livelink=?, gitlink=? WHERE id=?");
        $stmt -> bind_param("bssssi", $null, $projektname, $description, $livelink, $gitlink, $id);
        $stmt -> send_long_data(0, $image);
        if ($stmt -> execute()) {
            $stmt -> close();
            header("Location: edit_project.php?id=$id");
        } else {
            echo ("Update fehlgeschlagen :(");
        }
    }

?>