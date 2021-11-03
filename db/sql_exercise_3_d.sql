SELECT * FROM ator AS a
INNER JOIN participa AS p ON p.idAtor = a.id
INNER JOIN filme AS f ON f.id = p.idFilme
INNER JOIN dirige AS di ON di.idFilme = f.id
INNER JOIN diretor AS de ON de.id = di.idDiretor
WHERE de.nome LIKE 'SPIELBERG';