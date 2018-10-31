<form class="form_registro" method="POST" action="{{ route('confirmation') }}">
    <!-- @csrf -->

    <label>Nombre</label>
    <input type="text" name="nombre">

    <label>Apellido</label>
    <input type="text" name="apellido">

    <input type="submit">

</form>
