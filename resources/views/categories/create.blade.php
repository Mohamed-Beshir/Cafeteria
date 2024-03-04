@extends('main')
@section('content')
<div class="container m-2 ">
    <div class="row">
        <div class="col-12 m-5 ">
<h1>Create new category</h1>
<form method="post" action="{{route("categories.store")}}"
 enctype="multipart/form-data">
@csrf


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">category name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{old('name')}}">
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    {{-- <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">description</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="description" value="{{old('description')}}">
      @error('description')
      <p class="text-danger">{{$message}}</p>
     @enderror
    </div> --}}
    {{-- <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">image</label>
      <input type="file" class="form-control" id="exampleInputPassword1" name="image" value="{{old('image')}}">
      @error('image')
      <p class="text-danger">{{$message}}</p>
  @enderror
    </div> --}}
    <button type="submit" class="btn btn-primary">submit</button>
  </form>
        </div>
    </div>
</div>
  @endsection
