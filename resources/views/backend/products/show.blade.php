<!-- EXTENDS -->
@extends('adminlte::page')
<!-- TITLE -->
@section('title', 'E-commerce - Profile')
<!-- STYLES -->
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<!-- CONTENT -->
@section('content')

<!-- HEADER -->
<div class="container border border-dark d-flex justify-content-center rounded-top mt-5">
    <div class="row">
        <div class="mb-3 mt-3 col-12">
            <h1>{{__('web.name_product')}}{{$product->name}}</h1>
        </div>
    </div>
</div>
<!-- CONTENT INFORMATION-->
<div class="container border border-dark rounded-bottom d-flex justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="mt-3 mb-3 justify-content-center d-flex">
                <img class="rounded shadow-lg p-3 bg-body border border-dark w-25" src="{{asset('images/imageProduct/'.$product->image_product)}}" alt="Main image product">
            </div>
        </div>
        <div class="col-12 justify-content-center d-flex">
            <div class="rounded shadow-lg p-3 bg-body border border-dark w-25 mb-3">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                            @if(count($productsimages)==0)
                                <div class="carousel-item active">
                                    <img src="{{asset('default/pngegg.png')}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item active">
                                    <img src="{{asset('default/pngegg.png')}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item active">
                                    <img src="{{asset('default/pngegg.png')}}" class="d-block w-100" alt="...">
                                </div>
                            @else
                                @foreach($productsimages as $productimage)
                                    <div class="carousel-item active">
                                        <img src="{{asset('images/imageProduct/'.$imageproduct->image_url)}}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
                            @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TORNAR -->
<div class="container border border-dark d-flex justify-content-center rounded-bottom shadow-lg p-3 bg-white">
                <div class="row">
                    <div class="mb-3 mt-3 col-12">
                        <a class="btn btn-dark" href="{{route('products.index')}}">{{__('web.return')}}</a>
                    </div>
                </div>
</div>
@endsection