@extends('layouts.blocks')
@section('style')
<style>
    body {background-color: black;}
    body, html, #app {
    padding: 0;
    margin: 0;
    height: 100%;
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
</style>

@endsection
@section('content')
<div onclick="addColor('green',{{$user->id}})" class="box green"></div>
<div onclick="addColor('red',{{$user->id}})" class="box red"></div>
<div onclick="addColor('yellow',{{$user->id}})" class="box yellow"></div>
<div onclick="addColor('blue',{{$user->id}})" class="box blue"></div>
@endsection

