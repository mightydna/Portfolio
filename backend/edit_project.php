<?php
    session_start();
    require 'config.php';

    if (isset($_GET['id'])) {
        echo ("Projekt ID: " . $_GET['id']);
        $project_id = $_GET['id'];

        $stmt = $mysqli->prepare("SELECT * FROM Projekte WHERE id = ?");
        $stmt -> bind_param("i", $project_id);
        $stmt -> execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            echo ("Projekt existiert!");
            
            echo '
                <a href="../public/cockpit.php"><button id="back_button">Zurück</button></a>
            ';

            $row = $result->fetch_assoc();
            $image = base64_encode($row['image']);
            echo '
                <form action="update_project.php" method="POST" id="edit_form" enctype="multipart/form-data">
                <label for="edit_sortingid">Sortier-ID: </label>
                <input type="text" name="edit_sortingid" id="edit_sortingid" placeholder="Sortier-ID" value="' . htmlspecialchars($row['sorting_id']) . '"></br>
                <input type="text" name="edit_id" id="edit_id" value="' . $row['id'] . '" style="display: none">
                <label for="edit_projektname">Deutscher Projektname:</label>
                <input type="text" name="edit_projektname" id="edit_projektname" placeholder="Projektname" value="' . htmlspecialchars($row['name']) . '"></br>
                <label for="edit_projektname">Aktueller deutscher Projektname: ' . htmlspecialchars($row['name']) . '</label></br>
                <label for="edit_projektname_en">Englischer Projektname:</label>
                <input type="text" name="edit_projektname_en" id="edit_projektname_en" placeholder="Projektname Englisch" value="' . htmlspecialchars($row['name_en']) . '"></br>
                <label for="edit_projektname_en">Aktueller englischer Projektname: ' . htmlspecialchars($row['name_en']) . '</label></br>
                <textarea name="edit_description" id="edit_description" placeholder="Deutsche Projektbeschreibung" cols="100" rows="10">' . htmlspecialchars($row['description']) . '</textarea></br>
                <label for="edit_description">Aktuelle deutsche Projektbeschreibung: ' . htmlspecialchars($row['description']) . '</label></br>
                <textarea name="edit_description_en" id="edit_description_en" placeholder="Englische Projektbeschreibung" cols="100" rows="10">' . htmlspecialchars($row['description_en']) . '</textarea></br>
                <label for="edit_description_en">Aktuelle englische Projektbeschreibung: ' . htmlspecialchars($row['description_en']) . '</label></br>
                <input type="file" name="edit_image" id="edit_image"></br>
                <label for="edit_image">Aktuelles Bild:<img src="data:image/png;base64,' . $image . '"></label></br>
                <input type="text" name="edit_livelink" id="edit_livelink" placeholder="Livelink" value="' . htmlspecialchars($row['livelink']) . '"></br>
                <label for="edit_livelink">Aktueller Live-Link: ' . htmlspecialchars($row['livelink']) . '</label></br>
                <input type="text" name="edit_gitlink" id="edit_gitlink" placeholder="Gitlink" value="' . htmlspecialchars($row['gitlink']) . '"></br>
                <label for="edit_gitlink">Aktueller Git-Link: ' . htmlspecialchars($row['gitlink']) . '</label></br>
                <input type="submit" name="edit_submit" id="edit_submit" value="Übernehmen">
                </form>
            ';
        } else {
            echo ("Projekt existiert nicht!");
        }

    } else {
        echo ("Ungültige ID");
    }

?>

