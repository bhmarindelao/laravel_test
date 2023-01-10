<h1> {{ $modo }} película</h1>

<div class="form-group">
<label for="Name">Nombre</label>
<input type="text" class="form-control" name="Name" value="{{ isset($movie->Name)?$movie->Name:'' }}" id="Name">
<br>
</div>

<div class="form-group">
<label for="Year">Año</label>
<input type="text" class="form-control" name="Year" value="{{ isset($movie->Year)?$movie->Year:'' }}" id="Year">
<br>
</div>

<div class="form-group">
<label for="Genre">Género</label>
<input type="text" class="form-control" name="Genre" value="{{ isset($movie->Genre)?$movie->Genre:'' }}" id="Genre">
<br>
</div>

<div class="form-group">
<label for="Description">Sinopis</label>
<input type="text" class="form-control" name="Description" value="{{ isset($movie->Description)?$movie->Description:'' }}" id="Description">
<br>
</div>

<div class="form-group">
<label for="Featuring">Protagoniza</label>
<input type="text" class="form-control" name="Featuring" value="{{ isset($movie->Featuring)?$movie->Featuring:'' }}" id="Featuring">
<br>
</div>

<div class="form-group">
<label for="Director">Director</label>
<input type="text" class="form-control" name="Director" value="{{ isset($movie->Director)?$movie->Director:'' }}" id="Director">
<br>
</div>

<div class="form-group">
<label for="Photo">Cartel</label>
<br>
@if (isset($movie->Photo))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$movie->Photo }}" width="200" alt="">
@endif
<input type="file" class="form-control" name="Photo" value="" id="Photo">
<br>
</div>

<input class="btn btn-success" type="submit" Value="{{$modo}} película">

<a class="btn btn-primary" href="{{ url('movie/') }}">Regresar</a>
