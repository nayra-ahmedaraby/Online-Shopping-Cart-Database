# 🛒 Online Shopping Cart System  
### University Database Project using MySQL & PHP

---

## 📌 Project Overview

This is a complete university-level database project simulating an **online shopping cart system**. It includes:
- A fully normalized relational database (3NF)
- Sample data using `phase_2.sql`
- A PHP web interface that displays all data and analytics from the database

The system allows users to:
- View products by category
- Add items to a cart
- Place orders and track shipping
- Make and view payments

This project demonstrates essential database concepts: **Entity-Relationship Diagram (ERD)**, **Normalization**, **SQL Queries**, and **Foreign Keys** — all integrated into a functional mini e-commerce system.

---

## 📄 SQL Files Included

- `phase_1.sql`: Initial unnormalized database schema  
   Contains a basic and non-normalized version of the database structure.  
   📌 Example: A single `Users` table may store multiple phone numbers in one column, and product categories may be written as plain text without a reference table.

- `phase_2.sql`: Final normalized database schema (3NF)  
   Includes fully normalized tables with proper relationships and foreign keys.  
   🎯 Example: Phone numbers are moved to a separate `UserPhoneNumbers` table, and product categories are stored in a dedicated `Category` table.
---

## 🧱 Database Schema

The schema includes the following normalized tables:

| Table               | Description                                |
|--------------------|--------------------------------------------|
| `Users`            | Stores user information                    |
| `UserPhoneNumbers` | Supports multiple phone numbers per user   |
| `Category`         | Lists product categories                   |
| `Product`          | Contains product details                   |
| `Cart`             | Shopping cart for each user                |
| `CartItem`         | Items added to a user's cart               |
| `ShippingAddress`  | Shipping info for orders                   |
| `Orders`           | Placed orders                              |
| `OrderItem`        | Items in each order                        |
| `Payment`          | Payment info related to orders             |

📄 SQL file: `phase_2.sql` – contains both schema creation and sample data.

---

## 🔄 Normalization

The database design follows **Third Normal Form (3NF)**:

| Normal Form | Description                                                                 |
|-------------|-----------------------------------------------------------------------------|
| **1NF**     | Atomic columns (e.g., phone numbers stored in separate rows)               |
| **2NF**     | Removed partial dependencies via separate tables (e.g., OrderItem)         |
| **3NF**     | Removed transitive dependencies (e.g., shipping data stored separately)    |

---

## 🖥️ Web Interface (PHP + MySQL)

📁 Main files:
- `index.php`: connects to the database and displays data
- `conn.php`: holds database connection settings
- `style.css`: optional styling file

### What’s Displayed:
- ✅ All users and phone numbers
- 📦 Product listings with price and stock
- 🛒 Carts and their contents
- 📤 Orders and shipping details
- 💳 Payments and statuses
- 📊 Cart and Order totals
- 💎 Most expensive product
- ✅ Products currently in stock

Everything is rendered dynamically using `mysqli` queries and printed as HTML tables.

---

## 🧠 Challenges & Lessons Learned

### 🔧 Challenges:
- Designing a real-world normalized schema
- Maintaining referential integrity across all relations
- Creating SQL queries to calculate totals and join data across multiple tables
- Building a PHP page that loops through queries and renders HTML

### 💡 Lessons:
- **Normalization is powerful** for reducing data redundancy and errors
- **JOINs** are critical for combining data across related tables
- **PHP + MySQL** can simulate real e-commerce platforms with basic effort
- Understanding how back-end databases power user-facing apps

---

## 🚀 How to Run Locally

1. Install **XAMPP**, **WAMP**, or any local PHP + MySQL server
2. Import `phase_2.sql` using phpMyAdmin or MySQL CLI
3. Place the project files (`index.php`, `conn.php`, `style.css`) in your `htdocs/` folder
4. Open browser and go to:  
   👉 `http://localhost/index.php`

---

## 🧾 Example Data Used

- 2 Users with multiple phone numbers
- Products: Laptop, Headphones, Novel
- Categories: Electronics, Books
- Orders with associated items, shipping addresses, and payments

The database includes real relational behavior, such as:
- Cascade delete between users and phones
- Links between products and carts/orders
- Payment status tracking

---

## 📅 Project Info

- 👩‍💻 **Developed by**: Nayra Ahmed, Habiba Karam  
- 🏛️ **University**: El Sewedy University of technology 
- 📘 **Course**: CET141 _	Database Management Systems 
- 📆 **Date**: 10 May 2025

---

🎓 *This project was created as a final submission for the Database course, applying theory to a real-world scenario through MySQL and PHP.*



