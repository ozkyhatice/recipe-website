<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1 class="navbar-brand" href="#">
      <img src="../images/logo.png" alt="Logo" width="30" height="30">
      H & Z  Chefs
    </h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../index2.php">HOME <span class="sr-only"></span></a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            RECIPES
          </a>
          
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../pages/breakfast.php">Breakfast</a>
            <a class="dropdown-item" href="../pages/soup.php">Soup</a>
            <a class="dropdown-item" href="../pages/dessert.php">Dessert</a>
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
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="../images/user.png" alt="Profile Picture" width="30" height="30">
          <i class="fas fa-user"></i> Profile
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">My Profile</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Logout</a></li>
      </ul>
    </div>
  </nav>
