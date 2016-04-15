create table Roles
(
	id int unsigned auto_increment,
	role_name varchar(50) unique not null,
	
	primary key ( id )
);

create table Functions
(
	id int unsigned auto_increment,
	function_name varchar(100) unique not null,
	
	primary key ( id )
);

create table Functions_Roles
(
	id int unsigned auto_increment,
	function_id int unsigned not null,
	role_id int unsigned not null,
	
	primary key ( id ),
	foreign key ( function_id ) references Functions ( id ),
	foreign key ( role_id ) references Roles ( id ),
	unique key (function_id, role_id)
);

create table Users
(
	id int unsigned auto_increment,
	username varchar( 64 ) unique not null,
	password varchar( 255 ) not null,
	first_name varchar( 50 ) not null,
	last_name varchar( 50 ) not null,
	telephone_number varchar( 50 ) not null,
	department varchar( 70 ) not null,
	position varchar( 20 ) not null, 
	state bit not null default 0, -- 0: Pendiente, 1: Aceptado
	role_id int unsigned not null default 1, -- 0: Administrador, 1: Usuario normal, 2: Otro 
	
	primary key ( id ),
	foreign key ( role_id ) references Roles( id )
);

create table Resources
(
	id int unsigned auto_increment,
	resource_name varchar( 70 ) unique not null,
	description text,
	
	primary key ( id )
);

create table Resources_Users
(
	id int unsigned auto_increment,
	resource_id int unsigned not null,
	user_id int unsigned not null,
	
	primary key ( id ),
	foreign key ( resource_id ) references Resources ( id ),
	foreign key ( user_id ) references Users ( id ),
	unique key(resource_id, user_id)
);

create table Reservations
(
	id int unsigned auto_increment,
	start_date datetime not null,
	end_date datetime not null,
	resource_id int unsigned not null,
	user_comment text,
	administrator_comment text,
	state int unsigned not null default 0, -- 0: Pendiente, 1: Aceptada, 2: Rechazada, 3: Cancelada
	user_seen bit default 0, -- 0: No visto, 1: Visto
	administrator_seen bit default 0, -- 0: No visto, 1: Visto
	requesting_user_id int unsigned not null,
	course_name varchar( 70 ),
	course_id varchar( 10 ),
	
	primary key ( id ),
	foreign key ( resource_id ) references Resources( id ),
	foreign key ( requesting_user_id ) references Users ( id ),
	unique key(start_date,resource_id)
);

create table HistoricReservations
(
	id int unsigned auto_increment,
	reservation_start_date datetime,
	resource_name varchar( 70 ),
	reservation_end_date datetime,
	user_username varchar( 50 ),
	user_first_name varchar( 64 ),
	user_last_name varchar( 64 ),
	user_comment text,
	administrator_comment text,
	state int unsigned,
	
	primary key ( id ),
	unique key(reservation_start_date,resource_name,user_username)
);

create table Configurations
(
	id int unsigned auto_increment,
	registration_rejected_message text,
	registration_accepted_message text,
	reservation_rejected_message text,
	reservation_accepted_message text,
	days_before_reservation int unsigned,
	reservation_schedule_weekdays varchar( 10 ),
	reservation_schedule_weekends varchar( 10 ),
	
	primary key ( id )
);
