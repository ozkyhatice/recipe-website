<?php
session_start();
include("../baglanti.php");

// Kullanıcı giriş yapmamışsa yönlendir
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_SESSION['user_id']; // Kullanıcı ID'si oturumdan alınır

    // Favorilerden çıkarma sorgusu
    $sql = "DELETE FROM user_favorites WHERE user_id = '$user_id' AND recipe_id = '$recipe_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: my_favorites.php"); // Başarılıysa favoriler sayfasına yönlendir
        exit();
    } else {
        echo "Hata: " . mysqli_error($conn);
    }

    // Veritabanı bağlantısını kapat
    mysqli_close($conn);
} 
?>