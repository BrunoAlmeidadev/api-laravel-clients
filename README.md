# 🚀 Laravel com Docker

Este projeto fornece uma base preparada para rodar uma aplicação Laravel com Docker, utilizando PHP 8.3 (FPM Alpine), Nginx e MySQL 8.4.

---

## 🧰 Tecnologias Utilizadas

- PHP 8.3.14 (FPM Alpine)
- Node.js 22.17.0 (instalado via Dockerfile)
- MySQL 8.4.3
- Nginx Alpine
- Docker e Docker Compose

---

## 📝 Pré-requisitos

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

---

## ⚙️ Como rodar o projeto localmente

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/laravel-docker-template.git
cd laravel-docker-template
2. Copie o arquivo .env.example (futuramente usado pelo Laravel)
bash

cp .env.example .env
3. Suba os containers com Docker
bash

docker-compose up -d --build
4. Acesse o container do PHP e instale o Laravel (caso ainda não tenha feito)
bash

docker exec -it laravel_php bash
composer create-project laravel/laravel .
exit


5. Acesse no navegador:

http://localhost# api-laravel-clients
