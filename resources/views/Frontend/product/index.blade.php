@extends('Frontend.Layouts.app')

@section('title')
    Products List
@endsection

@section('content')

    <div class="col-lg-12">
        <table class="table-responsive table">
            <tr>
                <th>Serial</th>
                <th>Category Name</th>
                <th>Attributes Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$product->category->category_name ?? ''}}</td>
                        <td>{{$product->attributes->attributes_name ?? ''}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            @if($product->product_status == 1)
                                <span class="badge bg-success">Active</span>
                            @else()
                                <span class="badge bg-danger">In-active</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('products.show',$product->id)}}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-info btn-sm">Edit</a>
                            <Form action="{{route('products.destroy',$product->id)}}" class="d-inline-block" method="POST" >
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
