<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breakfast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../navbar2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
   
</head>
<body>
<?php
// Veritabanı bağlantısını ekleyin
include("../baglanti.php");
$conn = mysqli_connect("localhost", "root", "", "hzchefs");

// Bağlantıyı kontrol edin
if (!$conn) {
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
}

// SQL sorgusu - kahvaltı kategorisindeki tüm tarifleri al
$sql = "SELECT * FROM recipes WHERE category = 'Breakfast'";
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
        echo '<div id="star">';
        echo '<svg width="42px" height="40px" viewBox="0 0 42 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
        echo '<path d="M21,34 L10.4346982,39.5545079 C8.47875732,40.5828068 7.19697214,39.6450119 7.56952871,37.4728404 L9.5873218,25.7082039 L1.03981311,17.3764421 C-0.542576313,15.8339937 -0.0467737017,14.3251489 2.13421047,14.0082334 L13.946577,12.2917961 L19.2292279,1.58797623 C20.2071983,-0.393608322 21.7954064,-0.388330682 22.7707721,1.58797623 L28.053423,12.2917961 L39.8657895,14.0082334 C42.0525979,14.3259953 42.5383619,15.8381017 40.9601869,17.3764421 L32.4126782,25.7082039 L34.4304713,37.4728404 C34.8040228,39.6508126 33.5160333,40.5800681 31.5653018,39.5545079 L21,34 Z"></path>';
        echo '</svg>';
        echo '</div>';
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