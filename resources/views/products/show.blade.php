@extends('main')
@section('content')

{{--  --}}
<div class="container ">
    <h3  class="card-text text-primary m-5" >product : {{$product['name']}} </h3>

    <div class="row align-items-center">
<div class="card" style="width: 18rem;">
    <img  src="{{asset('img/'.$product['image'])}}">
    <div class="card-body">
      <h5 class="card-title">Name:{{$product['name']}}</h5>
      <p class="card-text">Description:{{$product['description']}}</p>
      <p class="card-text">Quantity:{{$product['quantity']}}</p>
      <p class="card-text">Price:{{$product['price']}}</p>
      <p class="card-text">
      category:<a href="{{route('categories.show',$product->category->id)}}">{{$product->category->name}}</a>
      </p>
      <a href="{{route('products.index') }}" class="btn btn-primary">Back</a>
    </div>
  </div>
@endsection
