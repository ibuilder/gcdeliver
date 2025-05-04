# gcDeliver: Construction Project Management System

![gcDeliver Logo](link_to_your_logo_here)

## Project Overview

gcDeliver is a comprehensive web application designed to streamline and optimize the management of construction projects. It serves as a centralized platform for General Contractors, Owners, Architects, Engineers, and other stakeholders to collaborate, track progress, manage resources, and ensure timely completion of construction projects.

This project has functional **User Management**, **Partner Management**, **Project Management**, **Item Management**, **Delivery Management**, **Schedule Management**, **Daily Reporting**, **Item-Partner Relationships**, **Delivery Item Management**, **Activity Dependency Management**, and **Manpower Entry Management**. All the core functionalities are working, have been tested, and are ready for production. It also has a **Gantt Chart** and **Dashboard** functionality. This project has been developed following a clear roadmap, to make sure that all the goals are accomplished.


**User Management:** Manage the users of the application.
**Partner Management:** Manage the partners (subcontractors, suppliers) involved in projects.
**Project Management:** Create and manage multiple construction projects.
**Item Management:** Manage the catalog of items required for projects.
**Delivery Management:** Schedule and track deliveries of items to project sites.
**Schedule Management:** Create and maintain project schedules.

## Purpose

The primary purpose of gcDeliver is to simplify the complexities of construction project management. It aims to:

*   **Enhance Collaboration:** Facilitate communication and information sharing among all project participants.
*   **Improve Efficiency:** Automate and streamline various project management tasks, reducing manual effort and potential errors.
*   **Increase Transparency:** Provide real-time project data, enabling stakeholders to stay informed about progress, issues, and resource utilization.
*   **Reduce Costs:** Optimize resource allocation and prevent project delays, leading to significant cost savings.
* **Optimize Schedule:** Keep track of the project progress and anticipate possible conflicts and delays.
* **Manage resources:** Keep track of all the resources needed, and their respective status.

## Key Features

gcDeliver offers a wide array of features tailored to meet the specific needs of construction projects:

*   **User Management:**
    *   Role-based access control for General Contractors, Owners, Architects, and Engineers.
    *   Secure user authentication and authorization.
    *   User profile management.
*   **Partner Management:**
    *   Add, edit, and manage partners (subcontractors, suppliers) involved in projects.
    *   Store contact information and track partner performance.
*   **Project Management:**
    *   Create and manage multiple construction projects.
    *   Define project details, including start and end dates, descriptions, and status.
    *   Track project progress and milestones.
*   **Item Management:**
    *   Create and manage a catalog of items required for projects.
    *   Define item specifications, lead times, and status (e.g., pending, ordered, delivered).
    *   Assign items to specific projects.
*   **Delivery Management:**
    *   Schedule and track deliveries of items to project sites.
    *   Define delivery dates, time slots, locations, and unload durations.
    *   Manage delivery statuses (e.g., projected, confirmed, today).
*   **Schedule Management:**
    *   Create and maintain project schedules, including task dependencies.
    *   Define task start and end dates, durations, and progress.
    *   Visualize schedules using Gantt charts or similar tools (future enhancement).
*   **Daily Reporting:**
    *   Create and submit daily reports on project site activities.
    *   Record weather conditions and notes.
    * Track manpower information.
*   **Item-Partner Relationships:**
    *   Associate specific items with specific partners (vendors/suppliers).
    *   Manage the relationships between items and the partners providing them.
* **Delivery Item Management:**
    * Add the specific items that are part of a delivery.
    * Manage the items that are expected in the deliveries.
* **Activity Dependency Management:**
    * Manage the dependencies between activities.
    * Keep track of all the activities that depends on other activities.
* **Manpower entry management:**
    * Register manpower information in the daily reports.
    * Keep track of all the trades and their quantity for each day.

## Technologies Used

gcDeliver is built using a robust and modern technology stack:

*   **Backend Framework:** Laravel (PHP) - Provides a solid foundation for building the application's logic, routing, and database interactions.
*   **Database:** MySQL - Stores project data, user information, and other relevant details.
*   **Frontend:** Blade Templates (Laravel) - Used for rendering dynamic web pages.
*   **Version Control:** Git - Tracks changes in the codebase and facilitates collaboration.
* **Package Manager:** Composer - Manage all the dependencies of the project.

## Setup Instructions

Follow these steps to set up and run gcDeliver locally:

1.  **Prerequisites:**
    *   PHP >= 8.1
    *   Composer
    *   MySQL database
    *   Git
2.  **Clone the Repository:**
```
bash
    git clone <repository_url>
    cd gcDeliver
    
```
3.  **Install Dependencies:**
```
bash
    composer install
    
```
4.  **Configure Environment:**
    *   Copy `.env.example` to `.env`:
```
bash
        cp .env.example .env
        
```
*   Open `.env` and configure the following:
        *   `DB_CONNECTION=mysql`
        *   `DB_HOST=127.0.0.1`
        *   `DB_PORT=3306`
        *   `DB_DATABASE=<your_database_name>`
        *   `DB_USERNAME=<your_database_user>`
        *   `DB_PASSWORD=<your_database_password>`
        * `APP_URL=http://localhost`

5.  **Generate Application Key:**
```
bash
    php artisan key:generate
    
```
6.  **Run Migrations:**
```
bash
    php artisan migrate
    
```
7.  **Seed the Database:**
```
bash
    php artisan migrate:fresh --seed
    
```
This command will create all the tables in the database and add some example data.
8.  **Start the Development Server:**
```
bash
    php artisan serve
    
```
This will start the local development server. You can access the application in the `APP_URL` defined in the `.env` file.

## Usage Guide

Once the application is running, you can access it through your web browser. Here's a quick overview of how to use gcDeliver:

1.  **Login:**
    *   Use the credentials from the seeders to log in.
2.  **Dashboard:**
    *   The dashboard provides an overview of ongoing projects and key project metrics.
3.  **User Management:**
    *   Navigate to the "Users" section to add, edit, or manage users.
    *   Assign roles to users based on their responsibilities.
4.  **Partner Management:**
    *   Go to the "Partners" section to add and manage subcontractors and suppliers.
5.  **Project Management:**
    *   Go to the "Projects" section to create and manage construction projects.
    *   Add project details and track their progress.
6.  **Item Management:**
    *   Use the "Items" section to define and manage project items.
7.  **Delivery Management:**
    *   Go to the "Deliveries" section to schedule and track item deliveries.
8.  **Schedule Management:**
    *   Use the "Schedules" section to create and maintain project schedules.
9.  **Daily Reporting:**
    *   Go to the "Daily Reports" section to submit daily reports on project activities.
10. **Item Partner Management**
    * Go to the "Item Partners" to manage the relation between items and partners.

11. **Gantt Chart**
    * Go to the `/gantt-chart` route to generate a Gantt Chart of the schedules.
11. **Delivery Item Management**
    * Go to the "Delivery Items" to manage the items that are part of a delivery.
12. **Activity Dependency Management**
    * Go to the "Activity Dependencies" to manage the dependencies between activities.
13. **Manpower entry management**
    * Go to the "Manpower entries" to keep track of manpower.

## Contributing

We welcome contributions from the community to help improve gcDeliver. If you're interested in contributing, please follow these guidelines:

1.  Fork the repository.
2.  Create a new branch for your feature or bug fix.
3.  Implement your changes.
4.  Submit a pull request with a clear description of your changes.

## Future Enhancements

We have plans to further enhance gcDeliver with the following features:

*   **Gantt Chart Integration:** Visualize project schedules with interactive Gantt charts.
*   **Resource Management:** Track and manage labor, equipment, and materials more efficiently.
*   **Document Management:** Upload and manage project-related documents and files.
*   **Cost Tracking:** Implement a module for tracking project costs and budgets.
* **Notifications:** Keep the users aware of any important event.
* **More Detailed Daily Reports:** Include more data about the daily work.
* **Mobile app:** Develop a mobile app for easier access.

## License

gcDeliver is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contact

If you have any questions, suggestions, or feedback, feel free to reach out to us at [contact@ibuildercode.com](mailto:contact@ibuildercode.com).