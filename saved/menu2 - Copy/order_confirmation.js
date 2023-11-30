// order_confirmation.js

// Function to display the confirmation message and redirect
function displayConfirmation(orderId) {
    alert("Order placed successfully. Your order ID is: " + orderId);
    setTimeout(function () {
        window.location.href = "cart.html";
        localStorage.removeItem("cart");
    }, 100); // Delay the redirection for 100 milliseconds
}
