# E-Violation: An Online Violation Point System for Schools

This is a web application built using Laravel and Bootstrap that allows schools to manage violation points for students. The system allows teachers to assign violation points to students based on their behavior, and students can view their own violation points online.

## Roles

-   Teacher
-   Student
-   Student Guardian
-   Admin

## Features

### Teacher

-   Create, read, update, and delete violation points
-   Assign violation points to students
-   View student profiles, including their violation points
-   View violation points, including the students assigned to them

### Student

-   View your own profile, including your violation points
-   View violation points assigned to you

### Student Guardian

-   View your child's profile, including their violation points
-   View violation points assigned to your child

### Admin

-   Create, read, update, and delete roles
-   Assign roles to users
-   View user roles

## Installation

1. Clone the repository
2. Run `composer install`
3. Copy the .env.example file to .env
4. Run `php artisan key:generate`
5. Run `npm install`
6. Run `composer dumpautoload`
7. Run `php artisan migrate`
8. Run `php artisan db:seed`
9. Run `php artisan serve`

## Usage

1. Open your web browser and navigate to `http://localhost:8000`.
2. Log in as admin using the email `admin@gmail.com` and the password `password`.
3. Add a new student to the system.
4. Assign violation points to the student as needed.
5. Access the student's profile to view their assigned violation points.

## Tech Used

-   Laravel 8.x
-   Bootstrap 4.x
-   MySQL 8.x

## Screenshots

![E-Violation](public/assets/img/E_Violation.gif)
