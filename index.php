<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios PHP - GET y Do While</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Ejercicios con PHP (GET y do...while)</h1>

    <!-- Ejercicio 1: Buscar enfermedad -->
    <section>
        <h2>1️⃣ Buscar enfermedad</h2>
        <form method="get">
            <label>Escribe una enfermedad:</label>
            <input type="text" name="enfermedad" placeholder="Ej. gripe" required>
            <button type="submit">Buscar</button>
        </form>

        <?php
        $enfermedades = [
            ["gripe", "Evitar el frío directo", 2],
            ["dolor de barriga", "Evitar lácteos y comida que produzca gases", 1],
            ["irritación de la piel", "Evitar cremas y químicos con pH alto que afecten la piel", 3],
            ["fiebre", "Descanso", 4]
        ];

        if (isset($_GET['enfermedad'])) {
            $buscar = strtolower(trim($_GET['enfermedad']));
            $encontrado = false;

            foreach ($enfermedades as $dato) {
                if ($buscar == strtolower($dato[0])) {
                    echo "<div class='resultado'>
                            <p><strong>Enfermedad:</strong> {$dato[0]}</p>
                            <p><strong>Recomendación:</strong> {$dato[1]}</p>
                            <p><strong>Días de descanso:</strong> {$dato[2]} días</p>
                          </div>";
                    $encontrado = true;
                    break;
                }
            }

            if (!$encontrado) {
                echo "<div class='error'>❌ No se encontró información para \"{$buscar}\".</div>";
            }
        }
        ?>
    </section>

    <hr>

    <!-- Ejercicio 2: Contar letras 'a' -->
    <section>
        <h2>2️⃣ Contar letras 'a' en una palabra</h2>
        <form method="get">
            <label>Ingresa una palabra:</label>
            <input type="text" name="palabra" placeholder="Ej. manzana" required>
            <button type="submit">Contar 'a'</button>
        </form>

        <?php
        if (isset($_GET['palabra'])) {
            $palabra = strtolower($_GET['palabra']);
            $contador = 0;
            $i = 0;
            $longitud = strlen($palabra);

            do {
                if ($palabra[$i] == 'a') {
                    $contador++;
                }
                $i++;
            } while ($i < $longitud);

            echo "<div class='resultado'>
                    <p><strong>Palabra:</strong> $palabra</p>
                    <p>Contiene <strong>$contador</strong> letra(s) 'a'.</p>
                  </div>";
        }
        ?>
    </section>

    <hr>

    <!-- Ejercicio 3: Factorial -->
    <section>
        <h2>3️⃣ Calcular factorial (n!)</h2>
        <form method="get">
            <label>Ingresa un número (n):</label>
            <input type="number" name="n" min="0" required>
            <button type="submit">Calcular</button>
        </form>

        <?php
        if (isset($_GET['n'])) {
            $n = intval($_GET['n']);
            $factorial = 1;
            $i = $n;

            if ($n > 0) {
                do {
                    $factorial *= $i;
                    $i--;
                } while ($i > 0);
            }

            echo "<div class='resultado'>
                    <p><strong>n:</strong> $n</p>
                    <p><strong>n! =</strong> $factorial</p>
                  </div>";
        }
        ?>
    </section>

    <hr>

    <!-- Ejercicio 4: Mayor número -->
    <section>
        <h2>4️⃣ Encontrar el mayor número</h2>
        <form method="get">
            <label>Ingresa una lista de números (separados por coma):</label>
            <input type="text" name="nums" placeholder="Ej. 1,2,4,56,3,6" required>
            <button type="submit">Buscar mayor</button>
        </form>

        <?php
        if (isset($_GET['nums'])) {
            $nums = explode(',', $_GET['nums']);
            $i = 0;
            $mayor = (int)$nums[0];

            do {
                $num = (int)trim($nums[$i]);
                if ($num > $mayor) {
                    $mayor = $num;
                }
                $i++;
            } while ($i < count($nums));

            echo "<div class='resultado'>
                    <p><strong>Números ingresados:</strong> " . implode(', ', $nums) . "</p>
                    <p><strong>Mayor número:</strong> $mayor</p>
                  </div>";
        }
        ?>
    </section>
</div>
</body>
</html>
