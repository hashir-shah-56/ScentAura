document.addEventListener("DOMContentLoaded", () => {

    // ===== ELEMENTS =====
    const hamburger = document.getElementById("hamburger");
    const navLinks = document.getElementById("nav-links");

    const searchBox = document.querySelector(".search-box");
    const searchIcon = searchBox?.querySelector("i");
    const searchInput = searchBox?.querySelector("input");
    // ===== URL PARAMETERS =====
    const params = new URLSearchParams(window.location.search);

    const openSearch = params.get("openSearch");

    const queryParam = params.get("search");

    // Auto-open search on shop page
    if (
        openSearch === "true" &&
        searchBox &&
        searchInput
    ) {

        searchBox.classList.add("active");

        setTimeout(() => {
            searchInput.focus();
        }, 100);
    }

    const products = document.querySelectorAll(".product-card");
    const suggestionsBox = document.getElementById("search-suggestions");
    const shopGrid = document.querySelector(".shop-grid");

    // ===== NAVBAR TOGGLE =====
    if (hamburger && navLinks) {
        hamburger.addEventListener("click", (e) => {
            e.stopPropagation();
            navLinks.classList.toggle("active");
        });
    }

    // ===== SEARCH TOGGLE =====
    if (searchIcon && searchBox && searchInput) {
        // ===== GLOBAL SEARCH REDIRECT =====
        // ===== SEARCH ICON FUNCTION =====
        if (searchIcon && searchBox && searchInput) {

            searchIcon.addEventListener("click", (e) => {

                e.stopPropagation();

                // Check if NOT on shop page
                const isShopPage =
                    window.location.pathname.includes("shop.html");

                // Redirect to shop page
                if (!isShopPage) {

                    window.location.href = "shop.html?openSearch=true";

                    return;
                }

                // NORMAL SHOP PAGE BEHAVIOR
                searchBox.classList.toggle("active");

                if (searchBox.classList.contains("active")) {
                    searchInput.focus();
                }
            });
        }
    }

    // ===== SEARCH FUNCTIONALITY =====
    if (searchInput && suggestionsBox && shopGrid) {



        // ===== AUTO SEARCH FROM URL =====
        const params = new URLSearchParams(window.location.search);

        const query = params.get("search");

        if (query) {

            searchInput.value = query;
        }

        // Create no-results element
        const noResults = document.createElement("p");
        noResults.classList.add("no-results");
        noResults.textContent = "No perfumes found.";

        searchInput.addEventListener("input", () => {

            const value = searchInput.value.toLowerCase().trim();

            let matches = 0;

            // Clear suggestions
            suggestionsBox.innerHTML = "";

            products.forEach(product => {

                const title =
                    product.querySelector(".card-title")
                        .textContent
                        .toLowerCase();

                const desc =
                    product.querySelector(".card-desc")
                        .textContent
                        .toLowerCase();

                const searchableText = title + " " + desc;

                // ===== MATCH FOUND =====
                if (searchableText.includes(value)) {

                    product.style.display = "flex";
                    matches++;

                    // ===== CREATE SUGGESTION =====
                    if (value !== "") {

                        const suggestion = document.createElement("div");

                        suggestion.textContent =
                            product.querySelector(".card-title").textContent;

                        suggestion.addEventListener("click", () => {

                            searchInput.value =
                                product.querySelector(".card-title").textContent;

                            suggestionsBox.style.display = "none";

                            product.scrollIntoView({
                                behavior: "smooth",
                                block: "center"
                            });
                        });

                        // Prevent duplicate suggestions
                        const existingSuggestions =
                            [...suggestionsBox.children]
                                .map(el => el.textContent);

                        if (!existingSuggestions.includes(suggestion.textContent)) {
                            suggestionsBox.appendChild(suggestion);
                        }
                    }

                } else {

                    product.style.display = "none";
                }
            });

            // ===== SHOW/HIDE DROPDOWN =====
            if (value !== "" && suggestionsBox.children.length > 0) {

                suggestionsBox.style.display = "block";

            } else {

                suggestionsBox.style.display = "none";
            }

            // ===== NO RESULTS =====
            const existingNoResults =
                document.querySelector(".no-results");

            if (matches === 0 && value !== "") {

                if (!existingNoResults) {
                    shopGrid.after(noResults);
                }

            } else {

                if (existingNoResults) {
                    existingNoResults.remove();
                }
            }

            // ===== RESET ALL =====
            if (value === "") {

                products.forEach(product => {
                    product.style.display = "flex";
                });

                suggestionsBox.style.display = "none";

                if (existingNoResults) {
                    existingNoResults.remove();
                }
            }
        });
        // Trigger filtering automatically
        if (query) {
            searchInput.dispatchEvent(new Event("input"));
        }
    }

    // ===== GLOBAL CLICK =====
    document.addEventListener("click", (e) => {

        // ===== CLOSE NAVBAR =====
        if (navLinks && hamburger) {

            const insideMenu = navLinks.contains(e.target);
            const onHamburger = hamburger.contains(e.target);

            if (!insideMenu && !onHamburger) {
                navLinks.classList.remove("active");
            }
        }

        // ===== CLOSE SEARCH =====
        if (searchBox && !searchBox.contains(e.target)) {

            searchBox.classList.remove("active");

            if (suggestionsBox) {
                suggestionsBox.style.display = "none";
            }
        }
    });

    // ===== INIT =====
    updateCartCount();
    renderCart();
    renderCheckout();
    handleCheckout();
});


// ===================================================
// CART SYSTEM
// ===================================================

// Initialize cart from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// ===== TOAST NOTIFICATION =====
function showToast(message) {

    const toast = document.getElementById("toast");

    if (!toast) return;

    toast.textContent = message;

    // restart animation properly
    toast.classList.remove("show");

    void toast.offsetWidth; // force reflow (important trick)

    toast.classList.add("show");
}

function addToCart(name, price) {

    const existingItem =
        cart.find(item => item.name === name);

    if (existingItem) {

        existingItem.quantity += 1;

    } else {

        cart.push({
            name,
            price,
            quantity: 1
        });
    }

    saveCart();
    updateCartCount();

    showToast(`${name} added to cart!`);
}

function updateCartCount() {

    const totalItems =
        cart.reduce((sum, item) => sum + item.quantity, 0);

    const cartCountEl =
        document.getElementById('cart-count');

    if (!cartCountEl) return;

    if (totalItems > 0) {

        cartCountEl.style.display = "flex";

        cartCountEl.textContent =
            totalItems > 9 ? "9+" : totalItems;

    } else {

        cartCountEl.style.display = "none";
    }
}


// ===================================================
// CART PAGE
// ===================================================

function renderCart() {

    const cartItemsContainer =
        document.getElementById('cart-items');

    const cartTotalContainer =
        document.getElementById('cart-total');

    if (!cartItemsContainer) return;

    cartItemsContainer.innerHTML = '';

    let total = 0;

    if (cart.length === 0) {

        cartItemsContainer.innerHTML =
            `<p>Your cart is currently empty.</p>`;

        if (cartTotalContainer) {
            cartTotalContainer.textContent = '0';
        }

        return;
    }

    cart.forEach((item, index) => {

        const itemTotal =
            item.price * item.quantity;

        total += itemTotal;

        cartItemsContainer.innerHTML += `
            <div class="cart-item">

                <div class="cart-item-details">
                    <h4>${item.name}</h4>
                    <p>Rs. ${item.price}</p>
                </div>

                <div class="cart-item-actions">

                    <button onclick="updateQuantity(${index}, -1)">-</button>

                    <span>${item.quantity}</span>

                    <button onclick="updateQuantity(${index}, 1)">+</button>

                    <button class="remove-btn"
                        onclick="removeFromCart(${index})">
                        Remove
                    </button>

                </div>

                <div class="cart-item-price">
                    <p>Rs. ${itemTotal}</p>
                </div>

            </div>
        `;
    });

    if (cartTotalContainer) {
        cartTotalContainer.textContent = total;
    }
}

function updateQuantity(index, change) {

    if (cart[index]) {

        cart[index].quantity += change;

        if (cart[index].quantity <= 0) {
            cart.splice(index, 1);
        }

        saveCart();
        renderCart();
        updateCartCount();
    }
}

function removeFromCart(index) {

    if (cart[index]) {

        cart.splice(index, 1);

        saveCart();
        renderCart();
        updateCartCount();
    }
}


// ===================================================
// CHECKOUT PAGE
// ===================================================

function renderCheckout() {

    const container =
        document.getElementById("checkout-items");

    const totalEl =
        document.getElementById("checkout-total");

    if (!container || !totalEl) return;

    container.innerHTML = "";

    let total = 0;

    if (cart.length === 0) {

        container.innerHTML =
            "<p>Your cart is empty.</p>";

        totalEl.textContent = "0";

        return;
    }

    cart.forEach(item => {

        const itemTotal =
            item.price * item.quantity;

        total += itemTotal;

        container.innerHTML += `
            <p>
                ${item.name} x ${item.quantity}
                — Rs. ${itemTotal}
            </p>
        `;
    });

    totalEl.textContent = total;
}


// ===================================================
// HANDLE CHECKOUT
// ===================================================

function handleCheckout() {

    const btn =
        document.getElementById("place-order-btn");

    if (!btn) return;

    btn.addEventListener("click", () => {

        const name =
            document.getElementById("name")?.value;

        const email =
            document.getElementById("email")?.value;

        const address =
            document.getElementById("address")?.value;

        const city =
            document.getElementById("city")?.value;

        // ===== VALIDATION =====
        if (!name || !email || !address || !city) {

            alert("Please fill all fields");

            return;
        }

        // ===== EMPTY CART =====
        if (cart.length === 0) {

            alert("Your cart is empty");

            return;
        }

        // ===== PROCESS ORDER =====
        alert("Processing your order...");

        setTimeout(() => {

            alert("Order placed successfully!");

            // Clear cart
            cart = [];

            localStorage.removeItem("cart");

            // Update UI
            updateCartCount();

            // Redirect
            window.location.href = "index.html";

        }, 1200);
    });
}