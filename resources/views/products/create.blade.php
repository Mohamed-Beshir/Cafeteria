 @extends('main')
@section('content')

<div class="container m-2 ">
    <div class="row">
        <div class="col-12 m-5 ">
<form method="post" action="{{route("products.store")}}" enctype="multipart/form-data">
@csrf

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{old('name')}}">
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <input type="text" class="form-control" id="description" aria-describedby="emailHelp" name="description" value="{{old('description')}}">
        @error('description')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">price</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" id="price" name="price" value="{{old('price')}}">
        @error('price')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    {{-- <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">slug</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="slug" value="{{old('slug')}}">
        @error('slug')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div> --}}

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">quantity</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="quantity" value="{{old('quantity')}}">
      @error('quantity')
      <p class="text-danger">{{$message}}</p>
     @enderror
    </div>
    <select class="form-select" name="category_id" aria-label="Default select example">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">image</label>
      <input type="file" class="form-control" id="exampleInputPassword1" name="image" value="{{old('image')}}">
      @error('image')
      <p class="text-danger">{{$message}}</p>
  @enderror
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
  </form>
        </div>
    </div>
</div>
  @endsection
