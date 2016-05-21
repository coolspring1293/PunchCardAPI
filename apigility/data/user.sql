Create table user(
	id INTEGER primary key,
	user_name varchar(32) NOT NULL UNIQUE,
	nick_name varchar(32),
	password_hash varchar(128) NOT NULL,
	streak_days int NOT NULL,
	gold_coin_amount int  NOT NULL,
	last_activity_date date  NOT NULL
);

insert into user (user_name, nick_name, password_hash, streak_days, gold_coin_amount, last_activity_date)
  values	('liuw53', 'Wang Liu', '1234', 3, 233, '2016-05-19');
insert into user (user_name, nick_name, password_hash, streak_days, gold_coin_amount, last_activity_date)
  values	('leasunhy', 'Siyuan Liu', '1234', 100, 666, '2016-05-19');
insert into user(user_name, nick_name, password_hash, streak_days, gold_coin_amount, last_activity_date)
  values	('allenxie', 'Zhuhui Xie', '1234', 13, 99, '2016-05-18');
