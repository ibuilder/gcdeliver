# Installation Guide

This guide provides instructions on how to install and run the Laravel application.

## 1. Prerequisites

Before you begin, ensure you have the following installed on your system:

*   **PHP:** Version 7.4 or higher is recommended.
*   **Composer:** A dependency manager for PHP.
*   **Node.js and npm:** Node.js is a JavaScript runtime, and npm is its package manager.
*   **Database:** A database server like MySQL, PostgreSQL, or SQLite.

## 2. Core Installation

Follow these steps to set up the application locally:

1.  **Clone the Repository:**
```
bash
    git clone <repository_url>
    cd <repository_directory>
    
```
Replace `<repository_url>` with the actual URL of your repository and `<repository_directory>` with the name of the cloned directory.

2.  **Install PHP Dependencies:**
    Install the backend dependencies using Composer:
```
bash
    composer install
    
```
3.  **Install JavaScript Dependencies:**
    Install the frontend dependencies using npm:
```
bash
    npm install
    
```
4.  **Set Up Environment File:**
    Copy the example environment file and generate an application key:
```
bash
    cp .env.example .env
    php artisan key:generate
    
```
5.  **Configure Database:**
    Edit the `.env` file and update the database connection details:
```
env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    
```
Replace the placeholder values with your actual database credentials.

6.  **Run Database Migrations and Seeders:**
    Migrate the database tables and seed the initial data:
```
bash
    php artisan migrate --seed
    
```
7.  **Build Frontend Assets:**
    Compile your frontend assets using npm:
```
bash
    npm run dev
    
```
or for production:
```
bash
    npm run prod
    
```
8.  **Start the Development Server:**
    You can run the application locally using the Laravel development server:
```
bash
    php artisan serve
    
```
The application should now be accessible at `http://127.0.0.1:8000`.

## 3. Platform-Specific Instructions

These sections provide general guidance for deploying the application on various platforms. **Please consult the official documentation for each platform for detailed, platform-specific instructions.**

### Laravel Forge

Laravel Forge is a server management service that simplifies the deployment of PHP applications, including Laravel.

*   **Server Provisioning:** Provision a server (e.g., on DigitalOcean, AWS, Linode) through Laravel Forge.
*   **Site Creation:** Create a new site on your server in Forge, selecting "Laravel" as the application type.
*   **Repository Connection:** Connect your code repository (e.g., from GitHub, Bitbucket, GitLab).
*   **Environment Variables:** Configure your environment variables in the Forge site settings.
*   **Deployment Script:** Forge sets up a default deployment script. You may need to customize it to include `npm install` and `npm run prod` if your frontend assets are built during deployment.
*   **Nginx Configuration:** Forge automatically configures Nginx for your Laravel application.

### Laravel Cloud

Please refer to the official Laravel Cloud documentation for the specific steps on deploying your Laravel application. This typically involves connecting your repository and configuring deployment pipelines.

### Digital Ocean

Deploying a Laravel application on Digital Ocean often involves setting up a Droplet (a virtual server) and manually configuring the server environment.

*   **Create a Droplet:** Create a new Droplet, choosing an operating system like Ubuntu.
*   **Connect via SSH:** Connect to your Droplet using SSH.
*   **Install Web Server (Nginx):** Install Nginx: `sudo apt update && sudo apt install nginx`.
*   **Install PHP and Extensions:** Install PHP and necessary extensions: `sudo apt install php-fpm php-mysql php-cli php-curl php-mbstring php-xml php-zip`.
*   **Install Composer:** Install Composer globally.
*   **Install Node.js and npm:** Install Node.js and npm.
*   **Clone Repository:** Clone your application repository to the server.
*   **Configure Nginx:** Create an Nginx server block configuration file for your application, pointing the root to your application's `public` directory.
*   **Configure Database:** Install and configure a database server (e.g., MySQL) on the Droplet or use a managed database service.
*   **Configure Environment File:** Set up your `.env` file with production database credentials and other settings.
*   **Install Dependencies:** Run `composer install --no-dev` and `npm install && npm run prod` on the server.
*   **Run Migrations:** Run `php artisan migrate --force`.
*   **Permissions:** Ensure appropriate file permissions are set for the storage and bootstrap/cache directories.
*   **Restart Services:** Restart Nginx and PHP-FPM.

### Firebase Hosting

Firebase Hosting is primarily designed for hosting static assets (HTML, CSS, JavaScript). Deploying a full-stack Laravel application directly on Firebase Hosting is not a standard approach as it requires a PHP runtime and database.

If you are using Firebase Hosting for a decoupled frontend that interacts with a Laravel backend hosted elsewhere (e.g., on a VPS or a serverless function), you would:

1.  **Build Frontend Assets:** Build your frontend application's static assets (e.g., using npm run build).
2.  **Configure Firebase Hosting:** Configure your `firebase.json` file to serve the built static files from the correct directory.
3.  **Deploy to Firebase Hosting:** Deploy your static assets using the Firebase CLI: `firebase deploy --only hosting`.

To run a full Laravel application on Firebase, you would typically use Firebase Cloud Functions or Cloud Run to host the PHP backend as a serverless application, which is a more advanced setup than simple hosting.