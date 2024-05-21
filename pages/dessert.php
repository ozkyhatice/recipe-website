<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dessert</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../navbar2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
   
   
</head>
<body>
<?php
session_start(); // Oturumu başlat

// Veritabanı bağlantısını ekleyin
include("../baglanti.php");
include("../navbar2.php");
$conn = mysqli_connect("localhost", "root", "", "hzchefs");

// Bağlantıyı kontrol edin
if (!$conn) {
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
}

// SQL sorgusu - kahvaltı kategorisindeki tüm tarifleri al
$sql = "SELECT * FROM recipes WHERE category = 'Dessert'";
$result = mysqli_query($conn, $sql);

// Eğer sonuçlar varsa, kartları oluştur
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col">';
        echo '<div class="card">';
        echo '<img src="../images/' . $row["image"] . '" class="card-img-top" alt="' . $row["recipe_name"] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["recipe_name"] . '</h5>';
        echo '<p class="card-text">' . $row["instructions"] . '</p>';
        echo '<a href="add_to_favorites.php?id=' . $row["id"] . '" class="btn btn-primary">Favorilere Ekle</a>'; // Favorilere Ekle düğmesi
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Kahvaltı kategorisinde hiç tarif bulunamadı.";
}

// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>

</body>

</html>
