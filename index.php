<?php

// Get the page parameter from the URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Include the appropriate page based on the page parameter
switch ($page) {
    case 'home':
        include 'home.php';
        break;
    case 'about':
        include 'about.php';
        break;
    case 'products':
        include 'products.php';
        break;
    case 'faqs':
        include 'faqs.php';
        break;
    case 'tags':
        include 'tags.php';
        break;
    case 'login':
        include 'login.php';
        break;
}

?>