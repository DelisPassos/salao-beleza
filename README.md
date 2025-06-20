<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<h2 align="center">Sistema de Gestão para Salão de Beleza - La Bella</h2>

<p align="center">
  Projeto desenvolvido em Laravel para controle interno de atendimentos, clientes e serviços em salões de beleza.
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
- Mailpit (para simulação de e-mails em desenvolvimento)

---

## 📋 Requisitos para Rodar Localmente

- PHP ≥ 8.1 (com extensões: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON)
- Composer
- Node.js e npm
- MySQL ou MariaDB
- XAMPP (opcional, mas recomendado para ambiente local)

---

## 🚀 Como Instalar e Executar

```bash
# 1. Clonar o repositório
git clone https://github.com/seu-usuario/salao-beleza.git
cd salao-beleza

# 2. Instalar dependências PHP
composer install

# 3. Instalar dependências do frontend
npm install

# 4. Compilar os assets com Vite
npm run dev    # Durante o desenvolvimento
# ou
npm run build  # Para produção

# 5. Copiar o arquivo de ambiente
cp .env.example .env

# 6. Gerar chave da aplicação
php artisan key:generate

# 7. Configurar conexão com o banco no .env

# 8. Rodar as migrações
php artisan migrate

# 9. Iniciar o servidor local
php artisan serve
```

---

## 🔐 Recuperação de Senha com Mailpit (ambiente local)

Para testar o envio de e-mails de redefinição de senha:

### 1. Baixar e rodar o Mailpit

- Acesse: [https://github.com/axllent/mailpit/releases](https://github.com/axllent/mailpit/releases)
- Baixe a versão compatível com seu sistema (ex: `mailpit-windows-amd64.exe`)
- Execute o Mailpit (duplo clique ou via terminal):
  ```bash
  ./mailpit-windows-amd64.exe
  ```

- Ele ficará disponível em [http://localhost:8025](http://localhost:8025)

### 2. Configurar `.env` para Mailpit

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

### 3. Testar o fluxo

- Acesse: `http://localhost:8000/forgot-password`
- Envie um e-mail válido cadastrado
- Acesse o Mailpit em `http://localhost:8025`, clique no link recebido
- Redefina sua senha

---

## 📌 Observações

- Esse projeto utiliza componentes Blade personalizados com layout escuro (fundo preto, texto branco e destaques em dourado).
- Caso use o sistema em produção, substitua Mailpit por um serviço real de SMTP (Ex: Mailtrap, SendGrid, Mailgun etc.).

---

## 📄 Licença

Este projeto é open-source e está sob a licença [MIT](LICENSE).