<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  </a>
</p>

<h2 align="center">Sistema de Agendamento para Salão de Beleza</h2>

<p align="center">
  Projeto desenvolvido com Laravel, usando MySQL via XAMPP, com foco em agendamentos e controle de serviços e clientes.
</p>

---

## Tecnologias utilizadas

- Laravel 10+
- PHP 8+
- Composer
- MySQL (XAMPP)
- Blade (ou Vue, se implementado)
- Vite (via npm)
- HTML/CSS/JS

---

## Como instalar e executar o projeto localmente

### Requisitos

- PHP ≥ 8.1
- Composer
- MySQL (recomendado: XAMPP)
- Node.js e npm

---

### Etapas de instalação

```bash
# Clone o repositório
git clone https://github.com/seu-usuario/salao-beleza.git
cd salao-beleza

# Instalar dependências PHP
composer install

# Instalar dependências JS (para Vite)
npm install
npm run build

# Compilar
composer run dev 

# Copiar arquivo de ambiente e gerar chave da aplicação
copy .env.example .env
php artisan key:generate

# Criar tabelas no banco de dados
php artisan migrate

# Iniciar o servidor
php artisan serve
