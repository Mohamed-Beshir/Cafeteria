@extends('main')
@section('content')
  {{-- @if($category->user)
<p> Created by:{{$track->user->name}}</p>
@endif --}}
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-6">
    <h3  style="width:fit-content; padding:8px" class="card-text m-5 bg-primary rounded text-white" >products in <span class="text-warning">{{$category['name']}}</span> category</h3>
        </div>
    </div>
  <div class="row justify-content-start">

@foreach($category->products as $products)
<div class="col-4 mt-3">
<div class="card" style="width: 18rem;">
    <img style="height: 200px" src="{{asset('img/'.$products['image'])}}">
    <div class="card-body">

      <h5 class="card-title">{{$products->name}}</h5>



    </div>
</div>
</div>
@endforeach

    </div>

</div>
@endsection
