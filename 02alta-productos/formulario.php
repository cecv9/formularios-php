<html lang="es">
<head>
    <title>Formulario alta de productos con imagen adjunta</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        form {
            width: 400px;
            margin: 0 auto;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            width: 100px;
            margin: 0 auto;
            display: block;
            background: #333;
            color: #fff;
            border: 0;
            cursor: pointer;
        }
        .errors {
            width: 400px;
            margin: 0 auto;
            background: #f00;
            color: #fff;
            padding: 10px;
        }
        .success {
            width: 400px;
            margin: 0 auto;
            background: #0f0;
            color: #fff;
            padding: 10px;
        }
    </style>
</head>
<body>
<?php if (isset($_GET['error'])): ?>
    <div class="errors">
        <?php if ($_GET['error'] == 1): ?>
            <p>Por favor, rellena todos los campos.</p>
        <?php elseif ($_GET['error'] == 2): ?>
            <p>No se puede procesar el archivo.</p>
        <?php elseif ($_GET['error'] == 3): ?>
            <p>El archivo no tiene una extensión válida.</p>
        <?php elseif ($_GET['error'] == 4): ?>
            <p>Por favor, introduce un precio válido.</p>
        <?php elseif ($_GET['error'] == 5): ?>
            <p>No se ha podido guardar el producto en base de datos.</p>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
    <div class="success">
        <p>El producto ha sido dado de alta correctamente</p>
    </div>
<?php endif; ?>

<form action="procesar.php" method="post" enctype="multipart/form-data">
    <input type="text" name="nombre" placeholder="Nombre" />
    <input type="file" name="imagen" placeholder="Imagen" accept="image/jpeg,image/png" />
    <input type="text" name="precio" placeholder="Precio" />
    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <input type="submit" value="Enviar" />
</form>
</html>
