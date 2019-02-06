@extends('Template.basic')
@section('content')

<form id="formu" method="post">

@csrf

{{-- <script>
        let success = querySelector('.alert alert-success');
        success.addEventListener('click', Success);
        function Success(event){

                confirm('pokemon agregado');
        }


        </script> --}}
        @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
              <p> Pokemon agregado correctamente<p>
                </div>
        @endif

        <div class="cointainer">

<div class="form-group">
        <label for="name">Name</label><br>
        <input type="text" name="name" class="form-control"></input><br>
</div>
<div class="form-group">        
        
        <label for="weight">Weight</label><br>

        <input type="text" name="weight" class="form-control"></input><br>

</div>

        <div class="form-group">        
        <label for="heigth">Height</label><br>
        <input type="text" name="height" class="form-control"></input><br>
        
        </div>


                <label for="type">Type</label><br>
                <select type="text" name="type" class="form-control">
                @foreach(App\Type::all() as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
                </select>
               
                <br>
        </div>

        <div class="dropdown">
        <label for="heigth">Evolves</label><br>

        <select class="btn btn-secondary dropdown-toggle" type="text" name="evolves">
                
                        @foreach($poke as $pokes) 

                @if($pokes->evolves != null)
                        <option value="{{$pokes->id}}">{{$pokes->name}}</option>    
                @endif
       
        
        @endforeach

        </select>
        <br>
        <br>
        
                <button id="add" onclick="editarDatos(event);" class="btn btn-info" type="submit">Agregar Pokemón</button>
        
      
        
        </form>

        <br>
        <br>
        <button><a href="{{url('/pokemon')}}" class="btn btn-outline-dark"> Volver</a></button>


</div>


<script>
                // delbtn = document.querySelector('#add');
                // console.log(delbtn);
                // delbtn.onclick = function(event){
        
                //    confirm("Estas seguro de agregar este Pokémon?");
                    
        
                // }




                function editarDatos(event){
        
        event.preventDefault();
        const form = document.querySelector('#formu');

        
        const datos = {
            'name': form.elements[1].value,
            'weight': form.elements[2].value,
            'height': form.elements[3].value,
            'type': form.elements[4].value,
            'evolves': form.elements[5].value,
        };
        console.log(datos)
        
        fetch('/api/add', {
            method: 'PATCH',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(datos),
            
        })
        .then(function(response) {
            return response.json();
            
        })
        .then(function(data){
                if(data){
                                        Swal(
                'Good job!',
                'Pokemon added!',
                'success'
                )
                setTimeout(function(){

                window.location.href = '{{url('/pokemon')}}';

        },2000)
                
                }

          
        })
        .catch(function(error){
            

                                      Swal(
                'Error!',
                'You clicked the button!',
                'Error'
                )
            
            
        });   
        
        
    }
               
        
               
              
               
        
                </script>







@endsection