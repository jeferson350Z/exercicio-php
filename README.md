# Exercicio-php

Aplicação simples em PHP para cadastro e listagem de usuários.

---

## O que tem neste repositório

- `src/` — código PHP da aplicação (inclui `index.php` e `config.php`).
- `Dockerfile` — imagem PHP + Apache usada pelo serviço `php`.
- `docker-compose.yml` — define serviços `php` e `db` (MySQL).

---

## Pré-requisitos

- Docker e Docker Compose instalados (recomendado).
- Alternativa sem Docker: PHP (>=8) e um servidor MySQL acessível.

---

## Como rodar com Docker (recomendado)

1. Na raiz do projeto, construa e suba os containers:

```bash
docker-compose up -d --build
```

2. Abra no navegador:

http://localhost:8080
