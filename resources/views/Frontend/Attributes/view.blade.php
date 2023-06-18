@extends('Frontend.Layouts.app')

@section('title')
    View Attributes
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        View Attributes
                    </div>
                    <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="attributes_name">Attributes Name</label>
                                <input type="text" id="attributes_name" class="form-control" name="attributes_name" value="{{$attributes->attributes_name}}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="attributes_list">Attributes</label>
                                <input type="text" class="form-control" id="attributes" name="attributes_list" value="{{$attributes->attributes}}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="attribute_status">Is Active</label>
                                <input type="Checkbox" id="attribute_status" name="attributes_status"  value="1" {{$attributes->attributes_status ? 'checked' : ''}}>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
