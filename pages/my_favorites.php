<?php
// Veritabanı bağlantısını dahil et
include("../baglanti.php");

// Kullanıcı adını al
$username = $_SESSION['username'];

// SQL sorgusunu hazırla
$sql = "SELECT r.recipe_name, r.category, r.prep_time, r.cook_time, r.ingredients, r.instructions, r.image, r.difficulty, r.serving_size
        FROM recipes r
        INNER JOIN user_favorites uf ON r.id = uf.recipe_id
        INNER JOIN users u ON uf.user_id = u.id
        WHERE u.username = '$username'";

// Sorguyu çalıştır
$result = mysqli_query($conn, $sql);

// Eğer sonuçlar varsa, tarifleri listele
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>" . $row["recipe_name"] . "</h2>";
        echo "<p><strong>Category:</strong> " . $row["category"] . "</p>";
        echo "<p><strong>Preparation Time:</strong> " . $row["prep_time"] . " minutes</p>";
        echo "<p><strong>Cooking Time:</strong> " . $row["cook_time"] . " minutes</p>";
        echo "<p><strong>Ingredients:</strong> " . $row["ingredients"] . "</p>";
        echo "<p><strong>Instructions:</strong> " . $row["instructions"] . "</p>";
        echo "<p><strong>Difficulty:</strong> " . $row["difficulty"] . "</p>";
        echo "<p><strong>Serving Size:</strong> " . $row["serving_size"] . "</p>";
        echo "<img src='../images/" . $row["image"] . "' alt='" . $row["recipe_name"] . "'><br><br>";
    }
} else {
    echo "There are no favorite recipes.";
}

// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>
