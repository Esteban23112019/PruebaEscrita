<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$fechaNacimiento = $_POST['fechaNacimiento'];

validarLosDatos($nombre, $apellido, $edad, $telefono, $email, $fechaNacimiento);


function validarLosDatos($nombre, $apellido, $edad, $telefono, $email, $fechaNacimiento)
{
    if ($nombre === '') {
        echo 'Debe de ingresar el nombre';
        return false;
    }
    if ($apellido === '') {
        echo 'Debe de ingresar el apellido';
        return false;
    }


    if ($telefono === '') {
        echo 'Debe de ingresar el teléfono';
        return false;
    }

    if ($edad === '') {
        echo 'Debe de ingresar la edad';
        return false;
    }

    if ($email === '') {
        echo 'Debe de ingresar el email';
        return false;
    }

    if ($fechaNacimiento === '') {
        echo 'Debe de ingresar la fecha de nacimiento';
        return false;
    }

    if (!is_numeric($edad)) {
        echo 'Tiene que ingresar edad con numero';
        return false;
    }

    if (!is_numeric($telefono)) {
        echo 'Tiene que ingresar el telefono con numero';
        return false;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "La dirección de email no es válida.";
        return false;
    }

    guardarLosDatos($nombre, $apellido, $edad, $telefono, $email, $fechaNacimiento);
}
function guardarLosDatos($nombre, $apellido, $edad, $telefono, $email, $fechaNacimiento)
{
    $conexion = new mysqli(
        'localhost',
        'usuario',
        'password',
        'nombre'
    );

    $sql = "INSERT INTO personas(nombre, apellido, edad, telefono, email, fechaNacimiento) VALUES(
        '{$nombre}',
        '{$apellido}',
        {$edad},
        '{$telefono},
        '{$email},
        '{$fechaNacimiento}
        ');";
    $conexion->query($sql);

    echo 'Datos guardados.';
    return true;
}
