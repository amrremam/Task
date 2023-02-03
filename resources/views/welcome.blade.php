@extends('layouts.app')
@section('content')


<form action="{{route('image')}}" method="POST" enctype="multipart/form-data">
    {{-- @method('POST') --}}
    @csrf
    <input type="file" name="photo">
    <button type="submit">Submit</button>

</form>