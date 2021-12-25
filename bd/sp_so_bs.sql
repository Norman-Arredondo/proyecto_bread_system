USE so_bs;

-- <<<<<<<<<<<<<<<<<<<< PUNTO DE VENTA <<<<<<<<<<<<<<<<<<<< 
-- Registrar
CREATE PROCEDURE sp_Registro_ptovta 
	@cve_pto VARCHAR(10), 
	@pto_vta VARCHAR(30), 
	@calle VARCHAR(50),
	@colonia VARCHAR(50), 
	@no_interior VARCHAR(15),
	@no_exterior VARCHAR(15), 
	@alcaldia VARCHAR(50), 
	@codigo_postal INT
AS
BEGIN
	INSERT INTO puntos_venta VALUES(@cve_pto, @pto_vta, @calle, @colonia, @no_interior, @no_exterior, @alcaldia, @codigo_postal, 1);
END	

-- Consultar
CREATE PROCEDURE sp_Consulta_ptovta @estatus INT
AS
BEGIN
	IF @estatus = 0 or @estatus = 1
	BEGIN
		SELECT cve_pto, pto_vta, calle, colonia, no_interior, no_exterior, alcaldia, codigo_postal, estatus
			FROM puntos_venta
			WHERE estatus = @estatus
			ORDER BY cve_pto ASC;
	END
	ELSE
	BEGIN
		SELECT cve_pto, pto_vta, calle, colonia, no_interior, no_exterior, alcaldia, codigo_postal, estatus 
			FROM puntos_venta
			ORDER BY cve_pto ASC;
	END
END	
EXEC sp_Consulta_ptovta 2

-- Cambiar estatus
CREATE PROCEDURE sp_CamEst_ptovta @cve_pto VARCHAR(10), @estatus INT
AS
BEGIN
	UPDATE puntos_venta SET estatus = @estatus 
		WHERE cve_pto = @cve_pto;
END	
EXEC sp_CamEst_ptovta 'PTO-00001', 1

-- Modificar
CREATE PROCEDURE sp_Modificar_ptovta
	@cve_pto VARCHAR(10), 
	@pto_vta VARCHAR(30), 
	@calle VARCHAR(50),
	@colonia VARCHAR(50), 
	@no_interior VARCHAR(15),
	@no_exterior VARCHAR(15), 
	@alcaldia VARCHAR(50), 
	@codigo_postal INT
AS
BEGIN
	UPDATE puntos_venta SET
		pto_vta = @pto_vta,
		calle = @calle,
		colonia = @colonia,
		no_interior = @no_interior,
		no_exterior = @no_exterior,
		alcaldia = @alcaldia,
		codigo_postal = @codigo_postal
		WHERE cve_pto = @cve_pto;
END



-- <<<<<<<<<<<<<<<<<<<< TIPO EMPLEADO <<<<<<<<<<<<<<<<<<<< 
-- Registrar
CREATE PROCEDURE sp_Registro_Tipo_Empleado
	@id_tipo_empleado VARCHAR(10), 
	@puesto VARCHAR(30),
	@dias_trabajo VARCHAR(25), 
	@sueldo_quincenal FLOAT
AS
BEGIN
	INSERT INTO Tipo_Empleado VALUES(@id_tipo_empleado, @puesto, @dias_trabajo, @sueldo_quincenal, 1);
END	

-- Consultar
CREATE PROCEDURE sp_Consulta_Tipo_Empleado @estatus INT
AS
BEGIN
	IF @estatus = 0 or @estatus = 1
	BEGIN
		SELECT  id_tipo_empleado, puesto, dias_trabajo, sueldo_quincenal, estatus
			FROM Tipo_Empleado
			WHERE estatus = @estatus
			ORDER BY id_tipo_empleado ASC;
	END
	ELSE
	BEGIN
		SELECT  id_tipo_empleado, puesto, dias_trabajo, sueldo_quincenal, estatus
			FROM Tipo_Empleado
			ORDER BY id_tipo_empleado ASC;
	END
END	
EXEC sp_Consulta_Tipo_Empleado 2

-- Cambiar estatus
CREATE PROCEDURE sp_CamEst_Tipo_Empleado @id_tipo_empleado VARCHAR(10), @estatus INT
AS
BEGIN
	UPDATE Tipo_Empleado SET estatus = @estatus 
		WHERE id_tipo_empleado = @id_tipo_empleado;
END	
EXEC sp_CamEst_Tipo_Empleado 'ITE-00001', 0

-- Modificar
CREATE PROCEDURE sp_Modificar_Tipo_Empleado
	@id_tipo_empleado VARCHAR(10), 
	@puesto VARCHAR(30),
	@dias_trabajo VARCHAR(25), 
	@sueldo_quincenal FLOAT
AS
BEGIN
	UPDATE Tipo_Empleado SET
		puesto = @puesto,
		dias_trabajo = @dias_trabajo,
		sueldo_quincenal = @sueldo_quincenal
		WHERE id_tipo_empleado = @id_tipo_empleado;
END