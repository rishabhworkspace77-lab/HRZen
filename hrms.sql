CREATE DATABASE IF NOT EXISTS yuan_hrms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE yuan_hrms;

-- Employee table
CREATE TABLE employees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  father_name VARCHAR(255) NOT NULL,
  address TEXT NOT NULL,
  email VARCHAR(255),
  phone VARCHAR(50) NOT NULL,
  relative_reference VARCHAR(100),
  job_role VARCHAR(255) NOT NULL,
  location VARCHAR(100) NOT NULL,
  photo_path VARCHAR(511) NOT NULL,
  aadhar_path VARCHAR(511) NOT NULL,
  pan_path VARCHAR(511) NOT NULL,
  status ENUM('Active','Inactive') DEFAULT 'Active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admins table
CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  full_name VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default admin login
-- Username: admin
-- Password: admin123 (bcrypt hash below)
INSERT INTO admins (username, password_hash, full_name) VALUES (
  'admin',
  '$2y$10$u1h8b3gq2Nq9FJ7mUqB0iOcW0Zf2c4kz9aY3Qe6r8Q5vwB2yK6Xw6',
  'System Administrator'
);
