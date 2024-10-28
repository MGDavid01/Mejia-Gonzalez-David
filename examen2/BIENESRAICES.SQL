create DATABASE bienesraices3;
DROP DATABASE bienesraices3;

create table sellers(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(32),
    email varchar(32),
    phone varchar(10)
);

CREATE TABLE propierties(
    id int primary key AUTO_INCREMENT,
    title varchar(64) NOT NULL,
    price decimal(10,2) NOT NULL,
    imagen varchar(128) NOT NULL,
    description longtext,
    rooms int(1),
    wc int(1),
    garages int(1),
    timestamp date,
    seller int NOT NULL,
    foreign key(seller) references sellers(id)
);