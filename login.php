<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MattChat</title>

    <!-- Link font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Link Css -->
    <link rel="stylesheet" href="./styles/general.css">
</head>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>MattChat App</header>
            <form action="#">
                <div class="error-txt">

                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Inserisci la tua email" name="email">
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Inserisci la tua password" name="password">
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field button">
                    <input type="submit" value="Continua per la Chat">
                </div>
            </form>
            <div class="link">Non sei ancora registrato? <a href="index.php">Registrati ora!</a></div>
        </section>
    </div>

    <script src="./javascript/pass-show-hide.js"></script>
    <script src="./javascript/login.js"></script>

</body>

</html>