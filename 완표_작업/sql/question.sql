create table question (
   num int auto_increment,
   id char(20) not null,
   name  char(10) not null,
   content text not null,
   regist_day char(20),
   primary key(num)
);

