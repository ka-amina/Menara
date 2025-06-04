# README

## Project Overview

### Project Name: Menara

### Description
Menara is a web application developed with PHP Laravel, designed to help recruiters efficiently manage the recruitment process. It focuses on preparing, tracking, and evaluating technical and cross-functional interviews, as well as managing job offers. The application aims to centralize candidate and interview management, facilitate skill evaluation, improve recruitment process traceability, automate candidate communication, optimize interview scheduling, and enable companies to create and publish job offers.

### Target Audience
- Recruiters
- HR Managers
- Department Heads
- HR Teams
- Companies

### Project Objectives
- Centralize the management of candidates and interviews.
- Facilitate the evaluation of technical and cross-functional skills.
- Improve the traceability of the recruitment process.
- Automate communication with candidates.
- Optimize interview scheduling.
- Enable companies to create and publish job offers.

### Technical Objectives
- Develop a secure and high-performance application.
- Create an intuitive and responsive user interface.
- Ensure the flexibility and extensibility of the application.
- Implement robust authentication.
- Set up custom role management.

## Functional Requirements

### User and Role Management
- Secure authentication (login, password reset, etc.).
- Customizable roles (Admin, Recruiter, Company).
- Candidate profile management (creation, tracking, search).

### Candidate Management
- Create, track, and search detailed candidate profiles.
- Manage resumes and other candidate-related documents.
- Display complete profiles of candidates who have had interviews, including scores and status (accepted, rejected).

### Job Offer Management
- Create, modify, and delete job offers.
- Automatic publication of job offers.

### Task Management
- Manage recruiter tasks (interview assignments, task tracking, scheduling via an integrated calendar).
- Each recruiter can view their assigned tasks for the day.

### Evaluation Repository
- Create and manage categorized questionnaires (technical and administrative).

### Interview Management
- Schedule and organize interviews with date and meeting link management.
- Automatically generate evaluation reports.
- Notify candidates of their status within 24 hours after the interview via email.

### Front Office and Back Office

#### Front Office (Recruiters)
1. **Dashboard**
   - Daily task calendar: Interactive view of assigned tasks for the day.
   - Upcoming interviews: List of scheduled interviews.
   - Notifications and reminders: Automated alerts for tasks and events.
   - Statistics: Visualization of individual performance.
2. **Interview Management**
   - Interview list: Filters to display interviews (by date, status).
   - Evaluation: Skill rating form for technical and administrative skills.
   - Reports: Generation of reports.
3. **Task Management**
   - Task list: Detailed view of tasks assigned to the recruiter.
   - Update: Modify task status (in progress, completed).

#### Front Office (Company)
- Overview of created job offers.
- Statistics on applications.
- Manage job offers: create, modify, delete.
- Track applications by job offer.
- Generate advanced reports and statistics.

#### Back Office (Administrators)
- **Admin Dashboard**
  - Complete management of recruiters: Add, delete, modify.
  - Assign tasks to recruiters: Interview and specific task assignments.
  - Global supervision of the recruitment process: Access to all data, interviews, and candidates.
  - Reports and analytics: Generate advanced recruitment statistics.

## Technologies Used
- Backend: PHP Laravel
- Database: MySQL
- Frontend: HTML, CSS, JavaScript (Laravel Framework)
- Design Pattern: Repository Pattern
- Version Control: Git

## Installation

### Prerequisites
- PHP 
- MySQL
- Composer
- Node.js and npm (for frontend assets)

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/ka-amina/Menara
   cd menara
   ```
2. Install dependencies:
   ``` bash
   composer install
   npm install
   ```
3. Copy the .env.example file to .env and configure your database settings:

   ``` bash
   cp .env.example .env
   ```
4. Run database migrations:
   ``` bash
   php artisan migrate
   ```
5. Run database migrations:
   ```bash
   php artisan migrate
   ```
6. create admin user by running the seeder  :
   ```bash
   php artisan db:seed --class=DatabaseSeeder
   ```
7. Compile frontend assets:
    ```bash 
    npm run dev
    ```
8. Start the development server:
    ```bash
    php artisan serve
    ```
8. Access the application at http://localhost:8000.

the admin account :
 - email: amina@admin.com
 - password: amina12345

## Acknowledgments

- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Alpine.js](https://alpinejs.dev/)

## Author

- [Amina](https://github.com/ka-amina)

## Contact

- Email: aminakara400@gmail.com
- GitHub: [ka-amina](https://github.com/ka-amina)
