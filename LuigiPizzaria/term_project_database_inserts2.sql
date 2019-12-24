CREATE DATABASE TermProject;


CREATE TABLE users
(id INT(6) NOT NULL AUTO_INCREMENT,
title VARCHAR(20),
name VARCHAR(20),
email VARCHAR(30),
c_phone VARCHAR(100),
address VARCHAR(30),
city VARCHAR(20),
state VARCHAR(20),
zip_code INT(5),
password VARCHAR(512),
primary key (id));


CREATE TABLE payment
(payment_id INT(6) NOT NULL AUTO_INCREMENT,
id INT(6),
payment_date DATE,
payment_method VARCHAR(20),
credit_card_info VARCHAR(16),
primary key (payment_id),
foreign key (id)
references users(id) on delete set null);


CREATE TABLE orders
(order_id INT(6) NOT NULL AUTO_INCREMENT,
payment_id INT(6),
id INT(6),
amount INT(4),
comment VARCHAR(1000),
status VARCHAR(20),
primary key (order_id),
foreign key (payment_id)
references payment(payment_id) on delete set null,
foreign key (id)
references users(id) on delete set null);


create table pizza_type
(crust_type VARCHAR(15),
ty_price INT(2),
primary key (crust_type));


create table pizza_size
(p_size VARCHAR(15),
s_price INT(2),
primary key (p_size));

create table topping
(name VARCHAR(20), 
description VARCHAR(20),
to_price INT(2),
quantity INT(4),
primary key (name));

create table topping_items
(pizza_id INT(6),
name VARCHAR(20),
primary key (pizza_id,name),
foreign key (name)
references topping(name));

create table pizza
(pizza_id INT(6) NOT NULL AUTO_INCREMENT,
p_size VARCHAR(15),
crust_type VARCHAR(15),
primary key (pizza_id),
foreign key (p_size)
references pizza_size(p_size) on delete set null,
foreign key (crust_type)
references pizza_type(crust_type) on delete set null);

create table order_items
(order_id INT(6),
pizza_id INT(6),
primary key (order_id,pizza_id),
foreign key (order_id)
references orders(order_id),
foreign key (pizza_id)
references pizza(pizza_id));



 

INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Customer','Chase Anzelc','moon@abc.com','816-555-5555','1234 Speck Rd','Kansas City','MO',64035,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Customer','Bob Won','Won@frog.com','765-224-3212','231 Frog Ln','Kansas City','MO',64033,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Customer','Tom Tanner','Tanner@mouse.com','234-123-4123','244 Mouse ln','Independence','MO',64023,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Employee','Violet Fan','Fan@toddyer.com','211-123-4334','556 Fan rd','Portland','OR',97035,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Employee','Popeye Sailer','Sailer@popeye.com','234-987-6464','876 Popeye dr','Dayton','OH',45377,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Customer','Todd Alligator','Alligator@todd.com','345-987-5234','987 Alligator ln','Kansas City','KS',66012,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Customer','Tyler Alc','good@abc.com','913-555-5555','12 Spook Ln','Leawood','KS',61035,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Customer','Frank Lin','Frank@Lin.com','435-124-7212','62 Lin Ave','Brooklyn','NY',12033,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Customer','Pete Tee','Pete@Tee.com','284-377-4123','23 Goodwin ln','Hot Springs','Arkansas',32023,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Employee','John Smith','John@Smith.com','134-993-9334','55 Yorkshire rd','Portland','OR',97035,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Employee','Run DMC','Run@DMC.com','234-998-4364','76 Franklin dr','Dayton','OH',45377,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Customer','Kristen Smith','Kirsten@Smith.com','335-187-5234','7 Petry ln','Kansas City','KS',66032,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Customer','John Appleseed','John@Appleseed.com','913-235-1555','2002 Grouper Ln','Leawood','KS',61023,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Customer','Polly Pocket','Polly@Pocket.com','334-774-7912','211 Landon Ave','Brooklyn','NY',12035,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Customer','Igor Moofas','Igor@Moofas.com','244-907-0193','99 String ln','Hot Springs','Arkansas',32023,SHA2('password',512));
INSERT INTO users(title,name,email,c_phone,address,city,state,zip_code,password) VALUES ('Employee','Howard Wallowitz','Howard@Wallowitz.com','139-999-2234','5 Fountain rd','Portland','OR',97035,SHA2('password',512));


INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (1,'2018-7-24','Credit', 1234567891234567);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (2,'2018-3-21','Credit', 1234444591234587);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (3,'2018-7-14','Debit',  2234567891234907);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (3,'2017-12-24','Credit',1234562344560087);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (6,'2018-9-21','Cash',null);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (7,'2018-11-06','Debit', 4562245551237267);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (7,'2018-8-23','Credit',  1564478991235557);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (8,'2018-9-05','Credit', 3331456783233569);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (8,'2018-10-14','Cash',null);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (9,'2018-9-21','Cash',null);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (9,'2018-7-24','Credit',  9724567876334986);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (12,'2018-9-21','Cash',null);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (13,'2018-3-21','Credit', 1434449591297733);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (13,'2018-7-14','Debit',  2234567891239067);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (14,'2018-10-24','Credit',1234562344560527);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (15,'2018-11-06','Debit', 4562245551231207);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (15,'2018-11-13','Credit',  1564478991238837);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (15,'2018-11-14','Cash',null);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (3,'2018-11-21','Cash',null);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (1,'2018-11-22','Debit',   3444567891238817);
INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (14,'2017-12-24','Debit', 8834562344567327);




INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (1,1,13,'Ring doorbell', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (2,2,15,'Ring doorbell', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (3,3,9,'Ring doorbell', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (4,3,9,'Ring doorbell','Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (5,6,26,'Ring doorbell','Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (6,7,11,'No sauce on pinapple pizza', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (7,7,21,'No sauce on pizza', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (8,8,13,'Delay delivery 1 hour', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (10,9,21,'Delay delivery 30 minutes', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (12,12,7,'Ring doorbell', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (13,13,31,'Ring doorbell', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (14,13,9,'Delay delivery 1 hour', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (15,14,9,'Delay delivery 1 hour', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (20,1,26,'Ring doorbell', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (16,15,11,'No sauce on pizza', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (21,14,12,'Light cheese on pizza', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (6,7,28,'Ring doorbell', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (1,1,19,'Half of pizza with onions only', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (9,8,6,'Delay delivery 1 hour', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (11,9,16,'Ring doorbell', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (16,15,8,'Half of pizza with only pinapple', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (17,15,18,'Ring doorbell', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (18,15,9,'Ring doorbell', 'Delivered');
INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (9,8,10,'Ring doorbell', 'Delivered');





INSERT INTO pizza_type(crust_type,ty_price) VALUES ('Thin',0);
INSERT INTO pizza_type(crust_type,ty_price) VALUES ('Original',1);
INSERT INTO pizza_type(crust_type,ty_price) VALUES ('Deep Dish',2);


INSERT INTO pizza_size(p_size,s_price) VALUES ('Small',5);
INSERT INTO pizza_size(p_size,s_price) VALUES ('Medium',7);
INSERT INTO pizza_size(p_size,s_price) VALUES ('Large',9);


INSERT INTO topping(name,description,to_price,quantity) VALUES ('Pepperoni','Fresh Pepperoni',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Mushrooms','Fresh Mushrooms',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Sausage','Fresh Sausage',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Onions','Fresh Onions',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Bacon','Fresh Bacon',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Peppers','Fresh Peppers',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Black Olives','Fresh Black Olives',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Chicken','Fresh Chicken',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Pineapple','Fresh Pineapple',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Spinach','Fresh Spinach',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Basil','Fresh Basil',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Ham','Fresh Ham',1,100);
INSERT INTO topping(name,description,to_price,quantity) VALUES ('Beef','Fresh Beef',1,100);


INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Large','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Large','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Large','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Large','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Large','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Large','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Large','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Large','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Large','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Small','Deep Dish');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Thin');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Original');
INSERT INTO pizza(p_size,crust_type) VALUES ('Medium','Deep Dish');



INSERT INTO topping_items(pizza_id,name) VALUES (1,'Sausage');
INSERT INTO topping_items(pizza_id,name) VALUES (2,'Peppers');
INSERT INTO topping_items(pizza_id,name) VALUES (3,'Ham');
INSERT INTO topping_items(pizza_id,name) VALUES (4,'Bacon');
INSERT INTO topping_items(pizza_id,name) VALUES (5,'Sausage');
INSERT INTO topping_items(pizza_id,name) VALUES (6,'Black Olives');
INSERT INTO topping_items(pizza_id,name) VALUES (7,'Chicken');
INSERT INTO topping_items(pizza_id,name) VALUES (8,'Peppers');
INSERT INTO topping_items(pizza_id,name) VALUES (9,'Mushrooms');
INSERT INTO topping_items(pizza_id,name) VALUES (10,'Basil');
INSERT INTO topping_items(pizza_id,name) VALUES (11,'Spinach');
INSERT INTO topping_items(pizza_id,name) VALUES (12,'Pineapple');
INSERT INTO topping_items(pizza_id,name) VALUES (13,'Onions');
INSERT INTO topping_items(pizza_id,name) VALUES (14,'Sausage');
INSERT INTO topping_items(pizza_id,name) VALUES (15,'Peppers');
INSERT INTO topping_items(pizza_id,name) VALUES (16,'Ham');
INSERT INTO topping_items(pizza_id,name) VALUES (17,'Bacon');
INSERT INTO topping_items(pizza_id,name) VALUES (18,'Sausage');
INSERT INTO topping_items(pizza_id,name) VALUES (19,'Black Olives');
INSERT INTO topping_items(pizza_id,name) VALUES (20,'Chicken');
INSERT INTO topping_items(pizza_id,name) VALUES (21,'Peppers');
INSERT INTO topping_items(pizza_id,name) VALUES (22,'Mushrooms');
INSERT INTO topping_items(pizza_id,name) VALUES (23,'Basil');
INSERT INTO topping_items(pizza_id,name) VALUES (24,'Spinach');
INSERT INTO topping_items(pizza_id,name) VALUES (25,'Sausage');
INSERT INTO topping_items(pizza_id,name) VALUES (26,'Peppers');
INSERT INTO topping_items(pizza_id,name) VALUES (27,'Ham');
INSERT INTO topping_items(pizza_id,name) VALUES (28,'Bacon');
INSERT INTO topping_items(pizza_id,name) VALUES (29,'Sausage');
INSERT INTO topping_items(pizza_id,name) VALUES (30,'Black Olives');
INSERT INTO topping_items(pizza_id,name) VALUES (31,'Chicken');
INSERT INTO topping_items(pizza_id,name) VALUES (32,'Peppers');
INSERT INTO topping_items(pizza_id,name) VALUES (33,'Mushrooms');
INSERT INTO topping_items(pizza_id,name) VALUES (34,'Basil');
INSERT INTO topping_items(pizza_id,name) VALUES (35,'Spinach');
INSERT INTO topping_items(pizza_id,name) VALUES (36,'Pineapple');
INSERT INTO topping_items(pizza_id,name) VALUES (37,'Onions');
INSERT INTO topping_items(pizza_id,name) VALUES (38,'Sausage');
INSERT INTO topping_items(pizza_id,name) VALUES (39,'Peppers');
INSERT INTO topping_items(pizza_id,name) VALUES (1,'Mushrooms');
INSERT INTO topping_items(pizza_id,name) VALUES (2,'Basil');
INSERT INTO topping_items(pizza_id,name) VALUES (3,'Spinach');
INSERT INTO topping_items(pizza_id,name) VALUES (4,'Sausage');
INSERT INTO topping_items(pizza_id,name) VALUES (5,'Peppers');
INSERT INTO topping_items(pizza_id,name) VALUES (6,'Ham');
INSERT INTO topping_items(pizza_id,name) VALUES (7,'Bacon');
INSERT INTO topping_items(pizza_id,name) VALUES (8,'Sausage');
INSERT INTO topping_items(pizza_id,name) VALUES (9,'Black Olives');
INSERT INTO topping_items(pizza_id,name) VALUES (10,'Chicken');
INSERT INTO topping_items(pizza_id,name) VALUES (11,'Peppers');
INSERT INTO topping_items(pizza_id,name) VALUES (12,'Mushrooms');
INSERT INTO topping_items(pizza_id,name) VALUES (13,'Basil');
INSERT INTO topping_items(pizza_id,name) VALUES (14,'Spinach');
INSERT INTO topping_items(pizza_id,name) VALUES (15,'Pineapple');
INSERT INTO topping_items(pizza_id,name) VALUES (16,'Onions');
INSERT INTO topping_items(pizza_id,name) VALUES (17,'Sausage');
INSERT INTO topping_items(pizza_id,name) VALUES (18,'Peppers');



INSERT INTO order_items(order_id,pizza_id) VALUES (1,1);
INSERT INTO order_items(order_id,pizza_id) VALUES (1,25);
INSERT INTO order_items(order_id,pizza_id) VALUES (2,2);
INSERT INTO order_items(order_id,pizza_id) VALUES (2,26);
INSERT INTO order_items(order_id,pizza_id) VALUES (3,3);
INSERT INTO order_items(order_id,pizza_id) VALUES (4,4);
INSERT INTO order_items(order_id,pizza_id) VALUES (5,5);
INSERT INTO order_items(order_id,pizza_id) VALUES (5,27);
INSERT INTO order_items(order_id,pizza_id) VALUES (5,28);
INSERT INTO order_items(order_id,pizza_id) VALUES (6,6);
INSERT INTO order_items(order_id,pizza_id) VALUES (7,7);
INSERT INTO order_items(order_id,pizza_id) VALUES (7,29);
INSERT INTO order_items(order_id,pizza_id) VALUES (8,8);
INSERT INTO order_items(order_id,pizza_id) VALUES (9,9);
INSERT INTO order_items(order_id,pizza_id) VALUES (9,30);
INSERT INTO order_items(order_id,pizza_id) VALUES (10,10);
INSERT INTO order_items(order_id,pizza_id) VALUES (11,11);
INSERT INTO order_items(order_id,pizza_id) VALUES (11,31);
INSERT INTO order_items(order_id,pizza_id) VALUES (11,32);
INSERT INTO order_items(order_id,pizza_id) VALUES (12,12);
INSERT INTO order_items(order_id,pizza_id) VALUES (13,13);
INSERT INTO order_items(order_id,pizza_id) VALUES (14,14);
INSERT INTO order_items(order_id,pizza_id) VALUES (14,33);
INSERT INTO order_items(order_id,pizza_id) VALUES (14,34);
INSERT INTO order_items(order_id,pizza_id) VALUES (15,15);
INSERT INTO order_items(order_id,pizza_id) VALUES (16,16);
INSERT INTO order_items(order_id,pizza_id) VALUES (17,17);
INSERT INTO order_items(order_id,pizza_id) VALUES (17,35);
INSERT INTO order_items(order_id,pizza_id) VALUES (17,36);
INSERT INTO order_items(order_id,pizza_id) VALUES (18,18);
INSERT INTO order_items(order_id,pizza_id) VALUES (18,37);
INSERT INTO order_items(order_id,pizza_id) VALUES (19,19);
INSERT INTO order_items(order_id,pizza_id) VALUES (20,20);
INSERT INTO order_items(order_id,pizza_id) VALUES (20,38);
INSERT INTO order_items(order_id,pizza_id) VALUES (21,21);
INSERT INTO order_items(order_id,pizza_id) VALUES (22,22);
INSERT INTO order_items(order_id,pizza_id) VALUES (22,39);
INSERT INTO order_items(order_id,pizza_id) VALUES (23,23);
INSERT INTO order_items(order_id,pizza_id) VALUES (24,24);

