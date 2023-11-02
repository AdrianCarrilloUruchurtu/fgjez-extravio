@extends('layouts.app')
@section('content')
<div class="container-fluid">
        @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}  
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
         </div>
        @endif 


        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
        
                          
<br>
<br>
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">INE</th>
                <th scope="col">Nombre</th>
                <th scope="col">CURP</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Correo</th>
                <th scope="col">Documento extraviado</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha de extraviado</th>
                <th scope="col">Lugar</th>
                <th scope="col">Descripción de los hechos</th>
                <th scope="col">Estatus</th>
                <th scope="col">Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ( $extraviados as $extraviado )
            <tr>
                <td>{{ $extraviado->id }}</td>
                
                <td>
                    <img class="img-thumbnail img-fluid" width="100" src="{{ asset('storage'.'/'.$extraviado->INE) }}" alt="">
                </td> 
                <td>{{ $extraviado->Nombre }}</td>
                <td>{{ $extraviado->CURP }}</td>
                <td>{{ $extraviado->FechaNacimiento }}</td>
                <td>{{ $extraviado->Correo }}</td>
                <td>{{ $extraviado->DocumentoExtraviado }}</td>
                <td>{{ $extraviado->Descripcion }}</td>
                <td>{{ $extraviado->FechaExtravio }}</td>
                <td>{{ $extraviado->Lugar }}</td>
                <td>{{ $extraviado->DescripcionHechos }}</td>
                <td>{{ $extraviado->Estatus }}</td>
                <td> 
                    <form action="{{ route('sendMail') }}" method="POST" class="d-inline">
                        {{ method_field('post') }}
                        @csrf

                        <input type="hidden" name="nombre" value={{$extraviado->Nombre}}>
                        <input type="hidden" name="email" value="{{$extraviado->Correo}}">
                        <input type="hidden" name="descripcion" value="{{$extraviado->Descripcion}}">
                        <input type="hidden" name="fechaExtravio" value="{{$extraviado->FechaExtravio}}">
                        <input type="hidden" name="lugarExtravio" value="{{$extraviado->Lugar}}">
                        <input type="hidden" name="estatus" value='correcto'>

                        <button type="submit" class="btn btn-warning">Enviar mail de documentacion correcta </button>
                    </form>
                    
                     <br>
                     <br>
                    <form action="{{ route('sendMail',$extraviado->Correo,$extraviado->Nombre,$estatus =1)}}" method="post" class="d-inline">
                    @csrf
                    {{ method_field('post') }}
                    <input type="hidden" name="nombre" value="{{$extraviado->Nombre}}"> 
                        <input type="hidden" name="email" value="{{$extraviado->Correo}}">
                        <input type="hidden" name="estatus" value='incorrecto'>
                    <button type="submit" class="btn btn-warning">Solicitar revisión de reporte </button>

                    
                    </form>
                    
                </td>
            </tr>
            @endforeach

            
        </tbody>
    </table>
    {!! $extraviados->links() !!}
</div>
</div>
@endsection
