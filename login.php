<?php

session_start();
include_once('db_connect.php');
$pdo = get_db_connection();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['logout'])) {
        $_SESSION['loggedInUser'] = null;
        header("refresh:0");
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['loggedInUser'] = $row['id'];
        header("location: index.php");
        exit();
    } else {
        $error = 'Invalide gebruikersnaam/wachtwoord combinatie';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
    crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .full-height {
            height: 100vh;
        }
    </style>
</head>

<body class="bg-secondary">

    <?php if (isset($error)) { ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php } ?>
    <h1 class="d-flex justify-content-center mt-3">Netland Admin Panel</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="d-flex justify-content-center align-items-center full-height">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="username" class="col-form-label">Gebruikersnaam</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="username" name="username" class="form-control" aria-describedby="nameHelpInline">
                </div>
                <div class="col-auto">

                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="password" class="col-form-label">Wachtwoord</label>
                </div>
                <div class="col-auto">
                    <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                <div class="col-auto">

                </div>
            </div>
            <div class="ja border-secondary">
                <input type="submit" value="Verzenden">
            </div>
        </div>
    </form>

</body>

</html>