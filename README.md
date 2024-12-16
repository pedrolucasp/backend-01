# backend-1

Aplicativo demonstrativo para eliminar a matéria de Backend I. Esse projeto é
uma adaptação do projeto `dinheiro` [que eu fiz em
Go](https://git.eletrotupi.com/dinheiro).

```
.
├── Dockerfile
├── LICENSE
├── README.md
├── app
│   ├── controllers
│   │   └── HelloController.php
│   │   └── *.php
│   ├── helpers
│   │   └── Template.php
│   ├── services
│   └── views
│       ├── home.php
│       ├── layout.php
│       ├── login.php
│       ├── register.php
│       └── *.php
├── bootstrap.php
├── config
│   ├── database.php
│   └── routes.php
├── docker-compose.yml
├── public
│   └── index.php
├── schema.sql
└── storage
    └── database.sqlite
```

Existe um docker-compose.yml que pode ser utilizado para subir o ambiente de
desenvolvimento. Use o comando `docker-compose up` para subir o ambiente.

A lógica geral é algo que use MVC, `services` para encapsular lógicas mais
complexas, `models` para representar os dados, `controllers` para lidar com
requisições HTTP e `routes` define as rotas. Por enquanto é de um jeito bem
burro, onde literalmente combina o tipo de request com a rota em si. Idealmente,
faria até mais sentido usar algo como uma hash table para mapear rotas para
funções, e eventualmente um sistema de middleware mais elaborado.

Atirei um layout bem simples usando Tailwind e meio que baseado na estrutura que
o Gov.uk usa/recomenda para as interfaces.

Todo código tá escrito em inglês, exceto alguns comentários aqui e ali,
indepedente da matéria ser em português. Acho que é uma boa prática e é o que eu
uso nos meus 10 anos de experiência em programação, fora que é um debate até
meio idiota.

## Licença

MIT. Verifica o arquivo COPYING nesse repositório.
