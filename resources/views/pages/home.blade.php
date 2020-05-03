@extends('layouts.app')

@section('content')
<div class="container">

<h1>Buildings</h1>
<a href="/admin">Панель администратора</a>

    @foreach ($building as $item)
        <div class="item">
                
            <div class="info">
                <h4>Цена {{$item['building']->price}}</h4>
               
                <p>Город {{$item['address']->city}}</p>
                <p>Улица {{$item['address']->street}}</p>
                <p>Квартира {{$item['address']->flat}}</p>
                <a href="{{route('singlePage', ['id' => $item['building']->building_id])}}">Подробнее...</a>
            </div>
            
        </div> 
        <hr>          
    @endforeach 

</div> 
    
@endsection
