<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <script src="<?php echo e(asset('js/app.js')); ?>" ></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('styles'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

    <style>
       
        footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;

                /** Estilos extra personales **/
                background-color: #ffffff;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }
    </style>
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                ITSX   
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                    <ul class="navbar-nav mr-auto">
                        
                        <?php if($pemisoArea || $pemisoAreaUser || Gate::check('roles.index') || Gate::check('cuestionario.asing') || Gate::check('graficos.index') || Gate::check('correos.index') || Gate::check('campus.index')): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administración</a>
                            <div class="dropdown-menu">
                            <div class="nav-link"><b> General</b></div>
    <?php if($pemisoAreaUser): ?>      <a class="nav-link" href="<?php echo e(route('users.index')); ?>">Empleados</a>       <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.index')): ?>       <a class="nav-link" href="<?php echo e(route('roles.index')); ?>">Roles</a>           <?php endif; ?>
                            <div class="dropdown-divider"></div>
                            <div class="nav-link"><b> Cuestionario</b></div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cuestionario.asing')): ?><a class="nav-link" href="<?php echo e(route('cuestionario.asignar')); ?>">Asignar</a><?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('graficos.index')): ?>    <a class="nav-link" href="<?php echo e(route('graficos.index')); ?>">Graficos</a>     <?php endif; ?>
                            <div class="dropdown-divider"></div>
                            <div class="nav-link"><b> Catalogos</b></div>
    <?php if($pemisoArea): ?>          <a class="nav-link" href="<?php echo e(route('areas.index')); ?>">Areas</a>           <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('correos.index')): ?>     <a class="nav-link" href="<?php echo e(route('correos.index')); ?>">Correos</a>       <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('campus.index')): ?>      <a class="nav-link" href="<?php echo e(route('campus.index')); ?>">Campus</a>         <?php endif; ?>
                            </div>
                        </li>
                        <?php endif; ?>
                            
                        <?php if(auth()->guard()->guest()): ?>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('users.personal')); ?>">Datos Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('cuestionario.resolver')); ?>">Cuestionario</a>
                        </li>
                        <?php endif; ?>
                    </ul>

             
                    <ul class="navbar-nav ml-auto">
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                    
                </div>
            </div>
        </nav>

        <main class="py-sm-5">

            <?php if(session('info')): ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-success">
                            <?php echo e(session('info')); ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
            
        </main>
    </div>
    <footer class="footer">
        <img src="<?php echo e(asset('images/logo.png')); ?>" width="900px" height="60px">
    </footer>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php echo $__env->yieldContent('scrips'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/layouts/app.blade.php ENDPATH**/ ?>