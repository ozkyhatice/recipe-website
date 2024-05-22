<?php
session_start();
include("../baglanti.php");

// Kullanıcı giriş yapmamışsa yönlendir
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

$username = $_SESSION['username'];

// Initialize the category filter variable
$categoryFilter = "";

// Check if category filter is provided in the request
if (isset($_GET['category']) && !empty($_GET['category'])) {
    // Sanitize the category value to prevent SQL injection
    $categoryFilter = mysqli_real_escape_string($conn, $_GET['category']);
    // Add the category filter to the SQL query
    $categoryFilter = " AND r.category = '$categoryFilter'";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../navbar2.css">
    <link rel="stylesheet" href="../styles/my_profile.css">
    <style>
        body {
            overflow-y: scroll;
        }
        .container {
            margin-top: 20px;
        }
        .card-body p {
            margin-bottom: 0.5rem;
        }
        .img-fluid {
            object-fit: cover;
            height: 100%;
        }
    </style>
</head>
<body>
    <?php include("../navbar2.php"); ?>
    <div class="container">
        <h1 class="mb-4">My Favorite Recipes</h1>
        <form action="" method="get" class="mb-3">
            <div class="input-group">
                <label class="input-group-text" for="categoryFilter">Filter by Category:</label>
                <select class="form-select" id="categoryFilter" name="category">
                    <option value="" <?php echo (empty($_GET['category']) ? 'selected' : ''); ?>>All</option>
                    <option value="Breakfast" <?php echo (isset($_GET['category']) && $_GET['category'] == 'Breakfast' ? 'selected' : ''); ?>>Breakfast</option>
                    <option value="Soup" <?php echo (isset($_GET['category']) && $_GET['category'] == 'Soup' ? 'selected' : ''); ?>>Soup</option>
                    <option value="Main Course" <?php echo (isset($_GET['category']) && $_GET['category'] == 'Main Course' ? 'selected' : ''); ?>>Main Course</option>
                    <option value="Dessert" <?php echo (isset($_GET['category']) && $_GET['category'] == 'Dessert' ? 'selected' : ''); ?>>Dessert</option>
                </select>
                <button type="submit" class="btn btn-primary">Apply Filter</button>
            </div>
        </form>
        <div class="row">
        <?php
        include("../baglanti.php");

        // Kullanıcı giriş yapmamışsa yönlendir
        if (!isset($_SESSION['username'])) {
            header("Location: ../login.php");
            exit();
        }

        $user_id = $_SESSION['user_id']; // Kullanıcı ID'si oturumdan alınır

        // Kullanıcının favori tariflerini çek
        $sql = "SELECT r.id, r.recipe_name, r.category, r.instructions
                FROM recipes r
                INNER JOIN user_favorites uf ON r.id = uf.recipe_id
                WHERE uf.user_id = '$user_id' $categoryFilter";

        $result = mysqli_query($conn, $sql);

        // Eğer sonuçlar varsa, tarifleri listele
        if (mysqli_num_rows($result) > 0) {
            echo "<div class='container'>";
            echo "<div class='row'>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-md-6 col-lg-4 mb-4'>";
                echo "<div class='card h-100'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($row["recipe_name"]) . "</h5>";
                echo "<p class='card-text'>" . htmlspecialchars($row["instructions"]) . "</p>";
                echo "<a href='recipe_details.php?recipe_id=" . $row["id"] . "' class='btn btn-primary'>View Recipe</a>";
                echo "<form action='remove_favorite.php' method='post' style='display:inline-block; margin-top: 10px;'>";
                echo "<input type='hidden' name='recipe_id' value='" . $row["id"] . "'>";
                echo "<button type='submit' class='btn btn-danger'>Favorilerden Çıkar</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p>There are no favorite recipes.</p>";
        }

        // Veritabanı bağlantısını kapat
        mysqli_close($conn);
        ?>
        </div>
    </div>
</body>
</html>
