<?php
    session_start();
    require 'config.php'; 

    echo '
        <h2>Neues Projekt anlegen</h2>
        <form action="" method="POST" id="create_form" enctype="multipart/form-data">
        <label for="sorting_id">Sortier-ID: </label></br>
        <input type="text" name="sorting_id" id="sorting_id" placeholder="Sortier-ID"></br>
        <label for="create_projektname">Projektname: </label></br>
        <input type="text" name="create_projektname" id="create_projektname" placeholder="Projektname"></br>
        <label for="create_projektname_en">Projektname EN: </label></br>
        <input type="text" name="create_projektname_en" id="create_projektname_en" placeholder="Projektname EN"></br>
        <label for="create_description">Projektbeschreibung: </label></br>
        <textarea name="create_description" id="create_description" placeholder="Projektbeschreibung" cols="100" rows="10"></textarea></br>
        <label for="create_description_en">Projektbeschreibung EN: </label></br>
        <textarea name="create_description_en" id="create_description_en" placeholder="Projektbeschreibung EN" cols="100" rows="10"></textarea></br>
        <label for="create_image">Bild auswählen (nur .png!):</label></br>
        <input type="file" name="create_image" id="create_image"></br>
        <label for="create_livelink">Livelink: </label></br>
        <input type="text" name="create_livelink" id="create_livelink" placeholder="Livelink"></br>
        <label for="create_gitlink">Livelink: </label></br>
        <input type="text" name="create_gitlink" id="create_gitlink" placeholder="Gitlink"></br>
        <input type="submit" name="create_submit" id="create_submit" value="Anlegen">
        </form>
    ';
    echo '
        <a href="../public/cockpit.php"><button id="back_button">Zurück</button></a>
        '; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sortierID = htmlspecialchars($POST["sorting_id"]);
        $projektname = htmlspecialchars($_POST["create_projektname"]);
        $projektnameEn = htmlspecialchars($_POST["create_projektname_en"]);
        $description = htmlspecialchars($_POST["create_description"]);
        $descriptionEn = htmlspecialchars($_POST["create_description_en"]);
        $livelink = htmlspecialchars($_POST["create_livelink"]);
        $gitlink = htmlspecialchars($_POST["create_gitlink"]);
        
        if (isset($_FILES['create_image']) && $_FILES['create_image']['error'] == 0) {
            $image = file_get_contents($_FILES['create_image']['tmp_name']);
        } else {
            echo "Fehler beim Hochladen des Bildes!";
            exit;
        }

        $stmt = $mysqli->prepare("INSERT INTO Projekte (image, sorting_id, name, name_en, description, description_en, livelink, gitlink) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("bissssss", $null, $sortierID, $projektname, $projektnameEn, $description, $descriptionEn, $livelink, $gitlink);
        $stmt -> send_long_data(0, $image);
        if ($stmt -> execute()) {
            $stmt -> close();
            header("Location: create_project.php");
            exit;
        } else {
            echo ("Eintrag fehlgeschlagen :(");
        }
    }

?>