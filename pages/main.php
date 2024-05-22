<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/cook/navbar2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <style>
        .card-link {
            text-decoration: none;
            color: #000000; /* Renk: Siyah */
        }
        .card-link:hover {
            text-decoration: none; /* Alt çizgiyi kaldırmak için */
        }
    </style>
</head>
<body>
<?php
// Veritabanı bağlantısını ekleyin
session_start(); // Oturumu başlat
include("../baglanti.php");
include("../navbar2.php");

$conn = mysqli_connect("localhost", "root", "", "hzchefs");

// Bağlantıyı kontrol edin
if (!$conn) {
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
}

// Kullanıcının favori tariflerini al
$user_id = $_SESSION['user_id'];
$fav_sql = "SELECT recipe_id FROM user_favorites WHERE user_id = '$user_id'";
$fav_result = mysqli_query($conn, $fav_sql);
$favorites = [];
while ($fav_row = mysqli_fetch_assoc($fav_result)) {
    $favorites[] = $fav_row['recipe_id'];
}

// SQL sorgusu - kahvaltı kategorisindeki tüm tarifleri al
$sql = "SELECT * FROM recipes WHERE category = 'Main Course'";
$result = mysqli_query($conn, $sql);

// Eğer sonuçlar varsa, kartları oluştur
if (mysqli_num_rows($result) > 0) {
    echo '<div class="container">';
    $counter = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($counter % 4 == 0) {
            echo '<div class="row justify-content-center">';
        }
        // Resim yolunu belirle
        $imagePath = '/cook/images/' . $row["image"];
        $is_favorite = in_array($row["id"], $favorites);
        
        echo '<div class="col-md-3 mb-4">';
        echo '<a href="recipe_details.php?recipe_id=' . $row["id"] . '" class="card-link">';
        echo '<div class="card">';
        echo '<img src="' . $imagePath . '" class="card-img-top" alt="' . $row["recipe_name"] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["recipe_name"] . '</h5>';
        echo '<p class="card-text">' . $row["instructions"] . '</p>';
        if ($is_favorite) {
            echo '<a href="add_to_favorites.php?id=' . $row["id"] . '&action=remove" class="btn btn-danger" onclick="refreshPage()">Favorilerden Çıkar</a>';
        } else {
            echo '<a href="add_to_favorites.php?id=' . $row["id"] . '&action=add" class="btn btn-primary" onclick="refreshPage()">Favorilere Ekle</a>';
        }
        echo '</div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
        
        $counter++;
        if ($counter % 4 == 0) {
            echo '</div>';
        }
    }
    if ($counter % 4 != 0) {
        echo '</div>';
    }
    echo '</div>';
}

// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>

<script>
    function refreshPage() {
        location.reload();
    }
</script>

</body>
</html>
