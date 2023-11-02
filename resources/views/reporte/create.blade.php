@extends('layouts.app')
@section('content')
<div class="container">
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}  
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
     </div>
    @endif 
<form action="{{ url('/reporte') }}" method="post" enctype="multipart/form-data">
@csrf
@include('reporte.form',['modo'=>'Crear']);

</form>
</div>
@endsection