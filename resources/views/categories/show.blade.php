@extends('main')
@section('content')




<div class="card" style="width: 18rem;">

    <div class="card-body">
      <h5 class="card-title">Name:{{$category['name']}}</h5>
      {{-- @if($category->user)
<p> Created by:{{$track->user->name}}</p>
@endif --}}
<h5  class="card-text text-info" >posts in category</h5>
@foreach($category->products as $products)
<li>{{$products->name}}</li>
<a href="{{route('categories.index')}}" class="btn btn-primary">back</a>

    </div>
  </div>
@endforeach
@endsection
