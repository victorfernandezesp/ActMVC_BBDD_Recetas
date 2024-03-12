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
        if ($data['perfil'] == "invitado") {
            ?>
            <form action="/verificar" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena">
                <label for="perfil">Perfil:
                    <select name="perfil" id="perfil">
                        <option value="colaborador">Colaborador</option>
                        <option value="admin">Administrador</option>
                        <option value="suscriptor">Suscriptor</option>
                    </select>
                </label>
                <label for="captcha">Cuánto es 1+1:</label>
                <input type="text" id="captcha" name="captcha">
                <input type="submit" value="Iniciar Sesión">
            </form>
            <?php
        } else {
            echo 'Bienvenido ' . $data['perfil'];
            echo ' <a href="/logout">Cerrar Sesión</a>';
        }
        ?>
    </header>
    
    <nav>
        <a href="/">Inicio</a>
        <?php
        if ($data['perfil'] == "colaborador") {
            echo '<a href="/colaborador">Colaborador</a>';
            echo '<a href="/crearreceta">Crear Receta</a>';
        }
        if ($data['perfil'] == "admin") {
            echo '<a href="/administrador">Administrador</a>';
        }
        ?>
    </nav>
    <p style="color:red">
        <?php
        echo $data['mensaje'];
        ?>
    </p>
    
    <h1>Recetas</h1>
    <section>
        <h2>Listado de Recetas</h2>
        
        <?php
        $recetas = $data["recetasobtenidas"];

        foreach ($recetas as $receta) {
            echo '<div class="receta">';
            echo "<h3>" . $receta['titulo'] . "</h3>";
            echo "<p><strong>Ingredientes:</strong> " . $receta['ingredientes'] . "</p>";
            echo "<p><strong>Elaboración:</strong> " . $receta['elaboracion'] . "</p>";
            echo "<p><strong>Etiquetas:</strong> " . $receta['etiquetas'] . "</p>";
            echo "<p><strong>Valoracion_media:</strong> " . $receta['valoracion_media'] . "</p>";
            
            
            if ($data['perfil'] == "suscriptor") {
                echo '<form action="/valorar" method="post">';
                echo '<input type="hidden" name="id_receta" value="' . $receta['id'] . '">';
                echo '<input type="hidden" name="idColaborador" value="' . $receta['idColaborador'] . '">';
                echo '<label for="valoracion">Valorar:  </label>';
                for ($i = 1; $i <= 5; $i++) {
                    echo '<input type="radio" name="valoracion" value="' . $i . '">' . $i.' ';
                }
                echo '<input type="submit" value="Valorar">';
            }
            echo '</div>';
        }
        ?>
    </section>



</body>

</html>