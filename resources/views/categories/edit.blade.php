@extends('main')
@section('content')
<div class="container m-2 ">
    <div class="row">
        <div class="col-12 m-5 ">
<h1> edit track</h1>
<form method="post" action="{{route('categories.update',$category->id)}}">
@csrf

@method("put")
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">category name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"  value="{{old('name') ??$category->name}}">
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    {{-- <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">description</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="description"  value="{{old('description') ??$track->description}}">
      @error('description')
      <p class="text-danger">{{$message}}</p>
     @enderror
    </div> --}}
    {{-- <div class="mb-3">
        <label for="existing-image" class="form-label">Existing Image</label><br>
        <img style="width: 100px" src="{{ asset('images/' . $track->image) }}" alt="Existing Image"><br>
        <label for="image" class="form-label">Change Image</label>
        <input type="file" class="form-control" id="image" name="image" value="{{old('image') ??$track->image}}">
        @error('image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div> --}}
    <button type="submit" class="btn btn-primary">submit</button>
  </form>
        </div>
    </div>
</div>
  @endsection
