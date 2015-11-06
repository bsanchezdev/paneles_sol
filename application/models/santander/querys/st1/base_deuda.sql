INSERT INTO BASE_DEUDA (
	RUT,
	DV,
	NOMBRE,
	direcc,
	telefono,
	ciudad,
	comuna,
	OPERACION,
	CUOTA,
	PRODUCTO,
	VENCE, 
        moneda,
	MONTO,
	sucursal,
	cartera,
	sald_ins,
	tipo_deu,
	descrip,
	montoopera,
	observacio,
	categoria,
	segmento,
	año,
	tipo_cred,
	semestre,
	Monto_Cheq_Protestado,
        CEDENTE
) SELECT
	CARGA.RUT,
	CARGA.DV,
	CARGA.NOMBRE,
	"" AS direcc,
	"" AS telefono,
	"" AS ciudad,
	"" AS comuna,
	CARGA.OPERACION,
	CARGA.CUOTA,
	CARGA.PRODUCTO,
	CARGA.VENCE,
        1 AS moneda,
	CARGA.MONTO,
	"MATRIZ" AS sucursal,
	CARGA.MARCA_CARTERA, 
        "0" AS sald_ins,
	"D" AS tipo_deu,
	"" AS descrip,
	"0" AS montoopera,
	CARGA.MARCA_2_OBS_CHQ_PROT, 
        "" AS categoria,
	"" AS segmento,
	"" AS año,
	"" AS tipo_cred,
	CARGA.MARCA_1_SEMESTRE,
        "0" AS Monto_Cheq_Protestado,
        CARGA.CEDENTE
FROM
	CARGA
WHERE
	(((CARGA.CEDENTE) = "ST1"));
