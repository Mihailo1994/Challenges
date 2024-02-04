CREATE DATABASE online_store;

CREATE TABLE buyer (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(32), 
    lastname VARCHAR(32)
);

CREATE TABLE suplier (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(32)
);

CREATE TABLE importer (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(32)
);

CREATE TABLE manufacturer (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(32)
);

CREATE TABLE product (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(32),
    date_of_manufacture DATE,
    storage_temperature INT,
    composition TEXT,
    shelf_life DATE,
    importer_id INT,
    manufacturer_id INT,
    plase_of_origin VARCHAR(32),
    CONSTRAINT FOREIGN KEY(manufacturer_id) REFERENCES manufacturer(id),
    CONSTRAINT FOREIGN KEY(imported_id) REFERENCES importer(id)
);

CREATE TABLE milk_and_diary (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    CONSTRAINT FOREIGN KEY(product_id) REFERENCES product(id)
);

CREATE TABLE cosmetic (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    CONSTRAINT FOREIGN KEY(product_id) REFERENCES product(id)
);

CREATE TABLE confectionery (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    CONSTRAINT FOREIGN KEY(product_id) REFERENCES product(id)
);

CREATE TABLE household (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    category VARCHAR(32),
    CONSTRAINT FOREIGN KEY(product_id) REFERENCES product(id)
);

CREATE TABLE food_product (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    CONSTRAINT FOREIGN KEY(product_id) REFERENCES product(id)
);

CREATE TABLE drinks (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    alcohol VARCHAR(3),
    percentage_of_alcohol DECIMAL(3,1),
    carbonated VARCHAR(3),
    CONSTRAINT FOREIGN KEY(product_id) REFERENCES product(id)
);

CREATE TABLE tobacco (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    nicotine_mg DECIMAL(3,1),
    carbon_monoxide_mg DECIMAL(3,1),
    tar_mg DECIMAL(3,1),
    cigaretes_per_piece INT,
    pieces_in_box INT,
    dry_tobacco INT,
    CONSTRAINT FOREIGN KEY(product_id) REFERENCES product(id)
);

CREATE TABLE administrator (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(32),
    lastname VARCHAR(32)
);

CREATE TABLE administrator_product (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    administrator_id INT,
    product_id INT,
    CONSTRAINT FOREIGN KEY(product_id) REFERENCES product(id),
    CONSTRAINT FOREIGN KEY(administrator_id) REFERENCES administrator(id)
);

CREATE TABLE shopping_cart (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    buyer_id INT,
    product_id INT,
    CONSTRAINT FOREIGN KEY(product_id) REFERENCES product(id),
    CONSTRAINT FOREIGN KEY(buyer_id) REFERENCES buyer(id)
);

CREATE TABLE orders (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    shopping_cart_id INT,
    administrator_id INT,
    date_of_approval DATE,
    delivery_date DATE,
    order_date DATE,
    CONSTRAINT FOREIGN KEY(shopping_cart_id) REFERENCES shopping_cart(id),
    CONSTRAINT FOREIGN KEY(administrator_id) REFERENCES administrator(id)
);

CREATE TABLE orders_buyer (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    orders_id INT,
    buyer_id INT,
    deliver_time DATETIME,
    rating INT,
    comment text,
    CONSTRAINT FOREIGN KEY(orders_id) REFERENCES orders(id),
    CONSTRAINT FOREIGN KEY(buyer_id) REFERENCES buyer(id)
);

CREATE TABLE orders_suplier (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    orders_id INT,
    suplier_id INT,
    comment text,
    delivery_status VARCHAR(16),
    deliver_time DATETIME,
    buyer_rating INT,
    CONSTRAINT FOREIGN KEY(orders_id) REFERENCES orders(id),
    CONSTRAINT FOREIGN KEY(suplier_id) REFERENCES suplier(id)
);