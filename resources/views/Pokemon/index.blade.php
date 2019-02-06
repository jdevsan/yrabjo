@extends('Template.basic')
@section('content')



<form action="{{route('pokemon.editar',['id' => $poke->id])}}" name="" method="post">
    @csrf
    @method('put')
    
    <div class="form-group">
        
        <label for="name">Name</label>
        <input type="text" name="name"  class="form-control" value="{{$poke->name}}">
    </div>
    <div class="form-group">
        
        <label for="weight">Weight</label>
        <input type="text" name="weight" id="" class="form-control" value="{{$poke->weight}}"/>
    </div>
    <div class="form-group">
        
        <label for="height">Height</label>
        <input type="text" name="height" class="form-control" id="" value="{{$poke->height}}"/>
    </div>
    
    <div class="form-group">
        {{-- @dd($poke->type_id) --}}
        <label for="type">Type</label>
        <select type="text" name="type" id="" class="form-control" value=""/>
        @foreach(App\Type::all() as $type)
        @if ($poke->type_id == $type->id)
        <option value="{{$type->id}}" selected>{{$type->name}}</option>
        @else 
        <option value="{{$type->id}}">{{$type->name}}</option>
        @endif
        @endforeach
    </select>
    
</div>



<div class="form-group">
    
    <label for="duracion">Evolves</label>
    
    <select name="evolves">
        <option value="">No tiene evolución</option>
        @foreach (App\Pokemon::all() as $pokes)
        @if ($pokes->id == $poke->evolves)
        <option value="{{ $pokes->id }}" selected>{{ $pokes->name }}</option>
        @else
        <option value="{{ $pokes->id }}">{{ $pokes->name }}</option>
        @endif
        @endforeach
    </select>
    
    
</div>




<div>
    
    
    {{-- <select>@foreach($pokes as $pokes){{$pokes->evolves}} @endforeach</select> --}}
    
    
    <button  class="btn btn-success" type="submit" value="Actualizar Pokemon" name="submit" class="button button-secondary">Actualizar pokemon</button><br>
</form>
<br>


<form method="post" action="{{route('pokemon.borrar',['id' => $poke->id])}}">
    @csrf
    {{ method_field('DELETE') }}
    
    <button id="del" type="submit" class="btn btn-warning" value="Borrar Pokemon"  name="submit" data-toggle="modal" data-target="#exampleModal">Borrar pokemon</button>
</form>
<br>


<button href="/pokemon/" class="btn btn-info" >Volver</button>
<div id="api">
</div>
<script>
    delbtn = document.querySelector('#del');
    console.log(delbtn);
    delbtn.onclick = function(event){
        
        confirm("Estas seguro de borrar este Pokémon?");
        
        
    }
    


      
      fetch('{{url('/api/Pokemon')}}').then(response => {
        return response.json();
    }).then(data => {
        console.log(data)
        const apipoke = document.querySelector('#api');
        for( let i = 0; i < data.length; i ++){
              api.innerHTML += 
    `<table class="container-fluid">
    <div class="row">
   
        <thead>
          <tr>
            
            <th>Name</th>
            <th>Weigth</th>
            <th>Heigth</th>
            <th>Type</th>
            <th>Evolves</th>
            
          </tr>
         
        </thead>

        
        <tbody>
            <hr>
          <tr>  
          <td>` + data[i].name +`</td>`+`<td>`+data[i].weight+`</td>`+`<td>`+data[i].height+`</td>` +`<td>`+data[i].type_id+`</td>` +`<td>`+ data[i].evolves +`<td> 
          </tr>
          
           
        
        </tbody>
      </table>`
             


        }
        
              
             
                
        
    }).catch(err => {
        
    });
    
    
    
    
    
</script>


@endsection


