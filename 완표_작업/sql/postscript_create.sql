create table postscript (
   num int auto_increment,
   id char(20) not null,
   name  char(10) not null,
   subject char(100) not null,
   content text not null,
   regist_day char(20),
   hit int,
   is_html char(1),
   primary key(num)
);

