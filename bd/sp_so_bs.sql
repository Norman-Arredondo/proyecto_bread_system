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

-- Cambiar estatus
CREATE PROCEDURE sp_CamEst_ptovta @cve_pto VARCHAR(10), @estatus INT
AS
BEGIN
	UPDATE puntos_venta SET estatus = @estatus 
		WHERE cve_pto = @cve_pto;
END	

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





-- <<<<<<<<<<<<<<<<<<<< EMPLEADO <<<<<<<<<<<<<<<<<<<< 
-- Registrar
CREATE PROCEDURE sp_Registro_Empleado 
	@rfc_empleado VARCHAR(13),
	@id_tipo_empleado VARCHAR(10),
	@contrasenia VARCHAR(60),
	@hora_entrada TIME,
	@hora_salida TIME,
	@nombre VARCHAR(50),
	@apellido_p VARCHAR(50),
	@apellido_m VARCHAR(50),
	@telefono VARCHAR(10),
	@edad INT,
	@sexo CHAR(1),
	@calle VARCHAR(50),
	@colonia VARCHAR(50),
	@no_interior VARCHAR(15), /*Mz-int*/
	@no_exterior VARCHAR(15), /*Lt-ext*/
	@alcaldia VARCHAR(50),
	@codigo_postal INT
AS
BEGIN
	INSERT INTO Empleado VALUES(@rfc_empleado, @id_tipo_empleado, @contrasenia, @hora_entrada, @hora_salida, @nombre, 
	@apellido_p, @apellido_m, @telefono, @edad, @sexo, @calle, @colonia, @no_interior, @no_exterior, @alcaldia, @codigo_postal, 1);
END	

-- Consultar
CREATE PROCEDURE sp_Consulta_Empleado @estatus INT
AS
BEGIN
	IF @estatus = 0 or @estatus = 1
	BEGIN
		SELECT  rfc_empleado, te.puesto, contrasenia, FORMAT(cast(hora_entrada as time), N'hh.mm') hora_entrada, FORMAT(cast(hora_salida as time), N'hh.mm') hora_salida,
				nombre, apellido_p, apellido_m, telefono, edad, sexo,
				calle, colonia, no_interior, no_exterior, alcaldia, codigo_postal, e.estatus
			FROM Empleado e JOIN Tipo_Empleado te ON te.id_tipo_empleado = e.id_tipo_empleado
			WHERE e.estatus = @estatus
			ORDER BY rfc_empleado ASC;
	END
	ELSE
	BEGIN
		SELECT  rfc_empleado, te.puesto, contrasenia, FORMAT(cast(hora_entrada as time), N'hh\:mm') hora_entrada, FORMAT(cast(hora_salida as time), N'hh\:mm') hora_salida,
				nombre, apellido_p, apellido_m, telefono, edad, sexo,
				calle, colonia, no_interior, no_exterior, alcaldia, codigo_postal, e.estatus
			FROM Empleado e JOIN Tipo_Empleado te ON te.id_tipo_empleado = e.id_tipo_empleado
			ORDER BY rfc_empleado ASC;
	END
END	

-- Cambiar estatus
CREATE PROCEDURE sp_CamEst_Empleado @rfc_empleado VARCHAR(13), @estatus INT
AS
BEGIN
	UPDATE Empleado SET estatus = @estatus 
		WHERE rfc_empleado = @rfc_empleado;
END	

-- Modificar 
CREATE PROCEDURE sp_Modificar_Empleado 
	@rfc_empleado VARCHAR(13),
	@id_tipo_empleado VARCHAR(10),
	@contrasenia VARCHAR(60),
	@hora_entrada TIME,
	@hora_salida TIME,
	@nombre VARCHAR(50),
	@apellido_p VARCHAR(50),
	@apellido_m VARCHAR(50),
	@telefono VARCHAR(10),
	@edad INT,
	@sexo CHAR(1),
	@calle VARCHAR(50),
	@colonia VARCHAR(50),
	@no_interior VARCHAR(15), /*Mz-int*/
	@no_exterior VARCHAR(15), /*Lt-ext*/
	@alcaldia VARCHAR(50),
	@codigo_postal INT
AS
BEGIN
	UPDATE Empleado set  
		id_tipo_empleado = @id_tipo_empleado, 
		contrasenia = @contrasenia, 
		hora_entrada = @hora_entrada, 
		hora_salida = @hora_salida,
		nombre = @nombre, 
		apellido_p = @apellido_p, 
		apellido_m = @apellido_m, 
		telefono = @telefono, 
		edad = @edad, 
		sexo = @sexo, 
		calle = @calle, 
		colonia = @colonia, 
		no_interior = @no_interior, 
		no_exterior = @no_exterior, 
		alcaldia = @alcaldia, 
		codigo_postal = @codigo_postal
		where rfc_empleado = @rfc_empleado;
END	

-- Combo TIPO EMPLEADO (Vista empleado)
CREATE PROCEDURE sp_Combo_Empleado
AS
BEGIN
	SELECT id_tipo_empleado, puesto FROM tipo_empleado;
END





-- <<<<<<<<<<<<<<<<<<<< INDEX <<<<<<<<<<<<<<<<<<<< 
-- Consultar
CREATE PROCEDURE sp_Consulta_Contrasenia @rfc_empleado VARCHAR(13), @Contrasenia VARCHAR(60)
AS
BEGIN
	SELECT  contrasenia, estatus
			FROM Empleado
			WHERE rfc_empleado = @rfc_empleado
END





-- <<<<<<<<<<<<<<<<<<<< MATERIA PRIMA <<<<<<<<<<<<<<<<<<<< 
-- Registrar
CREATE PROCEDURE sp_Registro_MateriaPrima 
	@nombre_mp VARCHAR(50),
	@existencia INT, 
	@stock_minimo INT,
	@stock_maximo INT,
	@fecha_compra DATE,
	@cantidad FLOAT,
	@unidad VARCHAR(10), 
	@contenido_neto FLOAT,
	@precio_unitario FLOAT,
	@precio_total FLOAT
AS
BEGIN
	IF EXISTS (SELECT existencia FROM materia_prima WHERE nombre_mp = @nombre_mp)
	BEGIN
		INSERT INTO compras_mp VALUES(@nombre_mp, @fecha_compra, @cantidad, @unidad, @contenido_neto, @precio_unitario, @precio_total, 1);
		SET @existencia = (SELECT SUM(cantidad) FROM compras_mp WHERE nombre_mp = @nombre_mp);
		UPDATE materia_prima SET existencia = @existencia WHERE nombre_mp = @nombre_mp;
	END
	ELSE
	BEGIN
		INSERT INTO materia_prima VALUES(@nombre_mp, @existencia, @stock_minimo, @stock_maximo, 1);
		INSERT INTO compras_mp VALUES(@nombre_mp, @fecha_compra, @cantidad, @unidad, @contenido_neto, @precio_unitario, @precio_total, 1);
	END
END	

-- Cosultar Materia Prima (tabla principal)
CREATE PROCEDURE sp_Consulta_MP @estatus INT
AS
BEGIN
	IF @estatus = 0 or @estatus = 1
	BEGIN
		SELECT nombre_mp, existencia, stock_minimo, stock_maximo, estatus
				FROM materia_prima WHERE estatus = @estatus;
	END
	ELSE
	BEGIN
		SELECT nombre_mp, existencia, stock_minimo, stock_maximo, estatus
				FROM materia_prima;
	END
END

-- Consultar Materia Prima (modal editar materia prima)
CREATE PROCEDURE sp_Consulta_Materia_Prima @nombre_mp VARCHAR(50)
AS
BEGIN
	IF EXISTS (SELECT existencia FROM materia_prima WHERE nombre_mp = @nombre_mp)
	BEGIN
		SELECT existencia, stock_minimo, stock_maximo, estatus
			FROM materia_prima WHERE nombre_mp = @nombre_mp;
	END
	ELSE
	BEGIN
		PRINT 'Información no encontrada';
	END
END	

-- Consultar Compras (Modal)
CREATE PROCEDURE sp_Consulta_Compras_MP @nombre_mp VARCHAR(50)
AS
BEGIN
	IF EXISTS (SELECT existencia FROM materia_prima WHERE nombre_mp = @nombre_mp)
	BEGIN
		SELECT fecha_compra, cantidad, unidad, contenido_neto, precio_unitario, precio_total, estatus
			FROM compras_mp WHERE nombre_mp = @nombre_mp;
	END
	ELSE
	BEGIN
		PRINT 'Información no encontrada';
	END
END	

-- Cambiar estatus materia prima
CREATE PROCEDURE sp_CamEst_MP @nombre_mp VARCHAR(50), @estatus INT
AS
BEGIN
	UPDATE materia_prima SET estatus = @estatus 
		WHERE nombre_mp = @nombre_mp;
END	

-- Cambiar estatus compras
CREATE PROCEDURE sp_CamEst_CMP @nombre_mp VARCHAR(50),@fecha_compra DATE, @estatus INT
AS
BEGIN
	UPDATE compras_mp SET estatus = @estatus 
		WHERE nombre_mp = @nombre_mp AND fecha_compra = @fecha_compra;
END

-- Modificar 
CREATE PROCEDURE sp_Modificar_Materia_Prima
	@nombre_mp VARCHAR(50),
	@stock_minimo INT,
	@stock_maximo INT
AS
BEGIN
	UPDATE materia_prima SET  
		stock_minimo = @stock_minimo,
		stock_maximo = @stock_maximo
		WHERE nombre_mp = @nombre_mp;
END	

-- Modificar compra
CREATE PROCEDURE sp_Modificar_CompraMP
	@nombre_mp VARCHAR(50),
	@fecha_compra DATE,
	@cantidad FLOAT,
	@unidad VARCHAR(10), 
	@contenido_neto FLOAT,
	@precio_unitario FLOAT,
	@precio_total FLOAT
AS
BEGIN
	UPDATE compras_mp SET  
		cantidad = @cantidad,
		unidad = @unidad,
		contenido_neto = @contenido_neto,
		precio_unitario = @precio_unitario,
		precio_total = @precio_total
		WHERE nombre_mp = @nombre_mp AND fecha_compra = @fecha_compra;
	
	UPDATE materia_prima SET existencia = (SELECT SUM(cantidad) FROM compras_mp WHERE nombre_mp = @nombre_mp)
		WHERE nombre_mp = @nombre_mp;
END	





-- <<<<<<<<<<<<<<<<<<<< RECETARIO <<<<<<<<<<<<<<<<<<<< 
-- Registrar pan
CREATE PROCEDURE sp_Registro_pan
	@pan VARCHAR(50),
	@descripcion VARCHAR(80),
	@piezas INT
AS
BEGIN
	INSERT INTO catalogo VALUES(@pan, @descripcion, @piezas, 1);
END	

-- Registrar receta
CREATE PROCEDURE sp_Registro_receta
	@pan VARCHAR(50),
	@nombre_mp VARCHAR(50),
	@cantidad FLOAT,
	@unidad VARCHAR(10)
AS
BEGIN
	INSERT INTO recetario VALUES(@pan, @nombre_mp, @cantidad, @unidad, 1);
END

-- Consultar pan
CREATE PROCEDURE sp_Consulta_pan @estatus INT
AS
BEGIN
	IF @estatus = 0 or @estatus = 1
	BEGIN
		SELECT pan, descripcion, piezas, estatus
			FROM Catalogo WHERE estatus = @estatus
			ORDER BY pan;
	END
	ELSE
	BEGIN
		SELECT pan, descripcion, piezas, estatus
			FROM Catalogo
			ORDER BY pan;
	END
END	

-- Cambiar estatus catálogo
CREATE PROCEDURE sp_CamEst_Catalogo @pan VARCHAR(50), @estatus INT
AS
BEGIN
	UPDATE catalogo SET estatus = @estatus 
		WHERE pan = @pan;
END	

-- Modificar catalogo
CREATE PROCEDURE sp_Modificar_Catalogo
	@pan VARCHAR(50),
	@descripcion VARCHAR(80),
	@piezas INT
AS
BEGIN
	UPDATE catalogo SET  
		descripcion = @descripcion,
		piezas = @piezas
		WHERE pan = @pan;
END	

-- Consultar (modal editar catalogo)
CREATE PROCEDURE sp_Consulta_Receta @pan VARCHAR(50)
AS
BEGIN
	SELECT nombre_mp, cantidad, unidad, estatus
		FROM recetario WHERE pan = @pan;
END	

-- Eliminar ingrediente
CREATE PROCEDURE sp_Eliminar_Ingrediente @pan VARCHAR(50), @nombre_mp VARCHAR(50)
AS
BEGIN
	DELETE FROM recetario
		WHERE pan = @pan AND nombre_mp = @nombre_mp;
END	

-- Modificar recetario
CREATE PROCEDURE sp_Modificar_Recetario
	@pan VARCHAR(50),
	@nombre_mp VARCHAR(50),
	@cantidad FLOAT,
	@unidad VARCHAR(10)
AS
BEGIN
	IF EXISTS (SELECT cantidad FROM recetario WHERE pan = @pan AND nombre_mp = @nombre_mp)
	BEGIN
		UPDATE recetario SET  
			cantidad = @cantidad,
			unidad = @unidad
			WHERE pan = @pan AND nombre_mp = @nombre_mp;
	END
	ELSE
	BEGIN
		INSERT INTO recetario VALUES (@pan, @nombre_mp, @cantidad, @unidad, 1);
	END
END	





-- <<<<<<<<<<<<<<<<<<<< PRODUCCIÓN <<<<<<<<<<<<<<<<<<<< 
-- Registrar
-- Calcular porciones
BEGIN TRANSACTION
CREATE PROCEDURE sp_Calcular_Porciones @pan VARCHAR(50), @porciones INT
AS
BEGIN
	DECLARE @ingrediente VARCHAR(50),
			@cantidad INT,
			@unidad VARCHAR(10),
			-- variables auxilliares
			@porciones_base INT,
			@registros INT,
			@cont_mp INT,
			@cont_cant INT;
			
	SET @porciones_base = (SELECT piezas FROM catalogo WHERE pan = @pan);
	SET @registros = (SELECT COUNT(nombre_mp)FROM recetario WHERE pan = @pan);
	SET @cont_mp = 1;
	SET @cont_cant = 1;

	CREATE TABLE #TempTable(ingrediente VARCHAR(50), cantidad INT, unidad VARCHAR(10));

	DECLARE micursor CURSOR FOR SELECT nombre_mp FROM recetario WHERE pan = @pan
	OPEN micursor
		FETCH NEXT FROM micursor INTO @ingrediente
		WHILE @@FETCH_STATUS = 0
		BEGIN
			SET @cantidad = (((SELECT cantidad FROM recetario WHERE pan = @pan AND nombre_mp = @ingrediente) * @porciones) / @porciones_base);
			SET @unidad = (SELECT unidad FROM recetario WHERE pan = @pan AND nombre_mp = @ingrediente);

			INSERT INTO #TempTable VALUES (@ingrediente, @cantidad, @unidad);

			FETCH NEXT FROM micursor INTO @ingrediente
		END
		CLOSE micursor
	DEALLOCATE micursor

	SELECT * FROM #TempTable;
	DROP TABLE #TempTable;
END

EXEC sp_Calcular_Porciones 'Multi', 10;