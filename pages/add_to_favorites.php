<?php
session_start(); // Oturumu başlat

if (isset($_SESSION['user_id'])) {
    // Kullanıcı giriş yapmışsa işlemleri gerçekleştir
    include("../baglanti.php"); // Veritabanı bağlantısını dahil et

    // Veritabanı bağlantısını kontrol et
    if (!$conn) {
        die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
    }

    // Kullanıcının favoriye eklemek veya çıkarmak istediği tarifin ID'sini al
    $recipe_id = $_GET['id'];
    $action = $_GET['action']; // 'add' or 'remove'

    if ($action == 'add') {
        // Favorilere ekleme işlemini gerçekleştirecek SQL sorgusu
        $sql = "INSERT INTO user_favorites (user_id, recipe_id) VALUES ('" . $_SESSION['user_id'] . "', '$recipe_id')";
    } else if ($action == 'remove') {
        // Favorilerden çıkarma işlemini gerçekleştirecek SQL sorgusu
        $sql = "DELETE FROM user_favorites WHERE user_id='" . $_SESSION['user_id'] . "' AND recipe_id='$recipe_id'";
    }

    // Sorguyu çalıştır ve sonucu kontrol et
    if (mysqli_query($conn, $sql)) {
        // İşlem başarılıysa sayfayı yenile ve önceki sayfaya geri dön
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
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
