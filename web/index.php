<?php
    session_start();

    // Check if the user is authenticated
    if (!isset($_SESSION['user_email'])) {
        header("Location: ../web/soln/index.html"); // Redirect to the login page if not authenticated
        exit();
    }

    // The user is authenticated, so you can display the dashboard content
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BOOK YOUR MEALS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- =======================================================
  * Template Name: Restaurantly - v3.1.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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

      <h1 class="logo me-auto me-lg-0"><a href="index.php">BOOK YOUR MEALS</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#Restaurant">Restaurant</a></li>
        <!--<li><a class="nav-link scrollto" href="#menu">Menu</a></li>-->
          <li><a class="nav-link scrollto" href="#chefs">Catering</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="ordersDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Orders
  </a>
  <div class="dropdown-menu" aria-labelledby="ordersDropdown">
    <a class="dropdown-item" href="history.php">Table Details</a>
    <a class="dropdown-item" href="detail.php">Track Orders</a>
    <a class="dropdown-item" href="manage_orders.php">Manage Orders</a>
  </div>
</li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      
      <!-- Profile Icon and User's Name -->
<div class="profile-info">
  <i class="fas fa-user-circle fa-lg profile-icon"></i>
</div>

<!-- Hidden Profile Box -->
<div class="profile-box" id="profile-box">
  <div class="user-details">
    <p><?php echo $_SESSION['user_name']; ?></p>
    <p><?php echo $_SESSION['user_email']; ?></p>
    <!-- Add more details or options here -->
  </div>
  <a href="../web/soln/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

    </div>
  </header><!-- End Header -->

  <script>
        // Assuming you have an array of order options
        const orderOptions = ["Order 1", "Order 2", "Order 3", "Order 4"];

        // Get a reference to the select element
        const orderDropdown = document.getElementById("orderDropdown");

        // Loop through the order options and create option elements
        orderOptions.forEach((optionText) => {
            const option = document.createElement("option");
            option.text = optionText;
            orderDropdown.appendChild(option);
        });
    </script>

  <style>

.dropdown-menu {
    background-color: dimgray; /* Replace with your preferred background color */
}


    /* Style the profile icon */
  .profile-info {
    display: flex;
    align-items: center;
  }

  .profile-info i {
    font-size: 30px; /* Adjust the icon size as needed */
    margin-right: 5px; /* Add some spacing between the icon and the name */
  }

  .user-name {
    font-size: 16px; /* Adjust the font size of the user's name */
  }


  /* Style for the hidden profile box */
  .profile-box {
    display: none;
    position: absolute;
    top: 50px;
    right: 0;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    padding: 10px;
    z-index: 9999;
    background-color: grey;
  }

  /* Style for the profile icon */
  .profile-icon {
    cursor: pointer;
    padding: 10px;
  }

/* Style for the hidden profile dropdown */
.profile-dropdown {
    position: relative;
    display: inline-block;
  }

  .profile-dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    right: 0;
  }

  .profile-dropdown:hover .profile-dropdown-content {
    display: block;
  }

</style>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const profileIcon = document.querySelector(".profile-icon");
    const profileBox = document.getElementById("profile-box");

    profileIcon.addEventListener("click", function () {
      // Toggle the visibility of the profile box
      if (profileBox.style.display === "none" || profileBox.style.display === "") {
        profileBox.style.display = "block";
      } else {
        profileBox.style.display = "none";
      }
    });
  });
</script>







  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome</h1>
          <h2>Delivering great food for you</h2>

          <div class="btns">
            <!--<a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>-->
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

   
    <!-- ======= About Section ======= -->
	
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>ABOUT.</h3>
            <p>
             Our main service is to provide food ordering and table reservation system.<br> Customers can book the table in order to get here.<br> Menu information are provided in this site .<br>This catering services provide both vegetarian and non vegetarian foods and it also had the option to choose which items in both vegetarian and non vegetarian food we want and thus it helps to save money and there is no wastage of food
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
	<!-- ======= Restaurant Section ======= -->
<!-- ======= Restaurant Section ======= -->
<section id="Restaurant" class="Restaurant">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h1>Lists of Restaurant</h1>
    </div>
    <div class="row">
      <!-- Nescafe - Left Side -->
     
      <div class="col-lg-4 col-md-6">
        <div class="member" data-aos="zoom-in" data-aos-delay="100">
          <img src="assets/img/menucrd2.jpg" class="img-fluid" alt="Nescafe Card">
          <div class="member-info">
            <div class="member-info-content">
            <h4>Nescafe</h4>
              <h4><a href="menu2/menu2.php" class="restaurant">MENU CARD</a></h4>
            </div>
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Grand Restaurant - Right Side -->
    
      <div class="col-lg-4 col-md-6 offset-lg-4">
      
        <div class="member" data-aos="zoom-in" data-aos-delay="100">
          <img src="assets/img/1000078893.jpg" class="img-fluid" alt="Grand Restaurant Card">
          <div class="member-info">
            <div class="member-info-content">
            <h4>Grand Restaurant</h4>
              <h4><a href="menu1/menu1.html" class="restaurant">MENU CARD</a></h4>
            </div>
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Restaurant Section -->
  
    <!-- End Book A Table Section -->
  <section id="book-a-table" class="book-a-table" style="background-image: url('assets/img/about-bg.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6 text-white">
                        <h6 class="text-white text-uppercase"></h6>
                        <h1>Book a table</h1>
                        <p class="mb-4"></p>
                        <p class="mb-4"></p>
                    </div>
                    <div class="col-md-6">
                    
                    <div class="reservation-box">
                <h1>Reservation</h1>
                <form action="book.php" method="post" id="reservation-form">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-transparent" id="restaurantname" placeholder="Enter Restaurant Name" name="restaurantname">
                                <label for="restaurantname"><i>Restaurant Name</i></label>
                                <span class="error-message" id="restaurantname-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control bg-transparent" id="number" placeholder="Enter Phone Number" name="number">
                                <label for="number"><i>Phone Number</i></label>
                                <span class="error-message" id="number-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="time" class="form-control bg-transparent" id="time" placeholder="Select Reservation Time" name="time">
                                <label for="time"><i>Reservation Time</i></label>
                                <span class="error-message" id="time-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                <input type="date" class="form-control bg-transparent datetimepicker-input" id="date" placeholder="Select Reservation Date" name="date" data-target="#date3" data-toggle="datepicker" />
                                <label for="date"><i>Reservation Date</i></label>
                                <span class="error-message" id="date-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control bg-transparent" id="people" placeholder="Enter Number of People" name="people">
                                <label for="people"><i>Number of People</i></label>
                                <span class="error-message" id="people-error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-outline-light w-50 py-3" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
    </section>


    <style>
    /* Increase font size and weight for better visibility */
    .form-control {
        font-size: 18px; /* Adjust the font size as needed */
        font-weight: bolder; /* Adjust the font weight as needed */
        color: white;
        
    }
    /* Set the background color of Reservation Time and Reservation Date to white */
    input#time,
    input#date {
        background-color: white;
        color: black;
    }

    h1{
        color: #cda45e;
    }

    button[type="submit"]  {
    font-weight: 400;
    font-size: 18px;
    letter-spacing: 2px;
    text-transform: uppercase;
    display: inline-block;
    padding: 2;
    border-radius: 50px;
    transition: 0.3s;
    line-height: 1;
    color: white;
    border: 2px solid #cda45e;
    text-transform: uppercase;
     
    font-family: 'Arial', sans-serif;


}
button[type="submit"]:hover {
    background-color: #cda45e;
      /* Change the background color on hover */
}

.reservation-box {
  background-color:  rgba(155, 133, 88, 0.6); /* Background color for the box */
  border: 0px solid #ccc; /* Border around the box */
  padding: 20px; /* Spacing inside the box */
  border-radius: 5px; /* Rounded corners for the box */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a shadow for depth */
  width: 600px; /* Set the width */
    height: 400px; /* Set the height */
    margin: 0 auto; /* Center the box horizontally */
    text-align: center; /* Center-align the content within the reservation box */
  
}

.reservation-box input[type="text"],
.reservation-box input[type="number"],
.reservation-box input[type="date"],
.reservation-box input[type="time"],
.reservation-box input[type="number"] {
    border-color: #cda45e; /* Change the border color to blue (#007bff) */
}

/* Error message styling */
.error-message {
            color: red;
            font-size: 12px;
        }

</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("reservation-form");
            form.addEventListener("submit", function (event) {
                let isValid = true;

                // Check if Restaurant Name is empty
                const restaurantName = document.getElementById("restaurantname");
                const restaurantNameError = document.getElementById("restaurantname-error");
                if (restaurantName.value.trim() === "") {
                    restaurantNameError.textContent = "Restaurant Name is required";
                    isValid = false;
                } else {
                    restaurantNameError.textContent = "";
                }

                // Check if Phone Number is empty
                const phoneNumber = document.getElementById("number");
                const phoneNumberError = document.getElementById("number-error");
                if (phoneNumber.value.trim() === "") {
                    phoneNumberError.textContent = "Phone Number is required";
                    isValid = false;
                } else {
                    phoneNumberError.textContent = "";
                }

                // Check if Reservation Time is empty
                const reservationTime = document.getElementById("time");
                const reservationTimeError = document.getElementById("time-error");
                if (reservationTime.value.trim() === "") {
                    reservationTimeError.textContent = "Reservation Time is required";
                    isValid = false;
                } else {
                    reservationTimeError.textContent = "";
                }

                // Check if Reservation Date is empty
                const reservationDate = document.getElementById("date");
                const reservationDateError = document.getElementById("date-error");
                if (reservationDate.value.trim() === "") {
                    reservationDateError.textContent = "Reservation Date is required";
                    isValid = false;
                } else {
                    reservationDateError.textContent = "";
                }

                // Check if Number of People is empty
                const numberOfPeople = document.getElementById("people");
                const numberOfPeopleError = document.getElementById("people-error");
                if (numberOfPeople.value.trim() === "") {
                    numberOfPeopleError.textContent = "Number of People is required";
                    isValid = false;
                } else {
                    numberOfPeopleError.textContent = "";
                }

                if (!isValid) {
                    event.preventDefault(); // Prevent form submission if there are validation errors
                }
            });
        });
    </script>












    
	<!-- ======= catering Section ======= -->
    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Chefs</h2>
      <p>CATERING</p>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="member" data-aos="zoom-in" data-aos-delay="100">
          <img src="assets/img/catering/veg.jpeg" class="img-fluid equal-height-img" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <a href="menu1/menu1.html">
                <h1>VEGETERIAN</h1>
                <span></span>
              </a>
            </div>
            <div class="social">
              <a href=""><i class=""></i></a>
              <a href=""><i class=""></i></a>
              <a href=""><i class=""></i></a>
              <a href=""><i class=""></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="member" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/catering/nonveg.jpeg" class="img-fluid equal-height-img" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <a href="menu1/menu1.html">
                <h1>NON VEG</h1>
                <span></span>
              </a>
            </div>
            <div class="social">
              <a href=""><i class=""></i></a>
              <a href=""><i class=""></i></a>
              <a href=""><i class=""></i></a>
              <a href=""><i class=""></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<style>
  .equal-height-img {
  height: 300px; /* Adjust the height as needed */
  width: 100%;
  object-fit: cover;
}
</style>


<!-- End Chefs Section -->
    </section><!-- End catering Section -->



    


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63008.34807327808!2d76.46505814387825!3d9.242352245759918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b061ee020787e0d%3A0xc496b728b31ffb0f!2sMavelikara%2C%20Kerala!5e0!3m2!1sen!2sin!4v1686332215300!5m2!1sen!2sin" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>mavelikara, alappuzha, pin:680-101</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  09:00 AM - 09:00 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>bookyourmeals@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>6282922844</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
         

           <form action="message.php" method="post" id="reservation-form">
                    <div class="row g-3">
                        <div class="form-group mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-transparent" id="name" placeholder="Enter  Name" name="name">
                                <label for="name"><i> Name</i></label>
                                <span class="error-message" id="name-error"></span>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-transparent" id="message" placeholder="message" name="message">
                                <label for="message"><i>message</i></label>
                                <span class="error-message" id="number-error"></span>
                            </div>
                        </div>
                       
                        <div class="col-12">
                            <button class="btn btn-outline-light w-50 py-3" type="submit">Submit</button>
                        </div>
                    </div>
                </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    <script>
    // Function to reload the page after submission
    function reloadPage() {
        location.reload();
    }

    // Add an event listener to the form submission
    document.getElementById("submit-btn").addEventListener("click", function() {
        document.querySelector(".loading").style.display = "block";
        setTimeout(reloadPage, 2000); // Reload the page after 2 seconds (adjust as needed)
    });

    $(document).ready(function () {
  $("#submitButton").click(function () {
    // Serialize the form data
    var formData = $("#myForm").serialize();

    // Send an AJAX request to message.php
    $.ajax({
      type: "POST",
      url: "message.php",
      data: formData,
      success: function (response) {
        // Display the response on the current page
        $(".sent-message").html(response);
        $(".loading").hide();
      },
      error: function () {
        // Handle errors if needed
        $(".sent-message").html("An error occurred while sending the message.");
        $(".loading").hide();
      },
    });
  });
});
</script>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Book your meals</h3>
              <p>
                mavelikara <br>
                pin:680-101, kerala<br><br>
                <strong>Phone:</strong> 6282922844<br>
                <strong>Email:</strong> bookyourmeals@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
        </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Book your meals</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a href="https://bootstrapmade.com/">Book your meals</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>