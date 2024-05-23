<?php
// Session başlatma kontrolü
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kullanıcı rolünü kontrol eden fonksiyon
function checkUserRole($user_id)
{
    include("baglanti.php");

    // Kullanıcı rolünü al
    $sql = "SELECT role FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $user_role = $row['role'];
        mysqli_close($conn);

        // Eğer kullanıcı admin ise true döndür, değilse false döndür
        return ($user_role === 'admin');
    } else {
        mysqli_close($conn);
        return false;
    }
}

// Kullanıcı rolünü kontrol et
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
if ($user_id && checkUserRole($user_id)) {
    $add_edit_links = '<a class="dropdown-item" href="/cook/pages/add_recipe.php">Add Recipe</a>
                   ';
} else {
    $add_edit_links = '';
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/cook/images/logo.png" alt="Logo" width="30" height="30">
            H & Z  Chefs
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/cook/index.php">HOME <span class="sr-only"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        RECIPES
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/cook/pages/breakfast.php">Breakfast</a>
                        <a class="dropdown-item" href="/cook/pages/soup.php">Soup</a>
                        <a class="dropdown-item" href="/cook/pages/main.php">Main Course</a>
                        <a class="dropdown-item" href="/cook/pages/dessert.php">Dessert</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cook/pages/about.php">ABOUT</a>
                </li>
            </ul>
            <div class="searchsubmit">
                <form class="form-inline my-2 my-lg-0" method="get" action="">
                    <div class="d-flex align-items-center"> <!-- Add a container to align items -->
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/cook/images/user.png" alt="Profile Picture" width="30" height="30">
                    <i class="fas fa-user"></i> Profile
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="/cook/pages/my_profile.php">My Profile</a></li>
                    <li><a class="dropdown-item" href="/cook/pages/my_favorites.php">My Favorites</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <?php echo $add_edit_links; ?>
                    <li><a class="dropdown-item" href="/cook/pages/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
