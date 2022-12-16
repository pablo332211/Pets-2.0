<!DOCTYPE html>
<html lang="es">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../Vista/css/main.css">
</head>

<body>
    <div class="full-box login-container cover">
        <form action="validar.php" method="POST" autocomplete="off" class="logInForm">
            <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
            <p class="text-center text-muted text-uppercase">Iniciar sesión</p>
            <div class="form-group label-floating">
                <label class="control-label" for="UserName">Usuario</label>
                <input class="form-control" name="Documento_Medico" id="Documento_Medico" type="number">
                <p class="help-block">Escribe tu documento</p>
            </div>
            <div class="form-group label-floating">
                <label class="control-label" for="UserPass">Contraseña</label>
                <input class="form-control" id="Contrasena_Medico" name="Contrasena_Medico" type="password">
                <p class="help-block">Escribe tú contraseña</p>
            </div>
            <p class="text-center" style="margin-top: 20px;">
                <a href="../../Vista/desk.php">
                    <button type="submit" class="btn btn-info btn-raised btn-sm" name="validar" id="validar"><i class="zmdi zmdi-floppy"></i> Ingrsar</button></a>
            </p>
            <p class="text-center text-muted"><a href="../administrador/vistasAdministrador/agregarMedico.php" class="text-center register" title="Registrate"><br>¿No tienes una cuenta? <br> Registrate AQUI</a>
                <br>
                <br>
                <a href="../../Index.php" title="Inicio"><i class="zmdi zmdi-home zmdi-hc-2x"></i></a>
            </p>
        </form>
    </div>
   <!--====== Scripts -->
    
   <script src="../../../Vista/js/jquery-3.1.1.min.js"></script>
    <script src="../../../Vista/js/sweetalert2.min.js"></script>
    <script src="../../../Vista/js/bootstrap.min.js"></script>
    <script src="../../../Vista/js/material.min.js"></script>
    <script src="../../../Vista/js/ripples.min.js"></script>
    <script src="../../../Vista/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../../Vista/js/main.js"></script>
    <script>
        $.material.init();
    </script>
</body>

</html>