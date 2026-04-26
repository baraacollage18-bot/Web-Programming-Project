/* Database creation */
    CREATE DATABASE watchshop;

    USE watchshop;

/*  */

/* Brands Table */
    CREATE TABLE brands (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL
    );
/*  */

/* Watchs Table */
    CREATE TABLE watches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand_id INT NOT NULL,
    name VARCHAR(150) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    description TEXT,
    stock INT DEFAULT 0,
    FOREIGN KEY (brand_id) REFERENCES brands(id)
);
/*  */

/* Data Insertion */
    /* Brands */
    INSERT INTO brands (name) VALUES
    ('Rolex'),
    ('Omega'),
    ('Casio'),
    ('Petek-philippe'),
    ('Seiko'),
    ('Tag-Heuer'),
    ('Tissot'),
    ('Citizen');
    /*  */

    /* Watches */
    INSERT INTO watches (brand_id, name, price, image, description, stock) VALUES
/* (1,'Cosmograph Daytona',921957.51,'watches-img/Rolex-Cosmograph-Daytona.jpg','Luxury high-performance chronograph',3), */
(2,'Seamaster Aqua Terra 150M',387331.26,'watches-img/Omega-Seamaster-Aqua-Terra.jpg','Elegant everyday luxury watch',6),
(3,'G-SHOCK GST-B100D-1A',21003.17,'watches-img/Casio-G-SHOCK-GST-B100D-1A.jpg','Tough hybrid sport watch',12),
(4,'6159G-001',8728591.84,'watches-img/Petek-philippe-6159G-001','Refined high-end dress watch',0),
(5,'SRPK71',20457.64,'watches-img/Seiko-SRPK71.jpg','Sporty everyday automatic watch',15),
(6,'Connected Calibre E5',139111.93,'watches-img/TAG-Heuer-Connected-Calibre-E5.jpg','Luxury performance smartwatch',2),
(7,'Supersport Chrono',28095.15,'watches-img/Tissot-Supersport-Chrono.jpg','Bold sporty chronograph',7),
(8,'Eco-Drive Radio-Controlled',38187.59,'watches-img/Citizen-Eco-Drive-Radio-Controlled.jpg','Solar-powered precision watch',1);
    /*  */

    /* Changes */
    ALTER TABLE brands ADD image VARCHAR(255);

    UPDATE brands SET image = 'brands_img/Rolex.jpg' WHERE name = 'Rolex';
    UPDATE brands SET image = 'brands_img/Omega.jpg' WHERE name = 'Omega';
    UPDATE brands SET image = 'brands_img/Casio.jpg' WHERE name = 'Casio';
    UPDATE brands SET image = 'brands_img/Seiko.jpg' WHERE name = 'Seiko';
    UPDATE brands SET image = 'brands_img/Petek-Philippe.jpg' WHERE name = 'Petek-philippe';
    UPDATE brands SET image = 'brands_img/Tag-Heuer.jpg' WHERE name = 'Tag-Heuer';
    UPDATE brands SET image = 'brands_img/Tissot.jpg' WHERE name = 'Tissot';
    UPDATE brands SET image = 'brands_img/Citizen.jpg' WHERE name = 'Citizen';
    /*  */
/*  */

INSERT INTO watches (brand_id, name, price, image, description, stock) VALUES
(1,'Cosmograph Daytona',921957.51,'watches-img/Rolex-Cosmograph-Daytona.jpg','Luxury high-performance chronograph',3);

DELETE FROM watches WHERE id=2;

UPDATE watches 
SET image = 'watches-img/GST-B100D-1A.jpg'
WHERE id = 20

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    role VARCHAR(20) DEFAULT 'Customer'
);

CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_cart_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE
);

CREATE TABLE cart_item (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT NOT NULL,
    watch_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    CONSTRAINT fk_cartitem_cart
        FOREIGN KEY (cart_id)
        REFERENCES cart(id)
        ON DELETE CASCADE,
    CONSTRAINT fk_cartitem_watch
        FOREIGN KEY (watch_id)
        REFERENCES watches(id)
        ON DELETE CASCADE
);

ALTER TABLE users
ADD gender VARCHAR(10),
ADD country VARCHAR(50);