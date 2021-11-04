##### Este repositório contém a solução ao teste proposto para avaliar as habilidades práticas do candidato João Porto à vaga de Desenvolvedor(a) Fullstack na Bling.

Cerca de 30 horas foram utilizadas para criar a solução.

## Sumário
1. [Configuração do ambiente de execução](#configuração-do-ambiente-de-execução)
1. [Algoritmos e lógica](#algoritmos-e-lógica)
2. [Programação orientada à objetos e design patterns](#programação-orientada-à-objetos-e-design-patterns)
3. [SQL e modelo relacional](#sql-e-modelo-relacional)

## Configuração do ambiente de execução

Para executar os arquivos php presentes neste repositório utilizando um container Docker basta ter o docker-compose instalado e executar, a partir da pasta raiz do repositório, o seguinte comando:

    $ docker-compose up -d

Com isso o container será criado e sua linha de comando pode ser acessada com o comando:

    $ docker exec -it <container_id_app> bash

O comando docker-compose também criará um container com um servidor MySQL que pode ser acessado via linha de comando de forma semelhante:

    $ docker exec -it <container_id_db> bash



## Algoritmos e lógica

Cada um dos algoritmos pedidos pode ter sua implementação testada a partir de um dos arquivos da pasta `1_algorithm_logic_exercises`.

O algoritmo 1 pode ser testado a partir do arquivo `exercise_1.php`, o algoritmo 2 pode ser testado a partir do arquivo `exercise_2.php` e assim por diante.

Para testar a implementação de um algoritmo basta executar no shell um comando no seguinte formato

    $ php exercise_<numero_algoritmo>.php <entrada_para_algoritmo>*

Por exemplo

    $ php exercise_2.php 1,2,3,4,5

#### Formato de entrada dos algoritmos

O formato das entradas de cada algoritmo é detalhado a seguir.

##### Algoritmo 1

**<valor_1>**,**<valor_2>**,**<valor_3>**,...,**<valor_n>** **<numero_posicoes_rotacao>** **<direcao>**

Onde

**<valor_i>** pode ser qualquer string representando um elemento de um array

**<numero_posicoes_rotacao>** deve ser um inteiro representando o número de posições a rotacionar

**<direcao>** deve ser um inteiro representando a direção, 0 rotaciona à direira e 1 rotaciona à esquerda

Exemplo de entrada para o algoritmo 1

    $ php exercise_1.php 1,2,3,4,5,6 2

##### Algoritmo 2

**<valor_1>**,**<valor_2>**,...,**<valor_i>**,...,**<valor_n>**

Onde

**<valor_i>** deve ser um inteiro representando um elemento de um array

Exemplo de entrada para o algoritmo 2

    $ php exercise_2.php 1,2,3,4,5,6

##### Algoritmo 3

**<dd_1>**/**<mm_1>**/**<yyyy_1>** **<dd_2>**/**<mm_2>**/**<yyyy_2>**

Onde

**<dd_1>** deve ser um inteiro representando o dia da data inicial

**<mm_1>** deve ser um inteiro representando o mês da data inicial

**<yyyy_1>** deve ser um inteiro representando o ano da data inicial

**<dd_2>** deve ser um inteiro representando o dia da data final

**<mm_2>** deve ser um inteiro representando o mês da data final

**<yyyy_2>** deve ser um inteiro representando o ano da data final

Exemplo de entrada para o algoritmo 3

    $ php exercise_3.php 03/04/1998 04/11/2021

##### Algoritmo 4

**<valor_1>**,**<valor_2>**,...,**<valor_i>**,...,**<valor_n>**

Onde

**<valor_i>** deve ser um inteiro representando uma medida

Exemplo de entrada para o algoritmo 4

    $ php exercise_4.php 1,2,3,4,5,6

##### Algoritmo 5

**<_string>** **<_substring>**

Onde

**<_string>** deve ser uma string representando um texto

**<_substring>** deve ser uma string representando um subtexto

Exemplo de entrada para o algoritmo 5

    $ php exercise_5.php amarelo amar

##### Algoritmo 6

**<ret_1_x_inf_esq>**,**<ret_1_y_inf_esq>**/**<ret_1_x__sup_dir>**,**<ret_1_y_sup_dir>** **<ret_2_x_inf_esq>**,**<ret_2_y_inf_esq>**//**<ret_2_x_sup_dir>**,**<ret_2_y_sup_dir>**

Onde

**<ret_1_x_inf_esq>** deve ser um inteiro representando a coordenada x do ponto inferior esquerdo do primeiro retângulo

**<ret_1_y_inf_esq>** deve ser um inteiro representando a coordenada y do ponto inferior esquerdo do primeiro retângulo

**<ret_1_x__sup_dir>** deve ser um inteiro representando a coordenada x do ponto superior direito primeiro retângulo

**<ret_1_y_sup_dir>** deve ser um inteiro representando a coordenada y do ponto superior direito primeiro retângulo

**<ret_2_x_inf_esq>** deve ser um inteiro representando a coordenada x do ponto inferior esquerdo do segundo retângulo

**<ret_2_y_inf_esq>** deve ser um inteiro representando a coordenada y do ponto inferior esquerdo do segundo retângulo

**<ret_2_x__sup_dir>** deve ser um inteiro representando a coordenada x do ponto superior direito segundo retângulo

**<ret_2_y_sup_dir>** deve ser um inteiro representando a coordenada y do ponto superior direito segundo retângulo

Exemplo de entrada para o algoritmo 6

    $ php exercise_6.php 1,1/3,3 2,1/4,4

##### Algoritmo 7

**<ponto_1>**,**<ponto_2>**,...,**<ponto_i>**,...,**<ponto_n>** **<link_1>**/.../**<link_i>**/.../**<link_m>** **<ponto_partida>**,**<ponto_final>**

Onde

**<ponto_i>** deve ser uma string representando um ponto no mapa

**<link_i>** deve estar no formato **<ponto_i>**,**<ponto_j>** representando uma conexão entre dois pontos no mapa

**<ponto_partida>** deve ser uma string representando o ponto de partida do caminho no mapa

**<ponto_partida>** deve ser uma string representando o ponto final do caminho no mapa

Exemplo de entrada para o algoritmo 7

    $ php exercise_7.php a,b,c,d,e,f,g,h a,b/a,e/a,h/b,c/b,d/c,d/c,e/d,g/e,f/g,h a,c

## Programação orientada à objetos e design patterns

Uma demonstração da implementação do padrão iterator no modelo dado pode ser obtida executando-se, a partir da pasta `2_oop_and_designpattern_exercises`, o seguinte comando:

    $ php exercise_1.php

O diagrama de classes do modelo seguindo o padrão iterator está no arquivo `component_class_diagram.png`.

## SQL e modelo relacional

As soluções para os problemas de SQL estão presentes nos arquivos da pasta `3_sql_exercises`.

A solução para o problema 1 está no arquivo `exercise_1`, a solução para o problema 2 está no arquivo `exercise_2.sql` e assim por diante.