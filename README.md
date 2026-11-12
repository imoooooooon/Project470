# Krishi Bondhu - কৃষি বন্ধু
CSE470 shared project for four students. Laravel 13 / PHP 8.5 / Blade / Bootstrap.

## Start locally
PHP 8.5 and Composer are installed on this Mac under `$HOME/.config/herd-lite/bin`.
```sh
export PATH="$HOME/.config/herd-lite/bin:$PATH"
composer install
# On a fresh clone only: copy .env.example to .env and run php artisan key:generate
# Create database/database.sqlite if it does not exist for this temporary local setup.
php artisan migrate
php artisan serve --host=127.0.0.1 --port=8000
```
Open http://127.0.0.1:8000. Register your own account; no shared default password is included.

## Verify
```sh
php artisan test
php vendor/bin/pint --test
```
## Database
SQLite is temporary for local verification. Shared/deployed target is MariaDB, not yet installed or tested.
Set DB_CONNECTION=mysql, DB_HOST, DB_PORT=3306, DB_DATABASE, DB_USERNAME and DB_PASSWORD in .env, then run migrations once a MariaDB database is available. Never commit .env.

## Frontend
The initial Blade pages serve pinned Bootstrap 5.3.8 locally from public/css. No frontend build is needed for these pages. The generated Vite configuration is not yet used; Node setup and Bootstrap bundling are pending.

## Scope
Registration/login/logout and multiple account roles are implemented. Specialist and administrator roles cannot be self-assigned. Password reset and role administration are pending. All numbered Sprint 1 features remain planned; see docs/milestones.md. Original requirements are preserved under docs/requirements.

## Team workflow
Pull the shared foundation, create a feature branch, implement one complete requirement, run tests, and submit a pull request for teammate review. Maintain docs/ai-usage.md and only claim features after verification.
