<?php
session_start();
session_unset(); // Tüm oturum değişkenlerini temizlememizi sağlıyor
session_destroy(); // Oturumu sonlandırıyor
header('Location: /cook/index.php');
exit();
?>
