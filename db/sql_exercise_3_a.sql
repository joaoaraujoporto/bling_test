SELECT * FROM ator as a
INNER JOIN participa AS p ON p.idAtor = a.id
INNER JOIN filme AS f ON f.id = p.idFilme
WHERE f.titulo LIKE 'XYZ';