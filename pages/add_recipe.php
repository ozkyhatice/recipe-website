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
    <link rel="icon" type="image/png" href="/images/logo.png">
    <title>Add Recipe</title>
</head>
<body>
    <?php
    include '../navbar2.php';
    ?>
    <div class="container">
        <h1>Add Recipe</h1>
        <form method="post" enctype="multipart/form-data">
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
    
    <script src="/cook/js/add_recipes.js"></script>
</body>
</html>
<?php

include("../baglanti.php");
$conn = mysqli_connect("localhost", "root", "", "hzchefs");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipe_name = $_POST['recipe_name'];
    $category = $_POST['category'];
    $prep_time = $_POST['prep_time'];
    $cook_time = $_POST['cook_time'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $difficulty = $_POST['difficulty'];
    $serving_size = $_POST['serving_size'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = basename($_FILES['image']['name']);
        $image_tmp = $_FILES['image']['tmp_name'];
        $target_dir = '../images/'; // Hedef dizini belirtiyoruz
        $target_file = $target_dir . $image_name;

        // hedef dizine tasima islemi yapiyoruz
        if (move_uploaded_file($image_tmp, $target_file)) {
            $image_path = 'images/' . $image_name;

            $sql = "INSERT INTO recipes (recipe_name, category, prep_time, cook_time, ingredients, instructions, difficulty, serving_size, image) 
                    VALUES ('$recipe_name', '$category', '$prep_time', '$cook_time', '$ingredients', '$instructions', '$difficulty', '$serving_size', '$image_path')";

            if (mysqli_query($conn, $sql)) {
                echo "<div class='container'><div class='alert alert-success' role='alert'>Recipe successfully added.</div></div>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "An error occurred while uploading the image";
        }
    } else {
        echo "An error occurred while uploading the image file " . $_FILES['image']['error'];
    }
}
?>
