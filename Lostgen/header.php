<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="main-header">
        <div class="logo">LOSTGEN . STUDIO</div>
        <nav class="main-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => '',
                'fallback_cb'    => false,
            ));
            ?>
        </nav>
    </header>

    <main>
        <!-- Home Section (Kept for completeness, linked from Nav) -->
        <section class="hero-section" id="home">
            <div class="hero-content">
                <h1>LOST GENEARATION</h1>
                <!-- Using placeholder image URLs -->
                <p><img class="hero-image" href="https://emoji.gg/emoji/9922-green-fire" img src="https://cdn3.emoji.gg/emojis/9922-green-fire.gif" width="50px" height="50px" alt="Green_Fire"> Hardest threadz in the H for the H <img class="hero-image" href="https://emoji.gg/emoji/9922-green-fire" img src="https://cdn3.emoji.gg/emojis/9922-green-fire.gif" width="50px" height="50px" alt="Green_Fire"></p>
                <a href="#new-arrivals" class="cta-button">SHOP THE DROP</a>
            </div>
        </section>

        <!-- New Arrivals Section -->
        <section class="product-grid" id="new-arrivals">
            <h2> NEW ARRIVALS </h2>
            <div class="products-container">
                <div class="product-card">
                    <div class="product-card-image">[Texans Hatz]</div>
                    <h3>Texans Hatz</h3>
                    <p>$45.00</p>
                    <a href="#" class="add-to-cart">Add to Cart</a>
                </div>
                <div class="product-card">
                    <div class="product-card-image">[Chrome Hearts Beanie]</div>
                    <h3>Chrome Hearts Beanie</h3>
                    <p>$35.00</p>
                    <a href="#" class="add-to-cart">Add to Cart</a>
                </div>
                <div class="product-card">
                    <div class="product-card-image">[Hellstar Snapback]</div>
                    <h3>Hellstar Snapback</h3>
                    <p>$35.00</p>
                    <a href="#" class="add-to-cart">Add to Cart</a>
                </div>
            </div>
        </section>
        
        <!-- Shop All Section -->
        <section class="shop-all" id="shop-all">
            <h2 class="text-center mb-10">ALL THREADZ: THE ARCHIVE</h2>
            
            <div class="shop-layout">
                <!-- Sidebar/Filters -->
                <aside class="sidebar">
                    <h3>Filter by Type</h3>
                    <div class="filter-group">
                        <label><input type="checkbox" checked> All Items</label>
                        <label><input type="checkbox"> Hatz</label>
                        <label><input type="checkbox"> Beaniez</label>
                        <label><input type="checkbox"> Lost.Gen apparel</label>
                        <label><input type="checkbox"> Accessoriez</label>
                    </div>
                    
                    <h3>Filter by Drop</h3>
                    <div class="filter-group">
                        <label><input type="checkbox" checked> Latest Drop</label>
                        <label><input type="checkbox"> Genesis (V.1)</label>
                        <label><input type="checkbox"> Loading...</label>
                        <label><input type="checkbox"> Loading...</label>
                    </div>
                </aside>
                
                <!-- Main Product Display -->
                <div class="main-products-display">
                    <div class="products-container">
                        <!-- Products from New Arrivals (repeated) -->
                        <div class="product-card">
                            <div class="product-card-image" style="background-image: url('../images/LGS_ShirtFront.PNG');"></div>
                            <h3>1-800 Find God Tee</h3>
                            <p>$45.00</p>
                            <a href="#" class="add-to-cart">Add to Cart</a>
                        </div>
                        <div class="product-card">
                            <div class="product-card-image" style="background-image: url('https://placehold.co/300x300/1a1a1a/43ef43?text=BEANIE');">[Chrome Hearts Beanie]</div>
                            <h3>Chrome Hearts Beanie</h3>
                            <p>$35.00</p>
                            <a href="#" class="add-to-cart">Add to Cart</a>
                        </div>
                        <div class="product-card">
                            <div class="product-card-image" style="background-image: url('https://placehold.co/300x300/1a1a1a/920bd1?text=SNAPBACK');">[Hellstar Snapback]</div>
                            <h3>Hellstar Snapback</h3>
                            <p>$35.00</p>
                            <a href="#" class="add-to-cart">Add to Cart</a>
                        </div>
                        
                        <!-- Additional Products for Shop All -->
                        <div class="product-card">
                            <div class="product-card-image" style="background-image: url('https://placehold.co/300x300/1a1a1a/43ef43?text=V.2+TEE');">[Cyber-Drift T-Shirt]</div>
                            <h3>Cyber-Drift T-Shirt</h3>
                            <p>$60.00</p>
                            <a href="#" class="add-to-cart">Add to Cart</a>
                        </div>
                        <div class="product-card">
                            <div class="product-card-image" style="background-image: url('https://placehold.co/300x300/1a1a1a/920bd1?text=CODE+RED+HOODIE');">[Code-Red Hoodie]</div>
                            <h3>Code-Red Hoodie</h3>
                            <p>$95.00</p>
                            <a href="#" class="add-to-cart">Add to Cart</a>
                        </div>
                        <div class="product-card">
                            <div class="product-card-image" style="background-image: url('https://placehold.co/300x300/1a1a1a/43ef43?text=GLOVES');">[Tactical Gloves]</div>
                            <h3>Tactical Gloves</h3>
                            <p>$40.00</p>
                            <a href="#" class="add-to-cart">Add to Cart</a>
                        </div>
                        <div class="product-card">
                            <div class="product-card-image" style="background-image: url('https://placehold.co/300x300/1a1a1a/920bd1?text=DECON+PANTS');">[Deconstructed Pants]</div>
                            <h3>Deconstructed Pants</h3>
                            <p>$120.00</p>
                            <a href="#" class="add-to-cart">Add to Cart</a>
                        </div>
                        <div class="product-card">
                            <div class="product-card-image" style="background-image: url('https://placehold.co/300x300/1a1a1a/43ef43?text=RING');">[Neon Signet Ring]</div>
                            <h3>Neon Signet Ring</h3>
                            <p>$30.00</p>
                            <a href="#" class="add-to-cart">Add to Cart</a>
                        </div>
                        <div class="product-card">
                            <div class="product-card-image" style="background-image: url('https://placehold.co/300x300/1a1a1a/920bd1?text=GHOST+TEE');">[Ghost Logo Tee]</div>
                            <h3>Ghost Logo Tee</h3>
                            <p>$60.00</p>
                            <a href="#" class="add-to-cart">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Placeholder for About and Cart sections -->
        <section id="about" class="p-20 text-center">
             <h2 class="mb-5">ABOUT LOSTGEN.STUDIO</h2>
             <p class="text-gray-400 max-w-2xl mx-auto">Founded in the shadows of the Houston grid, LOSTGEN.STUDIO is a collective dedicated to crafting hyper-futuristic, deconstructed apparel. We blend technical fabrics with cyberpunk aesthetics, ensuring every piece reflects the energy of the concrete jungle at midnight. This is more than clothing—it's an artifact.</p>
        </section>
        
        <section id="cart" class="p-20 text-center">
             <h2 class="mb-5">CART (0)</h2>
             <p class="text-gray-400">Your archive is currently empty. Shop the threadz and unlock the level up.</p>
        </section>
        
    </main>

    <footer class="main-footer">
        <p>&copy; 2025 LOSTGEN.STUDIO. All Rights Reserved.</p>
        <div class="social-links mt-2">
            <!-- Using a standard link for social icon placeholder -->
            <a href="https://www.instagram.com/lostgen.studio/" class="hover:text-pink-500">
                Instagram
            </a>
        </div>
    </footer>

</body>
</html>