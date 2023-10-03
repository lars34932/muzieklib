<?php
include("config.php");
function db_connect(): PDO
{
    $servername = SERVERNAME;
    $username = USERNAME;
    $password = PASSWORD;
    $dbname = DBNAME;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Fout bij het maken van de connection: " . $e->getMessage());
    }

    return $conn;
}

function executeQuery($sql) {
    $conn = db_connect();

    $result = $conn->query($sql);
}

function show_info() {
    $conn = db_connect();
    
    $stmt = $conn->prepare("select * from data");
    $stmt->execute();

    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "Song Name: " . $row["songName"]. "<br>";
            echo "Image Link: " . $row["imageLink"]. "<br>";
            echo "Artist Name: " . $row["artistName"]. "<br>";
            echo "Genre: " . $row["genre"]. "<br>";
            echo "Text: " . $row["text"]. "<br>";
            echo "Speeltijd: " . $row["speelTijd"]. "<br>";
            echo "Releasedate: " . $row["releaseDate"]. "<br>";
            echo "<hr>";
        }
    } else {
        echo "No results found";
    }
}
?>
