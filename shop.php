<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - ScentAura</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="shop-page">

    <!-- NAVBAR -->
    <nav class="navbar shop-navbar">
        <div class="hamburger" id="hamburger">☰</div>
        <div class="logo">ScentAura</div>

        <ul class="nav-links" id="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="shop.html" class="active">Shop</a></li>
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

    <!-- SHOP HEADER -->
    <header class="shop-header">
        <h1>Our Collection</h1>
        <p>Explore our exclusive range of luxury fragrances crafted for timeless elegance.</p>
    </header>

    <!-- PRODUCT GRID -->
    <main class="shop-container">
        <div class="shop-grid">

            <!-- Product 1 -->
            <div class="product-card">
                <img src="Images/mockup-free-aFc2jaraI28-unsplash.jpg" alt="Black Noir" class="card-image">
                <div class="card-content">
                    <h3 class="card-title">Black Noir</h3>
                    <p class="card-desc">A blend of smoky oud and warm spices. Deep, rich fragrance crafted for bold
                        personalities.</p>
                    <div class="card-bottom">
                        <span class="card-price">Rs. 8500</span>
                        <button class="card-btn"
                            onclick="addToCart('Black Noir', 8500, 'Images/mockup-free-aFc2jaraI28-unsplash.jpg', 'A blend of smoky oud and warm spices. Deep, rich fragrance crafted for bold personalities.')">Add
                            to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card">
                <img src="Images/maxim-lozyanko-qFsxwpoDIB4-unsplash.jpg" alt="Rose Essence" class="card-image">
                <div class="card-content">
                    <h3 class="card-title">Rose Essence</h3>
                    <p class="card-desc">A delicate fusion of fresh roses and soft floral notes. Light, graceful, and
                        timeless.</p>
                    <div class="card-bottom">
                        <span class="card-price">Rs. 9500</span>
                        <button class="card-btn"
                            onclick="addToCart('Rose Essence', 9500, 'Images/maxim-lozyanko-qFsxwpoDIB4-unsplash.jpg', 'A delicate fusion of fresh roses and soft floral notes. Light, graceful, and timeless.')">Add
                            to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card">
                <img src="Images/hamza-nouasria-Kf4gB2rslgQ-unsplash.jpg" alt="Midnight Musk" class="card-image">
                <div class="card-content">
                    <h3 class="card-title">Midnight Musk</h3>
                    <p class="card-desc">A mysterious composition of musk and dark woody accords. Smooth and deeply
                        captivating.</p>
                    <div class="card-bottom">
                        <span class="card-price">Rs. 10500</span>
                        <button class="card-btn"
                            onclick="addToCart('Midnight Musk', 10500, 'Images/hamza-nouasria-Kf4gB2rslgQ-unsplash.jpg', 'A mysterious composition of musk and dark woody accords. Smooth and deeply captivating.')">Add
                            to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="product-card">
                <img src="Images/luxury-black-perfume-bottle-with-gold-cap-dark-textured-background.jpg"
                    alt="Golden Oudh" class="card-image">
                <div class="card-content">
                    <h3 class="card-title">Golden Oudh</h3>
                    <p class="card-desc">Luxurious golden sandalwood infused with rare oudh. The pinnacle of royal
                        fragrance.</p>
                    <div class="card-bottom">
                        <span class="card-price">Rs. 12000</span>
                        <button class="card-btn"
                            onclick="addToCart('Golden Oudh', 12000, 'Images/luxury-black-perfume-bottle-with-gold-cap-dark-textured-background.jpg', 'Luxurious golden sandalwood infused with rare oudh. The pinnacle of royal fragrance.')">Add
                            to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="product-card">
                <img src="Images/jessica-weiller-So4eFi-d1nc-unsplash.jpg" alt="Vanilla Twilight" class="card-image">
                <div class="card-content">
                    <h3 class="card-title">Vanilla Twilight</h3>
                    <p class="card-desc">Sweet Madagascar vanilla mixed with hints of toasted almonds and caramel.</p>
                    <div class="card-bottom">
                        <span class="card-price">Rs. 7500</span>
                        <button class="card-btn"
                            onclick="addToCart('Vanilla Twilight', 7500, 'Images/jessica-weiller-So4eFi-d1nc-unsplash.jpg', 'Sweet Madagascar vanilla mixed with hints of toasted almonds and caramel.')">Add
                            to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="product-card">
                <img src="Images/265867162716.jpg" alt="Citrus Whisper" class="card-image">
                <div class="card-content">
                    <h3 class="card-title">Citrus Whisper</h3>
                    <p class="card-desc">Fresh bergamot and lemon blended seamlessly with white tea. A refreshing
                        daytime scent.</p>
                    <div class="card-bottom">
                        <span class="card-price">Rs. 6000</span>
                        <button class="card-btn"
                            onclick="addToCart('Citrus Whisper', 6000, 'Images/265867162716.jpg', 'Fresh bergamot and lemon blended seamlessly with white tea. A refreshing daytime scent.')">Add
                            to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="product-card">
                <img src="Images/Gemini_Generated_Image_3digz73digz73dig.png" alt="Velvet Amber" class="card-image">
                <div class="card-content">
                    <h3 class="card-title">Velvet Amber</h3>
                    <p class="card-desc">Warm amber crystals melted into a base of soft patchouli and aged leather.</p>
                    <div class="card-bottom">
                        <span class="card-price">Rs. 11000</span>
                        <button class="card-btn"
                            onclick="addToCart('Velvet Amber', 11000, 'Images/Gemini_Generated_Image_3digz73digz73dig.png', 'Warm amber crystals melted into a base of soft patchouli and aged leather.')">Add
                            to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="product-card">
                <img src="Images/mockup-free-vAQ5H6LSEWQ-unsplash.jpg" alt="Ocean Breeze" class="card-image">
                <div class="card-content">
                    <h3 class="card-title">Ocean Breeze</h3>
                    <p class="card-desc">Crisp sea salt and marine notes layered with fresh aquatic elements.</p>
                    <div class="card-bottom">
                        <span class="card-price">Rs. 6500</span>
                        <button class="card-btn"
                            onclick="addToCart('Ocean Breeze', 6500, 'Images/mockup-free-vAQ5H6LSEWQ-unsplash.jpg', 'Crisp sea salt and marine notes layered with fresh aquatic elements.')">Add
                            to Cart</button>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="footer">

        <div class="footer-container">

            <div class="footer-left">
                <h2 id="about">About Us</h2>
                <p>Luxury fragrances crafted for timeless elegance.</p>
                <br>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                </ul>
            </div>

            <div class="footer-right">
                <h3>Contact</h3>
                <p>Email: info@scentaura.com</p>
                <p>Phone: +92 300 1234567</p>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2026 ScentAura | All Rights Reserved</p>
        </div>

    </footer>

    <div id="toast" class="toast glass">
        Added to cart
    </div>

    <script src="script.js" defer></script>
</body>

</html>