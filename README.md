# Teste Prático para Vaga de Desenvolvedor Full Stack Pleno

**Guia:**
 - Instalação
 - Uso
 - Acesso ao AWS API Gateway
 - Fix de possíveis erros
---

## Instalação
**Requisitos:**
 - Docker (ou Podman)
 - Docker Compose (ou Podman Compose)

---

**Buildando as imagens do Go, Laravel e MySQL**
 - `docker compose build`


## Uso

**Rodando os containers dos serviços do Docker Compose**
- `docker compose up`

*OBS.:* Adicionar flag `-d` caso não queira agarrar o terminal com os processos do docker 

---

**Acessando os serviços**

## Fix de possíveis erros
- **Banco de dados não inicializado**:

Rodar comando: `docker compose up -d db --build --force-recreate`

- **Migrations e seed não rodaram**:
1. Verificar se o container banco de dados está rodando (caso não esteja, rode a solução acima).
2. Rodar comandos: `docker compose exec app php artisan migrate:fresh` \
`docker compose exec app php artisan db:seed`

- **Dependências do PHP ou npm não instalaram no container do Laravel**
Rodar comandos: `docker compose exec app composer install --prefer-dist --optimize-autoloader` \
`docker compose exec app npm i --no-interaction`

- **App Key do Laravel não gerada**
Rodar comando: `docker compose exec app php artisan key:generate`

*OBS.:* Caso os containers não inicializem, verifique se suas portas `8080` `8000` `3306` já não estão ocupadas.