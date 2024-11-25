# Teste Prático para Vaga de Desenvolvedor Full Stack Pleno

**Guia:**
 - Instalação
 - Uso
 - Fix de possíveis erros
 - Extra
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

- **Frontend em Laravel**: `http://localhost:8000` \
*OBS.:* Credenciais de teste geradas por seed: \
**login:** test@example.com \
**senha**: password
<br/>
- **Backend API em Go**: `http://localhost:8080`
<br/>

- **Banco de dados MySQL**: Credenciais de acesso: <br/>
**Host**: `localhost` \
**Porta**: `3306` \
**Banco:** `database` \
**usuário**: `admin` \
**senha**: `fidelio`

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

## Extra
Este projeto foi planejado e executado utilizando um board de Kanban no Trello.
Caso tenha curiosidade de como as tarefas foram organizadas, acesse o link abaixo:

[Trello Workspace](https://trello.com/invite/b/674162d1d751080a1137d3af/ATTIacd41891739a8c307ad25b21df0fca2e4A2357C1/ramada-atacadista-teste-tecnico)
