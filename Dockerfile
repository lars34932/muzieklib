FROM php:7.4-apache

# Enable PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Other Dockerfile configurations and dependencies go here

# Start Apache (or your web server)
CMD ["apache2-foreground"]