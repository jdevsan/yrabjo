<?php
use App\Pokemon;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/Pokemon', function(){
    $poke = Pokemon::all();

    return response()->json($poke);


});


Route::patch('/add', function(Request $request){

    $poke = Pokemon::create([
        'name' => $request->input('name'),
        'weight' => $request->input('weight'),
        'height' => $request->input('height'),
        'type_id' => $request->input('type'),
        'evolves' => $request->input('evolves'),
       
    ]);


    if (!$poke) {
        $data = [
            'status'=>'error',
            'data' => 'Hubo un errror',
        ];
        return response()->json($data);
    }

    // if (isset($request['name'])) {
    //     $user->name = $request['name'];
    // }

    // if (isset($request['email'])) {
    //     $user->email = $request['email'];
    // }

    // if (isset($request['phone'])) {
    //     $user->phone = $request['phone'];
    // }

    else{



    $data = [
        'status' => "ok",
        'data' =>  "Perfecto"
    ];
    return response()->json($data);

}

});

