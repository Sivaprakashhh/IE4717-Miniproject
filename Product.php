<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product</title>
<link rel="stylesheet" href="styles.css">
<style>
nav ul li a{
text-decoration: none;
color: black;
}
.logo-text a {
    font-size: 60px;
    font-weight: bold;
    color: #ECE52C;
    font-family: Arial, sans-serif;
    text-decoration: none; /* This removes the underline on the link */
}
.logo a{
    text-decoration: none;
}

.logo-text a:hover {
    color: #D4C300; /* Optional: Change color on hover */
}

/* Main Content Styling */
.main-content {
display: flex;
gap: 80px;
padding: 40px;
align-items: start;
margin-top: 20px;
}
.product-image {
width: 40%;

}
.product-image img {
width: 80%;
border-radius: 8px;

}
.product-details {
width: 50%;
}
.product-description {
font-size: 18px;
margin-bottom: 15px;
}
.rating {
display: flex;
align-items: center;
gap: 5px;
margin: 10px 0;
}
.star {
color: gold;
font-size: 20px;
}
.star-grey {
color: #ccc;
font-size: 20px;
}
.color-options {
display: flex;
gap: 10px;
margin-bottom: 15px;
}
.color-option {
width: 40px;
height: 40px;
border-radius: 50%;
cursor: pointer;
border: 2px solid #ccc; /* Default border color */
transition: border-color 0.3s;
}

.color-option.selected {
    border-color: #006EE4; /* Border color for the selected color option */
}
.quantity-controls {
display: flex;
align-items: center;
gap: 10px;
margin-bottom: 15px;
}
.quantity-controls button {
padding: 5px 10px;
font-size: 16px;
cursor: pointer;
}
.add-to-cart {
padding: 10px 20px;
font-size: 16px;
font-weight: bold;
background-color: #ECE52C;
color: rgb(0, 0, 0);
border: none;
border-radius: 5px;
cursor: pointer;
}

</style>
</head>
<body>
<?php session_start(); ?>
    <!-- Header -->
    <header>
        <div class="logo">
            <a href="Homepage.php">
                <span class="logo-text">TeX</span>
            </a>
        </div>
        <div class="search-container">
        <div class="search-bar">
            <form action="search.php" method="POST">
                <input type="text" name="query" placeholder="Search for products">
                <button type="submit">
                    <img src="Images/Others/search.png" alt="Search Icon" class="search-icon">
                </button>
            </form> 
            <?php if (isset($_SESSION['user_id'])): ?>
            <div class="welcome-message">
                Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?>
            </div>
        </div>
        </div>
        <div class="user-cart">
        <!-- Show User Profile or Login depending on the session status -->
            <a href="Account.php">
                <div class="login">
                    <img src="Images/Others/user.png" alt="User Icon" class="icon">
                    <div class="text">User Profile</div>
                </div>
            </a>
        <?php else: ?>
            <a href="Login.php" style="text-decoration: none;">
                    <div class="login" style="margin-left:500px; margin-right:10px;">
                        <img src="Images/Others/user.png" alt="User Icon" class="icon">
                        <div class="text" style="font-size: 16px; color: black; margin-right:10px;">Login</div>
                    </div>
                </a>
            <?php endif; ?>
            
            <a href="Cart.php" style="text-decoration: none;">
                <div class="cart">
                    <img src="Images/Others/cart.png" alt="Cart Icon" class="icon">
                    <div class="text" style="font-size: 16px; color: black;">Cart(0)</div>
                </div>
            </a>
        </div>
    </header>

<!-- Navigation Bar -->
<nav>
    <ul>
        <li><a href="Store.php" style="color: black;">Store</a></li>
        <li><a href="TV.php" style ="color: black">TV</a></li>
        <li><a href="Laptops-PCs.php" style ="color: black;">Laptops & PCs</a></li>
        <li><a href="Smartphones.php" style="color: black;">Smartphones</a></li>
        <li><a href="Contact.php" style="color: black;">Contact</a></li>
    </ul>
</nav>

    <div class="main-content">
        <!-- Product Image -->
        <div class="product-image">
            <img src="TV1.jpg" alt="Product Image">
        </div>

        <!-- Product Details -->
        <div class="product-details">
            <div class="product-description">
                <h2>TeX TV</h2>
                <p>Model: XXX</p>
                
                <!-- Rating -->
                <div class="rating">
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star-grey">&#9733;</span>
                </div>
            </div>

           <!-- Color Options -->
           <div class="color-options" id="color-options">
            <!-- Dynamic color options will be added here by JavaScript -->
        </div>

            <!-- Quantity Selector -->
            <div class="quantity-controls">
                <button onclick="decreaseQuantity()">-</button>
                <span id="quantity">1</span>
                <button onclick="increaseQuantity()">+</button>
            </div>

            <!-- Add to Cart Button -->
            <button class="add-to-cart">ADD TO CART</button>
        </div>
    </div>

    <footer class="footer">
        &copy; 2024 TeX
    </footer>

    <script>

    // Define product data (this could also come from a database or API in a real-world app)
    const products = {
        "TeX-TV-XXX": {
            name: "TeX TV XXX",
            model: "XXX",
            image: "Images/TV/image 2.png",
            rating: 5,
            colors: ["black", "blue"]
            
        },
        "Prism-Google-TV": {
            name: "Prism Google TV",
            model: "Google TV",
            image: "Images/TV/prism+.png",
            rating: 4,
            colors: ["black", "grey"]
        },
        "Windows-ULTRA-TV": {
            name: "Windows ULTRA TV",
            model: "Ultra",
            image: "Images/TV/windowsultra.png",
            rating: 3,
            colors: ["black", "white"]
        },
        "Samsung-OLED-TV": {
            name: "Samsung OLED TV",
            model: "OLED",
            image: "Images/TV/samsungoled.png",
            rating: 5,
            colors: ["black", "grey"]
        },
        "LG-4K-TV": {
            name: "LG 4K TV",
            model: "4K",
            image: "Images/TV/lg4k.png",
            rating: 4,
            colors: ["black", "white"]
        },
        "Tex-Crystal-Plus": {
            name: "TeX Crystal Plus",
            model: "Crystal Plus",
            image: "Images/TV/image 2.png",
            rating: 5,
            colors: ["black", "grey"]
        },
    // New smartphone products
        "IPhone-16": {
            name: "IPhone 16",
            model: "16",
            image: "Images/Smartphones/iphone16.png",
            rating: 5,
            colors: ["black", "pink"]
        },
        "IPhone-16-Plus": {
            name: "IPhone 16 Plus",
            model: "16 Plus",
            image: "Images/Smartphones/iphone16plus.png",
            rating: 5,
            colors: ["black", "blue"]
        },
        "IPhone-15": {
            name: "IPhone 15",
            model: "15",
            image: "Images/Smartphones/iphone15.png",
            rating: 4,
            colors: ["black", "purple"]
        },
        "Samsung-Galaxy": {
            name: "Samsung Galaxy",
            model: "Galaxy",
            image: "Images/Smartphones/samsunggalaxy.png",
            rating: 3,
            colors: ["black", "grey"]
        },
        "Google-Pixel-4": {
            name: "Google Pixel 4",
            model: "Pixel 4",
            image: "Images/Smartphones/googlepixel.png",
            rating: 3,
            colors: ["black", "white"]
        },
        "Oppo-Reno-17": {
            name: "Oppo Reno 17",
            model: "Reno 17",
            image: "Images/Smartphones/opporeno.png",
            rating: 4,
            colors: ["black", "grey"]
        },
  // Laptop and Monitor products
  "TeX-Laptop": {
            name: "TeX Laptop",
            model: "Laptop",
            image: "Images/Laptop/image 1.png",
            rating: 5,
            colors: ["black", "grey"]
        },
        "LG-Laptop": {
            name: "LG Laptop",
            model: "Laptop",
            image: "Images/Laptop/lg.png",
            rating: 4,
            colors: ["black", "grey"]
        },
        "Razer-Gaming-Laptop": {
            name: "Razer Gaming Laptop",
            model: "Gaming",
            image: "Images/Laptop/razergaming.png",
            rating: 4,
            colors: ["black", "grey"]
        },
        "Samsung-Curved-Monitor": {
            name: "Samsung Curved Monitor",
            model: "Curved Monitor",
            image: "Images/Laptop/samsungcurved.png",
            rating: 4,
            colors: ["black", "grey"]
        },
        "Acer-Monitor": {
            name: "Acer Monitor",
            model: "Monitor",
            image: "Images/Laptop/acermonitor.png",
            rating: 3,
            colors: ["black", "grey"]
        },
        "TeX-Curved-Ultra": {
            name: "TeX Curved Ultra",
            model: "Curved Ultra",
            image: "Images/Laptop/texcurvedultra.png",
            rating: 5,
            colors: ["black", "grey"]
        }
    };

    // Function to load product details
    function loadProduct() {
        // Get the product ID from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('product');

        // Find the product data based on the ID
        const product = products[productId];

        if (product) {
            // Update the product image
            document.querySelector('.product-image img').src = product.image;
            document.querySelector('.product-image img').alt = product.name;

            // Update the product name and model
            document.querySelector('.product-description h2').textContent = product.name;
            document.querySelector('.product-description p').textContent = `Model: ${product.model}`;

            // Update the rating
            const ratingContainer = document.querySelector('.rating');
            ratingContainer.innerHTML = ''; // Clear any existing stars
            for (let i = 0; i < 5; i++) {
                const star = document.createElement('span');
                star.className = i < product.rating ? 'star' : 'star-grey';
                star.innerHTML = '&#9733;'; // Star character
                ratingContainer.appendChild(star);
            }
        // Update color options
        const colorOptionsContainer = document.getElementById('color-options');
            colorOptionsContainer.innerHTML = '';
            product.colors.forEach(color => {
                const colorOption = document.createElement('div');
                colorOption.className = 'color-option';
                colorOption.style.backgroundColor = color;
                colorOption.onclick = () => selectColor(color);
                colorOption.id = `color-${color}`;
                colorOptionsContainer.appendChild(colorOption);
            });
        } else {
            document.querySelector('.main-content').innerHTML = '<p>Product not found.</p>';
        }
    }

    // Call loadProduct on page load
    window.onload = loadProduct;

       // Color selection logic
    function selectColor(color) {
        document.querySelectorAll('.color-option').forEach(el => el.classList.remove('selected'));
        document.getElementById(`color-${color}`).classList.add('selected');
    }


        // Quantity controls
        let quantity = 1;
        function increaseQuantity() {
            quantity++;
            document.getElementById('quantity').textContent = quantity;
        }

        function decreaseQuantity() {
            if (quantity > 1) {
                quantity--;
                document.getElementById('quantity').textContent = quantity;
            }
        }
    </script>

</body>
</html>