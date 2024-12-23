# 704 App Desafio

![tela](./capa.png)

Crud de veículos para controle de um estacionamento.
O objetivo é que o gestor de um estacionamento possa informar quando certo veículo entrar no estacionamento e quando sair.

E que o dono do veículo saiba em que vaga deixou o carro.

Pontos importantes:

API deve conter os principais endpoints GET, POST, PUT e DELETE privados.

Deve conter endpoint público para listagem dos veículos, GET e PUT.

Testes automatizados, services, repository pattern e utilização de middlewares para validação.

### Solução

A solução para o problema apresentado envolveu criar um CRUD para Veiculos e para Entradas. O CRUD de Veiculos faz todas as operações necessárias para cadastros, edição e listagem de Veiculos.
O CRUD de Entradas é responsável pelo registro do estacionamento, registrando Entradas e saídas de Veiculos do estacionamento. Para isso temos algumas regras:

1. Não permitir que seja cadastrado mais de um Veiculo com a mesma placa (Validação do campo placa como unique).
2. Não permitir que seja registrado a entrada de um Veiculo mais de uma vez, sem antes ter registrado sua saída (Validação verificaVeiculo() ).
3. Não permitir que a vaga fique ocupada por mais de um Veiculo, a vaga só é liberada quando o Veiculo registra saída (Validação verificaDisponibilidadeVaga() ).

### Passo a passo

Clone Repositório

```sh
git clone https://github.com/Jhousef/704-desafio.git
```

```sh
cd app-laravel
```

Crie o Arquivo .env

```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env

```dosini
APP_NAME="704 App"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Suba os containers do projeto

```sh
docker-compose up -d
```

Acesse o container app

```sh
docker-compose exec app bash
```

Instale as dependências do projeto

```sh
composer install
```

Gere a key do projeto Laravel

```sh
php artisan key:generate
```

Acesse o projeto
[http://localhost:8989](http://localhost:8989)
