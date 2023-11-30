<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Add Menu Item</h1>
    <form action="../menu2/add_item.php" method="POST" enctype="multipart/form-data">
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" required><br><br>

        <label for="item_price">Item Price (₹):</label>
        <input type="number" name="item_price" required><br><br>

        <label for="item_photo">Item Photo:</label>
        <input type="file" name="item_photo" accept="image/*" required><br><br>

        <label for="item_details">Item Details:</label>
        <textarea name="item_details" required></textarea><br><br>

        <label for="item_category">Item Category:</label>
        <select name="item_category" required>
            <option value="Starters">Starters</option>
            <option value="Salads">Salads</option>
            <option value="Specialty">Specialty</option>
        </select><br><br>

        <input type="submit" value="Add Item">
    </form>
</body>
</html>
