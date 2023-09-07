<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

}


$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "blog_db";

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute a SELECT query to retrieve blog posts
$sql = "SELECT image_data, header, content, post_date, CONCAT('BY ', username) AS author FROM blog_posts";
$result = $conn->query($sql);


// Check if the query was successful
if (!$result) {
    die("Error retrieving blog posts: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body style="overflow: scroll;">
    <div class="container">
        <nav style="width: 100%; height: 80px;margin-top: 20px;background-color: black; color: red;padding-left: 10%;
        align-items: center;display: flex;justify-content: space-between;">
            <div>
                <h1>Blog</h1>
            </div>
            <div style="margin-right: 20px;">
                <button type="button" class="btn btn-primary"><a href="index.php" style="text-decoration: none; border-radius:13px;
                color: white; font-size: 20px;">Home</a></button>
                <button type="button" style="font-size: 20px;border-radius:13px" id="added" class="btn btn-primary">Add</button>
                <button type="button" style="font-size: 20px;border-radius:13px" id="edit" class="btn btn-primary">Edit</button>
                <button type="button" style="font-size: 20px;border-radius:13px" id="delete" class="btn btn-primary">Delete</button>
                <button type="button" class="btn btn-success"><a href="index.php" style="text-decoration: none; 
                color: white; font-size: 20px;">Logout</a></button>
            </div>
        </nav>
    </div>
    <div class="container mt-5 d-flex justify-content-around  flex-wrap" id="cardContainer">
        <?php
        // Loop through the results and display them as cards
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card" style="width:350px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 
            0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 30px;">';
            echo '<img class="card-img-top" src="'. $row['image_data'] .'" alt="Card image" 
            style="width:100%;height: 340px;">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">' . $row['header'] . '</h4>';
            echo '<p class="card-text">' . $row['content'] . '</p>';
            echo '<p style="font-size: 18px; font-weight: bold;">' . $row['post_date'] . ' &vert; ' . $row['author'] . '</p>';
            echo '</div></div>';
        }
        ?>

        <div style="font-size: 70px; margin-top: 30px;">
            <button style="border: none; width: 350px; height: 350px;" id="add" data-bs-toggle="modal"
                data-bs-target="#myModal">
                <i class="fa fa-plus-square-o" aria-hidden="true" style="font-size: 120px;"></i>
            </button>
        </div>
    </div>

    <!-- ADD -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Cards</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../blog/insert.php" method="post">
                        <div class=" mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="text" class="form-control" name="image" id="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="header" class="form-label">Header:</label>
                            <input type="text" class="form-control" name="header" id="header" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea class="form-control" name="content" id="content" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date:</label>
                            <input type="date" class="form-control" name="date" id="date" required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit -->
    <div class="modal fade" id="editmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Cards</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../blog/edit.php" method="post">
                        <div class=" mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="text" class="form-control" name="image" id="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="header" class="form-label">Header:</label>
                            <input type="text" class="form-control" name="header" id="header" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea class="form-control" name="content" id="content" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date:</label>
                            <input type="date" class="form-control" name="date" id="date" required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletemodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Cards</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../blog/delete.php" method="post">
                        <div class=" mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="header" class="form-label">Header:</label>
                            <input type="text" class="form-control" name="header" id="header" required>
                        </div>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById("add").addEventListener("click", function() {
        $("#myModal").modal("show");
    });

    document.getElementById("edit").addEventListener("click", function() {
        $("#editmodal").modal("show");
    });
    document.getElementById("delete").addEventListener("click", function() {
        $("#deletemodal").modal("show");
    });
    </script>
</body>

</html>