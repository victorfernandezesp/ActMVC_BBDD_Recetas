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
        section {
        margin: 20px;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #444;
    }
    </style>
</head>

<body>
    <header>
        <?php

            echo 'Bienvenido Colaborador ' ;
            echo ' <a href="/logout">Cerrar Sesión</a>';
        
        ?>
    </header>

    <nav>
        <a href="/">Inicio</a>
        <?php
            echo '<a href="/colaborador">Colaborador</a>';        
        ?>
    </nav>

    <h1>Crear Receta</h1>
    <section>
        
        <!-- Creamos un formulario donde se añade las recetas -->
        <form action="/crearreceta" method="post">
            <input type="text" name="titulo" placeholder="Titulo" required>
            <textarea name="ingredientes" placeholder="Ingredientes" required></textarea>
            <textarea name="elaboracion" placeholder="Elaboracion" required></textarea>
            <input type="text" name="etiquetas" placeholder="Etiquetas">

            <input type="submit" value="Crear Receta">
        </form>
    </section>



</body>

</html>