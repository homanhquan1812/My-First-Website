<?php
    include "connection.php";
    if(!isset($_GET['pagination']))
    {
        $page = 1;
    }
    else
    {
        $page = $_GET['pagination'];
    }
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf=8">
    <title>Beautiful Wallpapers - Những hình nền đẹp đẽ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" href="https://as1.ftcdn.net/v2/jpg/02/37/99/02/1000_F_237990255_1aEQWdxPgdLMVlXEVdPllr1D5VBkmYde.jpg" type="image/x-icon" />
    <link href="StyleSheet1.css" rel="stylesheet" />
    <style>
        .page-numbers{
            display: inline-block;
        }
    </style>
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
                    <li><a href="index.php?page=products" class="nav-link px-2 text-white">Products</a></li>
                    <li><a href="index.php?page=tags" class="nav-link px-2 text-white">Tags</a></li>
                    <li><a href="index.php?page=faqs" class="nav-link px-2 text-secondary">FAQs</a></li>
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

    <br>

    <table align="center" border="1px">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Prices</th>
            <th>Product Image</th>
        </tr>
        
        <?php
            while ($row = mysqli_fetch_assoc($result))
            {
        ?>
                <tr>
                    <td><?php echo $row['productID']; ?></td>
                    <td><?php echo $row['productName']; ?></td>
                    <td><?php echo $row['prices']; ?></td>
                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['productImage']).'" style="width: 100%; height: 100px;" loading="lazy" alt="">'; ?></td>
                </tr>
                <?php
            }
        ?>

    </table>

    <br>

    <div class="page-number" style="text-align: center;">
        <?php 
            if(!isset($_GET['pagination'])){
               ?> <a style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" class="active" href="index.php?page=faqs&pagination=1">1</a> <?php
               $count_from = 2;
            }else{
               $count_from = 1;
            }
        ?>
        <?php
            for($counter = $count_from; $counter <= $pages; $counter++)
            {
                if($counter == @$_GET['pagination']) {
                    ?>
                        <a class="active" style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" href="index.php?page=faqs&pagination=<?php echo $counter ?>"><?php echo $counter ?></a>
                    <?php
                }
                else
                {
                    ?>
                    <a style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" href="index.php?page=faqs&pagination=<?php echo $counter ?>"><?php echo $counter ?></a> <?php
                }
            }
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    </body>
</html>