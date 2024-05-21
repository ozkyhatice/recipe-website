<?php

$conn = new mysqli("localhost", "root","", "hzchefs");

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

?>