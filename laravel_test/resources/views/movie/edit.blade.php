@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/movie/'.$movie->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('movie.form', ['modo'=>'Editar']);

</form>
</div>
@endsection
