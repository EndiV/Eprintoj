<?php
session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eprintoj</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- owl crs link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
          integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
          crossorigin="anonymous"/>
    <!-- font icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>
    <!-- css -->
    <link rel="stylesheet" href="style.css">
    <?php
    // require functions php
    require('functions.php');


    ?>

<body>
<!-- start #header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale font-size-12 text-black-50 m-0">Tirane, Albania</p>
        <div class="font-rale font-size-14">
            <?php if (isset($_SESSION['logged_in']) ) { ?>
                <a href="logout.php" class="px-3 border-right text-dark">Log Out</a>
            <?php } else { ?>
                <a href="login.php" class="px-3 border-right border-left text-dark">Login</a>
                <a href="signup.php" class="px-3 border-right text-dark">Sign Up</a>
            <?php } ?>

        </div>
    </div>

    <!-- Primary Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <a class="navbar-brand" href="index.php">Eprintoj</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto font-rubik">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php#top-sale">Ne Oferte <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#new-Products">Produktet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#blogs">Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php#banner_adds">Coming Soon</a>
                </li>
            </ul>

                <?php if (!isset($_SESSION['logged_in'])) {?>

                <a href="login.php" class="py-2 rounded-pill color-primary-bg">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light"></span>
                </a>
                <?php }else{

                ?>
            <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
            </a>
           <!-- <form action="cart.php" method="get" class="font-size-14 font-rale">
                <button type="submit" name="get_cart"  class="py-2 rounded-pill color-primary-bg" >
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>

                </button>-->

                <?php }?>
            </form>
        </div>
    </nav>
    <!-- !Primary Navigation -->
</header>

<!--Main Section-->

<main id="main-site">