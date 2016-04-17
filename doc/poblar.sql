INSERT INTO Roles ( role_name ) VALUES 
( 'Administrador' ),  	-- Role_id: 1
( 'Regular' ) 			-- Role_id: 2

INSERT INTO Users ( username, password, first_name, last_name, telephone_number, department, position, role_id ) VALUES
( 'admin@ucr.ac.cr'			, '$2y$10$B0NqETK1IRWDmCZ15780UuFuVdBgetYNDgtj5NotHuDc4p1WM/ZqS'	, 'Administrador'	, 'Administrador'	, '88888888'	, 'Educación'				, 'Administrativo'	, 1 ), -- adminadmin
( 'usuario@ucr.ac.cr'		, '$2y$10$iwo.d6bADv2Q33.v1uKfs.FSeKWkUURodIyEvVcAbLWXBFxOSbeCy'	, 'Usuario'			, 'Usuario'			, '22222222'	, 'Educación'				, 'Otro'				, 2 ), -- usuariousuario
( 'docente@ucr.ac.cr'		, '$2y$10$sx1rvA2rNrGkCwGy1.ut.O06fQHYxwH.IAsxfyjYudD7xSIGT4zeK'			, 'Docente'			, 'Docente'			, '77777777'	, 'Enseñanza del inglés'	, 'Docente'			, 2 ), -- 987654321
( 'investigador@ucr.ac.cr'	, '$2y$10$14TTkEDdAQy/sF.619uYkeArhx7vunbB2r0addAvyFtXQfclGLAl.'			, 'Investigador'	, 'Investigador'	, '66666666'	, 'INIE'						, 'Investigador'	, 2 ), -- 12345678
( 'otro'							, '$2y$10$RKh7c1e6jM1DYO11VYdAS.dFKY.OhBs6yMU7MpIt/owYRnFeHSalW'	, 'Otro'				, 'Otro',				, '99999999'	, 'ECCI'						, 'Otro'				, 2 )  -- 122345678