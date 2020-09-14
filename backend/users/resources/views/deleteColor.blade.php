@extends('layouts.blocks')
@section('style')
<style>
    body {background-color: black;}
    body, html, #app {
    padding: 0;
    margin: 0;
    height: 100%;
    text-align: center;
}

.box {
    box-sizing: border-box;
    float: left;
    width: 50%;
    height: 50%;
}

.box:first-child {
    border-bottom: 1px solid black;
    border-right: 1px solid black;
}
.box:nth-child(2) {
    border-bottom: 1px solid black;
}
.box:nth-child(3) {
    border-right: 1px solid black;
}

.red {
    background-color: red;
}

.blue {
    background-color: blue;
}

.yellow {
    background-color: yellow;
}

.green {
    background-color: green;
}

#trash {
    text-align: center;
    height: 4em;
    width: 100%;
    position:absolute;
    /*ttop: ;  50% - 3/4 of icon height */
    top: calc(50% - 2em);
    z-index: 9999;
}
</style>

@endsection
@section('content')
<div onclick="setColor('green',{{$user->id}},{{$userColor->id}})" class="box green"></div>
<div onclick="setColor('red',{{$user->id}},{{$userColor->id}})" class="box red"></div>
<div onclick="setColor('yellow',{{$user->id}},{{$userColor->id}})" class="box yellow"></div>
<div onclick="setColor('blue',{{$user->id}},{{$userColor->id}})" class="box blue"></div>
@if($user->colors->count()>1)
<div onclick="deleteColor({{$user->id}},{{$userColor->id}})" id="trash"><svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></div>
@endif
@endsection

