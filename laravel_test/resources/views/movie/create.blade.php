Formulario de creación

<form action="{{ url('/movie') }}" method="post" enctype="multipart/form-data">
{{-- Generación de token de seguirdad --}}
    @csrf
<label for="Name">Nombre</label>
<input type="text" name="Name">
<br>
<label for="Year">Año</label>
<input type="text" name="Year">
<br>
<label for="Genre">Género</label>
<input type="text" name="Genre">
<br>
<label for="Description">Sinopis</label>
<input type="text" name="Description">
<br>
<label for="Featuring">Protagoniza</label>
<input type="text" name="Featuring">
<br>
<label for="Director">Director</label>
<input type="text" name="Director">
<br>
<label for="Photo">Cartel</label>
<input type="file" name="Photo">
<br>
<input type="submit" Value="Save">
<br>

</form>
