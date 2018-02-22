# lesgermes_laravel

Project made with Laravel PHP framework

### Get Started

- get repo
```bash
sudo git clone git@github.com:lesgermes/lesgermes_laravel.git
```

- create db and db user
- set up .env file
- install dependencies
```bash
sudo composer install
sudo npm install
cd public
sudo npm install
```

- last config commands
```bash
php artisan key:generate
php artisan migrate
php artisan passport:install
```

- set up vhosts (see example below)
```xml
<VirtualHost *:80>
	ServerName lesgermes.tk
	DocumentRoot "/var/www/html/lesgermes_laravel/public"
	<Directory "/var/www/html/lesgermes_laravel/public">
		allow from all
		Options -Indexes
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```
