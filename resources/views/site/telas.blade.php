@extends('components.layouts.telas')

{{-- opcional: dá um título dinâmico à página --}}
@section('title', 'Página Inicial')




@section('content')
<div class="background-wrapper">
    <img src="{{ asset('images/telas.png') }}" class="background-image" draggable="false">
</div>


<div id="image-track" data-mouse-down-at="0" data-prev-percentage ="0">
    <img class="image" src="{{ asset('images/telas (1).jpeg') }}" draggable="false">
    <img class="image" src="{{ asset('images/telas (2).jpeg') }}" draggable="false">
    <img class="image" src="{{ asset('images/telas (3).jpeg') }}" draggable="false">
    <img class="image" src="{{ asset('images/telas (4).jpeg') }}" draggable="false">
    <img class="image" src="{{ asset('images/telas (5).jpeg') }}" draggable="false">
    <img class="image" src="{{ asset('images/telas (6).jpeg') }}" draggable="false">
    <img class="image" src="{{ asset('images/telas (7).jpeg') }}" draggable="false">
    <img class="image" src="{{ asset('images/telas (8).jpeg') }}" draggable="false">
</div>

<div id="logo-container">
    <img src="{{ asset('images/logo.png') }}" id="app-logo" draggable="false">
</div>




<script src="{{ asset('/js/int.js') }}"></script>
@endsection


