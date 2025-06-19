<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  </a>
</p>

<h2 align="center">Sistema de Gestão para Salão de Beleza</h2>

<p align="center">
  Projeto desenvolvido em Laravel para controle interno de atendimentos, clientes e serviços em salões de beleza.
</p>

---

## 🛠️ Tecnologias Utilizadas

- PHP 8.1+
- Laravel 10+
- MySQL (via XAMPP)
- Blade Components
- Bootstrap 5.3 (via Vite e npm)
- Vite (build frontend)
- Bootstrap Icons
- HTML/CSS/JS

---

## 📋 Requisitos para Rodar Localmente

- PHP ≥ 8.1 (comextensão OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON)
- Composer
- Node.js e npm
- MySQL ou MariaDB
- XAMPP (opcional, mas recomendado para desenvolvimento local)

---

## 🚀 Como Instalar e Executar

```bash
# 1. Clonar o repositório
git clone https://github.com/seu-usuario/salao-beleza.git
cd salao-beleza

# 2. Instalar as dependências PHP
composer install

# 3. Instalar as dependências do frontend (Bootstrap, Vite, etc.)
npm install

# 4. Compilar os assets com Vite
npm run build         # Ou npm run dev durante o desenvolvimento

# 5. Copiar o arquivo de ambiente
cp .env.example .env

# 6. Gerar chave da aplicação
php artisan key:generate

# 7. Criar as tabelas no banco de dados
php artisan migrate

# 8. Iniciar o servidor local
php artisan serve
