<?php

if(empty($_POST['nombre']) || empty($_POST['precio']) || empty($_POST['descripcion'])){

    header('Location:formulario.php?error=1');
    exit();
}

if ($_FILES['imagen']['error'] != UPLOAD_ERR_OK) {
    header('Location:formulario.php?error=2');
    exit();
}

if(! in_array($_FILES['imagen']['type'],['image/png','image/jpeg','image/jpg','image/gif'])){
    header('Location:formulario.php?error=3');
    exit();
}

if(! is_numeric($_POST['precio'])){
    header('Location:formulario.php?error=4');
    exit();
}

$imagen=$_FILES['imagen']['name'];
$imagen=uniqid().'-'.$imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],__DIR__.'/productos/'.$imagen);

