@extends('main')
@section('content')
<div class="container m-2 ">
    <div class="row">
        <div class="col-12 m-5 ">
<form method="post" action="{{ route('products.update', $product->id) }}">
@csrf
@method('PUT') <!-- Adding method field for PUT request -->

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">price</label>
        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">quantity</label>
        <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
        @error('quantity')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="existing-image" class="form-label">Existing Image</label><br>
        <img style="width: 100px" src="{{ asset('images/' . $product->image) }}" alt="Existing Image"><br>
        <label for="image" class="form-label">Change Image</label>
        <input type="file" class="form-control" id="image" name="image">
        @error('image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
</div>
@endsection
