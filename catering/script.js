// Define a function to add selected dishes to the cart
function addToCart(dishName, customizationId) {
    const dishCustomization = document.getElementById(customizationId).value;
    
    // You can implement further logic here, such as updating a shopping cart object,
    // sending data to the server, or displaying a confirmation message to the user.
    
    // For now, we'll just show a simple alert with the selected options.
    alert(`Added ${dishName} to cart with customization: ${dishCustomization}`);
}
