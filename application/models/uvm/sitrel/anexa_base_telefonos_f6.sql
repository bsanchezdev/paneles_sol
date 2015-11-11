INSERT INTO BASE_TELEFONOS (
	RUT,
	DV,
	TELEFONO,
	ZONA,
	COMUNA,
	TIPO_TELEFONO , CEDENTE,
	ORIGEN
) SELECT
	CARGA.RUT,
	CARGA.DV,
	CARGA.F6,
	 SITREL_ZONA_GEOGRAFICA.CodZona AS ZONA,
	 SITREL_ZONA_GEOGRAFICA.CodZona AS COMUNA,
	If (CARGA.T6 = "F", 15, 16) AS Expr1,
	CARGA.CEDENTE,
	6 AS Expr2
FROM
	 SITREL_ZONA_GEOGRAFICA
INNER JOIN CARGA ON  SITREL_ZONA_GEOGRAFICA.CodTelArea = CARGA.CA6
where carga.f6 is not null and sitrel_zona_geografica.CodNivel like "COM"
GROUP BY
	CARGA.RUT,
	CARGA.DV,
	CARGA.F6,
	 SITREL_ZONA_GEOGRAFICA.CodZona,
	 SITREL_ZONA_GEOGRAFICA.CodZona,
	If (CARGA.T6 = "F", 15, 16),
	CARGA.CEDENTE,
	6, SITREL_ZONA_GEOGRAFICA.CodNivel