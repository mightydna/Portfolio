<section>
    <?php
        
        session_start();
        require '../backend/config.php';

        if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
            echo ("User logged in: " . $_SESSION['username']);
            echo '
                <a href="../backend/logout.php"><button id="logout_button">Ausloggen</button></a>
            ';
            echo '
                <a href="../backend/create_project.php"><button id="create_button">Neues Projekt Anlegen</button></a>
            ';
            echo '<hr>';

            $stmt = $mysqli->prepare("SELECT * FROM Projekte");
            $stmt -> execute();
            $result = $stmt->get_result();

            echo '<div class="projects-list">';
            while ($row = $result->fetch_assoc()) {
                $image = base64_encode($row['image']);
                echo '<div class="project">';
                echo '<h3>' . htmlspecialchars($row['name']) . ' (' . htmlspecialchars($row['name_en']) . ')</h3>';
                echo '<p>Projekt ID: ' . htmlspecialchars($row['id']) . '</p>';
                echo '<p><b>Deutsche Beschreibung:</b> ' . htmlspecialchars($row['description']) . '</p>';
                echo '<p><b>Englische Beschreibung:</b> ' . htmlspecialchars($row['description_en']) . '</p>'; 
                echo '<img src="data:image/png;base64,' . $image . '">';
                echo '<p><b>Live-Link:</b><a href="' . htmlspecialchars($row['livelink']) . '" target="_blank"> ' . htmlspecialchars($row['livelink']) . '</a></p>';
                echo '<p><b>Git-Link:</b><a href="' . htmlspecialchars($row['gitlink']) . '" target="_blank"> ' . htmlspecialchars($row['gitlink']) . '</a></p>';
                echo '<a href="../backend/edit_project.php?id=' . urlencode($row['id']) . '"><button id="edit_button">Edit</button></a>';
                echo '<a href="../backend/delete_project.php?id=' . urlencode($row['id']) . '"><button id="delete_button">Löschen</button></a>';
                echo '<hr>';
                echo '</div>';
            }
            echo '</div>';

        } else {
            echo '
            <form action="../backend/login.php" method="POST" id="login_form">
                <label for="login_username"></label>
                <input type="text" name="login_username" id="login_username" placeholder="Username" required>
                <label for="login_password"></label>
                <input type="password" name="login_password" id="login_password" placeholder="Password" required> 
                <input type="submit" name="login_submit" id="login_submit" value="Login">
            </form>
            ';
        }
    ?>
    
</section>