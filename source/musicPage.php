<?php
include("../source/connect.php");

function createPage() {
    $song = $_GET['song'];

    $conn = db_connect();

    $stmt = $conn->prepare("SELECT * FROM data WHERE songName = '". $song ."';");
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $songName = $row['songName'];
        $imageLink = $row['imageLink'];
        $artistName = $row['artistName'];
        $genre = $row['genre'];
        $text = $row['text'];
        $speeltijd = $row['speelTijd'];
        $datum = $row['releaseDate'];
    }

     echo '<section class="page__section">
             <div class="section__div1">
                 <img class="page__img" src="'. $imageLink .'" alt="">
             </div>
             <div class="section__div2">
                <p class="page__text">titel: '. $songName .'</p>
                <p class="page__text">artiest: '. $artistName .'</p>
                <p class="page__text">genre: '. $genre .'</p>
                <p class="page__text">speeltijd: '. $speeltijd .'</p>
                <p class="page__text">release datum: '. $datum .'</p>
                <br>
                <p class="page__text">'. $text .'</p>
             </div>
         </section>';
}

?>