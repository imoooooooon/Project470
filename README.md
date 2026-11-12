# Krishi Bondhu — কৃষি বন্ধু

CSE470, BRAC University · one shared Laravel MVC application for four students.
This setup adds MariaDB and team infrastructure. Existing authentication/pages are preserved; no new product features or design choices are included.

## Prerequisites and versions

Use native **PHP 8.4**, **Composer 2**, **MariaDB 11.4 LTS**, and Git. Docker, WSL, Node, and npm are not required for local development. Enable PHP extensions `ctype`, `curl`, `dom`, `fileinfo`, `filter`, `hash`, `intl`, `mbstring`, `openssl`, `pcre`, `pdo_mysql`, `session`, `tokenizer`, `xml`, `xmlwriter`, and `zip`.

Verified in the isolated Linux cloud environment: PHP **8.4.27**, Composer **2.8.8**, Laravel **13.42.0** (composer.lock), MariaDB **11.4.13**, InnoDB, utf8mb4. Windows instructions below have not been executed on a Windows PC. Laravel's [official requirements](https://laravel.com/docs/13.x/deployment#server-requirements) require PHP >=8.3; this lockfile's Symfony packages require >=8.4.1. Install the latest stable 8.4 patch and validate with Composer; no prereleases.

## First-time setup on Windows (PowerShell)

1. Install [Git for Windows](https://git-scm.com/download/win), [PHP 8.4 x64](https://windows.php.net/download/) (plus its documented Visual C++ runtime), [Composer](https://getcomposer.org/download/), and [MariaDB 11.4](https://mariadb.org/download/). Add their executable directories to PATH. Keep compatible existing installations. Enable the extensions above in your PHP `php.ini` (`php --ini` shows its location). Install MariaDB as a local Windows service, use port 3306, and choose your own administrator password.
2. Open a new PowerShell window and check:

```powershell
php -v
php -m
composer --version
mariadb --version
git --version
git clone https://github.com/imoooooooon/Project470.git
cd Project470
git switch staging
composer install
composer check-platform-reqs
Copy-Item .env.example .env
Copy-Item .env.testing.example .env.testing
```

Copy environment examples only on a fresh clone; never overwrite your existing `.env` or `.env.testing`. If `staging` has not yet been created remotely, complete the repository bootstrap described in `docs/github-setup.md` first.

3. In `mariadb -u root -p`, create **your own local** databases and users. Replace both password placeholders with different local passwords before running this SQL; do not commit the edited SQL:

```sql
CREATE DATABASE krishi_bondhu CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE DATABASE krishi_bondhu_test CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'krishi_dev'@'127.0.0.1' IDENTIFIED BY 'REPLACE_WITH_YOUR_DEV_PASSWORD';
CREATE USER 'krishi_test'@'127.0.0.1' IDENTIFIED BY 'REPLACE_WITH_YOUR_TEST_PASSWORD';
GRANT ALL PRIVILEGES ON krishi_bondhu.* TO 'krishi_dev'@'127.0.0.1';
GRANT ALL PRIVILEGES ON krishi_bondhu_test.* TO 'krishi_test'@'127.0.0.1';
```

The service must use InnoDB (MariaDB's default). Each user is limited to its own database. Use host `127.0.0.1` consistently. If a server resolves local connections as `localhost`, create the same restricted local user for that host instead; do not grant global privileges.

4. Put the matching password in `.env` and `.env.testing` respectively. Both use `DB_CONNECTION=mariadb`, host `127.0.0.1`, and port `3306`. Keep the test database named `krishi_bondhu_test`; tests can destroy/recreate its tables. Never point tests at development, staging, or production data.

```powershell
php artisan key:generate
php artisan key:generate --env=testing
php artisan config:clear
php artisan about --only=environment
php scripts/check-database.php
composer validate --strict
php artisan test
php vendor/bin/pint --test
```

Every teammate generates their own keys. Tests exercise the existing authentication implementation in the disposable test database. They do not populate the development database. The default local session/cache drivers use files and queues run synchronously, so infrastructure boot does not require tables.

## Daily start and checks

Start the MariaDB Windows service, then from the repository:

```powershell
php artisan serve --host=127.0.0.1 --port=8000
```

In a second terminal, run `php scripts/check-database.php`, `php artisan test`, and `php vendor/bin/pint --test`. To work on the **existing** authentication pages, explicitly run `php artisan migrate` on your own development database first; this creates the pre-existing schema and role lookup entries. No new business migrations or seed data are part of this setup. Never run `migrate:fresh` on valuable data.

If tests unexpectedly use stale settings, run `php artisan config:clear`. The test bootstrap rejects databases not ending in `_test`. Existing Blade pages serve Bootstrap locally; the generated Vite files are unused. No frontend build or new UI library is required or selected.

See [CONTRIBUTING.md](CONTRIBUTING.md) for daily Git commands, [project context](docs/project-context.md) for scope and deadlines, and [GitHub setup status](docs/github-setup.md) for remote settings. Future staging and production deployments will have separate databases, keys, secrets, sessions, and uploaded files; deployment is not configured here.
