<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign into your account</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
    <?php
            $usernameErr = $passwordErr = "";
            $username = $password = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                    $username = test_input($_POST["username"]);
                    if (!preg_match("/^[a-z0-9A-Z]*$/", $username))
                    {
                        $usernameErr = "Only letters and numbers allowed.";
                    }
                    $password = test_input($_POST["password"]);
                    if (!preg_match("/^[a-z0-9A-Z]*$/", $password))
                    {
                        $passwordErr = "Only letters and numbers allowed.";
                    }

                // This line is to say either username or password is incorrect when the page doesn't change
                if (empty($usernameErr) && empty($passwordErr)) {
                    echo "Either username or password is incorrect, please check again.";
                }
            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form  method="POST" action="<?php include "login_processing.php";?>">
                        <h2>User Login</h2>

                        <div class="inputbox">
                            <input type="username" id="username" name="username" value="<?php echo $username;?>" placeholder=" ">
                            <span><?php if(isset($usernameErr)) echo $usernameErr; ?></span>
                            <label>Username</label>
                        </div>

                        <div class="inputbox">
                            <input type="password" id="password" name="password" value="<?php echo $password;?>" placeholder=" ">
                            <span><?php if(isset($passwordErr)) echo $passwordErr; ?></span>
                            <label>Password</label>
                        </div>

                        <button type="submit" name="submit" onclick="return validate()">Login</button>

                        <div class="register">
                            <p>Don't have an account? <a href="#">Click here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script>
            function validate() {
                let username = document.getElementById("username").value;
                let password = document.getElementById("password").value; 
                //var nameRegex = /^[a-zA-Z0-9]*$/;
                if (username == "")
                {
                    alert("The username is empty, please check again.");
                    return false;
                }
                if (password == "")
                {
                    alert("The password is empty, please check again.");
                    return false;
                }                
                //if (!nameRegex.test(username))
                //{
                //    alert("Only letters and numbers allowed in username.");
                //    return false;
                //}
                //if (!nameRegex.test(password))
                //{
                //    alert("Only letters and numbers allowed in password.");
                //    return false;
                //}
                return true;
            }
        </script>
    </body>
</html>