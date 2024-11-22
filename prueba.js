let products = [];
let editProductIndex = -1;

// Función para renderizar los productos en la tabla
function renderProducts() {
    const productList = document.getElementById('productList');
    productList.innerHTML = '';

    products.forEach((product, index) => {
        productList.innerHTML += `
            <tr>
                <td><img src="${product.image}" width="100"></td>
                <td>${product.name}</td>
                <td>Q${product.price}</td>
                <td>${product.description}</td>
                <td>
                    <button class="btn btn-primary" onclick="editProduct(${index})"><i class="fas fa-edit"></i> Editar</button>
                    <button class="btn btn-danger" onclick="deleteProduct(${index})"><i class="fas fa-trash"></i> Eliminar</button>
                </td>
            </tr>
        `;
    });
}

// Función para agregar un nuevo producto
document.getElementById('addProductForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const name = document.getElementById('nombre').value;
    const price = document.getElementById('precio').value;
    const description = document.getElementById('descripcion').value;
    const image = document.getElementById('imagen').files[0] ? URL.createObjectURL(document.getElementById('imagen').files[0]) : '';

    products.push({ name, price, description, image });
    
    // Limpiar el formulario
    document.getElementById('addProductForm').reset();
    renderProducts();
});

// Función para editar un producto
function editProduct(index) {
    editProductIndex = index;

    const product = products[index];
    document.getElementById('editProductId').value = index;
    document.getElementById('editNombre').value = product.name;
    document.getElementById('editPrecio').value = product.price;
    document.getElementById('editDescripcion').value = product.description;
    
    $('#editProductModal').modal('show');
}

// Función para guardar los cambios de edición
document.getElementById('editProductForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const name = document.getElementById('editNombre').value;
    const price = document.getElementById('editPrecio').value;
    const description = document.getElementById('editDescripcion').value;
    const image = document.getElementById('editImagen').files[0] ? URL.createObjectURL(document.getElementById('editImagen').files[0]) : products[editProductIndex].image;

    products[editProductIndex] = { name, price, description, image };
    
    $('#editProductModal').modal('hide');
    renderProducts();
});

// Función para eliminar un producto
function deleteProduct(index) {
    products.splice(index, 1);
    renderProducts();
}