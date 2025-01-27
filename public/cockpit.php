<section>
    <?php
        
        session_start();
        require '../backend/config.php';

        if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
            echo ("Eingeloggt!");
            // Hier dann alle Upload und Änderungsoptionen einbauen?
            $stmt = $mysqli->prepare("SELECT * FROM Projekte");
            $stmt -> execute();
            $result = $stmt->get_result();

            echo '<div class="projects-list">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="project">';
                echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                echo '<p>Projekt ID: ' . htmlspecialchars($row['id']) . '</p>';
                echo '<p>' . htmlspecialchars($row['description']) . '</p>'; 
                echo $row['image'];
                echo '<p>' . htmlspecialchars($row['livelink']) . '<p>';
                echo '<p>' . htmlspecialchars($row['gitlink']) . '<p>';
                echo '</div>';
            }
            echo '</div>';
            echo '
                <a href="../backend/logout.php"><button id="logout_button">Ausloggen</button></a>
            ';

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