@extends('app')

@section('content')
<div class="container w-50 border p-4 mt-4">
    <form action="{{ route('loststuff') }}" method="POST">

        @csrf

        @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        @error('objeto')
            <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror

        @error('lugar')
            <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror

        @error('description')
            <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror

        <div class="mb-3">
            <label for="objeto" class="form-label">Objeto encontrado</label>
            <input type="text" name="objeto" class="form-control" id="objeto" aria-describedby="objeto">
        </div>

        <div class="mb-3">
            <label for="lugar" class="form-label">¿Dónde lo encontraste?</label>
            <select name="lugar" class="form-select" id="lugar">
                <option value="biblioteca">Biblioteca</option>
                <option value="cafeteria-norte">Cafeteria Norte</option>
                <option value="cafeteria-ser">Cafeteria Sur</option>
                <option value="ciencias-basicas">Ciencias Basicas</option>
                <option value="edificio-d">Edificio D</option>
                <option value="edificio-administracion">Edificio Administracion</option>
                <option value="edificio-g">Edificio G</option>
                <option value="edificio-k">Edificio K</option>
                <option value="edificio-t">Edificio T</option>
                <option value="edificio-w">Edificio W</option>
                <option value="estacionamiento-oeste">Estacionamiento Oeste</option>
                <option value="estacionamiento-este">Estacionamiento Este</option>
                <option value="pasillo-principal">Pasillo Principal</option>
                <option value="posgrado">Posgrado</option>
                <option value="patio-civico">Patio Civico</option>
                <option value="salon-paz">Salon de la Paz</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Donde se encuentra el objeto</label>
            <input name="description" type="text-field" class="form-control" id="description" aria-describedby="descriptionHelp">
            <div id="descriptionHelp" class="form-text">Write a short description about where is the object now (ex. I left it with the guards at the entrance)</div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="container w-50 border p-4 mt-4">
    <div >
        @foreach ($objetos as $objeto)
        <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">
                <a href="{{ route('loststuff-edit', [$objeto->id])}}">{{$objeto->object_name}}</a>
            </div>

            <div class="col-md-3 d-flex justify-content-end">
                <form action="{{ route('loststuff-destroy', [$objeto->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div>

    </div>

</div>
@endsection
