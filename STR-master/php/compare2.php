<!DOCTYPE html>
<html>
<head>
    <title>Comparación y Actualización de Carpetas</title>
    <style>
        /* Estilos CSS */
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .igual {
            color: black;
        }
        .diferente {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Resultados de la Comparación</h2>
        <form method="post">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Archivo</th>
                        <th>En Master</th>
                        <th>En Clon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Configuración de las rutas a las carpetas
                        $carpetaB = 'I:\imagenes\cover';
                        $carpetaA = 'I:\imagenes\banner';

                        // Obtener la lista de archivos en ambas carpetas
                        $archivosA = scandir($carpetaA);
                        $archivosB = scandir($carpetaB);

                        // Comparar y almacenar resultados
                        $resultados = [];
                        foreach ($archivosB as $archivo) {
                            if ($archivo !== '.' && $archivo !== '..') {
                                $resultados[$archivo] = in_array($archivo, $archivosA);
                            }
                        }
                    // ... (código PHP para comparar carpetas y generar resultados)

                    foreach ($resultados as $archivo => $existe) {
                        echo '<tr>';
                        echo '<td><input type="checkbox" name="archivos[]" value="' . $archivo . '"></td>';
                        echo '<td><span class="' . ($existe ? 'igual' : 'diferente') . '">' . $archivo . '</span></td>';
                        echo '<td>' . (in_array($archivo, $archivosA) ? 'Sí' : 'No') . '</td>';
                       echo '<td>' . ($existe ? 'Sí' : 'No') . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div>
                <input type="checkbox" id="selectAll"> Seleccionar todos
                <button type="submit">Actualizar seleccionados</button>
            </div>
        </form>
        <?php
        // Procesar la selección del usuario
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $archivosSeleccionados = $_POST['archivos'];
            foreach ($archivosSeleccionados as $archivo) {
            copy("$carpetaB/$archivo", "$carpetaA/$archivo");
            }
        }?>
    </div>

    <script>
        // JavaScript para seleccionar/deseleccionar todos los checkboxes
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');

        selectAll.addEventListener('change', () => {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
        });
    </script>
</body>
</html>

