FROM php:8.2-apache

# Usa la imagen oficial de PHP 8.2 con Apache como base

# Establece el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Habilita el módulo mod_rewrite de Apache para permitir URLs amigables
RUN a2enmod rewrite

# Copia los archivos de la aplicación desde la carpeta src/ al contenedor
COPY src/ .

# Asigna los permisos adecuados a los archivos para el usuario y grupo de Apache
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Permite el uso de .htaccess cambiando AllowOverride a All en la configuración de Apache
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Instala las extensiones de PHP necesarias para trabajar con MySQL mediante PDO
RUN docker-php-ext-install pdo pdo_mysql

# Expone el puerto 80 para acceder a la aplicación web
EXPOSE 80

# Comando por defecto para iniciar el servidor Apache en primer plano
CMD ["apache2-foreground"]