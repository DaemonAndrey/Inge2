INSERT INTO Roles ( role_name ) VALUES 
( 'Administrador' ),  	-- Role_id: 1
( 'Regular' ); 			-- Role_id: 2

INSERT INTO Users ( username, password, first_name, last_name, telephone_number, department, position, role_id, state ) VALUES
( 'admin@ucr.ac.cr'			, '$2y$10$B0NqETK1IRWDmCZ15780UuFuVdBgetYNDgtj5NotHuDc4p1WM/ZqS'	, 'Administrador'	, 'Administrador'	, '88888888'	, 'Educación'				, 'Administrativo'	, 1, 1 ), -- adminadmin
( 'usuario@ucr.ac.cr'		, '$2y$10$iwo.d6bADv2Q33.v1uKfs.FSeKWkUURodIyEvVcAbLWXBFxOSbeCy'	, 'Usuario'			, 'Usuario'			, '22222222'	, 'Educación'				, 'Otro'				, 2, 1 ); -- usuariousuario

INSERT INTO Users ( username, password, first_name, last_name, telephone_number, department, position, role_id ) VALUES
( 'docente@ucr.ac.cr'		, '$2y$10$sx1rvA2rNrGkCwGy1.ut.O06fQHYxwH.IAsxfyjYudD7xSIGT4zeK'			, 'Docente'			, 'Docente'			, '77777777'	, 'Enseñanza del inglés'	, 'Docente'			, 2 ), -- 987654321
( 'investigador@ucr.ac.cr'	, '$2y$10$14TTkEDdAQy/sF.619uYkeArhx7vunbB2r0addAvyFtXQfclGLAl.'			, 'Investigador'	, 'Investigador'	, '66666666'	, 'INIE'						, 'Investigador'	, 2 ), -- 12345678
( 'otro@ucr.ac.cr'			, '$2y$10$RKh7c1e6jM1DYO11VYdAS.dFKY.OhBs6yMU7MpIt/owYRnFeHSalW'	, 'Otro'				, 'Otro'				, '99999999'	, 'ECCI'						, 'Otro'				, 2 ); -- 122345678

INSERT INTO Resources ( resource_type, resource_name, description ) VALUES
( 'Sala'			, 'Sala SITEA'					, '20 computadoras con sistema operativo Mac OS X, 1 proyector, 1 pizarra interactiva' 	),
( 'Sala'			, 'Sala de audiovisuales'		, '3 televisores, 2 proyectores, 5 laptops, 4 reproductores de DVD' 								),
( 'Sala'			, 'Laboratorio de Computo'	, '15 computadoras con sistema operativo Windows 10, 1 proyector' 								),
( 'Televisor'		, 'Televisor LG abc'			, 'Televisor de 20 pulgadas' 																					),
( 'DVD'			, 'DVD Philips'					, '' 																													),
( 'Proyector'	, 'Proyector Epson'			, 'Proyector de 1000 lumens' 																					);

INSERT INTO Resources_Users ( resource_id, user_id ) VALUES
( '1'	, '1' ),
( '2'	, '1' ),
( '3'	, '1' ),
( '4'	, '1' ),
( '5'	, '1' ),
( '6'	, '1' );

INSERT INTO Reservations ( start_date, end_date, resource_id, user_comment, administrator_comment, state, user_seen, administrator_seen, user_id, course_name, course_id ) VALUES
('2015-01-20 07:00:00'	, '2015-01-20 09:00:00'	, 2	, 'Integer vel accumsan tellus nisi eu orci.'	, 'Suspendisse accumsan turpis.'		, 4	, true	, true	, 5	, 'suscipit'						, 'WR-0166'	),
('2015-03-02 12:00:00'	, '2015-03-02 15:00:00'	, 3	, ''															, ''												, 1	, true	, true	, 4	, 'aliquet'						, 'WD-4720'	),
('2015-03-06 07:00:00'	, '2015-03-06 09:00:00'	, 2	, ''															, ''												, 1	, false	, true	, 4	, 'tincidunt'						, 'ZR-5479'	),
('2015-03-16 08:00:00'	, '2015-03-16 09:00:00'	, 4	, 'Curabitur ut massa volutpat convallis.'		, 'Maecenas pulvinar lobortis est.'	, 4	, false	, false	, 2	, 'lacinia sapien'				, 'JU-7531'	),
('2015-04-12 08:00:00'	, '2015-04-12 10:00:00'	, 4	, ''															, ''												, 4	, true	, false	, 4	, 'pede venenatis'				, 'YD-5950'	),
('2015-06-07 12:00:00'	, '2015-06-07 14:00:00'	, 1	, ''															, ''												, 2	, false	, true	, 2	, 'quam'							, 'GS-3971'	),
('2015-06-13 08:00:00'	, '2015-06-13 12:00:00'	, 3	, 'Cum sociis natoque penatibus et magnis.'	, 'Mauris lacinia sapien quis libero. '	, 1	, false	, true	, 5	, 'quam pede'					, 'JF-7085'	),
('2015-06-16 08:00:00'	, '2015-06-16 11:00:00'	, 3	, ''															, ''												, 4	, true	, true	, 4	, 'proin leo odio'				, 'MI-6267'	),
('2015-06-23 14:00:00'	, '2015-06-23 17:00:00'	, 1	, 'Nulla tellus. In sagittis dui vel nisl.'			, 'Vivamus in felis sapien cursus.'		, 4	, true	, false	, 3	, 'scelerisque mauris'			, 'MV-6742'	),
('2015-06-30 19:00:00'	, '2015-06-30 21:00:00'	, 2	, 'Vestibulum rutrum rutrum neque.'				, 'Maecenas tincidunt lacus velit.'	, 1	, true	, false	, 4	, 'tellus nisi'						, 'NB-1025'	),
('2015-07-10 11:00:00'	, '2015-07-10 13:00:00'	, 5	, ''															, ''												, 1	, false	, true	, 2	, 'nullam orci'					, 'SI-8984'	),
('2015-07-20 14:00:00'	, '2015-07-20 19:00:00'	, 5	, ''															, ''												, 1	, false	, false	, 3	, 'tellus'							, 'SB-6365'	),
('2015-08-03 18:00:00'	, '2015-08-03 21:00:00'	, 3	, 'Suspendisse accumsan tortor quis turpis.'	, 'Duis aliquam convallis nunc.'		, 1	, false	, false	, 3	, 'vestibulum sit amet'		, 'AF-3106'	),
('2015-08-09 17:00:00'	, '2015-08-09 19:00:00'	, 2	, 'Nulla suscipit ligula in lacus.'					, 'Donec vehicula condimentum.'		, 4	, false	, false	, 5	, 'ut suscipit a feugiat'		, 'SL-3135'	),
('2015-08-16 07:00:00'	, '2015-08-16 08:00:00'	, 1	, ''															, ''												, 1	, true	, true	, 4	, 'nibh quisque id justo'		, 'UZ-2140'	),
('2015-08-28 10:00:00'	, '2015-08-28 13:00:00'	, 6	, ''															, ''												, 1	, true	, true	, 3	, 'et'								, 'TZ-5350'	),
('2015-09-13 11:00:00'	, '2015-09-13 17:00:00'	, 6	, 'Maecenas pulvinar lobortis est.'				, 'Suspendisse potenti.'					, 3	, false	, true	, 5	, 'habitasse platea'			, 'PH-6127'	),
('2015-09-27 07:00:00'	, '2015-09-27 11:00:00'	, 2	, ''															, ''												, 1	, true	, false	, 4	, 'luctus et'						, 'HJ-6144'	),
('2015-10-07 16:00:00'	, '2015-10-07 19:00:00'	, 1	, 'Nullam varius. Nulla facilisi.'						, 'Proin leo odio consequat nulla.'	, 1	, true	, false	, 4	, 'orci pede'						, 'RV-9296'	),
('2015-11-08 13:00:00'	, '2015-11-08 18:00:00'	, 6	, 'Fusce posuere felis sed lacus.'					, 'Morbi non quam nec dui rutrum.'	, 1	, true	, false	, 5	, 'felis'							, 'IS-4873'	),
('2015-11-10 17:00:00'	, '2015-11-10 18:00:00'	, 1	, 'Nulla suscipit ligula in lacus.'					, 'Nulla neque libero convallis eget.'	, 1	, false	, false	, 2	, 'in porttitor pede justo'	, 'JS-4412'	),
('2015-11-10 17:00:00'	, '2015-11-10 20:00:00'	, 2	, ''															, ''												, 4	, false	, true	, 3	, 'nec sem duis'				, 'SD-6794'	),
('2015-12-22 11:00:00'	, '2015-12-22 13:00:00'	, 1	, 'Morbi porttitor lorem id ligula.'					, 'Nam nulla.'								, 2	, false	, true	, 5	, 'condimentum sapien'		, 'MH-9584'	),
('2015-12-25 11:00:00'	, '2015-12-25 12:00:00'	, 3	, ''															, ''												, 3	, false	, false	, 2	, 'aliquam'						, 'XA-8248'	);
