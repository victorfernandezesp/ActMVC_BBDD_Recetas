<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Victor">
    <title>Recetas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 5%;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }

        nav {
            background-color: #444;
            color: white;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 10px;
        }

        section {
            margin: 20px;
        }

        h1,
        h2,
        h3 {
            color: #333;
        }

        .receta {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .receta h3 {
            color: #cc0000;
        }

        .receta p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <header>
        <?php

        echo 'Bienvenido admin ';
        echo ' <a href="/logout">Cerrar Sesión</a>';

        ?>
    </header>

    <nav>
        <a href="/">Inicio</a>
        <?php
        echo '<a href="/administrador">Administrador</a>';
        ?>
    </nav>

    <h1>Tus Colaboradores</h1>
    <section>
        <?php
        $total = 0;
        // te recorres todos los colaboradores de $data y cada saldo lo metes en total
        foreach ($data['colaboradores'] as $colaborador) {
            $total += $colaborador['saldo'];
        }
        foreach ($data['colaboradores'] as $colaborador) {
            $cobrar = $data["beneficios"] * ($colaborador['saldo'] / $total);
            echo '<div class="receta">';
            echo '<h3>' . $colaborador['nombre'] . '</h3>';
            echo '<p> <b>SALDO</b>: ' . $colaborador['saldo'] . '€ </p>';
            $percibir = round($cobrar, 2);
            echo '<p> <b>TOTAL A PERCIBIR</b>:  ' . $percibir . '€ </p>';
            echo '</div>';
        }
        ?>
    </section>



</body>

</html>