@extends('layouts.app')

@section('content')
<h1>Building</h1>

    
    <div class="item">
            
        <div class="info">
            <h4>Цена {{$building[0]->price}}</h4>
            <p>Описание {{$building[0]->description}}</p>
            
            
        </div>
        
    </div> 
    <hr>          
@endsection