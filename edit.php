<?php

session_start();

include_once('db_connect.php');
$pdo = get_db_connection();

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt3 = $pdo->query('SELECT * FROM media WHERE id = ' . $_GET['id']);
$media = $stmt3->fetch();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "ja is waar";
    $stmt3 = $pdo->prepare('UPDATE media SET title = :title, rating = :rating,
     length_in_minutes = :length_in_minutes, released_at = :released_at,
     has_won_awards = :has_won_awards, seasons = :seasons, type = :type,
    country = :country, summary = :summary, youtube_trailer_id = :youtube_trailer_id
    WHERE id = :id');
    $stmt3->bindParam(':title', $_POST['title']);
    $stmt3->bindParam(':length_in_minutes', $_POST['minutes']);
    $stmt3->bindParam(':released_at', $_POST['date']);
    $stmt3->bindParam(':country_of_origin', $_POST['land']);
    $stmt3->bindParam(':summary', $_POST['beschrijving']);
    $stmt3->bindParam(':youtube_trailer_id', $_POST['trailer']);
    $stmt3->bindParam(':has_won_awards', $_POST['has_won_awards']);
    $stmt3->bindParam(':seasons', $_POST['seasons']);
    $stmt3->bindParam(':type', $_POST['type']);
    $stmt3->bindParam(':id', $_GET['id']);
    $stmt3->execute();

    header('Location: ' . $_SERVER['REQUEST_URI']);
}

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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $_GET['id'] ?>" class=" d-flex bg-black justify-content-center">
        <div class="col-2 ">
            <div class="col mb-3 ">
                <label for="title">Title</label>
                <input class="form-control border-secondary bg-secondary text-white" type="text" id="title" name="title" value="<?= $title ?>">
            </div>
            <div class="col mb-3">
                <label for="minutes">minutes</label>
                <input class="form-control border-secondary bg-secondary text-white" type="number" id="minutes" name="minutes" value="<?= $length_in_minutes ?>">
            </div>
            <div class="col mb-3">
                <label for="seasons">seasons</label>
                <input class="form-control border-secondary bg-secondary text-white" type="number" id="seasons" name="seasons" value="<?= $seasons ?>">
            </div>
            <div class="col mb-3">
                <label for="has_won_awards">awards</label>
                <input class="form-control border-secondary bg-secondary text-white" type="number" id="has_won_awards" name="has_won_awards" value="<?= $has_won_awards ?>">
            </div>
            <div class="col mb-3">
                <label for="type">type</label>
                <input class="form-control border-secondary bg-secondary text-white" type="text" id="type" name="type" value="<?= $type ?>">
            </div>
            <div class="col mb-3">
                <label for="date">date</label>
                <input class="form-control border-secondary bg-secondary text-white" type="date" id="date" name="date" value="<?= $released_at ?>">
            </div>
            <div class="col mb-3">
                <label for="country">Country</label>
                <input class="form-control border-secondary bg-secondary text-white" type="text" id="land" name="land" value="<?= $country?>">
            </div>
            <div class="input-group">
                <div class="input-group-prepend px-1">
                    <label for="beschrijving">Beschrijving</label>
                </div>
                <textarea class="form-control bg-secondary text-white" name="beschrijving"><?= $beschrijving ?></textarea>
            </div>
            <div class="col mb-3">
                <label for="rating">trailer id</label>
                <input class="form-control border-secondary bg-secondary text-white" type="text" id="trailer" name="trailer" value="<?= $youtube_trailer_id ?>">
            </div>
            <div class="ja border-secondary">
                <input type="submit" value="Verzenden">
            </div>
             <a href="index.php">Terug</a>
        </div>
    </form>
</body>

</html>
