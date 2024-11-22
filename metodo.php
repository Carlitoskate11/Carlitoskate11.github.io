<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Envío</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="metodo.css">
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

    <!-- Encabezado con menú centrado -->
    <header>
        <nav class="custom-nav">
            <ul>
                <li><a href="principal.php">Inicio</a></li>
                <li><a href="empresa.html">Sobre la empresa</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenido principal de método de envío -->
    <main class="main-content">
        <div class="container envio-container">
            <h1 class="titulo-envio">MÉTODO DE ENVÍO</h1>
            <p><strong>Por favor escoge un método de envío</strong></p>
            
            <div class="shipping-methods">
                <div class="method" onclick="selectMethod(this)">
                    <i class="fas fa-credit-card fa-2x"></i>
                    <h3><strong>PAGO PREVIO</strong></h3>
                    <p><strong>Depósito
                        /
                        transferencia<br>Envío por Cargo Expreso</strong></p>
                </div>
                <div class="method" onclick="selectMethod(this)">
                    <i class="fas fa-hand-holding-usd fa-2x"></i>
                    <h3><strong>CONTRA ENTREGA</strong></h3>
                    <p><strong>Efectivo <br>Envío por Cargo Expreso</strong></p>
                </div>
                <div class="method selected" onclick="selectMethod(this)">
                    <i class="fas fa-store fa-2x"></i>
                    <h3><strong>RECOGER</strong></h3>
                    <p><strong>Pagas y recibes en oficina Cobán Alta Verapaz</strong></p>
                </div>
            </div>

            <form action="procesar_metodo_envio_be.php" method="POST" class="order-summary">
                <table>
                    <tr>
                        <td><strong>Cantidad</strong></td>
                        <td><strong>1</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Envío</strong></td>
                        <td><strong>Incluido</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Subtotal</strong></td>
                        <td><strong>Q 78.00</strong></td>
                    </tr>
                </table>
            
                <!-- Input oculto para almacenar el método seleccionado -->
                <input type="hidden" id="selectedMethod" name="selected_method">

                <div class="buttons">
                    <button type="button" class="back" onclick="goBackToInfo()">← Regresar</button>
                    <button type="submit" class="complete">Completar ✔</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Modal de resumen de pedido -->
    <div id="modalResumenPedido" class="modal-compra">
        <div class="modal-content">
            <span class="close-btn" onclick="closeOrderSummary()">&times;</span>
            <h2>Resumen de Pedido</h2>
            <p><strong>Cantidad:</strong> 1</p>
            <p><strong>Envío:</strong> Incluido</p>
            <p><strong>Total:</strong> Q 78.00</p>
            <button onclick="confirmOrder()" class="modal-complete-btn">Confirmar Pedido</button>
            <button onclick="goToHomePage()" class="modal-home-btn">Ir a Inicio</button>
        </div>
    </div>

    <!-- Modal de confirmación de compra -->
    <div id="modalCompra" class="modal-compra">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>¡Compra Realizada!</h2>
            <p>Tu compra ha sido realizada con éxito.</p>
            <button onclick="closeModal()" class="modal-close-btn">Cerrar</button>
        </div>
    </div>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 TecnoFast. Todos los derechos reservados.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Función para seleccionar método de envío
        function selectMethod(element) {
            document.querySelectorAll('.method').forEach(method => method.classList.remove('selected'));
            element.classList.add('selected');
            document.getElementById('selectedMethod').value = element.querySelector('h3').innerText.trim();
        }

        // Función para regresar a informacion.html
        function goBackToInfo() {
            window.location.href = 'informacion.php';
        }

        // Función para abrir el resumen del pedido
        function openOrderSummary() {
            document.getElementById('modalResumenPedido').style.display = 'block';
        }

        // Función para cerrar el resumen del pedido
        function closeOrderSummary() {
            document.getElementById('modalResumenPedido').style.display = 'none';
        }

        // Función para confirmar el pedido y mostrar mensaje de éxito
        function confirmOrder() {
            document.getElementById('modalResumenPedido').style.display = 'none';
            document.getElementById('modalCompra').style.display = 'block';
        }

        // Función para cerrar el modal de confirmación
        function closeModal() {
            document.getElementById('modalCompra').style.display = 'none';
        }

        // Función para ir a la página principal
        function goToHomePage() {
            window.location.href = 'principal.php';
        }
    </script>
</body>
</html>