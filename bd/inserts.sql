USE so_bs;

-- >>> insert punto_venta <<<
EXEC sp_Registro_ptovta 'PTO-00001', 'Matriz', 'De los Colegios', 'Los Reyes Acozac','11', 'N/A', 'Tecamac', 55755;
EXEC sp_Registro_ptovta 'PTO-00002', 'Centro', 'De los Colegios', 'Los Reyes Acozac','15', 'N/A', 'Tecamac', 55755;
EXEC sp_Registro_ptovta 'PTO-00003', 'Xolox', 'San Marcos', 'San Lucas Xolox','5', 'N/A', 'Tecamac', 55750;
EXEC sp_Registro_ptovta 'PTO-00004', 'Centro Vespertino', 'De los Colegios', 'Los Reyes Acozac','15', 'N/A', 'Tecamac', 55755;

-- >>> cambiar estatus punto_venta <<<
EXEC sp_CamEst_ptovta 'PTO-00002', 0



-- >>> insert Tipo_Empleado <<<
EXEC sp_Registro_Tipo_Empleado 'ITE-00001', 'Administrador', 'Lu Ma Mi Ju Vi Sa Do', 4000.00;
EXEC sp_Registro_Tipo_Empleado 'ITE-00002', 'Panadero', 'Lu Ma Mi Ju Vi', 3000.00;
EXEC sp_Registro_Tipo_Empleado 'ITE-00003', 'Vendedor', 'Lu Ma Mi Ju Vi', 2500.00;
select * from Tipo_Empleado;


-- >>> insert Empleado <<<
--Administrador
EXEC sp_Registro_Empleado 'MACJ860114FA6', 'ITE-00001', 'admin123', '08:00:00', '15:00:00', 'JESSICA', 'MALDONADO', 'CRUZ', 5567894532, 35, 'F', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
--Panaderos
EXEC sp_Registro_Empleado 'RAGF630503EW7', 'ITE-00002', null, '07:00:00', '15:00:00', 'FRANCISCO JAVIER', 'RAMIREZ', 'GONZALEZ', 5512345678, 58, 'H', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755; 
EXEC sp_Registro_Empleado 'HUHL7205233T9', 'ITE-00002', null, '07:00:00', '15:00:00', 'JOSE LUIS', 'HUIZAR', 'HERNÁNDEZ', 5509876543, 49, 'H', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'LIRJ8503054P9', 'ITE-00002', null, '07:00:00', '15:00:00', 'JORGE ALFREDO', 'LIMON', 'RANGEL', 5510293847, 36, 'H', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'PEMD8806025A0', 'ITE-00002', null, '07:00:00', '15:00:00', 'MARTIN', 'CARRILLLO', 'VILLALOBOS', 5567894532, 33, 'H', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'JAGA811030KZ3', 'ITE-00002', null, '07:00:00', '15:00:00', 'ALEXANDRO', 'JÁUREGUI', 'GUTIÉRREZ', 5567894532, 40, 'H', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'BERO760929EN9', 'ITE-00002', null, '07:00:00', '15:00:00', 'OCTAVIO CESAR', 'BECERRA', 'REYES', 5567894532, 45, 'H', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'CAGL741126P17', 'ITE-00002', null, '07:00:00', '15:00:00', 'LUIS ENRIQUE', 'CHÁVEZ', 'GARCÍA', 5567894532, 47, 'H', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'GANM780401I61', 'ITE-00002', null, '07:00:00', '15:00:00', 'MARIO ALBERTO', 'GALARCE', 'NAVA', 5567894532, 43, 'H', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'ROHL6707046D3', 'ITE-00002', null, '07:00:00', '15:00:00', 'LUIS ALBERTO', 'HERNANDEZ', 'ROJANO', 5567894532, 54, 'H', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'AARF900605HZ5', 'ITE-00002', null, '07:00:00', '15:00:00', 'FERNANDO', 'ANAYA', 'ROQUE', 5567894532, 31, 'H', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
--Vendedores
EXEC sp_Registro_Empleado 'CABL860422CQA', 'ITE-00003', null, '07:00:00', '15:00:00', 'LUZ DEL CARMEN', 'CASAS', 'BAROJAS', 5567894532, 35, 'M', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'SODN800819FZ3', 'ITE-00003', null, '15:00:00', '21:00:00', 'NELBA IRIS', 'SOLIS', 'DIAZ', 5567894532, 41, 'M', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'VALC7112087D0', 'ITE-00003', null, '07:00:00', '15:00:00', 'CONCEPCION', 'VAZQUEZ', 'LOPEZ', 5567894532, 50, 'M', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'TOPN840414SMA', 'ITE-00003', null, '15:00:00', '21:00:00', 'NATALY', 'TORNEZ', 'PEREZ', 5567894532, 37, 'M', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'RUSV8503277P1', 'ITE-00003', null, '07:00:00', '15:00:00', 'VERONICA', 'RUMBO', 'SUASTEGUI', 5567894532, 36, 'M', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'CUMF800909ABA', 'ITE-00003', null, '15:00:00', '21:00:00', 'FABIOLA', 'CRUZ', 'MANZANAREZ', 5567894532, 41, 'M', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'GUAE8002218U9', 'ITE-00003', null, '07:00:00', '15:00:00', 'EMELIA CAROLINA', 'GUTIERREZ', 'ADAME', 5567894532, 41, 'M', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'GUAK831206IT1', 'ITE-00003', null, '15:00:00', '21:00:00', 'KARLA JULIETA', 'GUTIERREZ', 'ADAME', 5567894532, 38, 'M', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'SAAL8206303V5', 'ITE-00003', null, '07:00:00', '15:00:00', 'LUCIA', 'SANCHEZ', 'ARELLANO', 5567894532, 39, 'M', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
EXEC sp_Registro_Empleado 'BEBC860114FA6', 'ITE-00003', null, '15:00:00', '21:00:00', 'CINTHYA', 'BERNAL', 'BRAVO', 5567894532, 35, 'M', 'La Palma', 'Los Reyes Acozac', 64, 5, 'Tecamac', 55755;
select * from Empleado;


-- >>> insert materia prima y compras <<<
-- nombre_mp, existencia, stock_minimo, stock_maximo, fecha_compra, 
-- cantidad, unidad, contenido_neto, precio_unitario, precio_total
EXEC sp_Registro_MateriaPrima 'Azucar', 10, 5, 30, '2021-11-01', 10, 'Kg', 10, 27.04,  270.4;
EXEC sp_Registro_MateriaPrima 'Azucar Glass', 10, 5, 15,'2021-11-01', 1, 'kg', 5, 24.40, 122;
EXEC sp_Registro_MateriaPrima 'Anis', 5, 5, 10, '2021-11-01', 5, 'kg', 1, 101, 505;
EXEC sp_Registro_MateriaPrima 'Chispas de chocolate', 1, 2, 5,'2021-11-01', 5, 'kg', 1, 88, 44;
EXEC sp_Registro_MateriaPrima 'Cocoa', 5, 5, 10, '2021-11-08', 1, 'kg', 5, 18.80, 94;
EXEC sp_Registro_MateriaPrima 'Bolsa De Papel #25', 50, 50, 100, '2021-11-08', 1, 'Pieza', 100, 76, 76;;
EXEC sp_Registro_MateriaPrima 'Maizena', 5, 5, 15, '2021-11-08', 1, 'kg', 5, 76, 76;
EXEC sp_Registro_MateriaPrima 'Malta Morisca', 5, 5, 15, '2021-11-08', 1, 'kg', 5, 150, 150;
EXEC sp_Registro_MateriaPrima 'Nuez Pedazo Intermedio', 2, 2, 5, '2021-11-15', 2, 'kg', 1, 240, 480;
EXEC sp_Registro_MateriaPrima 'Bolsa Vites (ROYAL)', 4, 4, 12, '2021-11-15', 1, 'kg', 4, 82, 82;
EXEC sp_Registro_MateriaPrima 'Bulto Mix Chocolate', 10, 20, 40, '2021-11-15', 1, 'kg', 20, 636, 636;
EXEC sp_Registro_MateriaPrima 'Bulto Mix Esponja', 10, 20, 40, '2021-11-15', 1, 'kg', 20, 678, 678;
EXEC sp_Registro_MateriaPrima 'Bulto Mix Vainilla', 10, 20, 40, '2021-11-15', 1, 'kg', 20, 492, 492;
EXEC sp_Registro_MateriaPrima 'Bulto Muffin Vainilla', 10, 20, 40, '2021-11-22', 1, 'kg', 20, 392, 392;
EXEC sp_Registro_MateriaPrima 'Canela molida', 2, 6, 12, '2021-11-22', 1, 'kg', 3, 72, 72;
EXEC sp_Registro_MateriaPrima 'Capacillo Blanco #72', 300, 500, 1000, '2021-11-22', 1, 'Pieza', 500, 37, 37;
EXEC sp_Registro_MateriaPrima 'Capacillo Chino Corrufacil', 500, 500, 1000, '2021-11-22', 1, 'Pieza', 1000, 154, 154;
EXEC sp_Registro_MateriaPrima 'Capacillo Rojo #72', 300, 500, 1000, '2021-11-22', 1, 'Pieza', 500, 37, 37;
EXEC sp_Registro_MateriaPrima 'Chantilli', 5, 5, 20, '2021-11-29', 10, 'kg', 1, 40, 400;
EXEC sp_Registro_MateriaPrima 'Cobertura garfias chocolate', 5, 5, 20, '2021-11-29', 5, 'kg', 1, 32.60, 163;
EXEC sp_Registro_MateriaPrima 'Color amarillo huevo brillapan', 5, 5, 20, '2021-11-29', 5, 'kg', 1, 41, 205;
EXEC sp_Registro_MateriaPrima 'Fresa econopack mangas', 5, 5, 10, '2021-11-29', 1, 'kg', 10, 206, 206;
EXEC sp_Registro_MateriaPrima 'Glasse Fresa', 5, 5, 10,'2021-11-29', 1, 'kg', 10, 164, 164;
EXEC sp_Registro_MateriaPrima 'Glasse Piña', 5, 5, 10,'2021-11-29', 1,'kg', 10, 164, 164;
EXEC sp_Registro_MateriaPrima 'Granilla colores Granimex', 5, 5, 10,'2021-11-29', 3,'kg', 1, 235, 705;
EXEC sp_Registro_MateriaPrima 'Harina grano espiga', 3, 30, 60,'2021-11-29', 1,'kg', 10, 352, 352;
EXEC sp_Registro_MateriaPrima 'Harina Selecta', 440, 880, 1760,'2021-11-29', 10,'kg', 1, 1275, 1275;
EXEC sp_Registro_MateriaPrima 'Huevo', 5, 5, 20, '2021-11-01', 2, 'Kg', 12, 32, 64;
EXEC sp_Registro_MateriaPrima 'Levadura', 5, 5, 20, '2021-11-01', 4, 'g', 450, 58,  232;
EXEC sp_Registro_MateriaPrima 'M Relleno Zarzamora Estrali', 5, 5, 10, '2021-11-01', 5, 'Kg', 1, 95, 475;
EXEC sp_Registro_MateriaPrima 'M. Crema Past. Vainilla Estrali', 5, 5, 10, '2021-11-01', 5, 'Kg', 1, 95, 475;
EXEC sp_Registro_MateriaPrima 'Manteca Tolteca (GRASA)', 24, 24, 48, '2021-11-01', 24, 'Kg', 1, 10, 240;
EXEC sp_Registro_MateriaPrima 'Mantequilla', 5, 5, 20, '2021-11-01', 10, 'Kg', 1, 85, 850;
EXEC sp_Registro_MateriaPrima 'Mejorante Fortilix', 5, 5, 20, '2021-11-01', 10, 'g', 450, 75, 750;
EXEC sp_Registro_MateriaPrima 'Nuez Monchis', 4, 4, 24, '2021-11-01', 4, 'Kg', 1, 230, 920;
EXEC sp_Registro_MateriaPrima 'Pan molido', 5, 10, 40, '2021-11-01', 1, 'Kg', 5, 200, 200;
EXEC sp_Registro_MateriaPrima 'Piña econopack mangas', 5, 10, 20, '2021-11-01', 5, 'Kg', 1, 95, 475;
EXEC sp_Registro_MateriaPrima 'S. Rafmex Mant. Naranja', 4, 4, 24, '2021-11-01', 1, 'Lt', 4.5, 669, 669;
EXEC sp_Registro_MateriaPrima 'Sal Fina', 25, 50, 100, '2021-11-01', 10, 'Kg', 1, 22, 220;
EXEC sp_Registro_MateriaPrima 'Sunset Glaze CL ND', 120, 240, 360, '2021-11-01', 10, 'Lt', 1, 130, 1300;
EXEC sp_Registro_MateriaPrima 'Tegral SoftZR Rosca de reyes', 25, 50, 150, '2021-11-01', 1, 'Kg', 60, 2020, 2020;
EXEC sp_Registro_MateriaPrima 'Toupan', 5, 5, 15, '2021-11-01', 1, 'Kg', 5, 348, 348;
EXEC sp_Registro_MateriaPrima 'Vainilla Monchis', 4, 4, 12, '2021-11-01', 10, 'Lt', 1, 69, 690;
EXEC sp_Registro_MateriaPrima 'Requeson', 5, 5, 10, '2021-11-01', 10, 'Kg', 1, 70, 700;
EXEC sp_Registro_MateriaPrima 'Leche condensada', 5, 5, 10, '2021-11-01', 10, 'Kg', 1, 49, 490;
EXEC sp_Registro_MateriaPrima 'Nutri Leche', 12, 12, 36, '2021-11-29', 10, 'Lt', 1, 14, 140;
EXEC sp_Registro_MateriaPrima 'Carbonato', 2, 2, 5, '2021-11-01', 10, 'Kg', 1, 87, 870;
