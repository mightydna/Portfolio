<section>
    <?php
        
        session_start();
        require '../backend/config.php';

        if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
            echo ("Eingeloggt");
            // Hier dann alle Upload und Änderungsoptionen einbauen?
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