USE data;

CREATE TABLE customers(
    id_customer INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    telephone VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    street VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    psc VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL
)Engine = Innodb;

CREATE TABLE orders(
    id_order INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_product INT NOT NULL,
    id_customer INT NOT NULL,
    amount INT NOT NULL,
    price FLOAT(6.2) NOT NULL,
    order_time DATETIME NOT NULL,
    FOREIGN KEY (id_product) REFERENCES products (id_product),
    FOREIGN KEY (id_customer) REFERENCES customers (id_customer)
)Engine = Innodb;