<?php
session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    //controlliamo email e password 
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $status = "Active Now";
            // aggiorniamo lo status a Active Now se l'utente si logga con successo
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = '{$row['unique_id']}'");
            if ($sql) {
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            }
        } else {
            echo "Email o Password errata!";
        }
    } else {
        echo "Email o Password errata!";
    }
} else {
    echo "Tutti i campi sono richiesti";
}
