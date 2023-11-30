<?php
// Create a database connection (replace with your own database credentials)
$conn = new mysqli("localhost", "root", "", "backend");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch menu items from the database
$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);

$menu_items = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menu_items[] = $row;
    }
}
$conn->close();
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BOOK YOUR MEALS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-7fEXmDez9nF4y6CD4nHtP5Q7z5G8pJGtW3uyfO+hs9L81Vb2aU5G5p+5C5fO4y8P6" crossorigin="anonymous">


</head>

<body>
  

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex justify-content-center justify-content-md-between">

    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-phone d-flex align-items-center"><span>+91 6282922844</span></i>
      <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 09:00AM - 8PM</span></i>
    </div>

    <div class="languages d-none d-md-flex align-items-center">
      <ul>
        <li>En</li>
      </ul>
    </div>
  </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

    <h1 class="logo me-auto me-lg-0"><a href="index.html">BOOK YOUR MEALS</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="../index.php#Home">Home</a></li>
        <li><a class="nav-link scrollto" href="../index.php#about">About</a></li>
    <li><a class="nav-link scrollto" href="../index.php#Restaurant">Restaurant</a></li>
       <!--<li><a class="nav-link scrollto" href="#menu">Menu</a></li>-->
        <li><a class="nav-link scrollto" href="../index.php#chefs">Catering</a></li>
        <li><a class="nav-link scrollto" href="../index.php#contact">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header>
  





  <section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">

    <!-- Add the View Cart button and cart icon -->
    <div class="view-cart">
      <a href="../menuu/cart.html" class="view-cart-button">
        <i class="fas fa-shopping-cart"></i> View Cart
      </a>
    </div>

      <div class="section-title">
        <h2>Menu</h2>
        <p>NESCAFE Menu</p>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-starters">Starters</li>
                        <li data-filter=".filter-salads">Salads</li>
                        <li data-filter=".filter-specialty">Specialty</li>
                    </ul>
                </div>
            </div>
            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
    <?php foreach ($menu_items as $item) : ?>
        <div class="col-lg-6 menu-item filter-<?php echo $item['item_category']; ?>">
            <img src="<?php echo $item['item_photo']; ?>" class="menu-img" alt="">
            <div class="menu-content">
                <a href="#" class="menu-item-link" data-item="<?php echo $item['item_name']; ?>" data-price="<?php echo $item['item_price']; ?>"><?php echo $item['item_name']; ?></a><span>₹<?php echo $item['item_price']; ?></span>
                <!-- Add a button/link to add the item to the cart -->
                <button class="add-to-cart" data-item-name="<?php echo $item['item_name']; ?>" data-item-price="<?php echo $item['item_price']; ?>">Add to Cart</button>
            </div>
            <div class="menu-ingredients">
                <?php echo $item['item_details']; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    // JavaScript code to handle item addition to the cart
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemName = this.getAttribute('data-item-name');
            const itemPrice = this.getAttribute('data-item-price');

            // You can replace this alert with a custom modal or notification.
            alert(`Item "${itemName}" added to cart. Price: ₹${itemPrice}`);

            // You can also implement the logic to add the item to the cart here.
        });
    });
</script>

</section>
<section>
<div id="cart">
    <!-- Selected items will be displayed here -->
</div>

</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize an empty cart array to store selected items
        var cart = [];

        // Attach a click event handler to the document for menu-content elements
        $(document).on('click', '.menu-content', function () {
            var itemName = $(this).find('.menu-item-link').data('item');
            var itemPrice = $(this).find('.menu-item-link').data('price');

            // Create an object representing the selected item
            var selectedItem = {
                name: itemName,
                price: itemPrice
            };

            // Add the selected item to the cart array
            cart.push(selectedItem);

            // Store the selected items in localStorage
            localStorage.setItem('cart', JSON.stringify(cart));
        });
      });
</script>









  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>





<style>



/* CSS for the popup container */
.popup-container {
    display: none; /* Hide the popup by default */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
    z-index: 1;
    justify-content: center;
    align-items: center;
}

/* CSS for the popup itself */
.popup {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    max-width: 400px;
    text-align: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    position: relative;
}

/* CSS for the close button */
.close-popup {
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}













section {
  padding: 150px 0;
  overflow: hidden;
  
}


</style>

</body>

</html>