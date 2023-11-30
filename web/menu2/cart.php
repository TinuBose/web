<?php
    session_start();

    // Check if the user is authenticated
    if (!isset($_SESSION['user_email'])) {
        header("Location: ../web/soln/index.html"); // Redirect to the login page if not authenticated
        exit();
    }

    // The user is authenticated, so you can display the dashboard content
?>

<!-- cart.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="../menu2/style.css" rel="stylesheet">
    <style>
    h1 {
    color: #da4343;
    background-color: black;
    position: relative;
    left: 590px;
    width: 100px;
}


/* Styles for the modal dialog overlay */
.modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        /* Styles for the centered modal dialog content */
        .modal-content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            z-index: 2;
            max-width: 80%; /* Adjust the maximum width as needed */
            max-height: 80%; /* Adjust the maximum height as needed */
            overflow: auto;
        }
    </style>
</head>

<h1>CART</h1>

<table id="cart-table">
    <thead>
        <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Item Price</th>
            <th id="qty">Item Quantity</th>
            <th>Total Price</th>
            <th></th>
        </tr>

    </thead>
    <tbody>
        <!-- Cart items will be displayed here -->
    </tbody>

   
    <td colspan="3"><button id="continue-shopping" onclick="shopping()">Continue Shopping</button></td>
    <td colspan="2" id="tm">Total Amount: ₹<span id="total-amount">0.00</span></td>
<!-- Add this code after your cart table -->

</table>

 


<form id="checkout-form" action="process_order.php" method="post">
    <div>
        <h2>Delivery Address</h2>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <!-- Add more address fields as needed -->
    </div>

    <div>
        <h2>Payment Option</h2>
        <div>
            <label for="credit-card">Credit Card</label>
            <input type="radio" id="credit-card" name="payment_option" value="credit-card" required>
            <label for="UPI">UPI</label>
            <input type="radio" id="UPI" name="payment_option" value="UPI" required>
            <label for="cash-on-delivery">Cash On Delivery</label>
            <input type="radio" id="cash-on-delivery" name="payment_option" value="cash-on-delivery" required>
            <!-- Add more payment options as needed -->
        </div>
    </div>

    <input type="hidden" id="cart-data" name="cart_data" value="">

    <button type="submit" id="place-order-button" onclick="placeOrder()">Place Order</button>
</form>

<script>


function shopping() {
        // Redirect to the desired URL
        window.location.href = "menu2.php";
    }


    // Retrieve the stored cart items from localStorage
    var storedCart = localStorage.getItem('cart');
        var cart = JSON.parse(storedCart) || [];

        var totalPrice = 0; // To keep track of the total price

        function updateCart() {
    var cartTableBody = document.querySelector('#cart-table tbody');
    var totalPriceElement = document.getElementById('total-price');
    var totalAmountElement = document.getElementById('total-amount'); // Add this line

    cartTableBody.innerHTML = '';
    totalPrice = 0; // Reset the total price

    if (cart.length === 0) {
        cartTableBody.innerHTML = '<tr><td colspan="6">Your cart is empty.</td></tr>';
    } else {
        cart.forEach(function (item, index) {
            var itemPrice = parseFloat(item.price);
            var totalItemPrice = item.quantity * itemPrice;

            var row = document.createElement('tr');
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${item.name}</td>
                <td>₹${itemPrice.toFixed(2)}</td>
                <td>
                    <input name="quantity" type="number" value="${item.quantity}" min="1"
                        onchange="updateQuantity(${index}, this.value)" oninput="updateTotalPrice(this, ${index})">
                </td>
                <td>₹<span id="total-price-${index}">${totalItemPrice.toFixed(2)}</span></td>
                <td><button onclick="removeItem(${index})">Remove</button></td>
            `;

            cartTableBody.appendChild(row);

            // Update the total price
            totalPrice += totalItemPrice;
        });

        // Update the total amount
        totalAmountElement.textContent = totalPrice.toFixed(2); // Add this line
    }

    // Update the total price display
    totalPriceElement.textContent = totalPrice.toFixed(2);
}

        // Function to update the quantity of an item in the cart
        function updateQuantity(index, newQuantity) {
            if (newQuantity < 1) {
                newQuantity = 1; // Ensure a minimum quantity of 1
            }
            cart[index].quantity = parseInt(newQuantity);
            localStorage.setItem('cart', JSON.stringify(cart));
            totalPrice = 0; // Reset the total price
            updateCart();
        }

        // Function to update the total price of an item
        function updateTotalPrice(inputField, index) {
            var itemPrice = parseFloat(cart[index].price);
            var quantity = parseInt(inputField.value);
            var totalItemPrice = itemPrice * quantity;
            var totalItemPriceElement = document.getElementById(`total-price-${index}`);
            totalItemPriceElement.textContent = totalItemPrice.toFixed(2);

            // Update the cart and total price
            cart[index].quantity = quantity;
            localStorage.setItem('cart', JSON.stringify(cart));
            calculateTotalPrice();
        }

        // Function to calculate the total price
        function calculateTotalPrice() {
            totalPrice = 0;
            cart.forEach(function (item) {
                var itemPrice = parseFloat(item.price);
                var totalItemPrice = item.quantity * itemPrice;
                totalPrice += totalItemPrice;
            });

            // Update the total price display
            var totalPriceElement = document.getElementById('total-price');
            totalPriceElement.textContent = totalPrice.toFixed(2);
        }

        // Function to remove an item from the cart
        function removeItem(index) {
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            totalPrice = 0; // Reset the total price
            updateCart();
        }

        function placeOrder() {
        var deliveryAddress = document.getElementById('address').value;
        var paymentOption = document.querySelector('input[name="payment-option"]:checked').value;

        // Prepare the cart data
        var cartData = JSON.stringify(cart);

        // Redirect to the PHP file with query parameters
        window.location.href = `place_order.php?address=${encodeURIComponent(deliveryAddress)}&payment-option=${encodeURIComponent(paymentOption)}&cart-data=${encodeURIComponent(cartData)}`;
    }
        // Update the cart display when the page loads
        updateCart();


        function toggleAddress() {
        var addressTab = document.getElementById("addressTab");
        var addressForm = document.getElementById("addressForm");

        // Hide the "Address" button
        addressTab.style.display = "none";
        // Show the address form
        addressForm.classList.remove("hidden");
    }

    function submitAddress() {
        // Handle the address submission logic here
        var address = document.getElementById("address").value;
         // Update the heading to show "Delivery Address ✅"
        var deliveryAddressHeading = document.getElementById("deliveryAddressHeading");
        deliveryAddressHeading.textContent = "Delivery Address ✅";
        // You can now send the address to your backend or perform further actions
        // Hide the address form
        var addressForm = document.getElementById("addressForm");
        addressForm.classList.add("hidden");

    }


    
    function placeOrder() {
    // Retrieve the cart data from localStorage
    var cartData = JSON.stringify(cart);
    
    // Set the cart data in the hidden input field
    document.getElementById('cart-data').value = cartData;

    // Get the address and payment option
    var address = document.getElementById('address').value;
    var paymentOption = document.querySelector('input[name="payment-option"]:checked').value;

    // Send data to the server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process_order.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText); // You can handle the server response here
        }
    };
    xhr.send('address=' + encodeURIComponent(address) + '&payment-option=' + encodeURIComponent(paymentOption) + '&cart-data=' + encodeURIComponent(cartData));
}




</script>

</body>
</html>