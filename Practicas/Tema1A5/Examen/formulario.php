<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicios</title>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <form action="ejercicios.php" method="post">
        <input type="hidden" name="form" value="1">
        <input type="submit" value="Ver tabla" />
    </form>
    <h1>Ejercicio 2</h1>
    <form action="ejercicios.php" method="post">
        <input type="hidden" name="form" value="2">
        <input name="inferior" type="number" min="0"></input>
        <input name="superior" type="number" min="0"></input>
        <input type="submit" value="Ver numeros perfectos" />
    </form>
    <h1>Ejercicio 3</h1>
    <form action="ejercicios.php" method="get">
        <input name="operacion" type="text"></input>
        <input type="submit" value="Realizar Operacion" />
    </form>

</body>

</html>