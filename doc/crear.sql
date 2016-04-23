CREATE TABLE roles
(
	id 			INT UNSIGNED AUTO_INCREMENT,
	role_name 	VARCHAR(50) UNIQUE NOT NULL,
	
	PRIMARY KEY ( id )
);

CREATE TABLE functions
(
	id 				INT UNSIGNED AUTO_INCREMENT,
	function_name 	VARCHAR(100) UNIQUE NOT NULL,
	
	PRIMARY KEY ( id )
);

CREATE TABLE functions_roles
(
	id 				INT UNSIGNED AUTO_INCREMENT,
	function_id 	INT UNSIGNED NOT NULL,
	role_id 		INT UNSIGNED NOT NULL,
	
	PRIMARY KEY ( id ),
	FOREIGN KEY ( function_id ) REFERENCES functions ( id )
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY ( role_id ) REFERENCES roles ( id )
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	UNIQUE KEY ( function_id, role_id )
);

CREATE TABLE users
(
	id 					INT UNSIGNED AUTO_INCREMENT,
	username 			VARCHAR( 64 ) UNIQUE NOT NULL,
	password 			VARCHAR( 255 ) NOT NULL,
	first_name 			VARCHAR( 50 ) NOT NULL,
	last_name 			VARCHAR( 50 ) NOT NULL,
	telephone_number 	VARCHAR( 50 ) NOT NULL,
	department 			VARCHAR( 70 ) NOT NULL,
	position 			VARCHAR( 20 ) NOT NULL, 
	state 				BIT NOT NULL DEFAULT 0, -- 0: Pendiente, 1: Aceptado
	role_id 			INT UNSIGNED NOT NULL DEFAULT 1, -- 1: Administrador, 2: Usuario normal, 3: Otro 
	
	PRIMARY KEY ( id ),
	FOREIGN KEY ( role_id ) REFERENCES roles( id )
		ON DELETE NO ACTION
		ON UPDATE CASCADE
);

CREATE TABLE resources
(
	id 				INT UNSIGNED AUTO_INCREMENT,
	resource_type	VARCHAR( 20 ) NOT NULL,
	resource_name 	VARCHAR( 70 ) UNIQUE NOT NULL,
	description 	TEXT,
	
	PRIMARY KEY ( id )
);

CREATE TABLE resources_users
(
	id 			INT UNSIGNED AUTO_INCREMENT,
	resource_id INT UNSIGNED NOT NULL,
	user_id 	INT UNSIGNED NOT NULL,
	
	PRIMARY KEY ( id ),
	FOREIGN KEY ( resource_id ) REFERENCES resources ( id )
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY ( user_id ) REFERENCES users ( id )
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	UNIQUE KEY ( resource_id, user_id )
);

CREATE TABLE reservations
(
	id 						INT UNSIGNED AUTO_INCREMENT,
	start_date 				DATETIME NOT NULL,
	end_date 				DATETIME NOT NULL,
	reservation_title		VARCHAR( 30 ) NOT NULL,
	resource_id 			INT UNSIGNED NOT NULL,
	user_comment 			TEXT,
	administrator_comment	TEXT,
	state 					INT UNSIGNED NOT NULL DEFAULT 1, -- 1: Pendiente, 2: Aceptada, 3: Rechazada, 4: Cancelada
	user_seen 				BIT DEFAULT 0, -- 0: No visto, 1: Visto
	administrator_seen 		BIT DEFAULT 0, -- 0: No visto, 1: Visto
	user_id 				INT UNSIGNED NOT NULL,
	course_name 			VARCHAR( 70 ),
	course_id 				VARCHAR( 10 ),
	
	PRIMARY KEY ( id ),
	FOREIGN KEY ( resource_id ) REFERENCES resources( id )
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY ( user_id ) REFERENCES users ( id )
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	UNIQUE KEY ( start_date,resource_id )
);

CREATE TABLE historic_reservations
(
	id 						INT UNSIGNED AUTO_INCREMENT,
	reservation_start_date	DATETIME,
	resource_name 			VARCHAR( 70 ),
	reservation_end_date 	DATETIME,
	user_username 			VARCHAR( 50 ),
	user_first_name 		VARCHAR( 64 ),
	user_last_name 			VARCHAR( 64 ),
	user_comment 			TEXT,
	administrator_comment	TEXT,
	state 					INT UNSIGNED,
	
	PRIMARY KEY ( id ),
	UNIQUE KEY ( reservation_start_date, resource_name, user_username )
);

CREATE TABLE configurations
(
	id 								INT UNSIGNED AUTO_INCREMENT,
	registration_rejected_message 	TEXT,
	registration_accepted_message 	TEXT,
	reservation_rejected_message 	TEXT,
	reservation_accepted_message 	TEXT,
	days_before_reservation 		INT UNSIGNED,
	reservation_schedule_weekdays	VARCHAR( 10 ),
	reservation_schedule_weekends	VARCHAR( 10 ),
	
	PRIMARY KEY ( id )
);
