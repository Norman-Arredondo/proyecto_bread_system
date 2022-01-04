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
EXEC sp_Registro_MateriaPrima 'Aceite Bidon Bunge', 20000, 50000, 100000, '2021-11-01', 10000, 'ml', 439.0;
EXEC sp_Registro_MateriaPrima 'Azucar', 10000, 5000, 30000, '2021-11-01', 10000, 'g', 270.4;
EXEC sp_Registro_MateriaPrima 'Azucar Glass', 10000, 5000, 15000,'2021-11-01', 1000, 'g', 244.0;
EXEC sp_Registro_MateriaPrima 'Anis', 5000, 5000, 10000, '2021-11-01', 5000, 'g', 505;
EXEC sp_Registro_MateriaPrima 'Chispas de chocolate', 1000, 2000, 5000,'2021-11-01', 5000, 'g', 88;
EXEC sp_Registro_MateriaPrima 'Cocoa', 5000, 5000, 10000, '2021-11-08', 1000, 'g', 94;
EXEC sp_Registro_MateriaPrima 'Bolsa De Papel #25', 50, 50, 100, '2021-11-08', 10, 'Pieza',10;
EXEC sp_Registro_MateriaPrima 'Maizena', 5000, 5000, 15000, '2021-11-08', 1000, 'g', 76;
EXEC sp_Registro_MateriaPrima 'Malta Morisca', 5000, 5000, 15000, '2021-11-08', 1000, 'g', 150;
EXEC sp_Registro_MateriaPrima 'Nuez Pedazo Intermedio', 2000, 2000, 5000, '2021-11-15', 2000, 'g', 480;
EXEC sp_Registro_MateriaPrima 'Bolsa Vites (ROYAL)', 4000, 4000, 12000, '2021-11-15', 1000, 'g', 82;
EXEC sp_Registro_MateriaPrima 'Bulto Mix Chocolate', 10000, 20000, 40000, '2021-11-15', 1000, 'g', 636;
EXEC sp_Registro_MateriaPrima 'Bulto Mix Esponja', 10000, 20000, 40000, '2021-11-15', 1000, 'g', 678;
EXEC sp_Registro_MateriaPrima 'Bulto Mix Vainilla', 10000, 20000, 40000, '2021-11-15', 1000, 'g', 492;
EXEC sp_Registro_MateriaPrima 'Bulto Muffin Vainilla', 10000, 20000, 40000, '2021-11-22', 1000, 'g', 392;
EXEC sp_Registro_MateriaPrima 'Canela molida', 2000, 6000, 12000, '2021-11-22', 1000, 'g', 72;
EXEC sp_Registro_MateriaPrima 'Capacillo Blanco #72', 300, 500, 1000, '2021-11-22', 100, 'Pieza', 37;
EXEC sp_Registro_MateriaPrima 'Capacillo Chino Corrufacil', 500, 500, 1000, '2021-11-22', 1000, 'Pieza',154;
EXEC sp_Registro_MateriaPrima 'Capacillo Rojo #72', 300, 500, 1000, '2021-11-22', 500, 'Pieza', 37;
EXEC sp_Registro_MateriaPrima 'Chantilli', 5000, 5000, 20000, '2021-11-29', 4000, 'g', 400;
EXEC sp_Registro_MateriaPrima 'Cobertura garfias chocolate', 500, 5000, 20000, '2021-11-29', 5000,'g', 163;
EXEC sp_Registro_MateriaPrima 'Color amarillo huevo brillapan', 5000, 5000, 20000, '2021-11-29', 5000, 'g', 205;
EXEC sp_Registro_MateriaPrima 'Fresa econopack mangas', 5000, 5000, 20000, '2021-11-29', 10000, 'g', 206;
EXEC sp_Registro_MateriaPrima 'Glasse Fresa', 5000, 5000, 20000,'2021-11-29', 10000, 'g', 164;
EXEC sp_Registro_MateriaPrima 'Glasse Piña', 5000, 5000, 20000,'2021-11-29', 10000,'g', 164;
EXEC sp_Registro_MateriaPrima 'Granilla colores Granimex', 5000, 5000, 10000,'2021-11-29', 3000,'g', 235;
EXEC sp_Registro_MateriaPrima 'Harina grano espiga', 3000, 30000, 60000,'2021-11-29', 10000, 'g', 352;
EXEC sp_Registro_MateriaPrima 'Harina Selecta', 44000, 88000, 176000,'2021-11-29', 10000,'g', 1275;
EXEC sp_Registro_MateriaPrima 'Huevo', 5000, 5000, 20000, '2021-11-01', 2000, 'g', 64;
EXEC sp_Registro_MateriaPrima 'Levadura', 5000, 5000, 20000, '2021-11-01', 4000, 'g', 232;
EXEC sp_Registro_MateriaPrima 'M Relleno Zarzamora Estrali', 5000, 5000, 10000, '2021-11-01', 5000, 'g', 475;
EXEC sp_Registro_MateriaPrima 'M. Crema Past. Vainilla Estrali', 5000, 5000, 10000, '2021-11-01', 5000, 'g',475;
EXEC sp_Registro_MateriaPrima 'Manteca Tolteca (GRASA)', 2400, 2400, 4800, '2021-11-01', 2400, 'g', 48;
EXEC sp_Registro_MateriaPrima 'Mantequilla', 5000, 5000, 20000, '2021-11-01', 10000, 'g', 850;
EXEC sp_Registro_MateriaPrima 'Mejorante Fortilix', 5000, 5000, 20000, '2021-11-01', 450000, 'g', 750;
EXEC sp_Registro_MateriaPrima 'Nuez Monchis', 4000, 4000, 24000, '2021-11-01', 4000, 'g', 230;
EXEC sp_Registro_MateriaPrima 'Pan molido', 5000, 10000, 40000, '2021-11-01', 10000, 'g', 200;
EXEC sp_Registro_MateriaPrima 'Piña econopack mangas', 5000, 10000, 20000, '2021-11-01', 5000, 'g', 475;
EXEC sp_Registro_MateriaPrima 'S. Rafmex Mant. Naranja', 4000, 4000, 24000, '2021-11-01', 4500, 'ml', 669;
EXEC sp_Registro_MateriaPrima 'Sal Fina', 25000, 50000, 100000, '2021-11-01', 22000, 'g', 220;
EXEC sp_Registro_MateriaPrima 'Sunset Glaze CL ND', 120000, 240000, 360000, '2021-11-01', 130000, 'ml', 1300;
EXEC sp_Registro_MateriaPrima 'Tegral SoftZR Rosca de reyes', 25000, 50000, 150000, '2021-11-01', 60000, 'g', 2020;
EXEC sp_Registro_MateriaPrima 'Toupan', 5000, 5000, 15000, '2021-11-01', 5000, 'g', 348;
EXEC sp_Registro_MateriaPrima 'Vainilla Monchis', 4000, 4000, 12000, '2021-11-01', 1000, 'ml', 690;
EXEC sp_Registro_MateriaPrima 'Requeson', 5000, 5000, 10000, '2021-11-01', 10000, 'g', 700;
EXEC sp_Registro_MateriaPrima 'Leche condensada', 5000, 5000, 10000, '2021-11-01', 10000, 'g', 490;
EXEC sp_Registro_MateriaPrima 'Nutri Leche', 12000, 12000, 36000, '2021-11-29', 10000, 'ml', 140;
EXEC sp_Registro_MateriaPrima 'Carbonato', 2000, 2000, 5000, '2021-11-01', 10000, 'g', 870;





-- >>> insert catalogo <<<
EXEC sp_Registro_pan 'Bisquet', 'Pan dulce', 30;
EXEC sp_Registro_pan 'Cocol', 'Pan sencillo', 72;
EXEC sp_Registro_pan 'De manteca', 'Pan sencillo', 39;
EXEC sp_Registro_pan 'Dona', 'Pan dulce', 40;
EXEC sp_Registro_pan 'Polvoron amarillo', 'Pan sencillo', 36;
EXEC sp_Registro_pan 'Multi', 'Pan dulce', 30;





-- >>> insert recetario <<<
EXEC sp_Registro_receta 'Bisquet', 'Harina Selecta', 1000, 'g';
EXEC sp_Registro_receta 'Bisquet', 'Azucar', 200, 'g';
EXEC sp_Registro_receta 'Bisquet', 'Levadura', 50, 'g';
EXEC sp_Registro_receta 'Bisquet', 'Sal Fina', 20, 'g';
EXEC sp_Registro_receta 'Bisquet', 'Bolsa Vites (ROYAL)', 20, 'g';
EXEC sp_Registro_receta 'Bisquet', 'Manteca Tolteca (GRASA)', 150, 'g';
EXEC sp_Registro_receta 'Bisquet', 'Mantequilla', 150, 'g';
EXEC sp_Registro_receta 'Bisquet', 'Huevo', 292, 'g';
EXEC sp_Registro_receta 'Cocol', 'Harina Selecta', 1500,'g';
EXEC sp_Registro_receta 'Cocol', 'Azucar', 500, 'g';
EXEC sp_Registro_receta 'Cocol', 'Granilla colores Granimex', 400, 'g';
EXEC sp_Registro_receta 'Cocol', 'Anis', 100, 'g';
EXEC sp_Registro_receta 'De manteca', 'Harina Selecta', 2000, 'g';
EXEC sp_Registro_receta 'De manteca', 'Azucar', 500, 'g';
EXEC sp_Registro_receta 'De manteca', 'Levadura', 50, 'g';
EXEC sp_Registro_receta 'De manteca', 'Sal Fina', 30, 'g';
EXEC sp_Registro_receta 'De manteca', 'Manteca Tolteca (GRASA)', 800, 'g';
EXEC sp_Registro_receta 'De manteca', 'Aceite Bidon Bunge', 500, 'ml';
EXEC sp_Registro_receta 'Dona', 'Harina Selecta', 2000, 'g';
EXEC sp_Registro_receta 'Dona', 'Azucar', 300, 'g';
EXEC sp_Registro_receta 'Dona', 'Levadura', 100, 'g';
EXEC sp_Registro_receta 'Dona', 'Manteca Tolteca (GRASA)', 200, 'g';
EXEC sp_Registro_receta 'Dona', 'Aceite Bidon Bunge', 1000, 'ml';
EXEC sp_Registro_receta 'Polvoron amarillo', 'Harina Selecta', 1500, 'g';
EXEC sp_Registro_receta 'Polvoron amarillo', 'Azucar', 600, 'g';
EXEC sp_Registro_receta 'Polvoron amarillo', 'Manteca Tolteca (GRASA)', 600, 'g';
EXEC sp_Registro_receta 'Polvoron amarillo', 'Bolsa Vites (ROYAL)', 30, 'g';
EXEC sp_Registro_receta 'Polvoron amarillo', 'Carbonato', 15, 'g';
EXEC sp_Registro_receta 'Multi', 'Harina Selecta', 1000, 'g';
EXEC sp_Registro_receta 'Multi', 'Azucar', 700, 'g';
EXEC sp_Registro_receta 'Multi', 'Bolsa Vites (ROYAL)', 30, 'g';
EXEC sp_Registro_receta 'Multi', 'Aceite Bidon Bunge', 600, 'ml';
EXEC sp_Registro_receta 'Multi', 'Huevo', 600, 'ml';





-- >>> insert insumos <<<
EXEC sp_Registro_insumos 'INS-00001', '2022-01-03', 100, 89, 50, 239;
EXEC sp_Registro_insumos 'INS-00002', '2022-01-03', 900, 80, 1200, 2180;
EXEC sp_Registro_insumos 'INS-00003', '2022-01-03', 1000, 70, 1200, 2270;
EXEC sp_Registro_insumos 'INS-00004', '2022-01-03', 900, 75, 1200, 2175;
EXEC sp_Registro_insumos 'INS-00005', '2022-01-03', 1000, 70, 1200, 2270;





-- >>> insert produccion <<<
EXEC sp_Registro_Produccion 'PRD-00002', '2022-01-03', 'RAGF630503EW7', 'Bisquet', 20, 'INS-00002', 10, 11.09;
EXEC sp_Registro_Produccion 'PRD-00003', '2022-01-03', 'RAGF630503EW7', 'Cocol', 72, 'INS-00003', 10, 3.5;
EXEC sp_Registro_Produccion 'PRD-00004', '2022-01-03', 'RAGF630503EW7', 'Dona', 40, 'INS-00004', 10, 5.87;






-- >>> insert mp_produccion <<<
--Bisquet
EXEC sp_Registro_MP_Produccion 'PRD-00002', 'MPP-1', 'Azucar', 133.33, 'g', 4;
EXEC sp_Registro_MP_Produccion 'PRD-00002', 'MPP-2', 'Bolsa Vites (ROYAL)', 13.33, 'g', 0.4;
EXEC sp_Registro_MP_Produccion 'PRD-00002', 'MPP-3', 'Harina Selecta', 666.67, 'g', 20;
EXEC sp_Registro_MP_Produccion 'PRD-00002', 'MPP-4', 'Huevo', 194.67, 'g', 20;
EXEC sp_Registro_MP_Produccion 'PRD-00002', 'MPP-5', 'Levadura', 33.33, 'g', 1;
EXEC sp_Registro_MP_Produccion 'PRD-00002', 'MPP-6', 'Manteca Tolteca (GRASA)', 100, 'g', 3;
EXEC sp_Registro_MP_Produccion 'PRD-00002', 'MPP-7', 'Mantequilla', 100, 'g', 3;
EXEC sp_Registro_MP_Produccion 'PRD-00002', 'MPP-8', 'Sal Fina', 13.33, 'g', 0.04;
--Cocol
EXEC sp_Registro_MP_Produccion 'PRD-00003', 'MPP-1', 'Harina Selecta', 1500, 'g', 151.5;
EXEC sp_Registro_MP_Produccion 'PRD-00003', 'MPP-2', 'Azucar', 500, 'g', 50.5;
EXEC sp_Registro_MP_Produccion 'PRD-00003', 'MPP-3', 'Granilla colores Granimex', 400, 'g', 40.4;
EXEC sp_Registro_MP_Produccion 'PRD-00003', 'MPP-4', 'Anis', 100, 'g', 10.10;
--Dona
EXEC sp_Registro_MP_Produccion 'PRD-00004', 'MPP-1', 'Harina Selecta', 2000, 'g', 43.9;
EXEC sp_Registro_MP_Produccion 'PRD-00004', 'MPP-2', 'Azucar', 300, 'g', 6.58;
EXEC sp_Registro_MP_Produccion 'PRD-00004', 'MPP-3', 'Levadura', 100, 'g', 2.19;
EXEC sp_Registro_MP_Produccion 'PRD-00004', 'MPP-4', 'Manteca Tolteca (GRASA)', 200, 'g', 4.39;
EXEC sp_Registro_MP_Produccion 'PRD-00004', 'MPP-5', 'Aceite Bidon Bunge', 1000, 'ml', 21.95;



