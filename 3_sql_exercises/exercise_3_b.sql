SELECT * FROM filme AS f
INNER JOIN participa AS p ON p.idFilme = f.id
INNER JOIN ator AS a ON a.id = p.idAtor
WHERE a.nome = 'FULANO';