document.addEventListener('DOMContentLoaded', function () {
    fetch('productos.json')
        .then(response => response.json())
        .then(data => {
            window.productosData = data; // Guarda los datos de productos globalmente para usarlos en el filtro
            renderMainProducts(); // Renderiza las computadoras, laptops e impresoras al inicio
        })
        .catch(error => {
            console.error("Error al cargar productos: ", error);
        });
});

let images = [];    
let currentImageIndex = 0;

// Función para abrir el modal con datos vacíos si no se proporcionan detalles de productos
function openModal(productId) {
    const producto = window.productosData?.find(p => p.id === productId);
    if (!producto) {
        console.error(`Producto con ID ${productId} no encontrado`);
        return;
    }

    document.getElementById('modal-title').innerText = producto.nombre;
    document.getElementById('modal-image').src = producto.imagen;
    document.getElementById('modal-description').innerText = producto.descripcion;
    document.getElementById('modal-price').innerText = `Q${producto.precio}`;
    document.getElementById('productModal').style.display = "block";
}
function changeImage(src) {
    document.getElementById('modal-image').src = src;
}

function prevImage() {
    if (currentImageIndex > 0) {
        currentImageIndex--;
        changeImage(images[currentImageIndex]);
    }
}

function nextImage() {
    if (currentImageIndex < images.length - 1) {
        currentImageIndex++;
        changeImage(images[currentImageIndex]);
    }
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById('productModal').style.display = "none";
}

// Cierra el modal si el usuario hace clic fuera de él
window.onclick = function (event) {
    const modal = document.getElementById('productModal');
    if (event.target === modal) {
        modal.style.display = "none";
    }
};

// Renderizar productos por categorías específicas
function renderMainProducts() {
    const computadoras = window.productosData.filter(p => p.categoria === 'Computadoras de Escritorio');
    renderProductsInSection(computadoras, 'computadoras');

    const laptops = window.productosData.filter(p => p.categoria === 'Laptops');
    renderProductsInSection(laptops, 'laptops');

    const impresoras = window.productosData.filter(p => p.categoria === 'Impresoras');
    renderProductsInSection(impresoras, 'impresoras');
}

// Función para renderizar productos en una sección específica
function renderProductsInSection(products, sectionId) {
    const section = document.getElementById(sectionId).querySelector('.product-grid');
    section.innerHTML = ''; // Limpia el contenido anterior

    products.forEach(producto => {
        const productCard = document.createElement('div');
        productCard.className = 'product-card';
        productCard.innerHTML =
            `<div class="product-image">
                <img src="${producto.imagen}" alt="${producto.nombre}">
                <button class="view-btn" onclick="openModal(${producto.id})">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <h3>${producto.nombre}</h3>
            <p class="price">Q${producto.precio}</p>
            <button class="cart-btn" onclick="addToCart(${producto.id})">Añadir al carrito</button>`;
        section.appendChild(productCard);
    });
}

function renderProducts(products) {
    const productosContainer = document.getElementById('productos');
    productosContainer.innerHTML = ''; // Limpia el contenedor antes de renderizar

    const productGrid = document.createElement('div');
    productGrid.className = 'product-grid'; // Añade la clase grid para ordenar los productos horizontalmente

    if (products.length === 0) {
        document.getElementById('no-products-message').style.display = 'block'; // Muestra el mensaje si no hay productos
    } else {
        document.getElementById('no-products-message').style.display = 'none'; // Oculta el mensaje si hay productos
        products.forEach(producto => {
            const productCard = document.createElement('div');
            productCard.className = 'product-card'; // Clase que aplica el efecto ARGB
            productCard.innerHTML =
                `<div class="product-image">
                    <img src="${producto.imagen}" alt="${producto.nombre}">
                    <button class="view-btn" onclick="openModal(${producto.id})">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <h3>${producto.nombre}</h3>
                <p class="price">Q${producto.precio}</p>
                <button class="cart-btn" onclick="addToCart(${producto.id})">Añadir al carrito</button>`;
            productGrid.appendChild(productCard); // Añade cada producto al grid
        });
        productosContainer.appendChild(productGrid); // Añade el grid de productos al contenedor
    }
}

function filterProducts() {
    // Obtiene las categorías seleccionadas
    const checkboxes = document.querySelectorAll('.category-filter input[type="checkbox"]:checked');
    const categories = Array.from(checkboxes).map(cb => cb.value.trim().toUpperCase());

    // Verifica si se seleccionó alguna categoría
    if (categories.length === 0) {
        resetFilters(); // Si no se selecciona ninguna categoría, restablece la vista
        return;
    }

    // Oculta el contenedor de promociones
    document.getElementById('promo-container').style.display = 'none';

    // Filtra los productos por categoría
    const filteredProducts = window.productosData.filter(producto => categories.includes(producto.categoria.toUpperCase()));

    // Oculta las secciones principales (computadoras, laptops, impresoras)
    document.getElementById('main-content').style.display = 'none';

    // Muestra los productos filtrados
    renderProducts(filteredProducts);
}

function resetFilters() {
    // Restablece el formulario de filtros
    document.getElementById('filterForm').reset();

    // Muestra las secciones principales nuevamente
    renderMainProducts();

    // Muestra el contenedor de promociones nuevamente
    document.getElementById('promo-container').style.display = 'flex';

    document.getElementById('no-products-message').style.display = 'none'; // Oculta el mensaje de no productos
}

function addToCart(productId) {
    // Lógica para añadir el producto al carrito
    console.log(`Producto con ID ${productId} añadido al carrito`);
}

function openInNewTab(url) {
    window.open(url, '_blank');
}

/* 
Aquí se mejora la función para que el menú de categorías 
tenga una transición de escala y opacidad cuando aparece y desaparece.
*/
function toggleCategories() {
    const categoryMenu = document.getElementById('category-menu');
    if (categoryMenu.classList.contains('show')) {
        categoryMenu.classList.remove('show');
        setTimeout(() => categoryMenu.style.display = 'none', 300); // Esconde después de 300ms
    } else {
        categoryMenu.style.display = 'block';
        setTimeout(() => categoryMenu.classList.add('show'), 10); // Muestra con animación
    }
}

// Cerrar el menú de categorías si se hace clic fuera de él
document.addEventListener('click', function (event) {
    const categoryMenu = document.getElementById('category-menu');
    const hamburgerBtn = document.querySelector('.hamburger-btn');
    
    // Si el clic no es dentro del menú ni en el botón de "hamburger", lo cerramos
    if (!categoryMenu.contains(event.target) && !hamburgerBtn.contains(event.target)) {
        categoryMenu.classList.remove('show');
        setTimeout(() => categoryMenu.style.display = 'none', 300); // Esconde el menú después de 300ms
    }
});

let cart = []; // Arreglo para almacenar productos del carrito

// Función para mostrar el carrito
function toggleCart() {
    const cartContainer = document.getElementById('cartContainer');
    cartContainer.classList.toggle('show');
}

// Función para añadir producto al carrito
function addToCart(productId) {
    const product = window.productosData.find(p => p.id === productId);
    cart.push(product);
    renderCart(); // Solo actualiza la vista del carrito sin abrirlo
    console.log(`Producto con ID ${productId} añadido al carrito`);
}

// Renderizar los productos en el carrito
function renderCart() {
    const cartItemsContainer = document.querySelector('.cart-items');
    const totalPriceContainer = document.getElementById('cart-total');
    cartItemsContainer.innerHTML = '';

    let total = 0;
    cart.forEach(product => {
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <img src="${product.imagen}" alt="${product.nombre}">
            <div class="cart-item-details">
                <h4>${product.nombre}</h4>
                <p>Q${product.precio}</p>
            </div>
            <button onclick="removeFromCart(${product.id})" class="remove-btn">Eliminar</button>
        `;
        cartItemsContainer.appendChild(cartItem);
        total += parseFloat(product.precio);
    });

    totalPriceContainer.innerText = `Total: Q${total.toFixed(2)}`;
}

// Función para eliminar un producto del carrito
function removeFromCart(productId) {
    cart = cart.filter(product => product.id !== productId);
    renderCart();
}

// Detectar clic en el ícono de carrito para mostrar/ocultar el carrito
document.getElementById('cart-icon').addEventListener('click', function(event) {
    event.preventDefault(); // Evita que el enlace se recargue
    toggleCart(); // Muestra o esconde el carrito
});

function toggleCart() {
    const cartContainer = document.getElementById('cartContainer');
    cartContainer.classList.toggle('show'); // Cambia la visibilidad del carrito
}

function proceedToCheckout() {
    window.location.href = 'informacion.php'; // Redirige a informacion.html
}

function goBackToMain() {
    window.location.href = 'principal.php';
}

// Función para regresar a informacion.html
function goBackToInfo() {
    window.location.href = 'informacion.php';
}

// Función para mostrar mensaje de pedido completado
function completeOrder() {
    alert("Su pedido ha sido completado");
}

 // Función para redirigir a metodo.html
 function continueToShipping() {
    window.location.href = 'metodo.html'; // Redirige a metodo.html
}

// Función para actualizar la información de envío con los datos del carrito
function actualizarResumenEnvio() {
    let cantidadTotal = 0;
    let subtotal = 0;
    
    cart.forEach(product => {
        cantidadTotal += 1;
        subtotal += parseFloat(product.precio);
    });

    document.querySelector('.resumen div:nth-child(1) span').textContent = cantidadTotal;
    document.querySelector('.resumen div:nth-child(3) span').textContent = `Q ${subtotal.toFixed(2)}`;
}

// Modificación de las funciones de carrito para actualizar el resumen
function addToCart(productId) {
    const product = window.productosData.find(p => p.id === productId);
    cart.push(product);
    renderCart();
    actualizarResumenEnvio();
}

function removeFromCart(productId) {
    cart = cart.filter(product => product.id !== productId);
    renderCart();
    actualizarResumenEnvio();
}

// Llamar a actualizarResumenEnvio cuando la página información se carga
document.addEventListener('DOMContentLoaded', function () {
    if (window.location.pathname.includes('informacion.php')) {
        actualizarResumenEnvio();
    }
});

const sponsorTrack = document.querySelector('.sponsor-track');

sponsorTrack.addEventListener('mouseover', () => {
    sponsorTrack.style.animationPlayState = 'paused';
});

sponsorTrack.addEventListener('mouseout', () => {
    sponsorTrack.style.animationPlayState = 'running';
});

function toggleUserDropdown(event) {
    event.preventDefault(); // Evita la acción predeterminada del enlace
    const dropdown = document.getElementById('userDropdown');
    
    // Alterna la visibilidad del menú desplegable
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
    }

    // Cierra el menú si el usuario hace clic fuera de él
    document.addEventListener('click', function closeDropdown(e) {
        if (!event.target.closest('.user-dropdown')) {
            dropdown.style.display = 'none';
            document.removeEventListener('click', closeDropdown);
        }
    });
}