<!DOCTYPE html>

<html>

<head>
    <meta charset="utf=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome back!</title>
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
                    <li><a href="index.php?page=home" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="index.php?page=products" class="nav-link px-2 text-white">Products</a></li>
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

    <div id="ajax">
        <h4>Hello, please press this button <button type="button" onclick="loadajax()">AJAX</button></h4>
    </div>

    <br>

    <div id="ajax-products">
        <h4>Click here to show products in XML <button type="button" onclick="ajaxproducts()">AJAX Products</button></h4>
    </div>

    <h1 style="color:red">Home</h1>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.511579595755!2d106.65532687469707!3d10.772074989376458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec3c161a3fb%3A0xef77cd47a1cc691e!2sHo%20Chi%20Minh%20City%20University%20of%20Technology%20(HCMUT)!5e0!3m2!1sen!2s!4v1683708924879!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap" /></svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">Copyright &copy; 2023 Ho Manh Quan. All right reserved.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script>
        function loadajax() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("ajax").innerHTML = this.responseText;
        }
        xhttp.open("GET", "ajax.txt");
        xhttp.send();
        }

        function ajaxproducts() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ajax-products").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "ajax_getproducts.php ", true);
        xhttp.send();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </body>
</html>