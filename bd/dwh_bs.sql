CREATE DATABASE dwh_bs;
USE dwh_bs;

CREATE TABLE dim_tiempo(
	fecha DATE,
	anio INT,
	mes INT,
	dia INT,
	CONSTRAINT dim_tiempo_pk PRIMARY KEY (fecha)
);

CREATE TABLE dim_pto_vta(
	cve_pto VARCHAR(10), /*Ejemplo: PTO-00001*/
	pto_vta VARCHAR(30),
	calle VARCHAR(50),
	colonia VARCHAR(50),
	no_interior VARCHAR(15),
	no_exterior VARCHAR(15),
	alcaldia VARCHAR(50),
	codigo_postal INT,
	CONSTRAINT dim_pto_vta_pk PRIMARY KEY (cve_pto)
);

CREATE TABLE dim_empleado(
	rfc_empleado VARCHAR(13),
	puesto VARCHAR(30),
	nombre VARCHAR(80),
	telefono VARCHAR(10),
	edad INT,
	sexo CHAR(1),
	dias_trabajo VARCHAR(25),
	sueldo FLOAT,
	CONSTRAINT dim_empleado_pk PRIMARY KEY (rfc_empleado)
);

CREATE TABLE dim_productos(
	id_produccion VARCHAR(10), /*Ejemplo: PRD-00001*/
	fecha DATE,
	rfc_empleado VARCHAR(13),
	pan VARCHAR(50),
	piezas_producidas INT,
	importe_mp FLOAT,
	importe_insumos FLOAT,
	CONSTRAINT dim_producto_pk PRIMARY KEY (id_produccion, fecha)
);

CREATE TABLE hechos_ventas(
	cve_vta VARCHAR(10), /*Ejemplo: VTA-00001*/
	cve_pto VARCHAR(10), /*Ejemplo: PTO-00001*/
	id_produccion VARCHAR(10), /*Ejemplo: PRD-00001*/
	fecha DATE,
	rfc_empleado VARCHAR(13),
	piezas_vendidas INT,
	precio_unitario FLOAT,
	importe_vta FLOAT,
	gastos FLOAT,
	CONSTRAINT hechos_ventas_pk PRIMARY KEY (cve_vta, cve_pto, id_produccion),
	CONSTRAINT hv_dt_fk FOREIGN KEY (fecha) REFERENCES dim_tiempo(fecha),
	CONSTRAINT hv_dpv_fk FOREIGN KEY (cve_pto) REFERENCES dim_pto_vta(cve_pto),
	CONSTRAINT hv_de_fk FOREIGN KEY (rfc_empleado) REFERENCES dim_empleado(rfc_empleado),
	CONSTRAINT hv_dp_fk FOREIGN KEY (id_produccion,fecha) REFERENCES dim_productos(id_produccion, fecha),
);