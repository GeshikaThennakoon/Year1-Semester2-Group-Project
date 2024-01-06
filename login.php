<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RecuirtME</title>
    <link rel="icon" type="image/rm-icon" href="image/titel.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <img class="logo" src="image/Recuirtme.png" alt="logo" width="160px">
        <nav>
            <ul class="nav__links">
                <li><a class="cta" href="#">Home</a></li>
                <li><a class="cta" href="#">Browse Jobs</a></li>
                <li><a class="cta" href="#">Recent Jobs</a></li>
                <li><a class="cta" href="#">Contact US</a></li>
            </ul>
        </nav>
        <a class="hbutton" href="#"><button>My Account</button></a>
        <a class="hbutton" href="#"><button>Post Jobs</button></a>
    </header>

    <br>
    <br>
    <br>

    <p>
        <div id="container">
            <h1>Login</h1>
            <form action="include/login.inc.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Login" name="submit">

                <div class="forgot-password">
                    <a href="forgot_password.php">Forgot Password?</a>
                </div>

                <div class="signup-link">
    <p align="center">Don't have an account? <a href="signup.php">Sign up</a></p>
</div>

            </form>
        </div>
    </p>

    <br>
    <br>
    <br>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Follow RecuirtME</h4>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Youtube</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Help & Support</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>About RecuirtME</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Download Our App</h4>
                    <ul>
                        <img src="image/GetApp1.png" alt="PlayStore" width="150px">
                        <img src="image/GetApp2.png" alt="App Store" width="150px">
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
