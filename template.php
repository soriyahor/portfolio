<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php
    if ($page == 'cv') { ?>
        <link rel="stylesheet" href="cv.css">
    <?php } else { ?>
        <link rel="stylesheet" href="css/style.css">
    <?php } ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Soriya HOR</title>
</head>

<body>
    <?php

    include 'common/navigation.php';


    if (!isset($page)) {
        include 'content/index_content.php';
    }
    switch ($page) {
        case 'accueil':
            include 'content/index_content.php';
            break;
        case 'portfolio':
            include 'content/portfolio_content.php';
            break;
        case 'veille':
            include 'content/veille_content.php';
            break;
        case 'cv':
            include 'cv.php';
            break;
        case '':
            include 'content/index_content.php';
            break;
        case 'domrect':
            include 'veille/veilleDomrect.php';
            break;
        case 'vantajs':
            include 'veille/veilleVantajs.php';
            break;
    }

    include 'common/footer.php';

    ?>

    <script src="./js/main.js"></script>
</body>

</html>