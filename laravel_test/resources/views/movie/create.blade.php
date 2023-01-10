@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/movie') }}" method="post" enctype="multipart/form-data">
{{-- Generación de token de seguirdad --}}
    @csrf
    @include('movie.form', ['modo'=>'Agregar']);

</form>
</div>
@endsection
