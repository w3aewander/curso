<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Curso App') }}</title>

    <!-- Estilos -->
    <link href="{{ mix('css/index.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Container Vue -->
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts carregados no final para melhor performance -->
    <script src="{{ mix('js/chunk-vendors.js') }}"></script>
    <script src="{{ mix('js/index.js') }}"></script>

    <!-- Debug para desenvolvimento -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM carregado');
            console.log('Vue assets:', {
                vendors: '{{ mix("js/chunk-vendors.js") }}',
                app: '{{ mix("js/index.js") }}',
                css: '{{ mix("css/index.css") }}'
            });
        });
    </script>
</body>
</html>