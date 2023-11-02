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
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Correo'=>'required|string|max:100',
            'INE'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'INE.required'=>'La foto es requerida'
        ];

        $this->validate($request,$campos,$mensaje);

       

        $datosReporte= request()->except('_token');
    

        if($request -> hasFile('INE')){
            $datosReporte['INE']=$request->file('INE')->store('uploads','public');
        }


        Extraviado::insert($datosReporte);
        //return response()->json($datosEmpleado);
        //return redirect('reporte.create')->with('mensaje','Reporte agregado con éxito');
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
