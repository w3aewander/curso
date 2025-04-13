@extends('layouts.app')
@section('content')
<!-- O Vue será montado aqui -->

<div id="app">
    <h1>Olá Mundo</h1>
    <p>Bem-vindo ao nosso aplicativo!</p>
    <p>Esta é uma aplicação de exemplo para demonstrar o uso do Laravel e Vue.js.</p>
<HelloWorld />

</div>



@endsection


@push('scripts')
<script>
    // Verifica se o Vue foi carregado corretamente
    document.addEventListener('DOMContentLoaded', () => {
        console.log('Vue.js carregado:', typeof Vue !== 'undefined');
    });
    // Verifica se o HelloWorld foi registrado corretamente
    document.addEventListener('DOMContentLoaded', () => {
        console.log('Componente HelloWorld registrado:', typeof HelloWorld !== 'undefined');
    });
    
</script>
@endpush