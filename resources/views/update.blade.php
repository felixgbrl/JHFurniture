@extends("Partials.admin")
@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                        Add New Furniture
                </div>
                <div class="card-body">
                    <form action="/addfurniture" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="furniture_name">Furniture Name</label>
                            <input type="text" class="form-control" name="furniture_name" id="furniture_name" autofocus required value="{{ old ('furniture_name') }}">
                            @error('furniture_name')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="furniture_price">Furniture Price</label>
                            <input type="number" class="form-control" name="furniture_price" id="furniture_price" autofocus required value="{{ old ('price') }}">
                            @error('furniture_price')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Upload File</label>
                            <input type="file" class="form-control" name="image" id="image"/>
                            @error('image')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 



@endsection