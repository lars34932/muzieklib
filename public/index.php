<?php
include("../source/musicTile.php");
include("../source/connect.php");
include("../source/search.php");
db_connect();
//show_info();
//executeQuery("UPDATE data SET releaseDate = '2 December 2022' WHERE songName = 'too many nights'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6c294d23a1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/search.js" defer></script>
    <title>muziek bibliotheek</title>
</head>
<body>
    <header>
        <?php
            createLink();
        ?>
    </header>
    <main>
        <div class="tile__div">
        <?php
            createTile();
        ?>
        </div>
        <div>
        <?php
            createSearch();
        ?>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>