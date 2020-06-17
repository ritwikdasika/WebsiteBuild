CREATE TABLE customers (
user_id int(11) AUTO_INCREMENT not null,
user_firstName varchar(20) not null,
user_lastName varchar(20) not null,
user_email varchar(500) not null,
user_billingAddress varchar(1000) not null,
user_city varchar(500) not null,
user_state varchar(2) not null,
user_zip int(5) not null,
PRIMARY KEY(user_id)
);

CREATE TABLE payment(
user_id int(11) not null,
user_cardName varchar(20) not null,
user_cardNum int(20) not null,
user_expMonth varchar(20) not null,
user_expYr int(4) not null,
user_cvv int(5) not null,
PRIMARY KEY(user_cardNum),
FOREIGN KEY(user_id) REFERENCES customers(user_id)
);

CREATE TABLE misc (
date datetime not null,
user_ip varchar(30) not null
);
