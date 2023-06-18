@extends('Frontend.Layouts.app')

@section('title')
    SubCategoires List
@endsection

@section('content')

    <div class="col-lg-12">
        <table class="table-responsive table">
            <tr>
                <th>Serial</th>
                <th>Category Name</th>
                <th>Name</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach($subCategories as $key => $subCategory)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$subCategory->category->category_name ?? ''}}</td>
                        <td>{{$subCategory->category_name}}</td>
                        <td>
                            @if($subCategory->category_status == 1)
                                <span class="badge bg-success">Active</span>
                            @else()
                                <span class="badge bg-danger">In-active</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('subCategory.show',$subCategory->id)}}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{route('subCategory.edit',$subCategory->id)}}" class="btn btn-info btn-sm">Edit</a>
                            <Form action="{{route('subCategory.destroy',$subCategory->id)}}" class="d-inline-block" method="POST" >
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
