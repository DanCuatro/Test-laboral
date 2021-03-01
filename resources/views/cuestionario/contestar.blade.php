@extends('layouts.app')
@section('styles')
<style>
#form {
    width: 250px;
    margin: 0 auto;
    height: 50px;
  }
  
  #form p {
    text-align: center;
  }
  
  #form label {
    font-size: 20px;
  }
  
  input[type="radio"] {
    display: none;
  }
  
  label {
    color: grey;
  }
  
  .clasificacion {
    direction: rtl;
    unicode-bidi: bidi-override;
  }
  
  label:hover,
  label:hover ~ label {
    color: orange;
  }
  
  input[type="radio"]:checked ~ label {
    color: orange;
  }
</style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @livewire('cuestionario-component')
        </div>
    </div>
@endsection