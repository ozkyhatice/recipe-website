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
if(isset($_GET['category']) && !empty($_GET['category'])) {
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
    <option value="">Select</option>
    <option value="Breakfast">Breakfast</option>
    <option value="Soup">Soup</option>
    <option value="Main Course">Main Course</option>
    <option value="Dessert">Dessert</option>
</select>

                <button type="submit" class="btn btn-primary">Apply Filter</button>
            </div>
        </form>
        <div class="row">
        <?php
        // Kullanıcının favori tariflerini al
        $sql = "SELECT r.id, r.recipe_name, r.category, r.prep_time, r.cook_time, r.ingredients, r.instructions, r.image, r.difficulty, r.serving_size
                FROM recipes r
                INNER JOIN user_favorites uf ON r.id = uf.recipe_id
                INNER JOIN users u ON uf.user_id = u.id
                WHERE u.username = '$username' $categoryFilter";

        $result = mysqli_query($conn, $sql);

        // Eğer sonuçlar varsa, tarifleri listele
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-md-6 col-lg-4 mb-4'>";
                echo "<div class='card h-100'>";
                echo "<div class='row g-0 h-100'>";
                echo "<div class='col-12'>";
                echo "<img src='../images/" . $row["image"] . "' class='card-img-top img-fluid' alt='" . $row["recipe_name"] . "'>";
                echo "</div>";
                echo "<div class='col-12'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row["recipe_name"] . "</h5>";
                echo "<p class='card-text'><strong>Category:</strong> " . $row["category"] . "</p>";
                echo "<p class='card-text'><strong>Preparation Time:</strong> " . $row["prep_time"] . " minutes</p>";
                echo "<p class='card-text'><strong>Cooking Time:</strong> " . $row["cook_time"] . " minutes</p>";
                echo "<p class='card-text'><strong>Ingredients:</strong> " . $row["ingredients"] . "</p>";
                echo "<p class='card-text'><strong>Instructions:</strong> " . $row["instructions"] . "</p>";
                echo "<p class='card-text'><strong>Difficulty:</strong> " . $row["difficulty"] . "</p>";
                echo "<p class='card-text'><strong>Serving Size:</strong> " . $row["serving_size"] . "</p>";
                echo "<form action='remove_favorite.php' method='post'>";
                echo "<input type='hidden' name='recipe_id' value='" . $row["id"] . "'>";
                echo "<button type='submit' class='btn btn-danger'>Favorilerden Çıkar</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
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
