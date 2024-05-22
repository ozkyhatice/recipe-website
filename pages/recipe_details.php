<?php
session_start();

include($_SERVER['DOCUMENT_ROOT'] . '/cook/baglanti.php');

// Tarif ID'sini al
if(isset($_GET['recipe_id']) && !empty($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];

    // Tarifi veritabanından al
    $sql = "SELECT * FROM recipes WHERE id = '$recipe_id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $recipe_name = $row['recipe_name'];
        $category = $row['category'];
        $prep_time = $row['prep_time'];
        $cook_time = $row['cook_time'];
        $ingredients = $row['ingredients'];
        $instructions = $row['instructions'];
        $image = $row['image'];
        $difficulty = $row['difficulty'];
        $serving_size = $row['serving_size'];
    } else {
        echo "Recipe not found!";
        exit;
    }
} else {
    echo "Invalid recipe ID!";
    exit;
}

// Kullanıcı giriş yapmışsa
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Favori listesinde mi kontrol et
    $sql = "SELECT * FROM user_favorites WHERE user_id = (SELECT id FROM users WHERE username = '$username') AND recipe_id = '$recipe_id'";
    $result = mysqli_query($conn, $sql);
    $is_favorite = (mysqli_num_rows($result) == 1) ? true : false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $recipe_name; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../navbar2.css">
    <link rel="stylesheet" href="../styles/view_recipe.css">
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/cook/navbar2.php'); ?>
    <div class="container">
        <h1 class="mb-4"><?php echo $recipe_name; ?></h1>
        <div class="row">
            <div class="col-md-6">
                <img src="../images/<?php echo $image; ?>" class="img-fluid" alt="<?php echo $recipe_name; ?>">
            </div>
            <div class="col-md-6">
                <h3>Category: <?php echo $category; ?></h3>
                <p><strong>Preparation Time:</strong> <?php echo $prep_time; ?> minutes</p>
                <p><strong>Cooking Time:</strong> <?php echo $cook_time; ?> minutes</p>
                <p><strong>Ingredients:</strong></p>
                <p><?php echo $ingredients; ?></p>
                <p><strong>Instructions:</strong></p>
                <p><?php echo $instructions; ?></p>
                <p><strong>Difficulty:</strong> <?php echo $difficulty; ?></p>
                <p><strong>Serving Size:</strong> <?php echo $serving_size; ?></p>
                <?php if(isset($_SESSION['username'])): ?>
                    <?php if($is_favorite): ?>
                        <form action="remove_favorite.php" method="post">
                            <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
                            <button type="submit" class="btn btn-danger">Remove from Favorites</button>
                        </form>
                    <?php else: ?>
                        <form action="add_favorite.php" method="post">
                            <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
                            <button type="submit" class="btn btn-primary">Add to Favorites</button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
