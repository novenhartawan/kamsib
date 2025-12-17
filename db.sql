CREATE DATABASE kamsib;
USE kamsib;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(50),
  full_name VARCHAR(100),
  email VARCHAR(100)
);

INSERT INTO users (username, password, full_name, email) VALUES
('admin', 'admin123', 'Administrator', 'admin@mail.com'),
('budi',  'budi123',  'Budi Santoso', 'budi@mail.com'),
('siti',  'siti123',  'Siti Aminah',  'siti@mail.com');

CREATE TABLE comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  content TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
