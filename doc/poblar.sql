INSERT INTO roles ( role_name ) VALUES 
( 'Administrador' ),  	-- Role_id: 1
( 'Regular' ); 			-- Role_id: 2

INSERT INTO users ( username, password, first_name, last_name, telephone_number, department, position, role_id, state ) VALUES
( 'admin@ucr.ac.cr'			, '$2y$10$B0NqETK1IRWDmCZ15780UuFuVdBgetYNDgtj5NotHuDc4p1WM/ZqS'	, 'Administrador'	, 'Administrador'	, '88888888'	, 'Educación'	, 'Administrativo'	, 1		, 1 ), -- adminadmin
( 'monica@ucr.ac.cr'		, '$2y$10$D5lesEdZ1GPoOr3S17Oz9uAYwkA7S9DarVjr8sQy0Ph/Qre66m6Ki'	, 'Mónica'			, 'Villalobos'		, '24242424'	, 'Educación'	, 'Administrativo'	, b'1'	, 1 ), -- monicamonica
( 'adrian@ucr.ac.cr'		, '$2y$10$vYhA8Docqa4mSDqrZ4yJIOiUsG512Ni77akuz3nTwH3MGwkfpcwhG'	, 'Adrián'			, 'Alvarado'		, '43434343'	, 'Educación'	, 'Administrativo'	, b'1'	, 1 ), -- adrianadrian
( 'usuario@ucr.ac.cr'		, '$2y$10$iwo.d6bADv2Q33.v1uKfs.FSeKWkUURodIyEvVcAbLWXBFxOSbeCy'	, 'Usuario'			, 'Usuario'			, '22222222'	, 'Educación'	, 'Otro'			, 2		, 1 ); -- usuariousuario

INSERT INTO users ( username, password, first_name, last_name, telephone_number, department, position, role_id ) VALUES
( 'docente@ucr.ac.cr'		, '$2y$10$sx1rvA2rNrGkCwGy1.ut.O06fQHYxwH.IAsxfyjYudD7xSIGT4zeK'	, 'Docente'			, 'Docente'			, '77777777'	, 'Enseñanza del inglés'	, 'Docente'			, 2 ), -- 987654321
( 'investigador@ucr.ac.cr'	, '$2y$10$14TTkEDdAQy/sF.619uYkeArhx7vunbB2r0addAvyFtXQfclGLAl.'	, 'Investigador'	, 'Investigador'	, '66666666'	, 'INIE'					, 'Investigador'	, 2 ), -- 12345678
( 'otro@ucr.ac.cr'			, '$2y$10$RKh7c1e6jM1DYO11VYdAS.dFKY.OhBs6yMU7MpIt/owYRnFeHSalW'	, 'Otro'			, 'Otro'			, '99999999'	, 'ECCI'					, 'Otro'			, 2 ); -- 122345678

INSERT INTO resource_types ( description ) VALUES
( 'Sala' ),
( 'Televisor' ),
( 'DVD' ),
( 'Proyector' );

INSERT INTO resources ( resource_type, resource_name, resource_code, description ) VALUES
( '1', 'Sala SITEA'				, 'ABC', '20 computadoras con sistema operativo Mac OS X, 1 proyector, 1 pizarra interactiva'),
( '1', 'Sala de audiovisuales'	, 'DEF', '3 televisores, 2 proyectores, 5 laptops, 4 reproductores de DVD' 					 ),
( '1', 'Laboratorio de Cómputo'	, 'GHI', '15 computadoras con sistema operativo Windows 10, 1 proyector' 					 ),
( '2', 'Televisor LG'			, 'JKL', 'Televisor de 20 pulgadas' 														 ),
( '3', 'DVD Philips'			, 'MNO', 'DVD Philips surround' 															 ),
( '4', 'Proyector Epson'		, 'PQR', 'Proyector de 1000 lumens' 														 ),
( '1', 'Sala 2'					, 'STU', '20 computadoras con sistema operativo Mac OS X, 1 proyector, 1 pizarra interactiva'),
( '1', 'Sala 3'					, 'VWX', '3 televisores, 2 proyectores, 5 laptops, 4 reproductores de DVD' 					 ),
( '1', 'Laboratorio 2'			, 'YZA', '15 computadoras con sistema operativo Windows 10, 1 proyector' 					 ),
( '2', 'Televisor SAMSUNG'		, 'BCD', 'Televisor de 20 pulgadas' 														 ),
( '3', 'DVD Sony'				, 'EFG', 'DVD Philips surround 5.1' 														 ),
( '1', 'Sala 4'					, 'HIJ', '20 computadoras con sistema operativo Mac OS X, 1 proyector, 1 pizarra interactiva'),
( '1', 'Sala 5'					, 'KLM', '3 televisores, 2 proyectores, 5 laptops, 4 reproductores de DVD' 					 ),
( '1', 'Laboratorio 3'			, 'NOP', '15 computadoras con sistema operativo Windows 10, 1 proyector' 					 ),
( '2', 'Televisor RCA'			, 'QRS', 'Televisor de 20 pulgadas' 														 ),
( '3', 'DVD LG'					, 'TUV', 'DVD Philips surround 7.1' 														 ),
( '4', 'Proyector Deeplee'		, 'WXY', 'Proyector de 1000 lumens' 														 );

INSERT INTO resources_users ( resource_id, user_id ) VALUES
( '1'	, '1' ),
( '2'	, '1' ),
( '3'	, '1' ),
( '4'	, '1' ),
( '5'	, '1' ),
( '6'	, '1' );

INSERT INTO `reservations` (`start_date`, `end_date`, `reservation_title`, `resource_id`, `user_comment`, `administrator_comment`, `state`, `user_seen`, `administrator_seen`, `user_id`, `course_name`, `course_id`) VALUES
( '2016-01-20 07:00:00', '2016-01-20 09:00:00', 'Sala de audiovisuales - WR-016', 2, 'Integer vel accumsan tellus nisi eu orci.', 'Suspendisse accumsan turpis.', 4, b'1', b'1', 5, 'suscipit', 'WR-0166'),
( '2016-03-02 12:00:00', '2016-03-02 15:00:00', 'Laboratorio de Computo - WD-47', 3, 'sfsdf', '', 1, b'1', b'1', 4, 'aliquet', 'WD-4720'),
( '2016-03-06 07:00:00', '2016-03-06 09:00:00', 'Sala de audiovisuales - ZR-547', 2, '', '', 1, b'0', b'1', 4, 'tincidunt', 'ZR-5479'),
( '2016-03-16 08:00:00', '2016-03-16 09:00:00', 'Televisor LG abc - JU-7531', 4, 'Curabitur ut massa volutpat convallis.', 'Maecenas pulvinar lobortis est.', 4, b'0', b'0', 2, 'lacinia sapien', 'JU-7531'),
( '2016-04-12 08:00:00', '2016-04-12 10:00:00', 'Televisor LG abc - YD-5950', 4, '', '', 4, b'1', b'0', 4, 'pede venenatis', 'YD-5950'),
( '2016-06-07 12:00:00', '2016-06-07 14:00:00', 'Sala SITEA - GS-3971', 1, '', '', 2, b'0', b'1', 2, 'quam', 'GS-3971'),
( '2016-06-13 08:00:00', '2016-06-13 12:00:00', 'Laboratorio de Computo - JF-70', 3, 'Cum sociis natoque penatibus et magnis.', 'Mauris lacinia sapien quis libero.', 1, b'0', b'1', 5, 'quam pede', 'JF-7085'),
( '2016-06-16 08:00:00', '2016-06-16 11:00:00', 'Laboratorio de Computo - MI-62', 3, '', '', 4, b'1', b'1', 4, 'proin leo odio', 'MI-6267'),
( '2016-06-23 14:00:00', '2016-06-23 17:00:00', 'Sala SITEA - MV-6742', 1, 'Nulla tellus. In sagittis dui vel nisl.', 'Vivamus in felis sapien cursus.', 4, b'1', b'0', 3, 'scelerisque mauris', 'MV-6742'),
( '2016-06-30 19:00:00', '2016-06-30 21:00:00', 'Sala de audiovisuales - NB-102', 2, 'Vestibulum rutrum rutrum neque.', 'Maecenas tincidunt lacus velit.', 1, b'1', b'0', 4, 'tellus nisi', 'NB-1025'),
( '2016-07-10 11:00:00', '2016-07-10 13:00:00', 'DVD Philips - SI-8984', 5, '', '', 1, b'0', b'1', 2, 'nullam orci', 'SI-8984'),
( '2016-07-20 14:00:00', '2016-07-20 19:00:00', 'DVD Philips - SB-6365', 5, '', '', 1, b'0', b'0', 3, 'tellus', 'SB-6365'),
( '2016-08-03 18:00:00', '2016-08-03 21:00:00', 'Laboratorio de Computo - AF-31', 3, 'Suspendisse accumsan tortor quis turpis.', 'Duis aliquam convallis nunc.', 1, b'0', b'0', 3, 'vestibulum sit amet', 'AF-3106'),
( '2016-08-09 17:00:00', '2016-08-09 19:00:00', 'Sala de audiovisuales - SL-313', 2, 'Nulla suscipit ligula in lacus.', 'Donec vehicula condimentum.', 4, b'0', b'0', 5, 'ut suscipit a feugiat', 'SL-3135'),
( '2016-08-16 07:00:00', '2016-08-16 08:00:00', 'Sala SITEA - UZ-2140', 1, '', '', 1, b'1', b'1', 4, 'nibh quisque id justo', 'UZ-2140'),
( '2016-08-28 10:00:00', '2016-08-28 13:00:00', 'Proyector Epson - TZ-5350', 6, '', '', 1, b'1', b'1', 3, 'et', 'TZ-5350'),
( '2016-09-13 11:00:00', '2016-09-13 17:00:00', 'Proyector Epson - PH-6127', 6, 'Maecenas pulvinar lobortis est.', 'Suspendisse potenti.', 3, b'0', b'1', 5, 'habitasse platea', 'PH-6127'),
( '2016-09-27 07:00:00', '2016-09-27 11:00:00', 'Sala de audiovisuales - HJ-614', 2, '', '', 1, b'1', b'0', 4, 'luctus et', 'HJ-6144'),
( '2016-10-07 16:00:00', '2016-10-07 19:00:00', 'Sala SITEA - RV-9296', 1, 'Nullam varius. Nulla facilisi.', 'Proin leo odio consequat nulla.', 1, b'1', b'0', 4, 'orci pede', 'RV-9296'),
( '2016-11-08 13:00:00', '2016-11-08 18:00:00', 'Proyector Epson - IS-4873', 6, 'Fusce posuere felis sed lacus.', 'Morbi non quam nec dui rutrum.', 1, b'1', b'0', 5, 'felis', 'IS-4873'),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00', 'Sala SITEA - JS-4412', 1, 'Nulla suscipit ligula in lacus.', 'Nulla neque libero convallis eget.', 1, b'0', b'0', 2, 'in porttitor pede justo', 'JS-4412'),
( '2016-11-10 17:00:00', '2016-11-10 20:00:00', 'Sala de audiovisuales - SD-679', 2, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794'),
( '2016-12-22 11:00:00', '2016-12-22 13:00:00', 'Sala SITEA - MH-9584', 1, 'Morbi porttitor lorem id ligula.', 'Nam nulla.', 2, b'0', b'1', 5, 'condimentum sapien', 'MH-9584'),
( '2016-12-25 11:00:00', '2016-12-25 12:00:00', 'Laboratorio de Computo - XA-82', 3, '', '', 3, b'0', b'0', 2, 'aliquam', 'XA-8248'),
( '2016-11-10 17:00:00', '2016-11-10 19:00:00', 'Otro recurso', 3, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794'),
( '2016-11-10 17:00:00', '2016-11-10 20:00:00', 'Otro1 - SD-6794', 4, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794'),
( '2016-11-10 17:00:00', '2016-11-10 20:00:00', 'Otro2 - SD-6794', 5, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794'),
( '2016-11-10 17:00:00', '2016-11-10 20:00:00', 'Otro3 - SD-6794', 6, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794'),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00', 'Sala de audiovisuales - WR-016', 7, 'Integer vel accumsan tellus nisi eu orci.', 'Suspendisse accumsan turpis.', 4, b'1', b'1', 5, 'suscipit', 'WR-0166'),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00', 'Laboratorio de Computo - WD-47', 8, '', '', 1, b'1', b'1', 4, 'aliquet', 'WD-4720'),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00', 'Laboratorio de Computo - WD-47', 9, '', '', 1, b'1', b'1', 4, 'aliquet', 'WD-4720'),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00', 'Sala de audiovisuales - ZR-547', 10, '', '', 1, b'0', b'1', 4, 'tincidunt', 'ZR-5479'),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00', 'Televisor LG abc - JU-7531', 11, 'Curabitur ut massa volutpat convallis.', 'Maecenas pulvinar lobortis est.', 4, b'0', b'0', 2, 'lacinia sapien', 'JU-7531'),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00', 'Televisor LG abc - YD-5950', 12, '', '', 4, b'1', b'0', 4, 'pede venenatis', 'YD-5950'),
( '2016-11-10 14:00:00', '2016-11-10 20:00:00', 'Sala de audiovisuales - SD-679', 8, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794'),
( '2016-11-10 12:00:00', '2016-11-10 20:00:00', 'Sala de audiovisuales - SD-679', 7, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794'),
( '2016-11-10 17:00:01', '2016-11-10 20:00:00', 'Sala de audiovisuales - SD-679', 9, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794'),
( '2016-11-10 17:00:10', '2016-11-10 20:00:00', 'Sala de audiovisuales - SD-679', 10, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794'),
( '2016-11-10 17:04:00', '2016-11-10 20:00:00', 'Sala de audiovisuales - SD-679', 11, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794'),
( '2016-11-10 17:40:00', '2016-11-10 20:00:00', 'Sala de audiovisuales - SD-679', 12, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794'),
( '2016-11-12 17:00:00', '2016-11-13 20:00:00', 'Sala de audiovisuales - SD-679', 7, '', '', 4, b'0', b'1', 3, 'nec sem duis', 'SD-6794');