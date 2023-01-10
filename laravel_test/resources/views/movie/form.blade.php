<label for="Name">Nombre</label>
<input type="text" name="Name" value="{{ $movie->Name }}" id="Name">
<br>
<label for="Year">Año</label>
<input type="text" name="Year" value="{{ $movie->Year }}" id="Year">
<br>
<label for="Genre">Género</label>
<input type="text" name="Genre" value="{{ $movie->Genre }}" id="Genre">
<br>
<label for="Description">Sinopis</label>
<input type="text" name="Description" value="{{ $movie->Description }}" id="Description">
<br>
<label for="Featuring">Protagoniza</label>
<input type="text" name="Featuring" value="{{ $movie->Featuring }}" id="Featuring">
<br>
<label for="Director">Director</label>
<input type="text" name="Director" value="{{ $movie->Director }}" id="Director">
<br>
<label for="Photo">Cartel</label>
<br>
<img src="{{ asset('storage').'/'.$movie->Photo }}" alt="">
<input type="file" name="Photo" value="" id="Photo">
<br>
<input type="submit" Value="Save">
