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
                    <div class="mb-3 col-12">
                        <h1>{{__('web.products_title')}}</h1>
                    </div>
                </div>
            </div>
    <!-- Condición si existe -->
    @if(count($products)==0)
        <div class="mt-5 mb-5">
            <p>{{__('web.not-data')}}</p>
        </div>
    @else
            <!-- CONTENT INFORMATION-->
            @foreach($products as $product)
            @if(Auth::User())
            <div class="container border border-dark d-flex justify-content-center">
                <div class="row">
                        <!-- Nombre Producto -->
                        <div class="mb-3 col-6 vvv">
                            <label for="name" class="form-label mt-5 ml-5">{{__('web.name_product')}}</label>
                        </div>
                        <div class="mb-3 col-6">
                            <label name="name" class="form-label mt-5">{{$product->name}}</label>
                        </div>
                        <!-- Precio Producto -->
                        <div class="mb-3 col-6 vvv">
                            <label for="price" class="form-label ml-5">{{__('web.price_product')}}</label>
                        </div>
                        <div class="mb-3 col-6">
                            <label name="price" class="form-label">{{$user->email}}</label>
                        </div>
                        <!-- Categoria -->
                        <div class="mb-3 col-6 vvv">
                            <label for="username" class="form-label ml-5">{{__('web.')}}</label>
                        </div>
                        <div class="mb-3 col-6">
                            <label name="username" class="form-label">@if(is_null($user->last_name)){{__('web.not-data')}} @else{{$user->last_name}}@endif</label>
                        </div>
                        <!-- Imagen Principal -->
                        <div class="mb-3 col-6 vvv">
                            <label for="main_image" class="form-label ml-5">{{__('web.principal_image_products')}}</label>
                        </div>
                        <div class="mb-3 col-6">
                            <img name="main_image" src="{{asset('$product->image_product')}}" alt="Main image">
                        </div>
                </div>
            </div>
    @endif
            <!-- MODIFICAR -->
            <div class="container border border-dark d-flex justify-content-center rounded-bottom shadow-lg p-3 bg-white">
                <div class="row">
                    <div class="mb-3 mt-3 col-12">
                        <a class="btn btn-dark btn-lg" 
                        href="{{route('profiles.edit', ['profile'=>$user->id])}}">
                        {{__('web.edit_profile')}}</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
@endsection