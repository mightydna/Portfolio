<?php
    require '../backend/config.php';
    $stmt = $mysqli->prepare("SELECT * FROM Projekte ORDER BY sorting_id ASC");
    $stmt -> execute();
    $result = $stmt->get_result();
?>

<section id="projects">
    <div id="projects_header_box">
        <h2 id="projects_header">Meine Web- und Spieleprojekte</h2>
        <div id="projects_header_bar"></div>
    </div>
    <div id="projects_text_container">
        <p id="projects_desc_text"> Durch die Entwicklung von sechs unterschiedlichen Webprojekten, darinter ..., habe ich umfangreiche Erfahrung in modernen Webtechnologien, responsivem Design und  API-Integration gesammelt. Jedes Projekt hat meine Fähigkeiten im Umgang mit anspruchsvollen Anforderungen und der Umsetzung kreativer sowie funktionaler Lösungen erweitert.</p>
    </div>
    <div id="projects_main_container">
    <div class="projects_wrapper">
    <?php
    if ($_COOKIE["language"] == "de" || $_COOKIE["language"] == "") {
        while ($row = $result->fetch_assoc()) {
            $image = base64_encode($row['image']);
            if ($row['gitlink'] == "") {
                echo '<div class="project_box">
                <div class="project_box_img_container"><img src="data:image/png;base64,' . $image . '" class="project_box_img" alt="Projektbild"></div>
                <div class="project_box_overlay">
                    <div>
                        <h3 class="project_box_header">' . htmlspecialchars($row['name']) . '</h3>
                        <p class="project_box_text">' . htmlspecialchars($row['description']) . '</p>
                        <span class="projects_button_container">
                            <a class="projects_live_button" href="' . htmlspecialchars($row['livelink']) . '" target="_blank">Link</a>

                        </span>
                    </div>
                </div>
              </div>';
            } else {
                echo '<div class="project_box">
                <div class="project_box_img_container"><img src="data:image/png;base64,' . $image . '" class="project_box_img" alt="Projektbild"></div>
                <div class="project_box_overlay">
                    <div>
                        <h3 class="project_box_header">' . htmlspecialchars($row['name']) . '</h3>
                        <p class="project_box_text">' . htmlspecialchars($row['description']) . '</p>
                        <span class="projects_button_container">
                            <a class="projects_live_button" href="' . htmlspecialchars($row['livelink']) . '" target="_blank">Live</a>
                            <a class="projects_github_button" href="' . htmlspecialchars($row['gitlink']) . '" target="_blank">GitHub</a>
                        </span>
                    </div>
                </div>
              </div>';
            }
            
        }
    } else if ($_COOKIE["language"] == "en") {
        while ($row = $result->fetch_assoc()) {
            $image = base64_encode($row['image']);
            if ($row['gitlink'] == "") {
                echo '<div class="project_box">
                <div class="project_box_img_container"><img src="data:image/png;base64,' . $image . '" class="project_box_img" alt="Projektbild"></div>
                <div class="project_box_overlay">
                    <div>
                        <h3 class="project_box_header">' . htmlspecialchars($row['name_en']) . '</h3>
                        <p class="project_box_text">' . htmlspecialchars($row['description_en']) . '</p>
                        <span class="projects_button_container">
                            <a class="projects_live_button" href="' . htmlspecialchars($row['livelink']) . '" target="_blank">Link</a>
                        </span>
                    </div>
                </div>
              </div>';
            } else {
                echo '<div class="project_box">
                <div class="project_box_img_container"><img src="data:image/png;base64,' . $image . '" class="project_box_img" alt="Projektbild"></div>
                <div class="project_box_overlay">
                    <div>
                        <h3 class="project_box_header">' . htmlspecialchars($row['name_en']) . '</h3>
                        <p class="project_box_text">' . htmlspecialchars($row['description_en']) . '</p>
                        <span class="projects_button_container">
                            <a class="projects_live_button" href="' . htmlspecialchars($row['livelink']) . '" target="_blank">Live</a>
                            <a class="projects_github_button" href="' . htmlspecialchars($row['gitlink']) . '" target="_blank">GitHub</a>
                        </span>
                    </div>
                </div>
              </div>';
            }
        }
    }
    ?>
    </div>
    <div class="projects_nav">
        <button id="prevProject">&lt;</button>
        <button id="nextProject">&gt;</button>
    </div>
    </div>
    <div id="projects_bottom_bars_container">
        <div id="projects_bottom_bar_top"></div>
        <div id="projects_bottom_bar_bottom"></div>
    </div>
</section>