CREATE TABLE products (
    id int(11) NOT NULL AUTO_INCREMENT,
    sku varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    price decimal(10, 2) NOT NULL,
    attribute_name varchar(255) NOT NULL,
    attribute_value varchar(255) NOT NULL,
    deleted tinyint(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);


INSERT INTO products (sku, name, price, attribute_name, attribute_value) 
VALUES 
    ('JVC200123', 'Acme DISC', 1.00, 'Size', '700 MB'),
    ('GGWP0007', 'War and Peace', 20.00, 'Weight', '2 Kg'),
    ('TR120555', 'Chair', 40.00, 'Dimensions', '15x24x45');