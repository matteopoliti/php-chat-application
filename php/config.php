<?php
$conn = mysqli_connect("localhost", "root", "root", "chat");
if (!$conn) {
    echo "database not connected" . mysqli_connect_error();
}
