<?php

session_start();

include_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = get_db_connection();

    $title = $_POST["title"];
    $type = $_POST["type"];
    $hasWonAwards = $_POST["has_won_awards"];
    $seasons = $_POST["seasons"];
    $country = $_POST["country"];
    $date = $_POST["released_at"];
    $rating = $_POST["rating"];
    $summary = $_POST["summary"];
    $minutes = $_POST["length_in_minutes"];
    $youtube_trailer_id = $_POST["youtube_trailer_id"];

    $query = $conn->prepare("INSERT INTO media (title, has_won_awards, country, seasons, rating, summary, length_in_minutes, youtube_trailer_id, released_at, type)
        VALUES (:title, :has_won_awards, :country, :seasons, :rating, :summary, :length_in_minutes, :youtube_trailer_id, :released_at, :type)");

    $query->bindParam(':title', $title);
    $query->bindParam(':has_won_awards', $has_won_awards, PDO::PARAM_INT);
    $query->bindParam(':country', $country);
    $query->bindParam(':seasons', $seasons, PDO::PARAM_INT);
    $query->bindParam(':youtube_trailer_id', $youtube_trailer_id);
    $query->bindParam(':rating', $rating, PDO::PARAM_INT);
    $query->bindParam(':summary', $summary);
    $query->bindParam(':length_in_minutes', $minutes, PDO::PARAM_INT);
    $query->bindParam(':released_at', $date);
    $query->bindParam(':type', $type);

    $query->execute();
}

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
    <form method="post" class="d-flex bg-black justify-content-center">
        <div class="col-2 ">
            <div class="col mb-3 ">
                <label for="title">Title</label>
                <input class="form-control border-secondary bg-secondary text-white" type="text" id="title" name="title">
            </div>
            <div class="col mb-3">
                <label for="minutes">minutes</label>
                <input class="form-control border-secondary bg-secondary text-white" type="number" id="minutes" name="length_in_minutes">
            </div>
            <div class="col mb-3">
                <label for="seasons">seasons</label>
                <input class="form-control border-secondary bg-secondary text-white" type="number" id="seasons" name="seasons">
            </div>
            <div class="col mb-3">
                <label for="rating">rating</label>
                <input class="form-control border-secondary bg-secondary text-white" type="number" id="rating" name="rating">
            </div>
            <div class="col mb-3">
                <label for="has_won_awards">awards</label>
                <input class="form-control border-secondary bg-secondary text-white" type="number" id="has_won_awards" name="has_won_awards">
            </div>
            <div class="col mb-3">
                <label for="type">type</label>
                <input class="form-control border-secondary bg-secondary text-white" type="text" id="type" name="type">
            </div>
            <div class="col mb-3">
                <label for="date">date</label>
                <input class="form-control border-secondary bg-secondary text-white" type="date" id="date" name="released_at"> 
            </div>
            <div class="col mb-3">
                <label for="country">Country</label>
                <input class="form-control border-secondary bg-secondary text-white" type="text" id="land" name="country"> 
            </div>
            <div class="input-group">
                <div class="input-group-prepend px-1">
                    <label for="beschrijving">Beschrijving</label>
                </div>
                <textarea class="form-control bg-secondary text-white" name="summary"></textarea>
            </div>
            <div class="col mb-3">
                <label for="trailer">trailer id</label>
                <input class="form-control border-secondary bg-secondary text-white" type="text" id="trailer" name="youtube_trailer_id">
            </div>

            <div class="ja border-secondary">
                <input type="submit" value="Verzenden">
            </div>

            <a href="index.php">Terug</a>
</body>


</html>