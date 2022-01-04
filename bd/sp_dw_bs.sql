USE dwh_bs;

select * from hechos_ventas;
--historico
CREATE PROCEDURE sp_HechosVentas
AS
BEGIN
	SELECT cve_vta, cve_pto, id_produccion, CAST (fecha AS varchar) as fecha, rfc_empleado, piezas_vendidas, precio_unitario, importe_vta
		FROM hechos_ventas
END
EXEC sp_HechosVentas

