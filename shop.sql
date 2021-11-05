CREATE DATABASE `shop-online`;
USE `shop-online`;

CREATE TABLE `categories`(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
)

CREATE TABLE `products`(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    price VARCHAR(50),
    description text
)

CREATE TABLE `category_product`(
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT,
    product_id INT,
    FOREIGN KEY(category_id) REFERENCES categories(id),
    FOREIGN KEY(product_id) REFERENCES products(id)
)

CREATE TABLE `users`(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR (255)
)
INSERT INTO `products`(`name`,`price`, `description`) VALUES
('AIR FORCE','3000','Supreme x Nike Air Force 1 Low White'),
('AIR MAX 1','4000','Patta x Nike Air Max 1 Monarch'),
('Nike Dunk','7000','Nike SB Dunk Low Mummy'),
('AIR JORDAN 1','5000','Nike air Jordan 1 High OG Pollen'),
('AIR Jordan 3','8000','Fragment x Nike Air Jordan 3 White/Black'),
('Yeezy Boost','5000','Adidas Yeezy Boost 350 V2 MXOAT'),
('Vans old skool','1500','Vans old skool Black')

INSERT INTO `categories`(`name`) VALUES
('NIKE'), ('JORDAN'), ('ADIDAS'), ('VANS')

INSERT INTO `category_product`(`category_id`, `product_id`) VALUES
(1,1), (1,2), (1,3), (2,4), (2,5), (3,6), (4,7);

SELECT categories.name, category_product.product_id FROM `categories`
INNER JOIN `category_product` ON categories.id = category_product.category_id


SELECT categories.name, category_product.product_id, products.* FROM `categories`
INNER JOIN `category_product` ON categories.id = category_product.category_id
INNER JOIN `products` ON category_product.product_id = products.id

SELECT categories.name, products.* FROM `categories`
INNER JOIN `category_product` ON categories.id = category_product.category_id
INNER JOIN `products` ON category_product.product_id = products.id;

SELECT categories.name, products.* FROM `categories`
INNER JOIN `category_product` ON categories.id = category_product.category_id
INNER JOIN `products` ON category_product.product_id = products.id
WHERE categories.id=1;

INSERT INTO `shop-online`.users (id, name, email, password)
VALUES (1, 'Xuan Anh', 'xuananh@gmail.com', '123456'),
       (2, 'Wang Yibo', 'yibo@gmail.com', '654321')


