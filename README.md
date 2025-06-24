<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<h2 align="center">Sistema de Gestão para Salão de Beleza - La Bella</h2>

<p align="center">
  Projeto desenvolvido com Laravel para controle interno de atendimentos, clientes, serviços e fornecedores em salões de beleza.
</p>

---

## 🛠️ Tecnologias Utilizadas

- PHP 8.1+
- Laravel 10+
- MySQL (via XAMPP)
- Blade Components personalizados
- Bootstrap 5.3 (via Vite e npm)
- Bootstrap Icons
- HTML/CSS/JS
- Mailpit (para simulação de envio de e-mails em ambiente local)

---

## 📋 Requisitos para Rodar Localmente

- PHP ≥ 8.1
- Composer
- Node.js e npm
- MySQL ou MariaDB
- XAMPP (opcional, recomendado para desenvolvimento local)

---

## 🚀 Como Instalar e Executar

```bash
# 1. Clonar o repositório
git clone https://github.com/seu-usuario/salao-beleza.git
cd salao-beleza

# 2. Instalar dependências do backend
composer install

# 3. Instalar dependências do frontend
npm install

# 4. Compilar os assets com Vite
# Para produção
npm run build      # Ou npm run dev  Para desenvolvimento

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
```

---

## 🔐 Recuperação de Senha com Mailpit

### 1. Instalar e rodar o Mailpit

- Baixe: [https://github.com/axllent/mailpit/releases](https://github.com/axllent/mailpit/releases)
- Use o arquivo apropriado para seu sistema (ex: `mailpit-windows-amd64.exe`)
- Execute:
  ```bash
  ./mailpit-windows-amd64.exe
  ```
- A interface estará disponível em [http://localhost:8025](http://localhost:8025)

### 2. Configurar `.env`

```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="nao-responda@example.com"
MAIL_FROM_NAME="La Bella"
```

### 3. Testar

- Acesse: `http://localhost:8000/forgot-password`
- Informe um e-mail válido cadastrado
- Abra o Mailpit e clique no link recebido para redefinir a senha

---

## 📌 Observações

- O sistema possui um layout escuro (preto, branco e dourado), com componentes Blade personalizados e responsivos.
- A navegação pública e privada seguem padrões distintos para melhor usabilidade.
- Para ambiente de produção, configure um serviço SMTP real (ex: SendGrid, Mailtrap, Mailgun).

---

## 📄 Licença

Este projeto é open-source e está sob a licença [MIT](LICENSE).