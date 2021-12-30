@extends("Layouts.admin")
@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            
                <h1 class="h3 mb-3 fw-normal text-center">Update Furniture</h1>

                <div class="card-body">
                    <form action="/updateFurniture/{{ $furniture->furniture_name }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Furniture Name</label>
                            <input type="text" class="form-control" name="furniture_name" id="furniture_name" autofocus required value="{{ old ('furniture_name', $furniture->furniture_name)}}">
                            @error('furniture_name')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="furniture_price">Furniture Price</label>
                            <input type="number" class="form-control" name="furniture_price" id="furniture_price" autofocus required value="{{ old ('furniture_price', $furniture->furniture_price)}}">
                            @error('furniture_price')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        
                        {{-- <div class="form-group">
                            <label for="color">Furniture Color</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" name="color" id="color" autofocus required value="{{ old ('color', $furniture->color) }}">
                            @error('color')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="furniture_type">Furniture Type</label>
                            <select class="form-control @error('furniture_type') is-invalid @enderror" id="furniture_type" name="furniture_type">
                                @foreach ($types as $type)
                                    @if ($type->type == $items->furniture_type)
                                        <option selected>{{$type->type}}</option>
                                    @else
                                        <option>{{$type->type}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="image">Choose File</label>
                            <input type="file" class="form-control" name="image" id="image"/>
                            @error('image')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-3" style="background-color:#b452ff">Update</button>
                    </form>
                </div>
        </div>
    </div>
</div> 
@endsection
