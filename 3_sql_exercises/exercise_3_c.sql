SELECT f.id AS id_filme, f.titulo AS titulo_filme, count(p.idAtor) AS qtd_atores FROM filme AS f
INNER JOIN participa AS p ON p.idFilme = f.id
WHERE f.ano = '2015'
GROUP BY f.id
ORDER BY qtd_atores ASC, titulo_filme ASC;