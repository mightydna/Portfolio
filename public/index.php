<!DOCTYPE html>
<?php
    $cookie_name = "language";
    $cookie_value = "de";
    if(!isset($_COOKIE[$cookie_name])) {
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }
?>
<html lang="de" id="main_html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet/less" type="text/css" href="resources/styles/base/all.less" />
    <script src="resources/vendors/less.js-4.2.1/dist/less.js" type="text/javascript"></script>

    <!-- Primary Meta Tags -->
    <title>Dominik Nagel - Portfolio</title>
    <meta name="title" content="Dominik Nagel - Portfolio" />
    <meta name="description" content="Ich bin begeisterter Webentwickler, schaue dir mein Portfolio an!" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="nageldominik.de" />
    <meta property="og:title" content="Dominik Nagel - Portfolio" />
    <meta property="og:description" content="Ich bin begeisterter Webentwickler, schaue dir mein Portfolio an!" />
    <meta property="og:image" content="/resources/images/meta/nageldominik-de.png" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="nageldominik.de" />
    <meta property="twitter:title" content="Dominik Nagel - Portfolio" />
    <meta property="twitter:description" content="Ich bin begeisterter Webentwickler, schaue dir mein Portfolio an!" />
    <meta property="twitter:image" content="/resources/images/meta/nageldominik-de.png" />

    <title>Mein Portfolio</title>
    <link rel="icon" type="image/x-icon" href="resources/icons/favicon-32x32.png">
</head>
<body id="index_body">
    <?php
    require '../backend/config.php';
    require '../backend/contact_form.php';
    require '../blocks/main/header.php';
    require '../blocks/hero.php';
    require '../blocks/about.php';
    require '../blocks/skills.php';
    require '../blocks/certificates.php';
    require '../blocks/webprojects.php';
    require '../blocks/experience.php';
    require '../blocks/contact.php';
    require '../blocks/main/footer.php';
    ?>
</body>
<script src="resources/scripts/main.js"></script>
<script src="resources/scripts/language.js"></script>
</html>