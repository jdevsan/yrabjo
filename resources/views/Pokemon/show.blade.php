@extends('Template.basic')

@section('content')

<table class="container-fluid">
    <div class="row">
   
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Weigth</th>
            <th>Heigth</th>
            <th>Type</th>
            <th>Evolves</th>
            <th>Editar</th>
            <th>Ver</th>
          </tr>
         
        </thead>

        
        <tbody>
            <hr>
          <tr>
            

          <td>@foreach($poke as $pokes){{$pokes->id}}<br> @endforeach </td>

          <td>@foreach($poke as $pokes){{$pokes->name}}<br> @endforeach</td>
          <td>@foreach($poke as $pokes){{$pokes->weight}}<br> @endforeach</td>
          <td>@foreach($poke as $pokes){{$pokes->height}}<br> @endforeach</td>
          
          <td>@foreach($poke as $pokes)
            @if(isset($pokes->type_id) && $pokes->id !== null)
            {{App\Type::find($pokes->type_id)->name}}<br> 
            @endif
          @endforeach</td>
        
          <td>@foreach($poke as $pokes){{$pokes->evolves}}<br> @endforeach</td>
          <td>@foreach($poke as $pokes)<a href="editar/{{$pokes->id}}">Editar</a><br> @endforeach</td>
          <td>@foreach($poke as $pokes)<a href="pokemon/{{$pokes->id}}">Ver</a><br> @endforeach</td>



          </tr>
          
           
        
        </tbody>
      </table>

      <br> 
      <br>
    <button><a href="{{url('/nuevo')}}" class="btn btn-outline-dark"> Nuevo pokemon</a></button>
     
   



@endsection

