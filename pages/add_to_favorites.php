<?php
session_start(); // Oturumu başlat

if(isset($_SESSION['user_id'])) {
    // Kullanıcı giriş yapmışsa işlemleri gerçekleştir
    include("../baglanti.php"); // Veritabanı bağlantısını dahil et

    // Veritabanı bağlantısını kontrol et
    if (!$conn) {
        die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
    }

    // Kullanıcının favoriye eklemek istediği tarifin ID'sini al
    $recipe_id = $_GET['id'];

    // Favorilere ekleme işlemini gerçekleştirecek SQL sorgusu
    $sql = "INSERT INTO favorites (user_id, recipe_id) VALUES ('".$_SESSION['user_id']."', '$recipe_id')";

    // Sorguyu çalıştır ve sonucu kontrol et
    if (mysqli_query($conn, $sql)) {
        echo "Tarif favorilere eklendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Veritabanı bağlantısını kapat
    mysqli_close($conn);
} else {
    // Kullanıcı giriş yapmamışsa, favorilere eklemek için önce giriş yapması gerektiğini bildir
    echo "Favorilere tarif eklemek için önce giriş yapmalısınız.";
}
?>
