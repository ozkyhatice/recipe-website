<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1 class="navbar-brand" href="#">
      <img src="./images/logo.png" alt="Logo" width="30" height="30">
      H & Z  Chefs
    </h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">HOME <span class="sr-only"></span></a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            RECIPES
          </a>
          
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="./pages/breakfast.html">Breakfast</a>
            <a class="dropdown-item" href="./pages/soup.html">Soup</a>
            <a class="dropdown-item" href="./pages/dessert.html">Dessert</a>
            <!-- <div class="dropdown-divider"></div> -->
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ABOUT</a>
        </li>
      </ul>
      
    </div>
    <div class="searchsubmit">
      <form class="form-inline my-2 my-lg-0" method="get" action="">
          <div class="d-flex align-items-center"> <!-- Add a container to align items -->
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </div>
        </form>
    </div>
    <div class="ml-auto">
      <form action="./pages/login.php" method="post">
        <button type="submit" class="btn btn-outline-success login-btn" id="loginButton">Sign In / Sign Up</button>
      </form>
    </div>
  </nav>
