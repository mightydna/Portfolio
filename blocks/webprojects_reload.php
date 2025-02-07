<?php
require '../backend/config.php';

// Sprache aus dem Cookie ermitteln
$lang = isset($_COOKIE["language"]) ? $_COOKIE["language"] : "de";

// Datenbankabfrage
$stmt = $mysqli->prepare("SELECT * FROM Projekte");
$stmt->execute();
$result = $stmt->get_result();

// HTML für die Projekte ausgeben
while ($row = $result->fetch_assoc()) {
    $image = base64_encode($row['image']);
    $name = ($lang == "en") ? htmlspecialchars($row['name_en']) : htmlspecialchars($row['name']);
    $desc = ($lang == "en") ? htmlspecialchars($row['description_en']) : htmlspecialchars($row['description']);

    echo '<div class="project_box">
        <div class="project_box_img_container">
            <img src="data:image/png;base64,' . $image . '" class="project_box_img" alt="Projektbild">
        </div>
        <div class="project_box_overlay">
            <div>
                <h3 class="project_box_header">' . $name . '</h3>
                <p class="project_box_text">' . $desc . '</p>
                <span class="projects_button_container">
                    <a class="projects_live_button" href="' . htmlspecialchars($row['livelink']) . '" target="_blank">Live</a>
                    <a class="projects_github_button" href="' . htmlspecialchars($row['gitlink']) . '" target="_blank">GitHub</a>
                </span>
            </div>
        </div>
      </div>';
}
?>
