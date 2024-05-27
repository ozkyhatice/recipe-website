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
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php
include("../baglanti.php");
include("../navbar2.php");

$recipeId = $_GET['recipe_id'];

$sql = "SELECT * FROM recipes WHERE id='$recipeId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$recipeName = $row['recipe_name'];
$category = $row['category'];
$preparationTime = $row['prep_time'];
$cookingTime = $row['cook_time'];
$ingredients = $row['ingredients'];
$instructions = $row['instructions'];
$difficulty = $row['difficulty'];
$servingSize = $row['serving_size'];
$imagePath = $row['image'];
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Edit Recipe</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="form-container"  method="POST" enctype="multipart/form-data">
                <!-- Recipe Name -->
                <div class="mb-3">
                    <label for="recipeName" class="form-label">Recipe Name:</label>
                    <input type="text" class="form-control" id="recipeName" name="recipe_name" value="<?php echo $recipeName; ?>" required>
                </div>
                <!-- Category -->
                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="Breakfast" <?php if($category == "Breakfast") echo "selected"; ?>>Breakfast</option>
                        <option value="Soup" <?php if($category == "Soup") echo "selected"; ?>>Soup</option>
                        <option value="Main Course" <?php if($category == "Main Course") echo "selected"; ?>>Main Course</option>
                        <option value="Dessert" <?php if($category == "Dessert") echo "selected"; ?>>Dessert</option>
                    </select>
                </div>
                <!-- Preparation Time -->
                <div class="mb-3">
                    <label for="preparationTime" class="form-label">Preparation Time (minutes):</label>
                    <input type="number" class="form-control" id="preparationTime" name="prep_time" value="<?php echo $preparationTime; ?>" required>
                </div>
                <!-- Cooking Time -->
                <div class="mb-3">
                    <label for="cookingTime" class="form-label">Cooking Time (minutes):</label>
                    <input type="number" class="form-control" id="cookingTime" name="cook_time" value="<?php echo $cookingTime; ?>" required>
                </div>
                <!-- Ingredients -->
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredients:</label>
                    <textarea class="form-control" id="ingredients" name="ingredients" rows="5" required><?php echo $ingredients; ?></textarea>
                </div>
                <!-- Instructions -->
                <div class="mb-3">
                    <label for="instructions" class="form-label">Instructions:</label>
                    <textarea class="form-control" id="instructions" name="instructions" rows="8" required><?php echo $instructions; ?></textarea>
                </div>
                <!-- Recipe Image -->
                <div class="mb-3">
                    <label for="recipeImage" class="form-label">Recipe Image:</label>
                    <input type="file" class="form-control" id="recipeImage" name="image">
                    <span class="form-text">Dosya seçilmedi</span>
                </div>
                <!-- Difficulty Level -->
                <div class="mb-3">
                    <label for="difficulty" class="form-label">Difficulty Level:</label>
                    <select class="form-select" id="difficulty" name="difficulty" required>
                        <option value="Easy" <?php if($difficulty == "Easy") echo "selected"; ?>>Easy</option>
                        <option value="Medium" <?php if($difficulty == "Medium") echo "selected"; ?>>Medium</option>
                        <option value="Hard" <?php if($difficulty == "Hard") echo "selected"; ?>>Hard</option>
                    </select>
                </div>
                <!-- Serving Size -->
                <div class="mb-3">
                    <label for="servingSize" class="form-label">Serving Size:</label>
                    <input type="number" class="form-control" id="servingSize" name="serving_size" value="<?php echo $servingSize; ?>" required>
                </div>
                <!-- Recipe ID (Hidden Field) -->
                <input type="hidden" name="recipe_id" value="<?php echo $recipeId; ?>">
                <!-- Submit Button -->
                <div class="text-center">
                   
                <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipeId = $_POST['recipe_id'];
    $recipeName = $_POST['recipe_name'];
    $category = $_POST['category'];
    $prepTime = $_POST['prep_time'];
    $cookTime = $_POST['cook_time'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $difficulty = $_POST['difficulty'];
    $servingSize = $_POST['serving_size'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageName = basename($_FILES['image']['name']);
        $imageTmp = $_FILES['image']['tmp_name'];
        $targetDir = '../images/';
        $targetFile = $targetDir . $imageName;

        if (move_uploaded_file($imageTmp, $targetFile)) {
            $imagePath = 'images/' . $imageName;
        } else {
            echo "Resim yüklenirken bir hata oluştu.";
        }
    } else {
        $imagePath = $imagePath;
    }

    $sql = "UPDATE recipes SET 
                recipe_name='$recipeName', 
                category='$category', 
                prep_time='$prepTime', 
                cook_time='$cookTime', 
                ingredients='$ingredients', 
                instructions='$instructions', 
                difficulty='$difficulty', 
                serving_size='$servingSize', 
                image='$imagePath' 
            WHERE id='$recipeId'";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='container'><div class='alert alert-success' role='alert'>Recipe updated successfully.</div></div>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<script>
document.getElementById("saveChangesBtn").addEventListener("click", function() {
    document.getElementById("editRecipeForm").submit();
});
</script>
</body>
</html>
