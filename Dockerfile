FROM php:8.2-apache

# Set the working directory
WORKDIR /var/www/html

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy the application files into the container
COPY src/ .

# Set proper permissions for Apache
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# AllowOverride All
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Install MySQL extension for PHP
RUN docker-php-ext-install pdo pdo_mysql

# Expose port 80
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]