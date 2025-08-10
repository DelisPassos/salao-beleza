FROM php:8.2-fpm

# Instalar dependências do sistema e extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libonig-dev libzip-dev nodejs npm \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www

# Copiar arquivos do projeto para dentro do container
COPY . .

# Instalar dependências PHP do Laravel sem dev, otimizado
RUN composer install --optimize-autoloader --no-dev

# Instalar dependências do frontend e build de assets (se usar frontend)
RUN npm install && npm run build

# Gerar APP_KEY automaticamente (só se quiser atualizar via container)
# RUN php artisan key:generate

# Executar as migrations automaticamente ao iniciar (opcional, útil em deploy)
RUN php artisan migrate --force

# Expor porta 8000 para acesso
EXPOSE 8000

# Comando para iniciar o servidor embutido do Laravel (não para produção robusta)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
