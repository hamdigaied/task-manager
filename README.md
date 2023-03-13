
# Task management app
Laravel task manager is a web app to manage tasks associated to projects.

# Technologies
- **[Laravel 10](https://laravel.com/docs/10.x)**
- **[Bootstrap 5](https://getbootstrap.com/)**
- **[Vite 4](https://vitejs.dev/)**

# How to setup
Install php dependencies via composer
```
composer install
```
Install nodejs dependencies via npm
```
npm install
```
Copy .env.example file to .env
```
cp .env.example .env
```
Update .env file with your database host, port, database name and credentials
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task-manager
DB_USERNAME=root
DB_PASSWORD=
```
Generate application key
```
php artisan key:generate
```
Cache app config
```
php artisan config:cache
```
Migrate tables to database
```
php artisan migrate
```
Build and launch server
```
npm run build
```
