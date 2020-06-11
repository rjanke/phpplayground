<?php

// Get DB connection info
require_once("db_connection.php");

// Check if page request was a POST
if ( isset($_POST['name']) ) {

    try {
        // Get POST variables
        $name = $_POST['name'];
        $link = $_POST['link'];
        $description = $_POST['description'];

        // Prepare SQL
        $stmt = $dbcon->prepare("INSERT INTO cool_websites (name, link, description) VALUES (:name, :link, :description)");

        // Bind Parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':description', $description);

        // Execute SQL
        $stmt->execute();

        // Redirect to homepage
        header("Location: index.php");
    }
    catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Playground</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <h1>PHP Playground</h1>
        </div>

        <div class="row mt-5">
            <div class="col">

                <form action="add.php" method="post">

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Link</th>
                            <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="link">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="description">
                                </div>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mb-2">Add Cool Website</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>