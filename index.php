<?php
// Burada PHP kodu olmadığı için herhangi bir işlem yapmıyoruz.
// Sadece HTML kodunu PHP dosyasına yerleştiriyoruz.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
    <?php
    // Navbar'ı çağırıyoruz
    include './navbar.php';
    ?>

    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./images/cookingwithavocado912.jpg" class="d-block w-100" alt="...">
        </div>
        
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <a href="./pages/breakfast.php" class="card-link" >
        <div class="card h-100">
          <img src="./images/breakfast.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">BREAKFAST</h5>
            <p class="card-text">
              Breakfast is essential for starting your day right and boosting metabolism. My collection of breakfast recipes offers filling yet light options, including smoothies and fluffy pancakes. With these recipes, you'll have delicious choices for every day of the week.</p>
          </div>
          
        </div></a>
      </div>
      <div class="col">
        <a href="./pages/soup.php" class="card-link">
        <div class="card h-100">
          <img src="./images/soup.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">SOUP</h5>
            <p class="card-text">This collection contains delicious soups that you can enjoy in every season. It includes simple classics as well as vegan options. Soups are perfect comforting foods that will warm both your stomach and your heart.</p>
          </div>
          
        </div></a>
      </div>
      <div class="col">
        <a href="./pages/dessert.php" class="card-link">
        <div class="card h-100">
          <img src="./images/dessert.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">DESSERT</h5>
            <p class="card-text">
              Indulge yourself with delicious desserts that are both simple and satisfying. From cookies to brownies, there's something for everyone. Even if baking isn't your forte, there are quick and easy no-bake options. These treats are inspired by classics and promise to satisfy your sweet cravings guilt-free!</p>
          </div>
          
        </div></a>
      </div>
      
      
    </div>
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
    </ul>
    <p class="text-center text-body-secondary">© 2024 Company, Inc<br>Zehra and Hatice</p>
  </footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="./script.js"></script>

</body>

</html>
