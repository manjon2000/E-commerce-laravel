<!-- EXTENDS -->
@extends('adminlte::page')
<!-- TITLE -->
@section('title', 'E-commerce - Profile')
<!-- STYLES -->
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<!-- CONTENT -->
@section('content')
<!-- CSRF TOKEN -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- HEADER -->
<div class="container border border-dark d-flex justify-content-center rounded-top mt-5">
    <div class="row">
        <div class="mb-3 mt-3 col-12">
            <h1>{{__('web.name_product')}}{{$product->name}}</h1>
        </div>
    </div>
</div>
<!-- CONTENT INFORMATION-->
<div class="container border border-dark d-flex justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="mt-3 mb-3 justify-content-center d-flex">
                <img class="rounded shadow-lg p-3 bg-body border border-dark w-25" id="main_image" src="{{asset('images/imageProduct/'.$product->image_product)}}" value="{{$product->image_product}}" alt="Main image product">
            </div>
        </div>
        <div class="col-12 justify-content-center d-flex">
            <div class="rounded shadow-lg p-3 bg-body border border-dark w-50 mb-3">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        $active = false;
                        ?>
                        @foreach($productsimages as $productimage)
                        @if(!$active)
                        <div class="carousel-item active">
                            <img src="{{asset('images/imageProductSecondary/'.$productimage->image_url)}}" class="d-block w-100" alt="..." value="{{$productimage->image_url}}" value2="{{$productimage->id}}">
                        </div>
                        <?php $active = true; ?>
                        @else
                        <div class="carousel-item">
                            <img src="{{asset('images/imageProductSecondary/'.$productimage->image_url)}}" class="d-block w-100" alt="..." value="{{$productimage->image_url}}" value2="{{$productimage->id}}">
                        </div>
                        @endif
                        @endforeach
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
<div class="container border border-dark justify-content-center d-flex">
    <div class="mt-3 mb-3">
        <button class="btn btn-dark btn-lg" id="button_image_main">{{__('web.convert_main_image')}}</button>
    </div>
</div>
<!-- TORNAR -->
<div class="container border border-dark d-flex justify-content-center rounded-bottom shadow-lg p-3 bg-white">
    <div class="row">
        <div class="mb-3 mt-3 col-12">
            <a class="btn btn-dark" href="{{route('products.index')}}">{{__('web.return')}}</a>
            <a href="{{route('createimageindex', ['id'=>$product->id])}}" class="btn btn-dark btn-lg">{{__('web.add_image')}}</a>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function() {
        $('#button_image_main').click(function() {
            var mainImage = $('#main_image').attr('value');
            var activeImage = $('.active').children('img').attr('value');
            var activeImage2 = $('.active').children('img').attr('value2');
            var data = {
                'id_main': <?php echo $product->id ?>,
                'main': mainImage,
                'id_secondary': activeImage2,
                'secondary': activeImage
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post("{{route('updateimage')}}", data,
                function(data, status) {
                    location.reload();
                });
        });
    });
</script>
@endsection
