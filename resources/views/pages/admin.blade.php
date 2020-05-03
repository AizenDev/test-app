@extends('layouts.app')

@section('content')




<div class="container">

<form action="/addfac" method="post" id="addfl">
  <input type="hidden" value="{!! csrf_token() !!}" name="_token">
  <h2>Набор удобств</h2>
    <div class="form-row">
      <div class="form-check">
        <input class="form-check-input"  type="checkbox" name="is_refrigerator">
        <label class="form-check-label">
          Наличие холодильника

        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_furniture">
        <label class="form-check-label">
          Наличие мебели

        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_tv">
        <label class="form-check-label">
          Наличие TV

        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_bathroom">
        <label class="form-check-label">
          Наличие ванной комнаты

        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_internet">
        <label class="form-check-label">
          Наличие интернета

        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_kitchen">
        <label class="form-check-label">
          Наличие кухни

        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_balcony">
        <label class="form-check-label">
          Наличие балкона

        </label>
      </div>
    </div>
    <button type="submit" name="addfl" class="btn btn-primary">Добавить удобства</button>
</form>

<hr>

<form action="/addaddr" method="post" id="addadr">
  <input type="hidden" value="{!! csrf_token() !!}" name="_token">
  <h2>Адрес</h2>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Город</label>
        <input type="text" class="form-control" name="city">
      </div>

      <div class="form-group col-md-4">
        <label>Улица</label>
        <input type="text" class="form-control" name="street">
      </div>

      <div class="form-group col-md-4">
        <label>Квартира</label>
        <input type="text" class="form-control" name="flat">
      </div>

      <div class="form-group col-md-2">
        <label>Широта</label>
        <input type="text" class="form-control" name="ln">
      </div>

      <div class="form-group col-md-2">
        <label>Долгота</label>
        <input type="text" class="form-control" name="lg">
      </div>
    </div>

    <button type="submit" name="addad" class="btn btn-primary">Добавить адрес</button>

</form>
<hr>
<form action="/addbuilding" method="POST" id="addform" >
  <h2>Общая информация</h2>
  <input type="hidden" value="{!! csrf_token() !!}" name="_token">
  <h2></h2>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Цена</label>
      <input type="text" class="form-control" name="price">
    </div>

    <div class="form-group col-md-4">
      <label>Описание</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="description"></textarea>
    </div>
  </div>
   
  <button type="submit" name="addbl" class="btn btn-primary">Добавить объект</button>
</form>

</div>

@include('inc.messages')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

<script>


  $('#addform').on('submit', function(e){
    e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        method: 'POST',
        url: '/addbuilding',
        data: formData,
        success: function(formData) {
          alert("suc")
        },
        error: function(error) {
          alert("fail")
        }
      })
    });

    $('#addfl').on('submit', function(e){
    //e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        method: 'POST',
        url: '/addfac',
        data: formData,
        success: function(formData) {
          alert("suc")
        },
        error: function(error) {
          alert("fail")
        }
      })
    });

    $('#addadr').on('submit', function(e){
    e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        method: 'POST',
        url: '/addaddr',
        data: formData,
        success: function(formData) {
          alert("suc")
        },
        error: function(error) {
          alert("fail")
        }
      })
    });

</script>


@endsection