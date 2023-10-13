<?php
include("../source/views/musicTile.php");
include("../source/views/musicPage.php");
db_connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <?php
            createLink();
        ?>
    </header>
    <main>
        <?php
            createPage();
        ?>
    </main>
</body>
</html>