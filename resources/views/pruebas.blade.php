<form class="form_registro" method="POST" action="{{ route('confirmation') }}">
    <!-- @csrf -->

    <label>Usuario</label>
    <input type="text" name="user">

    <input type="submit">

</form>
