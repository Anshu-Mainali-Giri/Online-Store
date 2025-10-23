ALTER TABLE products ADD COLUMN image VARCHAR(255) DEFAULT NULL;

UPDATE products SET image = 'images/watch1.jpg' WHERE id = 1;
UPDATE products SET image = 'images/watch2.jpg' WHERE id = 2;
UPDATE products SET image = 'images/watch3.jpg' WHERE id = 3;
UPDATE products SET image = 'images/watch4.jpg' WHERE id = 4;
UPDATE products SET image = 'images/shirt1.jpg' WHERE id = 5;
UPDATE products SET image = 'images/shirt2.jpg' WHERE id = 6;
UPDATE products SET image = 'images/shirt3.jpg' WHERE id = 7;
UPDATE products SET image = 'images/shirt4.jpg' WHERE id = 8;
UPDATE products SET image = 'images/shoe1.jpg' WHERE id = 9;
UPDATE products SET image = 'images/shoe2.jpg' WHERE id = 10;
UPDATE products SET image = 'images/shoe3.jpg' WHERE id = 11;
UPDATE products SET image = 'images/shoe4.jpg' WHERE id = 12;
UPDATE products SET image = 'images/sp1.jpg' WHERE id = 13;
UPDATE products SET image = 'images/sp2.jpg' WHERE id = 14;
UPDATE products SET image = 'images/sp3.jpg' WHERE id = 15;
UPDATE products SET image = 'images/sp4.jpg' WHERE id = 16;
