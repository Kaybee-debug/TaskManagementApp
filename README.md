# Simple Task Management Application (Laravel)

A simple but functional task management system built with Laravel framework. This application demonstrates fundamental Laravel concepts including authentication, CRUD operations, MVC architecture, and database design using MySQL.

## Features

- ✅ **User Authentication**: Login, Registration, and Logout functionality
- ✅ **Task Management**: Full CRUD (Create, Read, Update, Delete) operations for tasks
- ✅ **Task Status**: Track tasks with status (Pending, In Progress, Completed)
- ✅ **Due Dates**: Set and track due dates for tasks
- ✅ **User-specific Tasks**: Each user can only view and manage their own tasks
- ✅ **Modern UI**: Clean and responsive interface built with Tailwind CSS and Blade templates

## Requirements

- PHP >= 8.2
- Composer
- MySQL >= 5.7 or MariaDB >= 10.3
- Node.js >= 18.x and NPM
- Git

## Installation & Setup

Follow these steps to set up and run the application locally:

### Step 1: Clone the Repository

```bash
git clone https://github.com/Kaybee-debug/TaskManagementApp.git
cd TaskManagementApp
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

### Step 3: Install NPM Dependencies

```bash
npm install
```

### Step 4: Configure Environment

Copy the `.env.example` file to `.env`:

```bash
copy .env.example .env
```

On Linux/Mac:
```bash
cp .env.example .env
```

### Step 5: Generate Application Key

```bash
php artisan key:generate
```

### Step 6: Configure Database

Open the `.env` file and update the database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskmanagemant_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

**Important**: Replace `your_password` with your MySQL root password (or leave empty if no password is set).

### Step 7: Create Database

Create a MySQL database named `task_management`:

```bash
mysql -u root -p
```

Then in MySQL:
```sql
CREATE DATABASE task_management;
EXIT;
```

### Step 8: Run Migrations

Run the database migrations to create the necessary tables:

```bash
php artisan migrate
```

### Step 9: Seed Database (Optional)

Seed the database with sample data:

```bash
php artisan db:seed
```

This will create:
- A test user (email: `test@example.com`, password: `password`)
- Sample tasks for the test user

### Step 10: Build Frontend Assets

Build the frontend assets:

```bash
npm run build
```

For development with hot reload:

```bash
npm run dev
```

### Step 11: Start the Development Server

Start the Laravel development server:

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Usage

### Default Test User

After seeding the database, you can log in with:
- **Email**: `test@example.com`
- **Password**: `password`

### Creating a New User

1. Navigate to `http://localhost:8000/register`
2. Fill in the registration form
3. Click "Register"
4. You'll be automatically logged in

### Managing Tasks

1. **View All Tasks**: Click on "Tasks" in the navigation menu
2. **Create Task**: Click "Create New Task" button
3. **View Task**: Click "View" on any task
4. **Edit Task**: Click "Edit" on any task
5. **Delete Task**: Click "Delete" on any task (confirmation required)

## Project Structure

```
taskmanagement/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Auth/          # Authentication controllers
│   │       ├── TaskController.php  # Task CRUD controller
│   │       └── ProfileController.php
│   └── Models/
│       ├── User.php           # User model
│       └── Task.php           # Task model
├── database/
│   ├── migrations/            # Database migrations
│   │   ├── *_create_users_table.php
│   │   └── *_create_tasks_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── TaskSeeder.php     # Sample task data
├── resources/
│   └── views/
│       ├── auth/              # Authentication views
│       ├── tasks/             # Task management views
│       │   ├── index.blade.php    # Task listing
│       │   ├── create.blade.php   # Create task form
│       │   ├── edit.blade.php     # Edit task form
│       │   └── show.blade.php     # Task details
│       └── layouts/           # Layout templates
└── routes/
    └── web.php               # Web routes
```

## Database Schema

### Users Table
- `id` (Primary Key)
- `name`
- `email` (Unique)
- `password` (Hashed)
- `email_verified_at`
- `remember_token`
- `created_at`, `updated_at`

### Tasks Table
- `id` (Primary Key)
- `user_id` (Foreign Key -> users.id)
- `title`
- `description` (Nullable)
- `status` (Enum: pending, in_progress, completed)
- `due_date` (Nullable)
- `created_at`, `updated_at`

## MVC Architecture

This application follows Laravel's MVC (Model-View-Controller) architecture:

- **Models**: `User.php`, `Task.php` - Handle database interactions
- **Views**: Blade templates in `resources/views/` - Handle presentation
- **Controllers**: `TaskController.php`, `Auth/*` - Handle business logic and routing

## Key Laravel Concepts Demonstrated

1. **Authentication**: Using Laravel Breeze for authentication scaffolding
2. **Migrations**: Database schema version control
3. **Seeders**: Populating database with initial data
4. **Eloquent ORM**: Database interactions through models
5. **Blade Templates**: Server-side templating engine
6. **Routing**: RESTful resource routing
7. **Middleware**: Authentication middleware for protected routes
8. **Validation**: Form request validation

## Commands Reference

### Artisan Commands

```bash
# Run migrations
php artisan migrate

# Rollback last migration
php artisan migrate:rollback

# Run seeders
php artisan db:seed

# Create a new migration
php artisan make:migration create_table_name

# Create a new model
php artisan make:model ModelName

# Create a new controller
php artisan make:controller ControllerName

# Clear application cache
php artisan cache:clear

# Clear configuration cache
php artisan config:clear

# Clear route cache
php artisan route:clear

# Clear view cache
php artisan view:clear
```

### NPM Commands

```bash
# Install dependencies
npm install

# Build for production
npm run build

# Watch for changes (development)
npm run dev
```

## Troubleshooting

### Database Connection Error

If you encounter database connection errors:
1. Verify MySQL is running
2. Check `.env` file has correct database credentials
3. Ensure the database `task_management` exists
4. Run `php artisan config:clear`

### Permission Errors

On Linux/Mac, you may need to set proper permissions:

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Port Already in Use

If port 8000 is already in use:

```bash
php artisan serve --port=8001
```

## Deployment Instructions

### For Production Deployment

1. **Set Environment Variables**:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   ```

2. **Optimize Application**:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Build Assets**:
   ```bash
   npm run build
   ```

4. **Run Migrations**:
   ```bash
   php artisan migrate --force
   ```

5. **Set Proper Permissions** (Linux/Mac):
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

## Contributing

This is an assessment project. For production use, consider:
- Adding unit tests
- Implementing API endpoints
- Adding task categories/tags
- Implementing task search and filtering
- Adding email notifications
- Implementing task sharing/collaboration

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Author

Built as part of Laravel Intern Technical Assessment.
