<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

include("../source/views/musicTile.php");
include("../source/connect.php");
include("../source/views/search.php");
db_connect();
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
        <p style="color: white;">Welkom, <?php echo $_SESSION['username']; ?>!</p>
        <?php
            createLink();
        ?>
        <a href="logout.php">Loguit</a>
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