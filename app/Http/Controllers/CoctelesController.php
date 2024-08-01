<?php

namespace App\Http\Controllers;

use App\Models\Cocteles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoctelesController extends Controller
{
    
    public function index()
    {
        $datos['cocteles'] =Cocteles::paginate(5);
        return view('cocteles.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cocteles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define las reglas de validación
        $rules = [
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'vaso' => 'required|string|max:100',
            'instrucciones' => 'required|string',
            'ingrediente1' => 'required|string|max:100',
            'ingrediente2' => 'required|string|max:100',
            'medida1' => 'required|string|max:50',
            'medida2' => 'required|string|max:50',
        ];
    
        // Valida los datos del request
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Crear nuevo cóctel
        Cocteles::create($request->all());
    
        return redirect('cocteles')->with('mensaje', 'Cóctel guardado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cocteles $cocteles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idCoctel)
    {
        $coctel= Cocteles::findOrFail($idCoctel);
        return view('cocteles.edit', compact('coctel'));
    }

 
     public function update(Request $request, $idCoctel)
     {
       
         $rules = [
             'nombre' => 'required|string|max:255',
             'categoria' => 'required|string|max:100',
             'vaso' => 'required|string|max:100',
             'instrucciones' => 'required|string',
             'ingrediente1' => 'required|string|max:100',
             'ingrediente2' => 'required|string|max:100',
             'medida1' => 'required|string|max:50',
             'medida2' => 'required|string|max:50',
         ];
     
      
         $messages = [
             'required' => 'El campo :attribute es requerido.',
             'string' => 'El campo :attribute debe ser una cadena de texto.',
             'max' => 'El campo :attribute no debe tener más de :max caracteres.',
         ];
     
        
         $validator = Validator::make($request->all(), $rules, $messages);
     
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
     
         Cocteles::where('idCoctel', '=', $idCoctel)->update($request->except(['_token', '_method']));
     
         return redirect('cocteles')->with('mensaje', 'Cóctel editado con éxito');
     }

    public function destroy($idCoctel)
    {
        Cocteles::destroy($idCoctel);
        return redirect('/cocteles')->with('mensaje', 'Cóctel eliminado exitosamente');    }
}
