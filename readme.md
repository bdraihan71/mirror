1. Git clone the repo (SSH)
2. Checkout to the latest branch
3. Run composer install
4. Run cp .env.example .env
5. Run php artisan key:generate
6. Configure DB
touch database/db.sqlite
nano .env

DB_CONNECTION=sqlite
DB_DATABASE=/{path to laravel codebase}/database/db.sqlite

7. Run php artisan migrate --seed
8. Run php artisan serve