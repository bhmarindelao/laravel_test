@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('mensaje'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{ Session::get('mensaje') }}

       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

<a href="{{ url('movie/create') }}" class="btn btn-success">Registrar nueva película</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Cartel</th>
            <th>Nombre</th>
            <th>Año</th>
            <th>Género</th>
            <th>Sinopsis</th>
            <th>Protagoniza</th>
            <th>Director</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($movies as $movie)

        <tr>
            <td>{{ $movie->id }}</td>

            <td>
                {{-- Accede al storage y muestra la imagen --}}
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$movie->Photo }}" width="200" alt="">
            </td>
            <td>{{ $movie->Name }}</td>
            <td>{{ $movie->Year }}</td>
            <td>{{ $movie->Genre }}</td>
            <td>{{ $movie->Description }}</td>
            <td>{{ $movie->Featuring }}</td>
            <td>{{ $movie->Director }}</td>
            <td>

                <a href="{{url('/movie/'.$movie->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                |

                <form action="{{ url('/movie/'.$movie->id)}}" class="d-inline" method="post">
                    @csrf
                    {{-- Generación y recepción del borrado --}}
                    {{method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $movies->links() !!}
</div>
@endsection
