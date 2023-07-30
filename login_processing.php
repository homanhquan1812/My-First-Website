<?php
// Establish database connection
$host = "localhost";
$user = "root";
$password = null;
$db = "onlinestore";

$connect = mysqli_connect($host,$user,$password,$db);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Check if user submitted the form
if (isset($_POST['submit']))
{
    // Sanitize user input to prevent SQL injection
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    // Retrieve hashed password from database
    $sql = "SELECT password FROM users WHERE username='$username'";
    $result = $connect->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        // Verify user's credentials
        if (password_verify($password, $hashed_password)) {
            // Create a session for the user and redirect to secured page
            session_start();
            setcookie("username", $username, time() + 3600, "/"); // Send cookie(s) to user machine
            // The cookie will be automatically deleted from the user's browser after 1 hour (3600s).
            // Setting a cookie with an expiration time of 1 hour does not mean that the user can only use the website for 1 hour.
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username; // Assign the username to the session variable
            header("Location: logout.php");
            exit;
        }     
        else {
            // Display error message
            echo "Invalid username or password.";
        }
    }
}

// Close database connection
$connect->close();
?>
