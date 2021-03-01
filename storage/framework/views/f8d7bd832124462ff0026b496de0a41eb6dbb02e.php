<!DOCTYPE html>
<html>
<head>
    <title>Correo Nuevo</title>
    <style>
        
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1>NOM:035 Cambio de Contraseña</h1>
        </div>
        <div class="card-body">
            <p>Se ha hecho una Petición para el cambio de su correo actual (<?php echo e($emailAntiguo); ?>) a esta Cuenta</p>
            <p>Acceda al siguiente <a href="<?php echo e(route('users.cambiarCorreo',$id)); ?>"> enlace para concluir con la petición</a></p>
            <p>Si usted no ha hecho esta petición, solo ignore este correo </p>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/email/notificaion-correo.blade.php ENDPATH**/ ?>