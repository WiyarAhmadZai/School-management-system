# School Management System

This is a Laravel-based School Management System that provides a comprehensive solution for managing students, teachers, courses, and grades.

## Features

- User Authentication (Login/Registration)
- Dashboard with statistics and recent activities
- Student Management (CRUD operations)
- Teacher Management (CRUD operations)
- Course Management (CRUD operations)
- Grade Management (CRUD operations)
- User Profile Management with photo upload
- Post and Media Management (Create, view, like, and share posts)
- User Directory on Homepage
- Responsive Design with Tailwind CSS
- Dropdown Navigation with Hover Effects

## Installation

1. Clone the repository
2. Run `composer install` to install PHP dependencies
3. Run `npm install` to install frontend dependencies
4. Copy `.env.example` to `.env` and configure your database settings
5. Run `php artisan key:generate` to generate application key
6. Run `php artisan migrate --seed` to create database tables and seed with sample data
7. Run `npm run build` to compile frontend assets

## Development

To start the development server:
```bash
php artisan serve
```

To watch for frontend changes:
```bash
npm run dev
```

## Usage

1. Visit the application in your browser (typically http://localhost:8000)
2. Register a new account or login if you already have one
3. Navigate through the different sections using the navigation menu:
   - Dashboard: Overview of school statistics
   - Students: Manage student records
   - Teachers: Manage teacher records
   - Courses: Manage course information
   - Grades: Manage student grades
   - Media: Create and view posts
   - Profile: Update your account information
   - Home: View latest news and user directory

## Technologies Used

- Laravel 12.x
- PHP 8.4
- SQLite (default database)
- Tailwind CSS
- Alpine.js
- Vite

## Contributing

1. Fork the repository
2. Create a new branch for your feature
3. Commit your changes
4. Push to your branch
5. Create a pull request

## License

This project is open-sourced software licensed under the MIT license.