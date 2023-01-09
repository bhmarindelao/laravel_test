Formulario de creación

<form action="{{ url('/movie') }}" method="post" enctype="multipart/form-data">
{{-- Generación de token de seguirdad --}}
    @csrf
    @include('movie.form');

</form>
