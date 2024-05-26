<?php
session_start(); // Oturumu başlat
include("../baglanti.php");

// Kullanıcı giriş yapmış mı kontrol et
if (!isset($_SESSION['user_id'])) {
    // Giriş yapmamışsa ana sayfaya yönlendir
    header("Location: /index.php");
    exit;
}

// Kullanıcının yönetici rolünde olup olmadığını kontrol et
if ($_SESSION['role'] !== 'admin') {
    // Yönetici değilse ana sayfaya yönlendir
    header("Location: /index.php");
    exit;
}

// Veritabanı bağlantısı
$conn = mysqli_connect("localhost", "root", "", "hzchefs");

// Bağlantıyı kontrol et
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Tarifin silineceği id'yi al
$recipe_id = $_GET['recipe_id'];
$category = $_GET['category'];
// Tarifi veritabanından sil
$sql = "DELETE FROM recipes WHERE id = '$recipe_id'";

if (mysqli_query($conn, $sql)) {
    // Başarıyla silindiyse, kullanıcıyı tarifler sayfasına yönlendir
    header("Location: ../index.php");
    exit;
} else {
    // Silme başarısızsa, bir hata mesajı göster
    echo "Error deleting recipe: " . mysqli_error($conn);
}

// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>
