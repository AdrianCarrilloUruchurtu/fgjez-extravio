<h1>{{ $modo }} Reporte</h1>

{{-- // Alert para manejar estados  --}}
@if (count($errors)>0)
    
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
              <li>  {{ $error }} </li>
            @endforeach
      </ul>
    </div>

@endif

{{-- //Solicitar nombre de la persona --}}
<div class="form-group">
<label for="Nombre">Nombre</label>
<input class="form-control" type="text" name="Nombre" 
value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" id="Nombre">
<br>
</div>

{{-- //Solicitar INE --}}
<div class="form-group">
<label for="INE">INE</label>
@if (isset($extraviado->INE))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$extraviado->INE }}" width="100" alt="">
@endif
<input class="form-control" type="file" name="INE" 
value="" id="INE">
<br>
</div>

{{-- //CURP --}}
<div class="form-group">
<label for="CURP">CURP</label>
<input class="form-control" type="text" name="CURP" 
value="{{ isset($extraviado->CURP)?$extraviado->CURP:old('CURP') }}" id="CURP">
<br>
</div>

{{-- //Fecha de nacimiento --}}
<div class="form-group">
<label for="FechaNacimiento">Fecha de nacimiento</label>
<input class="form-control" type="date" name="FechaNacimiento" 
value="{{ isset($extraviado->FechaNacimiento)?$extraviado->FechaNacimiento:old('FechaNacimiento') }}" id="FechaNacimiento">
<br>
</div>

{{-- //Correo --}}
<div class="form-group">
<label for="Correo">Correo</label>
<input class="form-control" type="text" name="Correo" 
value="{{isset($extraviado->Correo)?$extraviado->Correo:old('Correo')}}" id="Correo">
<br>
</div>

{{-- Nombre del documento extraviado --}}
<div class="form-group">
<label for="DocumentoExtraviado">Nombre del documento/objeto extraviado</label>
<input class="form-control" type="text" name="DocumentoExtraviado" 
value="{{isset($extraviado->DocumentoExtraviado)?$extraviado->DocumentoExtraviado:old('DocumentoExtraviado')}}" id="DocumentoExtraviado">
<br>
</div>

{{-- //Descripcion del documento u objeto extraviado --}}
<div class="form-group">
<label for="Descripcion">Proporciona una breve descripción del documento u objeto que se extravió</label>
<input class="form-control" type="text" name="Descripcion" 
value="{{isset($extraviado->Descripcion)?$extraviado->Descripcion:old('Descripcion')}}" id="Descripcion"> 
<br>
</div>

{{-- //Fecha del extravio --}}
<div class="form-group">
<label for="FechaExtravio">Fecha de lo sucedido</label>
<input class="form-control" type="date" name="FechaExtravio" 
value="{{isset($extraviado->FechaExtravio)?$extraviado->FechaExtravio:old('FechaExtravio')}}" id="FechaExtravio">
<br>
</div>

{{-- //Lugar del extravio --}}
<div class="form-group">
<label for="Lugar">Lugar de lo sucedido</label>
<input class="form-control" type="text" name="Lugar" 
value="{{isset($extraviado->Lugar)?$extraviado->Lugar:old('Lugar')}}" id="Lugar">
<br>
</div>

{{-- //Descripcion de los hechos --}}
<div class="form-group">
<label for="DescripcionHechos">Breve descripcion de lo que sucedió</label>
<input class="form-control" type="text" name="DescripcionHechos" 
value="{{isset($extraviado->DescripcionHechos)?$extraviado->DescripcionHechos:old('DescripcionHechos')}}" id="DescripcionHechos">
<br>
</div>

{{-- //Estatus del reporte --}}
{{-- <div class="form-group">
<label for="Estatus">Estatus</label>
<input class="form-control" type="text" name="FechaExtravio" 
value="{{isset($extraviado->FechaExtravio)?$extraviado->FechaExtravio:old('FechaExtravio')}}" id="FechaExtravio">
<br>
</div> --}}

<input class="btn btn-success" type="submit" 
value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('empleado/')}}">Regresar</a>
