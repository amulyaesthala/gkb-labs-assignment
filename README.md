# User Management Web Application

This is a simple web application that allows users to input data, validate it, store it in a database, retrieve it, and display it in a table format.

## Setup Instructions

1. Clone the Repository:

    ```
    git clone https://github.com/amulyaesthala/gkb-labs-assignment
    ```

2. Database Setup:

    - Install XAMPP, which includes Apache, MySQL, PHP, and phpMyAdmin.
    - Start the Apache and MySQL services in XAMPP Control Panel.
    - Open phpMyAdmin (http://localhost/phpmyadmin) in your web browser.
    - Create a new database.
    - Execute the following SQL query to create the `users` table:

    ```sql
    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        age INT NOT NULL,
        dob DATE NOT NULL
    );
    ```

    - Update the database credentials in the `db/db_connection.php` file.

3. Start the Web Server:

    - Place the cloned repository folder inside the `htdocs` directory of XAMPP (e.g., `C:\xampp\htdocs\`).
    - Open a web browser and navigate to `http://localhost/gkb-labs-assignment` to access the user input form.

4. Access the Application:

    - In user list page click on create new user.
    - Fill out the form with valid user data and submit it.
    - After successful submission, you will be redirected to the user list page (`retrieve.php`) to view the stored user data.

## File Structure

- `index.php`: Retrieves data from the database and displays it in a tabular 
- `new-user.php`: Contains the user input form and handles form submission.     format,Processes the form submission and stores data in the database.
- `db/db_connection.php`: Contains the database connection logic.
- `scripts/script.js`: Contains form validation logic.
- `README.md`: This file providing setup instructions and information about the project.

## Requirements

- XAMPP
- Web browser

