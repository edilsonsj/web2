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