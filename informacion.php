<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecnoFast - Información de Envío</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="informacion.css">
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

    <!-- Contenedor de información de envío -->
    <div class="envio-container">
        <h1>INFORMACIÓN DE ENVÍO</h1>
        <form class="form-envio" action="procesar_envio_be.php" method="POST">
            <p>Por favor llena tu información de envío</p>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección exacta</label>
                <input type="text" id="direccion" name="direccion">
            </div>
            <div class="form-group">
                <label for="departamento">Departamento</label>
                <select id="departamento" name="departamento" onchange="actualizarMunicipios()">
                    <option value="">Seleccione un Departamento</option>
                    <option value="Alta Verapaz">Alta Verapaz</option>
                    <option value="Baja Verapaz">Baja Verapaz</option>
                    <option value="Chimaltenango">Chimaltenango</option>
                    <option value="Chiquimula">Chiquimula</option>
                    <option value="El Progreso">El Progreso</option>
                    <option value="Escuintla">Escuintla</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Huehuetenango">Huehuetenango</option>
                    <option value="Izabal">Izabal</option>
                    <option value="Jalapa">Jalapa</option>
                    <option value="Jutiapa">Jutiapa</option>
                    <option value="Petén">Petén</option>
                    <option value="Quetzaltenango">Quetzaltenango</option>
                    <option value="Quiché">Quiché</option>
                    <option value="Retalhuleu">Retalhuleu</option>
                    <option value="Sacatepéquez">Sacatepéquez</option>
                    <option value="San Marcos">San Marcos</option>
                    <option value="Santa Rosa">Santa Rosa</option>
                    <option value="Sololá">Sololá</option>
                    <option value="Suchitepéquez">Suchitepéquez</option>
                    <option value="Totonicapán">Totonicapán</option>
                    <option value="Zacapa">Zacapa</option>
                </select>
                <label for="municipio">Municipio</label>
                <select id="municipio" name="municipio">
                    <option value="">Seleccione un Municipio</option>
                </select>
            </div>
            <div class="form-group">
                <label for="indicaciones">Indicaciones extra de entrega (opcional)</label>
                <input type="text" id="indicaciones" name="indicaciones">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono">
                <label for="telefono-adicional">Teléfono adicional (opcional)</label>
                <input type="text" id="telefono-adicional" name="telefono_adicional">
            </div>
            <div class="form-group">
                <label for="nit">NIT</label>
                <input type="text" id="nit" name="nit">
            </div>
            <div class="form-group checkbox-group">
                <input type="checkbox" id="guardar-datos" name="guardar_datos">
                <label for="guardar-datos">Guardar mis datos de envío</label>
            </div>
                <button type="submit" class="btn btn-primary">Guardar Información</button>

            <div class="botones">
                <button type="button" class="btn" onclick="goBackToMain()">← Regresar</button>
                <button type="button" class="btn btn-primary" onclick="continuarConDatos()">Continuar →</button>
            </div>
        </form>
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
        // Diccionario de departamentos y municipios de Guatemala
        const departamentosYMunicipios = {
            "Alta Verapaz": ["Cobán", "Santa Cruz Verapaz", "San Cristóbal Verapaz", "Tactic", "Tamahú", "San Miguel Tucurú", "Panzós", "Senahú", "San Pedro Carchá", "San Juan Chamelco", "San Agustín Lanquín", "Santa María Cahabón", "Chisec", "Chahal", "Fray Bartolomé de las Casas", "Santa Catalina la Tinta", "Raxruhá"],
            "Baja Verapaz": ["Salamá", "San Miguel Chicaj", "Rabinal", "Cubulco", "Granados", "Santa Cruz el Chol", "San Jerónimo", "Purulhá",],
            "Chimaltenango": ["Chimaltenango", "San José Poaquil", "San Martín Jilotepeque", "Santa Apolonia", "Tecpán", "Patzún", "San Miguel Pochuta", "Patzicía", "Santa Cruz Balanyá", "Acatenango", "San Pedro Yepocapa", "San Andrés Itzapa", "Parramos", "Zaragoza", "El Tejar"],
            "Chiquimula": ["Chiquimula", "Jocotán", "Esquipulas", "Camotán", "Quetzaltepeque", "Olapa", "Ipala", "San Juan Ermita", "Concepción las Minas", "San Jacinto", "San José la Aradia"],
            "Petén": ["Flores", "San José", "San Benito", "San Andrés", "La Libertad", "San Francisco", "Santa Ana", "Dolores", "San Luis", "Sayaxché", "Melchor de Mencos", "Poptún"],
            "El Progreso": ["El Jícaro", "Morazán", "San Agustín Acasaguastlán", "San Antonio la Paz", "San Cristóbal Acasaguastlán", "Sanarate", "Guastatoya", "Sansare"],
            "Quiché": ["Santa Cruz del Quiché", "Chiché", "Chinique", "Zacualpa", "Chajul", "Santo Tomás Chichicastenango", "Patzité", "San Antonio Ilotenango", "San Pedro Jocopilas", "Cunén", "San Juan Cotzal", "Santa María Joyabaj", "Santa María Nebaj", "San Andrés Sajcabajá", "Uspantán", "Sacapulas", "San Bartolomé Jocotenango", "Canillá", "Chicaman", "Ixcan", "Pachalum"],
            "Escuintla": ["Escuintla", "Santa Lucía Cotzumalguapa", "La Democracia", "Siquinalá", "Masagua", "Tiquisate", "La Gomera", "Guanagazapa", "San José", "Iztapa", "Palín", "San Vicente Pacaya", "Nueva Concepción"],
            "Guatemala": ["Santa Catarina Pinula", "San José Pinula", "Guatemala", "San José del Golfo", "Palencia", "Chinautla", "San Pedro Ayampuc", "Mixco", "San Pedro Sacatepéquez", "San Juan Sacatepéquez", "Chuarrancho", "San Raymundo", "Fraijanes", "Amatitlán", "Villa Nueva", "Villa Canales", "San Miguel Petapa"],
            "Huehuetenango": ["Huehuetenango", "Chiantla", "Malacatancito", "Cuilco", "Nentón", "San Pedro Necta", "Jacaltenango", "Soloma", "Ixtahuacán", "Santa Bárbara", "La Libertad", "La Democracia", "San Miguel Acatán", "San Rafael La Independencia", "Todos Santos Cuchumatán", "San Juan Atitán", "Santa Eulalia", "San Mateo Ixtatán", "Colotenango", "San Sebastián Huehuetenango", "Tectitán", "Concepción Huista", "San Juan Ixcoy", "San Antonio Huista", "Santa Cruz Barillas", "San Sebastián Coatán", "Aguacatán", "San Rafael Petzal", "San Gaspar Ixchil", "Santiago Chimaltenango", "Santa Ana Huista"],
            "Izabal": ["Morales", "Los Amates", "Livingston", "El Estor", "Puerto Barrios"],
            "Jalapa": ["Jalapa", "San Pedro Pinula", "San Luis Jilotepeque", "San Manuel Chaparrón", "San Carlos Alzatate", "Monjas", "Mataquescuintla"],
            "Jutiapa": ["Jutiapa", "El Progreso", "Santa Catarina Mita", "Agua Blanca", "Asunción Mita", "Yupiltepeque", "Atescatempa", "Jerez", "El Adelanto", "Zapotitlán", "Comapa", "Jalpatagua", "Conguaco", "Moyuta", "Pasaco", "Quesada"],
            "Quetzaltenango": ["Quetzaltenango", "Salcajá", "San Juan Olintepeque", "San Carlos Sija", "Sibilia", "Cabricán", "Cajolá", "San Miguel Sigüilá", "San Juan Ostuncalco", "San Mateo", "Concepción Chiquirichapa", "San Martín Sacatepéquez", "Almolonga", "Cantel", "Huitán", "Zunil", "Colomba Costa Cuca", "San Francisco La Unión", "El Palmar", "Coatepeque", "Génova", "Flores Costa Cuca", "La Esperanza", "Palestina de Los Altos"],
            "Retalhuleu": ["Retalhuleu", "San Sebastián", "Santa Cruz Muluá", "San Martín Zapotitlán", "San Felipe", "San Andrés Villa Seca", "Champerico", "Nuevo San Carlos", "El Asintal"],
            "Sacatepéquez": ["Antigua Guatemala", "Jocotenango", "Pastores", "Sumpango", "Santo Domingo Xenacoj", "Santiago Sacatepéquez", "San Bartolomé Milpas Altas", "San Lucas Sacatepéquez", "Santa Lucía Milpas Altas", "Magdalena Milpas Altas", "Santa María de Jesús", "Ciudad Vieja", "San Miguel Dueñas", "San Juan Alotenango", "San Antonio Aguas Calientes", "Santa Catarina Barahona"],
            "San Marcos": ["San Marcos", "Ayutla", "Catarina", "Comitancillo", "Concepción Tutuapa", "El Quetzal", "El Rodeo", "El Tumblador", "Ixchiguán", "La Reforma", "Malacatán", "Nuevo Progreso", "Ocós", "Pajapita", "Esquipulas Palo Gordo", "San Antonio Sacatepéquez", "San Cristóbal Cucho", "San José Ojetenam", "San Lorenzo", "San Miguel Ixtahuacán", "San Pablo", "San Pedro Sacatepéquez", "Sibinal", "Sipacapa", "Tacaná", "", "Tajumulco", "Tejutla", "Río Blanco", "La Blanca"],
            "Santa Rosa": ["Cuilapa", "Casillas Santa Rosa", "Chiquimulilla", "Guazacapán", "Nueva Santa Rosa", "Oratorio", "Pueblo Nuevo Viñas", "Jan Juan Tecuaco", "San Rafael Las Flores", "Santa Cruz Naranjo", "Santa María Ixhuatán", "Santa Rosa de Lima", "Taxisco", "Barberena"],
            "Sololá": ["Sololá", "Concepción", "Nahualá", "Panajachel", "San Andrés Semetabaj", "San Antonio Palopó", "San José Chacayá", "San Juan la Laguna", "San Lucas Tolimán", "San Marcos la Laguna", "San Pablo la Laguna", "San Pedro la Laguna", "Santa Catarina Ixtahuacán", "Santa Catarina Palopó", "Santa Clara La Laguna", "Santa Cruz La Laguna", "Santa Lucía Utatlán", "Santa María Visitación", "Santiago Atitlán"],
            "Suchitepéquez": ["Mazatenango", "Cuyotenango", "San Francisco Zapotitlán", "San Bernardino", "San José El Ídolo", "Santo Domingo Suchitepéquez", "San Lorenzo", "Samayac", "San Pablo Jocopilas", "San Antonio Suchitepéquez", "San Miguel Panán", "San Gabriel", "Chicacao", "Patulul", "Santa Bárbara", "San Juan Bautista", "Santo Tomás La Unión", "Zunilito", "Pueblo Nuevo", "Río Bravo"],
            "Totonicapán": ["Totonicapán", "San Cristóbal Totonicapán", "San Francisco El Alto", "San Andrés Xecul", "Momostenango", "Santa María Chiquimula", "Santa Lucía La Reforma", "San Bartolo"],
            "Zacapa": ["Cabañas", "Estanzuela", "Gualán", "Huité", "La Unión", "Río Hondo", "San Jorge", "San Diego", "Teculután", "Usumatlán", "Zacapa"]
        };

        // Función para actualizar el campo de municipios según el departamento seleccionado
        function actualizarMunicipios() {
            const departamentoSelect = document.getElementById("departamento");
            const municipioSelect = document.getElementById("municipio");
            const departamento = departamentoSelect.value;

            // Limpiar municipios actuales
            municipioSelect.innerHTML = '<option value="">Seleccione un Municipio</option>';

            // Agregar municipios correspondientes al departamento seleccionado
            if (departamento && departamentosYMunicipios[departamento]) {
                departamentosYMunicipios[departamento].forEach(municipio => {
                    const option = document.createElement("option");
                    option.value = municipio;
                    option.textContent = municipio;
                    municipioSelect.appendChild(option);
                });
            }
        }

        function continuarConDatos() {
        fetch("obtener_datos_envio.php")
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Llenar automáticamente los campos del formulario
                    document.getElementById('nombre').value = data.nombre;
                    document.getElementById('apellido').value = data.apellido;
                    document.getElementById('direccion').value = data.direccion;
                    document.getElementById('departamento').value = data.departamento;
                    document.getElementById('municipio').value = data.municipio;
                    document.getElementById('indicaciones').value = data.indicaciones || "";
                    document.getElementById('telefono').value = data.telefono;
                    document.getElementById('telefono-adicional').value = data.telefono_adicional || "";
                    document.getElementById('nit').value = data.nit;

                    // Validar que los campos requeridos estén completos
                    const nombre = data.nombre.trim();
                    const apellido = data.apellido.trim();
                    const direccion = data.direccion.trim();
                    const departamento = data.departamento.trim();
                    const municipio = data.municipio.trim();
                    const telefono = data.telefono.trim();
                    const nit = data.nit.trim();

                    if (!nombre || !apellido || !direccion || !departamento || !municipio || !telefono || !nit) {
                        alert("Por favor, complete todos los campos obligatorios.");
                        return;
                    }

                    // Si todos los campos están completos, redirigir
                    window.location.href = 'metodo.php';
                } else {
                    alert("No hay datos guardados. Complete el formulario antes de continuar.");
                }
            })
            .catch(error => {
                console.error("Error al obtener los datos:", error);
                alert("Error al cargar los datos guardados.");
            });
    }

    // Función para regresar a 'principal.php'
    function goBackToMain() {
        window.location.href = 'principal.php';
    }
    </script>
</body>
</html>