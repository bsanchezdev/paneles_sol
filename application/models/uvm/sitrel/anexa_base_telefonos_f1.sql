INSERT INTO BASE_TELEFONOS (
	RUT,
	DV,
	TELEFONO,
	ZONA,
	COMUNA,
	TIPO_TELEFONO, 
	CEDENTE,
	ORIGEN
) SELECT
	CARGA.RUT,
	CARGA.DV,
	CARGA.F1,
	"130101" AS ZONA,
	"130101" AS COMUNA,
	If (CARGA.T1 = "F", 15, 16) AS Expr1,
	CARGA.CEDENTE,
	1 AS Expr2
FROM
	CARGA
GROUP BY
	CARGA.RUT,
	CARGA.DV,
	CARGA.F1,
	ZONA,
	COMUNA,
	If (CARGA.T1 = "F", 15, 16),
	CARGA.CEDENTE,
	1
HAVING
	CARGA.F1 IS NOT NULL;

