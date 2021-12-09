USE so_bs;

-- <<<<<<<<<<<<<<<<<<<< PUNTO DE VENTA <<<<<<<<<<<<<<<<<<<< 
-- Registrar
CREATE PROCEDURE sp_Registro_ptovta 
	@cve_pto VARCHAR(10), 
	@pto_vta VARCHAR(30), 
	@calle VARCHAR(30),
	@colonia VARCHAR(30), 
	@no_interior VARCHAR(10),
	@no_exterior VARCHAR(10), 
	@alcaldia VARCHAR(30), 
	@codigo_postal INT
AS
BEGIN
	INSERT INTO puntos_venta VALUES(@cve_pto, @pto_vta, @calle, @colonia, @no_interior, @no_exterior, @alcaldia, @codigo_postal, 1);
END	

--TRUNCATE TABLE PUNTOS_VENTA;
--select * from puntos_venta;


-- Consultar
CREATE PROCEDURE sp_Consulta_ptovta @estatus INT
AS
BEGIN
	IF @estatus = 0 or @estatus = 1
	BEGIN
		SELECT cve_pto, pto_vta, calle, colonia, no_interior, no_exterior, alcaldia, codigo_postal, estatus
			FROM puntos_venta
			WHERE estatus = @estatus
			ORDER BY estatus ASC;
	END
	ELSE
	BEGIN
		SELECT cve_pto, pto_vta, calle, colonia, no_interior, no_exterior, alcaldia, codigo_postal, estatus 
			FROM puntos_venta
			ORDER BY estatus ASC;
	END
END	
EXEC sp_Consulta_ptovta 2


-- <<<<<<<<<<<<<<<<<<<< TIPO EMPLEADO <<<<<<<<<<<<<<<<<<<< 
-- Registrar
CREATE PROCEDURE sp_Registro_tipo_empleado 
	@empleado VARCHAR(2), 
	@descripcion VARCHAR(15),
	@dias_trabajo VARCHAR(20), 
	@sueldo_quincenal FLOAT
AS
BEGIN
	INSERT INTO tipo_empleado VALUES(@empleado, @descripcion, @dias_trabajo, @sueldo_quincenal, 1);
END	


-- Consultar
CREATE PROCEDURE sp_Consulta_tipo_empleado @estatus INT
AS
BEGIN
	SELECT  clasificacion, dias_trabajo, sueldo_quincenal
		FROM tipo_empleado
		WHERE estatus = @estatus
		ORDER BY empleado ASC;
END	
EXEC sp_Consulta_tipo_empleado 1


-- <<<<<<<<<<<<<<<<<<<< EMPLEADO <<<<<<<<<<<<<<<<<<<< 

-- Registrar
CREATE PROCEDURE sp_Registro_empleado 
	@rfc_empleado VARCHAR(13),
	@empleado VARCHAR(2),
	@contrasenia VARCHAR(20),
	@nombre VARCHAR(20),
	@apellido_p VARCHAR(20),
	@apellido_m VARCHAR(20),
	@calle VARCHAR(30),
	@colonia VARCHAR(30),
	@no_interior VARCHAR(10), /*Mz-int*/
	@no_exterior VARCHAR(10), /*Lt-ext*/
	@alcaldia VARCHAR(30),
	@codigo_postal INT,
	@telefono INT,
	@edad INT,
	@sexo CHAR(1),
	@hora_entrada TIME,
	@hora_salida TIME

AS
BEGIN
	INSERT INTO empleado VALUES(@rfc_empleado, @empleado, @contrasenia, @nombre, @apellido_p, @apellido_m, @calle, @colonia, 
	@no_interior, @no_exterior, @alcaldia, @codigo_postal, @telefono, @edad, @sexo, @hora_entrada, @hora_salida, 1);
END	


-- Consultar
CREATE PROCEDURE sp_Consulta_empleado @estatus INT
AS
BEGIN
	SELECT  rfc_empleado, empleado, contrasenia, nombre, apellido_p, apellido_m, calle, colonia, no_interior, no_exterior, 
	alcaldia, codigo_postal, telefono, edad, sexo, hora_entrada, hora_salida
		FROM empleado
		WHERE estatus = @estatus
		ORDER BY apellido_p ASC;
END	
EXEC sp_Consulta_empleado 1