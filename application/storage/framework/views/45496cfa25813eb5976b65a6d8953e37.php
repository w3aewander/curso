<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Curso App')); ?></title>

    <!-- Estilos -->
    <link href="<?php echo e(mix('css/index.css')); ?>" rel="stylesheet">
</head>
<body>
    <!-- Container Vue -->
    <div id="app">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts carregados no final para melhor performance -->
    <script src="<?php echo e(mix('js/chunk-vendors.js')); ?>"></script>
    <script src="<?php echo e(mix('js/index.js')); ?>"></script>

    <!-- Debug para desenvolvimento -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM carregado');
            console.log('Vue assets:', {
                vendors: '<?php echo e(mix("js/chunk-vendors.js")); ?>',
                app: '<?php echo e(mix("js/index.js")); ?>',
                css: '<?php echo e(mix("css/index.css")); ?>'
            });
        });
    </script>
</body>
</html><?php /**PATH /var/www/html/curso/application/resources/views/layouts/app.blade.php ENDPATH**/ ?>