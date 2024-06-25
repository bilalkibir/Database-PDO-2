<?php


session_start();

include_once('db_connect.php');
$pdo = get_db_connection();

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->query('SELECT * FROM media WHERE id = ' . $_GET['id']);
$media = $stmt->fetch();



$title = $media["title"];
$type = $media["type"];
$hasWonAwards = $media["has_won_awards"];
$seasons = $media["seasons"];
$country = $media["country"];
$date = $media["released_at"];
$rating = $media["rating"];
$beschrijving = $media["summary"];
$minutes = $media["length_in_minutes"];
$youtube_trailer_id = $media["youtube_trailer_id"];





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
     crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
     crossorigin="anonymous"></script>
     <link rel="stylesheet" href="style.css">
</head>

<body class="bg-black text-white">
    <h1><?php echo $title ?></h1>

    <table>
        <th>information</th>
        <th>information</th>

        <tr>
            <td>Awards</td>
            <td><?= $hasWonAwards ?></td>
        </tr>
        <tr>
            <td>Seasons</td>
            <td><?= $seasons ?></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><?= $country ?></td>
        </tr>
        
        <tr>
            <td>Rating</td>
            <td><?= $rating ?></td>
        </tr>
        <tr>
            <td>Released at</td>
            <td><?= $date ?></td>
        </tr>
        <tr>
            <td>Length in minutes</td>
            <td><?= $minutes ?></td>
        </tr>
    </table>

    <h2>Beschrijving:</h2>

    <p><?= $beschrijving ?></p>

    <a href="index.php">Terug</a>


</body>

</html>