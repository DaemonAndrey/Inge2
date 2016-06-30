INSERT INTO roles ( role_name ) VALUES 
( 'Regular' ),  			-- Role_id: 1
( 'Administrador' ), 		-- Role_id: 2
( 'SuperAdministrador' ); 	-- Role_id: 3

INSERT INTO users ( username, first_name, last_name, telephone_number, department, position, role_id, state ) VALUES
( 'adrian.alvarado_r@ucr.ac.cr'				, 'Adrián'			, 'Alvarado Ramírez'		, '88888888'	, 'Escuela de Formación Docente'							, 'Administrativo'	, 3  , 1 );

INSERT INTO resource_types ( description, days_before_reservation ) VALUES
( 'Sala'		, '0' );

INSERT INTO `configurations` ( registration_rejected_subject, registration_accepted_subject, reservation_rejected_subject, reservation_accepted_subject, registration_rejected_message, registration_accepted_message, reservation_rejected_message, reservation_accepted_message, reservation_start_hour, reservation_end_hour ) VALUES
('Solicitud de Registro rechazada (Facultad Educación - PROTEA)','Bienvenid@ al sistema de reservación de recursos (Facultad Educación - PROTEA)','Solicitud de Reservación rechazada (Facultad Educación - PROTEA)','Solicitud de Reservación aceptada (Facultad Educación - PROTEA)','Su solicitud de registro ha sido rechazada.','Su solicitud de registro ha sido aceptada.','Lo sentimos. Su solicitud de reservación ha sido rechazada.','Su solicitud de reservación ha sido aceptada.', 7, 22);