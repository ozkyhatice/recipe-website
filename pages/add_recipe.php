<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/add_recipe.css">
    <link rel="stylesheet" href="../navbar2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <title>Add Recipe</title>
</head>
<body>
    <?php
    // Navbar'ı çağırıyoruz
    include '../navbar2.php';
    ?>
    <div class="container">
        <h1>Add Recipe</h1>
        <form action="submit_recipe.php" method="post" enctype="multipart/form-data">
            <label for="recipe_name">Recipe Name:</label>
            <input type="text" id="recipe_name" name="recipe_name" required>
            
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">Select</option>
                <option value="Breakfast">Breakfast</option>
                <option value="Soup">Soup</option>
                <option value="Main Course">Main Course</option>
                <option value="Dessert">Dessert</option>
            </select>
            
            <label for="prep_time">Preparation Time (minutes):</label>
            <input type="number" id="prep_time" name="prep_time" required>
            
            <label for="cook_time">Cooking Time (minutes):</label>
            <input type="number" id="cook_time" name="cook_time" required>
            
            <label for="ingredients">Ingredients:</label>
            <textarea id="ingredients" name="ingredients" rows="4" required></textarea>
            
            <label for="instructions">Instructions:</label>
            <textarea id="instructions" name="instructions" rows="6" required></textarea>
            
            <label for="image">Recipe Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            <br><br>
            <label for="difficulty">Difficulty Level:</label>
            <select id="difficulty" name="difficulty" required>
                <option value="">Select</option>
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
            </select>
            
            <label for="serving_size">Serving Size:</label>
            <input type="number" id="serving_size" name="serving_size" required>
            
            <button type="submit">Submit Recipe</button>
        </form>
    </div>
    <?php
    // Navbar'ı çağırıyoruz
    include '../footer.php';
    ?>

<?php
// Veritabanı bağlantısı
$serverName = "localhost";
$connectionOptions = array(
    "Database" => "recipesdatabase",
    "Uid" => "SA",
    "PWD" => "reallyStrongPwd123"
);
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Formdan gelen verileri al
$recipe_name = $_POST["recipe_name"];
$category = $_POST["category"];
$prep_time = $_POST["prep_time"];
$cook_time = $_POST["cook_time"];
$ingredients = $_POST["ingredients"];
$instructions = $_POST["instructions"];
$image = $_FILES["image"]["name"];
$difficulty = $_POST["difficulty"];
$serving_size = $_POST["serving_size"];

// SQL sorgusu
$sql = "INSERT INTO recipes (recipe_name, category, prep_time, cook_time, ingredients, instructions, image, difficulty, serving_size) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Sorguyu hazırla
$stmt = sqlsrv_prepare($conn, $sql, array(&$recipe_name, &$category, &$prep_time, &$cook_time, &$ingredients, &$instructions, &$image, &$difficulty, &$serving_size));

// Sorguyu çalıştır ve sonucu kontrol et
if (sqlsrv_execute($stmt) === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Tarif başarıyla eklendi.";
}

// Bağlantıyı kapat
sqlsrv_close($conn);
?>

    <script src="../js/add_recipes.js"></script>
</body>
</html>
