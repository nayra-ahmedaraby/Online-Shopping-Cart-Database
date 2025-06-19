CREATE DATABASE Online_Shopping_Cart_DB;

USE Online_Shopping_Cart_DB;

CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    UserName VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL
);

CREATE TABLE UserPhoneNumbers (
    PhoneID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    PhoneNumber VARCHAR(20) NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE
);



CREATE TABLE Product (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(100) NOT NULL,
    CategoryID INT,        
    Price DECIMAL(10, 2) NOT NULL, 
    StockQuantity INT NOT NULL,     
    Description TEXT,               
    FOREIGN KEY (CategoryID) REFERENCES Category(CategoryID)
);


CREATE TABLE Category (
    CategoryID INT AUTO_INCREMENT PRIMARY KEY,
    CategoryName VARCHAR(50) NOT NULL,
    Description TEXT 
);



CREATE TABLE Cart (
    CartID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);
SELECT CartID, SUM(Quantity) AS total_items FROM CartItem GROUP BY CartID;


CREATE TABLE CartItem (
    CartItemID INT PRIMARY KEY AUTO_INCREMENT,
    CartID INT,
    ProductID INT,
    Quantity INT NOT NULL,
    FOREIGN KEY (CartID) REFERENCES Cart(CartID),
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
);

SELECT CartItem.CartID,SUM(CartItem.Quantity * Product.Price) AS SubTotal 
FROM CartItem 
JOIN Product ON CartItem.ProductID = Product.ProductID 
GROUP BY CartItem.CartID;




CREATE TABLE Orders (
    OrderID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    ShippingAddressID INT,
    OrderDate DATETIME DEFAULT CURRENT_TIMESTAMP,
	OrderStatus VARCHAR(50),
    FOREIGN KEY (ShippingAddressID) REFERENCES ShippingAddress(ShippingAddressID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

SELECT OrderItem.OrderID, SUM(OrderItem.Quantity * Product.Price) AS total_amount
FROM OrderItem
JOIN Product ON OrderItem.ProductID = Product.ProductID
GROUP BY OrderItem.OrderID;


CREATE TABLE ShippingAddress (
    ShippingAddressID INT PRIMARY KEY AUTO_INCREMENT,
    Address VARCHAR(255) NOT NULL,
    City VARCHAR(100),
    PostalCode VARCHAR(20),
    Country VARCHAR(100),
    TrackingNumber VARCHAR(50),
    ShippingDate DATETIME,
    ShippingStatus VARCHAR(100)
);

CREATE TABLE Payment (
    PaymentID INT PRIMARY KEY AUTO_INCREMENT,
    OrderID INT,
    PaymentDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    PaymentAmount DECIMAL(10, 2),
    PaymentMethod VARCHAR(50),
    PaymentStatus VARCHAR(50),
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID)
);

CREATE TABLE OrderItem (
    OrderItemID INT PRIMARY KEY AUTO_INCREMENT,
    OrderID INT,
    ProductID INT,
    Quantity INT NOT NULL,
    Price DECIMAL(10, 2),
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
);


INSERT INTO Users (UserName, Email, Password) VALUES 
('Ahmed Ali', 'ahmed@example.com', 'pass123'),
('Sara Youssef', 'sara@example.com', 'pass456');


INSERT INTO UserPhoneNumbers (UserID, PhoneNumber) VALUES 
(1, '01012345678'),
(1, '01123456789'),
(2, '01234567890');

INSERT INTO Category (CategoryName, Description) VALUES 
('Electronics', 'Devices and gadgets'),
('Books', 'Various types of books');

INSERT INTO Product (ProductName, CategoryID, Price, StockQuantity, Description) VALUES 
('Laptop', 1, 15000.00, 10, 'Gaming laptop'),
('Headphones', 1, 800.00, 30, 'Wireless headphones'),
('Novel', 2, 120.00, 50, 'Arabic fiction novel');

INSERT INTO Cart (UserID) VALUES 
(1),
(2);

INSERT INTO CartItem (CartID, ProductID, Quantity) VALUES 
(1, 1, 1),   
(1, 2, 2),  
(2, 3, 3);  




INSERT INTO ShippingAddress (Address, City, PostalCode, Country, TrackingNumber, ShippingDate, ShippingStatus) VALUES 
('123 Main St', 'Cairo', '12345', 'Egypt', 'TRK001', NOW(), 'Shipped'),
('456 Nile St', 'Alexandria', '67890', 'Egypt', 'TRK002', NOW(), 'Processing');

INSERT INTO Orders (UserID, ShippingAddressID, OrderStatus) VALUES 
(1, 1, 'Shipped'),
(2, 2, 'Pending');

INSERT INTO OrderItem (OrderID, ProductID, Quantity, Price) VALUES 
(1, 1, 1, 15000.00),  
(1, 2, 1, 800.00),    
(2, 3, 2, 120.00);   

INSERT INTO Payment (OrderID, PaymentAmount, PaymentMethod, PaymentStatus) VALUES 
(1, 15800.00, 'Credit Card', 'Paid'),
(2, 240.00, 'Cash on Delivery', 'Pending');


