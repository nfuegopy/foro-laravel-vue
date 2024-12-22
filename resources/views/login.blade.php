<!-- login.blade.php -->
<div id="app">
<auth-switch></auth-switch>
</div>
<script>
    let rutaGuardarCliente = "{{ route('usuarios.cliente.guardar') }}";
    console.log('Ruta de registro:', rutaGuardarCliente);

</script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
