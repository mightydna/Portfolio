<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/styles/fonts.css">
    <link rel="stylesheet/less" type="text/css" href="resources/styles/base/all.less" />
    <script src="resources/vendors/less.js-4.2.1/dist/less.js" type="text/javascript"></script>

    <!-- og meta -->
    <meta property="og:type" value="website" />
    <meta property="og:title" value="Dominik Nagel - Portfolio" />
    <meta property="og:description" value="Ich bin begeisterter Webentwickler, schaue dir mein Portfolio an!" />
    <meta property="og:url" value="nageldominik.de" />

    <!-- twitter meta -->
    <meta name="twitter:card" value="summary_large_image" />
    <meta name="twitter:title" value="Dominik Nagel - Portfolio" />
    <meta name="twitter:description" value="Ich bin begeisterter Webentwickler, schaue dir mein Portfolio an!" />

    <title>Mein Portfolio</title>
</head>
<body>
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
</html>