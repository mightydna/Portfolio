<section>
    <?php

        require __DIR__ . '/../vendor/autoload.php';

        use Dotenv\Dotenv;

        // Lade die .env-Datei
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        // Zugriff auf Umgebungsvariablen
        $dbHost = $_ENV['DB_HOST'];
        $dbUser = $_ENV['DB_USERNAME'];
        $dbPass = $_ENV['DB_PASSWORD'];
        $dbname = $_ENV['DB_DATABASE'];

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbname);
        if ($mysqli->connect_errno) {
            throw new RuntimeException('mysqli-Verbindungsfehler: ' . $mysqli->connect_error);
        }

    ?>

    <form>



    </form>



</section>