@extends('Template.basic')
@section('content')


{{-- <table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Weight</th>
            <th>Height</th>
            <th>Type</th>
            <th>Evolves</th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <td>{{$poke->id}}</td>
            <td>{{$poke->name}}</td>
            <td>{{$poke->weight}}</td>
            <td>{{$poke->height}}</td>
            <td>{{App\Type::find($poke->type_id)->name}}</td>
            <td>{{$poke->evolves}}</td>
            
        </tr>
        
        
        
    </tbody>
</table> --}}

<img src="{{ asset('poke-img/images/poke-'.$poke->id.'.jpg') }}" alt="Icono de {{ $poke->name }}">

<div class="form-group">
    
    <label for="id">id</label>
    <input type="text" name="id"  class="form-control" value="{{$poke->id}}">
</div>
<div class="form-group">
    
    <label for="name">Name</label>
    <input type="text" name="name"  class="form-control" value="{{$poke->name}}">
</div>
<div class="form-group">
    
    <label for="weight">Weight</label>
    <input type="text" name="weight"  class="form-control" value="{{$poke->weight}}">
</div>
<div class="form-group">
    
    <label for="id">Height</label>
    <input type="text" name="height"  class="form-control" value="{{$poke->height}}">
</div>


<div class="form-group">
    <label for="evolves">Type</label>
    <select name="type_id" class="form-control">
        @foreach (App\Type::all() as $types)
        <option value="{{ $types->id }}" {{ ($types->id == $poke->type_id) ? 'selected' : ''}}>{{ $types->name }}</option>
        @endforeach
    </select>
    
    
</div>

<div class="form-group">
    <label for="evolves">Evolves</label>
    <select name="evolves" class="form-control">
        <option value="">No envoluciona</option>
        @foreach (App\Pokemon::all() as $pokes)
        @if ($pokes->id == $poke->id)
        <option value="{{ $pokes->id }}" selected>{{ $pokes->name }}</option>
        @else
        <option value="{{ $pokes->id }}">{{ $pokes->name }}</option>
        @endif
        @endforeach
    </select>
</div>


<button><a href="/pokemon" class="btn btn-dark">Volver</a></button>




@endsection