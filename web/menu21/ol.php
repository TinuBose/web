
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
    <link href="popup.css" rel="stylesheet">
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
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
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
            <div class="section-title">
                <h2>Menu</h2>
                <p>Check Our Tasty Menu</p>
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
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "backend";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, meal_name, category, image, description, price FROM menu";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-lg-6 menu-item filter-' . strtolower($row["category"]) . '" data-item-info=\'{"itemId": ' . $row["id"] . ', "itemName": "' . $row["meal_name"] . '", "itemPrice": ' . $row["price"] . ', "itemImage": "../assets/img/menu/' . $row["image"] . '"}\'>';
                        echo '<img src="../assets/img/menu/' . $row["image"] . '" class="menu-img" alt="">';
                        echo '<div class="menu-content">';
                        echo '<a href="#" onclick="openPopup(\'../assets/img/menu/' . $row["image"] . '\', \'' . $row["meal_name"] . '\', \'' . $row["description"] . '\', \'₹' . $row["price"] . '\');">' . $row["meal_name"] . '</a><span>₹' . $row["price"] . '</span>';
                        echo '</div>';
                        echo '<div class="menu-ingredients">';
                        echo $row["description"];
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No menu items found.</p>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </div>
        </div>
    </section>
    <!-- Item Popup -->
    <div id="item-popup" class="popup">
        <div class="popup-content">
            <span class="close-popup" onclick="closePopup()">&times;</span>
            <div class="item-details">
                <img id="popup-image" src="" alt="">
                <div class="item-info">
                    <h2 id="popup-item-name"></h2>
                    <p id="popup-item-details"></p>
                    <p id="popup-item-price"></p>
                    <input type="number" id="quantity" value="1" min="1">
                    <button onclick="addToCart(document.getElementById('popup-item-name').textContent, parseFloat(document.getElementById('popup-item-price').textContent));" class="btn-book animated fadeInUp scrollto">Add to Cart</button>
                    
    <div id="item-popup" class="popup">
        <!-- ... (your existing popup content) ... -->
        <button onclick="addToCart(itemName, itemPrice);" class="btn-book animated fadeInUp scrollto">Add to Cart</button>
    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="popup.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    
        // Function to add an item to the cart
        <!-- ... (your existing HTML body content) ... -->
    <!-- Item Popup -->
     <div id="item-popup" class="popup">
        <!-- ... (your existing popup content) ... -->
        <button onclick="addToCart(itemName, itemPrice, itemDescription);" class="btn-book animated fadeInUp scrollto">Add to Cart</button>
    </div>

    <!-- View Cart Button -->
<div class="view-cart">
    <a href="../cart/checkout.html" class="view-cart-button">
        <i class="fas fa-shopping-cart"></i> View Cart
    </a>
</div>
   
    <script src="popup.js"></script>
    <!-- ... (your existing JavaScript imports) ... -->

    <script>

      // Function to add an item to the cart
function addToCart(itemName, itemPrice, itemDescription) {
    const quantity = parseInt(document.getElementById('quantity').value);
    const total = quantity * itemPrice;
    const cartItem = {
        itemName,
        itemPrice,
        itemDescription,
        quantity,
        total
    };

    // Check if the cart already exists in session storage
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    // Add the item to the cart
    cart.push(cartItem);

    // Store the updated cart in session storage
    sessionStorage.setItem('cart', JSON.stringify(cart));

    // Redirect back to the menu page or refresh the current page
    window.location.reload(); // You can also use window.location.href to redirect

    // Optionally, you can provide a confirmation message here
    alert('Item added to cart!');
}
    </script>
    <style>
        /* Style for the View Cart button and cart icon */
        .view-cart {
            position: fixed;
            top: 20px; /* Adjust the top distance as needed */
            right: 20px; /* Adjust the right distance as needed */
            z-index: 999; /* To ensure it appears above other content */
        }

        .view-cart-button {
            background-color: #cda45e; /* Change the background color as desired */
            color: #fff; /* Change the text color as desired */
            padding: 10px 15px;
            border: none;
            border-radius: 50px; /* To make it circular */
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .view-cart-button i {
            margin-right: 8px; /* Adjust the spacing between the icon and text */
        }

        section {
            padding: 150px 0;
            overflow: hidden;
        }
    </style>
</body>
</html>