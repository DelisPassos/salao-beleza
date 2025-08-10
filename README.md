<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<h2 align="center">Sistema de Gestão para Salão de Beleza - La Bella</h2>

<p align="center">
  Projeto desenvolvido com Laravel para controle interno de atendimentos, clientes, serviços e fornecedores em salões de beleza.
</p>

<p align="center">
  🔗 <strong><a href="https://salao-beleza.onrender.com" target="_blank">Acesse o sistema em produção</a></strong>
</p>

---

## 🛠️ Tecnologias Utilizadas

- PHP 8.2 (via Docker)
- Laravel 10+
- PostgreSQL (via Render)
- Blade Components personalizados
- Bootstrap 5.3 (via Vite e npm)
- Bootstrap Icons
- HTML/CSS/JS
- Mailpit (para simulação de e-mails em ambiente local)

---

## 🌐 Ambiente de Produção

Este projeto foi configurado para ser executado em ambiente de produção com as seguintes tecnologias e serviços:

- **Render.com**: Hospedagem da aplicação Laravel com Docker.
- **PostgreSQL (Render)**: Banco de dados usado em produção.
- **Docker**: Containerização completa do ambiente PHP, Node.js, e dependências.

### 🔧 Alterações realizadas para o deploy

- `Dockerfile` criado para execução em containers Linux.
- `render.yaml` configurado para automatizar o deploy via GitHub.
- `.env` adaptado para uso com PostgreSQL em produção.
- Comando de migração adicionado ao processo de build (`php artisan migrate --force`).
- `APP_URL` e `SESSION_DRIVER` configurados corretamente para HTTPS.
- Segurança ajustada com `APP_DEBUG=false` e `APP_ENV=production`.

---

## 📋 Requisitos para Rodar Localmente

- PHP ≥ 8.1
- Composer
- Node.js e npm
- MySQL ou MariaDB
- XAMPP (opcional, recomendado para desenvolvimento local)

---

## 🚀 Como Instalar e Executar Localmente

```bash
# 1. Clonar o repositório
git clone https://github.com/seu-usuario/salao-beleza.git
cd salao-beleza

# 2. Instalar dependências do backend
composer install

# 3. Instalar dependências do frontend
npm install

# 4. Compilar os assets com Vite
npm run build      # ou npm run dev para desenvolvimento

# 5. Copiar o arquivo de ambiente
cp .env.example .env

# 6. Gerar chave da aplicação
php artisan key:generate

# 7. Configurar o banco de dados no arquivo `.env`

# 8. Rodar as migrações
php artisan migrate

# (Opcional) Rodar seeders com dados de teste
php artisan db:seed 

# 9. Iniciar o servidor local
php artisan serve
