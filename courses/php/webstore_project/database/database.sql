CREATE DATABASE webstore_db;
USE webstore_db;


CREATE TABLE users (
    id          INT(11) AUTO_INCREMENT NOT NULL,
    name        VARCHAR(60) NOT NULL,
    email       VARCHAR(40) NOT NULL,
    password    VARCHAR(255) NOT NULL,
    role        VARCHAR(15) NOT NULL,
    image       VARCHAR(30),
    CONSTRAINT pk_users PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES (null, 'Admin', 'admin@admin.com', 'secret', 'admin', null); 

CREATE TABLE categories (
    id          INT(11) AUTO_INCREMENT NOT NULL,
    name        VARCHAR(60) NOT NULL,
    CONSTRAINT pk_categories PRIMARY KEY(id),
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products (
    id          INT(11) AUTO_INCREMENT NOT NULL,
    name        VARCHAR(60) NOT NULL,
    description TEXT NOT NULL,
    price       FLOAT(10,2) NOT NULL,
    stock       INT(11) NOT NULL,
    category_id INT(11) NOT NULL,
    offer       INT(11) NOT NULL,
    date        DATETIME NOT NULL,
    image       VARCHAR(30),
    CONSTRAINT pk_products PRIMARY KEY(id),
    CONSTRAINT fk_product_category FOREIGN KEY(category_id) REFERENCES categories(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE orders (
    id              INT(11) AUTO_INCREMENT NOT NULL,
    user_id         INT(11) NOT NULL,
    country         VARCHAR(50) NOT NULL,
    state           VARCHAR(30) NOT NULL,
    address         VARCHAR(255) NOT NULL,
    date            DATETIME NOT NULL,
    amount          FLOAT(8,2) NOT NULL,
    total           FLOAT(8,2) NOT NULL,
    CONSTRAINT pk_orders PRIMARY KEY(id),
    CONSTRAINT fk_order_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE items (
    id              INT(11) AUTO_INCREMENT NOT NULL,
    order_id        INT(11) NOT NULL,
    product_id      INT(11) NOT NULL,
    units           INT(11) NOT NULL,
    CONSTRAINT pk_item PRIMARY KEY(id),
    CONSTRAINT fk_item_order FOREIGN KEY(order_id) REFERENCES orders(id),
    CONSTRAINT fk_product_item FOREIGN KEY(product_id) REFERENCES products(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

