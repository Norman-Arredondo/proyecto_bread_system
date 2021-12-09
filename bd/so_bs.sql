CREATE DATABASE so_bs;

USE so_bs;

-- >>>>> MODULO EMPLEADOS <<<<<
CREATE TABLE Tipo_Empleado(
	id_tipo_empleado VARCHAR(10), /*Ejemplo: ITE-00001*/
	puesto VARCHAR(30),
	dias_trabajo VARCHAR(20),
	sueldo_quincenal FLOAT,
	estatus BIT NOT NULL,
	CONSTRAINT so_tipo_empleado_pk PRIMARY KEY (id_tipo_empleado)
);

CREATE TABLE Empleado(
	rfc_empleado VARCHAR(13),	
	id_tipo_empleado VARCHAR(10), /*Ejemplo: ITE-00001*/
	contrasenia VARCHAR(20),
	hora_entrada TIME,
	hora_salida TIME,
	nombre VARCHAR(50),
	apellido_p VARCHAR(50),
	apellido_m VARCHAR(50),
	telefono INT,
	edad INT,
	sexo CHAR(1),
	calle VARCHAR(50),
	colonia VARCHAR(50),
	no_interior VARCHAR(15),
	no_exterior VARCHAR(15),
	alcaldia VARCHAR(50),
	codigo_postal INT,
	estatus BIT NOT NULL,
	CONSTRAINT so_empleado_pk PRIMARY KEY (rfc_empleado),
	CONSTRAINT so_empleado_tipo_empleado_fk FOREIGN KEY (id_tipo_empleado) REFERENCES tipo_empleado(id_tipo_empleado)
);


-- >>>>> MODULO MATERIA PRIMA <<<<<
CREATE TABLE materia_prima(
	nombre_mp VARCHAR(50),
	existencia INT,
	stock_minimo INT,
	stock_maximo INT,
	estatus BIT NOT NULL,
	CONSTRAINT so_materia_prima_pk PRIMARY KEY (nombre_mp)
);

CREATE TABLE compras_mp(
	nombre_mp VARCHAR(50),
	fecha_compra DATE,
	cantidad FLOAT,
	unidad VARCHAR(10), 
	contenido_neto FLOAT,
	precio_unitario FLOAT,
	precio_total FLOAT,
	estatus BIT NOT NULL,
	CONSTRAINT so_compras_mp_pk PRIMARY KEY (nombre_mp),
	CONSTRAINT so_mp_compras_mp_fk FOREIGN KEY (nombre_mp) REFERENCES materia_prima(nombre_mp)
);


-- >>>>> MODULO RECETARIO <<<<<
CREATE TABLE catalogo(
	pan VARCHAR(50),
	descripcion VARCHAR(80),
	piezas INT,
	estatus BIT NOT NULL,
	CONSTRAINT so_catalogo_pk PRIMARY KEY (pan)
);


CREATE TABLE recetario(
	pan VARCHAR(50),
	nombre_mp VARCHAR(50),
	cantidad FLOAT,
	unidad VARCHAR(10),
	estatus BIT NOT NULL,
	CONSTRAINT so_recetario_pk PRIMARY KEY (pan),
	CONSTRAINT so_recetario_catalogo_fk FOREIGN KEY (pan) REFERENCES catalogo(pan),
	CONSTRAINT so_recetario_materia_prima_fk FOREIGN KEY (nombre_mp) REFERENCES materia_prima(nombre_mp)
);

-- >>>>> MODULO PRODUCCIÓN <<<<<
CREATE TABLE insumo(
	id_insumo VARCHAR(10), /*Ejemplo: INS-00001*/
	fecha_insumo DATE,
	importe_gas FLOAT,
	importe_luz FLOAT,
	importe_gasolina FLOAT,
	importe_total FLOAT,
	estatus BIT NOT NULL,
	CONSTRAINT so_insumos_pk PRIMARY KEY (id_insumo)
);

CREATE TABLE produccion(
	id_produccion VARCHAR(10), /*Ejemplo: PRD-00001*/
	fecha_produccion DATE,
	rfc_empleado VARCHAR(13),
	pan VARCHAR(50),
	no_piezas INT,
	id_insumo  VARCHAR(10), /*Ejemplo: INS-00001*/
	porcentaje_ganancia FLOAT,
	precio_venta FLOAT,
	estatus BIT NOT NULL,
	CONSTRAINT so_produccion_pk PRIMARY KEY (id_produccion),
	CONSTRAINT so_empleado_produccion_fk FOREIGN KEY (rfc_empleado) REFERENCES empleado(rfc_empleado),
	CONSTRAINT so_pan_produccion_fk FOREIGN KEY (pan) REFERENCES catalogo(pan),
	CONSTRAINT so_pan_insumo_fk FOREIGN KEY (id_insumo) REFERENCES insumo(id_insumo)
);

CREATE TABLE mp_produccion(
	id_produccion VARCHAR(10), /*Ejemplo: PRD-00001*/
	id_mp_produccion VARCHAR(10), /*Ejemplo: MPP-00001*/
	nombre_mp VARCHAR(50),
	catidad FLOAT,
	unidad VARCHAR(10), 
	costo_proporcional FLOAT,
	estatus BIT NOT NULL,
	CONSTRAINT so_mp_produccion_pk PRIMARY KEY (id_produccion, id_mp_produccion),
	CONSTRAINT so_mp_mp_produccion_fk FOREIGN KEY (nombre_mp) REFERENCES materia_prima(nombre_mp),
	CONSTRAINT so_id_produccion_mp_produccion_fk FOREIGN KEY (id_produccion) REFERENCES produccion(id_produccion)
);


-- >>>>> MODULO PUNTOS DE VENTA <<<<<
CREATE TABLE puntos_venta(
	cve_pto VARCHAR(10), /*Ejemplo: PTO-00001*/
	pto_vta VARCHAR(30),
	calle VARCHAR(50),
	colonia VARCHAR(50),
	no_interior VARCHAR(15),
	no_exterior VARCHAR(15),
	alcaldia VARCHAR(50),
	codigo_postal INT,
	estatus BIT NOT NULL,
	CONSTRAINT so_puntos_venta_pk PRIMARY KEY (cve_pto)
);


-- >>>>> MODULO VENTAS <<<<<
CREATE TABLE venta(
	cve_vta VARCHAR(10), /*Ejemplo: VTA-00001*/
	cve_pto VARCHAR(10), /*Ejemplo: PTO-00001*/
	fecha DATE,
	gastos FLOAT,
	importe_venta FLOAT,
	rfc_empleado VARCHAR(13),
	estatus BIT NOT NULL,
	CONSTRAINT so_venta_pk PRIMARY KEY (cve_vta, cve_pto),
	CONSTRAINT so_venta_puntos_venta_fk FOREIGN KEY (cve_pto) REFERENCES puntos_venta(cve_pto),
	CONSTRAINT so_venta_empleado_fk FOREIGN KEY (rfc_empleado) REFERENCES empleado(rfc_empleado)
);

CREATE TABLE detalle_venta(
	cve_vta VARCHAR(10), /*Ejemplo: VTA-00001*/
	cve_pto VARCHAR(10), /*Ejemplo: PTO-00001*/
	id_produccion VARCHAR(10), /*Ejemplo: PRD-00001*/
	piezas_entregadas INT,
	piezas_devueltas INT,
	estatus BIT NOT NULL,
	CONSTRAINT so_detalle_venta_pk PRIMARY KEY (cve_vta, cve_pto),
	CONSTRAINT so_detalle_venta_venta_fk FOREIGN KEY (cve_vta, cve_pto) REFERENCES venta(cve_vta, cve_pto),
	CONSTRAINT so_detalle_venta_producto_terminado_fk FOREIGN KEY (id_produccion) REFERENCES produccion(id_produccion)
);