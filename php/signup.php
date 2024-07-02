<?php
session_start();
include_once "config.php";

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    // Controllo se l'email è valida
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Utilizzo delle prepared statements per prevenire SQL injection
        $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) { // Controllo se l'email esiste già
            echo "$email - Questa email esiste già";
        } else {
            // Controlliamo se l'utente ha caricato o no il file
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name']; // Nome dell'immagine
                $img_type = $_FILES['image']['type']; // Tipo dell'immagine
                $tmp_name = $_FILES['image']['tmp_name']; // Nome temporaneo

                // Dividiamo il nome dell'immagine dall'estensione
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); // Ottenere l'estensione

                $extensions = ['png', 'jpeg', 'jpg']; // Alcune delle estensioni valide

                if (in_array($img_ext, $extensions)) {
                    $time = time(); // Usare il tempo attuale per rinominare l'immagine
                    $new_img_name = $time . $img_name;

                    if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) { // Spostare il file caricato
                        $status = "Active Now"; // Lo stato dell'utente
                        $random_id = rand(time(), 1000000); // Creare un ID random per l'utente
                        $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Criptare la password

                        // Inserire i dati nella tabella
                        $stmt = $conn->prepare("INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("issssss", $random_id, $fname, $lname, $email, $hashed_password, $new_img_name, $status);

                        if ($stmt->execute()) { // Se i dati sono stati inseriti
                            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
                            $stmt->bind_param("s", $email);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                            }
                        } else {
                            echo "Qualcosa è andato storto!";
                        }
                    }
                } else {
                    echo "Per favore seleziona un'immagine con formato - jpeg, jpg, png!";
                }
            } else {
                echo "Per favore seleziona un'immagine";
            }
        }
    } else {
        echo "$email - Questa non è un'email valida!";
    }
} else {
    echo "Tutti i campi devono essere compilati";
}
