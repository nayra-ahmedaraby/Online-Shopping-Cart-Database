<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart - Full Data View</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h1>🛒 Online Shopping Cart - All Data</h1>

    <!-- Users -->


    <h2>Users</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM Users");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['UserID'] ?></td>
                <td><?= $row['UserName'] ?></td>
                <td><?= $row['Email'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- User Phone Numbers -->
    <h2>User Phone Numbers</h2>
    <table>
        <tr><th>ID</th><th>UserID</th><th>Phone Number</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM UserPhoneNumbers");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['PhoneID'] ?></td>
                <td><?= $row['UserID'] ?></td>
                <td><?= $row['PhoneNumber'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Categories -->
    <h2>Categories</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>Description</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM Category");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['CategoryID'] ?></td>
                <td><?= $row['CategoryName'] ?></td>
                <td><?= $row['Description'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Products -->
    <h2>Products</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>Category</th><th>Price</th><th>Stock</th><th>Description</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM Product");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['ProductID'] ?></td>
                <td><?= $row['ProductName'] ?></td>
                <td><?= $row['CategoryID'] ?></td>
                <td><?= $row['Price'] ?></td>
                <td><?= $row['StockQuantity'] ?></td>
                <td><?= $row['Description'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Cart -->
    <h2>Carts</h2>
    <table>
        <tr><th>CartID</th><th>UserID</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM Cart");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['CartID'] ?></td>
                <td><?= $row['UserID'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Cart Items -->
    <h2>Cart Items</h2>
    <table>
        <tr><th>ID</th><th>CartID</th><th>ProductID</th><th>Quantity</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM CartItem");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['CartItemID'] ?></td>
                <td><?= $row['CartID'] ?></td>
                <td><?= $row['ProductID'] ?></td>
                <td><?= $row['Quantity'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Orders -->
    <h2>Orders</h2>
    <table>
        <tr><th>ID</th><th>UserID</th><th>ShippingAddressID</th><th>Date</th><th>Status</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM Orders");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['OrderID'] ?></td>
                <td><?= $row['UserID'] ?></td>
                <td><?= $row['ShippingAddressID'] ?></td>
                <td><?= $row['OrderDate'] ?></td>
                <td><?= $row['OrderStatus'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Order Items -->
    <h2>Order Items</h2>
    <table>
        <tr><th>ID</th><th>OrderID</th><th>ProductID</th><th>Quantity</th><th>Price</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM OrderItem");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['OrderItemID'] ?></td>
                <td><?= $row['OrderID'] ?></td>
                <td><?= $row['ProductID'] ?></td>
                <td><?= $row['Quantity'] ?></td>
                <td><?= $row['Price'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Shipping Addresses -->
    <h2>Shipping Addresses</h2>
    <table>
        <tr><th>ID</th><th>Address</th><th>City</th><th>PostalCode</th><th>Country</th><th>Tracking</th><th>Date</th><th>Status</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM ShippingAddress");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['ShippingAddressID'] ?></td>
                <td><?= $row['Address'] ?></td>
                <td><?= $row['City'] ?></td>
                <td><?= $row['PostalCode'] ?></td>
                <td><?= $row['Country'] ?></td>
                <td><?= $row['TrackingNumber'] ?></td>
                <td><?= $row['ShippingDate'] ?></td>
                <td><?= $row['ShippingStatus'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Payments -->
    <h2>Payments</h2>
    <table>
        <tr><th>ID</th><th>OrderID</th><th>Date</th><th>Amount</th><th>Method</th><th>Status</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM Payment");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['PaymentID'] ?></td>
                <td><?= $row['OrderID'] ?></td>
                <td><?= $row['PaymentDate'] ?></td>
                <td><?= $row['PaymentAmount'] ?></td>
                <td><?= $row['PaymentMethod'] ?></td>
                <td><?= $row['PaymentStatus'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

        <!-- Cart Totals: Total Items Per Cart -->
    <h2>🧮 Cart - Total Items Per Cart</h2>
    <table>
        <tr><th>CartID</th><th>Total Items</th></tr>
        <?php
        $result = $conn->query("SELECT CartID, SUM(Quantity) AS total_items FROM CartItem GROUP BY CartID");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['CartID'] ?></td>
                <td><?= $row['total_items'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Cart Subtotal Per Cart -->
    <h2>💰 Cart - Subtotal Price Per Cart</h2>
    <table>
        <tr><th>CartID</th><th>Subtotal (EGP)</th></tr>
        <?php
        $result = $conn->query("SELECT CartItem.CartID, SUM(CartItem.Quantity * Product.Price) AS SubTotal 
                                FROM CartItem 
                                JOIN Product ON CartItem.ProductID = Product.ProductID 
                                GROUP BY CartItem.CartID");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['CartID'] ?></td>
                <td><?= number_format($row['SubTotal'], 2) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Total Order Amount Per Order -->
    <h2>📦 Orders - Total Amount Per Order</h2>
    <table>
        <tr><th>OrderID</th><th>Total Amount (EGP)</th></tr>
        <?php
        $result = $conn->query("SELECT OrderItem.OrderID, SUM(OrderItem.Quantity * Product.Price) AS total_amount
                                FROM OrderItem
                                JOIN Product ON OrderItem.ProductID = Product.ProductID
                                GROUP BY OrderItem.OrderID");
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['OrderID'] ?></td>
                <td><?= number_format($row['total_amount'], 2) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Products In Stock -->
<h2>📦 Products In Stock</h2>
<table>
    <tr><th>Product Name</th><th>Price</th><th>Stock Quantity</th></tr>
    <?php
    $result = $conn->query("SELECT ProductName, Price, StockQuantity FROM Product WHERE StockQuantity > 0");
    while($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><?= $row['ProductName'] ?></td>
            <td><?= $row['Price'] ?></td>
            <td><?= $row['StockQuantity'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>


<!-- Most Expensive Product -->
<h2>💎 Most Expensive Product</h2>
<table>
    <tr><th>ID</th><th>Name</th><th>Price</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM Product WHERE Price = (SELECT MAX(Price) FROM Product)");
    while($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><?= $row['ProductID'] ?></td>
            <td><?= $row['ProductName'] ?></td>
            <td><?= $row['Price'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>


</body>
</html>
