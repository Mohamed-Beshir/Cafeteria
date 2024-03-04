@extends('main')
@section('content')

<div class="container m-2 ">
    <div class="row">
        <div class="col-12 m-5 ">

            <a  href="{{route("categories.create")}}" class="btn btn-primary m-3">create category</a>

<table class="table border ">


    <thead class="bg-warning bg-gradient text-white table-dark">
        <tr  >
            <th scope="col">ID</th>
            <th scope="col">name</th>

            <th scope="col">Insert</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>

        @foreach ($categories as $category)
        <tbody>
        <tr>
            <td>
                {{$category["id"]}}
            </td>
            <td>
                {{$category["name"]}}
            </td>

            {{-- <td>
                <img style="width: 100px" src="{{asset('images/'.$student['image'])}}">
                {{$student["image"]}}
            </td> --}}
             <td><a href="{{route('categories.show',$category['id'])}}" class="btn btn-primary">show</a></td>
             <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success">Edit</a>
            </td>
            {{-- <td> --}}
                {{-- <a class="btn btn-danger" href="{{route('student.destroy',$student['id'])}}">delete</a> --}}
                {{-- <form method="post" action="{{route('tracks.destroy',$track['id'])}}">
                    @csrf
                    @method("delete")
                    <button class="btn btn-danger">delete</button>
                </form>
            </td> --}}
    {{--  --}}
            <td>
                <form id="deleteForm" method="post" action="{{ route('categories.destroy',$category['id'])}}">
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
    {{--  --}}

        </tr>
        <tbody>
        @endforeach

    </table>
        </div>
    </div>
</div>
@endsection
