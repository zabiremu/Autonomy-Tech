@extends('Frontend.Layouts.app')

@section('title')
    Attributes list
@endsection

@section('content')

    <div class="col-lg-12">
        <table class="table-responsive table">
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Attributes</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach($attributes as $key => $attribute)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$attribute->attributes_name}}</td>
                        <td>{{$attribute->attributes}}</td>
                        <td>
                            @if($attribute->attributes_status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">In-active</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('attributes.show',$attribute->id)}}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{route('attributes.edit',$attribute->id)}}" class="btn btn-info btn-sm">Edit</a>
                            <Form action="{{route('attributes.destroy',$attribute->id)}}" class="d-inline-block" method="POST" >
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
