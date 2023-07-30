<!DOCTYPE html>

<html>
<head>
    <meta charset="utf=8">
    <title>Beautiful Wallpapers - Những hình nền đẹp đẽ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" href="https://as1.ftcdn.net/v2/jpg/02/37/99/02/1000_F_237990255_1aEQWdxPgdLMVlXEVdPllr1D5VBkmYde.jpg" type="image/x-icon" />
    <link href="StyleSheet1.css" rel="stylesheet" />
</head>

<body>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap" /></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php?page=home" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="index.php?page=products" class="nav-link px-2 text-secondary">Products</a></li>
                    <li><a href="index.php?page=tags" class="nav-link px-2 text-white">Tags</a></li>
                    <li><a href="index.php?page=faqs" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="index.php?page=about" class="nav-link px-2 text-white">About</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <button onclick="document.location='index.php?page=login'" type="button" class="btn btn-outline-light me-2">Login</button>
                    <button type="button" class="btn btn-warning">Register</button>
                </div>
            </div>
        </div>
    </header>


    <h1 style="color:red">Products</h1>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap" /></svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">Copyright &copy; 2023 Ho Manh Quan. All right reserved.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <?php

    /* Create a database named OnlineStore */

    $host = "localhost";
    $user = "root";
    $password = null;

    $connect = new mysqli($host,$user,$password);

    $command = "Create database OnlineStore";

    $result = $connect->query($command);

    if($result = true)
    {
        echo "Database created.\n";
        echo "<br>";
    }
    else
    {
        echo die(mysqli_error($connect));
    }

    echo "<br>";

    /* Create two tables named Products and Users */

    $db = "onlinestore";

    $connect = mysqli_connect($host,$user,$password,$db);

    if($connect === false){
        die("ERROR: Could not connect." . mysqli_connect_error());
    }
 
    $sql1 = "CREATE TABLE products
    (
        productID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        productName VARCHAR(30) NOT NULL,
        prices int
    )";

    $sql2 = "CREATE TABLE users
    (
        username VARCHAR(30) NOT NULL,
        password VARCHAR(100) NOT NULL
    )";

    if(mysqli_query($connect, $sql1)){
        echo "\nTable Products created successfully.";
        echo "<br>";
    } else{
        echo "ERROR: Could not able to execute $sql1. " . mysqli_error($connect);
    }

    if(mysqli_query($connect, $sql2)){
        echo "\nTable Users created successfully.\n";
        echo "<br>";
    } else{
        echo "ERROR: Could not able to execute $sql2. " . mysqli_error($connect);
    }

    echo "<br>";

    /* Insert new products */

    // Prepare the SQL statement to insert a new product

    $productID = "123";
    $productName = "Dell Inspiron 3580";
    $prices = 22390000;

    $sql3 = "INSERT INTO products (productID, productName, prices) VALUES ('$productID', '$productName', '$prices')";

    // Execute the SQL statement
    if ($connect->query($sql3) === TRUE) {
        echo "New product 1 created successfully. ProductID is: " . $productID . ", ProductName is: " . $productName . " and Price is: " . $prices . "\n";
        echo "<br>";
    } else {
        echo "Error: " . $sql3 . "<br>" . $connect->error;
    }

    $productID = "234";
    $productName = "Dell Inspiron 3578";
    $prices = 21790000;

    $sql4 = "INSERT INTO products (productID, productName, prices) VALUES ('$productID', '$productName', '$prices')";

    // Execute the SQL statement
    if ($connect->query($sql4) === TRUE) {
        echo "New product created successfully. ProductID is: " . $productID . ", ProductName is: " . $productName . " and Price is: " . $prices . "\n";
        echo "<br>";
    } else {
        echo "Error: " . $sql4 . "<br>" . $connect->error;
    }

    echo "<br>";

    /* Insert new users */

    $username = "homanhquan";
    $password = "homanhquan1812";
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql4 = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    // Execute the SQL statement
    if ($connect->query($sql4) === TRUE) {
        echo "New user account " . $username . " created successfully.\n";
        echo "<br>";
        echo "Your password is: " . $password . " and the hashed password stored on database is: " . $hashed_password . ".";
    } else {
        echo "Error: " . $sql4 . "<br>" . $connect->error;
    }

    // Close connection
    mysqli_close($connect);

    ?>

    </body>
</html>