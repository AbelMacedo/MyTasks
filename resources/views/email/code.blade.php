<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Código de verificación</title>
</head>

<body>
    <h2>Confirmación de correo electrónico</h2>

    <p>Has solicitado cambiar tu correo electrónico.</p>

    <p>Tu código de verificación es:</p>

    <h1 style="letter-spacing: 5px;">
        {{ $code }}
    </h1>

    <p>Este código expira en <strong>10 minutos</strong>.</p>

    <p>Si tú no solicitaste este cambio, ignora este correo.</p>
</body>

</html>
