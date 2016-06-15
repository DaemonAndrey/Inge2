INSERT INTO roles ( role_name ) VALUES 
( 'Regular' ),  			-- Role_id: 1
( 'Administrador' ), 		-- Role_id: 2
( 'SuperAdministrador' ); 	-- Role_id: 3

INSERT INTO users ( username, password, first_name, last_name, telephone_number, department, position, role_id, state ) VALUES
( 'monica@ucr.ac.cr'		, '$2y$10$D5lesEdZ1GPoOr3S17Oz9uAYwkA7S9DarVjr8sQy0Ph/Qre66m6Ki'	, 'Mónica'			, 'Villalobos'		, '24242424'	, 'Escuela de Formación Docente'	, 'Administrativo'	, 3		, 1 ), -- monicamonica
( 'adrian@ucr.ac.cr'		, '$2y$10$vYhA8Docqa4mSDqrZ4yJIOiUsG512Ni77akuz3nTwH3MGwkfpcwhG'	, 'Adrián'			, 'Alvarado'		, '43434343'	, 'Escuela de Formación Docente'	, 'Administrativo'	, 2		, 1 ), -- adrianadrian
( 'alan@ucr.ac.cr'			, '$2y$10$cqvmVmhPl0fXxqAZtQSOc.Bv7xEM.Q86XDZ/3ob8Ge5SBeuZi3i2a'	, 'Alan'			, 'Calderón'		, '23232323'	, 'Escuela de Formación Docente'	, 'Administrativo'	, 1 	, 1 ); -- alanalan

INSERT INTO users ( username, password, first_name, last_name, telephone_number, department, position, role_id ) VALUES
( 'josecarlos.jimenez@ucr.ac.cr'			, '$2y$10$orXwF8quRhrft76ZH9JaFuK44vuFmSWPMv1E3DaN2OG9eDBHbO59S'	, 'Jose'			, 'Jimenez Blanco'	, '23232323'	, 'Escuela Educación Física y Deportes'						, 'Docente'			, 1 ), -- josejose
( 'katherine.anguloangulo@ucr.ac.cr'		, '$2y$10$tD45Fkx8mYANge/j/AEHA.3GbygqLX3aoKjkXEPGzXO4KrbMqH0H.'	, 'Katherine'		, 'Angulo'			, '23232323'	, 'Escuela de Orientación y Educación Especial'				, 'Administrativo'	, 1 ), -- katherinekatherine
( 'jonathan.fonsecavallejo@ucr.ac.cr'		, '$2y$10$H6d/1Y4oXFH6sCp6F6vog.y2wO40nZSW4dcQwcK20StJxvIyGJNge'	, 'Jonathan'		, 'Fonseca'			, '34343434'	, 'Escuela Bibliotecología y Ciencias de la Información'	, 'Docente'			, 1 ), -- jonathanjonathan
( 'jose.picadosalas@ucr.ac.cr'				, '$2y$10$or3dcpx8gLghbObmMnzPu.Hf5vJC08/.SnzrsGdVcQCSVgFEX2j7C'	, 'Eduardo'			, 'Picado'			, '23232323'	, 'Escuela Bibliotecología y Ciencias de la Información'	, 'Administrativo'	, 1 ), -- eduardo
( 'francisco.zunigamadrigal@ucr.ac.cr'		, '$2y$10$IXbB8ICmTRKm7JCozNITeuC1sNdn7mT5J0r7gDOjUlzI1E.yS9I1a'	, 'Francisco'		, 'Zúñiga'			, '34343434'	, 'Instituto de Investigación en Educación INIE'			, 'Administrativo'	, 1 ), -- franciscofrancisco
( 'danny.vargas@ucr.ac.cr'					, '$2y$10$mzaSydN/tGaOyilNOHw5zu5HkmrebOnLwaPiIvRm/N/Ub1J7qf8M.'	, 'Andrés'			, 'Vargas'			, '54545454'	, 'Escuela de Formación Docente'							, 'Docente'			, 1 ), -- andresandres
( 'robin.perez@ucr.ac.cr'					, '$2y$10$ThasD/qbLS0Wzj5qnDndj.gbH2ff9RwfzcxmU832nWAGWF8sNmDEO'	, 'Andrey'			, 'Pérez'			, '23232323'	, 'Escuela Bibliotecología y Ciencias de la Información'	, 'Docente'			, 1 ); -- andreyandrey

INSERT INTO resource_types ( description, days_before_reservation ) VALUES
( 'Sala'		, '3' ),
( 'Televisor'	, '1' ),
( 'DVD'			, '1' ),
( 'Proyector'	, '1' );

INSERT INTO resources ( resource_type_id, resource_name, resource_code, description ) VALUES
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
( '4', 'Proyector Deeplee'		, 'WXY', 'Proyector de 1000 lumens' 														 ),
( '1', 'Sala Prueba 1'			, 'AAA', '20 computadoras con sistema operativo Mac OS X, 1 proyector, 1 pizarra interactiva'),
( '1', 'Sala Prueba 2'			, 'BBB', '10 computadoras con sistema operativo Windows 8.1, 1 proyector'					 );

INSERT INTO resources_users ( resource_id, user_id ) VALUES
( '1'	, '1' ),
( '2'	, '1' ),
( '3'	, '1' ),
( '4'	, '1' ),
( '5'	, '1' ),
( '6'	, '1' ),
( '7'	, '1' ),
( '8'	, '1' ),
( '9'	, '1' ),
( '10'	, '1' ),
( '11'	, '1' ),
( '12'	, '1' ),
( '13'	, '1' ),
( '14'	, '1' ),
( '15'	, '1' ),
( '16'	, '2' ),
( '17'	, '2' ),
( '18'	, '2' ),
( '19'	, '2' );

INSERT INTO `reservations` (`start_date`, `end_date`, `resource_id`, `user_comment`, `administrator_comment`, `state`, `user_seen`, `administrator_seen`, `user_id`, `event_name`) VALUES
( '2016-01-20 07:00:00', '2016-01-20 09:00:00',  	2, 'Integer vel accumsan tellus nisi eu orci.', 	'Suspendisse accumsan turpis.', 		0, 		1, 		1, 		5, 		'suscipit' 				),
( '2016-03-02 12:00:00', '2016-03-02 15:00:00',  	3, 'sfsdf', 										'', 									1, 		1, 		1, 		4, 		'aliquet' 				),
( '2016-03-06 07:00:00', '2016-03-06 09:00:00',  	2, '', 												'', 									1, 		0, 		1, 		4, 		'tincidunt' 			),
( '2016-03-16 08:00:00', '2016-03-16 09:00:00',  	4, 'Curabitur ut massa volutpat convallis.', 		'Maecenas pulvinar lobortis est.', 		0, 		0, 		0, 		2, 		'lacinia sapien' 		),
( '2016-04-12 08:00:00', '2016-04-12 10:00:00',  	4, '', 												'', 									0, 		1, 		0, 		4, 		'pede venenatis' 		),
( '2016-06-07 12:00:00', '2016-06-07 14:00:00', 	1, '', 												'', 									0, 		0, 		1, 		2, 		'quam' 					),
( '2016-06-13 08:00:00', '2016-06-13 12:00:00', 	3, 'Cum sociis natoque penatibus et magnis.', 		'Mauris lacinia sapien quis libero.', 	1, 		0, 		1, 		5, 		'quam pede' 			),
( '2016-06-16 08:00:00', '2016-06-16 11:00:00',  	3, '', 												'', 									0, 		1, 		1, 		4, 		'proin leo odio' 		),
( '2016-06-23 14:00:00', '2016-06-23 17:00:00', 	1, 'Nulla tellus. In sagittis dui vel nisl.', 		'Vivamus in felis sapien cursus.', 		0, 		1, 		0, 		3, 		'scelerisque mauris' 	),
( '2016-06-30 19:00:00', '2016-06-30 21:00:00',  	2, 'Vestibulum rutrum rutrum neque.', 				'Maecenas tincidunt lacus velit.', 		1, 		1, 		0, 		4, 		'tellus nisi' 			),
( '2016-07-10 11:00:00', '2016-07-10 13:00:00', 	5, '', 												'', 									1, 		0, 		1, 		2, 		'nullam orci' 			),
( '2016-07-20 14:00:00', '2016-07-20 19:00:00', 	5, '', 												'', 									1, 		0, 		0, 		3, 		'tellus' 				),
( '2016-08-03 18:00:00', '2016-08-03 21:00:00',  	3, 'Suspendisse accumsan tortor quis turpis.', 		'Duis aliquam convallis nunc.', 		1, 		0, 		0, 		3, 		'vestibulum sit amet' 	),
( '2016-08-09 17:00:00', '2016-08-09 19:00:00',  	2, 'Nulla suscipit ligula in lacus.', 				'Donec vehicula condimentum.', 			0, 		0, 		0, 		5, 		'ut suscipit a feugiat'	),
( '2016-08-16 07:00:00', '2016-08-16 08:00:00', 	1, '', 												'', 									1, 		1, 		1, 		4, 		'nibh qisque id justo' 	),
( '2016-08-28 10:00:00', '2016-08-28 13:00:00', 	6, '', 												'', 									1, 		1, 		1, 		3, 		'et' 					),
( '2016-09-13 11:00:00', '2016-09-13 17:00:00', 	6, 'Maecenas pulvinar lobortis est.', 				'Suspendisse potenti.', 				0, 		0, 		1, 		5, 		'habitasse platea' 		),
( '2016-09-27 07:00:00', '2016-09-27 11:00:00', 	2, '', 												'', 									1, 		1, 		0, 		4, 		'luctus et' 			),
( '2016-10-07 16:00:00', '2016-10-07 19:00:00', 	1, 'Nullam varius. Nulla facilisi.', 				'Proin leo odio consequat nulla.', 		1, 		1, 		0, 		4, 		'orci pede' 			),
( '2016-11-08 13:00:00', '2016-11-08 18:00:00', 	6, 'Fusce posuere felis sed lacus.', 				'Morbi non quam nec dui rutrum.', 		1, 		1, 		0, 		5, 		'felis' 				),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00', 	1, 'Nulla suscipit ligula in lacus.', 				'Nulla neque libero convallis eget.', 	1, 		0, 		0, 		2, 		'in porttitor pede justo' 	),
( '2016-11-10 17:00:00', '2016-11-10 20:00:00',  	2, '', 												'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			),
( '2016-12-22 11:00:00', '2016-12-22 13:00:00', 	1, 'Morbi porttitor lorem id ligula.', 				'Nam nulla.', 							0, 		0, 		1, 		5, 		'condimentum sapien'	),
( '2016-12-25 11:00:00', '2016-12-25 12:00:00',  	3, '', 												'', 									0, 		0, 		0, 		2, 		'aliquam' 				),
( '2016-11-10 17:00:00', '2016-11-10 19:00:00', 	3, '', 												'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			),
( '2016-11-10 17:00:00', '2016-11-10 20:00:00', 	4, '', 												'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			),
( '2016-11-10 17:00:00', '2016-11-10 20:00:00', 	5, '', 												'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			),
( '2016-11-10 17:00:00', '2016-11-10 20:00:00', 	6, '', 												'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00',  	7, 'Integer vel accumsan tellus nisi eu orci.', 	'Suspendisse accumsan turpis.', 		0, 		1, 		1, 		5, 		'suscipit' 				),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00',  	8, '', 												'', 									0, 		1, 		1, 		4, 		'aliquet' 				),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00',  	9, '', 												'', 									1, 		1, 		1, 		4, 		'aliquet' 				),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00', 	10, '', 											'', 									1, 		0, 		1, 		4, 		'tincidunt' 			),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00', 	11, 'Curabitur ut massa volutpat convallis.', 		'Maecenas pulvinar lobortis est.', 		0, 		0, 		0, 		2, 		'lacinia sapien' 		),
( '2016-11-10 17:00:00', '2016-11-10 18:00:00', 	12, '', 											'', 									0, 		1, 		0, 		4, 		'pede venenatis' 		),
( '2016-11-10 14:00:00', '2016-11-10 20:00:00',  	8, '', 												'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			),
( '2016-11-10 12:00:00', '2016-11-10 20:00:00',  	7, '', 												'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			),
( '2016-11-10 17:00:01', '2016-11-10 20:00:00',  	9, '', 												'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			),
( '2016-11-10 17:00:10', '2016-11-10 20:00:00',  	10, '', 											'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			),
( '2016-11-10 17:04:00', '2016-11-10 20:00:00',  	11, '', 											'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			),
( '2016-11-10 17:40:00', '2016-11-10 20:00:00',  	12, '', 											'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			),
( '2016-11-12 17:00:00', '2016-11-13 20:00:00',  	7, '', 												'', 									0, 		0, 		1, 		3, 		'nec sem duis' 			);

INSERT INTO `configurations` ( registration_rejected_message, registration_accepted_message, reservation_rejected_message, reservation_accepted_message, reservation_start_hour, reservation_end_hour ) VALUES
('Su solicitud de registro ha sido rechazada.','Su solicitud de registro ha sido aceptada','Lo sentimos. Su solicitud de reservación ha sido rechazada.','Su solicitud de reservación ha sido aceptada', 7, 22);
