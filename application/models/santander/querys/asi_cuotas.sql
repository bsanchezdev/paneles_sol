INSERT INTO ASI_CUOTAS SELECT	
	ASI_ORIGINAL_CUOTAS.Rut_Cliente AS Rut_Cliente,
	ASI_ORIGINAL_CUOTAS.Dv,
	ASI_ORIGINAL_CUOTAS.NUMOPE,
	ASI_ORIGINAL_CUOTAS.Fecha_Vencimiento,
	ASI_ORIGINAL_CUOTAS.Numero_Cuota,
	ASI_ORIGINAL_CUOTAS.Monto_Cuota,
	ASI_ORIGINAL_CUOTAS.INTERES_PENAL,
	ASI_ORIGINAL_CUOTAS.RECARGO 
FROM
	ASI_ORIGINAL_CUOTAS;
