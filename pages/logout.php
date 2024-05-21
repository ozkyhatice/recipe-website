<?php
session_start();

// Oturumu sonlandır
session_destroy();

// Başarılı yanıt döndür
http_response_code(200);
header("Location: ./login.php");

?>