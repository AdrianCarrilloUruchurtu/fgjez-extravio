<h1>{{ $modo }} empleado</h1>

@if (count($errors)>0)
    
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
              <li>  {{ $error }} </li>
            @endforeach
      </ul>
    </div>

@endif

<div class="form-group">
<label for="Nombre">Nombre</label>
<input class="form-control" type="text" name="Nombre" 
value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" id="ApellidoPaterno">
<br>
</div>

<div class="form-group">
<label for="Correo">Correo</label>
<input class="form-control" type="text" name="Correo" 
value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo')}}" id="Correo">
<br>
</div>
<input class="btn btn-success" type="submit" 
value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('empleado/')}}">Regresar</a>
