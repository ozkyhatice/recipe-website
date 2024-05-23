<?php
session_start();
session_unset(); // Tüm oturum değişkenlerini temizler
session_destroy(); // Oturumu sonlandırır
header('Location: /cook/index.php');
exit();
?>
