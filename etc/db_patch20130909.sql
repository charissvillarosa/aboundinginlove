create table invite_clicks (
	id bigint not null primary key auto_increment,
	app_id varchar(50) not null,
	token_id varchar(50) not null
);