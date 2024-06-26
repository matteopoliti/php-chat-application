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
        <section class="form signup">
            <header>MattChat App</header>
            <form action="#">
                <div class="error-txt">
                    Questo è un messaggio di errore!
                </div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">Nome</label>
                        <input type="text" placeholder="Nome">
                    </div>
                    <div class="field input">
                        <label for="">Cognome</label>
                        <input type="text" placeholder="Cognome">
                    </div>
                </div>
                <div class="field input">
                    <label for="">Email</label>
                    <input type="text" placeholder="Inserisci la tua email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="text" placeholder="Inserisci una password">
                </div>
                <div class="field image">
                    <label for="">Seleziona Immagine</label>
                    <input type="file">
                </div>
                <div class="field button">
                    <input type="submit" value="Continua per la Chat">
                </div>
            </form>
            <div class="link">Sei già registrato? <a href="">Effettua ora il Login!</a></div>
        </section>
    </div>
</body>

</html>