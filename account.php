<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - ScentAura</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="account-page">
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="hamburger" id="hamburger">☰</div>
        <div class="logo">ScentAura</div>

        <ul class="nav-links" id="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="#about">About Us</a></li>
        </ul>

        <div class="nav-actions">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search perfumes...">
                <div id="search-suggestions" class="search-suggestions"></div>
                <i class="fa fa-search"></i>
            </div>
            <div class="cart">
                <a href="cart.html" style="text-decoration: none; color: inherit;">
                    <i class="fa fa-shopping-cart"></i>
                    <span id="cart-count" class="cart-badge">0</span>
                </a>
            </div>
            <div class="account">
                <a href="account.html" style="text-decoration: none; color: inherit;">
                    <i class="fa fa-user"></i>
                </a>
            </div>
        </div>
    </nav>
    <!-- ACCOUNT SECTION -->
    <section class="account-container">

        <div class="account-card liquid-glass">

            <!-- TOP -->
            <div class="account-top">

                <div class="account-icon">
                    <i class="fa fa-user"></i>
                </div>

                <h1>Welcome Back</h1>

                <p>
                    Login to continue your luxury fragrance experience.
                </p>

            </div>

            <!-- FORM -->
            <form class="account-form" id="login-form">

                <div class="input-group signup-field" style="display:none;">
                    <i class="fa fa-user"></i>
                    <input type="text" id="username" placeholder="Username">
                </div>

                <div class="input-group">
                    <i class="fa fa-envelope"></i>

                    <input type="email" placeholder="Email Address" required>
                </div>

                <div class="input-group">
                    <i class="fa fa-lock"></i>

                    <input type="password" placeholder="Password" required>
                </div>

                <div class="account-options">

                    <label>
                        <input type="checkbox">
                        Remember me
                    </label>

                    <a href="#">Forgot Password?</a>

                </div>

                <button type="submit" class="account-btn">
                    Login
                </button>

            </form>

            <!-- BOTTOM -->
            <div class="account-bottom">
                <p>
                    Don't have an account?
                    <a href="#" id="toggle-form">Create Account</a>
                </p>
            </div>

        </div>

    </section>

    <script src="script.js"></script>

</body>

</html>