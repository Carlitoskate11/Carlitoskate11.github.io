<?php
session_start();

// Variable para identificar si el usuario está logueado
$logueado = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecnoFast</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="principal.css">
</head>
<body>

    <!-- Botones de redes sociales -->
    <a href="https://api.whatsapp.com/send?phone=55294750" class="btn-wsp" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="https://www.tiktok.com/@tecnofast_" class="btn-tiktok" target="_blank">
        <i class="fab fa-tiktok"></i>
    </a>
    <a href="https://www.facebook.com/TecnoFast54" class="btn-facebook" target="_blank">
        <i class="fab fa-facebook"></i>
    </a>
    
    <!-- Carousel de banners -->
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagen/BANNEROFI.jpg" alt="Banner" class="d-block w-100" style="height: 260px;">
            </div>
            <div class="carousel-item">
                <img src="imagen/banner1.jpg" alt="Banner 1" class="d-block w-100" style="height: 260px;">
            </div>
            <div class="carousel-item">
                <img src="imagen/Banner.jpg" alt="Banner 2" class="d-block w-100" style="height: 260px;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

     <!-- Encabezado con menú -->
     <header class="custom-nav">
    <nav>
        <ul>
            <li><a href="principal.php">Inicio</a></li>
            <li><a href="empresa.html">Sobre la empresa</a></li>
            <li><a href="#" id="cart-icon" title="Abrir carrito de compras"><i class="fas fa-shopping-cart"></i></a></li>
            <?php if ($logueado): ?>
                <!-- Opciones para usuarios logueados -->
                <li><a href="#" id="user-icon" title="Perfil del usuario"><i class="fas fa-user-check"></i></a></li>
                <li>
                    <form action="cerrar_sesion.php" method="POST" class="logout-form">
                        <button type="submit" class="logout-icon-btn" title="Cerrar sesión">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </li>
            <?php else: ?>
                <!-- Opción para iniciar sesión -->
                <li><a href="registro.php" title="Iniciar sesión"><i class="fas fa-user"></i> Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

    <!-- Barra de patrocinadores -->
    <div class="sponsor-bar">
        <div class="sponsor-track">
            <!-- Primer set de logotipos -->
            <img class="sponsor-logo" src="imagen/Marcas/etouch.png" alt="Patrocinador 1">
            <img class="sponsor-logo" src="imagen/Marcas/HPO.png" alt="Patrocinador 2">
            <img class="sponsor-logo" src="imagen/Marcas/imice.png" alt="Patrocinador 3">
            <img class="sponsor-logo" src="imagen/Marcas/jbl.png" alt="Patrocinador 4">
            <img class="sponsor-logo" src="imagen/Marcas/kingstom.png" alt="Patrocinador 5">
            <img class="sponsor-logo" src="imagen/Marcas/klipxtreme.png" alt="Patrocinador 6">
            <img class="sponsor-logo" src="imagen/Marcas/LOGITECH (1).png" alt="Patrocinador 7">
            <img class="sponsor-logo" src="imagen/Marcas/meetion.png" alt="Patrocinador 8">
            <img class="sponsor-logo" src="imagen/Marcas/miccell.png" alt="Patrocinador 9">
            <img class="sponsor-logo" src="imagen/Marcas/patriot.png" alt="Patrocinador 10">
            <img class="sponsor-logo" src="imagen/Marcas/twolf.jpg" alt="Patrocinador 11">
            <img class="sponsor-logo" src="imagen/Marcas/unno.png" alt="Patrocinador 12">
            <img class="sponsor-logo" src="imagen/Marcas/xtech.png" alt="Patrocinador 13">

            <!-- Segundo set de logotipos -->
            <img class="sponsor-logo" src="imagen/Marcas/etouch.png" alt="Patrocinador 1">
            <img class="sponsor-logo" src="imagen/Marcas/HPO.png" alt="Patrocinador 2">
            <img class="sponsor-logo" src="imagen/Marcas/imice.png" alt="Patrocinador 3">
            <img class="sponsor-logo" src="imagen/Marcas/jbl.png" alt="Patrocinador 4">
            <img class="sponsor-logo" src="imagen/Marcas/kingstom.png" alt="Patrocinador 5">
            <img class="sponsor-logo" src="imagen/Marcas/klipxtreme.png" alt="Patrocinador 6">
            <img class="sponsor-logo" src="imagen/Marcas/LOGITECH (1).png" alt="Patrocinador 7">
            <img class="sponsor-logo" src="imagen/Marcas/meetion.png" alt="Patrocinador 8">
            <img class="sponsor-logo" src="imagen/Marcas/miccell.png" alt="Patrocinador 9">
            <img class="sponsor-logo" src="imagen/Marcas/patriot.png" alt="Patrocinador 10">
            <img class="sponsor-logo" src="imagen/Marcas/twolf.jpg" alt="Patrocinador 11">
            <img class="sponsor-logo" src="imagen/Marcas/unno.png" alt="Patrocinador 12">
            <img class="sponsor-logo" src="imagen/Marcas/xtech.png" alt="Patrocinador 13">
        </div>
    </div>

    <!-- Espacio para promociones -->
    <div id="promo-container" class="promo-container">
        <div class="promo-item">
            <img src="imagen/laptops.webp" alt="Promocion 1">
        </div>
        <div class="promo-item">
            <img src="imagen/equipos.jpg" alt="Promocion 2">
        </div>
    </div>

    <!-- Interfaz del Carrito de Compras -->
    <div id="cartContainer" class="cart-container">
        <div class="cart-header">
            <h2>Carrito de Compras</h2>
                <span class="close-cart" onclick="toggleCart()">&times;</span>
        </div>
        <div class="cart-items"></div>
            <div class="cart-footer">
                <p id="cart-total">Total: Q0.00</p>
                    <button class="checkout-btn" onclick="proceedToCheckout()">Proceder al pago</button>
        </div>
    </div>

    <!-- Menú de categorías en forma de "hamburger" -->
    <div class="hamburger-menu">
        <button class="hamburger-btn" onclick="toggleCategories()">
            <i class="fas fa-bars"></i>
        </button>
        <aside id="category-menu" style="display: none;">
            <div class="filter-box">
                <h3>Categorías:</h3>
                <form id="filterForm">
                    <div class="category-filter">
                        <label><input type="checkbox" value="MOUSE"> MOUSE</label>
                        <label><input type="checkbox" value="TECLADO"> TECLADO</label>
                        <label><input type="checkbox" value="ALMACENAMIENTO"> UNIDADES DE ALMACENAMIENTO</label>
                        <label><input type="checkbox" value="MEMORIA RAM"> MEMORIAS RAM</label>
                        <label><input type="checkbox" value="MEMORIAS USB"> MEMORIAS USB</label>
                        <label><input type="checkbox" value="COOLERS"> BASES Y VENTILADORES PARA LAPTOPS</label>
                    </div>
                    <button type="button" onclick="filterProducts()" class="btn-search">Buscar</button>
                    <button type="button" onclick="resetFilters()" class="btn-reset">Reiniciar</button>
                </form>
            </div>
        </aside>
    </div>

    <!-- Secciones para equipos de cómputo -->
    <section id="main-content" class="container">
        <!-- Computadoras de Escritorio -->
        <div class="product-category" id="computadoras">
            <h2>Computadoras de Escritorio</h2>
            <div class="product-grid"></div>
        </div>

        <!-- Laptops -->
        <div class="product-category" id="laptops">
            <h2>Laptops</h2>
            <div class="product-grid"></div>
        </div>

        <!-- Impresoras -->
        <div class="product-category" id="impresoras">
            <h2>Impresoras</h2>
            <div class="product-grid"></div>
        </div>
    </section>

    <section id="productos" class="container"></section>

    <!-- Modal General para todos los productos -->
    <div id="productModal" class="modal">
        <div class="modal-content modal-flex">
            <div class="modal-image-container">
                <h2 id="modal-title">Computadora de Escritorio</h2>
                <img id="modal-image" src="ruta_de_imagen.jpg" alt="Producto">
            </div>
            <div class="modal-info">
                <span class="close" onclick="closeModal()">&times;</span>
                <p id="modal-description">Potente computadora para uso profesional.</p>
                <div class="price-and-button">
                    <p id="modal-price">Q3,500.00</p>
                    <button class="cart-btn" onclick="addToCart(1)">Añadir al carrito</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mensaje cuando no haya productos -->
    <div id="no-products-message" style="display: none;">No se encontraron productos con los filtros seleccionados.</div>

    <!-- Pie de página -->
    <footer>
    <div class="wave-container">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#05696B" fill-opacity="1" d="M0,224L48,192C96,160,192,96,288,80C384,64,480,96,576,117.3C672,139,768,149,864,149.3C960,149,1056,139,1152,144C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
    <p>&copy; 2024 Derechos reservados a TecnoFast</p>
</footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="principal.js"></script>
</body>
</html>