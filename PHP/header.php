<?php
  session_start();
  
  if (isset($_SESSION['username'])) {

    $_SESSION['message'] = "Not Logged In";
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    $_SESSION['user_id'] = 0;
  }

  
?>

<!DOCTYPE html>
<html data-theme="light" id="main">
  <head>
    <title>E-CART</title>

    <!-- Bootstrap styesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Owl Carousel for carousel slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    
    <!-- Font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    
    <!-- Custom CSS reference-->
    <link rel="stylesheet" href="../CSS/style.css">

    <!--Required functions-->
    <?php
      require('functions.php')
    ?>
  </head> 


  <body>

    <!--header-start-->
    
      <header id="header" data-theme="light" class="color-primary-bg">
        <!-- Strip start
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light"> 
            <p class="font-b612 font-size-14 text-black-50 m-0  ">this is a test paragraph</p>
            <div class="font-b612 font-size-14">
              <a href="" class = "px-3 border-right border-left text-dark">Login</a>
              <a href="" class = "px-3 border-right text-dark">Cart</a>
            </div>
        </div>
        Strip section may not be needed-->

        <!-- Navigation Bar start (Template taken for the Bootstrap website)-->
        <nav class="navbar navbar-expand-lg navbar-dark color-secondary-bg  ">
          <a class="navbar-brand" href="index.php">E-<b>CART</b></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto font-b612">
              <li class="nav-item">
                <a class="nav-link" href="listing.php">Browse Listings</a>
              </li>
              <?php if (isset($_SESSION['username'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="user_listing.php">Your Listings</a>
              </li>
              <?php } else { ?>
                <li class="nav-item">
                <a class="nav-link disabled" href="#">Your Listings</a>
              </li>
                <?php } ?>
              <li class="nav-item">
                <a class="nav-link" href="contact_us.php">Contact Us</a>
              </li>

              <li class="nav-item dropdown">
              <?php if (isset($_SESSION['username'])) { ?>
                <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Login/Register
                </a>
                <?php } else { ?>
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Login/Register
                </a>
                 <?php } ?>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                  <a class="dropdown-item" href="login.php">Login</a>  
                  <a class="dropdown-item" href="register.php">Register</a>
                </div>
              </li>
            </ul>
            <?php
              if(isset($_SESSION['success'])) : ?>
              <div>
                <?php
                unset($_SESSION['success']);
                ?>
              </div>
              <?php endif ?>

              <?php if (isset($_SESSION['username'])) { ?>
                  <p class="color-white px-2 font-b612 my-2"> Welcome <?php echo $_SESSION['username']; ?> | ID = <?php echo $_SESSION['user_id'] ?></p>

                  <button class="btn btn-outline-success my-2 my-sm-0 color-white-bg mx-2"><a href ="index.php?logout='1'" >logout</a></button>
              <?php } else { ?>
                <p class="color-white px-2 font-b612 my-2"> Welcome Guest | ID = 0 </p>
              <?php } ?>
            <form action="#" class="font-size-14 font-b612 mr-2">
              <a href="cart.php" class="py-2  color-primary-bg">
                <span class="font-size-16 px-2 text-white"><i class ="fas fa-shopping-cart"></i></span>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <span class="px-3 py-2  text-dark bg-light"><?php echo count($item->getUserData($_SESSION['user_id'],'cart')); ?></span>
                  <?php } else { ?>
                    <span class="px-3 py-2  text-dark bg-light"><?php echo count($item->getUserData(0,'cart')); ?></span>
                <?php } ?>
                
              </a>
            </form>
            
          </div>
        </nav>
        <!--Navigation bar end-->
      </header>
    <!--header-end-->

    <!--start main page-->
      <main id="main-site">