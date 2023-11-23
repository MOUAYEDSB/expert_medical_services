# Medical Services Web Application

Welcome to the Medical Services Web Application, a comprehensive platform designed to streamline health service bookings and enhance communication with users.

![App Screenshot](https://us.123rf.com/450wm/drogatnev/drogatnev1702/drogatnev170200005/70914610-docteur-pointage-presse-papiers-m%C3%A9dical-carte-patient-illustration-vectorielle-dans-un-style.jpg?ver=6)


## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [File Structure](#file-structure)
- [Tech Stack](#tech-stack)
- [License](#license)
- [Authors](#Authors)

## Overview

The Medical Services Web Application provides a user-friendly interface for patients to seamlessly book health services, inquire through a contact form, and offers administrators an efficient dashboard for user management. With responsive design and robust functionality, this application ensures a smooth experience for users across various devices.

## Features

- **Booking System:** Allow patients to make and manage health service bookings effortlessly.
- **Contact Form:** Receive and respond to user inquiries through a user-friendly contact form.
- **Dashboard:** Provide administrators with a centralized dashboard for efficient management.
- **User Management:** Enable administrators to manage user roles, permissions, and delete users.
- **Responsive Design:** Ensure a seamless experience across a variety of devices and screen sizes.

## Installation

Prerequisites
WAMP Server: Ensure you have WAMP (or any other local server environment like XAMPP) installed on your machine. This provides the necessary PHP, MySQL, and Apache server.
Web Browser: Have a modern web browser installed on your system for testing.
Steps
1- Clone or download the repository:
```bash
git clone https://github.com/your-username/medical-services-app.git
```
2- Place the project files in the web server directory:

Move the downloaded project folder into the www directory of your WAMP installation. This directory typically resides within the WAMP installation folder (e.g., C:\wamp64\www).

3- Start WAMP Server:

Launch the WAMP Server application and ensure that both Apache and MySQL services are running.

4- Import database:

- Open phpMyAdmin (usually accessible via http://localhost/phpmyadmin).
- Create a new database for the application (e.g., medical_services_db).
 -Import the database schema using the provided SQL file located in the project (if available).

 5- Configure database connection:

- In the project's backend PHP files (e.g., config.php or any database connection files), update the database connection settings with your MySQL credentials (host, username, password, database_name).

6- Access the application:

- Open your web browser and navigate to http://localhost/medical-services-app (replace medical-services-app with the actual folder name if different) to access the application.

Additional Notes
- If you encounter any issues during installation or database setup, refer to the project's documentation or seek support.

## Usage
Accessing the Application

1- Local Access:

- Ensure that your WAMP Server is running.
- Open a web browser and navigate to http://localhost/medical-services-app (replace medical-services-app with the actual folder name if different).
2- Online Deployment:

- If the application is deployed online, provide the URL where users can access it.
### User Scenarios
Patient - Booking Health Services

1- Signing Up / Logging In:

- If required, sign up for an account or log in using existing credentials.

2- Booking Health Services:

- Navigate to the "Book Services" section.
- Choose the desired service, preferred date, and time.
- Confirm the booking and receive a confirmation message.
3- Managing Bookings:

- View and manage booked services in the user profile or dedicated dashboard.
Administrator - User Management

1- Accessing the Dashboard:

- Log in as an administrator with appropriate credentials.
2- Managing Users:

- Access the admin dashboard to view registered users.
- Edit user roles, permissions, or delete users as necessary.

Additional Functionality

- Contact Form:
  - Use the contact form to send inquiries or messages to the administrator.
Customization

- Customizing Health Services:
  - For future administrators, instructions on how to add, edit, or remove health services can be found in the admin panel.
Important Notes

- Highlight any important considerations or limitations users should be aware of while using the application.

- Provide any troubleshooting steps or common issues users might encounter and how to resolve them.
# File Structure

```bash
.medical-services-app/
│
├── css/
│   ├── styles.css         # CSS styles for the application
│   └── ...
│
│
├── php/
│   ├── config.php         # Configuration file for database connection
│   ├── index.php          # Main PHP file handling application logic
│   ├── contact.php        # PHP file handling contact form submissions
│   └── ...
│
├── db/
│   ├── migrations/        # Database migration scripts
│   ├── seeds/             # Seed data for initial database setup
│   └── ...
│
├── views/
│   ├── index.html         # Landing page of the application
│   ├── dashboard.html     # Admin dashboard HTML
│   ├── booking.html       # Page for booking health services
│   └── ...
│
├── assets/
│   ├── images/            # Image assets used in the application
│   ├── fonts/             # Font files
│   └── ...
│
├── .env.example           # Example environment variables file
├── README.md              # Project README file
└── ...
```
Description
- css/: Contains cascading style sheets (CSS) used for styling the application's web pages.
- php/: Backend PHP files responsible for server-side logic, database connections, and form handling.
- db/: Contains database-related files, including migration scripts and seed data.
- views/: HTML files representing different pages or views of the application.
- assets/: Houses image and font assets utilized within the application.
- .env.example: Sample file demonstrating the structure of environment variables needed for the application.

# Tech Stack

Backend

- PHP: Server-side scripting language used for backend development.
- MySQL: Relational database management system for data storage and retrieval.
- WAMP Server: Local server environment providing PHP, MySQL, and Apache services.
Frontend

- HTML: Markup language for structuring web pages.
- CSS: Styling language used for designing the application's visual presentation.
- JavaScript: Client-side scripting language for interactive functionalities.

Additional Tools and Libraries

- Bootstrap: Frontend framework for responsive and mobile-first web development.
- jQuery: JavaScript library for simplifying client-side scripting.
- PHPMailer: Library used for email functionality in PHP applications.
- Other: Any other relevant tools or libraries specific to your application.
Development Tools

- Git: Version control system for tracking changes and collaborating on the project.
- GitHub: Platform for hosting the project repository and managing collaboration.
- Visual Studio Code: Integrated Development Environment (IDE) for coding and editing files.
- phpMyAdmin: Web-based administration tool for managing MySQL databases.
Deployment

- WAMP Server Deployment: Local deployment using WAMP Server for testing and development purposes.
- Online Hosting: Potential deployment to online hosting services such as AWS, Heroku, or others.



# License

This project is licensed under the MIT License.


MIT License
```bash
MIT License

Copyright (c) [2023] [MOUAYEDSB , Ahmedtoukabri]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```
Explanation

This project is licensed under the MIT License, which allows users to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the software. It comes with no warranty and with limited liability for the software's authors or contributors.

Permissions
- Commercial use: Allowed
- Modification: Allowed
- Distribution: Allowed
- Private use: Allowed

## Authors

- [MOUAYED SABBAGH](https://github.com/MOUAYEDSB)
- [Touka01](https://github.com/Touka01)