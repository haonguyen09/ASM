create database motorcycle;
use motorcycle;
drop database motorcycle;

create table admins
(
	adminID varchar(10)not null primary key,
    adminName varchar(50) not null,
    adminPass varchar(200) not null,
    adminUser varchar(50) not null,
    adminPhone varchar(12) not null,
    adminImage varchar(20) null
);
select * from admins;

create table customers
(
	customerID varchar(10) not null primary key,
    customerPass varchar(200) not null,
    customerFullName varchar(50) null,
    customerEmail varchar(50) null,
    customerPhone varchar(12)  null
);

select * from customers;

create table producers
(
	producerID int auto_increment primary key,
    producerName varchar(30) not null unique,
    producerDetails varchar(300) not null,
    producerCountry varchar(20) not null
);


create table products
(
	productID varchar(5) not null primary key,
    productName varchar(50) not null,
    productPrice int null,
    productDetails varchar(3000) null,
    productImage1 varchar(30) null,
    producerID int not null,
    constraint foreign key (producerID) references producers (producerID) on delete cascade
    );

create table orders
(
	orderID varchar(10) not null primary key,
    orderDate date not null,
    customerID varchar(10),
	constraint foreign key (customerID) references customers (customerID)
);

create table orderDetails 
(
	constraint foreign key (orderID) references orders (orderID),
    constraint foreign key (productID) references products (productID),
    orderID varchar(10) not null,
    productID varchar(5) not null,
    quantityOrders int(20) not null,
    orderDate date null
);

-- insert data
insert into producers (producerName, producerDetails, producerCountry) values
('Wave','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do','China'),
 ('Vision','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do','Korea'),
 ('AirBlade','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do','The USA'), 
 ('Winner','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do','China'), 
 ('Sh','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do','Laos'),
 ('Vario','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do','Japan');


insert into products (productID, productName, productPrice, productImage1, producerID) value
('P001', 'Honda Winner x', '3000', 'product01.jpg', 1),
('P002', 'Honda Vision 2022', '3100', 'product02.jpg', 2),
('P003', 'Honda Wave A', '950', 'product03.jpg', 2),
('P004', 'Honda AirBlade', '3500', 'product04.jpg', 2),
('P005', 'Honda Sh 125i', '4000', 'product05.jpg', 1),
('P006', 'Honda CBR 1000rr', '4000', 'product06.jpg', 1);


insert into admins(adminID, adminName, adminPass, adminUser, adminPhone, adminImage) values
('A001', 'Nguyen Phu Y', '$2y$10$wgLeTir15e341aq02QGutusiTk7pmo5dOrZswNLjx3jfZ5xLzhW5.', 'nguyenphuy', '12345678', 'admin1.jpg'),
('A002', 'Nguyen Nhat Hao', '$2y$10$wgLeTir15e341aq02QGutusiTk7pmo5dOrZswNLjx3jfZ5xLzhW5.', 'nguyennhathao', '1234567890', 'admin2.jpg');
select * from admins; 
select * from admins; 
select * from producers;
select * from customers;
