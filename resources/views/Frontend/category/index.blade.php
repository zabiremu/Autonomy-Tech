@extends('Frontend.Layouts.app')

@section('title')
    Categories List
@endsection

@section('content')

    <div class="col-lg-12">
        <table class="table-responsive table">
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>
                            @if($category->category_status == 1)
                                <span class="badge bg-success">Active</span>
                            @else()
                                <span class="badge bg-danger">In-active</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('category.show',$category->id)}}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a>
                            <Form action="{{route('category.destroy',$category->id)}}" class="d-inline-block" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete </button>
                            </Form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
