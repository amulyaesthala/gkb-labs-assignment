<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once 'db/db_connection.php';

            $db = Database::getInstance();
            $conn = $db->getConnection();

            // Process form submission
            $name = $_POST['name'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $dob = $_POST['dob'];

            // Validate age
            if (!is_numeric($age) || $age <= 0) {
                echo "<div class='alert alert-danger'>Age must be a positive integer.</div>";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='alert alert-danger'>Invalid email format.</div>";
            } else {
                // Insert data into database
                $sql = "INSERT INTO users (name, email, age, dob) VALUES ('$name', '$email', '$age', '$dob')";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>New record created successfully.</div>";
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                }
            }

            $conn->close();
        }
    ?>
    <div class="container">
        <div class="row mt-2 justify-content-md-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3>New User</h2>
                            <div>
                                <a href="index.php" class="btn btn-primary">Users List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="userForm">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" id="age" name="age" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" id="dob" name="dob" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div id="error" class="text-danger mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>
