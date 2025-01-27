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
                <input type="text" name="edit_id" id="edit_id" value="' . $row['id'] . '" style="display: none">
                <input type="text" name="edit_projektname" id="edit_projektname" placeholder="Projektname" value="' . htmlspecialchars($row['name']) . '"></br>
                <label for="edit_projektname">Aktueller Projektname: ' . htmlspecialchars($row['name']) . '</label></br>
                <textarea name="edit_description" id="edit_description" placeholder="Projektbeschreibung" cols="100" rows="10">' . htmlspecialchars($row['description']) . '</textarea></br>
                <label for="edit_description">Aktuelle Projektbeschreibung: ' . htmlspecialchars($row['description']) . '</label></br>
                <input type="file" name="edit_image" id="edit_image"></br>
                <label for="edit_image">Aktuelles Bild:<img src="data:image/png;base64,' . $image . '"></label></br>
                <input type="text" name="edit_livelink" id="edit_livelink" placeholder="Livelink" value="' . htmlspecialchars($row['livelink']) . '"></br>
                <label for="edit_livelink">Aktueller Link: ' . htmlspecialchars($row['livelink']) . '</label></br>
                <input type="text" name="edit_gitlink" id="edit_gitlink" placeholder="Gitlink" value="' . htmlspecialchars($row['gitlink']) . '"></br>
                <label for="edit_gitlink">Aktueller Link: ' . htmlspecialchars($row['gitlink']) . '</label></br>
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

