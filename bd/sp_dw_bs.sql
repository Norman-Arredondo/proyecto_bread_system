USE dwh_bs;

-- Historico
CREATE PROCEDURE sp_HechosVentas
AS
BEGIN
	SELECT cve_vta, cve_pto, id_produccion, CAST (fecha AS varchar) as fecha, rfc_empleado, piezas_vendidas, precio_unitario, importe_vta
		FROM hechos_ventas
END
EXEC sp_HechosVentas




-- Tablero de control
CREATE PROCEDURE sp_TotalVentasAnio
AS
BEGIN
	SELECT SUM(importe_vta) as monto_total
		FROM hechos_ventas 
		Where YEAR(fecha) = '' + YEAR(GETDATE()) + ''
END

CREATE PROCEDURE sp_PuntoMasVentas
AS
	declare @mesactual int;
		SET @mesactual = MONTH(GETDATE());
	declare @anioactual int;
		SET @anioactual = YEAR(GETDATE());
BEGIN
	IF NOT EXISTS(
		SELECT * FROM dim_tiempo 
			WHERE MONTH(fecha) = CAST(@mesactual as varchar) 
			AND YEAR(fecha) = CAST(@anioactual as varchar)
	)
	BEGIN
		SET @mesactual = @mesactual-1;
	END
	 
	/*IF(@mesactual = '1') 
	BEGIN
		set @mesactual = '12';
		set @anioactual = @anioactual-1;
	END*/

	SELECT TOP 1 dim_pto_vta.pto_vta, COUNT(hechos_ventas.cve_vta) 'Num Ventas'
		FROM hechos_ventas JOIN dim_pto_vta ON hechos_ventas.cve_pto = dim_pto_vta.cve_pto
		WHERE MONTH(hechos_ventas.fecha) = CAST((@mesactual) as varchar) 
		AND YEAR(hechos_ventas.fecha) = CAST(@anioactual as varchar)
		GROUP BY dim_pto_vta.pto_vta
		ORDER BY COUNT(hechos_ventas.cve_vta) DESC;
END

CREATE PROCEDURE sp_PanMasVendido
AS
	declare @mesactual int;
		SET @mesactual = MONTH(GETDATE());
	declare @anioactual int;
		SET @anioactual = YEAR(GETDATE());
BEGIN
	IF NOT EXISTS(
		SELECT * FROM dim_tiempo 
			WHERE MONTH(fecha) = CAST(@mesactual as varchar) 
			AND YEAR(fecha) = CAST(@anioactual as varchar)
	)
	BEGIN
		SET @mesactual = @mesactual-1;
	END
	 
	/*IF(@mesactual = '1')
	BEGIN
		set @mesactual = '12';
		set @anioactual = @anioactual-1;
	END*/

	SELECT TOP 1 dim_productos.pan, SUM(hechos_ventas.piezas_vendidas) 'Num Ventas'
		FROM hechos_ventas JOIN dim_productos ON hechos_ventas.id_produccion = dim_productos.id_produccion
		WHERE MONTH(hechos_ventas.fecha) = CAST((@mesactual) as varchar) 
		AND YEAR(hechos_ventas.fecha) = CAST(@anioactual as varchar)
		GROUP BY dim_productos.pan
		ORDER BY SUM(hechos_ventas.piezas_vendidas) DESC;
END

CREATE PROCEDURE sp_IngresosMes @mes int
AS
BEGIN
	Select SUM(hechos_ventas.importe_vta) Total
		FROM hechos_ventas
		WHERE MONTH(hechos_ventas.fecha) = @mes and YEAR(hechos_ventas.fecha) = YEAR(GETDATE())
END

CREATE PROCEDURE sp_PanTienda @sucursal varchar(30)
AS
	declare @mes int;
		set @mes = MONTH(GETDATE());
	declare @anio int;
		set @anio = YEAR(GETDATE());
BEGIN
	/*IF(@mes = '1')
	BEGIN
		set @mes = '12';
		set @anio = @anio-1;
	END*/

	Select DISTINCT dim_productos.pan Pan
		FROM dim_productos JOIN hechos_ventas ON dim_productos.id_produccion = hechos_ventas.id_produccion
		JOIN dim_pto_vta ON dim_pto_vta.cve_pto = hechos_ventas.cve_pto
		WHERE dim_pto_vta.pto_vta = @sucursal
		AND YEAR(hechos_ventas.fecha) = @anio;
END
EXEC sp_PanTienda 'Matriz'

CREATE PROCEDURE sp_VentasProductoTienda @sucursal varchar(30), @producto varchar (20)
AS
	declare @mes int;
		set @mes = MONTH(GETDATE());
	declare @anio int;
		set @anio = YEAR(GETDATE());
BEGIN
	/*IF(@mes = '1')
	BEGIN
		set @mes = '12';
		set @anio = @anio-1;
	END*/
	
	Select SUM(hechos_ventas.piezas_vendidas) Cantidad
		FROM hechos_ventas JOIN dim_productos ON dim_productos.id_produccion = hechos_ventas.id_produccion
		JOIN dim_pto_vta ON dim_pto_vta.cve_pto = hechos_ventas.cve_pto
		WHERE dim_pto_vta.pto_vta = @sucursal
		AND dim_productos.pan = @producto
		AND YEAR(hechos_ventas.fecha) = @anio;
END
