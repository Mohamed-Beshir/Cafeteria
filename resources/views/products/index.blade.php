@extends('main')
@section('content')

<div class="container m-2 ">
    <div class="row">
        <div class="col-12 m-5 ">
            <a href="{{route("products.create")}}" class="btn btn-primary m-3">create posts</a>

<table class="table table border" style="vertical-align: middle;">

<thead class="table-dark">
    <tr class="bg-warning bg-gradient text-white">
        <th>ID</th>
        <th>name</th>
        <th>description</th>
        <th>price</th>
        <th>category</th>
        <th>quantity</th>
        <th>image</th>
        <th>Insert</th>
        <th>edit</th>
        <th>delete</th>
    </tr>
</thead>
    @foreach ($products as $product)
    <tr>
        <td>
            {{$product["id"]}}
        </td>
        <td>
            {{$product["name"]}}
        </td>
        <td>
            {{$product["description"]}}
        </td>
        <td>
            {{$product["price"]}}
        </td>
        <td>
            @if ($product->category)
            <a href="{{route('categories.show',$product["category_id"])}}">{{$product->category->name}}</a>

            @else
            <P class="text-danger">no category</p>
            @endif
        </td>
        <td>
            {{$product["quantity"]}}
        </td>

        <td>
            <img style="width: 70px" src="{{asset('img/'.$product['image'])}}">
            {{$product["image"]}}
        </td>
        <td><a href="{{route('products.show',$product['id'])}}" class="btn btn-primary">show</a></td>
        <td>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Edit</a>
        </td>
        {{-- <td> --}}
            {{-- <a class="btn btn-danger" href="{{route('student.destroy',$student['id'])}}">delete</a> --}}
            {{-- <form method="post" action="{{route('student.destroy',$student['id'])}}">
                @csrf
                @method("delete")
                <button class="btn btn-danger">delete</button>
            </form>
        </td> --}}
        <td>
            <form id="deleteForm" method="post" action="{{ route('products.destroy', $product['id']) }}">
                @csrf
                @method("delete")
                <button class="btn btn-danger" onclick="return confirmDelete()">Delete</button>
            </form>
        </td>

        <script>
            function confirmDelete() {
                if (confirm("Are you sure you want to delete this student?")) {
                    document.getElementById("deleteForm").submit();
                    return true;
                } else {
                    return false;
                }
            }
        </script>

    </tr>

    @endforeach

</table>
        </div>
    </div>
</div>
@endsection
