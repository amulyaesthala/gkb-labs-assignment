<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Retrieval</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row mt-2 justify-content-md-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Users</h2>
                            <div>
                                <a href="new-user.php" class="btn btn-primary">Create New User</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            <?php
                                require_once 'db/db_connection.php';

                                $db = Database::getInstance();
                                $conn = $db->getConnection();

                                // Retrieve data from database
                                $sql = "SELECT * FROM users";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    echo "<table class='table'>
                                        <thead class='thead-dark'>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Age</th>
                                                <th>Date of Birth</th>
                                            </tr>
                                        </thead>
                                        <tbody>";

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td>" . $row['id'] . "</td>
                                            <td>" . $row['name'] . "</td>
                                            <td>" . $row['email'] . "</td>
                                            <td>" . $row['age'] . "</td>
                                            <td>" . $row['dob'] . "</td>
                                        </tr>";
                                    }

                                    echo "</tbody></table>";
                                } else {
                                    echo "0 results";
                                }

                                $conn->close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
    </div>
</body>
</html>