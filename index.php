<!DOCTYPE html>
<html>
<head>
    <title>Recomendación Médica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Consulta de Enfermedades</h1>
        <form method="get" action="">
            <label for="enfermedad">Escribe una enfermedad:</label>
            <input type="text" id="enfermedad" name="enfermedad" placeholder="Ej. gripe" required>
            <button type="submit">Buscar</button>
        </form>

        <?php

        $enfermedad = [
            ["Gripe", "Evitar el frío directo", 2],
            ["Dolor de barriga", "Evitar lácteos y comida que produzca gases", 1],
            ["Irritación de la piel", "Evitar cremas y químicos con pH alto que afecten la piel", 3],
            ["Fiebre", "Descanso", 4]
        ];

        if (isset($_GET['enfermedad'])) {
            $buscar = strtolower(trim($_GET['enfermedad']));
            $encontrado = false;

            foreach ($enfermedad as $dato) {
                if ($buscar == strtolower($dato[0])) {
                    echo "<div class='resultado'>";
                    echo "<h2>Resultado de la búsqueda:</h2>";
                    echo "<p><strong>Enfermedad:</strong> {$dato[0]}</p>";
                    echo "<p><strong>Recomendación médica:</strong> {$dato[1]}</p>";
                    echo "<p><strong>Días de descanso recomendados:</strong> {$dato[2]} días</p>";
                    echo "</div>";
                    $encontrado = true;
                    break;
                }
            }

            if (!$encontrado) {
                echo "<div class='error'>❌ No se encontró información para \"{$buscar}\".</div>";
            }
        }
        ?>
    </div>
</body>
</html>
