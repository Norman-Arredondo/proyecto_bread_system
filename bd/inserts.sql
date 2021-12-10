USE so_bs;

-- >>> insert punto_venta <<<
EXEC sp_Registro_ptovta 'PTO-00001', 'Matriz', 'De los Colegios', 'Los Reyes Acozac','11', 'N/A', 'Tecamac', 55755;
EXEC sp_Registro_ptovta 'PTO-00002', 'Centro', 'De los Colegios', 'Los Reyes Acozac','15', 'N/A', 'Tecamac', 55755;

-- >>> cambiar estatus punto_venta <<<
EXEC sp_CamEst_ptovta 'PTO-00002', 0