@extends('Layouts.admin')
@section('container')
@auth
    @if (Auth::user()->role == 'Admin')
        <h1 class = "header text-center text-secondary text-uppercase">
            {{$furniture->name}}
        </h1>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card-image offset-md-4 mt-4">
                        <img src="{{ asset('storage/'. $furniture->image) }}", width="300px", height="285px">
                    </div>
                </div>
                <div class="col align-self-center">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="field-name">
                                Name : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$furniture->furniture_name}} 
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="field-name">
                                Price : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$furniture->furniture_price}}
                            </div>
                        </div>
                    </div>  

                    {{-- <div class="row mb-3">
                        <div class="col">
                            <div class="field-name">
                                Color : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$furniture->color}}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="field-name">
                                Type : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$furniture->furniture_type}}
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class=" item-update text-end">
                        <a href="{{url()->previous()}}" class="btn btn-profile btn-lg btn-secondary" role="button" aria-pressed="true">Previous</a>
                    </div>
                </div>
                <div class="col">
                    <div class=" item-update text-center">
                        <a href="/updateFurniture/{{$furniture->furniture_name}}" class="btn btn-profile btn-lg btn-warning" role="button" aria-pressed="true">Update</a>
                    </div>
                </div>
                <div class="col">
                    <div class=" item-update text-start">
                        <a href="/deleteFurniture/{{$furniture->furniture_name}}" class="btn btn-profile btn-lg btn-danger" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- MEMBER --}}
    @else
        @if (session()->has('success_add-to-cart'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success_add-to-cart') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif 
        <h1 class = "header text-center text-secondary text-uppercase">
            {{$furniture->furniture_name}} 
        </h1>
        
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card-image offset-md-4 mt-4">
                        <img src="{{ asset('storage/'. $furniture->image) }}", width="300px", height="285px">
                    </div>
                </div>
                <div class="col align-self-center">
                    <div class="row">
                        <div class="col">
                            <div class="field-name">
                                Name : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$furniture->furniture_name}} 
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <div class="field-name">
                                Price : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$furniture->furniture_price}}
                            </div>
                        </div>
                    </div>  
                    {{-- <div class="row">
                        <div class="col">
                            <div class="field-name">
                                Color : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$furniture->color}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="field-name">
                                Type : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$furniture->furniture_type}}
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class=" item-update text-end">
                        <a href="{{url()->previous()}}" class="btn btn-profile btn-secondary" role="button" aria-pressed="true">Previous</a>
                    </div>
                </div>
                <div class="col">
                    <div class=" item-update text-start">
                        <a href="#" class="btn btn-profile btn-warning" role="button" aria-pressed="true">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- GUEST --}}
@else
    <h1 class = "header text-center text-secondary text-uppercase">
        {{ $furniture->furniture_name}}
        
    </h1>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card-image offset-md-4 mt-4">
                    <img src="{{ asset('storage/'. $furniture->image) }}", width="300px", height="285px">
                </div>
            </div>
            <div class="col align-self-center">
                <div class="row">
                    <div class="col">
                        <div class="field-name">
                            Name : 
                        </div>
                    </div>
                    <div class="col">
                        <div class="detail-value">
                            {{$furniture->furniture_name}} 
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <div class="field-name">
                            Price : 
                        </div>
                    </div>
                    <div class="col">
                        <div class="detail-value">
                            {{$furniture->furniture_price}}
                        </div>
                    </div>
                </div>  
                {{-- <div class="row">
                    <div class="col">
                        <div class="field-name">
                            Color : 
                        </div>
                    </div>
                    <div class="col">
                        <div class="detail-value">
                            {{$furniture->color}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="field-name">
                            Type : 
                        </div>
                    </div>
                    <div class="col">
                        <div class="detail-value">
                            {{$furniture->furniture_type}}
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class=" item-update text-end">
                    <a href="{{url()->previous()}}" class="btn btn-profile btn-secondary" role="button" aria-pressed="true">Previous</a>
                </div>
            </div>
            <div class="col">
                <div class=" item-update text-start">
                    <a href="/login" class="btn btn-profile btn-warning" role="button" aria-pressed="true">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>
@endauth
    
@endsection