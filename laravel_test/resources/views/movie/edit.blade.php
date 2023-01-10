
<form action="{{ url('/movie/'.$movie->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('movie.form');

</form>
