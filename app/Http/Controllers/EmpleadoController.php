<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Extraviado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Paginamos cada uno de los elementos en la tabla extraviados de la BD para poder mostrar 1 por página
        $datos['extraviados']=Extraviado::paginate(1);
        return view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Al momento de intentar crear un reporte se retorna la vista de creación de reporte al usuario
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        // Declaramos los campos para los campos de texto
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Correo'=>'required|string|max:100',
        ];
        // Guardamos mensaje de que el atributo que no cumple con las caraterísticas es requerido
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        // Se validan los campos
        $this->validate($request,$campos,$mensaje);

        // Exceptuamos el token para poder almacenar en BD
        $datosEmpleado= request()->except('_token');
    
        Empleado::insert($datosEmpleado);
        
        return redirect('empleado')->with('mensaje','Empleado agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Extraviado::destroy($id);
        return redirect('empleado');
    }
}
