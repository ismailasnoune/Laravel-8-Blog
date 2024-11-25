<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Laravel Blog Project

A simple blog application built with Laravel 8. This project includes user authentication, a user dashboard, and CRUD (Create, Read, Update, Delete) functionality for blog posts.

---

## Features

- **User Authentication**: Registration, login, and logout using Laravel Jetstream (Livewire or Inertia).
- **User Dashboard**: Users can view their profile and see all their posts in one place.
- **Post Management**: 
  - Create, edit, delete, and view posts.
  - Posts are associated with specific users.
- **Database Management**: 
  - Powered by MySQL using migrations, factories, and seeders.
- **Responsive UI**: Designed for seamless user experience on any device.

---

## Installation

Follow these steps to set up the project locally:

### Prerequisites
- PHP >= 7.4
- Composer
- Node.js and npm
- MySQL Database
- Laravel Installer (optional)

### Steps

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/ismailasnoune/Laravel-8-Blog.git
   cd your-repo-name
2. **Composer install**:
    ```bash
    npm install && npm run dev
3. ## Update the .env file with your database credentials:
    ```bash
    - DB_CONNECTION=mysql
    - DB_HOST=127.0.0.1
    - DB_PORT=3306
    - DB_DATABASE=your_database_name
    - DB_USERNAME=your_username
    - DB_PASSWORD=your_password

4. **Run Migrations and Seeders: Migrate the database and optionally seed it:**
   ```bash
   php artisan migrate --seed
5. **Start the Server:**
   ```bash
   php artisan serve

## **Usage**
- Authentication
  Register a new user or log in with existing credentials.
- User Dashboard
  View your profile and a list of all your blog posts.
- Posts
  Create: Add new posts using the post creation form.
  Read: View a list of all posts and details of individual posts.
  Update: Edit your existing posts.
  Delete: Remove posts you no longer need.
## **Technologies Used**
- Laravel 8: Framework for backend logic.
- Jetstream: For user authentication (Livewire or Inertia).
- MySQL: Database management.
- Migrations, Factories, Seeders: For database setup and testing.
- Blade Templates: For frontend views.

**Screenshots**


Login Page

Dashboard
## **Contact**
For questions or feedback, please contact:
- Asnoune Ismail
- Email: asnouneismail@gmail.com
- GitHub: ismailasnoune




