USE market_db;
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(255) NOT NULL
);

CREATE TABLE sales (
    id_sale INT PRIMARY KEY,
    id_product INT,
    qtd_items INTEGER,
    created_at TIMESTAMP,
    price_product DECIMAL(10, 2),
    price_discount DECIMAL(10, 2),
    FOREIGN KEY (id_product) REFERENCES products(id)
);


INSERT INTO products (name, price, category)
VALUES
    ('Apple', 0.99, 'food'),
    ('Toothpaste', 2.49, 'cleaning'),
    ('Bread', 1.99, 'food'),
    ('Detergent', 4.99, 'cleaning'),
    ('Banana', 0.79, 'food'),
    ('Soap', 1.29, 'cleaning'),
    ('Orange', 1.29, 'food'),
    ('Shampoo', 3.99, 'cleaning'),
    ('Milk', 2.49, 'food'),
    ('Sponge', 0.99, 'cleaning'),
    ('Chicken', 7.99, 'food'),
    ('Broom', 5.49, 'cleaning'),
    ('Potato', 1.49, 'food'),
    ('Window Cleaner', 2.99, 'cleaning'),
    ('Cereal', 3.99, 'food'),
    ('Trash Bags', 4.49, 'cleaning'),
    ('Orange Juice', 2.99, 'food'),
    ('Paper Towels', 1.99, 'cleaning'),
    ('Salad', 3.49, 'food'),
    ('Dish Soap', 1.49, 'cleaning');
