<?php

namespace App\Http\Controllers;

use App\Models\Extraviado;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExtraviadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('reporte.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        //
        // Declaramos los campos para los campos de texto
        $campos=[
            'Nombre' => ['required', 'string', 'max:100'],
            'FechaNacimiento' => ['required', 'date', 'date_format:Y-m-d'],
            'Correo' => ['required', 'email', 'max:100'],
            'DocumentoExtraviado' => ['required', 'string', 'max:100'],
            'Descripcion' => ['required', 'string', 'max:100'],
            'FechaExtravio' => ['required', 'date', 'date_format:Y-m-d'],
            'Lugar' => ['required', 'string', 'max:100'],
            'DescripcionHechos' => ['required', 'string', 'max:100'],
            'Estatus' => ['required', 'string', 'max:100'],
        ];      
          // Guardamos mensaje de que el atributo que no cumple con las caraterísticas es requerido

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'INE.required'=>'La foto es requerida'
        ];

        // Se validan los campos
        $this->validate($request,$campos,$mensaje);

       
         // Exceptuamos el token para poder almacenar en BD
        $datosReporte= request()->except('_token');
    

        if($request -> hasFile('INE')){
            $datosReporte['INE']=$request->file('INE')->store('uploads','public');
        }


        Extraviado::insert($datosReporte);
    
        return view('reporte.create',$datosReporte);
    }

    /**
     * Display the specified resource.
     */
    public function show(Extraviado $extraviado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extraviado $extraviado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extraviado $extraviado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        Extraviado::destroy($id);
        return redirect('empleado');
    }
}
