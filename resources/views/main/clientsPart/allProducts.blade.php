@extends('main.index')
@section('mainBody')
    
@foreach($allProducts as $item)

<h1>{{$item->product_name}}</h1>


@endforeach
    
@endsection
