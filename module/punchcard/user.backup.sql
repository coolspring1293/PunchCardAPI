Create table user(
	id int primary key,
	user_name varchar(32),
	nick_name varchar(32),
	password_hash varchar(64),
	streak_days int,
	gold_coin_amount int,
	last_activity_date date
);

insert into user values	(1, 'liuw53', 'Wang Liu', '1234', 3, 233, '2016-05-19');
insert into user values	(2, 'leasunhy', 'Siyuan Liu', '1234', 100, 666, '2016-05-19');
insert into user values	(3, 'allenxie', 'Zhuhui xie', '1234', 13, 99, '2016-05-18');
