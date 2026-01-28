# Quick Setup Commands

Run these commands in order to set up the Task Management Application:

## Step 1: Install PHP Dependencies
```bash
composer install
```

## Step 2: Install NPM Dependencies
```bash
npm install
```

## Step 3: Generate Application Key (if not already done)
```bash
php artisan key:generate
```

## Step 4: Run Migrations
```bash
php artisan migrate
```

## Step 5: Seed Database (Optional - creates test user and sample tasks)
```bash
php artisan db:seed
```

## Step 6: Build Frontend Assets
```bash
npm run build
```

## Step 7: Start Development Server
```bash
php artisan serve
```

---

## Quick Reference Commands

### Clear Cache (if needed)
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### For Development with Hot Reload
```bash
npm run dev
```
(Run this in a separate terminal while `php artisan serve` is running)

---

## After Setup

1. Open browser: `http://localhost:8000`
2. Register a new user OR login with seeded user:
   - Email: `test@example.com`
   - Password: `password`
3. Navigate to "Tasks" in the menu to manage tasks
