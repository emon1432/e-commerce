@extends('main.index')
@section('mainBody')
    
@foreach($allProducts as $item)

<p>{{$item->product_name}}</p>


@endforeach
    
@endsection
