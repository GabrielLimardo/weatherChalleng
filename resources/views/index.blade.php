@extends('layouts.base')

@section('content')

@if(!isset($city) )
<div class="row m-5 p-5 glass rounded">
    <form class="col" action="/test" method="post">
        @csrf
        <div class="mb-3">
            <label for="city" class="form-label text-white">Ingrese la ciudad</label>
            <input type="text" class="form-control" name="city" placeholder="Ingrese la ciudad">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>
@endif

@if(isset($city))
<div class="row m-5 p-5 glass rounded text-white">
    <div class="col">
        <h3>El clima en la ciudad de {{$city}}</h3>
        <p>{{$climate}}</p>
        <p>{{$temperature}}° degrees</p>
        <img src="{{$weather_icons}}" alt="img">
    </div>
</div>
@endif

@if(isset($city))
<a href="/"> <button type="submit" class="btn btn-primary">Back</button> </a>
@endif

@endsection
