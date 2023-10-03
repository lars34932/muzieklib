<?php
function createLink() {
    $linkMap = [
        1 => 'Overzicht',
    ];

    for ($i = 1; $i < count($linkMap)+1; $i++){
        $linkName = $linkMap[$i];
        echo '<a href="index.php">'. $linkName .'</a>';
    }
}

function createTile() {
    try {
        $pdo = db_connect();

        $stmt = $pdo->prepare("SELECT songName, imageLink, artistName, genre FROM data");

        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $songName = $row['songName'];
            $imageLink = $row['imageLink'];
            $artistName = $row['artistName'];
            $genre = $row['genre'];

            echo '
            <section class="music__tile js--'. $songName .' js--'. $artistName .'">
                <img src="'. $imageLink .'" alt="" class="music__tile__image">
                <div>
                    <div class="music__tile__text__div">
                        <a href="page.php?song='. $songName .'" class="music__tile__name">'. $songName .'</a><a href="" class="music__tile__artist">'. $artistName .'</a><button class="music__tile__button"><i class="fa-solid fa-play"></i></button>
                    </div>
                    <div class="music__tile__text__div">
                        <p>Genre: '. $genre .'</p>
                    </div>
                </div>
            </section>';
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>