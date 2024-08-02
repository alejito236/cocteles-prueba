<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 
use App\Models\Cocteles;

class APIController extends Controller
{
    public function index()
    {
     
        $response = Http::get('https://www.thecocktaildb.com/api/json/v1/1/search.php?s=');

   
        if ($response->successful()) {
        
            $cocktails = $response->json()['drinks'];
         
            return view('API.index', ['estadisticas' => $cocktails]);
        }

        
        return view('API.index', ['estadisticas' => []])->withErrors('No se pudieron obtener los datos de la API.');
    }
    public function show($id)
    {
        $response = Http::get("https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i={$id}");
    
        if ($response->successful()) {
            $cocktail = $response->json()['drinks'][0];
    
            // Check if cocktail data is not empty
            if (!empty($cocktail)) {
                return view('api.show', compact('cocktail'));
            }
        }
    
        return redirect()->back()->withErrors('No se pudo obtener el cóctel.');
    }

    public function export($idDrink)
    {
        $response = Http::get("https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i={$idDrink}");

        if ($response->successful()) {
            $cocktail = $response->json()['drinks'][0];

            Cocteles::create([
                'nombre' => $cocktail['strDrink'],
                'categoria' => $cocktail['strCategory'],
                'esAlcoholico' => $cocktail['strAlcoholic'] === 'Alcoholic',
                'vaso' => $cocktail['strGlass'],
                'instrucciones' => $cocktail['strInstructions'],
                'imagenURL' => $cocktail['strDrinkThumb'],
                'ingrediente1' => $cocktail['strIngredient1'] ?? null,
                'ingrediente2' => $cocktail['strIngredient2'] ?? null,
                'ingrediente3' => $cocktail['strIngredient3'] ?? null,
                'ingrediente4' => $cocktail['strIngredient4'] ?? null,
                'ingrediente5' => $cocktail['strIngredient5'] ?? null,
                'medida1' => $cocktail['strMeasure1'] ?? null,
                'medida2' => $cocktail['strMeasure2'] ?? null,
                'medida3' => $cocktail['strMeasure3'] ?? null,
                'medida4' => $cocktail['strMeasure4'] ?? null,
                'medida5' => $cocktail['strMeasure5'] ?? null,
                'fechaModificacion' => now(),
            ]);

            return redirect()->route('cocteles.index')->with('mensaje', 'Cóctel exportado con éxito. Revisa tu tabla de cócteles.');
        }

        return redirect()->back()->withErrors('No se pudo exportar el cóctel.');
    }
}

