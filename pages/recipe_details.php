<?php
session_start();

include($_SERVER['DOCUMENT_ROOT'] . '/cook/baglanti.php');

if (isset($_GET['recipe_id']) && !empty($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];

    $sql = "SELECT * FROM recipes WHERE id = '$recipe_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
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

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM user_favorites WHERE user_id = (SELECT id FROM users WHERE username = '$username' LIMIT 1) AND recipe_id = '$recipe_id'";

    $result = mysqli_query($conn, $sql);
    $is_favorite = (mysqli_num_rows($result) == 1) ? true : false;
}

$user_has_commented = false;
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM comments WHERE user_id = (SELECT id FROM users WHERE username = '$username' LIMIT 1) AND recipe_id = '$recipe_id'";
    $result = mysqli_query($conn, $sql);
    $user_has_commented = (mysqli_num_rows($result) > 0) ? true : false;
}

$total_rating = 0;
$total_comments = 0;

$sql = "SELECT rating FROM comments WHERE recipe_id = '$recipe_id'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $total_rating += $row['rating'];
    $total_comments++;
}

$average_rating = ($total_comments > 0) ? round($total_rating / $total_comments, 1) : 0;

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
    <style>
    

    .rating {
        display: flex;
        flex-direction:row-reverse; /* Yıldızların sıralanması */
        font-size: 32px;
    }

    .rating input {
        display: none;
    }

    .rating label {
        cursor: pointer;
        color: #ddd; /* default renk */
    }

    .rating input:checked ~ label,
    .rating input:checked ~ label ~ label {
        color: #FFD700; /* seçili renk */
    }

    .comment {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    .comment p {
        margin: 5px 0;
    }

    .comment .rating {
        font-size: 24px;
    }

    .comment .text-muted {
        font-size: 12px;
    }

    .comment .edit-btn,
    .comment .delete-btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .comment .delete-btn {
        background-color: #dc3545;
    }

    .comment .edit-btn:hover,
    .comment .delete-btn:hover {
        background-color: #0056b3;
    }
</style>

</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/cook/navbar2.php'); ?>
<div class="container">
    <h1 class="mb-4"><?php echo $recipe_name; ?></h1>
    <div class="row">
        <div class="col-md-6">
            <img src="../<?php echo $image; ?>" class="img-fluid" alt="<?php echo $recipe_name; ?>">
        </div>
        <div class="col-md-6">
            <h3>Category: <?php echo $category; ?></h3>
            <p><strong>Preparation Time:</strong> <?php echo $prep_time; ?> minutes</p>
            <p><strong>Cooking Time:</strong> <?php echo $cook_time; ?> minutes</p>
            <p><strong>Ingredients:</strong></p>

            <ul>
    <?php 
    $ingredient_list = explode("\n", $ingredients);
    foreach ($ingredient_list as $ingredient) {
        echo "<li>$ingredient</li>";
    }
    ?>
</ul>

<p><strong>Instructions:</strong></p>
<ul>
    <?php 
    $instruction_list = explode("\n", $instructions);
    foreach ($instruction_list as $instruction) {
        echo "<li>$instruction</li>";
    }
    ?>
</ul>
            <p><strong>Difficulty:</strong> <?php echo $difficulty; ?></p>
            <p><strong>Serving Size:</strong> <?php echo $serving_size; ?></p>
            <p><strong>Total Ratings:</strong> <?php echo $total_comments; ?></p>
            <p><strong>Average Rating:</strong> <?php echo $average_rating; ?> / 5</p>
            <?php if (isset($_SESSION['username'])): ?>
                <?php if ($is_favorite): ?>
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

<?php if (isset($_SESSION['username']) && !$user_has_commented): ?>
    <div class="container mt-4">
        <h3>Add a Comment and Rating</h3>
        <form action="" method="post">
            <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
            <div class="mb-3">
                <label for="rating" class="form-label">Rating:</label>
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1">&#9733;</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Comment:</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php elseif (isset($_SESSION['username']) &&
$user_has_commented): ?>
<div class="container mt-4">
    <h3>Edit Your Comment and Rating</h3>
    <?php
    $sql = "SELECT rating, comment FROM comments WHERE user_id = (SELECT id FROM users WHERE username = '$username' LIMIT 1) AND recipe_id = '$recipe_id'";
    $result = mysqli_query($conn, $sql);
    $comment_row = mysqli_fetch_assoc($result);
    ?>
    <form action="" method="post">
        <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
        <div class="mb-3">
            <label for="rating" class="form-label"></label>
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5" <?php if ($comment_row['rating'] == 5) echo 'checked'; ?>>
                <label for="star5">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4" <?php if ($comment_row['rating'] == 4) echo 'checked'; ?>>
                <label for="star4">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3" <?php if ($comment_row['rating'] == 3) echo 'checked'; ?>>
                <label for="star3">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2" <?php if ($comment_row['rating'] == 2) echo 'checked'; ?>>
                <label for="star2">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1" <?php if ($comment_row['rating'] == 1) echo 'checked'; ?>>
                <label for="star1">&#9733;</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment:</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" required><?php echo $comment_row['comment']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit Comment</button>
    </form>
</div>
<?php endif; ?>

<div class="container mt-4">
<h3>Comments and Ratings</h3>
<div id="commentsSection">
    <?php
    $sql = "SELECT c.rating, c.comment, c.created_at, u.username FROM comments c JOIN users u ON c.user_id = u.id WHERE c.recipe_id = '$recipe_id' ORDER BY c.created_at DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0):
        while ($row = mysqli_fetch_assoc($result)):
    ?>
            <div class="comment mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <strong><?php echo $row['username']; ?></strong>
                    <div class="rating">
                        <?php for ($i = 0; $i < $row['rating']; $i++): ?>
                            <span>&#9733;</span>
                        <?php endfor; ?>
                    </div>
                </div>
                <p><?php echo $row['comment']; ?></p>
                <small class="text-muted"><?php echo $row['created_at']; ?></small>
            </div>
        <?php
        endwhile;
    else:
        ?>
        <p>No comments yet.</p>
    <?php
    endif;
    ?>
</div>
</div>

<?php
if (isset($_POST['rating']) && isset($_POST['comment'])) {
    $new_rating = $_POST['rating'];
    $new_comment = $_POST['comment'];

    $sql_user = "SELECT id FROM users WHERE username = ?";
    $stmt_user = mysqli_prepare($conn, $sql_user);
    mysqli_stmt_bind_param($stmt_user, "s", $username);
    mysqli_stmt_execute($stmt_user);
    $result_user = mysqli_stmt_POST_result($stmt_user);

    if ($row_user = mysqli_fetch_assoc($result_user)) {
        $user_id = $row_user['id'];

        $sql_update = "UPDATE comments SET rating = ?, comment = ? WHERE user_id = ? AND recipe_id = ?";
        $stmt_update = mysqli_prepare($conn, $sql_update);
        mysqli_stmt_bind_param($stmt_update, "isii", $new_rating, $new_comment, $user_id, $recipe_id);
        $update_result = mysqli_stmt_execute($stmt_update);

        
    } else {
        echo "User not found!";
    }
}

?>



</body>
</html>
```
