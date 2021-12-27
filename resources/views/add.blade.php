@extends("Layouts.admin")
@section('container')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            
                    <form action="/addfurniture" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="furniture_name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="furniture_name" id="furniture_name" autofocus required value="{{ old ('furniture_name') }}">
                            </div>
                            @error('furniture_name')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="furniture_price" class="col-sm-2 col-form-label col-form-label-sm">Price</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="furniture_price" id="furniture_price" autofocus required value="{{ old ('furniture_price') }}">
                            </div>
                            @error('furniture_price')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label col-form-label-sm">Image</label>
                            <div class="col-sm-10">
                            <input type="file" class="form-control" name="image" id="image">
                            </div>
                            @error('furniture_price')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-3" style="background-color:#b452ff">Add</button>
                    </form>
                
            
        </div>
    </div>
</div> 


@endsection