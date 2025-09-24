# NTI Laravel Ready - Full ZIP (Scaffold)

This archive is a **Laravel 10 scaffold** tailored to the Articles dashboard project your instructor requested.
It is *not* the full framework — run `composer install` to fetch the Laravel framework and other dependencies.

## Quick start (after extracting)

1. Enter project folder:
   ```bash
   cd nti-laravel-full
   ```
2. Install PHP dependencies (this will download Laravel framework):
   ```bash
   composer install
   ```
3. Create .env (if not created automatically by composer script):
   ```bash
   cp .env.example .env
   ```
4. Generate app key:
   ```bash
   php artisan key:generate
   ```
5. Configure `.env` DB settings (MySQL):
   DB_DATABASE, DB_USERNAME, DB_PASSWORD
6. Run migrations:
   ```bash
   php artisan migrate
   ```
7. Create an admin user (optional, via tinker):
   ```bash
   php artisan tinker
   >>> \App\\Models\\User::create(['name'=>'Admin','email'=>'admin@example.com','password'=>bcrypt('password'),'role'=>'admin']);
   ```
8. Serve the app:
   ```bash
   php artisan serve
   ```
Open http://127.0.0.1:8000

If you prefer I can also push this to your GitHub repo as a new branch or give a patch file. Ask and I'll do it.
