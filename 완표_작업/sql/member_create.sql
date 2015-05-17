create table member	(
name char(10) not null,
id char(20),
passwd char(20) not null,
email char(50) not null,
birth char(20) not null,
gender char(10) not null,
hp char(20) not null,
address char(100) not null,
in_date char(15),
primary key(id)
);