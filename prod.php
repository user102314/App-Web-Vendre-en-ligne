<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: signin.php"); // Rediriger vers la page de connexion si non connecté
    exit();
}

$user_email = $_SESSION['user']; // Récupérer l'email de l'utilisateur
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Our Products - EIDID</title>
    <meta name="keywords" content="Canva Pro, TikTok Verification, Netflix Premium, RedToPay">
    <meta name="description" content="Explore our premium accounts for Canva Pro, TikTok Beta Badge Verification, Netflix Premium, and RedToPay. Elevate your experience today!">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="css/prod.css">
    <style>
        .user-email {
            color: #000770;
            font-size: 18px;
            margin-right: 20px;
        }
    </style>
</head>
<body class="main-layout">
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>

    <header>
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="images/logo (3).png" alt="Premium Accounts" width="150" height="50"/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.html">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.html">About</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="prod.php">Our Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="new.html">New</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">Contact Us</a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="prod.php"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="signin.php">Sign Out</a>
                                    </li>
                                </ul>
                                <span class="user-email">Welcome, <?php echo explode('@', $user_email)[0]; ?></span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Products Section -->
    <div class="products" style="padding-top: 150px;background: black;">
        <div class="container" style="padding-left:10px ;">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="our_products">
                        <div class="row">
                            <!-- Canva Pro -->
                            <div class="col-md-4 margin_bottom1 centerr">
                                <div class="product_box">
                                    <figure><img src="images/canva.png" alt="Canva Pro" style="max-width: 100%;"/></figure>
                                    <h3>Canva Pro</h3><br>
                                    <p>Unlock the full potential of Canva with a Pro account. Access premium templates, advanced design tools, and unlimited storage. Perfect for designers, marketers, and businesses.</p>
                                    <a href="canva.php" class="add-to-cart-btn">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                            <!-- TikTok Verification -->
                            <div class="col-md-4 margin_bottom1">
                                <div class="product_box">
                                    <figure><img src="images/tiktok.png" alt="TikTok Verification" style="max-width: 100%;"/></figure>
                                    <h3>TikTok Verification</h3><br>
                                    <p>Get verified on TikTok with our Beta Badge service. Boost your credibility, stand out from the crowd, and grow your audience faster.</p>
                                    <a href="tiktok.php" class="add-to-cart-btn">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                            <!-- Netflix Premium -->
                            <div class="col-md-4 margin_bottom1">
                                <div class="product_box">
                                    <figure><img src="images/netflix.png" alt="Netflix Premium" style="max-width: 100%;"/></figure>
                                    <h3>Netflix Premium</h3><br>
                                    <p>Enjoy unlimited access to Netflix's vast library of movies, TV shows, and exclusive content. Get your premium account today and start streaming in HD.</p>
                                    <a href="netflix.php" class="add-to-cart-btn">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                            <!-- RedToPay -->
                            <div class="col-md-4 margin_bottom1">
                                <div class="product_box"><br>
                                    <figure><img src="images/wise.png" alt="RedToPay" style="max-width: 100%;"/></figure>
                                    <h3>RedToPay</h3>
                                    <p>Simplify your transactions with RedToPay. Get verified accounts for seamless and secure payments, perfect for businesses and individuals.</p>
                                    <a href="redtopay.php" class="add-to-cart-btn">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products Section -->

    <!-- Footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <img class="logo1" src="images/groupe.png" alt="Premium Accounts" width="200" height="auto"/>
                        <ul class="social_icon">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <h3>About Us</h3>
                        <ul class="about_us">
                            <li>We specialize in providing premium accounts for Canva Pro, TikTok Verification, Netflix Premium, and RedToPay. Elevate your experience with us!</li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <h3>Contact Us</h3>
                        <ul class="conta">
                            <li>Email: contact.eidid@gmail.com<br>Phone: +216 44 321 987<br>Address: Worldwide</li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <form class="bottom_form">
                            <h3>Newsletter</h3>
                            <input class="enter" placeholder="Enter your email" type="email" name="Enter your email" required>
                            <button class="sub_btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2023 All Rights Reserved. EIDID - Premium Accounts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>