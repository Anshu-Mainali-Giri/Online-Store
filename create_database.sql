-- SQLite Database Schema for Online Shop
-- Create tables compatible with the existing PHP code

-- Brands table
CREATE TABLE IF NOT EXISTS Brands (
    BrandID INTEGER PRIMARY KEY AUTOINCREMENT,
    BrandName TEXT NOT NULL
);

-- Products table
CREATE TABLE IF NOT EXISTS Products (
    ProductID INTEGER PRIMARY KEY AUTOINCREMENT,
    Description TEXT NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    BrandID INTEGER,
    FOREIGN KEY (BrandID) REFERENCES Brands(BrandID)
);

-- Customers table
CREATE TABLE IF NOT EXISTS Customers (
    CustomerID INTEGER PRIMARY KEY AUTOINCREMENT,
    CustomerName TEXT NOT NULL,
    Username TEXT UNIQUE NOT NULL,
    Password TEXT NOT NULL,
    Email TEXT,
    Phone TEXT,
    Address TEXT,
    CreatedAt DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Orders table
CREATE TABLE IF NOT EXISTS Orders (
    OrderID INTEGER PRIMARY KEY AUTOINCREMENT,
    CustomerID INTEGER,
    OrderDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    TotalAmount DECIMAL(10,2),
    Status TEXT DEFAULT 'Pending',
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

-- OrderProducts table
CREATE TABLE IF NOT EXISTS OrderProducts (
    OrderProductID INTEGER PRIMARY KEY AUTOINCREMENT,
    OrderID INTEGER,
    ProductID INTEGER,
    Quantity INTEGER DEFAULT 1,
    Price DECIMAL(10,2),
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

-- Insert sample brands
INSERT OR IGNORE INTO Brands (BrandID, BrandName) VALUES 
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Sony'),
(4, 'Nike'),
(5, 'Adidas'),
(6, 'Guess'),
(7, 'Beats'),
(8, 'Bose');

-- Insert sample products
INSERT OR IGNORE INTO Products (ProductID, Description, Price, BrandID) VALUES 
(1, 'iPhone 15 Pro', 999.99, 1),
(2, 'Samsung Galaxy S24', 899.99, 2),
(3, 'Sony WH-1000XM5 Headphones', 399.99, 3),
(4, 'Nike Air Max 270', 150.00, 4),
(5, 'Adidas Ultraboost 22', 180.00, 5),
(6, 'Guess Classic Watch', 299.99, 6),
(7, 'Beats Studio Pro', 349.99, 7),
(8, 'Bose QuietComfort Earbuds', 279.99, 8),
(9, 'Apple MacBook Air M2', 1199.99, 1),
(10, 'Samsung 4K Smart TV', 799.99, 2);

-- Insert sample customer (password is 'password123' hashed)
INSERT OR IGNORE INTO Customers (CustomerID, CustomerName, Username, Password, Email) VALUES 
(1, 'Test User', 'testuser', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'test@example.com');