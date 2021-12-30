@auth
    @if (Auth::user()->role == 'Admin')
        @include("layouts.admin")
       
        <div class="bg-image">
            @if (session()->has('success_input'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success_input') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('success_update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success_update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('success_delete'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success_delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <h1 class = "header text-center text-secondary">
                Welcome, {{ Auth::user()->name }} to JH Furniture 
            </h1>
            <div class="card-group">
                @foreach ($furnitures as $furniture)
                    <div class="card m-5 border border-4 border-secondary">
                        <div class="row">
                            <div class="card-detail">
                                <div class="image-detail text-center">
                                    <a class="card-image" href="/detail/{{$furniture->name}}">
                                        <img src="{{ asset('storage/app/furnitures'.$furniture->image) }}", width="100px", height="95px">
                                        
                                    </a>
                                </div>
                    
                                <div class="card-name text-center mt-5">
                                    <p>{{ $furniture->furniture_name }}</p>
                                </div>

                                <div class="card-price text-center mt-3">
                                    <p>Rp.{{ $furniture->furniture_price }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-primary">
                            <div class="card-button m-3">
                                <div class=" card-update">
                                    <a href="/updateFurniture/{{ $furniture->furniture_name }}" class="btn btn-warning" role="button" aria-pressed="true">Update</a>
                                </div>
                                <div class=" card-update">
                                    <a href="/deleteFurniture/{{ $furniture->id }}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>                      
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>  
        </div>
    @else
        @include("layouts.member")
        <div class="bg-image">
            <h1 class = "header text-center text-secondary">
                Welcome, {{ Auth::user()->name }} to JH Furniture 
            </h1>

            <div class="card-group">
                @foreach ($furnitures as $furniture)
                    <div class="card m-5 border border-4 border-secondary">
                        <div class="row">
                            <div class="card-detail">
                                <div class="image-detail text-center">
                                    <a class="card-image" href="/detail/{{$furniture->name}}">
                                        <img src="{{ asset('storage/'. $furniture->image) }}", width="100px", height="95px">
                                    </a>
                                </div>
                    
                                <div class="card-name text-center mt-5">
                                    <p>{{ $furniture->furniture_name }}</p>
                                </div>

                                <div class="card-price text-center mt-3">
                                    <p>Rp.{{ $furniture->price }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-primary">
                            <div class="card-button m-3 d-flex justify-content-center">
                                <div class=" card-update">
                                    <button type="submit" class="btn btn-warning">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>   
    @endif
@endauth

@guest
    @include("layouts.guest")
    <div class="bg-image">
        <h1 class = "header text-center text-secondary">
            Welcome to JH Furniture 
        </h1>

        <div class="card-group">
            @foreach ($furnitures as $furniture)
                <div class="card m-5 border border-4 border-secondary">
                    <div class="row">
                        <div class="card-detail">
                            <div class="image-detail text-center">
                                <a class="card-image" href="/detail/{{$furniture->id}}">
                                    <img src="{{ asset('storage/'. $furniture->image) }}", width="100px", height="95px">
                                </a>
                            </div>
                
                            <div class="card-name text-center mt-5">
                                <p>{{ $furniture->furniture_name }}</p>
                            </div>

                            <div class="card-price text-center mt-3">
                                <p>Rp.{{ $furniture->furniture_price }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-primary">
                        <div class="card-button m-3 d-flex justify-content-center">
                            <div class=" card-update">
                                <button type="submit" class="btn btn-warning">Add to Cart</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>  
@endguest
