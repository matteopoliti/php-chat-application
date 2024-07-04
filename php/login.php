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
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";
        } else {
            echo "Email o Password sono errata!";
        }
    } else {
        echo "Email o Password sono errata!";
    }
} else {
    echo "Tutti i campi sono richiesti";
}
