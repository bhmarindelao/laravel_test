<h1> {{ $modo }} película</h1>
<label for="Name">Nombre</label>
<input type="text" name="Name" value="{{ isset($movie->Name)?$movie->Name:'' }}" id="Name">
<br>
<label for="Year">Año</label>
<input type="text" name="Year" value="{{ isset($movie->Year)?$movie->Year:'' }}" id="Year">
<br>
<label for="Genre">Género</label>
<input type="text" name="Genre" value="{{ isset($movie->Genre)?$movie->Genre:'' }}" id="Genre">
<br>
<label for="Description">Sinopis</label>
<input type="text" name="Description" value="{{ isset($movie->Description)?$movie->Description:'' }}" id="Description">
<br>
<label for="Featuring">Protagoniza</label>
<input type="text" name="Featuring" value="{{ isset($movie->Featuring)?$movie->Featuring:'' }}" id="Featuring">
<br>
<label for="Director">Director</label>
<input type="text" name="Director" value="{{ isset($movie->Director)?$movie->Director:'' }}" id="Director">
<br>
<label for="Photo">Cartel</label>
<br>
@if (isset($movie->Photo))
<img src="{{ asset('storage').'/'.$movie->Photo }}" width="200" alt="">
@endif
<input type="file" name="Photo" value="" id="Photo">
<br>
<input type="submit" Value="{{$modo}} película">

<a href="{{ url('movie/') }}">Regresar</a>
