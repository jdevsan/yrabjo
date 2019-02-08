<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function todos() //Ver la lista de Pokémon
    {
            $pokes = Pokemon::All();

            

            return view('Pokemon.show', ['poke'=>$pokes]);

        //
    }

    public function create(){
        return view('Pokemon.create');
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevo(Request $request)// Agregar un nuevo Pokémon
    {
        $success = "Pokemon creado correctamente";

        $poke = Pokemon::create([
            'name' => $request->input('name'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'type_id' => $request->input('type'),
            'evolves' => $request->input('evolves'),
           
        ]);
       
      
          
        return redirect('/nuevo')->with('success', $success);



        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function uno($pokemon) //Ver el detalle de un Pokémon
    {
            
            $pokes = Pokemon::find($pokemon);
            return view('Pokemon.id',['poke'=>$pokes]);
           }
        //
    

    /**
     * Show the form for editing the specified resource.
     * 
     * 
     * public
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
  public function editar(Request $request, $id){


    $poke = Pokemon::find($id);

    $poke->name = $request->input('name');
    $poke->weight = $request->input('weight');
    $poke->height = $request->input('height');
    $poke->type_id = $request->input('type');
    $poke->evolves = $request->input('evolves');


    $poke->save();



    
    return redirect('/pokemon');



  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)// Modificar un Pokémon
    {




        //
    }

    // public function edit($id){

    //         $poke = Pokemon::find($id);

    //     return view('Pokemon.index', ['poke' => $poke]);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function borrar($id)//Eliminar un Pokémon
    {
        $pokes = Pokemon::find($id);

        $pokes->delete();

        return redirect('/pokemon');


        //
    }


    public function edit($id){
        $poke = Pokemon::find($id);

        return view('Pokemon.index',['poke' => $poke]);
    }

    public function evolv(){
            $poke = Pokemon::all();

            return view('Pokemon.create',['poke' => $poke]);

    }

 



}
